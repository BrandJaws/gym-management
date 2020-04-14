<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeePermission extends Model
{
    protected $table = 'employee_permissions';
    protected $fillable = [
        'gym_id',
        'gym_module_id',
        'employee_id',
        'status'
    ];

    public function gymModules()
    {
        return $this->belongsToMany(GymModule::class, 'gym_module_id');
    }
}
