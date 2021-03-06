<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class Treasury extends Model
{
    use Notifiable;
    protected $table = 'treasuries';
    protected $fillable = [
        'employee_id',
        'cashFlow',
        'type',
        'value',
        'date',
        'purpose',
        'note',
        'employeeId',
        'member_id',
        'trainer_id',
        'supplier_id',
        'gym_id',
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function trainer()
    {
        return $this->belongsTo(Trainer::class, 'trainer_id');
    }

    public static function getTreasuryList($searchTerm, $sort_by, $sort_type)
    {
        return self::select([
                'treasuries.*',
            ]
        )->where(function ($query) use ($searchTerm, $sort_by, $sort_type) {
            $query->where('treasuries.gym_id', '=', Auth::guard('employee')->user()->gym_id);
            if ($searchTerm) {
                $query->where('treasuries.employee_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('treasuries.cashFlow', 'like', '%' . $searchTerm . '%')
                    ->orWhere('treasuries.type', 'like', '%' . $searchTerm . '%')
                    ->orWhere('treasuries.value', 'like', '%' . $searchTerm . '%')
                    ->orWhere('treasuries.date', 'like', '%' . $searchTerm . '%')
                    ->orWhere('treasuries.purpose', 'like', '%' . $searchTerm . '%')
                    ->orWhere('treasuries.note', 'like', '%' . $searchTerm . '%');
            }
        })->orderBy($sort_by, $sort_type)->paginate(10);
    }


}
