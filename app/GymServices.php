<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
