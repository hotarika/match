<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Favorite;
use Illuminate\Support\Carbon;


class AsyncController extends Controller
{
    public function works()
    {
        $work = DB::table('works as w')
            ->select('w.id', 'w.user_id', 'u.name as u_name', 'w.name as w_name', 'u.image', 'w.contract_id', 'w.money_upper', 'w.money_lower')
            ->leftJoin('users as u', 'w.user_id', '=', 'u.id')
            ->get();

        return $work->toJson();
    }

    public function getFavorites()
    {
        $favorites = DB::table('favorites')
            ->select('user_id', 'work_id')
            ->where('user_id', Auth::id())
            ->get();

        return $favorites->toJson();
    }

    public function postFavorites(Request $request)
    {
        $favorite = new Favorite;
        $favorite->user_id = $request->user_id;
        $favorite->work_id = $request->work_id;
        $favorite->created_at = Carbon::now();
        $favorite->updated_at = Carbon::now();
        $favorite->save();
    }

    public function deleteFavorites($user_id, $work_id)
    {
        Favorite::where('user_id', $user_id)->where('work_id', $work_id)->delete();
    }
}
