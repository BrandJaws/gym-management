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
use App\Pipeline;
use App\TrainingGroup;
use App\Treasury;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Nullable;

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
            $gym_id = Auth::guard('employee')->user()->gym_id;
            $employee_id = Auth::guard('employee')->user()->id;
            $memberships = Membership::where('gym_id', $gym_id)->count();
            /*Count total Calls*/
            $calls = Pipeline::where('employee_id', '=', $employee_id)->where('stage', 'Call Scheduled')->count();
            $transferCalls = Pipeline::where('transfer_id', '=', $employee_id)->where('transferStage', 'Call Scheduled')->count();
            $totalCalls = $calls + $transferCalls;
            /*Count total Demo*/
            $demo = Pipeline::where('employee_id', '=', $employee_id)->where('stage', 'Appointment Scheduled')->count();
            $transferDemo = Pipeline::where('transfer_id', '=', $employee_id)->where('transferStage', 'Appointment Scheduled')->count();
            $appointmentScheduled = $demo + $transferDemo;
            /*Count total failed Calls*/
            $failedCalls = Pipeline::where('employee_id', '=', $employee_id)->where('status', '=', 'Failed Call')->count();
            /*Count total Presentation Scheduled */
            $demo1 = Pipeline::where('employee_id', '=', $employee_id)->where('stage', 'Presentation Scheduled')->count();
            $transferDemo1 = Pipeline::where('transfer_id', '=', $employee_id)->where('transferStage', 'Presentation Scheduled')->count();
            $presentationScheduled = $demo1 + $transferDemo1;
            /*Count total Contract Sent */
            $demo2 = Pipeline::where('employee_id', '=', $employee_id)->where('stage', 'Contract Sent')->count();
            $transferDemo2 = Pipeline::where('transfer_id', '=', $employee_id)->where('transferStage', 'Contract Sent')->count();
            $contractSent = $demo2 + $transferDemo2;
            /*Count total Qualified To Buy */
            $demo3 = Pipeline::where('employee_id', '=', $employee_id)->where('stage', 'Qualified To Buy')->count();
            $transferDemo3 = Pipeline::where('transfer_id', '=', $employee_id)->where('transferStage', 'Qualified To Buy')->count();
            $qualifiedToBuy = $demo3 + $transferDemo3;

            /*count lead, members*/
            $leads = Member::where('gym_id', $gym_id)->where('type', '=', 'Lead')->count();
            $activeMembers = Member::where('gym_id', $gym_id)->where('status', '=', 'Active')->count();
            $inActiveMembers = Member::where('gym_id', $gym_id)->where('status', '=', 'In-Active')->count();
            $expiredMembers = Member::where('gym_id', $gym_id)->where('status', '=', 'Expired')->count();
            $notJoinedMembers = Member::where('gym_id', $gym_id)->where('status', '=', 'Not Joined')->count();
            $assignTasksEmployee = Pipeline::orWhere('employee_id', '=', $employee_id)->orWhere('transfer_id', '=', $employee_id)->orderBy('id', 'asc')->paginate(10);
            $today = Carbon::today()->format('Y-m-d');
            $dailySchaduale = Pipeline::where('employee_id', '=', $employee_id)->whereDate('scheduleDate', '=', $today)->orderBy('id', 'asc')->get();
            $dailyReSchaduale = Pipeline::where('employee_id', '=', $employee_id)->whereDate('reScheduleDate', '=', $today)->orderBy('id', 'asc')->get();


            $hotRating = Member::where('rating', 'Hot')->where('leadOwner_id', Auth::guard('employee')->user()->id)->count();
            $totalLead = Member::where('type', 'Lead')->where('leadOwner_id', Auth::guard('employee')->user()->id)->count();
            $totalMember = Member::where('type', 'Member')->where('leadOwner_id', Auth::guard('employee')->user()->id)->count();
            $total = Member::where('gym_id', Auth::guard('employee')->user()->gym_id)->count();
            return view('gym.member.dashboard', compact('memberships', 'totalCalls', 'appointmentScheduled', 'activeMembers', 'dailySchaduale', 'dailyReSchaduale', 'qualifiedToBuy',
                'transferCalls', 'failedCalls', 'leads', 'inActiveMembers', 'expiredMembers', 'notJoinedMembers', 'presentationScheduled', 'contractSent', 'hotRating', 'totalLead', 'totalMember', 'total',
                'assignTasksEmployee'));
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in member dashobard page');
        }
    }

    public function index(Request $request)
    {
        try {
            $member = Member::where('type', 'Member')->where('gym_id', Auth::guard('employee')->user()->gym_id)->orderBy('id', 'asc')->paginate(10);
            $parent = Member::where('type', 'Member')->where('memberType', 'Parent')->where('gym_id', Auth::guard('employee')->user()->gym_id)->count();
            $affiliate = Member::where('type', 'Member')->where('memberType', 'Affiliate Member')->where('gym_id', Auth::guard('employee')->user()->gym_id)->count();
            $notJoined = Member::where('type', 'Member')->where('status', 'Not Joined')->where('gym_id', Auth::guard('employee')->user()->gym_id)->count();
            $active = Member::where('type', 'Member')->where('status', 'Active')->where('gym_id', Auth::guard('employee')->user()->gym_id)->count();
            $inActive = Member::where('type', 'Member')->where('status', 'In-Active')->where('gym_id', Auth::guard('employee')->user()->gym_id)->count();
            $expired = Member::where('type', 'Member')->where('status', 'Expired')->where('gym_id', Auth::guard('employee')->user()->gym_id)->count();
            $total = Member::where('type', 'Member')->where('gym_id', Auth::guard('employee')->user()->gym_id)->count();
            if ($request->ajax()) {
                $sort_by = $request->get('sortby');
                $sort_type = $request->get('sorttype');
                $query = $request->get('query');
                $query = str_replace(" ", "%", $query);
                $member = Member::getMemberList($query, $sort_by, $sort_type);
                return view('gym.member.list.pagination_data', compact('member'))->render();
            }
            return view('gym.member.list.index', compact('member', 'parent', 'affiliate', 'notJoined', 'active', 'inActive', 'expired', 'total'));
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in member list page');
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
            $membership = Membership::where('gym_id', $gym_id)->get();
            $member = Member::where('gym_id', $gym_id)->where('type', 'Member')->where('memberType', 'Parent')->where('membership_id', '!=', '')->get();
            return view('gym.member.list.create', compact('membership', 'member'));
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in member add page');
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
                'salutation' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'rating' => 'required',
                'source' => 'required',
                'type' => 'required',
                'email' => 'nullable|email|unique:members',
                'password' => 'nullable|between:6,12,password',
                'password_confirmation' => 'nullable|same:password',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $type = $request->type;
            switch ($type) {
                case 'Lead':
                    $member = new Member();
                    $member->fill($request->only([
                        'name',
                        'salutation',
                        'email',
                        'phone',
                        'remarks',
                        'rating',
                        'address',
                        'source',
                        'type',
                    ]));
                    $code = Member::getMemeberCode($request->name);
                    $member->code = $code;
                    $member->leadOwner_id = Auth::guard('employee')->user()->id;
                    $member->gym_id = Auth::guard('employee')->user()->gym_id;
                    $member->save();
                    if ($request->hasFile('image')) {
                        $images = [];
                        $image = $request->file('image');
                        $userImage = new Image();
                        $this->uploadMemberImg($image, $userImage, 'path', null, $member->id);
                        $images[] = $userImage;
                        $member->userImage()->saveMany($images, $member);
                    }
                    return back()->with('success', 'Lead Created Successfully!');
                    break;
                case 'Member':
                    $MemberType = $request->memberType;
                    switch ($MemberType) {
                        case 'Parent':
                            $member = new Member();
                            $member->fill($request->only([
                                'name',
                                'salutation',
                                'email',
                                'phone',
                                'remarks',
                                'rating',
                                'address',
                                'source',
                                'type',
                                'membership_id',
                                'joiningDate',
                                'status',
                                'memberType',
                                'memberParent_id',
                                'relationShip'
                            ]));
                            $code = Member::getMemeberCode($request->name);
                            $member->code = $code;
                            $member->leadOwner_id = Auth::guard('employee')->user()->id;
                            $member->password = Hash::make($request->password);
                            $member->gym_id = Auth::guard('employee')->user()->gym_id;
                            $member->save();
                            if ($request->hasFile('image')) {
                                $images = [];
                                $image = $request->file('image');
                                $userImage = new Image();
                                $this->uploadMemberImg($image, $userImage, 'path', null, $member->id);
                                $images[] = $userImage;
                                $member->userImage()->saveMany($images, $member);
                            }
                            return back()->with('success', 'Member Created Successfully!');
                            break;
                        case 'Affiliate Member':
                            if ($request->memberParent_id != '0') {
                                $parentMember = Member::where('id', $request->memberParent_id)->first();
                                $childMember = Member::where('memberParent_id', $request->memberParent_id)->count();
                                $allMember = $childMember + 1;
                                $totalMember = $parentMember->membership->noOfMembers - $allMember;
                                if ($parentMember->membership->affiliateStatus == "Yes" && $totalMember > 0 && ($parentMember->membership->spouse || $parentMember->membership->children) == $request->relationShip) {
                                    $member = new Member();
                                    $member->fill($request->only([
                                        'name',
                                        'salutation',
                                        'email',
                                        'phone',
                                        'remarks',
                                        'rating',
                                        'address',
                                        'source',
                                        'type',
                                        'joiningDate',
                                        'status',
                                        'memberType',
                                        'memberParent_id',
                                        'relationShip'
                                    ]));
                                    $code = Member::getMemeberCode($request->name);
                                    $member->code = $code;
                                    $member->leadOwner_id = Auth::guard('employee')->user()->id;
                                    $member->password = Hash::make($request->password);
                                    $member->gym_id = Auth::guard('employee')->user()->gym_id;
                                    $member->save();
                                    if ($request->hasFile('image')) {
                                        $images = [];
                                        $image = $request->file('image');
                                        $userImage = new Image();
                                        $this->uploadMemberImg($image, $userImage, 'path', null, $member->id);
                                        $images[] = $userImage;
                                        $member->userImage()->saveMany($images, $member);
                                    }
                                    return back()->with('success', 'Member Created Successfully!');
                                } else {
                                    return back()->with('error', 'Sorry! Please register yourself in new membership');
                                }
                            } else {
                                return back()->with('error', 'Sorry! Please register yourself in new membership');
                            }
                            break;
                        default :
                            return;
                    }
                    break;
                default :
                    return;
            }
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
            $gym_id = Auth::guard('employee')->user()->gym_id;
            $lead = Member::find($id);
            $membership = Membership::all();
            $callHistory = Pipeline::where('customer_id', $id)->where('gym_id', $gym_id)->paginate(10);
            $treasuryDetail = Treasury::where('member_id', $id)->where('gym_id', $gym_id)->paginate(10);
            $treasuryCashIn = Treasury::where('member_id', $id)->where('gym_id', $gym_id)->where('cashFlow', 'In')->sum('value');
            $treasuryCashOut = Treasury::where('member_id', $id)->where('gym_id', $gym_id)->where('cashFlow', 'Out')->sum('value');
            $treasuryCashExtra = Treasury::where('member_id', $id)->where('gym_id', $gym_id)->where('cashFlow', 'Extra')->sum('value');
            $treasuryCashDiscount = Treasury::where('member_id', $id)->where('gym_id', $gym_id)->where('cashFlow', 'Discount')->sum('value');
            $member = Member::where('gym_id', $gym_id)->where('type', 'Member')->where('memberType', 'Parent')->get();
            $training = TrainingGroup::where('member_id', $id)->where('gym_id', Auth::guard('employee')->user()->gym_id)->paginate(10);;
            return view('gym.member.list.edit', compact('lead', 'membership', 'callHistory', 'treasuryDetail', 'member', 'treasuryCashIn', 'treasuryCashOut', 'treasuryCashExtra', 'treasuryCashDiscount', 'training'));
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
        try {
            $id = $request->id;
            $type = $request->type;
            switch ($type) {
                case 'Lead':
                    $member = Member::where('id', $id)->first();
                    $member->fill($request->only([
                        'name',
                        'salutation',
                        'email',
                        'phone',
                        'remarks',
                        'rating',
                        'address',
                        'source',
                        'type',
                    ]));
                    $code = Member::getMemeberCode($request->name);
                    $member->code = $code;
                    $member->leadOwner_id = Auth::guard('employee')->user()->id;
                    $member->gym_id = Auth::guard('employee')->user()->gym_id;
                    $member->save();
                    if ($request->hasFile('image')) {
                        $images = [];
                        $image = $request->file('image');
                        $userImage = new Image();
                        $this->uploadMemberImg($image, $userImage, 'path', null, $member->id);
                        $images[] = $userImage;
                        $member->userImage()->saveMany($images, $member);
                    }
                    return back()->with('success', 'Lead Updated Successfully!');
                    break;
                case 'Member':
                    $MemberType = $request->memberType;
                    switch ($MemberType) {
                        case 'Parent':
                            $member = Member::where('id', $id)->first();
                            $password = $member->password;
                            $member->fill($request->only([
                                'name',
                                'salutation',
                                'email',
                                'phone',
                                'remarks',
                                'rating',
                                'address',
                                'source',
                                'type',
                                'membership_id',
                                'joiningDate',
                                'status',
                                'memberType',
                                'memberParent_id',
                                'relationShip'
                            ]));
                            if ($request->memberType == "Parent") {
                                $member->memberParent_id = '0';
                                $member->relationShip = ' ';
                            }
                            if (!empty($request->password)) {
                                $member->password = Hash::make($request->password);
                            } else {
                                $member->password = $password;
                            }
                            $code = Member::getMemeberCode($request->name);
                            $member->code = $code;
                            $member->leadOwner_id = Auth::guard('employee')->user()->id;
                            $member->gym_id = Auth::guard('employee')->user()->gym_id;
                            $member->save();
                            if ($request->hasFile('image')) {
                                $images = [];
                                $image = $request->file('image');
                                $userImage = new Image();
                                $this->uploadMemberImg($image, $userImage, 'path', null, $member->id);
                                $images[] = $userImage;
                                $member->userImage()->saveMany($images, $member);
                            }
                            return back()->with('success', 'Member Updated Successfully!');
                            break;
                        case 'Affiliate Member':
                            if ($request->memberParent_id != '0') {
                                $memberExsit = Member::where('id', $id)->first();
                                $parentMember = Member::where('id', $request->memberParent_id)->first();
                                $childMember = Member::where('memberParent_id', $request->memberParent_id)->count();
                                if ($memberExsit->memberParent_id == $request->memberParent_id) {
                                    $allMember = $childMember;
                                } else {
                                    $allMember = $childMember + 1;
                                }
                                $totalMember = $parentMember->membership->noOfMembers - $allMember;
                                if ($parentMember->membership->affiliateStatus == "Yes" && $totalMember > 0 && ($parentMember->membership->spouse || $parentMember->membership->children) == $request->relationShip) {
                                    $member = Member::where('id', $id)->first();
                                    $password = $member->password;
                                    $member->fill($request->only([
                                        'name',
                                        'salutation',
                                        'email',
                                        'phone',
                                        'remarks',
                                        'rating',
                                        'address',
                                        'source',
                                        'type',
                                        'joiningDate',
                                        'status',
                                        'memberType',
                                        'memberParent_id',
                                        'relationShip'
                                    ]));
                                    $code = Member::getMemeberCode($request->name);
                                    $member->code = $code;
                                    if (!empty($request->password)) {
                                        $member->password = Hash::make($request->password);
                                    } else {
                                        $member->password = $password;
                                    }
                                    $member->leadOwner_id = Auth::guard('employee')->user()->id;
                                    $member->gym_id = Auth::guard('employee')->user()->gym_id;
                                    $member->save();
                                    if ($request->hasFile('image')) {
                                        $images = [];
                                        $image = $request->file('image');
                                        $userImage = new Image();
                                        $this->uploadMemberImg($image, $userImage, 'path', null, $member->id);
                                        $images[] = $userImage;
                                        $member->userImage()->saveMany($images, $member);
                                    }
                                    return back()->with('success', 'Member Updated Successfully!');
                                } else {
                                    return back()->with('error', 'Sorry! Please register yourself in new membership');
                                }
                            } else {
                                return back()->with('error', 'Sorry! Please register yourself in new membership');
                            }
                            break;
                        default :
                            return;
                    }
                    break;
                default :
                    return;
            }
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
            Pipeline::where('customer_id', $id)->delete();
            return back()->with('success', 'Member Disabled Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in member disabled function');
        }
    }

    public function disabledList()
    {
        try {
            $member = Member::onlyTrashed()->paginate(10);
            return view('gym.member.list.disabledList', compact('member'))->render();
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in member disabled page');
        }
    }

    public function distroy($id)
    {
        try {
            Member::where('id', $id)->forcedelete();
            Pipeline::where('customer_id', $id)->forcedelete();
            $this->deleteMemberImg($id);
            return back()->with('success', 'Permanently Deleted Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in member distroy function');
        }
    }

    public function restore($id)
    {
        try {
            Member::where('id', $id)->restore();
            Pipeline::where('customer_id', $id)->restore();
            return back()->with('success', 'Data Restore Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in member restore function');
        }
    }

    public function archive(Request $request, $value)
    {
        switch ($value) {
            case 'leads':
                $breadcrumbs = "Leads";
                $member = Member::where('type', 'Lead')->where('leadOwner_id', Auth::guard('employee')->user()->id)->orderBy('id', 'asc')->paginate(10);
                $hotRating = Member::where('rating', 'Hot')->where('leadOwner_id', Auth::guard('employee')->user()->id)->count();
                $totalLead = Member::where('type', 'Lead')->where('leadOwner_id', Auth::guard('employee')->user()->id)->count();
                $totalMember = Member::where('type', 'Member')->where('leadOwner_id', Auth::guard('employee')->user()->id)->count();
                $total = Member::where('gym_id', Auth::guard('employee')->user()->gym_id)->count();
                if ($request->ajax()) {
                    $sort_by = $request->get('sortby');
                    $sort_type = $request->get('sorttype');
                    $searchTerm = $request->get('query');
                    $searchTerm = str_replace(" ", "%", $searchTerm);
                    $member = Member::getLeadList($searchTerm, $sort_by, $sort_type);
                    return view('gym.member.archive.pagination_data', compact('breadcrumbs', 'member', 'totalLead'))->render();
                }
                break;
            case 'failedCalls':
                $breadcrumbs = "Failed Calls";
                $searchTerm = $request->get('query');
                $searchTerm = str_replace(" ", "%", $searchTerm);
                $member = Pipeline::getFailedCallList($searchTerm, 'id', 'asc');
                if ($request->ajax()) {
                    $sort_by = $request->get('sortby');
                    $sort_type = $request->get('sorttype');
                    $member = Pipeline::getFailedCallList($searchTerm, $sort_by, $sort_type);
                    return view('gym.member.archive.pagination_data', compact('breadcrumbs', 'member'))->render();
                }
                break;
            case 'notJoinedMembers':
                $breadcrumbs = "Not Joined Members";
                $member = Member::where('status', 'Not Joined')->where('leadOwner_id', Auth::guard('employee')->user()->id)->orderBy('id', 'asc')->paginate(10);
                if ($request->ajax()) {
                    $sort_by = $request->get('sortby');
                    $sort_type = $request->get('sorttype');
                    $searchTerm = $request->get('query');
                    $searchTerm = str_replace(" ", "%", $searchTerm);
                    $member = Member::getNotJoinedMemberList($searchTerm, $sort_by, $sort_type);
                    return view('gym.member.archive.pagination_data', compact('breadcrumbs', 'member'))->render();
                }
                break;
            case 'expiredMembers':
                $breadcrumbs = "Expired Members";
                $member = Member::where('status', 'Expired')->where('leadOwner_id', Auth::guard('employee')->user()->id)->orderBy('id', 'asc')->paginate(10);
                if ($request->ajax()) {
                    $sort_by = $request->get('sortby');
                    $sort_type = $request->get('sorttype');
                    $searchTerm = $request->get('query');
                    $searchTerm = str_replace(" ", "%", $searchTerm);
                    $member = Member::getExpiredMemberList($searchTerm, $sort_by, $sort_type);
                    return view('gym.member.archive.pagination_data', compact('breadcrumbs', 'member'))->render();
                }
                break;
            case 'inActiveMembers':
                $breadcrumbs = "In Active Members";
                $member = Member::where('status', 'In-Active')->where('leadOwner_id', Auth::guard('employee')->user()->id)->orderBy('id', 'asc')->paginate(10);
                if ($request->ajax()) {
                    $sort_by = $request->get('sortby');
                    $sort_type = $request->get('sorttype');
                    $searchTerm = $request->get('query');
                    $searchTerm = str_replace(" ", "%", $searchTerm);
                    $member = Member::getInActiveMemberList($searchTerm, $sort_by, $sort_type);
                    return view('gym.member.archive.pagination_data', compact('breadcrumbs', 'member'))->render();
                }
                break;
            case 'membershipTransfer':
                $breadcrumbs = "Membership Transfer";
                $member = Member::orderBy('id', 'asc')->where('gym_id', Auth::guard('employee')->user()->gym_id)->paginate(10);
                break;
            case 'oldMembers':
                $breadcrumbs = "Old Members";
                $member = Member::where('status', 'Active')->where('leadOwner_id', Auth::guard('employee')->user()->id)->orderBy('id', 'asc')->paginate(10);
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
        return view('gym.member.archive.list', compact('breadcrumbs', 'member', 'totalLead', 'total', 'hotRating', 'totalMember'))->render();

    }

    public function dragLead()
    {
        $employee_id = Auth::guard('employee')->user()->id;
        $callScheduled = Pipeline::where('employee_id', $employee_id)->where('stage', 'Call Scheduled')->where('dragStatus', '0')->orderBy('order')->get();
        $presentationScheduled = Pipeline::where('employee_id', $employee_id)->where('stage', 'Presentation Scheduled')->where('dragStatus', '0')->orderBy('order')->get();
        $appointmentScheduled = Pipeline::where('employee_id', $employee_id)->where('stage', 'Appointment Scheduled')->where('dragStatus', '0')->orderBy('order')->get();
        $contractSent = Pipeline::where('employee_id', $employee_id)->where('stage', 'Contract Sent')->where('dragStatus', '0')->orderBy('order')->get();
        $qualifiedBuy = Pipeline::where('employee_id', $employee_id)->where('stage', 'Qualified To Buy')->where('dragStatus', '0')->orderBy('order')->get();
        $closedWon = Pipeline::where('employee_id', $employee_id)->where('stage', 'Closed Won')->where('dragStatus', '0')->orderBy('order')->get();
        $closedLost = Pipeline::where('employee_id', $employee_id)->where('stage', 'Closed Lost')->where('dragStatus', '0')->orderBy('order')->get();
        return view('gym.member.archive.dragLeads', compact('presentationScheduled', 'appointmentScheduled', 'contractSent', 'qualifiedBuy', 'closedWon', 'closedLost', 'callScheduled'));
    }

    public function updateDragLead(Request $request)
    {
        $input = $request->all();

        foreach ($input['callArr'] as $key => $value) {
            $key = $key + 1;
            Pipeline::where('id', $value)->update(['stage' => 'Call Scheduled', 'status' => 'Success', 'order' => $key]);
        }

        foreach ($input['appointmentArr'] as $key => $value) {
            $key = $key + 1;
            Pipeline::where('id', $value)->update(['stage' => 'Appointment Scheduled', 'status' => 'Success', 'order' => $key]);
        }

        foreach ($input['presentationArr'] as $key => $value) {
            $key = $key + 1;
            Pipeline::where('id', $value)->update(['stage' => 'Presentation Scheduled', 'status' => 'Success', 'order' => $key]);
        }


        foreach ($input['contractArr'] as $key => $value) {
            $key = $key + 1;
            Pipeline::where('id', $value)->update(['stage' => 'Contract Sent', 'status' => 'Success', 'order' => $key]);
        }

        foreach ($input['qualifiedArr'] as $key => $value) {
            $key = $key + 1;
            Pipeline::where('id', $value)->update(['stage' => 'Qualified To Buy', 'status' => 'Success', 'order' => $key]);
        }
        foreach ($input['wonArr'] as $key => $value) {
            $key = $key + 1;
            Pipeline::where('id', $value)->update(['stage' => 'Closed Won', 'status' => 'Success', 'order' => $key]);
        }
        foreach ($input['lostArr'] as $key => $value) {
            $key = $key + 1;
            Pipeline::where('id', $value)->update(['stage' => 'Closed Lost', 'status' => 'Success', 'order' => $key]);
        }
        return response()->json(['status' => 'success']);
    }

    public function pipelineCreate($value, $id)
    {
        try {
            switch ($value) {
                case 'callScheduled':
                    $breadcrumbs = "Call Scheduled";
                    break;
                case 'appointmentScheduled':
                    $breadcrumbs = "Appointment Scheduled";
                    break;
                case 'presentationScheduled':
                    $breadcrumbs = "Presentation Scheduled";
                    break;
                case 'contractSent':
                    $breadcrumbs = "Contract Sent";
                    break;
                case 'transferStage':
                    $breadcrumbs = "Transfer Stage";
                    break;
                case 'qualifiedToBuy':
                    $breadcrumbs = "Qualified To Buy";
                    break;
                case 'closedWon':
                    $breadcrumbs = "Closed Won";
                    break;
                case 'closedLost':
                    $breadcrumbs = "Closed Lost";
                    break;
            }
            $member = Member::find($id);
            $membership = Membership::where('gym_id', Auth::guard('employee')->user()->gym_id)->get();
            $employee = Employee::where('gym_id', Auth::guard('employee')->user()->gym_id)->get();
            return view('gym.member.archive.pipeline', compact('breadcrumbs', 'membership', 'member', 'employee'))->render();
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in member pipelineCreate function');
        }
    }

    public function pipelineStore(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'employee_id' => 'required',
                'stage' => 'required',
                'status' => 'required',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $member = new Pipeline();
            $member->fill($request->only([
                'gym_id',
                'employee_id',
                'customer_id',
                'transfer_id',
                'scheduleDate',
                'stage',
                'status',
                'transferStage',
                'reScheduleDate',
                'reStatus',
                'remarks'
            ]));
            if ($request->intersetedPackages != "") {
                $member->intersetedPackages = implode(',', $request->intersetedPackages);
            }
            $member->save();
            return back()->with('success', 'Schedule Date Created Successfully!');
        } catch (\Exception $e) {
            return response()->json([
                'response' => $e
            ], 400);
        }
    }

    public function pipelineEdit($id)
    {
        try {
            $packageList = [];
            $pipeline = Pipeline::find($id);
            $packageId = explode(',', $pipeline->intersetedPackages);
            foreach ($packageId as $fields) {
                array_push($packageList, $fields);
            }
            $membership = Membership::all();
            $employee = Employee::all();
            return view('gym.member.guest.edit', compact('membership', 'pipeline', 'employee', 'packageList'))->render();
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in member pipelineEdit function');
        }
    }

    public function pipelineUpdate(Request $request)
    {
        $id = $request->pipeline_id;
        try {
            $validator = Validator::make($request->all(), [
                'employee_id' => 'required',
                'stage' => 'required',
                'status' => 'required',
                'pipeline_id' => 'required',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $pipeline = Pipeline::where('id', $id)->first();
            $pipeline->fill($request->only([
                'gym_id',
                'employee_id',
                'customer_id',
                'transfer_id',
                'scheduleDate',
                'stage',
                'status',
                'transferStage',
                'reScheduleDate',
                'reStatus',
                'remarks'
            ]));
            if ($request->intersetedPackages != "") {
                $pipeline->intersetedPackages = implode(',', $request->intersetedPackages);
            }
            $pipeline->save();
            return back()->with('success', 'Pipeline Updated Successfully!');
        } catch (\Exception $e) {
            return response()->json([
                'response' => $e
            ], 400);
        }
    }

    public function pipelineDisable($id)
    {
        try {
            Pipeline::destroy($id);
            return back()->with('success', 'Pipeline Disabled Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in pipelineDisable function');
        }
    }

    public function pipelineDisabled()
    {
        try {
            $pipeline = Pipeline::onlyTrashed()->paginate(10);
            return view('gym.member.guest.disabledPipeline', compact('pipeline'))->render();
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in pipelineDisabled function');
        }
    }

    public function distroyPipeline($id)
    {
        try {
            Pipeline::where('id', $id)->forcedelete();
            return back()->with('success', 'Permanently Deleted Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in distroyPipeline function');
        }
    }

    public function restorePipeline($id)
    {
        try {
            Pipeline::where('id', $id)->restore();
            return back()->with('success', 'Data Restore Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in restorePipeline function');
        }
    }

    public function guest(Request $request, $value)
    {
        switch ($value) {
            case 'previewCalls':
                $breadcrumbs = "Preview Calls";
                $searchTerm = $request->get('query');
                $searchTerm = str_replace(" ", "%", $searchTerm);
                $member = Pipeline::getCallsList($searchTerm, 'id', 'asc');
                $stage = Pipeline::where('stage', 'Call Scheduled')->where('employee_id', Auth::guard('employee')->user()->id)->count();
                $reStage = Pipeline::where('transferStage', 'Call Scheduled')->where('transfer_id', Auth::guard('employee')->user()->id)->count();
                $totalStage = $stage + $reStage;
                $stageSubTotal = Pipeline::where('stage', 'Call Scheduled')->where('gym_id', Auth::guard('employee')->user()->gym_id)->count();
                $transferStageSubTotal = Pipeline::where('transferStage', 'Call Scheduled')->where('gym_id', Auth::guard('employee')->user()->gym_id)->count();
                $total = $stageSubTotal + $transferStageSubTotal;
                if ($request->ajax()) {
                    $sort_by = $request->get('sortby');
                    $sort_type = $request->get('sorttype');
                    $member = Pipeline::getCallsList($searchTerm, $sort_by, $sort_type);
                    return view('gym.member.guest.pagination_data', compact('breadcrumbs', 'member'))->render();
                }
                break;
            case 'previewAppointments':
                $breadcrumbs = "Preview Appointments";
                $searchTerm = $request->get('query');
                $searchTerm = str_replace(" ", "%", $searchTerm);
                $member = Pipeline::getAppointmentsList($searchTerm, 'id', 'asc');
                $stage = Pipeline::where('stage', 'Appointment Scheduled')->where('employee_id', Auth::guard('employee')->user()->id)->count();
                $reStage = Pipeline::where('transferStage', 'Appointment Scheduled')->where('transfer_id', Auth::guard('employee')->user()->id)->count();
                $totalStage = $stage + $reStage;
                $stageSubTotal = Pipeline::where('stage', 'Appointment Scheduled')->where('gym_id', Auth::guard('employee')->user()->gym_id)->count();
                $transferStageSubTotal = Pipeline::where('transferStage', 'Appointment Scheduled')->where('gym_id', Auth::guard('employee')->user()->gym_id)->count();
                $total = $stageSubTotal + $transferStageSubTotal;
                if ($request->ajax()) {
                    $sort_by = $request->get('sortby');
                    $sort_type = $request->get('sorttype');
                    $member = Pipeline::getAppointmentsList($searchTerm, $sort_by, $sort_type);
                    return view('gym.member.guest.pagination_data', compact('breadcrumbs', 'member'))->render();
                }
                break;
            case 'previewPresentations':
                $breadcrumbs = "Preview Presentations";
                $searchTerm = $request->get('query');
                $searchTerm = str_replace(" ", "%", $searchTerm);
                $member = Pipeline::getPresentationsList($searchTerm, 'id', 'asc');
                $stage = Pipeline::where('stage', 'Presentation Scheduled')->where('employee_id', Auth::guard('employee')->user()->id)->count();
                $reStage = Pipeline::where('transferStage', 'Presentation Scheduled')->where('transfer_id', Auth::guard('employee')->user()->id)->count();
                $totalStage = $stage + $reStage;
                $stageSubTotal = Pipeline::where('stage', 'Presentation Scheduled')->where('gym_id', Auth::guard('employee')->user()->gym_id)->count();
                $transferStageSubTotal = Pipeline::where('transferStage', 'Presentation Scheduled')->where('gym_id', Auth::guard('employee')->user()->gym_id)->count();
                $total = $stageSubTotal + $transferStageSubTotal;
                if ($request->ajax()) {
                    $sort_by = $request->get('sortby');
                    $sort_type = $request->get('sorttype');
                    $member = Pipeline::getPresentationsList($searchTerm, $sort_by, $sort_type);
                    return view('gym.member.guest.pagination_data', compact('breadcrumbs', 'member'))->render();
                }
                break;
            case 'contractSent':
                $breadcrumbs = "Contract Sent";
                $searchTerm = $request->get('query');
                $searchTerm = str_replace(" ", "%", $searchTerm);
                $member = Pipeline::getContractList($searchTerm, 'id', 'asc');
                $stage = Pipeline::where('stage', 'Contract Sent')->where('employee_id', Auth::guard('employee')->user()->id)->count();
                $reStage = Pipeline::where('transferStage', 'Contract Sent')->where('transfer_id', Auth::guard('employee')->user()->id)->count();
                $totalStage = $stage + $reStage;
                $stageSubTotal = Pipeline::where('stage', 'Contract Sent')->where('gym_id', Auth::guard('employee')->user()->gym_id)->count();
                $transferStageSubTotal = Pipeline::where('transferStage', 'Contract Sent')->where('gym_id', Auth::guard('employee')->user()->gym_id)->count();
                $total = $stageSubTotal + $transferStageSubTotal;
                if ($request->ajax()) {
                    $sort_by = $request->get('sortby');
                    $sort_type = $request->get('sorttype');
                    $member = Pipeline::getContractList($searchTerm, $sort_by, $sort_type);
                    return view('gym.member.guest.pagination_data', compact('breadcrumbs', 'member'))->render();
                }
                break;
            case 'previewQualified':
                $breadcrumbs = "Qualified To Buy";
                $searchTerm = $request->get('query');
                $searchTerm = str_replace(" ", "%", $searchTerm);
                $member = Pipeline::getQualifiedList($searchTerm, 'id', 'asc');
                $stage = Pipeline::where('stage', 'Qualified To Buy')->where('employee_id', Auth::guard('employee')->user()->id)->count();
                $reStage = Pipeline::where('transferStage', 'Qualified To Buy')->where('transfer_id', Auth::guard('employee')->user()->id)->count();
                $totalStage = $stage + $reStage;
                $stageSubTotal = Pipeline::where('stage', 'Qualified To Buy')->where('gym_id', Auth::guard('employee')->user()->gym_id)->count();
                $transferStageSubTotal = Pipeline::where('transferStage', 'Qualified To Buy')->where('gym_id', Auth::guard('employee')->user()->gym_id)->count();
                $total = $stageSubTotal + $transferStageSubTotal;
                if ($request->ajax()) {
                    $sort_by = $request->get('sortby');
                    $sort_type = $request->get('sorttype');
                    $member = Pipeline::getQualifiedList($searchTerm, $sort_by, $sort_type);
                    return view('gym.member.guest.pagination_data', compact('breadcrumbs', 'member'))->render();
                }
                break;
            case 'closedWon':
                $breadcrumbs = "Closed Won";
                $searchTerm = $request->get('query');
                $searchTerm = str_replace(" ", "%", $searchTerm);
                $member = Pipeline::getWonList($searchTerm, 'id', 'asc');
                $stage = Pipeline::where('stage', 'Closed Won')->where('employee_id', Auth::guard('employee')->user()->id)->count();
                $reStage = Pipeline::where('transferStage', 'Closed Won')->where('transfer_id', Auth::guard('employee')->user()->id)->count();
                $totalStage = $stage + $reStage;
                $stageSubTotal = Pipeline::where('stage', 'Closed Won')->where('gym_id', Auth::guard('employee')->user()->gym_id)->count();
                $transferStageSubTotal = Pipeline::where('transferStage', 'Closed Won')->where('gym_id', Auth::guard('employee')->user()->gym_id)->count();
                $total = $stageSubTotal + $transferStageSubTotal;
                if ($request->ajax()) {
                    $sort_by = $request->get('sortby');
                    $sort_type = $request->get('sorttype');
                    $member = Pipeline::getWonList($searchTerm, $sort_by, $sort_type);
                    return view('gym.member.guest.pagination_data', compact('breadcrumbs', 'member'))->render();
                }
                break;
        }
        return view('gym.member.guest.list', compact('breadcrumbs', 'member', 'totalStage', 'total'))->render();

    }

    public function report(Request $request)
    {
        return view('gym.member.report.list');
    }

    public function leadReport(Request $request)
    {
        $value = $request->value;
        $fromDate = $request->fromDate;
        $toDate = $request->toDate;
        $empId = Auth::guard('employee')->user()->id;
        if ($value == "Lead") {
            $leadList = Pipeline::getLeadList($empId, $fromDate, $toDate);
        } else {
            $leadList = Member::getMemberReport($empId, $fromDate, $toDate);
        }
        return response()->json([
            'response' => $leadList
        ], 200);
    }

}
