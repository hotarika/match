<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Notifications\ApplicantsNotification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Notification;
use App\DirectMessageBoard;
use App\Work;
use App\Notifications\DecisionNotification;

class ApplicantsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 仕事発注者へ応募の通知
        $toOrderer = User::find($request->owner_id);
        $fromApplicant = Auth::user();
        $toOrderer->notify(new ApplicantsNotification($fromApplicant, $request));

        // 応募キャンセル機能を付けているため、もし一度応募をキャンセルしたが再度応募した場合に、DBにボードが以前作成されているかどうかを判断しそれぞれの処理をする
        if (!DirectMessageBoard::where('work_id', '=', $request->work_id)
            ->where('applicant_id', '=', Auth::id())
            ->count()) {

            // ダイレクトメッセージのボードを作成
            $board = new DirectMessageBoard;
            $board->fill([
                'work_id' => $request->work_id,
                'applicant_id' => Auth::id(),
            ])->save();
        }

        // 応募者情報をDB保存
        $applicant = new Applicant;
        $applicant->fill([
            'work_id' => $request->work_id,
            'applicant_id' => Auth::id()
        ])->save();


        return redirect()->route('works.index')
            ->with('flash_message', '応募しました');
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
            ->select(
                'a.id',
                'a.work_id as w_id',
                'w.state as w_state',
                'w.name as w_name',
                'a.applicant_id',
                'u.name as u_name',
                'u.image as u_image',
                'a.state as applicant_state',
                'b.id as board_id'
            )
            ->leftJoin('users as u', 'a.applicant_id', '=', 'u.id')
            ->leftJoin('works as w', 'a.work_id', '=', 'w.id')
            ->leftJoin('direct_messages_boards as b', function ($join) {
                // 複合キーでの結合
                $join->on('a.work_id', '=', 'b.work_id');
                $join->on('a.applicant_id', '=', 'b.applicant_id');
            })
            ->where('a.work_id', $id)
            ->orderBy('a.created_at', 'ASC')
            ->get();

        $work = DB::table('works')
            ->select('id', 'name')
            ->where('id', $id)
            ->first();

        return view('applicant', compact('applicants', 'work'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $applicant_id)
    {
        // 応募者へ決定を通知
        $toApplicant =  User::find($applicant_id); // 通知先
        $fromOrderer = Auth::user(); // 通知者
        $toApplicant->notify(new DecisionNotification($fromOrderer, $request));

        // 応募者テーブルの更新
        $applicant = Applicant::find($request->applicant_table_id);
        $applicant->fill(['state' => 2])->save(); // state:2 = 応募者決定

        // 仕事テーブルの更新
        $work = Work::find($request->w_id);
        $work->fill(['state' => 2])->save(); // state:2 = 応募終了

        return redirect()->route('dm-contents.show', $request->board_id)
            ->with('flash_message', '決定者と詳細について連絡を取りましょう！');;
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
