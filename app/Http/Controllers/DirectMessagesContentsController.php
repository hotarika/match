<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DirectMessageContent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DirectMessagesContentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // axios
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
        // left join direct_messages_boards as b on c.`board_id` = b.id
        // left join works as w on b.`work_id` = w.id
        // left join users as u on w.user_id = u.id
        $info = DB::table(
            'direct_messages_boards as b'
        )
            ->select(
                'b.id as board_id',
                'b.work_id as w_id',
                'w.name as w_name',
                // 発注者
                'w.user_id as orderer_id',
                'u1.name as orderer_name',
                'u1.image as orderer_image',
                // 受注者
                'b.applicant_id',
                'u2.name as applicant_name',
                'u2.image as applicant_image',
            )
            ->leftJoin('works as w', 'b.work_id', '=', 'w.id')
            ->leftJoin('users as u1', 'w.user_id', '=', 'u1.id') // 発注者
            ->leftJoin('users as u2', 'b.applicant_id', '=', 'u2.id') // 応募者
            ->where('b.id', $id)
            ->first();

        // メッセージの出力
        $contents = DB::table('direct_messages_contents as c')
            ->select(
                'c.id as content_id',
                'c.board_id',
                'c.user_id',
                'c.content',
                'c.created_at',
            )
            ->where('board_id', $id)
            ->get();

        return view('dm.show', compact('contents', 'info'));
    }
}
