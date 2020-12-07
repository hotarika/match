<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'work_id', 'applicant_id', 'state',
    ];
}
