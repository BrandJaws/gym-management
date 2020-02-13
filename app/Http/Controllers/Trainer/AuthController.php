<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('trainer.login');
    }
    public function reset()
    {
        return view('trainer.reset');
    }
}
