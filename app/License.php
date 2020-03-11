<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    protected $table = 'licenses';
    protected $fillable = [
        'name',
        'startDate',
        'endDate',
        'amount',
        'gym_id',
    ];
}
