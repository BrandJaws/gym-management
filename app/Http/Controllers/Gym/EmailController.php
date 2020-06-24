<?php

namespace App\Http\Controllers\Gym;

use App\EmailNotification;
use App\Employee;
use App\EmployeePermission;
use App\Http\Controllers\Controller;
use App\Image;
use App\Member;
use App\Notifications\DatabaseNotification;
use App\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class EmailController extends Controller
{
    public function index()
    {
        try {
            $memberMail = EmailNotification::where('status', 'Member')->count();
            $leadMail = EmailNotification::where('status', 'Lead')->count();
            $employeeMail = EmailNotification::where('status', 'Employee')->count();
            $trainerMail = EmailNotification::where('status', 'Trainer')->count();
            $memberMailList = EmailNotification::where('status', 'Member')->paginate(5, ['*'], 'memberMailList');
            $leadMailList = EmailNotification::where('status', 'Lead')->paginate(5, ['*'], 'leadMailList');
            $employeeMailList = EmailNotification::where('status', 'Employee')->paginate(5, ['*'], 'employeeMailList');
            $trainerMailList = EmailNotification::where('status', 'Trainer')->paginate(5, ['*'], 'trainerMailList');
            ActivityLogsController::insertLog("Email Dashbaord Page");
            return view('gym.email.index', compact('memberMail', 'leadMail', 'employeeMail', 'trainerMail', 'memberMailList', 'leadMailList', 'employeeMailList', 'trainerMailList'));
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in email page');
        }
    }

    public function employeeList()
    {
        try {
            $employee = Employee::where('gym_id', Auth::guard('employee')->user()->gym_id)->orderBy('id', 'asc')->get();
            ActivityLogsController::insertLog("Employee Email Page");
            return view('gym.email.employee.list', compact('employee'));
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in Employee email page');
        }
    }

    public function memberList()
    {
        try {
            $member = Member::where('gym_id', Auth::guard('employee')->user()->gym_id)->where('type', 'Member')->orderBy('id', 'asc')->get();
            ActivityLogsController::insertLog("Member Email Page");
            return view('gym.email.member.list', compact('member'));
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in Member email page');
        }
    }

    public function leadList()
    {
        try {
            $lead = Member::where('gym_id', Auth::guard('employee')->user()->gym_id)->where('type', 'Lead')->orderBy('id', 'asc')->get();
            ActivityLogsController::insertLog("Lead Email Page");
            return view('gym.email.lead.list', compact('lead'));
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in Lead email page');
        }
    }

    public function trainerList()
    {
        try {
            $trainer = Trainer::where('gym_id', Auth::guard('employee')->user()->gym_id)->orderBy('id', 'asc')->get();
            ActivityLogsController::insertLog("Trainer Email Page");
            return view('gym.email.trainer.list', compact('trainer'));
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in Trainer email page');
        }
    }

    public function sendEmailMail(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'gym_id' => 'required',
                'status' => 'required',
                'subject' => 'required',
                'message' => 'required',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $sendMail = new EmailNotification();
            $sendMail->fill($request->only([
                'gym_id',
                'status',
                'subject',
                'message',
            ]));
            $details = [
                'subject' => $request->subject,
                'message' => $request->message
            ];
            if ($request->employee_id != "") {
                $sendMail->employee_id = implode(',', $request->employee_id);
                foreach ($request->employee_id as $employee) {
                    $employeeId = Employee::where('id', $employee)->first();
                    Mail::to($employeeId->email)->send(new \App\Mail\EmployeeMail($details));
                    // Welcome Notification
                    $trainer = Employee::where('id', $employee)->get();
                    $letter = collect(['title' => 'Email Alert!', 'body' => 'Please check your email']);
                    Notification::send($trainer, new DatabaseNotification($letter));
                }
            } elseif ($request->member_id != "") {
                $sendMail->member_id = implode(',', $request->member_id);
                foreach ($request->member_id as $member) {
                    $memberId = Member::where('id', $member)->first();
                    Mail::to($memberId->email)->send(new \App\Mail\MemberMail($details));
                    // Welcome Notification
                    $trainer = Member::where('id', $member)->get();
                    $letter = collect(['title' => 'Email Alert!', 'body' => 'Please check your email']);
                    Notification::send($trainer, new DatabaseNotification($letter));
                }
            } elseif ($request->lead_id != "") {
                $sendMail->lead_id = implode(',', $request->lead_id);
                foreach ($request->lead_id as $lead) {
                    $leadId = Member::where('id', $lead)->first();
                    Mail::to($leadId->email)->send(new \App\Mail\LeadMail($details));
                    // Welcome Notification
                    $trainer = Member::where('id', $lead)->get();
                    $letter = collect(['title' => 'Email Alert!', 'body' => 'Please check your email']);
                    Notification::send($trainer, new DatabaseNotification($letter));
                }
            } elseif ($request->trainer_id != "") {
                $sendMail->trainer_id = implode(',', $request->trainer_id);
                foreach ($request->trainer_id as $trainer) {
                    $trainerId = Trainer::where('id', $trainer)->first();
                    Mail::to($trainerId->email)->send(new \App\Mail\TrainerMail($details));
                    // Welcome Notification
                    $trainer = Trainer::where('id', $trainer)->get();
                    $letter = collect(['title' => 'Email Alert!', 'body' => 'Please check your email']);
                    Notification::send($trainer, new DatabaseNotification($letter));
                }
            }
            $sendMail->save();
            ActivityLogsController::insertLog("Email Notification Send Successfully!");
            return back()->with('success', 'Email Notification Send Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in email notification page');
        }
    }

}
