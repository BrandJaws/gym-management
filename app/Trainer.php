<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Trainer extends Model
{
    protected $table = 'trainers';
    protected $fillable = [
        'firstName',
        'lastName',
        'dob',
        'gender',
        'phone',
        'email',
        'password',
        'qualification',
        'note',
        'status',
        'gym_id',
        'specialities',
    ];

    public function userImage()
    {
        return $this->morphOne(Image::class, 'image');
    }

    public static function getTrainerList($searchTerm, $sort_by, $sort_type)
    {
        return self::select([
                'trainers.*',
            ]
        )->where(function ($query) use ($searchTerm, $sort_by, $sort_type) {
            $query->where('trainers.gym_id', '=', Auth::guard('employee')->user()->gym_id);
            if ($searchTerm) {
                $query->where('trainers.firstName', 'like', '%' . $searchTerm . '%')
                    ->orWhere('trainers.lastName', 'like', '%' . $searchTerm . '%')
                    ->orWhere('trainers.gender', 'like', '%' . $searchTerm . '%')
                    ->orWhere('trainers.phone', 'like', '%' . $searchTerm . '%')
                    ->orWhere('trainers.email', 'like', '%' . $searchTerm . '%')
                    ->orWhere('trainers.qualification', 'like', '%' . $searchTerm . '%')
                    ->orWhere('trainers.specialities', 'like', '%' . $searchTerm . '%')
                    ->orWhere('trainers.status', 'like', '%' . $searchTerm . '%');
            }
        })->orderBy($sort_by, $sort_type)->paginate(10);
    }
}
