<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChildPublicMessage extends Model
{
    protected $table = 'child_public_messages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parent_id', 'user_id', 'content', 'delete_flg'
    ];
}
