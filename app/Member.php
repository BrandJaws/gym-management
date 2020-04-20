<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Member extends Model
{
    use SoftDeletes;
    protected $table = 'members';
    protected $fillable = [
        'gym_id',
        'leadOwner_id',
        'membership_id',
        'salutation',
        'name',
        'code',
        'email',
        'password',
        'phone',
        'rating',
        'joiningDate',
        'address',
        'source',
        'remarks',
        'status',
        'type',
        'memberType',
        'memberParent_id',
        'relationShip'
    ];

    public function userImage()
    {
        return $this->morphOne(Image::class, 'image');
    }
    public function membership()
    {
        return $this->belongsTo(Membership::class, 'membership_id');
    }
    public function treasury()
    {
        return $this->belongsTo(Treasury::class,'id','employee_id');
    }

    public static function getMemberList($searchTerm, $sort_by, $sort_type)
    {
        return self::select([
                'members.*',
            ]
        )->where(function ($query) use ($searchTerm, $sort_by, $sort_type) {
            $query->where('members.type', 'Member')->where('members.gym_id', Auth::guard('employee')->user()->gym_id);
            if ($searchTerm) {
                $query->where('members.name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.email', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.code', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.email', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.phone', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.joiningDate', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.address', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.remarks', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.status', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.type', 'like', '%' . $searchTerm . '%');
            }
        })->orderBy($sort_by, $sort_type)->paginate(10);
    }

    public static function getLeadList($searchTerm, $sort_by, $sort_type)
    {
        return self::select([
                'members.*',
            ]
        )->where(function ($query) use ($searchTerm, $sort_by, $sort_type) {
            $query->where('members.type', 'Lead')->where('members.gym_id', Auth::guard('employee')->user()->gym_id);
            if ($searchTerm) {
                $query->where('members.name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.email', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.code', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.email', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.phone', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.joiningDate', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.address', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.remarks', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.status', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.type', 'like', '%' . $searchTerm . '%');
            }
        })->orderBy($sort_by, $sort_type)->paginate(10);
    }

    public static function getNotJoinedMemberList($searchTerm, $sort_by, $sort_type)
    {
        return self::select([
                'members.*',
            ]
        )->where(function ($query) use ($searchTerm, $sort_by, $sort_type) {
            $query->where('members.status', 'Not Joined')->where('members.gym_id', Auth::guard('employee')->user()->gym_id);
            if ($searchTerm) {
                $query->where('members.name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.email', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.code', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.email', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.phone', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.joiningDate', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.address', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.remarks', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.status', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.type', 'like', '%' . $searchTerm . '%');
            }
        })->orderBy($sort_by, $sort_type)->paginate(10);
    }

    public static function getExpiredMemberList($searchTerm, $sort_by, $sort_type)
    {
        return self::select([
                'members.*',
            ]
        )->where(function ($query) use ($searchTerm, $sort_by, $sort_type) {
            $query->where('members.status', 'Expired')->where('members.gym_id', Auth::guard('employee')->user()->gym_id);
            if ($searchTerm) {
                $query->where('members.name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.email', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.code', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.email', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.phone', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.joiningDate', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.address', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.remarks', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.status', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.type', 'like', '%' . $searchTerm . '%');
            }
        })->orderBy($sort_by, $sort_type)->paginate(10);
    }

    public static function getInActiveMemberList($searchTerm, $sort_by, $sort_type)
    {
        return self::select([
                'members.*',
            ]
        )->where(function ($query) use ($searchTerm, $sort_by, $sort_type) {
            $query->where('members.status', 'In-Active')->where('members.gym_id', Auth::guard('employee')->user()->gym_id);
            if ($searchTerm) {
                $query->where('members.name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.email', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.code', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.email', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.phone', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.joiningDate', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.address', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.remarks', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.status', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.type', 'like', '%' . $searchTerm . '%');
            }
        })->orderBy($sort_by, $sort_type)->paginate(10);
    }

    public static function getMemeberCode($name)
    {
        $latest = Member::orderBy('id', 'desc')->first();
        if (!$latest) {
            return $name . '_0001';
        }
        $string = preg_replace("/[^0-9\.]/", '', $latest->code);
        return $name . '_' . sprintf('%04d', $string + 1);
    }

    public static function getMemberData($fromDate, $toDate, $memberStatus)
    {
        return self::select([
                'members.*',
            ]
        )->where(function ($query) use ($fromDate, $toDate, $memberStatus) {
            $query->whereBetween('created_at', array($fromDate, $toDate));

        })->paginate(10);
    }

}
