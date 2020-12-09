<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Applicant;
use App\Http\Requests\WorkRequest;

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
        // 日付フォームのplaceholderに日付の自動更新のため使用（safari対応）
        $oneMonthLater = date("Y/m/d", strtotime("+1 month"));
        $threeMonthsLater = date("Y/m/d", strtotime("+3 month"));

        return view('works.form', compact('oneMonthLater', 'threeMonthsLater'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkRequest $request)
    {
        $work = new Work;
        $work->fill([
            'user_id' => Auth::id(), // fill($request->all())は使用できない
            'name' => $request->name,
            'contract_id' => $request->contract_id,
            'end_date' => $request->end_date,
            'hope_date' => $request->hope_date,
            'price_lower' => $request->price_lower,
            'price_upper' => $request->price_upper,
            'content' => $request->content,
        ])->save();

        return redirect()->route('works.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($work_id)
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
                'u.image as orderer_image',
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
            ->where('w.id', $work_id)->first();

        // 日付・金額形式の変換
        $work->end_date =  date("Y/m/d", strtotime($work->end_date));
        $work->hope_date =  date("Y/m/d", strtotime($work->hope_date));
        $work->created_at =  date("Y/m/d", strtotime($work->created_at));
        $work->price_lower =  number_format($work->price_lower);
        $work->price_upper =  number_format($work->price_upper);

        // 残り日数
        $from = strtotime($work->end_date);
        $to = strtotime('now');
        $diff = $from - $to;
        // [差分/60秒/60分/24時間 = 残り日数]
        // その日付の23:59分終了のため + 1
        $diff_date = floor($diff / 60 / 60 / 24 + 1);
        if ($diff_date >= 1) {
            $work->remaining_date = 'あと' . $diff_date . '日';
        } elseif ($diff_date == 0) {
            $work->remaining_date = "本日終了";
        } else {
            $work->remaining_date = "終了";
        }

        // 応募ボタン
        $applicant = DB::table('applicants as a')
            ->select('*')
            ->where('applicant_id', Auth::id())
            ->where('work_id', $work->w_id)
            ->first();

        // 応募人数のカウント
        $countApplicants = DB::table('applicants as a')
            ->where('work_id', $work_id)
            ->count();

        // **********************************
        // パブリックメッセージ
        // **********************************
        $authUser = Auth::user();

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
            ->where('work_id', $work_id)
            ->orderBy('pm.updated_at', 'DESC')
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
            'authUser',
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
    public function update(WorkRequest $request, $id)
    {
        $work = Work::find($id);
        $work->fill($request->all())->save();

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
