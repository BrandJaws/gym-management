<?php

namespace App\Http\Controllers\Gym;

use App\Http\Controllers\Controller;
use App\TrainingGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainingGroupController extends Controller
{
    public function createTrainingGroup(Request $request)
    {
        try {
            $request->validate([
                'members' => 'required',
                'training_id' => 'required',
            ]);
            $gym_id = Auth::guard('employee')->user()->gym_id;
            $trainingGroup = new TrainingGroup();
            $trainingGroup->gym_id = $gym_id;
            $trainingGroup->training_id = $request->training_id;
            if ($request->members != "") {
                $trainingGroup->member_id = implode(',', $request->members);
            }
            $trainingGroup->save();
            ActivityLogsController::insertLog("Add Training Group ");
            return back()->with('success', 'Add Training Group Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in treasury update page');
        }
    }

    public function editTrainingGroup($id)
    {
        try {
            $post = TrainingGroup::getTrainingGroupEditList($id);
            ActivityLogsController::insertLog("Training Edit Page");
            return response()->json($post);
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in treasury update page');
        }
    }

    public function destroyTrainingGroup($id)
    {
        try {
            TrainingGroup::find($id)->delete();
            ActivityLogsController::insertLog("Delete Training Group ");
            return response()->json(['success' => 'Post Deleted successfully']);
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in treasury update page');
        }
    }

    public function updateTrainingGroup(Request $request)
    {
        try {
            $request->validate([
                'training_id' => 'required',
            ]);
            TrainingGroup::where('id', $request->id)->delete();
            $gym_id = Auth::guard('employee')->user()->gym_id;
            $trainingGroup = new TrainingGroup();
            $trainingGroup->gym_id = $gym_id;
            $trainingGroup->training_id = $request->training_id;
            if ($request->members != "") {
                $trainingGroup->member_id = implode(',', $request->members);
            }
            $trainingGroup->save();
            ActivityLogsController::insertLog("Update Training Group ");
            return back()->with('success', 'Add Training Group Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Oops, something was not right in treasury update page');
        }
    }
}
