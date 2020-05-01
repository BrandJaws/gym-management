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
        'order',
        'dragStatus'
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
                'pipeline.gym_id',
                'pipeline.id',
                'pipeline.stage',
                'pipeline.scheduleDate',
                'pipeline.transferStage',
                'pipeline.status',
                'pipeline.transfer_id',
                'pipeline.reScheduleDate',
                'employees.name as EmployeeName',
                'members.name as Member',
            ]
        )->where(function ($query) use ($searchTerm, $sort_by, $sort_type) {
            $query->orWhere('pipeline.stage', 'Call Scheduled')->orWhere('pipeline.transferStage', 'Call Scheduled')->where('pipeline.gym_id', Auth::guard('employee')->user()->gym_id);
            if ($searchTerm) {
                $query->where('pipeline.customer_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.stage', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.scheduleDate', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transferStage', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transfer_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.reScheduleDate', 'like', '%' . $searchTerm . '%');
            }
        })->leftJoin('employees', function ($join) {
            $join->on('employees.id', 'pipeline.employee_id');
        })->leftJoin('members', function ($join) {
            $join->on('members.id', 'pipeline.customer_id');
        })->paginate(10);

    }

    public static function getAppointmentsList($searchTerm, $sort_by, $sort_type)
    {
        return self::select([
                'pipeline.gym_id',
                'pipeline.id',
                'pipeline.stage',
                'pipeline.scheduleDate',
                'pipeline.transferStage',
                'pipeline.status',
                'pipeline.transfer_id',
                'pipeline.reScheduleDate',
                'employees.name as EmployeeName',
                'members.name as Member',
            ]
        )->where(function ($query) use ($searchTerm, $sort_by, $sort_type) {
            $query->orWhere('pipeline.stage', 'Appointment Scheduled')->orWhere('pipeline.transferStage', 'Appointment Scheduled')->where('pipeline.gym_id', Auth::guard('employee')->user()->gym_id);
            if ($searchTerm) {
                $query->where('pipeline.customer_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.stage', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.scheduleDate', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transferStage', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transfer_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.reScheduleDate', 'like', '%' . $searchTerm . '%');
            }
        })->leftJoin('employees', function ($join) {
            $join->on('employees.id', 'pipeline.employee_id');
        })->leftJoin('members', function ($join) {
            $join->on('members.id', 'pipeline.customer_id');
        })->paginate(10);
    }

    public static function getPresentationsList($searchTerm, $sort_by, $sort_type)
    {
        return self::select([
                'pipeline.gym_id',
                'pipeline.id',
                'pipeline.stage',
                'pipeline.scheduleDate',
                'pipeline.transferStage',
                'pipeline.status',
                'pipeline.transfer_id',
                'pipeline.reScheduleDate',
                'employees.name as EmployeeName',
                'members.name as Member',
            ]
        )->where(function ($query) use ($searchTerm, $sort_by, $sort_type) {
            $query->orWhere('pipeline.stage', 'Presentation Scheduled')->orWhere('pipeline.transferStage', 'Presentation Scheduled')->where('pipeline.gym_id', Auth::guard('employee')->user()->gym_id);
            if ($searchTerm) {
                $query->where('pipeline.customer_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.stage', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.scheduleDate', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transferStage', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transfer_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.reScheduleDate', 'like', '%' . $searchTerm . '%');
            }
        })->leftJoin('employees', function ($join) {
            $join->on('employees.id', 'pipeline.employee_id');
        })->leftJoin('members', function ($join) {
            $join->on('members.id', 'pipeline.customer_id');
        })->paginate(10);
    }

    public static function getContractList($searchTerm, $sort_by, $sort_type)
    {
        return self::select([
                'pipeline.gym_id',
                'pipeline.id',
                'pipeline.stage',
                'pipeline.scheduleDate',
                'pipeline.transferStage',
                'pipeline.status',
                'pipeline.transfer_id',
                'pipeline.reScheduleDate',
                'employees.name as EmployeeName',
                'members.name as Member',
            ]
        )->where(function ($query) use ($searchTerm, $sort_by, $sort_type) {
            $query->orWhere('pipeline.stage', 'Contract Sent')->orWhere('pipeline.transferStage', 'Contract Sent')->where('pipeline.gym_id', Auth::guard('employee')->user()->gym_id);
            if ($searchTerm) {
                $query->where('pipeline.customer_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.stage', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.scheduleDate', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transferStage', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transfer_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.reScheduleDate', 'like', '%' . $searchTerm . '%');
            }
        })->leftJoin('employees', function ($join) {
            $join->on('employees.id', 'pipeline.employee_id');
        })->leftJoin('members', function ($join) {
            $join->on('members.id', 'pipeline.customer_id');
        })->paginate(10);
    }

    public static function getQualifiedList($searchTerm, $sort_by, $sort_type)
    {
        return self::select([
                'pipeline.gym_id',
                'pipeline.id',
                'pipeline.stage',
                'pipeline.scheduleDate',
                'pipeline.transferStage',
                'pipeline.status',
                'pipeline.transfer_id',
                'pipeline.reScheduleDate',
                'employees.name as EmployeeName',
                'members.name as Member',
            ]
        )->where(function ($query) use ($searchTerm, $sort_by, $sort_type) {
            $query->orWhere('pipeline.stage', 'Qualified To Buy')->orWhere('pipeline.transferStage', 'Qualified To Buy')->where('pipeline.gym_id', Auth::guard('employee')->user()->gym_id);
            if ($searchTerm) {
                $query->where('pipeline.customer_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.stage', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.scheduleDate', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transferStage', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transfer_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.reScheduleDate', 'like', '%' . $searchTerm . '%');
            }
        })->leftJoin('employees', function ($join) {
            $join->on('employees.id', 'pipeline.employee_id');
        })->leftJoin('members', function ($join) {
            $join->on('members.id', 'pipeline.customer_id');
        })->paginate(10);
    }

    public static function getWonList($searchTerm, $sort_by, $sort_type)
    {
        return self::select([
                'pipeline.gym_id',
                'pipeline.id',
                'pipeline.stage',
                'pipeline.scheduleDate',
                'pipeline.transferStage',
                'pipeline.status',
                'pipeline.transfer_id',
                'pipeline.reScheduleDate',
                'employees.name as EmployeeName',
                'members.name as Member',
            ]
        )->where(function ($query) use ($searchTerm, $sort_by, $sort_type) {
            $query->orWhere('pipeline.stage', 'Closed Won')->orWhere('pipeline.transferStage', 'Closed Won')->where('pipeline.gym_id', Auth::guard('employee')->user()->gym_id);
            if ($searchTerm) {
                $query->where('pipeline.customer_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.stage', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.scheduleDate', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transferStage', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transfer_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.reScheduleDate', 'like', '%' . $searchTerm . '%');
            }
        })->leftJoin('employees', function ($join) {
            $join->on('employees.id', 'pipeline.employee_id');
        })->leftJoin('members', function ($join) {
            $join->on('members.id', 'pipeline.customer_id');
        })->paginate(10);
    }


    public static function getLeadList($empId, $fromDate, $toDate)
    {
        return self::select([
                'pipeline.employee_id as Name',
                'pipeline.customer_id',
                'pipeline.transfer_id',
                'pipeline.scheduleDate',
                'pipeline.stage',
                'pipeline.status',
                'pipeline.transferStage',
                'pipeline.reScheduleDate',
                'members.id',
                'members.name as Member',
                'employees.name as Employee',
                'employees.id',
            ]
        )->where(function ($query) use ($empId, $fromDate, $toDate) {
            $query->orWhere('pipeline.employee_id', $empId)->whereBetween('pipeline.scheduleDate', array($fromDate, $toDate))->orWhere('pipeline.transfer_id', $empId)->whereBetween('pipeline.reScheduleDate', array($fromDate, $toDate));
        })->leftJoin('employees', function ($join) {
            $join->on('employees.id', 'pipeline.transfer_id');
        })->leftJoin('members', function ($join) {
            $join->on('members.id', 'pipeline.customer_id');
        })->get();
    }

}
