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
        'dragStatus',
        'reStatus'
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
                'pipeline.gym_id',
                'pipeline.id',
                'pipeline.stage',
                'pipeline.scheduleDate',
                'pipeline.transferStage',
                'pipeline.status',
                'pipeline.reStatus',
                'pipeline.transfer_id',
                'pipeline.reScheduleDate',
                'employees.name as EmployeeName',
                'members.name as Member',
            ]
        )->where(function ($query) use ($searchTerm, $sort_by, $sort_type) {
            $query->orWhere('pipeline.employee_id', Auth::guard('employee')->user()->id)->where('pipeline.status', 'Failed Calls')
                ->orWhere('pipeline.transfer_id', Auth::guard('employee')->user()->id)->where('pipeline.reStatus', 'Failed Calls');
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
        })->leftJoin('employees', function ($join) {
            $join->on('employees.id', 'pipeline.employee_id');
        })->leftJoin('members', function ($join) {
            $join->on('members.id', 'pipeline.customer_id');
        })->orderBy($sort_by, $sort_type)->paginate(10);
    }

    public static function getCallsList($searchTerm, $sort_by, $sort_type)
    {
        return self::select([
                'pipeline.gym_id',
                'pipeline.id',
                'pipeline.stage',
                'pipeline.employee_id',
                'pipeline.customer_id',
                'pipeline.scheduleDate',
                'pipeline.transferStage',
                'pipeline.status',
                'pipeline.transfer_id',
                'pipeline.reStatus',
                'pipeline.reScheduleDate',
                'employees.name as EmployeeName',
                'members.name as Member',
            ]
        )->where(function ($query) use ($searchTerm, $sort_by, $sort_type) {
            $query->orWhere('pipeline.employee_id', Auth::guard('employee')->user()->id)->where('pipeline.stage', 'Call Scheduled')
                ->orWhere('pipeline.transfer_id', Auth::guard('employee')->user()->id)->where('pipeline.transferStage', 'Call Scheduled');
            if ($searchTerm) {
                $query->orWhere('employees.name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.stage', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.employee_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.scheduleDate', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.status', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transferStage', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transfer_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.reScheduleDate', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.reStatus', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.employee_id', 'like', '%' . $searchTerm . '%');
            }
        })->leftJoin('employees', function ($join) {
            $join->on('employees.id', 'pipeline.employee_id');
        })->leftJoin('members', function ($join) {
            $join->on('members.id', 'pipeline.customer_id');
        })->orderBy($sort_by, $sort_type)->paginate(10);
    }

    public static function getAppointmentsList($searchTerm, $sort_by, $sort_type)
    {
        return self::select([
                'pipeline.gym_id',
                'pipeline.id',
                'pipeline.stage',
                'pipeline.employee_id',
                'pipeline.customer_id',
                'pipeline.scheduleDate',
                'pipeline.transferStage',
                'pipeline.status',
                'pipeline.transfer_id',
                'pipeline.reStatus',
                'pipeline.reScheduleDate',
                'employees.name as EmployeeName',
                'members.name as Member',
            ]
        )->where(function ($query) use ($searchTerm, $sort_by, $sort_type) {
            $query->orWhere('pipeline.employee_id', Auth::guard('employee')->user()->id)->where('pipeline.stage', 'Appointment Scheduled')
                ->orWhere('pipeline.transfer_id', Auth::guard('employee')->user()->id)->where('pipeline.transferStage', 'Appointment Scheduled');
            if ($searchTerm) {
                $query->orWhere('employees.name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.stage', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.employee_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.scheduleDate', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.status', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transferStage', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transfer_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.reScheduleDate', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.reStatus', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.employee_id', 'like', '%' . $searchTerm . '%');
            }
        })->leftJoin('employees', function ($join) {
            $join->on('employees.id', 'pipeline.employee_id');
        })->leftJoin('members', function ($join) {
            $join->on('members.id', 'pipeline.customer_id');
        })->orderBy($sort_by, $sort_type)->paginate(10);
    }

    public static function getPresentationsList($searchTerm, $sort_by, $sort_type)
    {
        return self::select([
                'pipeline.gym_id',
                'pipeline.id',
                'pipeline.stage',
                'pipeline.employee_id',
                'pipeline.customer_id',
                'pipeline.scheduleDate',
                'pipeline.transferStage',
                'pipeline.status',
                'pipeline.transfer_id',
                'pipeline.reStatus',
                'pipeline.reScheduleDate',
                'employees.name as EmployeeName',
                'members.name as Member',
            ]
        )->where(function ($query) use ($searchTerm, $sort_by, $sort_type) {
            $query->orWhere('pipeline.employee_id', Auth::guard('employee')->user()->id)->where('pipeline.stage', 'Presentation Scheduled')
                ->orWhere('pipeline.transfer_id', Auth::guard('employee')->user()->id)->where('pipeline.transferStage', 'Presentation Scheduled');
            if ($searchTerm) {
                $query->orWhere('employees.name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.stage', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.employee_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.scheduleDate', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.status', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transferStage', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transfer_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.reScheduleDate', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.reStatus', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.employee_id', 'like', '%' . $searchTerm . '%');
            }
        })->leftJoin('employees', function ($join) {
            $join->on('employees.id', 'pipeline.employee_id');
        })->leftJoin('members', function ($join) {
            $join->on('members.id', 'pipeline.customer_id');
        })->orderBy($sort_by, $sort_type)->paginate(10);
    }

    public static function getContractList($searchTerm, $sort_by, $sort_type)
    {
        return self::select([
                'pipeline.gym_id',
                'pipeline.id',
                'pipeline.stage',
                'pipeline.employee_id',
                'pipeline.customer_id',
                'pipeline.scheduleDate',
                'pipeline.transferStage',
                'pipeline.status',
                'pipeline.transfer_id',
                'pipeline.reStatus',
                'pipeline.reScheduleDate',
                'employees.name as EmployeeName',
                'members.name as Member',
            ]
        )->where(function ($query) use ($searchTerm, $sort_by, $sort_type) {
            $query->orWhere('pipeline.employee_id', Auth::guard('employee')->user()->id)->where('pipeline.stage', 'Contract Sent')
                ->orWhere('pipeline.transfer_id', Auth::guard('employee')->user()->id)->where('pipeline.transferStage', 'Contract Sent');
            if ($searchTerm) {
                $query->orWhere('employees.name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.stage', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.employee_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.scheduleDate', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.status', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transferStage', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transfer_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.reScheduleDate', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.reStatus', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.employee_id', 'like', '%' . $searchTerm . '%');
            }
        })->leftJoin('employees', function ($join) {
            $join->on('employees.id', 'pipeline.employee_id');
        })->leftJoin('members', function ($join) {
            $join->on('members.id', 'pipeline.customer_id');
        })->orderBy($sort_by, $sort_type)->paginate(10);
    }

    public static function getQualifiedList($searchTerm, $sort_by, $sort_type)
    {
        return self::select([
                'pipeline.gym_id',
                'pipeline.id',
                'pipeline.stage',
                'pipeline.employee_id',
                'pipeline.customer_id',
                'pipeline.scheduleDate',
                'pipeline.transferStage',
                'pipeline.status',
                'pipeline.transfer_id',
                'pipeline.reStatus',
                'pipeline.reScheduleDate',
                'employees.name as EmployeeName',
                'members.name as Member',
            ]
        )->where(function ($query) use ($searchTerm, $sort_by, $sort_type) {
            $query->orWhere('pipeline.employee_id', Auth::guard('employee')->user()->id)->where('pipeline.stage', 'Qualified To Buy')
                ->orWhere('pipeline.transfer_id', Auth::guard('employee')->user()->id)->where('pipeline.transferStage', 'Qualified To Buy');
            if ($searchTerm) {
                $query->orWhere('employees.name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.stage', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.employee_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.scheduleDate', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.status', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transferStage', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transfer_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.reScheduleDate', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.reStatus', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.employee_id', 'like', '%' . $searchTerm . '%');
            }
        })->leftJoin('employees', function ($join) {
            $join->on('employees.id', 'pipeline.employee_id');
        })->leftJoin('members', function ($join) {
            $join->on('members.id', 'pipeline.customer_id');
        })->orderBy($sort_by, $sort_type)->paginate(10);
    }

    public static function getWonList($searchTerm, $sort_by, $sort_type)
    {
        return self::select([
                'pipeline.gym_id',
                'pipeline.id',
                'pipeline.stage',
                'pipeline.employee_id',
                'pipeline.customer_id',
                'pipeline.scheduleDate',
                'pipeline.transferStage',
                'pipeline.status',
                'pipeline.transfer_id',
                'pipeline.reStatus',
                'pipeline.reScheduleDate',
                'employees.name as EmployeeName',
                'members.name as Member',
            ]
        )->where(function ($query) use ($searchTerm, $sort_by, $sort_type) {
            $query->orWhere('pipeline.employee_id', Auth::guard('employee')->user()->id)->where('pipeline.stage', 'Closed Won')
                ->orWhere('pipeline.transfer_id', Auth::guard('employee')->user()->id)->where('pipeline.transferStage', 'Closed Won');
            if ($searchTerm) {
                $query->orWhere('employees.name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('members.name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.stage', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.employee_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.scheduleDate', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.status', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transferStage', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transfer_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.reScheduleDate', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.reStatus', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.employee_id', 'like', '%' . $searchTerm . '%');
            }
        })->leftJoin('employees', function ($join) {
            $join->on('employees.id', 'pipeline.employee_id');
        })->leftJoin('members', function ($join) {
            $join->on('members.id', 'pipeline.customer_id');
        })->orderBy($sort_by, $sort_type)->paginate(10);
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
