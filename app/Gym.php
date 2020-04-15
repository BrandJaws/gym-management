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
        'gymType'
    ];

    public static function getGymList($searchTerm, $sort_by, $sort_type)
    {
        return self::select([
                'gyms.*',
            ]
        )->where(function ($query) use ($searchTerm,$sort_by,$sort_type) {
            $query->where('gyms.gymType','=','parent');
            if ($searchTerm) {
                $query->where('gyms.name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('gyms.city', 'like', '%' . $searchTerm . '%')
                    ->orWhere('gyms.address', 'like', '%' . $searchTerm . '%')
                    ->orWhere('gyms.status', 'like', '%' . $searchTerm . '%')
                    ->orWhere('gyms.country', 'like', '%' . $searchTerm . '%');
            }
        })->orderBy($sort_by, $sort_type)->paginate(10);
    }

    public static function getGymBranchList($searchTerm, $sort_by, $sort_type,$id)
    {
        return self::select([
                'gyms.*',
            ]
        )->where(function ($query) use ($searchTerm,$sort_by,$sort_type,$id) {
            $query->where('gyms.parent_id', $id)->where('gyms.gymType','=','child');
            if ($searchTerm) {
                $query->where('gyms.name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('gyms.city', 'like', '%' . $searchTerm . '%')
                    ->orWhere('gyms.address', 'like', '%' . $searchTerm . '%')
                    ->orWhere('gyms.status', 'like', '%' . $searchTerm . '%')
                    ->orWhere('gyms.country', 'like', '%' . $searchTerm . '%');
            }
        })->orderBy($sort_by, $sort_type)->paginate(10);
    }

    public function gymImage()
    {
        return $this->morphOne(Image::class, 'image');
    }

    public function employee()
    {
        return $this->hasOne(Employee::class, 'gym_id');
    }

    public function gymLicense()
    {
        return $this->hasOne(License::class, 'gym_id');
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

    public function gymPermissions()
    {
        return $this->hasMany(GymPermission::class, 'gym_id', 'id');
    }
    public function parentGymPermissions()
    {
        return $this->hasMany(GymPermission::class, 'gym_id', 'parent_id');
    }
}
