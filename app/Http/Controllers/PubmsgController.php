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
        // 子
        $child = DB::table('child_pubmsg as c')->whereIn(
            DB::raw('c.created_at'),
            function ($query) {
                return $query->select(DB::raw('max(cc.created_at) as max'))
                    ->from('child_pubmsg as cc')
                    ->groupBy('cc.parent_id');
            }
        );

        // 親子結合
        $pubmsgs = DB::table('parent_pubmsg as p')
            ->select('p.id', 'p.title', 'p.content',  'p.work_id', 'w.name as work_name', 'p.user_id', 'u.name as user_name', 'p.created_at', 'c.content as latest_content', 'c.created_at as latest_date')
            ->leftJoin('users as u', 'p.user_id', '=', 'u.id')
            ->leftJoin('works as w', 'p.work_id', '=', 'w.id')
            ->leftJoinSub($child, 'c', function ($join) {
                $join->on('p.id', '=', 'c.parent_id');
            })
            ->orderBy('latest_date', 'DESC')
            ->get();

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
