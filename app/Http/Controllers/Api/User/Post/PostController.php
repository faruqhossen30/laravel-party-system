<?php

namespace App\Http\Controllers\Api\User\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Post\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'body'=>'required'
        ]);

        $data = [
            'user_id'=> $request->user()->id,
            'body'=> $request->body,
        ];

        $thumbnail = null;
        if ($request->hasFile('file')) {
            $imagethumbnail = $request->file('file');
            $extension = $imagethumbnail->getClientOriginalExtension();
            $thumbnail = Str::uuid() . '.' . $extension;
            Image::make($imagethumbnail)->save('uploads/photos/post/' . $thumbnail);
        }


        $post = Post::create($data);
        if($thumbnail){
            PostImage::create([
                'post_id'=> $post->id,
                'name'=> $thumbnail
            ]);
        };

        return response()->json($post);
    }

    public function index()
    {
        $posts = Post::with('user','photo')->withCount('likes')->latest()->paginate(10);
        return response()->json($posts);
    }

    public function singlePost(Request $request, $id)
    {
        $post= Post::with('user')->withCount('likes')->firstWhere('id', $id);
        return response()->json($post);
    }

    public function peoplePost($id)
    {
        $posts = Post::where('user_id', $id)->with('user','photo')->withCount('likes')->latest()->paginate();
        return response()->json($posts);
    }
}
