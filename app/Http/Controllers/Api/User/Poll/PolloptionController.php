<?php

namespace App\Http\Controllers\Api\User\Poll;

use App\Http\Controllers\Controller;
use App\Models\Poll\PollAttendance;
use App\Models\PollOption;
use Illuminate\Http\Request;

class PolloptionController extends Controller
{
    public function pollOptionById($id)
    {
        // $options = PollAttendance::where('poll_id', $id)->get();
        $options = PollOption::with('attendences')->where('id', $id)->first();
        return $options;
    }
}
