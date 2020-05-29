<?php

namespace App\Http\Controllers\Gym;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        try {
            return view('gym.reports.list');
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }

    public function GymLeadReport(Request $request)
    {
        $value = $request->value;
        $fromDate = $request->fromDate;
        $toDate = $request->toDate;
        $gym_id = Auth::guard('employee')->user()->gym_id;
        if ($value == "Lead") {
            $gymLeadList = Member::getGymLeadList($gym_id, $fromDate, $toDate);
        } else {
            $gymLeadList = Member::getGymMemberList($gym_id, $fromDate, $toDate);
        }
        return response()->json([
            'response' => $gymLeadList
        ], 200);
    }

}
