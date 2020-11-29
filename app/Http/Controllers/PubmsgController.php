<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\ChildMsg;
use App\ParentMsg;

class PubmsgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 最後の行番号（id）を取得（Vueで使用）
        // $pubmsgs = DB::table('parent_pubmsg as pm')
        //     ->select('pm.id', 'pm.title', 'pm.content', 'pm.work_id', 'w.name as work_name', 'pm.user_id', 'u.name as user_name', 'pm.created_at')
        //     ->leftJoin('users as u', 'pm.user_id', '=', 'u.id')
        //     ->leftJoin('works as w', 'pm.work_id', '=', 'w.id')
        //     ->get();

        // 最後の行番号（id）を取得（Vueで使用）
        $pubmsgs = DB::table('parent_pubmsg as pm')
            ->select('pm.id', 'pm.title', 'pm.content', 'pm.work_id', 'w.name as work_name', 'pm.user_id', 'u.name as user_name', 'pm.created_at')
            ->leftJoin('users as u', 'pm.user_id', '=', 'u.id')
            ->leftJoin('works as w', 'pm.work_id', '=', 'w.id')
            ->get();

        // $child = DB::table('child_pubmsg')->where()->get();

        // for ($i = 0; $i < count($child); $i++) {
        //     $child[$i]->parent_id;
        // }



        return view('pubmsg.index', compact('pubmsgs'));
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
        $pubmsg = new ParentMsg;
        $pubmsg->work_id = $request->work_id;
        $pubmsg->user_id = $request->user_id;
        $pubmsg->title = $request->title;
        $pubmsg->content = $request->content;
        $pubmsg->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
