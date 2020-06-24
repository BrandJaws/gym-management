<?php

namespace App\Http\Controllers\Gym;

use App\Employee;
use App\Http\Controllers\Controller;
use App\NotificationModel;
use App\Notifications\DatabaseNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
   public function notify(){
       $employee = Employee::all();
       $letter = collect(['title' => 'New policy update', 'body' => 'its notifications']);
       Notification::send($employee, new DatabaseNotification($letter));
       return back();
   }

    public function index($id)
    {
//        try {
            $notification = NotificationModel::where('id', $id)->first();

            ActivityLogsController::insertLog("Notification Page");
            return view('gym.member.notification.list', compact('notification'));
//        } catch (\Exception $e) {
//            return back()->with('error', 'Oops, something was not right in employee page');
//        }
    }

}
