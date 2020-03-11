<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $fillable = [
        'name',
        'code',
        'fee',
        'status',
        'gym_id',
    ];

}
