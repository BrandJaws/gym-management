<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Employee;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getGymEmployee(){
        return Employee::find(1);
    }

    public function getCurrentAdmin(){
        return Admin::find(1);
    }

}
