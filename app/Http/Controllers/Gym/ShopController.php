<?php

namespace App\Http\Controllers\Gym;

use App\Http\Controllers\Controller;
use App\Image;
use App\ShopCategory;
use App\ShopProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        try {
            $shopProduct = ShopProduct::where('gym_id', '=', Auth::guard('employee')->user()->gym_id)->orderBy('id', 'asc')->paginate(10);
            $shopCategory = ShopCategory::where('gym_id', '=', Auth::guard('employee')->user()->gym_id)->orderBy('id', 'asc')->paginate(10);
            if ($request->ajax()) {
                $sort_by = $request->get('sortby');
                $sort_type = $request->get('sorttype');
                $query = $request->get('query');
                $searchTerm = str_replace(" ", "%", $query);
                $shopProduct = ShopProduct::getProductList($searchTerm, $sort_by, $sort_type);
                return view('gym.shop.pagination_data', compact('shopProduct'))->render();
            }
            return view('gym.shop.list', compact('shopProduct','shopCategory'));
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }
    public function create()
    {
        return view('gym.shop.create');
    }
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'status' => 'required',
                'name' => 'required',
                'phone' => 'required',
                'gym_id' => 'required',
                'email' => 'nullable|email|unique:suppliers',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $supplier = new Supplier();
            $supplier->fill($request->only([
                'status',
                'name',
                'phone',
                'email',
                'note',
                'gym_id'
            ]));
            $supplier->save();
            if ($request->hasFile('image')) {
                $images = [];
                $image = $request->file('image');
                $userImage = new Image();
                $this->uploadSupplier($image, $userImage, 'path', null, $supplier->id);
                $images[] = $userImage;
                $supplier->userImage()->saveMany($images, $supplier);
            }
            return back()->with('success', 'Supplier Created Successfully!');
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
            $shop = ShopCategory::find($id);
            return view('gym.shop.edit', compact('shop'));
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
        $supplier_id = $request->id;
        try {
            $validator = Validator::make($request->all(), [
                'status' => 'required',
                'name' => 'required',
                'phone' => 'required',
                'gym_id' => 'required',
                'email' => 'nullable|unique:suppliers,email,' . $supplier_id,
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $supplier = Supplier::where('id', $supplier_id)->first();
            $supplier->fill($request->only([
                'name',
                'duration',
                'amount',
                'monthlyFee',
                'detail',
            ]));
            $supplier->save();
            if ($request->hasFile('image')) {
                $images = [];
                $image = $request->file('image');
                $userImage = new Image();
                $this->uploadSupplier($image, $userImage, 'path', null, $supplier_id);
                $images[] = $userImage;
                $supplier->userImage()->saveMany($images, $supplier);
            }
            return back()->with('success', 'Supplier Updated Successfully!');
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
            Supplier::destroy($id);
            $this->deleteSupplierImg($id);
            return back()->with('success', 'Supplier Deleted Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }
}
