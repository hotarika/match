<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;


class AsynchronousController extends Controller
{
    public function getWorks()
    {
        $work = DB::table('works as w')
            ->select(
                'w.id',
                'w.name as w_name',
                'w.user_id as u_id',
                'u.name as u_name',
                'u.image as u_image',
                'w.contract_id',
                'w.end_date',
                'w.price_lower',
                'w.price_upper',
            )
            ->leftJoin('users as u', 'w.user_id', '=', 'u.id')
            ->get();

        return $work->toJson();
    }

    public function getNotificationsBadgeNumber()
    {
        $count = DB::table('notifications')
            ->select(DB::raw('count(*) as count'))
            ->where('notifiable_id', '=', Auth::id())
            ->whereNull('read_at')
            ->get();

        return $count->toJson();
    }
}
