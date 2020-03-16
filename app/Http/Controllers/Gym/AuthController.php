<?php

namespace App\Http\Controllers\Gym;

use App\Http\Controllers\Controller;
use App\Http\Traits\FileUpload;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use FileUpload;

    public function index()
    {
        return view('gym.auth.login');
    }
}
