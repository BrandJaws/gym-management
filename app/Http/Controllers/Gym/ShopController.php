<?php

namespace App\Http\Controllers\Gym;

use App\Http\Controllers\Controller;
use App\Http\Traits\FileUpload;
use App\Image;
use App\ShopCategory;
use App\ShopProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ShopController extends Controller
{
    use FileUpload;

    public function index(Request $request)
    {
        try {
            ActivityLogsController::insertLog("Shop List Page");
            return view('gym.shop.list', compact('shopProduct', 'shopCategory'));
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }

    public function shopCatgoryList(Request $request)
    {
        try {
            $pageSize = ($request->has('perPage') && (int)$request->get('perPage') > 0) ? (int)$request->get('perPage') : 0;
            $searchTerm = ($request->has('searchTerm') && $request->get('searchTerm')) ? $request->get('searchTerm') : null;
            $shopCategory = ShopCategory::getCategoryList(Auth::guard('employee')->user()->gym_id, $pageSize, $searchTerm);
            return response()->json([
                'response' => $shopCategory
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'response' => $e
            ], 400);
        }
    }

    public function productList($id)
    {
        try {
            $shopProduct = ShopProduct::where('category_id', '=', $id)->get();
            ActivityLogsController::insertLog("Select Shop Category");
            return response()->json([
                'response' => $shopProduct
            ], 200);
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }


    public function create()
    {
        ActivityLogsController::insertLog("View Shop Category Page");
        return view('gym.shop.category.create');
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'gym_id' => 'required',
                'name' => 'required',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $shopCategory = new ShopCategory();
            $shopCategory->fill($request->only([
                'gym_id',
                'name',
            ]));
            $shopCategory->save();
            if ($request->hasFile('image')) {
                $images = [];
                $image = $request->file('image');
                $userImage = new Image();
                $this->uploadShopCategoryImg($image, $userImage, 'path', null, $shopCategory->id);
                $images[] = $userImage;
                $shopCategory->categoryImage()->saveMany($images, $shopCategory);
            }
            ActivityLogsController::insertLog("Create New Shop Category ");
            return back()->with('success', 'Category Created Successfully!');
        } catch (\Exception $e) {
            return response()->json([
                'response' => $e
            ], 400);
        }
    }

    public function productCreate($id)
    {
        try {
            $selectCategory = ShopCategory::where('id', '=', $id)->first();
            $shopCategory = ShopCategory::where('gym_id', '=', Auth::guard('employee')->user()->gym_id)->orderBy('id', 'asc')->get();
            ActivityLogsController::insertLog("Shop Product Create Page");
            return view('gym.shop.product.create', compact('shopCategory', 'selectCategory'));
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
                'category_id' => 'required',
                'gym_id' => 'required',
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',
                'in_stock' => 'required',
                'visible' => 'required',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $shopProduct = new ShopProduct();
            $shopProduct->fill($request->only([
                'category_id',
                'gym_id',
                'name',
                'description',
                'price',
                'in_stock',
                'visible'
            ]));
            $shopProduct->save();
            if ($request->hasFile('image')) {
                $images = [];
                $image = $request->file('image');
                $userImage = new Image();
                $this->uploadProductImg($image, $userImage, 'path', null, $shopProduct->id);
                $images[] = $userImage;
                $shopProduct->productImage()->saveMany($images, $shopProduct);
            }
            ActivityLogsController::insertLog("Create Shop");
            return back()->with('success', 'Product Created Successfully!');
        } catch (\Exception $e) {
            return response()->json([
                'response' => $e
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        try {
            $shopCategory = ShopCategory::where('id', $id)->first();
            $shopProduct = ShopProduct::where('category_id', $id)->paginate(10);
            ActivityLogsController::insertLog("Shop Category Edit Page");
            return view('gym.shop.category.edit', compact('shopProduct', 'shopCategory'));
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }


    public function productEdit($id)
    {
        try {
            $shopCategory = ShopCategory::where('gym_id', '=', Auth::guard('employee')->user()->gym_id)->orderBy('id', 'asc')->get();
            $shop = ShopProduct::find($id);
            ActivityLogsController::insertLog("Shop Edit Page");
            return view('gym.shop.product.edit', compact('shop', 'shopCategory'));
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $category_id = $request->id;
        try {
            $validator = Validator::make($request->all(), [
                'gym_id' => 'required',
                'name' => 'required',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $shopCategory = ShopCategory::where('id', $category_id)->first();
            $shopCategory->fill($request->only([
                'name',
            ]));
            $shopCategory->save();
            if ($request->hasFile('image')) {
                $images = [];
                $image = $request->file('image');
                $userImage = new Image();
                $this->uploadShopCategoryImg($image, $userImage, 'path', null, $category_id);
                $images[] = $userImage;
                $shopCategory->categoryImage()->saveMany($images, $shopCategory);
            }
            ActivityLogsController::insertLog("Shop Category Update Shop");
            return back()->with('success', 'Shop Category Updated Successfully!');
        } catch (\Exception $e) {
            return response()->json([
                'response' => $e
            ], 400);
        }
    }

    public function productUpdate(Request $request)
    {
        $product_id = $request->id;
        try {
            $validator = Validator::make($request->all(), [
                'category_id' => 'required',
                'gym_id' => 'required',
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',
                'in_stock' => 'required',
                'visible' => 'required',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $shopProduct = ShopProduct::where('id', $product_id)->first();
            $shopProduct->fill($request->only([
                'category_id',
                'gym_id',
                'name',
                'description',
                'price',
                'in_stock',
                'visible'
            ]));
            $shopProduct->save();
            if ($request->hasFile('image')) {
                $images = [];
                $image = $request->file('image');
                $userImage = new Image();
                $this->uploadProductImg($image, $userImage, 'path', null, $product_id);
                $images[] = $userImage;
                $shopProduct->productImage()->saveMany($images, $shopProduct);
            }
            ActivityLogsController::insertLog("Update Shop Product");
            return back()->with('success', 'Shop Product Updated Successfully!');
        } catch (\Exception $e) {
            return response()->json([
                'response' => $e
            ], 400);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroyProduct($id)
    {
        try {
            dd($id);
            ShopProduct::destroy($id);
            $this->deleteProductImg($id);
            ShopProduct::where('category_id', $id)->delete();
            $this->deleteShopCategoryImg($id);
            ActivityLogsController::insertLog("Delete Shop Product");
            return response()->json([
                'response' => 'success'
            ], 200);
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }

    public function storeCategory(Request $request)
    {

        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $shopCategory = new ShopCategory ();
            $shopCategory->gym_id = Auth::guard('employee')->user()->gym_id;
            $shopCategory->name = $request->name;
            $shopCategory->save();
            ActivityLogsController::insertLog("Create Shop Category");
            return response()->json($shopCategory);
        } catch (\Exception $e) {
            return response()->json([
                'response' => $e
            ], 400);
        }
    }



    public function destroyCategory($id)
    {
        try {
            ShopCategory::destroy($id);
            $this->deleteShopCategoryImg($id);
            ShopProduct::where('category_id', $id)->delete();
            $this->deleteProductImg($id);
            ActivityLogsController::insertLog("Delete Shop Category");
            return response()->json([
                'response' => 'success'
            ], 200);
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }

}
