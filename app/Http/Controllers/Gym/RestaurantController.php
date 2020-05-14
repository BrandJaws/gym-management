<?php

namespace App\Http\Controllers\Gym;

use App\Http\Controllers\Controller;
use App\Http\Traits\FileUpload;
use App\Image;
use App\Member;
use App\RestaurantMainCategory;
use App\RestaurantOrder;
use App\RestaurantProduct;
use App\RestaurantSubCategory;
use Carbon\Carbon;
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

    // Category CRUD
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

    public function categoryUpdate(Request $request)
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

    public function deleteCategory($id)
    {
        try {
            RestaurantMainCategory::destroy($id);
            $this->deleteCategoryImg($id);
            RestaurantSubCategory::where('restaurant_main_category_id', $id)->delete();
            ActivityLogsController::insertLog("Delete Category");
            return back()->with('success', 'Category Deleted Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }

    // SubCategory CRUD
    public function subCategoryList(Request $request)
    {
        $id = $request->id;
        try {
            $subCategory = RestaurantSubCategory::getSubCategoryList($id);
            ActivityLogsController::insertLog("Restaurant SubCategory Page ");
            return response()->json([
                'response' => $subCategory
            ], 200);
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }

    public function subCategoryCreate(Request $request)
    {
        try {
            $category = RestaurantMainCategory::where('id', '=', $request->id)->first();
            ActivityLogsController::insertLog("SubCategory Add Page");
            return view('gym.restaurant.subCategory.add', compact('category'));
        } catch (\Exception $e) {
            return response()->json([
                'response' => $e
            ], 400);
        }
    }

    public function subCategoryStore(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'restaurant_main_category_id' => 'required',
                'name' => 'required',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $category = new RestaurantSubCategory();
            $category->fill($request->only([
                'restaurant_main_category_id',
                'name',
                'gym_id'
            ]));
            $category->save();
            if ($request->hasFile('image')) {
                $images = [];
                $image = $request->file('image');
                $userImage = new Image();
                $this->uploadSubCategory($image, $userImage, 'path', null, $category->id);
                $images[] = $userImage;
                $category->subCategoryImage()->saveMany($images, $category);
            }
            ActivityLogsController::insertLog("Create New SubCategory");
            return back()->with('success', 'SubCategory Created Successfully!');
        } catch (\Exception $e) {
            return response()->json([
                'response' => $e
            ], 400);
        }
    }

    public function subCategoryEdit(Request $request)
    {
        try {
            $category = RestaurantMainCategory::all();
            $subCategory = RestaurantSubCategory::where('id', '=', $request->id)->first();
            ActivityLogsController::insertLog("Category Edit Page");
            return view('gym.restaurant.subCategory.edit', compact('subCategory', 'category'));
        } catch (\Exception $e) {
            return response()->json([
                'response' => $e
            ], 400);
        }
    }

    public function subCategoryUpdate(Request $request)
    {
        $id = $request->id;
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'restaurant_main_category_id' => 'required',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $subCategory = RestaurantSubCategory::where('id', $id)->first();
            $subCategory->fill($request->only([
                'name',
                'restaurant_main_category_id',
            ]));
            $subCategory->save();
            if ($request->hasFile('image')) {
                $images = [];
                $image = $request->file('image');
                $userImage = new Image();
                $this->uploadSubCategory($image, $userImage, 'path', null, $id);
                $images[] = $userImage;
                $subCategory->subCategoryImage()->saveMany($images, $subCategory);
            }
            ActivityLogsController::insertLog("Update SubCategory");
            return back()->with('success', 'Category Updated Successfully!');
        } catch (\Exception $e) {
            return response()->json([
                'response' => $e
            ], 400);
        }
    }

    public function deleteSubCategory($id)
    {
        try {
            RestaurantSubCategory::destroy($id);
            $this->deleteSubCategoryImg($id);
            RestaurantProduct::where('restaurant_sub_category_id', $id)->delete();
            ActivityLogsController::insertLog("Delete Category");
            return back()->with('success', 'Category Deleted Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }


    // Product CRUD
    public function productsList(Request $request)
    {
        $id = $request->id;
        try {
            $subCategory = RestaurantProduct::getProductsList($id);
            ActivityLogsController::insertLog("Restaurant Products Page ");
            return response()->json([
                'response' => $subCategory
            ], 200);
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }

    public function productCreate(Request $request)
    {
        try {
            $subCategory = RestaurantSubCategory::where('id', '=', $request->id)->first();
            ActivityLogsController::insertLog("SubCategory Add Page");
            return view('gym.restaurant.product.add', compact('subCategory'));
        } catch (\Exception $e) {
            return response()->json([
                'response' => $e
            ], 400);
        }
    }

    public function productStore(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'restaurant_sub_category_id' => 'required',
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',
                'in_stock' => 'required',
                'visible' => 'required',
                'ingredients' => 'required',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $product = new RestaurantProduct();
            $product->fill($request->only([
                'restaurant_sub_category_id',
                'name',
                'gym_id',
                'description',
                'price',
                'in_stock',
                'visible',
                'ingredients'
            ]));
            $product->save();
            if ($request->hasFile('image')) {
                $images = [];
                $image = $request->file('image');
                $userImage = new Image();
                $this->uploadProduct($image, $userImage, 'path', null, $product->id);
                $images[] = $userImage;
                $product->productImage()->saveMany($images, $product);
            }
            ActivityLogsController::insertLog("Create New Product");
            return back()->with('success', 'Product Created Successfully!');
        } catch (\Exception $e) {
            return response()->json([
                'response' => $e
            ], 400);
        }
    }

    public function productEdit(Request $request)
    {
        try {
            $subCategory = RestaurantSubCategory::all();
            $product = RestaurantProduct::where('id', '=', $request->id)->first();
            ActivityLogsController::insertLog("Category Edit Page");
            return view('gym.restaurant.product.edit', compact('subCategory', 'product'));
        } catch (\Exception $e) {
            return response()->json([
                'response' => $e
            ], 400);
        }
    }

    public function productUpdate(Request $request)
    {
        $id = $request->id;
        try {
            $validator = Validator::make($request->all(), [
                'restaurant_sub_category_id' => 'required',
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',
                'in_stock' => 'required',
                'visible' => 'required',
                'ingredients' => 'required',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $product = RestaurantProduct::where('id', $id)->first();
            $product->fill($request->only([
                'restaurant_sub_category_id',
                'name',
                'gym_id',
                'description',
                'price',
                'in_stock',
                'visible',
                'ingredients'
            ]));
            $product->save();
            if ($request->hasFile('image')) {
                $images = [];
                $image = $request->file('image');
                $userImage = new Image();
                $this->uploadProduct($image, $userImage, 'path', null, $id);
                $images[] = $userImage;
                $product->productImage()->saveMany($images, $product);
            }
            ActivityLogsController::insertLog("Update Product");
            return back()->with('success', 'Product Updated Successfully!');
        } catch (\Exception $e) {
            return response()->json([
                'response' => $e
            ], 400);
        }
    }

    public function deleteProduct($id)
    {
        try {
            RestaurantProduct::destroy($id);
            $this->deleteProductImage($id);
            ActivityLogsController::insertLog("Delete Product");
            return back()->with('success', 'Product Deleted Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }

    //orderArchive

    public function orderArchive(Request $request)
    {
        try {
            $member = Member::where('gym_id', Auth::guard('employee')->user()->gym_id)->where('type', 'Member')->orderBy('id', 'asc')->get();
            ActivityLogsController::insertLog("Order Archive Page");
            return view('gym.restaurant.orderArchive', compact('member'));
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }

    public function getOrderReport(Request $request)
    {
        try {
            $member = Member::where('gym_id', Auth::guard('employee')->user()->gym_id)->where('type', 'Member')->orderBy('id', 'asc')->get();
            $gym_id = Auth::guard('employee')->user()->gym_id;
            $order = RestaurantOrder::getOrderReport($gym_id,$request->member_id,$request->date,$request->from,$request->to);
            ActivityLogsController::insertLog("Order Archive Page");
            return view('gym.restaurant.orderArchive', compact('member','order'));
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }
}
