<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChildPublicMessage;
use Illuminate\Support\Facades\DB;

class ChildPublicMessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DB::table('child_public_messages')
            ->orderBy('id', 'desc')
            ->take(1)
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $child = new ChildPublicMessage;
        $child->parent_id = $request->parent_id;
        $child->user_id = $request->user_id;
        $child->content = $request->content;
        $child->save();
    }
}
