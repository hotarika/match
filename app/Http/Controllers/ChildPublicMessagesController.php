<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChildPublicMessage;
use Illuminate\Support\Facades\DB;

class ChildPublicMessagesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $child = new ChildPublicMessage;
        $child->fill($request->all())->save();
    }
}
