<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;
use App\User;
use Illuminate\Support\Facades\Auth;

class WorksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('works.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('works.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate_rule = [
            'name' => 'required',
            'endRecruitment' => 'required | date',
            'hopeDeadline' => 'required | date',
            'tieUp' => 'required',
            'moneyLower' => 'required | between:0,150',
            'moneyUpper' => 'required | between:0,150',
            'content' => 'required',
        ];
        $this->validate($request, $validate_rule);

        $work = new Work;
        $work->user_id = Auth::id();
        $work->name = $request->name;
        $work->contract_id = $request->tieUp;
        $work->end_date = $request->endRecruitment;
        $work->hope_date = $request->hopeDeadline;
        $work->money_lower = $request->moneyLower;
        $work->money_upper = $request->moneyUpper;
        $work->content = $request->content;
        $work->save();

        return redirect()->route('works.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('works.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('works.form');
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
