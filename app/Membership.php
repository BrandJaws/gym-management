<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Membership extends Model
{
    protected $table = 'memberships';
    protected $fillable = [
        'name',
        'registrationFee',
        'monthlyFee',
        'affiliateStatus',
        'spouse',
        'children',
        'noOfMembers',
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
                    ->orWhere('memberships.registrationFee', 'like', '%' . $searchTerm . '%')
                    ->orWhere('memberships.monthlyFee', 'like', '%' . $searchTerm . '%')
                    ->orWhere('memberships.affiliateStatus', 'like', '%' . $searchTerm . '%')
                    ->orWhere('memberships.spouse', 'like', '%' . $searchTerm . '%')
                    ->orWhere('memberships.children', 'like', '%' . $searchTerm . '%')
                    ->orWhere('memberships.noOfMembers', 'like', '%' . $searchTerm . '%');
            }
        })->orderBy($sort_by, $sort_type)->paginate(10);
    }

    public function gym()
    {
        return $this->belongsTo(Gym::class, 'gym_id');
    }

    public static function getMembershipReport($gym_id, $fromDate, $toDate)
    {
        return self::select([
                'memberships.*',
            ]
        )->where(function ($query) use ($gym_id, $fromDate, $toDate) {
            $query->where('memberships.gym_id', $gym_id)->whereBetween('memberships.created_at', array($fromDate, $toDate));
        })->get();
    }
}
