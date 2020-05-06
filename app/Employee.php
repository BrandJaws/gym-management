<?php

namespace App;

use App\Http\Traits\FileUpload;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
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
        'dateOfJoining',
        'timeIn',
        'timeOut',
        'gym_id'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userImage()
    {
        return $this->morphOne(Image::class, 'image');
    }

    public function gym()
    {
        return $this->belongsTo(Gym::class, 'gym_id');
    }

    public function parentGym()
    {
        return $this->belongsTo(Gym::class, 'gym_id', 'parent_id');
    }
    public function employeePermissions()
    {
        return $this->hasMany(EmployeePermission::class, 'employee_id', 'id');
    }

    public function activityLogs(){
        return $this->hasMany(ActivityLogs::class, 'employee_id')->orderBy('id', 'desc');
    }

    public function reSchaduale(){
        return $this->hasMany(Pipeline::class, 'transfer_id')->orderBy('id', 'desc');
    }

    public function schadualeStage(){
        return $this->hasMany(Pipeline::class, 'employee_id')->orderBy('id', 'desc');
    }

    public static function getEmployeeList($searchTerm, $sort_by, $sort_type)
    {
        return self::select([
                'employees.*',
            ]
        )->where(function ($query) use ($searchTerm, $sort_by, $sort_type) {
            $query->where('gym_id', Auth::guard('employee')->user()->gym_id);
            if ($searchTerm) {
                $query->where('employees.name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('employees.email', 'like', '%' . $searchTerm . '%')
                    ->orWhere('employees.gender', 'like', '%' . $searchTerm . '%')
                    ->orWhere('employees.code', 'like', '%' . $searchTerm . '%')
                    ->orWhere('employees.cnic', 'like', '%' . $searchTerm . '%')
                    ->orWhere('employees.salary', 'like', '%' . $searchTerm . '%')
                    ->orWhere('employees.phone', 'like', '%' . $searchTerm . '%')
                    ->orWhere('employees.specialization', 'like', '%' . $searchTerm . '%')
                    ->orWhere('employees.address', 'like', '%' . $searchTerm . '%');
            }
        })->orderBy($sort_by, $sort_type)->paginate(10);
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


