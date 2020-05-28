<?php

namespace App\Http\Controllers\Gym;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
