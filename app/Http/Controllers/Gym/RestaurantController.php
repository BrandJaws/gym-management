<?php

namespace App\Http\Controllers\Gym;

use App\Http\Controllers\Controller;
use App\Http\Traits\FileUpload;
use App\Image;
use App\RestaurantMainCategory;
use App\RestaurantOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class RestaurantController extends Controller
{
    use FileUpload;
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
            RestaurantOrder::all();
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

    public function updateRestaurantOrder(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'status' => 'required',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $value = $request->status;
            $id = $request->id;
            switch ($value) {
                case 'In Process':
                    $order = RestaurantOrder::where('id', $id)->first();
                    $order->in_process = "YES";
                    $order->save();
                    break;
                case 'Is Ready':
                    $order = RestaurantOrder::where('id', $id)->first();
                    $order->in_process = "YES";
                    $order->is_ready = "YES";
                    $order->save();
                    break;
                case 'Is Served':
                    $order = RestaurantOrder::where('id', $id)->first();
                    $order->in_process = "YES";
                    $order->is_ready = "YES";
                    $order->is_served = "YES";
                    $order->save();
                    break;
            }
            ActivityLogsController::insertLog("Update Restaurant Order ");
            return view('gym.restaurant.list');
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }

    public function orderDetail(Request $request)
    {
        try {
            $id = $request->id;
            $detail = RestaurantOrder::getOrderDetail($id);
            ActivityLogsController::insertLog("Order Detail Page");
            return response()->json([
                'response' => $detail
            ], 200);
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }

    public function mainCategoryList(Request $request)
    {
        try {
            $gym_id = Auth::guard('employee')->user()->gym_id;
            $order = RestaurantMainCategory::getCategoryList($gym_id);
            ActivityLogsController::insertLog("Restaurant Category Page");
            return response()->json([
                'response' => $order
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'response' => $e
            ], 400);
        }
    }

    public function categoryEdit(Request $request)
    {
        try {
            $category = RestaurantMainCategory::where('id', '=', $request->id)->first();
            ActivityLogsController::insertLog("Category Edit Page");
            return view('gym.restaurant.edit', compact('category'));
        } catch (\Exception $e) {
            return response()->json([
                'response' => $e
            ], 400);
        }
    }

    public function categoryCreate(Request $request)
    {
        try {
            ActivityLogsController::insertLog("Category Add Page");
            return view('gym.restaurant.add');
        } catch (\Exception $e) {
            return response()->json([
                'response' => $e
            ], 400);
        }
    }

    public function categoryStore(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $category = new RestaurantMainCategory();
            $category->fill($request->only([
                'name',
                'gym_id'
            ]));
            $category->save();
            if ($request->hasFile('image')) {
                $images = [];
                $image = $request->file('image');
                $userImage = new Image();
                $this->uploadCategory($image, $userImage, 'path', null, $category->id);
                $images[] = $userImage;
                $category->categoryImage()->saveMany($images, $category);
            }
            ActivityLogsController::insertLog("Create New Category");
            return back()->with('success', 'Category Created Successfully!');
        } catch (\Exception $e) {
            return response()->json([
                'response' => $e
            ], 400);
        }
    }

    public function categoryUpdate (Request $request)
    {
        $id = $request->id;
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $category = RestaurantMainCategory::where('id', $id)->first();
            $category->fill($request->only([
                'name',
            ]));
            $category->save();
            if ($request->hasFile('image')) {
                $images = [];
                $image = $request->file('image');
                $userImage = new Image();
                $this->uploadCategory($image, $userImage, 'path', null, $id);
                $images[] = $userImage;
                $category->categoryImage()->saveMany($images, $category);
            }
            ActivityLogsController::insertLog("Update Category");
            return back()->with('success', 'Category Updated Successfully!');
        } catch (\Exception $e) {
            return response()->json([
                'response' => $e
            ], 400);
        }
    }

}
