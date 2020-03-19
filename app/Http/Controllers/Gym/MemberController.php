<?php

namespace App\Http\Controllers\Gym;

use App\Gym;
use App\Member;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashobard(Request $request)
    {
        try {
            return view('gym.member.dashboard');
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }

    public function archive($value)
    {
        try {
            switch ($value) {
                case 'Leads':
                    $breadcrumbs = "Leads";
                    break;
                case 'FailedCalls':
                    $breadcrumbs = "Failed Calls";
                    break;
                case 'NotJoinedMembers':
                    $breadcrumbs = "Not Joined Members";
                    break;
                case 'ExpiredMembers':
                    $breadcrumbs = "Expired Members";
                    break;
                case 'InActiveMembers':
                    $breadcrumbs = "In Active Members";
                    break;
                case 'MembershipTransfer':
                    $breadcrumbs = "Membership Transfer";
                    break;
                case 'OldMembers':
                    $breadcrumbs = "Old Members";
                    break;
            }
            return view('gym.member.archive.list', compact('breadcrumbs'))->render();
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }

    public function guest($value)
    {
        try {
            switch ($value) {
                case 'PreviewCalls':
                    $breadcrumbs = "Preview Calls";
                    break;
                case 'TransferCalls':
                    $breadcrumbs = "Transfer Calls";
                    break;
                case 'PreivewAppointments':
                    $breadcrumbs = "Preivew Appointments";
                    break;
                case 'PreviewGuestCards':
                    $breadcrumbs = "Preview Guest Cards";
                    break;
            }

            return view('gym.member.guest.list', compact('breadcrumbs'))->render();
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }

    public function index(Request $request)
    {
        try {
            $member = Member::orderBy('id', 'asc')->paginate(4);
            if ($request->ajax()) {
                $sort_by = $request->get('sortby');
                $sort_type = $request->get('sorttype');
                $query = $request->get('query');
                $query = str_replace(" ", "%", $query);
                $member = Member::getMemberList($query, $sort_by, $sort_type);
                return view('gym.membership.pagination_data', compact('member'))->render();
            }
            return view('gym.member.list', compact('member'));
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
        $gym = Gym::all();
        return view('gym.member.create')->with('gyms', $gym);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
