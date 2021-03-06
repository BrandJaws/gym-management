<?php

namespace App\Http\Controllers\Gym;

use App\ActivityLogs;
use App\Employee;
use App\Membership;
use App\Member;
use App\Pipeline;
use App\Supplier;
use App\Trainer;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        try {
            $gym_id = Auth::guard('employee')->user()->gym_id;
            $memberships = Membership::where('gym_id', $gym_id)->count();
            $employees = Employee::where('gym_id', $gym_id)->count();
            $members = Member::where('type', 'Member')->where('gym_id', $gym_id)->count();
            $trainers = Trainer::where('gym_id', $gym_id)->count();
            $supplier = Supplier::where('gym_id', $gym_id)->count();
            $leads = Member::where('gym_id', $gym_id)->where('type', 'Lead')->count();
            $parentMembers = Member::where('type', 'Member')->where('gym_id', $gym_id)->where('memberType', 'Parent')->count();
            $childMembers = Member::where('type', 'Member')->where('gym_id', $gym_id)->where('memberType', 'Children')->count();
            // Activity logs portion
            $activityLogs = ActivityLogs::where('gym_id', $gym_id)->orderBy('id', 'desc')->get();
            $todayLogs = ActivityLogs::where('gym_id', $gym_id)->whereDate('created_at', Carbon::today())->orderBy('id', 'desc')->get();

            // Task portion
            $allTask = Pipeline::where('gym_id', $gym_id)->orderBy('id', 'desc')->get();
            $todayTask = Pipeline::where('gym_id', $gym_id)->whereDate('scheduleDate', Carbon::today())->orderBy('id', 'desc')->get();


            ActivityLogsController::insertLog("Gym Dashboard Page");
            return view('gym.dashboard', compact('memberships', 'employees', 'members', 'trainers', 'activityLogs', 'todayLogs','allTask','todayTask','supplier','leads','parentMembers','childMembers'));
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in gym dashboard');
        }
    }
    public function calendar()
    {
        $gym_id = Auth::guard('employee')->user()->gym_id;
        $memberships = Membership::where('gym_id', $gym_id)->count();
        $employees = Employee::where('gym_id', $gym_id)->count();
        $members = Member::where('type', 'Member')->where('gym_id', $gym_id)->count();
        $trainers = Trainer::where('gym_id', $gym_id)->count();
        $supplier = Supplier::where('gym_id', $gym_id)->count();
        $leads = Member::where('gym_id', $gym_id)->where('type', 'Lead')->count();
        $parentMembers = Member::where('type', 'Member')->where('gym_id', $gym_id)->where('memberType', 'Parent')->count();
        $childMembers = Member::where('type', 'Member')->where('gym_id', $gym_id)->where('memberType', 'Children')->count();

        if (request()->ajax()) {

            $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
            $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');

            $data = Pipeline::where('gym_id', $gym_id)->whereDate('scheduleDate', '>=', $start)->whereDate('scheduleDate', '<=', $end)->get(['id', 'employee_id', 'scheduleDate']);
            return response()->json($data);
        }

        ActivityLogsController::insertLog("Gym Calendar Page");
        return view('gym.calendar', compact('memberships', 'employees', 'members', 'trainers', 'supplier','leads','parentMembers','childMembers'));


    }

    public function reSchaduleCalendar()
    {
        $gym_id = Auth::guard('employee')->user()->gym_id;
        $memberships = Membership::where('gym_id', $gym_id)->count();
        $employees = Employee::where('gym_id', $gym_id)->count();
        $members = Member::where('type', 'Member')->where('gym_id', $gym_id)->count();
        $trainers = Trainer::where('gym_id', $gym_id)->count();
        $supplier = Supplier::where('gym_id', $gym_id)->count();
        $leads = Member::where('gym_id', $gym_id)->where('type', 'Lead')->count();
        $parentMembers = Member::where('type', 'Member')->where('gym_id', $gym_id)->where('memberType', 'Parent')->count();
        $childMembers = Member::where('type', 'Member')->where('gym_id', $gym_id)->where('memberType', 'Children')->count();

        if (request()->ajax()) {

            $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
            $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');

            $data = Pipeline::where('gym_id', $gym_id)->whereDate('reScheduleDate', '>=', $start)->whereDate('reScheduleDate', '<=', $end)->get(['id', 'transfer_id', 'reScheduleDate']);

            return response()->json($data);
        }

        ActivityLogsController::insertLog("Gym Calendar Page");
        return view('gym.reSchaduleCalendar', compact('memberships', 'employees', 'members', 'trainers', 'supplier','leads','parentMembers','childMembers'));


    }


}
