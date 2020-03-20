<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use SoftDeletes;
    protected $table = 'members';
    protected $fillable = [
        'gym_id',
        'membership_id',
        'name',
        'code',
        'email',
        'password',
        'phone',
        'joiningDate',
        'address',
        'source',
        'remarks',
        'status',
        'type'
    ];

    public function userImage()
    {
        return $this->morphOne(Image::class, 'image');
    }

    public static function getMemberList($searchTerm, $sort_by, $sort_type)
    {
        return self::select([
                'members.*',
            ]
        )->where(function ($query) use ($searchTerm, $sort_by, $sort_type) {
            if ($searchTerm) {
                $query->where('members.name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.email', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.code', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.email', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.phone', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.joiningDate', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.address', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.remarks', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.status', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.type', 'like', '%' . $searchTerm . '%');
            }
        })->orderBy($sort_by, $sort_type)->paginate(10);
    }


    public static function getMemeberCode($name)
    {
        $latest = Member::orderBy('id', 'desc')->first();
        if (!$latest) {
            return $name . '_0001';
        }
        $string = preg_replace("/[^0-9\.]/", '', $latest->code);
        return $name . '_' . sprintf('%04d', $string + 1);
    }
}
