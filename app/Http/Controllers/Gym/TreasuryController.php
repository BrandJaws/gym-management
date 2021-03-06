<?php

namespace App\Http\Controllers\Gym;

use App\Employee;
use App\Member;
use App\Supplier;
use App\Trainer;
use App\Treasury;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Notification;

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
            $treasuryCashIn = Treasury::where('gym_id', $gym_id)->where('cashFlow', 'In')->sum('value');
            $treasuryCashOut = Treasury::where('gym_id', $gym_id)->where('cashFlow', 'Out')->sum('value');
            $treasuryCashExtra = Treasury::where('gym_id', $gym_id)->where('cashFlow', 'Extra')->sum('value');
            $treasuryCashDiscount = Treasury::where('gym_id', $gym_id)->where('cashFlow', 'Discount')->sum('value');
            ActivityLogsController::insertLog("Treasury List Page ");
            return view('gym.treasury.list', compact('treasury','treasuryCashIn','treasuryCashOut','treasuryCashExtra','treasuryCashDiscount'));
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
        $member = Member::where('gym_id', $gym_id)->where('type', 'Member')->get();
        $trainer = Trainer::where('gym_id', $gym_id)->get();
        $supplier = Supplier::where('gym_id', $gym_id)->get();
        ActivityLogsController::insertLog("Treasury Create Page ");
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
                case 'employee':
                    $treasury->employeeId = $request->employeeId;
                    $treasury->member_id = '0';
                    $treasury->supplier_id = '0';
                    $treasury->trainer_id = '0';
                    $treasury->purpose = $request->employeePurpose;
                    $treasury->save();
                    // Welcome Notification
                    $trainer = Employee::where('id',$request->employeeId)->get();
                    $letter = collect(['title' => 'Treasury Alert', 'body' => 'Status = '.$request->employeePurpose.' & This is a treasury alert! ']);
                    Notification::send($trainer, new DatabaseNotification($letter));
                    break;
                case 'Member':
                    $treasury->member_id = $request->member_id;
                    $treasury->employeeId = '0';
                    $treasury->supplier_id = '0';
                    $treasury->trainer_id = '0';
                    $treasury->purpose = $request->memberPurpose;
                    $treasury->save();
                    // Welcome Notification
                    $trainer = Member::where('id',$request->member_id)->get();
                    $letter = collect(['title' => 'Treasury Alert', 'body' => 'Status = '.$request->memberPurpose.' & This is a treasury alert! ']);
                    Notification::send($trainer, new DatabaseNotification($letter));
                    break;
                case 'Supplier':
                    $treasury->supplier_id = $request->supplier_id;
                    $treasury->member_id = '0';
                    $treasury->employeeId = '0';
                    $treasury->trainer_id = '0';
                    $treasury->purpose = $request->supplierPurpose;
                    $treasury->save();
                    // Welcome Notification
                    $trainer = Supplier::where('id',$request->supplier_id)->get();
                    $letter = collect(['title' => 'Treasury Alert', 'body' => 'Status = '.$request->supplierPurpose.' & This is a treasury alert! ']);
                    Notification::send($trainer, new DatabaseNotification($letter));
                    break;
                case 'Trainer':
                    $treasury->trainer_id = $request->trainer_id;
                    $treasury->supplier_id = '0';
                    $treasury->member_id = '0';
                    $treasury->employeeId = '0';
                    $treasury->purpose = $request->trainerPurpose;
                    $treasury->save();
                    // Welcome Notification
                    $trainer = Trainer::where('id',$request->trainer_id)->get();
                    $letter = collect(['title' => 'Treasury Alert', 'body' => 'Status = '.$request->trainerPurpose.' & This is a treasury alert! ']);
                    Notification::send($trainer, new DatabaseNotification($letter));
                    break;
                case 'Other':
                    $treasury->trainer_id = '0';
                    $treasury->supplier_id = '0';
                    $treasury->member_id = '0';
                    $treasury->employeeId = '0';
                    $treasury->purpose = $request->otherPurpose;
                    $treasury->save();
                    break;
            }

            ActivityLogsController::insertLog("Create New Treasury");
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
            $gym_id = Auth::guard('employee')->user()->gym_id;
            $employee = Employee::where('gym_id', $gym_id)->get();
            $member = Member::where('gym_id', $gym_id)->get();
            $trainer = Trainer::where('gym_id', $gym_id)->get();
            $supplier = Supplier::where('gym_id', $gym_id)->get();
            ActivityLogsController::insertLog("Treasury Edit Page ");
            return view('gym.treasury.edit', compact('treasury', 'employee', 'member', 'trainer', 'supplier'));
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
    public function update(Request $request)
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
                case 'employee':
                    $treasury->employeeId = $request->employeeId;
                    $treasury->member_id = '0';
                    $treasury->supplier_id = '0';
                    $treasury->trainer_id = '0';
                    $treasury->purpose = $request->employeePurpose;
                    $treasury->save();
                    // Welcome Notification
                    $trainer = Employee::where('id',$request->employeeId)->get();
                    $letter = collect(['title' => 'Treasury Alert', 'body' => 'Status = '.$request->employeePurpose.' & This is a treasury alert! ']);
                    Notification::send($trainer, new DatabaseNotification($letter));
                    break;
                case 'Member':
                    $treasury->member_id = $request->member_id;
                    $treasury->employeeId = '0';
                    $treasury->supplier_id = '0';
                    $treasury->trainer_id = '0';
                    $treasury->purpose = $request->memberPurpose;
                    $treasury->save();
                    // Welcome Notification
                    $trainer = Member::where('id',$request->member_id)->get();
                    $letter = collect(['title' => 'Treasury Alert', 'body' => 'Status = '.$request->memberPurpose.' & This is a treasury alert! ']);
                    Notification::send($trainer, new DatabaseNotification($letter));
                    break;
                case 'Supplier':
                    $treasury->supplier_id = $request->supplier_id;
                    $treasury->member_id = '0';
                    $treasury->employeeId = '0';
                    $treasury->trainer_id = '0';
                    $treasury->purpose = $request->supplierPurpose;
                    $treasury->save();
                    // Welcome Notification
                    $trainer = Supplier::where('id',$request->supplier_id)->get();
                    $letter = collect(['title' => 'Treasury Alert', 'body' => 'Status = '.$request->supplierPurpose.' & This is a treasury alert! ']);
                    Notification::send($trainer, new DatabaseNotification($letter));
                    break;
                case 'Trainer':
                    $treasury->trainer_id = $request->trainer_id;
                    $treasury->supplier_id = '0';
                    $treasury->member_id = '0';
                    $treasury->employeeId = '0';
                    $treasury->purpose = $request->trainerPurpose;
                    $treasury->save();
                    // Welcome Notification
                    $trainer = Trainer::where('id',$request->trainer_id)->get();
                    $letter = collect(['title' => 'Treasury Alert', 'body' => 'Status = '.$request->trainerPurpose.' & This is a treasury alert! ']);
                    Notification::send($trainer, new DatabaseNotification($letter));
                    break;
                case 'Other':
                    $treasury->trainer_id = '0';
                    $treasury->supplier_id = '0';
                    $treasury->member_id = '0';
                    $treasury->employeeId = '0';
                    $treasury->purpose = $request->otherPurpose;
                    $treasury->save();
                    break;
            }
            ActivityLogsController::insertLog("Update Treasury");
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
            ActivityLogsController::insertLog("Delete Treasury");
            return back()->with('success', 'Treasury Deleted Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in treasury delete function');
        }
    }
}
