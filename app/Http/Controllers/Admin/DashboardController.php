<?php

namespace App\Http\Controllers\Admin;
use App\Admin;
use App\Gym;
use App\Http\Controllers\Controller;
use App\License;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $gym = Gym::count();
        $gymInTrial = Gym::where('inTrial', 1)->count();
        $superAdmin = Admin::count();
        $license = License::count();
        return view('admin.dashboard')
            ->with('gym', $gym)
            ->with('gymInTrial', $gymInTrial)
            ->with('superAdmins', $superAdmin)
            ->with('licenses', $license);
    }
}
