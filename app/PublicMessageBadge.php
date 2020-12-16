<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicMessageBadge extends Model
{
    protected $table = 'public_messages_badges';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parent_id', 'work_id', 'user_id'
    ];
}
