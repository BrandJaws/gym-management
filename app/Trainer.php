<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    public static function getTrainerList($query, $sort_by, $sort_type)
    {
        return DB::table('trainers')
            ->where('name', 'like', '%' . $query . '%')
            ->orWhere('email', 'like', '%' . $query . '%')
            ->orWhere('gender', 'like', '%' . $query . '%')
            ->orWhere('phone', 'like', '%' . $query . '%')
            ->orWhere('qualification', 'like', '%' . $query . '%')
            ->orWhere('speciality', 'like', '%' . $query . '%')
            ->orWhere('status', 'like', '%' . $query . '%')
            ->orWhere('note', 'like', '%' . $query . '%')
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);
    }
}
