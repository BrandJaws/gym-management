<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $table = 'trainers';
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
