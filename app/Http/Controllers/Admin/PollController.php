<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Poll;
use App\Models\PollOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polls = Poll::withCount('options')->paginate(10);
        // return $polls;
        return view('admin.poll.index', compact('polls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.poll.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'title' => 'required',
            'status' => 'required',
        ]);

        $poll = Poll::create([
            'title' => $request->title,
            'status' => $request->status,
            'user_id' => Auth::user()->id
        ]);

        if ($poll && !empty($request->options)) {
            foreach ($request->options as $option) {
                PollOption::create([
                    'poll_id' => $poll->id,
                    'user_id' => Auth::user()->id,
                    'option' => $option,
                    'count' => 0
                ]);
            }
        }

        return redirect()->route('polls.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $poll = Poll::with('options')->firstWhere('id', $id);
        $status=Poll::all();
        // return $status;
        return view('admin.poll.edit',compact('poll','status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $poll = Poll::where('id',$id)->update([
            'title' => $request->title,
            'type' => $request->type,
            'user_id' => Auth::user()->id
        ]);

        if ($poll && !empty($request->options)) {
            foreach ($request->options as $option) {
                PollOption::where('id',$id)->update([
                    'poll_id' => $poll->id,
                    'user_id' => Auth::user()->id,
                    'option' => $option,
                    'count' => 0
                ]);
            }
        }

        return redirect()->route('polls.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $poll = Poll::where('id', $id)->first();
        Poll::where('id', $id)->delete();
        return redirect()->route('polls.index');
    }

    // poll public
    public function pollPublic($id)
    {
        Poll::findOrFail($id)->update(['type'=>1]);
        return back();
    }
    // poll public
    public function pollProtected($id)
    {
        Poll::findOrFail($id)->update(['type'=>2]);
        return back();
    }
    // poll public
    public function pollPrivate($id)
    {
         Poll::findOrFail($id)->update(['type'=>3]);
        return back();
    }

}
