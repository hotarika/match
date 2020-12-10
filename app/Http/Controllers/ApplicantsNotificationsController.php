<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;

class ApplicantsNotificationsController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // notificationsテーブルのread_atカラムを更新
        $notification = Notification::find($id);
        $notification->fill($request->all())->save();
    }
}
