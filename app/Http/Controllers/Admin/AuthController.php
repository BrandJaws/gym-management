<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Employee;
use App\Gym;
use App\GymServices;
use App\Http\Controllers\Controller;
use App\Http\Traits\FileUpload;
use App\Image;
use App\License;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use FileUpload;

    public function index()
    {
        return view('admin.auth.login');
    }


    public function showLoginForm()
    {
        return view('auth.login', [
            'title' => 'Login',
            'loginRoute' => 'admin.login',
            'forgotPasswordRoute' => 'admin.password.request',
        ]);
    }

    public function login(Request $request)
    {
        $this->validator($request);
        if (Auth::guard('admin')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            //Authentication passed...
            return redirect()
                ->intended(route('admin.home'))
                ->with('status', 'You are Logged in as Admin!');
        }
        //Authentication failed...
        return $this->loginFailed();
    }

    /**
     * Logout the admin.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()
            ->route('admin.login')
            ->with('status', 'Admin has been logged out!');
    }

    /**
     * Validate the form data.
     *
     * @param \Illuminate\Http\Request $request
     * @return
     */
    private function validator(Request $request)
    {
        //validation rules.
        $rules = [
            'email' => 'required|email|exists:admins|min:5|max:191',
            'password' => 'required|string|min:4|max:255',
        ];

        //custom validation error messages.
        $messages = [
            'email.exists' => 'These credentials do not match our records.',
        ];

        //validate the request.
        $request->validate($rules, $messages);
    }

    /**
     * Redirect back after a failed login.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    private function loginFailed()
    {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Login failed, please try again!');
    }

    public function reset()
    {
        return view('admin.auth.reset');
    }

    public function profile()
    {
        return view('admin.auth.profile');
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
            $gym = Admin::find($id);
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
                $this->uploadOne($image, $userImage, 'path', null, $gym->id);
                $images[] = $userImage;
                $gym->userImage()->saveMany($images, $gym);
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
