<?php

namespace App\Http\Controllers\Gym;
use App\Employee;
use App\Member;
use App\Supplier;
use App\Trainer;
use App\Treasury;
use App\Gym;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            $treasury = Treasury::orderBy('id', 'asc')->paginate(4);
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
        return view('gym.treasury.create', compact('employee','member','trainer','supplier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
