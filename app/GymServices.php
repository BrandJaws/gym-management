<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GymServices extends Model
{
    protected $table = 'gym_services';
    protected $fillable = [
        'name',
        'code',
        'fee',
        'status',
        'gym_id',
    ];
}
