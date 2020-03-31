<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Gym;
use App\GymModule;
use App\Http\Controllers\Controller;
use App\License;
use App\Permission;
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
            $latestGyms = Gym::where('gymType', 'Parent')->orderBy('id', 'desc')->take(10)->get();
            $gymModule = GymModule::orderBy('created_at', 'desc')->get();
            return view('admin.dashboard', compact('superAdmin', 'gym',
                'gymInTrial', 'license', 'latestGyms', 'gymModule'))->render();
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in admin dashboard');
        }
    }
}
