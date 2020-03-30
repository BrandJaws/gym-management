<?php

namespace App\Http\Controllers\Gym;

use App\Employee;
use App\Image;
use App\Member;
use App\Supplier;
use App\Trainer;
use App\Treasury;
use App\Gym;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TreasuryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $gym_id = Auth::guard('employee')->user()->gym_id;
            $treasury = Treasury::where('gym_id', $gym_id)->orderBy('id', 'asc')->paginate(4);
            if ($request->ajax()) {
                $sort_by = $request->get('sortby');
                $sort_type = $request->get('sorttype');
                $query = $request->get('query');
                $query = str_replace(" ", "%", $query);
                $treasury = Treasury::getTreasuryList($query, $sort_by, $sort_type);
                return view('gym.treasury.pagination_data', compact('treasury'))->render();
            }
            return view('gym.treasury.list', compact('treasury'));
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in treasury list');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gym_id = Auth::guard('employee')->user()->gym_id;
        $employee = Employee::where('gym_id', $gym_id)->get();
        $member = Member::where('gym_id', $gym_id)->get();
        $trainer = Trainer::where('gym_id', $gym_id)->get();
        $supplier = Supplier::where('gym_id', $gym_id)->get();
        return view('gym.treasury.create', compact('employee', 'member', 'trainer', 'supplier'));
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
                'employee_id' => 'required',
                'type' => 'required',
                'cashFlow' => 'required',
                'date' => 'required',
                'value' => 'required',
                'note' => 'required',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $treasury = new Treasury();
            $treasury->fill($request->only([
                'employee_id',
                'type',
                'cashFlow',
                'date',
                'value',
                'note',
            ]));
            $treasury->gym_id = Auth::guard('employee')->user()->gym_id;
            $value = $request->type;
            switch ($value) {
                case 'Employee':
                    $treasury->treasureable_id = $request->employeeId;
                    $treasury->treasureable_type = 'App\Employee';
                    $treasury->purpose = $request->employeePurpose;
                    break;
                case 'Member':
                    $treasury->treasureable_id = $request->member_id;
                    $treasury->treasureable_type = 'App\Member';
                    $treasury->purpose = $request->memberPurpose;
                    break;
                case 'Supplier':
                    $treasury->treasureable_id = $request->supplier_id;
                    $treasury->treasureable_type = 'App\Supplier';
                    $treasury->purpose = $request->supplierPurpose;
                    break;
                case 'Trainer':
                    $treasury->treasureable_id = $request->trainer_id;
                    $treasury->treasureable_type = 'App\Trainer';
                    $treasury->purpose = $request->trainerPurpose;
                    break;
                case 'Other':
                    $treasury->purpose = $request->otherPurpose;
                    break;
            }
            $treasury->save();
            return back()->with('success', 'Treasury Created Successfully!');
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
            $treasury = Treasury::find($id);
            dd($treasury->treasuryType);
            $gym_id = Auth::guard('employee')->user()->gym_id;
            $employee = Employee::where('gym_id', $gym_id)->get();
            $member = Member::where('gym_id', $gym_id)->get();
            $trainer = Trainer::where('gym_id', $gym_id)->get();
            $supplier = Supplier::where('gym_id', $gym_id)->get();
            return view('gym.treasury.edit', compact('treasury','employee', 'member', 'trainer', 'supplier'));
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in member edit page');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = $request->id;
        try {
            $validator = Validator::make($request->all(), [
                'employee_id' => 'required',
                'type' => 'required',
                'cashFlow' => 'required',
                'date' => 'required',
                'value' => 'required',
                'note' => 'required',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $treasury = Treasury::where('id', $id)->first();
            $treasury->fill($request->only([
                'employee_id',
                'type',
                'cashFlow',
                'date',
                'value',
                'note',
            ]));
            $treasury->gym_id = Auth::guard('employee')->user()->gym_id;
            $value = $request->type;
            switch ($value) {
                case 'Employee':
                    $treasury->treasureable_id = $request->employeeId;
                    $treasury->treasureable_type = 'App\Employee';
                    $treasury->purpose = $request->employeePurpose;
                    break;
                case 'Member':
                    $treasury->treasureable_id = $request->member_id;
                    $treasury->treasureable_type = 'App\Member';
                    $treasury->purpose = $request->memberPurpose;
                    break;
                case 'Supplier':
                    $treasury->treasureable_id = $request->supplier_id;
                    $treasury->treasureable_type = 'App\Supplier';
                    $treasury->purpose = $request->supplierPurpose;
                    break;
                case 'Trainer':
                    $treasury->treasureable_id = $request->trainer_id;
                    $treasury->treasureable_type = 'App\Trainer';
                    $treasury->purpose = $request->trainerPurpose;
                    break;
                case 'Other':
                    $treasury->purpose = $request->otherPurpose;
                    break;
            }
            $treasury->save();
            return back()->with('success', 'Treasury Updated Successfully!');
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
            Treasury::destroy($id);
            return back()->with('success', 'Treasury Deleted Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in treasury delete function');
        }
    }
}
