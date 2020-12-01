<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;
use App\DmBoard;
use Illuminate\Support\Facades\DB;

class DmBoardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // 決定ボタンを押した時に、stateを2(決定)に変更
        if ($request->decide === "true") {
            $applicant = Applicant::find($request->applicant_board_id);
            $applicant->state = 2;
            $applicant->save();
        }

        $board = new DmBoard;
        $board->work_id = $request->work_id;
        $board->owner_user_id = $request->owner_user_id;
        $board->order_user_id = $request->order_user_id;
        $board->save();

        if ($request->decide === "true") {
            return redirect()
                ->route('dm.show', DB::getPdo()->lastInsertId())
                ->with('flash_message', '決定者と詳細について連絡を取りましょう！');
        } else {
            return redirect()
                ->route('dm.show', DB::getPdo()
                    ->lastInsertId());
        }
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
