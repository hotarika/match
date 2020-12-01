<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        // *******************************
        // 発注中の仕事
        // *******************************
        $owner_works = DB::table('works as w')
            ->select('w.user_id', 'u.name as user_name', 'w.name as work_name', 'w.contract_id', 'c.type', 'w.money_lower', 'w.money_upper', 'u.image', 'w.end_date')
            ->leftJoin('users as u', 'w.user_id', '=', 'u.id')
            ->leftJoin('contracts as c', 'w.contract_id', '=', 'c.id')
            ->where('user_id', Auth::id())
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
        $child = DB::table('dm_contents as c')
            ->whereIn(
                DB::raw('c.created_at'),
                function ($query) {
                    return $query->select(DB::raw('max(cc.created_at) as max'))
                        ->from('dm_contents as cc')
                        ->groupBy('cc.board_id');
                }
            );

        // 親子結合
        $boards = DB::table('dm_boards as b')
            ->select('b.id', 'b.work_id', 'w.name as work_name', 'b.owner_user_id', 'u.name as user_name', 'u.image', 'c.content as latest_content', 'c.created_at as latest_date')
            ->leftJoin('users as u', 'b.owner_user_id', '=', 'u.id')
            ->leftJoin('works as w', 'b.work_id', '=', 'w.id')
            ->leftJoinSub($child, 'c', function ($join) {
                $join->on('b.id', '=', 'c.board_id');
            })
            ->orWhere('b.owner_user_id', Auth::id())
            ->orWhere('b.order_user_id', Auth::id())
            ->orderBy('latest_date', 'DESC')
            ->get();

        return view('mypage', compact('pubmsgs', 'boards', 'owner_works'));
    }
}
