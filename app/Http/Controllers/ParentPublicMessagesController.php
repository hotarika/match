<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParentPublicMessage;
use App\PublicMessageBadge;
use Illuminate\Support\Facades\DB;
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
        // メッセージのリスト
        return view('pubmsg.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // DBへ保存
        $pubmsg = new ParentPublicMessage;
        $pubmsg->fill([
            "work_id" => $request->work_id,
            "user_id" => $request->user_id,
            "title" => $request->title,
            "content" => $request->content,
        ])->save();
        // 最後のid取得
        $lastInsertId = $pubmsg->id;

        // バッジDB挿入
        //（もし仕事の依頼者が現在のログインユーザーと違ければバッジ挿入）
        $toUser = DB::table('parent_public_messages as p')
            ->select('w.user_id as orderer_id')
            ->leftJoin('works as w', 'p.work_id', '=', 'w.id')
            ->where('w.id', '=', $request->work_id)
            ->first();

        if ($toUser->orderer_id !== Auth::id()) {
            $badge = new PublicMessageBadge;
            $badge->fill([
                'parent_id' => $lastInsertId,
                'work_id' => $request->work_id,
                'user_id' => $toUser->orderer_id
            ])->save();
        }
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
        // axiosからのイベントを受け取って下記を発火
        // 子メッセージが挿入された段階で、親メッセージのupdated_atを更新
        $pubmsg  = ParentPublicMessage::find($id);
        $pubmsg->fill(['updated_at' => date("Y-m-d H:i:s")])->save();
    }
}
