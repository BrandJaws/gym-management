<?php

namespace App\Http\Controllers\Gym;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Member;
use App\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailController extends Controller
{
    public function index()
    {
        try {
            ActivityLogsController::insertLog("Email Dashbaord Page");
            return view('gym.email.index');
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in email page');
        }
    }

    public function employeeList()
    {
        try {
            $employee = Employee::where('gym_id', Auth::guard('employee')->user()->gym_id)->orderBy('id', 'asc')->get();
            ActivityLogsController::insertLog("Employee Email Page");
            return view('gym.email.employee.list', compact('employee'));
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in Employee email page');
        }
    }

    public function memberList()
    {
        try {
            $member = Member::where('gym_id', Auth::guard('employee')->user()->gym_id)->where('type', 'Member')->orderBy('id', 'asc')->get();
            ActivityLogsController::insertLog("Member Email Page");
            return view('gym.email.member.list', compact('member'));
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in Member email page');
        }
    }

    public function leadList()
    {
        try {
            $lead = Member::where('gym_id', Auth::guard('employee')->user()->gym_id)->where('type', 'Lead')->orderBy('id', 'asc')->get();
            ActivityLogsController::insertLog("Lead Email Page");
            return view('gym.email.lead.list', compact('lead'));
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in Lead email page');
        }
    }

    public function trainerList()
    {
        try {
            $trainer = Trainer::where('gym_id', Auth::guard('employee')->user()->gym_id)->orderBy('id', 'asc')->get();
            ActivityLogsController::insertLog("Trainer Email Page");
            return view('gym.email.trainer.list', compact('trainer'));
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in Trainer email page');
        }
    }

}
