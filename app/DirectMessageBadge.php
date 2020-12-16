<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DirectMessageBadge extends Model
{
    protected $table = 'direct_messages_badges';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'board_id', 'user_id'
    ];
}
