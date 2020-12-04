<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DmBoard;
use App\DirectMessageContent;
// use App\DmContent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

        return view('dm.index', compact('boards'));
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
        // $dm = new DmContent;
        $dm = new DirectMessageContent;
        $dm->board_id = $request->board_id;
        $dm->user_id = $request->user_id;
        $dm->content = $request->content;
        $dm->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // DM情報
        // select * from dm_contents as c
        // left join dm_boards as b on c.`board_id` = b.id
        // left join works as w on b.`work_id` = w.id
        // left join users as u on w.user_id = u.id
        $info = DB::table('dm_boards as b')
            ->select('b.id as board_id', 'w.name as work_name', 'b.owner_user_id', 'u1.name as owner_user_name', 'u1.image as owner_img', 'b.order_user_id', 'u2.name as order_user_name', 'u2.image as order_img')
            ->leftJoin('works as w', 'b.work_id', '=', 'w.id')
            ->leftJoin('users as u1', 'b.owner_user_id', '=', 'u1.id')
            ->leftJoin('users as u2', 'b.order_user_id', '=', 'u2.id')
            ->where('b.id', $id)
            ->first();

        // echo $info;

        // メッセージの出力
        $contents = DB::table('direct_messages_contents as c')
            ->select('c.id as contents_id', 'c.board_id', 'c.user_id', 'c.content', 'c.created_at',)
            ->where('board_id', $id)
            ->get();
        // echo $contents;

        return view('dm.show', compact('contents', 'info'));
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
