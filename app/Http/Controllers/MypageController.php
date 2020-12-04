<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use Mockery\Undefined;

class MypageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = User::find(Auth::id());
        foreach ($user->unreadNotifications as $key => $value) {
            if ($value) {
                $notification[$key] = $value;
            }
        }
        // 通知がなかった場合はundefinedになるため、null値を格納してエラー回避
        if (!isset($notification)) {
            $notification = null;
        }


        // *******************************
        // 発注中の仕事
        // *******************************
        $owner_works = DB::table('works as w')
            ->select('w.id as work_id', 'w.user_id', 'u.name as user_name', 'w.name as work_name', 'w.contract_id', 'c.type', 'w.price_lower', 'w.price_upper', 'u.image', 'w.end_date')
            ->leftJoin('users as u', 'w.user_id', '=', 'u.id')
            ->leftJoin('contracts as c', 'w.contract_id', '=', 'c.id')
            ->where('user_id', Auth::id())
            ->get();

        // *******************************
        // 応募中の仕事
        // *******************************
        $order_works = DB::table('applicants as a')
            ->select('a.applicant_id', 'u.name as user_name', 'a.work_id', 'w.name as work_name', 'w.contract_id', 'w.end_date', 'w.price_upper', 'w.price_lower', 'w.state', 'a.applicant_id', 'u.name as user_name', 'u.image')
            ->leftJoin('users as u', 'a.applicant_id', '=', 'u.id')
            ->leftJoin('works as w', 'a.work_id', '=', 'w.id')
            ->where('a.applicant_id', Auth::id())
            ->where('w.state', 1)
            ->where('w.end_date', '>=', date('Y/m/d'))
            ->get();


        // *******************************
        // パブリックメッセージ
        // *******************************
        // 子
        $child = DB::table('child_pubmsg as c')->whereIn(
            DB::raw('c.created_at'),
            function ($query) {
                return $query->select(DB::raw('max(cc.created_at) as max'))
                    ->from('child_pubmsg as cc')
                    ->groupBy('cc.parent_id');
            }
        );

        // 親子結合
        $pubmsgs = DB::table('parent_pubmsg as p')
            ->select('p.id', 'p.title', 'p.content',  'p.work_id', 'w.name as work_name', 'p.user_id', 'u.name as user_name', 'p.created_at', 'c.content as latest_content', 'c.created_at as latest_date')
            ->leftJoin('users as u', 'p.user_id', '=', 'u.id')
            ->leftJoin('works as w', 'p.work_id', '=', 'w.id')
            ->leftJoinSub($child, 'c', function ($join) {
                $join->on('p.id', '=', 'c.parent_id');
            })
            ->orWhere('p.user_id', Auth::id())
            ->orderBy('latest_date', 'DESC')
            ->get();


        // *******************************
        // DM
        // *******************************
        // 子
        $child = DB::table('direct_messages_contents as c')
            ->whereIn(
                DB::raw('c.created_at'),
                function ($query) {
                    return $query->select(DB::raw('max(cc.created_at) as max'))
                        ->from('direct_messages_contents as cc')
                        ->groupBy('cc.board_id');
                }
            );

        // 親子結合
        $boards = DB::table('dm_boards as b')
            ->select('b.id', 'b.work_id', 'w.name as work_name', 'w.user_id as orderer_id', 'u.name as user_name', 'u.image', 'c.content as latest_content', 'c.created_at as latest_date')
            ->leftJoin('works as w', 'b.work_id', '=', 'w.id')
            ->leftJoin('users as u', 'w.user_id', '=', 'u.id')
            ->leftJoinSub($child, 'c', function ($join) {
                $join->on('b.id', '=', 'c.board_id');
            })
            ->orWhere('w.user_id', Auth::id())
            ->orWhere('b.order_user_id', Auth::id())
            ->orderBy('latest_date', 'DESC')
            ->get();

        return view('mypage', compact('owner_works', 'order_works', 'pubmsgs', 'boards', 'notification'));
    }
}
