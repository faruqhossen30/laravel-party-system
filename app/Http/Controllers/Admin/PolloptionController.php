<?php

namespace App\Http\Controllers\Admin;

use App\Models\Poll;
use App\Models\User;
use App\Models\Pollaccess;
use App\Models\PollOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PolloptionController extends Controller
{
    public function optionUpdate(Request $request, $id)
    {
        $option = PollOption::firstWhere('id', $id)->update([
            'poll_id' => $request->poll_id,
            'user_id' => Auth::user()->id,
            'option' => $request->option
        ]);

        return redirect()->back();
    }

    // add more option
    public function createMoreOption($id)
    {
        $poll = Poll::firstWhere('id', $id);
        // return $addMore;


        return view('admin.poll.add-more', compact('poll'));
    }

    public function addmoreOptionStore(Request $request, $id)
    {

        // return $request->all();

        $request->validate([
            'options' => 'required'
        ]);

        if (!empty($request->options)) {
            foreach ($request->options as $option) {
                PollOption::create([
                    'poll_id' => $id,
                    'user_id' => Auth::user()->id,
                    'option'  => $option,
                    'count'   => 0
                ]);
            }
        }

        return redirect()->route('polls.index');
    }


    public function accessUserList($id)
    {
        $accessUsers = Pollaccess::where('poll_id', $id)->pluck('user_id')->toArray();
        $users = User::whereIn('id', $accessUsers)->get();

        // return $users;
        return view('admin.poll.accessuserlist', compact('users'));
    }

    public function createUserOption(Request $request, $id)
    {
        $users = User::all();
        // $poll = Poll::all();
        $poll = Poll::firstWhere('id', $id);
        // return  $poll;
        return view('admin.poll.addpolluser', compact('users', 'poll'));
    }


    public function addUserStore(Request $request, $id)
    {
        // return $request->all();
        if (!empty($request->user_id)) {
            foreach ($request->user_id as $user) {
                Pollaccess::create([
                    'user_id' => $user,
                    'poll_id' => $id,
                ]);
            }
        }
        return redirect()->route('polls.index');
    }

    public function editUser($id)
    {

        $poll = Poll::firstWhere('id', $id);
        $users = User::all();
        $accessUsers = Pollaccess::where('poll_id', $id)->pluck('user_id')->toArray();
        // return $accessUsers;
        return view('admin.poll.edit-access-user', compact('poll', 'users', 'accessUsers'));
    }


    public function updateUser(Request $request , $id){

        Pollaccess::where('poll_id', $id)->delete();

            if (!empty($request->user_id)) {
                foreach ($request->user_id as $user) {
                    Pollaccess::create([
                        'poll_id' => $id,
                        'user_id' => $user
                    ]);
                }
            }
        return redirect()->route('polls.index');
    }
}
