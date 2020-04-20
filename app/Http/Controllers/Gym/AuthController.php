<?php

namespace App\Http\Controllers\Gym;

use App\Employee;
use App\Gym;
use App\Http\Controllers\Controller;
use App\Http\Traits\FileUpload;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    use FileUpload;

    public function index()
    {
        return view('gym.auth.login');
    }

    public function showLoginForm()
    {
        return view('auth.login', [
            'title' => 'Login',
            'loginRoute' => 'gym.login',
            'forgotPasswordRoute' => 'gym.password.request',
        ]);
    }

    public function login(Request $request)
    {
        $this->validator($request);
        $email = $request->email;
        $employee = Employee::where('email', $email)->first();
        if ($employee->gym->status == "Active") {
            if (Auth::guard('employee')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
                //Authentication passed...
                return redirect()
                    ->intended(route('gym.home'))
                    ->with('status', 'You are Logged in as Gym Super-Admin!');
            }
            //Authentication failed...
            return $this->loginFailed();
        } else {
            return $this->loginBlock();
        }
    }

    public function logout()
    {
        Auth::guard('employee')->logout();
        return redirect()
            ->route('gym.login')
            ->with('status', 'Gym Super-Admin has been logged out!');
    }

    private function validator(Request $request)
    {
        //validation rules.
        $rules = [
            'email' => 'required|email|exists:employees|min:5|max:191',
            'password' => 'required|string|min:4|max:255',
        ];

        //custom validation error messages.
        $messages = [
            'email.exists' => 'These credentials do not match our records.',
        ];

        //validate the request.
        $request->validate($rules, $messages);
    }

    private function loginFailed()
    {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Login failed, please try again!');
    }

    private function loginBlock()
    {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Login failed, Because your licence has been blocked ! Kindly update your licence ');
    }

    public function reset()
    {
        return view('gym.auth.reset');
    }

    public function profile()
    {
        return view('gym.auth.profile');
    }

    public function updateProfile(Request $request)
    {
        $id = $request->get('user_id');
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'phone' => 'required',
                'email' => 'unique:admins,email,' . $id,
                'password' => 'nullable|between:6,12,password' . $id,
                'confirm_password' => 'same:password',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $gym = Employee::find($id);
            $gym->fill($request->only([
                'name',
                'email',
            ]));
            $gym->phone = $request['phone'];
            if (!empty($request['password'])) {
                $gym->password = bcrypt($request['password']);
            } else {
                $gym->password = $gym->password;
            }
            if ($request->hasFile('image')) {
                $images = [];
                $image = $request->file('image');
                $userImage = new Image();
                $this->uploadEmployee($image, $userImage, 'path', null, $id);
                $images[] = $userImage;
                $gym->userImage()->saveMany($images, $gym);
            }
            $gymId = Gym::where('id', Auth::guard('employee')->user()->gym->id)->first();
            if ($request->hasFile('gymImage')) {
                $images = [];
                $image = $request->file('gymImage');
                $userImage = new Image();
                $this->uploadGymLogo($image, $userImage, 'path', null, $gymId->id);
                $images[] = $userImage;
                $gymId->gymImage()->saveMany($images, $gym);
            }
            $gym->save();
            return back()->with('success', 'Profile Updated Successfully!');
        } catch (\Exception $e) {
            return response()->json([
                'response' => $e
            ], 400);
        }
    }
}
