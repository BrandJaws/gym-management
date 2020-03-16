<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GymModule extends Model
{
    protected $table = 'gym_modules';
    protected $fillable = [
        'name',
        'status',
    ];
}
