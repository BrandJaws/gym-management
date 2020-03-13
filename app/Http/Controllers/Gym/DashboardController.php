<?php

namespace App\Http\Controllers\Gym;
use App\Employee;
use App\Membership;
use App\Member;
use App\Trainer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $memberships = Membership::count();
        $employees = Employee::count();
        $members = Member::count();
        $trainers = Trainer::count();
        return view('gym.dashboard', compact('memberships','employees', 'members', 'trainers'));
    }
}
