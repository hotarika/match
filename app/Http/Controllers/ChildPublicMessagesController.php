<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChildPublicMessage;
use App\PublicMessageBadge;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        // 子バッジDB挿入
        $toChildUsers = DB::table('child_public_messages')
            ->select('user_id')
            ->where('parent_id', '=', $request->parent_id)
            ->where('user_id', '<>', Auth::id())
            ->groupBy('user_id')
            ->get()
            ->toArray();

        foreach ($toChildUsers as $toChildUser) {
            $childBadge = new PublicMessageBadge;
            $childBadge->fill([
                'parent_id' => $request->parent_id,
                'work_id' => $request->work_id,
                'user_id' => $toChildUser->user_id,
            ])->save();
        }

        // 親バッジDB挿入（子メッセージにない場合）
        $toParentUsers = DB::table('parent_public_messages')
            ->select('user_id')
            ->where('id', '=', $request->parent_id)
            ->where('user_id', '<>', Auth::id())
            ->first();

        if ($toParentUsers !== null) {
            if (!in_array($toParentUsers, $toChildUsers)) {
                $parentBadge = new PublicMessageBadge;
                $parentBadge->fill([
                    'parent_id' => $request->parent_id,
                    'work_id' => $request->work_id,
                    'user_id' => $toParentUsers->user_id,
                ])->save();
            }
        }

        // DBへメッセージデータを挿入
        $child = new ChildPublicMessage;
        $child->fill([
            'parent_id' => $request->parent_id,
            'user_id' => $request->user_id,
            'content' => $request->content
        ])->save();
    }
}
