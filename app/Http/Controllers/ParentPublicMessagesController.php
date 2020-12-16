<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParentPublicMessage;

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
        $pubmsg = new ParentPublicMessage;
        $pubmsg->fill($request->all())->save();
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
