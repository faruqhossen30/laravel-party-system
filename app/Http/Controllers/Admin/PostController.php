<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->paginate(10);
        return view('admin.post.index', compact('posts'));
    }



    // active
    public function postActive($id)
    {
        Post::findOrFail($id)->update(['status'=>1]);
        return back();
    }
    // active
    public function postInactive($id)
    {
        Post::findOrFail($id)->update(['status'=>0]);
        return back();
    }
}
