<?php

namespace App\Http\Controllers\Gym;

use App\Http\Traits\FileUpload;
use App\Image;
use App\Membership;
use App\Supplier;
use App\Gym;
use App\Http\Controllers\Controller;
use App\Treasury;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    use FileUpload;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $supplier = Supplier::orderBy('id', 'asc')->paginate(10);
            if ($request->ajax()) {
                $sort_by = $request->get('sortby');
                $sort_type = $request->get('sorttype');
                $query = $request->get('query');
                $searchTerm = str_replace(" ", "%", $query);
                $supplier = Supplier::getSupplierList($searchTerm, $sort_by, $sort_type);
                return view('gym.supplier.pagination_data', compact('supplier'))->render();
            }
            return view('gym.supplier.list', compact('supplier'));
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gym.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
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
            $supplier = Supplier::find($id);
            $treasuryDetail = Treasury::where('supplier_id', $id)->where('gym_id', Auth::guard('employee')->user()->gym_id)->paginate(10);
            return view('gym.supplier.edit', compact('supplier','treasuryDetail'));
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
