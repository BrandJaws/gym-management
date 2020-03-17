<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    public static function getMembershipList($query, $sort_by, $sort_type)
    {
        return DB::table('memberships')
            ->where('name', 'like', '%' . $query . '%')
            ->orWhere('duration', 'like', '%' . $query . '%')
            ->orWhere('amount', 'like', '%' . $query . '%')
            ->orWhere('monthlyFee', 'like', '%' . $query . '%')
            ->orWhere('detail', 'like', '%' . $query . '%')
            ->orWhere('gym_id', 'like', '%' . $query . '%')
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);
    }
}
