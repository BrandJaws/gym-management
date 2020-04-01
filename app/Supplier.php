<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Supplier extends Model
{
    protected $table = 'suppliers';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'status',
        'gym_id',
        'note',
    ];
    public static function getSupplierList($searchTerm, $sort_by, $sort_type)
    {
        return self::select([
                'suppliers.*',
            ]
        )->where(function ($query) use ($searchTerm, $sort_by, $sort_type) {
            $query->where('suppliers.gym_id', '=', Auth::guard('employee')->user()->gym_id);
            if ($searchTerm) {
                $query->where('suppliers.name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('suppliers.email', 'like', '%' . $searchTerm . '%')
                    ->orWhere('suppliers.phone', 'like', '%' . $searchTerm . '%')
                    ->orWhere('suppliers.status', 'like', '%' . $searchTerm . '%')
                    ->orWhere('suppliers.gym_id', 'like', '%' . $searchTerm . '%');
            }
        })->orderBy($sort_by, $sort_type)->paginate(10);
    }
}
