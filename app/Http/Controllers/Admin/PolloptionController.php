<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Poll;
use App\Models\PollOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PolloptionController extends Controller
{
    public function optionUpdate(Request $request, $id)
    {
        $option = PollOption::firstWhere('id',$id)->update([
            'poll_id'=> $request->poll_id,
            'user_id'=> Auth::user()->id,
            'option'=> $request->option
        ]);

        return redirect()->back();
    }

    // add more option
    public function createMoreOption($id)
    {
        $poll =Poll::firstWhere('id',$id);
        // return $addMore;


        return view('admin.poll.add-more',compact('poll'));
    }

    public function addmoreOptionStore(Request $request, $id)
    {

        // return $request->all();

        $request->validate([
            'options'=>'required'
        ]);

        if (!empty($request->options)) {
            foreach ($request->options as $option) {
                PollOption::create([
                    'poll_id' => $id,
                    'user_id' => Auth::user()->id,
                    'option' => $option,
                    'count' => 0
                ]);
            }
        }

        return redirect()->route('polls.index');
    }

}
