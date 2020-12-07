<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'contract_id',
        'end_date',
        'hope_date',
        'price_lower',
        'price_upper',
        'content',
        'state',
        'delete_flg'
    ];
}
