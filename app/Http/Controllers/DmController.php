<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DmBoard;
use App\DmContent;
use Illuminate\Support\Facades\DB;

class DmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 時間が一緒だと全て出力されるので注意
        ////////////////////////////////////////////////////////////////////
        $child = DB::table('dm_contents as a')
            ->whereIn(
                DB::raw('a.created_at'),
                function ($query) {
                    return $query->select(DB::raw('max(b.created_at) as max'))
                        ->from('dm_contents as b')
                        ->groupBy('b.board_id')->get();
                }
            )
            ->get();
        echo $child;
        /////////////////////////////////////////////////////////////////////

        $boards = array();
        $boards = DB::table('dm_boards as b')
            ->select('b.id', 'b.work_id', 'w.name as work_name', 'b.owner_user_id', 'u.name as user_name', 'u.image')
            ->leftJoin('users as u', 'b.owner_user_id', '=', 'u.id')
            ->leftJoin('works as w', 'b.work_id', '=', 'w.id')
            ->get();

        // 親ボードに最新のコンテンツを挿入
        foreach ($boards as $key => $value) {
            for ($i = 0; $i < count($boards); $i++) {
                if ($value->id === $child[$i]->board_id) {
                    $boards[$key]->latest_content = $child[$i]->content;
                }
            }
        }

        return view('dm.index', compact('boards'));
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
        $dm = new DmContent;
        $dm->work_id = $request->work_id;
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
        $board = '';

        $contents = DB::table('dm_contents as c')
            ->select('c.id as contents_id',  'c.board_id', 'c.user_id', 'c.content', 'c.created_at')
            ->leftJoin('works as w', 'c.work_id', '=', 'w.id')
            ->leftJoin('users as u', 'w.user_id', '=', 'u.id')
            ->where('board_id', $id)
            ->get();

        echo $contents;

        return view('dm.show', compact('contents'));
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
