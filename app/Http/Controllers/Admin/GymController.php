<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Employee;
use App\Facilities;
use App\Gym;
use App\GymServices;
use App\Http\Controllers\Controller;
use App\License;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class GymController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $gym = Gym::WhereNull('parent_id')->orderBy('id', 'asc')->paginate(10);
            if ($request->ajax()) {
                $sort_by = $request->get('sortby');
                $sort_type = $request->get('sorttype');
                $query = $request->get('query');
                $query = str_replace(" ", "%", $query);
                $gym = Gym::getGymList($query, $sort_by, $sort_type);
                return view('admin.gym.pagination_data', compact('gym'))->render();
            }
            return view('admin.gym.list', compact('gym'));
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
        try {
            $countries = Country::all();
            $facilities = Facilities::all();
            return view('admin.gym.create', compact('countries', 'facilities'));
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
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
                'name' => 'required',
                'country' => 'required',
                'state' => 'required',
                'city' => 'required',
                'address' => 'required',
                'employeeName' => 'required',
                'email' => 'required|email|unique:employees',
                'password' => 'required|between:6,12',
                'cnic' => 'required',
                'gender' => 'required',
                'phone' => 'required',
                'salary' => 'required',
                'specialization' => 'required',
                'empAddress' => 'required',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $gym = new Gym();
            $gym->fill($request->only([
                'name',
                'inTrial',
                'trialEndsAt',
                'country',
                'state',
                'city',
                'address',
            ]));
            $gym->save();
            $gymId = $gym->id;
            $employee = new Employee();
            $employee->fill($request->only([
                'email',
                'gender',
                'cnic',
                'phone',
                'salary',
                'specialization',
            ]));
            $employee->name = $request->get('employeeName');
            $employee->password = bcrypt($request['password']);
            $employee->address = $request->get('empAddress');
            $employee->gym_id = $gymId;
            $code = Employee::getRentalNumber();
            $employee->code = $code;
            $employee->save();
            $license = new License();
            $license->fill($request->only([
                'amount',
                'startDate',
                'endDate',
            ]));
            $license->gym_id = $gymId;
            $license->save();
            $services = $request->get('facilities');
            if ($services != "") {
                foreach ($services as $value) {
                    GymServices::insert(
                        [
                            'name' => $value,
                            'gym_id' => $gymId
                        ]
                    );
                }
            }
            return back()->with('success', 'Gym Created Successfully!');
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
    public function edit(Request $request, $id)
    {
        $facilityList = [];
        $gym = Gym::find($id);
        $facilities = Facilities::all();
        $countries = Country::all();
        $gymServices = GymServices::where('gym_id', $id)->get();
        foreach ($gymServices as $service) {
            array_push($facilityList, $service->name);
        }
        $gymBranch = Gym::where('parent_id', $id)->orderBy('id', 'asc')->paginate(10);
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $gymBranch = Gym::getGymBranchList($query, $sort_by, $sort_type, $id);
            return view('admin.gym.branch.pagination_data', compact('gymBranch'))->render();
        }
        return view('admin.gym.edit', compact('gym', 'facilities', 'countries', 'facilityList', 'gymBranch'))->render();
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
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'country' => 'required',
                'state' => 'required',
                'city' => 'required',
                'address' => 'required',
                'employeeName' => 'required',
                'email' => 'required',
                'cnic' => 'required',
                'gender' => 'required',
                'phone' => 'required',
                'salary' => 'required',
                'specialization' => 'required',
                'empAddress' => 'required',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $gym_Id = $request->gym_id;
            $gym = Gym::where('id', $gym_Id)->first();
            $gym->fill($request->only([
                'name',
                'inTrial',
                'trialEndsAt',
                'country',
                'state',
                'city',
                'address',
            ]));
            $gym->save();
            $employee = Employee::where('gym_id', $gym_Id)->first();
            $password = $employee->password;
            $employee->fill($request->only([
                'email',
                'gender',
                'cnic',
                'phone',
                'salary',
                'specialization',
            ]));
            $employee->name = $request->get('employeeName');
            $employee->address = $request->get('empAddress');
            if (!empty($data['password'])) {
                $employee->password = bcrypt($request['password']);;
            } else {
                $employee->password = $password;
            }
            $employee->save();
            $license = License::where('gym_id', $gym_Id)->first();
            $license->fill($request->only([
                'amount',
                'startDate',
                'endDate',
            ]));
            $license->save();
            GymServices::where('gym_id', $gym_Id)->delete();
            $services = $request->get('facilities');
            if ($services != "") {
                foreach ($services as $value) {
                    GymServices::insert(
                        [
                            'name' => $value,
                            'gym_id' => $gym_Id
                        ]
                    );
                }
            }
            return back()->with('success', 'Gym Updated Successfully!');
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
            Gym::destroy($id);
            Employee::where('gym_id', $id)->delete();
            License::where('gym_id', $id)->delete();
            GymServices::where('gym_id', $id)->delete();
            return back()->with('success', 'Gym Deleted Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }

    public function branchCreate($id)
    {
        try {
            $facilityList = [];
            $gym = Gym::where('id', $id)->first();
            $countries = Country::all();
            $facilities = Facilities::all();
            $gymServices = GymServices::where('gym_id', $id)->get();
            foreach ($gymServices as $service) {
                array_push($facilityList, $service->name);
            }
            return view('admin.gym.branch.create', compact('countries', 'facilities', 'gym', 'facilityList'));
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }

    public function branchAdd(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'gym_id' => 'required',
                'country' => 'required',
                'state' => 'required',
                'city' => 'required',
                'address' => 'required',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $gym = new Gym();
            $gym->fill($request->only([
                'name',
                'inTrial',
                'trialEndsAt',
                'country',
                'state',
                'city',
                'address',
            ]));
            $gym->parent_id = $request->get('gym_id');
            $gym->save();
            $gymId = $gym->id;
            $license = new License();
            $license->fill($request->only([
                'amount',
                'startDate',
                'endDate',
            ]));
            $license->gym_id = $gymId;
            $license->save();
            $services = $request->get('facilities');
            if ($services != "") {
                foreach ($services as $value) {
                    GymServices::insert(
                        [
                            'name' => $value,
                            'gym_id' => $gymId
                        ]
                    );
                }
            }
            return back()->with('success', 'Gym Branch Created Successfully!');
        } catch (\Exception $e) {
            return response()->json([
                'response' => $e
            ], 400);
        }
    }

    public function destroyBranch($id)
    {
        try {
            Gym::destroy($id);
            License::where('gym_id', $id)->delete();
            GymServices::where('gym_id', $id)->delete();
            return back()->with('success', 'Gym Branch Deleted Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }

    public function editBranch(Request $request, $id)
    {
        $facilityList = [];
        $gym = Gym::find($id);
        $facilities = Facilities::all();
        $countries = Country::all();
        $gymServices = GymServices::where('gym_id', $id)->get();
        foreach ($gymServices as $service) {
            array_push($facilityList, $service->name);
        }
        return view('admin.gym.branch.edit', compact('gym', 'facilities', 'countries', 'facilityList'))->render();
    }

    public function branchUpdate(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'country' => 'required',
                'state' => 'required',
                'city' => 'required',
                'address' => 'required',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $gym_Id = $request->gym_id;
            $gym = Gym::where('id', $gym_Id)->first();
            $gym->fill($request->only([
                'name',
                'inTrial',
                'trialEndsAt',
                'country',
                'state',
                'city',
                'address',
            ]));
            $gym->save();
            $license = License::where('gym_id', $gym_Id)->first();
            $license->fill($request->only([
                'amount',
                'startDate',
                'endDate',
            ]));
            $license->save();
            GymServices::where('gym_id', $gym_Id)->delete();
            $services = $request->get('facilities');
            if ($services != "") {
                foreach ($services as $value) {
                    GymServices::insert(
                        [
                            'name' => $value,
                            'gym_id' => $gym_Id
                        ]
                    );
                }
            }
            return back()->with('success', 'Gym Updated Successfully!');
        } catch (\Exception $e) {
            return response()->json([
                'response' => $e
            ], 400);
        }
    }

    public function license()
    {
        try {
            return view('admin.gym.license.list');
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }

    public function licenseCreate()
    {
        try {
            return view('admin.gym.license.create');
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }
}
