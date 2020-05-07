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

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
