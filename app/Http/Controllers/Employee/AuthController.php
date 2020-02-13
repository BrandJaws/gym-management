<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('employee.login');
    }
    public function reset()
    {
        return view('employee.reset');
    }
}
