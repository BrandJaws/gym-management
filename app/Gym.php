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
        'country',
        'status',
        'state',
        'license_id',
        'parent_id',
    ];

    public static function getGymList($query, $sort_by, $sort_type)
    {
        return DB::table('gyms')
            ->where('name', 'like', '%' . $query . '%')
            ->orWhere('city', 'like', '%' . $query . '%')
            ->orWhere('address', 'like', '%' . $query . '%')
            ->orWhere('country', 'like', '%' . $query . '%')
            ->orWhere('status', 'like', '%' . $query . '%')
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);
    }

    public static function getGymBranchList($query, $sort_by, $sort_type, $id)
    {
        return Gym::where('parent_id', $id)
            ->where('name', 'like', '%' . $query . '%')
            ->orWhere('city', 'like', '%' . $query . '%')
            ->orWhere('address', 'like', '%' . $query . '%')
            ->orWhere('country', 'like', '%' . $query . '%')
            ->orWhere('status', 'like', '%' . $query . '%')
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);
    }

    public function employee()
    {
        return $this->hasOne(Employee::class, 'id');
    }

    public function gymLicense()
    {
        return $this->hasOne(License::class);
    }

    public function services()
    {
        return $this->hasMany('App\GymServices', 'gym_id');
    }

    public function country()
    {
        return $this->hasMany('App\Country', 'gym_id', 'id');
    }

    public function membership()
    {
        return $this->hasMany('App\Membership', 'gym_id');
    }
}
