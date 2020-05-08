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
        $request->validate([
            'member' => 'required',
            'training_id' => 'required',
        ]);
        $group = TrainingGroup::where('member_id', '=', $request->member)->first();
        if ($group === null) {
            $post = TrainingGroup::updateOrCreate(['id' => $request->id], [
                'member_id' => $request->member,
                'gym_id' => Auth::guard('employee')->user()->gym_id,
                'training_id' => $request->training_id,
            ]);
            ActivityLogsController::insertLog("Add/Update Training Group ");
            return response()->json(['code' => 200, 'message' => 'Post Created successfully', 'data' => $post], 200);
        }
        return response()->json(['code' => 400, 'message' => 'error'], 400);
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
}
