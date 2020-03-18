<?php

namespace App\Http\Controllers\Gym;

use App\Gym;
use App\Membership;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $membership = Membership::orderBy('id', 'asc')->paginate(10);
            if ($request->ajax()) {
                $sort_by = $request->get('sortby');
                $sort_type = $request->get('sorttype');
                $searchTerm = $request->get('query');
                $searchTerm = str_replace(" ", "%", $searchTerm);
                $membership = Membership::getMembershipList($searchTerm, $sort_by, $sort_type);
                return view('gym.membership.pagination_data', compact('membership'))->render();
            }
            return view('gym.membership.list', compact('membership'));
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
        $gym = Gym::where('parent_id', '=', Auth::guard('employee')->user()->parentGym->id)->get();
        return view('gym.membership.create', compact('gym'));
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
                'duration' => 'required',
                'amount' => 'required',
                'monthlyFee' => 'required',
                'detail' => 'required',
                'gym_id' => 'required'
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $membership = new Membership();
            $membership->fill($request->only([
                'name',
                'duration',
                'amount',
                'monthlyFee',
                'detail'
            ]));
            $membership->gym_id = implode(',', $request->gym_id);
            $membership->save();
            return back()->with('success', 'Membership Created Successfully!');
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
            $membership = Membership::find($id);
            $gym = Gym::where('parent_id', '=', Auth::guard('employee')->user()->parentGym->id)->get();
            $gymId = explode(',',$membership->gym_id);
            foreach ($gymId as $fields) {
                array_push($gymSelectedList, $fields);
            }
            return view('gym.membership.edit', compact('membership','gym','gymSelectedList'));
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
                'id' => 'required',
                'name' => 'required',
                'duration' => 'required',
                'amount' => 'required',
                'monthlyFee' => 'required',
                'detail' => 'required',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $membership_id = $request->id;
            $membership = Membership::where('id', $membership_id)->first();
            $membership->fill($request->only([
                'name',
                'duration',
                'amount',
                'monthlyFee',
                'detail',
            ]));
            $membership->gym_id = implode(',', $request->gym_id);
            $membership->save();
            return back()->with('success', 'Member Ship Updated Successfully!');
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
            Membership::destroy($id);
            return back()->with('success', 'Membership Deleted Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }
}
