<?php

namespace App\Http\Controllers\Gym;

use App\Gym;
use App\GymServices;
use App\Http\Controllers\Controller;
use App\Member;
use App\Treasury;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $gym_id = Auth::guard('employee')->user()->gym_id;

        $gymSer = GymServices::all();
        foreach ($gymSer as $fields) {
            $gymId = explode(',', $fields->gym_id);
            foreach ($gymId as $value) {
                $gymServices = GymServices::where('gym_id', $value)->orderBy('id', 'asc')->paginate(10);
            }
        }


//        foreach ($gymId as $fields) {
//            array_push($gymSelectedList, $fields);
//        }
//
//
//        $gymServices = GymServices::where('parent_id', $gym_id)->orderBy('id', 'asc')->paginate(10);
//        if ($request->ajax()) {
//            $sort_by = $request->get('sortby');
//            $sort_type = $request->get('sorttype');
//            $searchTerm = $request->get('query');
//            $searchTerm = str_replace(" ", "%", $searchTerm);
//            $gymServices = Employee::getEmployeeList($searchTerm, $sort_by, $sort_type);
//            return view('gym.employee.pagination_data', compact('gymServices'))->render();
//        }
        return view('gym.service.list', compact('gymServices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gym_id = Auth::guard('employee')->user()->gym_id;
        $gym = Gym::where('parent_id', $gym_id)->get();
        return view('gym.service.create', compact('gym'));
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
                'fee' => 'required',
                'status' => 'required',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $service = new GymServices();
            $service->fill($request->only([
                'name',
                'fee',
                'status',
            ]));
            $code = GymServices::getServiceCode($request->name);
            $service->code = $code;
            $service->gym_id = implode(',', $request->gym_id);
            $service->save();
            return back()->with('success', 'Service Created Successfully!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
