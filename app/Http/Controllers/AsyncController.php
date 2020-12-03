<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;


class AsyncController extends Controller
{
    public function getWorks()
    {
        $work = DB::table('works as w')
            ->select('w.id', 'w.user_id as u_id', 'u.name as u_name', 'w.name as w_name', 'u.image', 'w.contract_id', 'w.money_upper', 'w.money_lower')
            ->leftJoin('users as u', 'w.user_id', '=', 'u.id')
            ->get();

        return $work->toJson();
    }
}
