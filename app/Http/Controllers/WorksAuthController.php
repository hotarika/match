<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Applicant;

class WorksAuthController extends Controller
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
            'contract' => 'required',
            'priceLower' => 'required_if:contract,1',
            'priceUpper' => 'required_if:contract,1',
            'content' => 'required',
        ];
        $this->validate($request, $validate_rule);

        $work = new Work;
        $work->user_id = Auth::id();
        $work->name = $request->name;
        $work->contract_id = $request->contract;
        $work->end_date = $request->endRecruitment;
        $work->hope_date = $request->hopeDeadline;
        $work->price_lower = $request->priceLower;
        $work->price_upper = $request->priceUpper;
        $work->content = $request->content;
        $work->save();

        return redirect()->route('works.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $work = Work::find($id);
        return view('works.form', compact('work'));
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
        $work = Work::find($id);
        $work->name = $request->name;
        $work->contract_id = $request->contract;
        $work->end_date = $request->endRecruitment;
        $work->hope_date = $request->hopeDeadline;
        $work->price_lower = $request->priceLower;
        $work->price_upper = $request->priceUpper;
        $work->content = $request->content;
        $work->save();

        return redirect()->route('works.show', $work->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Work::find($id)->delete();
        return redirect()->route('works.index');
    }
}
