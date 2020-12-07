<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DirectMessageContent extends Model
{
    protected $table = 'direct_messages_contents';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'board_id', 'user_id', 'content', 'delete_flg'
    ];
}
