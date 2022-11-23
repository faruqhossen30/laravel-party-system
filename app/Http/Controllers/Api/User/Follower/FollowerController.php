<?php

namespace App\Http\Controllers\Api\User\Follower;

use App\Http\Controllers\Controller;
use App\Models\Follower;
use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function followRequest(Request $request, $id)
    {
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

    public function followerList(Request $request)
    {
        $followers = Follower::where('follower_id', $request->user()->id)->pluck('user_id')->toArray();
        $users = User::whereIn('id', $followers)->withCount('followers')->paginate();

        return response()->json($users);
    }

    public function followwingList(Request $request)
    {
        $following = Follower::where('user_id', $request->user()->id)->pluck('follower_id')->toArray();
        $users = User::whereIn('id', $following)->withCount('followers')->paginate();

        return response()->json($users);
    }



}
