<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Membership extends Model
{
    protected $table = 'memberships';
    protected $fillable = [
        'name',
        'duration',
        'amount',
        'includedMember',
        'monthlyFee',
        'detail',
        'gym_id',
    ];

    public static function getMembershipList($searchTerm, $sort_by, $sort_type)
    {
        return self::select([
                'memberships.*',
            ]
        )->where(function ($query) use ($searchTerm, $sort_by, $sort_type) {
            $query->where('memberships.gym_id', Auth::guard('employee')->user()->gym_id);
            if ($searchTerm) {
                $query->where('memberships.name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('memberships.duration', 'like', '%' . $searchTerm . '%')
                    ->orWhere('memberships.amount', 'like', '%' . $searchTerm . '%')
                    ->orWhere('memberships.monthlyFee', 'like', '%' . $searchTerm . '%')
                    ->orWhere('memberships.detail', 'like', '%' . $searchTerm . '%')
                    ->orWhere('memberships.gym_id', 'like', '%' . $searchTerm . '%');
            }
        })->orderBy($sort_by, $sort_type)->paginate(10);
    }

    public function gym()
    {
        return $this->belongsTo(Gym::class, 'gym_id');
    }
}
