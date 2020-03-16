<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GymPermission extends Model
{
    protected $table = 'gym_permissions';
    protected $fillable = [
        'gym_id',
        'gym_module_id',
        'status'
    ];

    public function gymModules()
    {
        return $this->belongsTo(GymModule::class, 'gym_module_id', 'id');
    }
}
