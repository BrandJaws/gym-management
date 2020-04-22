<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Pipeline extends Model
{
    use SoftDeletes;
    protected $table = 'pipeline';
    protected $fillable = [
        'gym_id',
        'employee_id',
        'customer_id',
        'transfer_id',
        'scheduleDate',
        'stage',
        'status',
        'transferStage',
        'reScheduleDate',
        'intersetedPackages',
        'remarks',
    ];

    public function gym()
    {
        return $this->belongsTo(Gym::class, 'gym_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function transferEmployee()
    {
        return $this->belongsTo(Employee::class, 'transfer_id');
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'customer_id');
    }

    public static function getFailedCallList($searchTerm, $sort_by, $sort_type)
    {
        return self::select([
                'pipeline.*',
            ]
        )->where(function ($query) use ($searchTerm, $sort_by, $sort_type) {
            $query->where('pipeline.status', 'Failed Calls')->where('pipeline.gym_id', Auth::guard('employee')->user()->gym_id);
            if ($searchTerm) {
                $query->where('pipeline.employee_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.customer_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transfer_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.scheduleDate', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.status', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transferStage', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.intersetedPackages', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.remarks', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.stage', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.reScheduleDate', 'like', '%' . $searchTerm . '%');
            }
        })->orderBy($sort_by, $sort_type)->paginate(10);
    }

    public static function getCallsList($searchTerm, $sort_by, $sort_type)
    {
        return self::select([
                'pipeline.*',
            ]
        )->where(function ($query) use ($searchTerm, $sort_by, $sort_type) {
            $query->where('pipeline.stage', 'Call Scheduled')->where('pipeline.gym_id', Auth::guard('employee')->user()->gym_id)->orWhere('pipeline.employee_id', Auth::guard('employee')->user()->id)->orWhere('pipeline.transfer_id', Auth::guard('employee')->user()->id);
            if ($searchTerm) {
                $query->where('pipeline.customer_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.stage', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.scheduleDate', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transferStage', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transfer_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.reScheduleDate', 'like', '%' . $searchTerm . '%');
            }
        })->orderBy($sort_by, $sort_type)->paginate(10);
    }

    public static function getTransferList($searchTerm, $sort_by, $sort_type)
    {
        return self::select([
                'pipeline.*',
            ]
        )->where(function ($query) use ($searchTerm, $sort_by, $sort_type) {
            $query->where('pipeline.transferStage', 'Call Scheduled')->where('pipeline.gym_id', Auth::guard('employee')->user()->gym_id)->Where('pipeline.transfer_id', Auth::guard('employee')->user()->id);
            if ($searchTerm) {
                $query->where('pipeline.customer_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.stage', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.scheduleDate', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transferStage', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transfer_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.reScheduleDate', 'like', '%' . $searchTerm . '%');
            }
        })->orderBy($sort_by, $sort_type)->paginate(10);
    }

    public static function getAppointmentsList($searchTerm, $sort_by, $sort_type)
    {
        return self::select([
                'pipeline.*',
            ]
        )->where(function ($query) use ($searchTerm, $sort_by, $sort_type) {
            $query->where('pipeline.type', 'Appointment Scheduled')->where('pipeline.gym_id', Auth::guard('employee')->user()->gym_id)->orWhere('pipeline.employee_id', Auth::guard('employee')->user()->id)->orWhere('pipeline.transfer_id', Auth::guard('employee')->user()->id);
            if ($searchTerm) {
                $query->where('pipeline.customer_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.stage', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.scheduleDate', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transferStage', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transfer_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.reScheduleDate', 'like', '%' . $searchTerm . '%');
            }
        })->orderBy($sort_by, $sort_type)->paginate(10);
    }


    public static function getLeadList($customerType, $type, $leadStatus, $fromDate, $toDate)
    {
        return self::select([
                'pipeline.*',
                'members.id',
                'members.name as Member',
                'employees.name as Employee',
                'employees.id',
            ]
        )->where(function ($query) use ($customerType, $type, $leadStatus, $fromDate, $toDate) {
            $query->where('pipeline.gym_id', Auth::guard('employee')->user()->gym_id)->where('pipeline.stage', '=', $type)->where('pipeline.status', '=', $leadStatus)->orWhereBetween('pipeline.scheduleDate', array($fromDate, $toDate))->orWhereBetween('pipeline.reScheduleDate', array($fromDate, $toDate));
        })->leftJoin('employees', function ($join) {
            $join->on('employees.id', 'pipeline.transfer_id');
        })->leftJoin('members', function ($join) {
            $join->on('members.id', 'pipeline.customer_id');
        })->get();
    }

}
