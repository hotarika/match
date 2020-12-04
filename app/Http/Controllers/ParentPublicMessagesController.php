<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\ParentMsg;
use Illuminate\Support\Facades\Auth;

class ParentPublicMessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $pubmsgs = DB::table('parent_public_messages as pm')
            ->select(
                'pm.id as pm_id',
                'pm.title as pm_title',
                'pm.content as pm.content',
                'pm.work_id as w_id',
                'w.name as w_name',
                'pm.user_id as u_id',
                'u.name as u_name',
                'pm.created_at as pm_created_at',
                'cm.content as cm_latest_content',
                'cm.created_at as cm_latest_date'
            )
            ->leftJoin('users as u', 'pm.user_id', '=', 'u.id')
            ->leftJoin('works as w', 'pm.work_id', '=', 'w.id')
            ->joinSub($child3, 'cm', function ($join) {
                $join->on('pm.id', '=', 'cm.parent_id');
            })->get();
        // pm = public message の略
        // cm = child message の略

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
