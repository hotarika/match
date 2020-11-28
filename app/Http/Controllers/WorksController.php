<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            'contract' => 'required',
            'moneyLower' => 'required_if:contract,1',
            'moneyUpper' => 'required_if:contract,1',
            'content' => 'required',
        ];
        $this->validate($request, $validate_rule);

        $work = new Work;
        $work->user_id = Auth::id();
        $work->name = $request->name;
        $work->contract_id = $request->contract;
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
        $work = DB::table('works as w')
            ->select('w.id as work_id', 'w.name as work_name', 'u.id as owner_id', 'u.name as owner_name', 'w.contract_id', 'c.type', 'w.end_date', 'w.hope_date', 'w.money_lower', 'w.money_upper', 'w.content', 'w.created_at')
            ->leftJoin('users as u', 'w.user_id', '=', 'u.id')
            ->leftJoin('contracts as c', 'w.contract_id', '=', 'c.id')
            ->where('w.id', $id)->first();

        $work->end_date =  date("Y/m/d", strtotime($work->end_date));
        $work->hope_date =  date("Y/m/d", strtotime($work->hope_date));
        $work->created_at =  date("Y/m/d", strtotime($work->created_at));
        $work->money_lower =  number_format($work->money_lower);
        $work->money_upper =  number_format($work->money_upper);

        // 残り日数
        $from = strtotime($work->end_date);
        $to = strtotime('now');
        $diff = $from - $to;
        $diff_date = floor($diff / 60 / 60 / 24); /* [差分/60秒/60分/24時間 = 残り日数] */
        if ($diff_date >= 1) {
            $work->remaining_date = 'あと' . $diff_date . '日';
        } else {
            $work->remaining_date = "本日終了";
        }

        return view('works.show', compact('work'));
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
