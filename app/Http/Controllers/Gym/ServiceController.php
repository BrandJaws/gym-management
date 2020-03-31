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
        try {
            $gym_id = Auth::guard('employee')->user()->gym_id;
            $gymServices = GymServices::where('gym_id', $gym_id)->orderBy('id', 'asc')->paginate(10);
            if ($request->ajax()) {
                $sort_by = $request->get('sortby');
                $sort_type = $request->get('sorttype');
                $searchTerm = $request->get('query');
                $searchTerm = str_replace(" ", "%", $searchTerm);
                $gymServices = GymServices::getServiceList($searchTerm, $sort_by, $sort_type);
                return view('gym.service.pagination_data', compact('gymServices'))->render();
            }
            return view('gym.service.list', compact('gymServices'));
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
            $gym_id = Auth::guard('employee')->user()->gym_id;
            $gym = Gym::where('parent_id', $gym_id)->get();
            return view('gym.service.create', compact('gym'));
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
        try {
            $gymSelectedList = [];
            $gym_id = Auth::guard('employee')->user()->gym_id;
            $gym = Gym::where('parent_id', $gym_id)->get();
            $gymServices = GymServices::find($id);
            $gymId = explode(',', $gymServices->gym_id);
            foreach ($gymId as $fields) {
                array_push($gymSelectedList, $fields);
            }
            return view('gym.service.edit', compact('gymServices', 'gym', 'gymSelectedList'));
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
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'fee' => 'required',
                'status' => 'required',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $service_id = $request->id;
            $service = GymServices::where('id', $service_id)->first();
            $service->fill($request->only([
                'name',
                'fee',
                'status',
            ]));
            $service->gym_id = implode(',', $request->gym_id);
            $service->save();
            return back()->with('success', 'Service Updated Successfully!');
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
            GymServices::destroy($id);
            return back()->with('success', 'Gym Service Deleted Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }
}
