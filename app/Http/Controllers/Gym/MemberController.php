<?php

namespace App\Http\Controllers\Gym;

use App\Employee;
use App\Gym;
use App\Http\Traits\FileUpload;
use App\Image;
use App\Member;
use App\Http\Controllers\Controller;
use App\MemberMembership;
use App\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    use FileUpload;

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

    public function index(Request $request)
    {
        try {
            $member = Member::where('type', 'Member')->orderBy('id', 'asc')->paginate(4);
            if ($request->ajax()) {
                $sort_by = $request->get('sortby');
                $sort_type = $request->get('sorttype');
                $query = $request->get('query');
                $query = str_replace(" ", "%", $query);
                $member = Member::getMemberList($query, $sort_by, $sort_type);
                return view('gym.member.pagination_data', compact('member'))->render();
            }
            return view('gym.member.list.index', compact('member'));
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
        $membership = Membership::all();
        return view('gym.member.list.create', compact('membership'));
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
                'phone' => 'required',
                'remarks' => 'required',
                'address' => 'required',
                'source' => 'required',
                'type' => 'required',
                'email' => 'email|unique:members',
                'password' => 'nullable|between:6,12,password',
                'password_confirmation' => 'same:password',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $member = new Member();
            $member->fill($request->only([
                'name',
                'email',
                'phone',
                'remarks',
                'address',
                'source',
                'membership_id',
                'joiningDate',
                'status',
                'type'
            ]));
            $code = Member::getMemeberCode($request->name);
            $member->code = $code;
            $member->password = Hash::make($request->password);
            $member->gym_id = Auth::guard('employee')->user()->gym_id;
            $member->save();
            if ($request->hasFile('image')) {
                $images = [];
                $image = $request->file('image');
                $userImage = new Image();
                $this->uploadOne($image, $userImage, 'path', null, $member->id);
                $images[] = $userImage;
                $member->userImage()->saveMany($images, $member);
            }
            return back()->with('success', 'Member Created Successfully!');
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
            $lead = Member::find($id);
            $membership = Membership::all();
            return view('gym.member.list.edit', compact('lead', 'membership'));
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
        $id = $request->id;
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'phone' => 'required',
                'remarks' => 'required',
                'address' => 'required',
                'source' => 'required',
                'type' => 'required',
                'email' => 'unique:members,email,' . $id,
                'password' => 'nullable|between:6,12,password' . $id,
                'password_confirmation' => 'same:password',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $member = Member::where('id', $id)->first();
            $password = $member->password;
            $member->fill($request->only([
                'name',
                'email',
                'phone',
                'remarks',
                'address',
                'source',
                'membership_id',
                'joiningDate',
                'status',
                'type'
            ]));
            if (!empty($request->password)) {
                $member->password = Hash::make($request->password);
            } else {
                $member->password = $password;
            }
            $member->save();
            if ($request->hasFile('image')) {
                $images = [];
                $image = $request->file('image');
                $userImage = new Image();
                $this->uploadOne($image, $userImage, 'path', null, $member->id);
                $images[] = $userImage;
                $member->userImage()->saveMany($images, $member);
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
    public function disabled($id)
    {
        try {
            Member::destroy($id);
            return back()->with('success', 'Member Deleted Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }

    public function archive(Request $request, $value)
    {
        switch ($value) {
            case 'Leads':
                $breadcrumbs = "Leads";
                $member = Member::where('type', 'lead')->orderBy('id', 'asc')->paginate(10);
                if ($request->ajax()) {
                    $sort_by = $request->get('sortby');
                    $sort_type = $request->get('sorttype');
                    $searchTerm = $request->get('query');
                    $searchTerm = str_replace(" ", "%", $searchTerm);
                    $member = Member::getMemberList($searchTerm, $sort_by, $sort_type);
                    return view('gym.member.archive.pagination_data', compact('breadcrumbs', 'member'))->render();
                }
                break;
            case 'FailedCalls':
                $breadcrumbs = "Failed Calls";
                $member = Member::orderBy('id', 'asc')->paginate(10);
                break;
            case 'NotJoinedMembers':
                $breadcrumbs = "Not Joined Members";
                $member = Member::where('type', 'lead')->orderBy('id', 'asc')->paginate(10);
                if ($request->ajax()) {
                    $sort_by = $request->get('sortby');
                    $sort_type = $request->get('sorttype');
                    $searchTerm = $request->get('query');
                    $searchTerm = str_replace(" ", "%", $searchTerm);
                    $member = Member::getMemberList($searchTerm, $sort_by, $sort_type);
                    return view('gym.member.archive.pagination_data', compact('breadcrumbs', 'member'))->render();
                }
                break;
            case 'ExpiredMembers':
                $breadcrumbs = "Expired Members";
                $member = Member::where('status', 'Expired')->orderBy('id', 'asc')->paginate(10);
                if ($request->ajax()) {
                    $sort_by = $request->get('sortby');
                    $sort_type = $request->get('sorttype');
                    $searchTerm = $request->get('query');
                    $searchTerm = str_replace(" ", "%", $searchTerm);
                    $member = Member::getMemberList($searchTerm, $sort_by, $sort_type);
                    return view('gym.member.archive.pagination_data', compact('breadcrumbs', 'member'))->render();
                }
                break;
            case 'InActiveMembers':
                $breadcrumbs = "In Active Members";
                $member = Member::where('status', 'In-Active')->orderBy('id', 'asc')->paginate(10);
                if ($request->ajax()) {
                    $sort_by = $request->get('sortby');
                    $sort_type = $request->get('sorttype');
                    $searchTerm = $request->get('query');
                    $searchTerm = str_replace(" ", "%", $searchTerm);
                    $member = Member::getMemberList($searchTerm, $sort_by, $sort_type);
                    return view('gym.member.archive.pagination_data', compact('breadcrumbs', 'member'))->render();
                }
                break;
            case 'MembershipTransfer':
                $breadcrumbs = "Membership Transfer";
                $member = Member::orderBy('id', 'asc')->paginate(10);
                break;
            case 'OldMembers':
                $breadcrumbs = "Old Members";
                $member = Member::where('status', 'Active')->orderBy('id', 'asc')->paginate(10);
                if ($request->ajax()) {
                    $sort_by = $request->get('sortby');
                    $sort_type = $request->get('sorttype');
                    $searchTerm = $request->get('query');
                    $searchTerm = str_replace(" ", "%", $searchTerm);
                    $member = Member::getMemberList($searchTerm, $sort_by, $sort_type);
                    return view('gym.member.archive.pagination_data', compact('breadcrumbs', 'member'))->render();
                }
                break;
        }
        return view('gym.member.archive.list', compact('breadcrumbs', 'member'))->render();

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */


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

}
