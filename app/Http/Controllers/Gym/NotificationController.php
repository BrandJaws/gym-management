<?php

namespace App\Http\Controllers\Gym;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Notifications\DatabaseNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
   public function notify(){
       $employee = Employee::all();
       $letter = collect(['title' => 'New policy update', 'body' => 'its notifications']);
       Notification::send($employee, new DatabaseNotification($letter));
       return back();
   }
}
