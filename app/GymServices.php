<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

    public static function getServiceCode($name)
    {
        $latest = GymServices::orderBy('id', 'desc')->first();
        if (!$latest) {
            return $name . '_0001';
        }
        $string = preg_replace("/[^0-9\.]/", '', $latest->code);
        return $name . '_' . sprintf('%04d', $string + 1);
    }

    public static function getServiceList($searchTerm, $sort_by, $sort_type)
    {
        return self::select([
                'gym_services.*',
            ]
        )->where(function ($query) use ($searchTerm, $sort_by, $sort_type) {
            $query->where('gym_services.gym_id', Auth::guard('employee')->user()->gym_id);
            if ($searchTerm) {
                $query->where('gym_services.name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('gym_services.code', 'like', '%' . $searchTerm . '%')
                    ->orWhere('gym_services.fee', 'like', '%' . $searchTerm . '%')
                    ->orWhere('gym_services.status', 'like', '%' . $searchTerm . '%')
                    ->orWhere('gym_services.gym_id', 'like', '%' . $searchTerm . '%');
            }
        })->orderBy($sort_by, $sort_type)->paginate(10);
    }
    public function gym()
    {
        return $this->belongsTo(Gym::class, 'gym_id');
    }
}
