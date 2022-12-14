<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Poll;
use Illuminate\Http\Request;

class PolllistController extends Controller
{
    public function index()
    {
        $polls = Poll::with('options')->orderBy('id', 'desc')->paginate(10);
        return response()->json($polls);
    }
}
