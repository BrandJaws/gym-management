<?php

namespace App\Http\Controllers\Gym;

use App\Http\Controllers\Controller;
use App\RestaurantOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function orderProcessList(Request $request)
    {
        try {
            $gym_id = Auth::guard('employee')->user()->gym_id;
            $pageSize = ($request->has('perPage') && (int)$request->get('perPage') > 0) ? (int)$request->get('perPage') : 0;
            $searchTerm = ($request->has('searchTerm') && $request->get('searchTerm')) ? $request->get('searchTerm') : null;
            $order = RestaurantOrder::getOrderList($gym_id, $pageSize, $searchTerm);
            return response()->json([
                'response' => $order
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'response' => $e
            ], 400);
        }
    }

}
