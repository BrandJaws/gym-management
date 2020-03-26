<?php

namespace App\Http\Controllers\Gym;

use App\Employee;
use App\Membership;
use App\Member;
use App\Trainer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        try {
            $memberships = Membership::where('gym_id', Auth::guard('employee')->user()->gym_id)->count();
            $employees = Employee::where('gym_id', Auth::guard('employee')->user()->gym_id)->count();
            $members = Member::where('gym_id', Auth::guard('employee')->user()->gym_id)->count();
            $trainers = Trainer::where('gym_id', Auth::guard('employee')->user()->gym_id)->count();
            return view('gym.dashboard', compact('memberships', 'employees', 'members', 'trainers'));
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }
}
