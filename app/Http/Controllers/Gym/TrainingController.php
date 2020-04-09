<?php

namespace App\Http\Controllers\Gym;

use App\Http\Controllers\Controller;
use App\Http\Traits\FileUpload;
use App\Image;
use App\Trainer;
use App\Training;
use App\Treasury;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TrainingController extends Controller
{
    use FileUpload;

    public function index(Request $request)
    {
        try {
            $training = Training::where('gym_id', '=', Auth::guard('employee')->user()->gym_id)->orderBy('id', 'asc')->paginate(10);
            if ($request->ajax()) {
                $sort_by = $request->get('sortby');
                $sort_type = $request->get('sorttype');
                $query = $request->get('query');
                $searchTerm = str_replace(" ", "%", $query);
                $training = Training::getTrainingList($searchTerm, $sort_by, $sort_type);
                return view('gym.training.pagination_data', compact('training'))->render();
            }
            return view('gym.training.list', compact('training'));
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }

    public function create()
    {
        try {
            $trainer = Trainer::where('gym_id', '=', Auth::guard('employee')->user()->gym_id)->orderBy('id', 'asc')->get();
            return view('gym.training.create', compact('trainer'))->render();
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'gym_id' => 'required',
                'trainer_id' => 'required',
                'seats' => 'required',
                'sessions' => 'required',
                'startDate' => 'required|date_format:Y-m-d',
                'endDate' => 'required|date_format:Y-m-d',
                'price' => 'required',
                'status' => 'required',
                'promotionType' => 'required',
                'image' => 'nullable|image|image|mimes:jpeg,bmp,png,jpg|max:1024',
                'description' => 'required|min:1,max:250',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $training = new Training();
            $training->fill($request->only([
                'gym_id',
                'trainer_id',
                'name',
                'description',
                'seats',
                'sessions',
                'price',
                'promotionType',
                'startDate',
                'endDate',
                'status'
            ]));
            if ($request->promotionType == "Image") {
                $training->save();
                if ($request->hasFile('image')) {
                    $images = [];
                    $image = $request->file('image');
                    $userImage = new Image();
                    $this->uploadTrainingImg($image, $userImage, 'path', null, $training->id);
                    $images[] = $userImage;
                    $training->userImage()->saveMany($images, $training);
                }
            } else {
                $training->promotionContent = $request->promotionContent;
                $training->save();
            }
            return back()->with('success', 'Training Created Successfully!');
        } catch (\Exception $e) {
            return response()->json([
                'response' => $e
            ], 400);
        }
    }

    public function edit($id)
    {
        try {
            $training = Training::find($id);
            $trainer = Trainer::where('gym_id', '=', Auth::guard('employee')->user()->gym_id)->orderBy('id', 'asc')->get();
            $treasuryDetail = Treasury::where('trainer_id', $id)->where('gym_id', Auth::guard('employee')->user()->gym_id)->paginate(10);
            $treasuryCashIn = Treasury::where('trainer_id', $id)->where('gym_id', Auth::guard('employee')->user()->gym_id)->where('cashFlow', 'In')->sum('value');
            $treasuryCashOut = Treasury::where('trainer_id', $id)->where('gym_id', Auth::guard('employee')->user()->gym_id)->where('cashFlow', 'Out')->sum('value');
            $treasuryCashExtra = Treasury::where('trainer_id', $id)->where('gym_id', Auth::guard('employee')->user()->gym_id)->where('cashFlow', 'Extra')->sum('value');
            $treasuryCashDiscount = Treasury::where('trainer_id', $id)->where('gym_id', Auth::guard('employee')->user()->gym_id)->where('cashFlow', 'Discount')->sum('value');
            return view('gym.training.edit', compact('training', 'trainer', 'treasuryDetail', 'treasuryCashIn', 'treasuryCashOut', 'treasuryCashExtra', 'treasuryCashDiscount'));
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in treasury update page');
        }
    }

    public function update(Request $request)
    {
        $id = $request->id;
        try {
            $validator = Validator::make($request->all(), [
                'gym_id' => 'required',
                'trainer_id' => 'required',
                'seats' => 'required',
                'sessions' => 'required',
                'startDate' => 'required|date_format:Y-m-d',
                'endDate' => 'required|date_format:Y-m-d',
                'price' => 'required',
                'status' => 'required',
                'promotionType' => 'required',
                'image' => 'nullable|image|image|mimes:jpeg,bmp,png,jpg|max:1024',
                'description' => 'required|min:1,max:250',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $training = Training::where('id', $id)->first();
            $training->fill($request->only([
                'gym_id',
                'trainer_id',
                'name',
                'description',
                'seats',
                'sessions',
                'price',
                'promotionType',
                'startDate',
                'endDate',
                'status'
            ]));
            if ($request->promotionType == "Image") {
                if ($request->hasFile('image')) {
                    $images = [];
                    $image = $request->file('image');
                    $userImage = new Image();
                    $this->uploadTrainingImg($image, $userImage, 'path', null, $id);
                    $images[] = $userImage;
                    $training->userImage()->saveMany($images, $training);
                    $training->promotionContent = " ";
                }
            } else {
                $training->promotionContent = $request->promotionContent;
                $this->deleteTrainingImg($id);
            }
            $training->save();
            return back()->with('success', 'Training Created Successfully!');
        } catch (\Exception $e) {
            return response()->json([
                'response' => $e
            ], 400);
        }
    }

    public function destroy($id)
    {
        try {
            Training::destroy($id);
            $this->deleteTrainingImg($id);
            return back()->with('success', 'Trainer Deleted Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in training delete function');
        }
    }

}
