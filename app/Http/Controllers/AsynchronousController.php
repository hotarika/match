<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AsynchronousController extends Controller
{
    // ======================================
    // 通知バッジ
    // ======================================
    // 新着通知
    public function getNotificationsBadgeInHeader()
    {
        $count = DB::table('notifications')
            ->select(DB::raw('count(*) as count'))
            ->where('notifiable_id', '=', Auth::id())
            ->whereNull('read_at')
            ->get();

        return $count->toJson();
    }

    // パブリックメッセージ
    public function getPublicMessagesBadgeInSidebar()
    {
        $count = DB::table('public_messages_badges')
            ->select(DB::raw('count(*) as count'))
            ->where('user_id', '=', Auth::id())
            ->get();

        return $count->toJson();
    }

    // ダイレクトメッセージ
    public function getDirectMessagesBadgeInSidebar()
    {
        $count = DB::table('direct_messages_badges')
            ->select(DB::raw('count(*) as count'))
            ->where('user_id', '=', Auth::id())
            ->get();

        return $count->toJson();
    }



    // ======================================
    // 発注した仕事
    // ======================================
    public function getWorksListOfOrderInMyPage()
    {
        $work = DB::table('works as w')
            ->select(
                'w.id',
                'w.name as w_name',
                'w.user_id as u_id',
                'u.name as u_name',
                'u.image as u_image',
                'w.contract_id',
                'w.end_date',
                'w.price_lower',
                'w.price_upper',
                'w.state as w_state',
            )
            ->leftJoin('users as u', 'w.user_id', '=', 'u.id')
            ->where('w.user_id', '=', Auth::id())
            ->orderBy('w.created_at', 'DESC')
            ->get();

        return $work->toJson();
    }

    // ======================================
    // 応募した仕事
    // ======================================

    public function getWorksListOfApplicationInMyPage()
    {
        $work = DB::table('works as w')
            ->select(
                'w.id',
                'w.name as w_name',
                'w.user_id as u_id',
                'u.name as u_name',
                'u.image as u_image',
                'w.contract_id',
                'w.end_date',
                'w.price_lower',
                'w.price_upper',
                'w.state as w_state',
                'a.state as applicant_state'
            )
            ->rightJoin('applicants as a', 'w.id', '=', 'a.work_id')
            ->leftJoin('users as u', 'w.user_id', '=', 'u.id')
            ->where('a.applicant_id', '=', Auth::id())
            ->orderBy('w.created_at', 'DESC')
            ->get();

        return $work->toJson();
    }

    // ======================================
    // パブリックメッセージリスト
    // ======================================
    public function getPublicMessagesList()
    {
        // メッセージのバッジ表示
        $countBadges = DB::table('public_messages_badges')
            ->select('parent_id', 'user_id', DB::raw('count(*) as count'))
            ->where('user_id', Auth::id())
            ->groupBy('parent_id', 'user_id');


        // [サブクエリ1]
        // 親メッセージ・子メッセージ・依頼者に自分のIDが含まれている親ボードのデータを全て取得
        $parentIdContainsMyMessages = DB::table('parent_public_messages as p1')
            ->select('p1.id')
            ->rightJoin('child_public_messages as c1', 'p1.id', '=', 'c1.parent_id')
            ->leftJoin('works as w', 'p1.work_id', '=', 'w.id')
            ->orWhere('p1.user_id', '=', Auth::id()) // 親掲示板のuser_id
            ->orWhere('c1.user_id', '=', Auth::id()) // 子掲示板のuser_id
            ->orWhere('w.user_id', '=', Auth::id()) // 仕事発注者のuser_id
            ->groupBy('c1.parent_id');

        // [サブクエリ2]
        // 上記の結果から、最新の日時を持つレコードを親ボードIDでグループ化
        $parentIdOfLatestDate = DB::table('child_public_messages as c2')
            ->select(DB::raw('c2.parent_id, max(c2.created_at) as latest_date'))
            ->whereIn('c2.parent_id', $parentIdContainsMyMessages)
            ->groupBy('c2.parent_id');

        // [サブクエリ3]
        // 上記の最新の日時を持つ子レコードを全て取得
        $childAllColumns = DB::table('child_public_messages as c3')
            ->select('*')
            ->whereIn(DB::raw('(c3.parent_id, c3.created_at)'), $parentIdOfLatestDate);

        // 上記のサブクエリを親テーブルと結合
        $pubmsgs = DB::table('parent_public_messages as pm')
            ->select(
                // パブリックメッセージ情報
                'pm.id as pm_id',
                'pm.title as pm_title',
                'pm.content as pm_content',
                // 発注者情報
                'pm.work_id as w_id',
                'w.name as w_name',
                'w.user_id as orderer_id',
                'u.name as orderer_name',
                // 最新の情報
                'cm.id as cm_id',
                'cm.content as cm_latest_content',
                'pm.updated_at as pm_updated_at',
                // バッジカウント
                'cnt.count as badge'
            )
            ->leftJoin('works as w', 'pm.work_id', '=', 'w.id')
            ->leftJoinSub($childAllColumns, 'cm', function ($join) {
                $join->on('pm.id', '=', 'cm.parent_id');
            })
            ->leftJoinSub($countBadges, 'cnt', function ($join) {
                $join->on('pm.id', '=', 'cnt.parent_id');
            })
            ->leftJoin('users as u', 'w.user_id', '=', 'u.id')
            ->orWhere('pm.user_id', Auth::id()) // 親メッセージ作成者の場合リスト表示
            ->orWhere('w.user_id', Auth::id()) // または自分が依頼者の場合リスト表示
            // または子どもデータがNULL以外のレコードをリスト表示
            //（notNullは、サブクエリから子どもの最新情報を取得して、親と結合したときにleftJoin（子掲示板がnullであっても自分が作成した親掲示板情報を取得したいため）で結合しているため、不要な情報が一緒にくっついてくるので、notNullをしてあげることで、それを全て削除することができる）
            ->orWhereNotNull('cm.id')
            ->orderBy('pm.updated_at', 'DESC')
            ->get();

        return $pubmsgs->toJson();
    }

    // ======================================
    // ダイレクトメッセージリスト
    // ======================================
    public function getDirectMessagesList()
    {
        // メッセージのバッジ表示
        $countBadges = DB::table('direct_messages_badges')
            ->select('board_id', 'user_id', DB::raw('count(*) as count'))
            ->where('user_id', Auth::id())
            ->groupBy('board_id', 'user_id');


        // [サブクエリ1] 最新のメッセージを取得するために、最新の日時とボードIDを取得
        $getLatestContentsData = DB::table('direct_messages_contents as c')
            ->select('c.board_id', DB::raw('max(c.created_at) as latest_date'))
            ->groupBy('c.board_id');

        // [サブクエリ2] 上記の結果を利用して、最新メッセージのカラムを全て取得
        $getAllColumnsOfLatestContents = DB::table('direct_messages_contents as c')
            ->select('*')
            ->whereIn(DB::raw('(c.board_id, c.created_at)'), $getLatestContentsData);

        // 上記のテーブルと結合
        $boards = DB::table('direct_messages_boards as b')
            ->select(
                'b.id as board_id',
                'b.work_id as w_id',
                'w.name as w_name',
                // 発注者
                'w.user_id as orderer_id',
                'u1.name as orderer_name',
                'u1.image as orderer_image',
                // 応募者
                'b.applicant_id',
                'u2.name as applicant_name',
                'u2.image as applicant_image',
                // 最新の子メッセージ
                'c.content as latest_content',
                'c.created_at as latest_date',
                // バッジカウント
                'cnt.count as badge'
            )
            ->leftJoin('works as w', 'b.work_id', '=', 'w.id')
            ->leftJoin('users as u1', 'w.user_id', '=', 'u1.id') // 発注者
            ->leftJoin('users as u2', 'b.applicant_id', '=', 'u2.id') // 応募者
            ->leftJoinSub($getAllColumnsOfLatestContents, 'c', function ($join) {
                $join->on('b.id', '=', 'c.board_id');
            })
            ->leftJoinSub($countBadges, 'cnt', function ($join) {
                $join->on('c.board_id', '=', 'cnt.board_id');
            })
            ->where(function ($query) {
                // 発注者または応募者に自分が含まれていれば表示する
                $query->where('w.user_id', Auth::id())
                    ->orWhere('b.applicant_id', Auth::id());
            })->where(function ($query) {
                // メッセージが投稿されていなければ表示しない
                // （ボードは応募時に作成しているので、メッセージのないボードが存在するため、依頼者・応募者がメッセージ投稿をしていなければ削除する）
                $query->whereNotNull('c.id');
            })
            ->orderBy('c.created_at', 'DESC')
            ->get();

        return $boards->toJson();
    }


    // ======================================
    // 仕事一覧
    // ======================================
    public function getWorks()
    {
        $work = DB::table('works as w')
            ->select(
                'w.id',
                'w.name as w_name',
                'w.user_id as u_id',
                'u.name as u_name',
                'u.image as u_image',
                'w.contract_id',
                'w.end_date',
                'w.price_lower',
                'w.price_upper',
            )
            ->leftJoin('users as u', 'w.user_id', '=', 'u.id')
            ->where('w.end_date', '>=', today())
            ->where('w.state', '=', 1) // 1 = 応募中
            ->orderBy('w.created_at', 'DESC')
            ->get();

        return $work->toJson();
    }
}
