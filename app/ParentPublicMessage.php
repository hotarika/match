<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParentPublicMessage extends Model
{
    protected $table = 'parent_public_messages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'work_id', 'user_id', 'title', 'content', 'delete_flg'
    ];
}
