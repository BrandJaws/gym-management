<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    use Notifiable;
    protected $table = 'employees';
    protected $fillable = [
        'name',
        'email',
        'code',
        'password',
        'gender',
        'cnic',
        'phone',
        'salary',
        'specialization',
        'address',
        'gym_id'
    ];

    public static function getEmployeeList($query, $sort_by, $sort_type)
    {
        return DB::table('employees')
            ->where('id', 'like', '%' . $query . '%')
            ->orWhere('name', 'like', '%' . $query . '%')
            ->orWhere('email', 'like', '%' . $query . '%')
            ->orWhere('code', 'like', '%' . $query . '%')
            ->orWhere('gender', 'like', '%' . $query . '%')
            ->orWhere('cnic', 'like', '%' . $query . '%')
            ->orWhere('phone', 'like', '%' . $query . '%')
            ->orWhere('salary', 'like', '%' . $query . '%')
            ->orWhere('specialization', 'like', '%' . $query . '%')
            ->orWhere('address', 'like', '%' . $query . '%')
            ->orderBy($sort_by, $sort_type)
            ->paginate(5);
    }
}
