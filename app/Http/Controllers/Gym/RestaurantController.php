<?php

namespace App\Http\Controllers\Gym;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        try {
            ActivityLogsController::insertLog(" ");
            return view('gym.restaurant.list');
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }

    public function restaurantList(Request $request)
    {
        try {
            ActivityLogsController::insertLog(" ");
            return view('gym.restaurant.list');
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }
}
