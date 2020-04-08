<?php

namespace App\Http\Controllers\Gym;

use App\Http\Traits\FileUpload;
use App\Image;
use App\Trainer;
use App\Gym;
use App\Http\Controllers\Controller;
use App\Treasury;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TrainerController extends Controller
{
    use FileUpload;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $trainer = Trainer::where('gym_id', '=', Auth::guard('employee')->user()->gym_id)->orderBy('id', 'asc')->paginate(10);
            if ($request->ajax()) {
                $sort_by = $request->get('sortby');
                $sort_type = $request->get('sorttype');
                $query = $request->get('query');
                $searchTerm = str_replace(" ", "%", $query);
                $trainer = Trainer::getTrainerList($searchTerm, $sort_by, $sort_type);
                return view('gym.trainer.pagination_data', compact('trainer'))->render();
            }
            return view('gym.trainer.list', compact('trainer'));
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('gym.trainer.create');
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'gym_id' => 'required',
                'firstName' => 'required',
                'lastName' => 'required',
                'dob' => 'required',
                'gender' => 'required',
                'phone' => 'required',
                'status' => 'required',
                'qualification' => 'required',
                'specialities' => 'required',
                'note' => 'required',
                'email' => 'required|email|unique:trainers',
                'password' => 'nullable|between:6,12,password',
                'password_confirmation' => 'nullable|same:password',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $trainer = new Trainer();
            $trainer->fill($request->only([
                'gym_id',
                'firstName',
                'lastName',
                'dob',
                'gender',
                'phone',
                'status',
                'qualification',
                'specialities',
                'note',
                'email'
            ]));
            $trainer->password = Hash::make($request->password);
            $trainer->save();
            if ($request->hasFile('image')) {
                $images = [];
                $image = $request->file('image');
                $userImage = new Image();
                $this->uploadTrainerImg($image, $userImage, 'path', null, $trainer->id);
                $images[] = $userImage;
                $trainer->userImage()->saveMany($images, $trainer);
            }
            return back()->with('success', 'Trainer Created Successfully!');
        } catch (\Exception $e) {
            return response()->json([
                'response' => $e
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $trainer = Trainer::find($id);
            $treasuryDetail = Treasury::where('trainer_id', $id)->where('gym_id', Auth::guard('employee')->user()->gym_id)->paginate(10);
            $treasuryCashIn = Treasury::where('trainer_id', $id)->where('gym_id', Auth::guard('employee')->user()->gym_id)->where('cashFlow', 'In')->sum('value');
            $treasuryCashOut = Treasury::where('trainer_id', $id)->where('gym_id', Auth::guard('employee')->user()->gym_id)->where('cashFlow', 'Out')->sum('value');
            $treasuryCashExtra = Treasury::where('trainer_id', $id)->where('gym_id', Auth::guard('employee')->user()->gym_id)->where('cashFlow', 'Extra')->sum('value');
            $treasuryCashDiscount = Treasury::where('trainer_id', $id)->where('gym_id', Auth::guard('employee')->user()->gym_id)->where('cashFlow', 'Discount')->sum('value');
            return view('gym.trainer.edit', compact('trainer', 'treasuryDetail', 'treasuryCashIn', 'treasuryCashOut', 'treasuryCashExtra', 'treasuryCashDiscount'));
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in trainer update page');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $trainer_id = $request->id;
        try {
            $validator = Validator::make($request->all(), [
                'gym_id' => 'required',
                'firstName' => 'required',
                'lastName' => 'required',
                'dob' => 'required',
                'gender' => 'required',
                'phone' => 'required',
                'status' => 'required',
                'qualification' => 'required',
                'specialities' => 'required',
                'note' => 'required',
                'password' => 'nullable|between:6,12,password',
                'password_confirmation' => 'nullable|same:password',
                'email' => 'nullable|unique:trainers,email,' . $trainer_id,
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $trainer = Trainer::where('id', $trainer_id)->first();
            $password = $trainer->password;
            $trainer->fill($request->only([
                'gym_id',
                'firstName',
                'lastName',
                'dob',
                'gender',
                'phone',
                'status',
                'qualification',
                'specialities',
                'note',
                'email'
            ]));
            if (!empty($request->password)) {
                $trainer->password = Hash::make($request->password);
            } else {
                $trainer->password = $password;
            }
            $trainer->save();
            if ($request->hasFile('image')) {
                $images = [];
                $image = $request->file('image');
                $userImage = new Image();
                $this->uploadTrainerImg($image, $userImage, 'path', null, $trainer_id);
                $images[] = $userImage;
                $trainer->userImage()->saveMany($images, $trainer);
            }
            return back()->with('success', 'Trainer Updated Successfully!');
        } catch (\Exception $e) {
            return response()->json([
                'response' => $e
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Trainer::destroy($id);
            $this->deleteTrainerImg($id);
            return back()->with('success', 'Trainer Deleted Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in trainer delete function');
        }
    }
}
