<?php

namespace App\Http\Controllers\Api\User\Poll;

use App\Http\Controllers\Controller;
use App\Models\Poll\PollAttendance;
use Illuminate\Http\Request;

class PollattendanceController extends Controller
{
    public function pollStore(Request $request, $id)
    {

        $request->validate([
            'poll_option_id'=>'required'
        ]);

        $checkattendence = PollAttendance::where('poll_id', $id)->where('user_id', $request->user()->id)->first();
        // return $likecheck;

        if ($checkattendence) {
            // $likecheck->delete();
            // $likes = PostLike::where('post_id', $id)->count();
            return response()->json('vot diyece');
        } else {
            $poll = PollAttendance::create([
                'user_id' => $request->user()->id,
                'poll_id' => $request->id,
                'poll_option_id' => $request->poll_option_id,
                'status' => 1
            ]);
            return response()->json($poll);
        }

        // return $request->user();
    }
}
