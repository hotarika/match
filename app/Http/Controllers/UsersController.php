<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $user = User::find($user_id);

        $ordersCount = DB::table('works')
            ->where('user_id', '=', $user_id)
            ->where('state', '=', 2)
            ->count();

        $ordersReceivedCount = DB::table('applicants')
            ->where('applicant_id', '=', $user_id)
            ->where('state', '=', 2)
            ->count();

        return view("users.show", compact('user', 'ordersCount', 'ordersReceivedCount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);

        // ストレージファイルに保存（もし前回、画像登録をしていた場合、その画像を削除）
        if ($request->image) {
            if ($user->image !== 'no-image.png') {
                Storage::delete('public/user_img/' . $user->image);
            }
            Storage::disk('public')
                ->putFile('user_img', $request->file('image'));
        }

        // DB保存
        $user->fill([
            'name' => $request->name,
            'email' => $request->email,
            'image' => ($request->file())
                ? $request->file('image')->hashName()
                : $user->image,
            'introduction' => $request->introduction,
        ])->save();

        return redirect()->route('users.show', $id);
    }
}
