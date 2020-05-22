<?php

namespace App\Http\Controllers\Gym;

use App\ActivityLogs;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ActivityLogsController extends Controller
{
    public static function insertLog($activity){
        $gym_id = Auth::guard('employee')->user()->gym_id;
        $employee_id = Auth::guard('employee')->user()->id;
        $activityLogs = new ActivityLogs();
        $activityLogs->gym_id = $gym_id;
        $activityLogs->employee_id = $employee_id;
        $activityLogs->activity = $activity;
        $activityLogs->save();
    }
}
