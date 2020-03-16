<?php

namespace App;

use App\Http\Traits\FileUpload;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Employee extends Authenticatable
{
    use Notifiable;
    use FileUpload;
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
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userImage()
    {
        return $this->morphOne(Image::class, 'image');
    }

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

    public static function getRentalNumber()
    {
        $latest = Employee::orderBy('id', 'desc')->first();
        if (!$latest) {
            return 'Emp-0001';
        }
        $string = preg_replace("/[^0-9\.]/", '', $latest->code);
        return 'Emp-' . sprintf('%04d', $string + 1);
    }
}
