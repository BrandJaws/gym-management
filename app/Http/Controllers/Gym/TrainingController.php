<?php

namespace App\Http\Controllers\Gym;

use App\Http\Controllers\Controller;
use App\Http\Traits\FileUpload;
use App\Image;
use App\Member;
use App\Notifications\DatabaseNotification;
use App\Trainer;
use App\Training;
use App\TrainingGroup;
use App\Treasury;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
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
            ActivityLogsController::insertLog("Training List Page");
            return view('gym.training.list', compact('training'));
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right');
        }
    }

    public function create()
    {
        try {
            $trainer = Trainer::where('gym_id', '=', Auth::guard('employee')->user()->gym_id)->orderBy('id', 'asc')->get();
            ActivityLogsController::insertLog("Training Create Page");
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
            // Welcome Notification
            $trainer = Trainer::where('id',$request->trainer_id)->get();
            $letter = collect(['title' => 'Congratulations and welcome in training!', 'body' => 'Our heartiest welcome goes to you. Now you are appointed for this training ']);
            Notification::send($trainer, new DatabaseNotification($letter));
            // Training logs
            ActivityLogsController::insertLog("Add New Training");
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
            $gym_id = Auth::guard('employee')->user()->gym_id;
            $training = Training::find($id);
            $trainingGroup = TrainingGroup::getTrainingGroupList($gym_id, $id);
            $groupCount = $trainingGroup->count();
            $trainer = Trainer::where('gym_id', '=', Auth::guard('employee')->user()->gym_id)->orderBy('id', 'asc')->get();
            $member = Member::where('gym_id', '=', Auth::guard('employee')->user()->gym_id)->where('type', '=', 'Member')->orderBy('id', 'asc')->get();
            $memberList = [];
            $trainingMember = TrainingGroup::where('training_id', $id)->first();
            if ($trainingMember) {
                $memberId = explode(',', $trainingMember->member_id);
                foreach ($memberId as $fields) {
                    array_push($memberList, $fields);

                }
            }
            // Welcome Notification
            foreach ($memberList as $memberID) {
                $memberLists = Member::where('id',$memberID)->get();
                $letter = collect(['title' => 'Congratulations and welcome in our training!', 'body' => 'On behalf of our trainer, supervisors and gym, we welcome you in our training.']);
                Notification::send($memberLists, new DatabaseNotification($letter));
            }
            // Training logs
            ActivityLogsController::insertLog("Training Edit Page");
            return view('gym.training.edit', compact('training', 'trainer', 'trainingGroup', 'member', 'groupCount', 'memberList', 'trainingMember'));
        } catch (\Exception $e) {
            return response()->json([
                'response' => $e
            ], 400);
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
            ActivityLogsController::insertLog("Update Training");
            return back()->with('success', 'Training Updated Successfully!');
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
            ActivityLogsController::insertLog(" Delete Training");
            return back()->with('success', 'Trainer Deleted Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in training delete function');
        }
    }


}
