<?php

namespace App\Http\Controllers\Api\User\Follower;

use App\Http\Controllers\Controller;
use App\Models\Follower;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function followRequest(Request $request, $id)
    {

        // $request->validate([
        //     'follower_id' => 'required',
        // ]);

        // $data = [
        //     'user_id' => $request->user_id,
        //     'follower_id' => $request->follower_id,
        // ];

        $follow = Follower::where('user_id', $request->user()->id)
            ->where('follower_id', $id)
            ->first();

        // return $likecheck;
        if ($follow) {
            $follow->delete();
            return "follow delete";
        } else {
            $folling = Follower::create([
                'user_id' => $request->user()->id,
                'follower_id' => $request->id
            ]);
            return response()->json($folling);
        }
    }
}
