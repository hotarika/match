<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Applicant;

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
        $work->price_lower = $request->priceLower;
        $work->price_upper = $request->priceUpper;
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
    public function show($w_id)
    {
        // **********************************
        // 仕事詳細
        // **********************************
        $work = DB::table('works as w')
            ->select(
                'w.id as w_id',
                'w.name as w_name',
                'u.id as orderer_id',
                'u.name as orderer_name',
                'w.contract_id',
                'c.type',
                'w.end_date',
                'w.hope_date',
                'w.price_lower',
                'w.price_upper',
                'w.content',
                'w.created_at',
                'w.state as w_state'
            )
            ->leftJoin('users as u', 'w.user_id', '=', 'u.id')
            ->leftJoin('contracts as c', 'w.contract_id', '=', 'c.id')
            ->where('w.id', $w_id)->first();

        $work->end_date =  date("Y/m/d", strtotime($work->end_date));
        $work->hope_date =  date("Y/m/d", strtotime($work->hope_date));
        $work->created_at =  date("Y/m/d", strtotime($work->created_at));
        $work->price_lower =  number_format($work->price_lower);
        $work->price_upper =  number_format($work->price_upper);

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

        // 応募ボタン
        $applicant = DB::table('applicants as a')
            ->select('*')
            ->where('applicant_id', Auth::id())
            ->where('work_id', $work->w_id)
            ->first();

        // 応募人数のカウント
        $countApplicants = DB::table('works as w')
            ->leftJoin('applicants as a', 'w.id', '=', 'a.work_id')
            ->where('w.id', $w_id)
            ->count();

        // **********************************
        // パブリックメッセージ
        // **********************************
        $work_id = $w_id; // Vueに渡すために変数に格納
        $user = Auth::user();

        // 親掲示板
        $parent_msg = DB::table(
            'parent_public_messages as pm'
        )
            ->select(
                'pm.id as pm_id',
                'pm.user_id as u_id',
                'u.name as u_name',
                'u.image as u_image',
                'pm.title as pm_title',
                'pm.content as pm_content',
                'pm.created_at as pm_created_at'
            )
            ->leftJoin('users as u', 'pm.user_id', '=', 'u.id')
            ->where('work_id', $w_id)
            ->orderBy('pm.created_at', 'DESC')
            ->get();

        // 子掲示板
        $child_msg = DB::table(
            'child_public_messages as cm'
        )
            ->select(
                'cm.id as cm_id',
                'cm.parent_id',
                'cm.user_id as u_id',
                'u.name as u_name',
                'u.image as u_image',
                'cm.content as cm_content',
                'cm.created_at as cm_created_at'
            )
            ->leftJoin('users as u', 'cm.user_id', '=', 'u.id')
            ->orderBy('cm.created_at', 'ASC')
            ->get();

        // **********************************
        // return
        // **********************************
        return view('works.show', compact(
            // 商品詳細
            'work',
            'applicant',
            'countApplicants',
            // パブリックメッセージ
            'user',
            'work_id',
            'parent_msg',
            'child_msg',
        ));
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
