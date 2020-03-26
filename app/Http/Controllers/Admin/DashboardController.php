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
        try {
            $gym = Gym::count();
            $gymInTrial = Gym::where('inTrial', 1)->count();
            $superAdmin = Admin::count();
            $license = License::count();
            return view('admin.dashboard', compact('superAdmin', 'gym', 'gymInTrial', 'license'))->render();
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }
}
