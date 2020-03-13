<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    public static function getMemberList($query, $sort_by, $sort_type)
    {
        return DB::table('members')
            ->where('name', 'like', '%' . $query . '%')
            ->orWhere('email', 'like', '%' . $query . '%')
            ->orWhere('dateOfBirth', 'like', '%' . $query . '%')
            ->orWhere('gender', 'like', '%' . $query . '%')
            ->orWhere('meritalStatus', 'like', '%' . $query . '%')
            ->orWhere('cnic', 'like', '%' . $query . '%')
            ->orWhere('phone', 'like', '%' . $query . '%')
            ->orWhere('joinDate', 'like', '%' . $query . '%')
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);
    }
}
