<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Follower;
use App\Models\User;
use Illuminate\Http\Request;

class PeoplelistController extends Controller
{
    public function index()
    {
        $people = User::withCount('followers')->paginate(20);
        return response()->json($people);
    }

    public function singlePeople(Request $request, $id)
    {
        $people = User::with('following', 'followers')->firstWhere('id', $id);
        return response()->json($people);

    }

    public function suggestionPeople(Request $request)
    {
        $user = $request->user();
        $followers = Follower::where('user_id', $request->user()->id)->pluck('follower_id')->toArray();
        // return gettype($followers);
        $people = User::whereNotIn('id', $followers)->take(5)->get();

        return response()->json($people);
    }
}
