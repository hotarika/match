<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Auth;

class ChangePasswordController extends Controller
{

    public function __construct()
    {
        //
    }

    public function showChangePasswordForm()
    {
        return view('auth/passwords/change');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        //ValidationはChangePasswordRequestで処理
        $user = Auth::user();
        $user->password = bcrypt($request->get('password'));
        $user->save();

        // パスワード変更処理後、マイページにリダイレクト
        return redirect()->route('mypage')
            ->with('flash_message', 'パスワードを変更しました');
    }
}
