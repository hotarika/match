<?php

namespace App\Http\Controllers;

use App\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApplicantController extends Controller
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
        $applicant = new Applicant;
        $applicant->work_id = $request->work_id;
        $applicant->applicant_id = Auth::id();
        $applicant->save();

        return redirect()->route('works.index')
            ->with('flash_message', '応募しました');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $applicants = DB::table('applicants as a')
            ->select('a.applicant_id', 'u.name as user_name', 'u.image', 'b.id as board_id')
            ->leftJoin('users as u', 'a.applicant_id', '=', 'u.id')
            ->leftJoin('dm_boards as b', function ($join) {
                $join->on('a.work_id', '=', 'b.work_id');
                $join->on('a.applicant_id', '=', 'b.order_user_id');
            })
            ->where('a.work_id', $id)
            ->get();

        $work = DB::table('works')
            ->select('id', 'name')
            ->where('id', $id)
            ->first();

        // $board = DB::table('dm_boards as b')
        //     ->select('*')
        //     ->where('b.work_id', $id)
        //     ->where('')
        //     ->get();

        return view('applicant', compact('applicants', 'work'));
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
        Applicant::find($id)->delete();
        return redirect()->route('works.index');
    }
}
