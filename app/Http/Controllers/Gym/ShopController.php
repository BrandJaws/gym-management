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
            $shopProduct = ShopProduct::where('gym_id', '=', Auth::guard('employee')->user()->gym_id)->orderBy('id', 'asc')->paginate(10);
            $shopCategory = ShopCategory::where('gym_id', '=', Auth::guard('employee')->user()->gym_id)->orderBy('id', 'asc')->get();
            if ($request->ajax()) {
                $sort_by = $request->get('sortby');
                $sort_type = $request->get('sorttype');
                $query = $request->get('query');
                $searchTerm = str_replace(" ", "%", $query);
                $shopProduct = ShopProduct::getProductList($searchTerm, $sort_by, $sort_type);
                return view('gym.shop.pagination_data', compact('shopProduct'))->render();
            }
            ActivityLogsController::insertLog("Shop List Page");
            return view('gym.shop.list', compact('shopProduct', 'shopCategory'));
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }

    public function create()
    {
        $shopCategory = ShopCategory::where('gym_id', '=', Auth::guard('employee')->user()->gym_id)->orderBy('id', 'asc')->get();
        ActivityLogsController::insertLog("Shop Create Page");
        return view('gym.shop.create', compact('shopCategory'));
    }

    public function store(Request $request)
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
                $shopProduct->userImage()->saveMany($images, $shopProduct);
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
            $shopCategory = ShopCategory::where('gym_id', '=', Auth::guard('employee')->user()->gym_id)->orderBy('id', 'asc')->get();
            $shop = ShopProduct::find($id);
            ActivityLogsController::insertLog("Shop Edit Page");
            return view('gym.shop.edit', compact('shop', 'shopCategory'));
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
                $shopProduct->userImage()->saveMany($images, $shopProduct);
            }
            ActivityLogsController::insertLog("Update Shop");
            return back()->with('success', 'Product Updated Successfully!');
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
    public function destroy($id)
    {
        try {
            ShopProduct::destroy($id);
            $this->deleteProductImg($id);
            ActivityLogsController::insertLog("Delete Shop");
            return back()->with('success', 'Product Deleted Successfully!');
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

    public function editItem(Request $req)
    {
        try {
            $validator = Validator::make($req->all(), [
                'name' => 'required',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $shopCategory = ShopCategory::find($req->id);
            $shopCategory->name = $req->name;
            $shopCategory->save();
            ActivityLogsController::insertLog("Edit Shop Category");
            return response()->json($shopCategory);
        } catch (\Exception $e) {
            return response()->json([
                'response' => $e
            ], 400);
        }
    }

    public function destroyCategory(Request $req)
    {
        try {
            ShopCategory::find( $req->id )->delete ();
            ShopProduct::where('category_id',$req->id )->delete ();
            ActivityLogsController::insertLog("Delete Shop & Category");
            return response ()->json ();
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }

}
