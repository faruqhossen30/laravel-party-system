<?php

namespace App\Http\Controllers\Api\User\Poll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PollattendanceController extends Controller
{
    public function pollStore(Request $request, $id)
    {
        return $request->user();
    }
}
