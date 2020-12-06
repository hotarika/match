<?php
// チェック済み

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class MyPageController extends Controller
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
        // 通知機能
        // *******************************
        $user = User::find(Auth::id());
        foreach ($user->unreadNotifications as $key => $value) {
            if ($value) {
                $notification[$key] = $value;
            }
        }
        // 通知がなかった場合はundefinedになるため、null値を格納してエラー回避
        if (!isset($notification)) {
            $notification = null;
        }

        // マイページの通知以外のデータは非同期（axios）により取得している
        return view('mypage', compact('notification'));
    }
}
