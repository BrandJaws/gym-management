<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treasury extends Model
{
    protected $table = 'treasuries';
    protected $fillable = [
        'employee_id',
        'cashFlow',
        'type',
        'value',
        'date',
        'purpose',
        'note',
        'treasureable_type',
        'treasureable_id',
        'gym_id',
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
    public static function getTreasuryList($searchTerm, $sort_by, $sort_type, $id)
    {
        return self::select([
                'treasuries.*',
            ]
        )->where(function ($query) use ($searchTerm, $sort_by, $sort_type, $id) {
            $query->where('treasuries.parent_id', $id)->where('treasuries.gymType', '=', 'child');
            if ($searchTerm) {
                $query->where('treasuries.employee_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('treasuries.cashFlow', 'like', '%' . $searchTerm . '%')
                    ->orWhere('treasuries.type', 'like', '%' . $searchTerm . '%')
                    ->orWhere('treasuries.value', 'like', '%' . $searchTerm . '%')
                    ->orWhere('treasuries.date', 'like', '%' . $searchTerm . '%')
                    ->orWhere('treasuries.purpose', 'like', '%' . $searchTerm . '%')
                    ->orWhere('treasuries.note', 'like', '%' . $searchTerm . '%')
                    ->orWhere('treasuries.treasureable_type', 'like', '%' . $searchTerm . '%')
                    ->orWhere('treasuries.treasureable_id', 'like', '%' . $searchTerm . '%');
            }
        })->orderBy($sort_by, $sort_type)->paginate(10);
    }
}
