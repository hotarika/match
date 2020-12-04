<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\ParentMsg;
use Illuminate\Support\Facades\Auth;

class PubmsgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 子
        $child = DB::table('child_public_messages as c')->whereIn(
            DB::raw('c.created_at'),
            function ($query) {
                return $query->select(DB::raw('max(cc.created_at) as max'))
                    ->from('child_public_messages as cc')
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

        // [サブクエリ1]
        // 子メッセージに自分のIDが含まれている親ボードのデータを全て取得
        $child1 = DB::table('child_public_messages as c1')
            ->select('c1.parent_id')
            ->where('c1.user_id', '=', Auth::id());

        // [サブクエリ2]
        // 上記の結果から、最新の日時を持つレコードを親ボードIDでグループ化
        $child2 = DB::table('child_public_messages as c2')
            ->select(DB::raw('max(c2.created_at) as latest_date'))
            ->whereIn('c2.parent_id', $child1)
            ->groupBy('c2.parent_id');

        // [サブクエリ3]
        // 上記の最新の日時を持つ子レコードを全て取得
        $child3 = DB::table('child_public_messages as c3')
            ->select('*')
            ->whereIn('c3.created_at', $child2);

        // 上記のサブクエリを親テーブルと結合
        $pubmsgss = DB::table('parent_pubmsg as pm')
            ->select('pm.content as a', 'cm.content as b')
            ->joinSub($child3, 'cm', function ($join) {
                $join->on('pm.id', '=', 'cm.parent_id');
            })->get();


        // [ SQL ]
        // select * from parent_pubmsg as pm
        //    join (
        //※1     select * from child_public_messages as c1 where c1.created_at in (
        //※2        select max(c2.created_at) from child_public_messages as c2 where c2.parent_id in (
        //※3           select c3.parent_id from child_public_messages as c3 where c3.user_id = 1
        //       ) group by c2.parent_id
        //    )
        // ) as cm on pm.id = cm.parent_id /* 親と子を結合 */

        //※1[サブクエリ3] - [サブクエリ2]の結果から、最新の日時を持つ子レコードを全て取得
        //※2[サブクエリ2] - [サブクエリ1]の結果から、最新の日時を持つレコードを親ボードIDでグループ化
        //※3[サブクエリ1] - 子メッセージに自分のIDが含まれている親ボードのデータを全て取得







        return view('pubmsg.index', compact('pubmsgs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pubmsg = new ParentMsg;
        $pubmsg->work_id = $request->work_id;
        $pubmsg->user_id = $request->user_id;
        $pubmsg->title = $request->title;
        $pubmsg->content = $request->content;
        $pubmsg->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
