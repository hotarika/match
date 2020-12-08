<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;
use App\DirectMessageBoard;
use Illuminate\Support\Facades\DB;

class DirectMessagesBoardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dm.index');
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

        if ($request->decide === "true") {
            return redirect()
                ->route('dm-contents.show', DB::getPdo()->lastInsertId())
                ->with('flash_message', '決定者と詳細について連絡を取りましょう！');
        } else {
            return redirect()
                ->route('dm-contents.show', DB::getPdo()
                    ->lastInsertId());
        }
    }
}
