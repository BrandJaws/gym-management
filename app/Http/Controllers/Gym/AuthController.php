<?php

namespace App\Http\Controllers\Gym;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('gym.auth.login');
    }
    public function reset()
    {
        return view('gym.auth.reset');
    }
}
