<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Gym extends Model
{
    use Notifiable;
    protected $table = 'gyms';
    protected $fillable = [
        'name',
        'inTrial',
        'trialEndsAt',
        'city',
        'address',
        'status',
        'state_id',
        'license_id',
        'parent_id',
    ];

    public static function getGymList($query, $sort_by, $sort_type)
    {
        return DB::table('employees')
            ->where('name', 'like', '%' . $query . '%')
            ->orWhere('city', 'like', '%' . $query . '%')
            ->orWhere('address', 'like', '%' . $query . '%')
            ->orWhere('status', 'like', '%' . $query . '%')
            ->orderBy($sort_by, $sort_type)
            ->paginate(5);
    }
}
