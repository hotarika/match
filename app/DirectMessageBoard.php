<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DirectMessageBoard extends Model
{
    protected $table = 'direct_messages_boards';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'work_id', 'applicant_id', 'delete_flg'
    ];
}
