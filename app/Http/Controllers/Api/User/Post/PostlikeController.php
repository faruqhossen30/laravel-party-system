<?php

namespace App\Http\Controllers\Api\User\Post;

use App\Http\Controllers\Controller;
use App\Models\Post\PostLike;
use Illuminate\Http\Request;

class PostlikeController extends Controller
{
    public function postLike(Request $request,$id)
    {

        // $request->validate([
        //     'post_id' => 'required'
        // ]);

        // $data = [
        //     'post_id' => $request->post_id,
        //     'user_id' => $request->user_id,
        // ];

        $likecheck = PostLike::where('post_id', $id)->where('user_id', $request->user()->id)->first();
        // return $likecheck;
        if ($likecheck) {
            $likecheck->delete();

            $likes = PostLike::where('post_id', $id)->count();
            return response()->json($likes);
        } else {
            $like = PostLike::create([
                'post_id' => $id,
                'user_id' => $request->user()->id
            ]);
            $likes = PostLike::where('post_id', $id)->count();
            return response()->json($likes);
        }
    }
}
