<?php

namespace App\Http\Controllers\Gym;

use App\Employee;
use App\Gym;
use App\Http\Controllers\Controller;
use App\Http\Traits\FileUpload;
use App\Image;
use App\Treasury;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class EmployeeController extends Controller
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
            $employee = Employee::where('gym_id', Auth::guard('employee')->user()->gym_id)->orderBy('id', 'asc')->paginate(10);
            if ($request->ajax()) {
                $sort_by = $request->get('sortby');
                $sort_type = $request->get('sorttype');
                $searchTerm = $request->get('query');
                $searchTerm = str_replace(" ", "%", $searchTerm);
                $employee = Employee::getEmployeeList($searchTerm, $sort_by, $sort_type);
                return view('gym.employee.pagination_data', compact('employee'))->render();
            }
            return view('gym.employee.list', compact('employee'));
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in employee page');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $gym = Gym::where('parent_id', '=', Auth::guard('employee')->user()->parentGym->id)->get();
            return view('gym.employee.create', compact('gym'));
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in employee add page');
        }
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
                'gym_id' => 'required',
                'name' => 'required',
                'gender' => 'required',
                'timeIn' => 'required',
                'timeOut' => 'required',
                'email' => 'required|email|unique:employees',
                'password' => 'between:6,12|required_with:password_confirmation|same:password_confirmation',
                'cnic' => 'required',
                'phone' => 'required',
                'salary' => 'required',
                'specialization' => 'required',
                'address' => 'required',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $employee = new Employee();
            $employee->fill($request->only([
                'name',
                'email',
                'gender',
                'cnic',
                'phone',
                'salary',
                'specialization',
                'address',
                'timeIn',
                'timeOut',
                'gym_id'
            ]));
            $employee->password = bcrypt($request['password']);
            $code = Employee::getRentalNumber();
            $employee->code = $code;
            $employee->save();
            if ($request->hasFile('image')) {
                $images = [];
                $image = $request->file('image');
                $userImage = new Image();
                $this->uploadEmployee($image, $userImage, 'path', null, $employee->id);
                $images[] = $userImage;
                $employee->userImage()->saveMany($images, $employee);
            }
            return back()->with('success', 'Employee Created Successfully!');
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
            $employee = Employee::find($id);
            $gym = Gym::where('parent_id', '=', Auth::guard('employee')->user()->parentGym->id)->get();
            $treasuryDetail = Treasury::where('employeeId', $id)->where('gym_id', Auth::guard('employee')->user()->gym_id)->paginate(10);
            return view('gym.employee.edit', compact('employee', 'gym', 'treasuryDetail'));
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in employee update page');
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
                'gym_id' => 'required',
                'id' => 'required',
                'name' => 'required',
                'gender' => 'required',
                'timeIn' => 'required',
                'timeOut' => 'required',
                'email' => 'unique:employees,email,' . $id,
                'password' => 'nullable|between:6,12,password' . $id,
                'password_confirmation' => 'same:password',
                'cnic' => 'required',
                'phone' => 'required',
                'salary' => 'required',
                'specialization' => 'required',
                'address' => 'required',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $employee = Employee::where('id', $id)->first();
            $password = $employee->password;
            $employee->fill($request->only([
                'name',
                'email',
                'gender',
                'cnic',
                'phone',
                'salary',
                'specialization',
                'address',
                'timeIn',
                'timeOut',
                'gym_id'
            ]));
            if (!empty($request->password)) {
                $employee->password = Hash::make($request->password);
            } else {
                $employee->password = $password;
            }
            $employee->save();
            if ($request->hasFile('images')) {
                $images = [];
                $image = $request->file('images');
                $userImage = new Image();
                $this->uploadEmployee($image, $userImage, 'path', null, $employee->id);
                $images[] = $userImage;
                $employee->userImage()->saveMany($images, $employee);
            }
            return back()->with('success', 'Employee Updated Successfully!');
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
            Employee::destroy($id);
            return back()->with('success', 'Employee Deleted Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in employee delete function');
        }
    }
}
