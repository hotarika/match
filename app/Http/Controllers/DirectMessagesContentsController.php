<?php

namespace App\Http\Controllers;

use App\DirectMessageBadge;
use Illuminate\Http\Request;
use App\DirectMessageContent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $toUser = DB::table('direct_messages_boards as dm')
            ->select('w.user_id as orderer_id', 'dm.applicant_id')
            ->where('dm.id', "=", $request->board_id)
            ->leftJoin('works as w', 'dm.work_id', '=', 'w.id')
            ->first();

        $badge = new DirectMessageBadge;
        $badge->fill([
            'board_id' => $request->board_id,
            'user_id' => (Auth::id() === $toUser->orderer_id) ? $toUser->applicant_id : $toUser->orderer_id,
        ])->save();

        // axiosからデータを受け取り
        $dm = new DirectMessageContent;
        $dm->fill($request->all())->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // バッジの削除
        $badge = DirectMessageBadge::where('board_id', $id)
            ->where('user_id', Auth::id())->delete();

        // DM情報（DMの氏名などが記述されているヘッダー部分のデータ）
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

        if ($info !== null) {
            if ($info->orderer_id == Auth::id() || $info->applicant_id == Auth::id()) {
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
                    ->orderBy('created_at', 'ASC')
                    ->get();

                return view('dm.show', compact('contents', 'info'));
            } else {
                return redirect()->route('dm-boards.index');
            }
        } else {
            return redirect()->route('dm-boards.index');
        }
    }
}
