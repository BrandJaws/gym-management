<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Pipeline extends Model
{
    protected $table = 'pipeline';
    protected $fillable = [
        'gym_id',
        'employee_id',
        'customer_id',
        'transfer_id',
        'scheduleDate',
        'status',
        'transferStatus',
        'intersetedPackages',
        'remarks',
        'type',
        'reScheduleDate'
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
            $query->where('status', 'Failed Calls')->where('gym_id', Auth::guard('employee')->user()->gym_id);
            if ($searchTerm) {
                $query->where('pipeline.employee_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.customer_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transfer_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.scheduleDate', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.status', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transferStatus', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.intersetedPackages', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.remarks', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.type', 'like', '%' . $searchTerm . '%')
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
            $query->where('transferStatus', 'For Call')->where('gym_id', Auth::guard('employee')->user()->gym_id);
            if ($searchTerm) {
                $query->where('pipeline.employee_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.customer_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transfer_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.scheduleDate', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.status', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transferStatus', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.intersetedPackages', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.remarks', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.type', 'like', '%' . $searchTerm . '%')
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
            $query->where('type', 'For Demo')->where('gym_id', Auth::guard('employee')->user()->gym_id);
            if ($searchTerm) {
                $query->where('pipeline.employee_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.customer_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transfer_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.scheduleDate', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.status', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.transferStatus', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.intersetedPackages', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.remarks', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.type', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pipeline.reScheduleDate', 'like', '%' . $searchTerm . '%');
            }
        })->orderBy($sort_by, $sort_type)->paginate(10);
    }

}
