<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DirectMessageContent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DirectMessagesContentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        // left join direct_messages_boards as b on c.`board_id` = b.id
        // left join works as w on b.`work_id` = w.id
        // left join users as u on w.user_id = u.id
        $info = DB::table('direct_messages_boards as b')
            ->select('b.id as board_id', 'w.name as work_name', 'w.user_id as orderer_id', 'u1.name as owner_user_name', 'u1.image as owner_img', 'b.applicant_id', 'u2.name as applicant_name', 'u2.image as order_img')
            ->leftJoin('works as w', 'b.work_id', '=', 'w.id')
            ->leftJoin('users as u1', 'w.user_id', '=', 'u1.id')
            ->leftJoin('users as u2', 'b.applicant_id', '=', 'u2.id')
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
