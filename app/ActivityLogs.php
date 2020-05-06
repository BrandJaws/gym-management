<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityLogs extends Model
{
    protected $table = 'activity_logs';
    protected $fillable = [
        'gym_id',
        'employee_id',
        'activity'
    ];
}
