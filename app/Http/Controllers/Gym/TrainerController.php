<?php

namespace App\Http\Controllers\Gym;
use App\Http\Traits\FileUpload;
use App\Image;
use App\Trainer;
use App\Gym;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
            $trainer = Trainer::orderBy('id', 'asc')->paginate(4);
            if ($request->ajax()) {
                $sort_by = $request->get('sortby');
                $sort_type = $request->get('sorttype');
                $query = $request->get('query');
                $query = str_replace(" ", "%", $query);
                $trainer = Trainer::getTrainerList($query, $sort_by, $sort_type);
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
        return view('gym.trainer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
                'qualification' => 'required',
                'specialites' => 'required',
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
                'email',
                'password',
                'qualification',
                'specialites',
                'note',
            ]));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
