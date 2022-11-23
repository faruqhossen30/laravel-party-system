<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Image;

class ProfileController extends Controller
{
    public function update(Request $request)
    {

        // return $request->all();
        $user = User::firstWhere('id', $request->user()->id);

        $thumbnail = null;
        if ($request->file('avatar')) {
            $image = $request->file('avatar');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('uploads/photos/profile/' . $name_gen);
            $save_url = 'uploads/photos/profile/' . $name_gen;
        }

        // return  $user;

        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->save();

        return response()->json('ok');
    }

    public function avatar(Request $request)
    {
        // return $request->all();
        $request->validate([
            'avatar'=> 'required'
        ]);
        $user = User::firstWhere('id', $request->user()->id);

        $thumbnail = null;
        if ($request->file('avatar')) {
            $image = $request->file('avatar');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('uploads/photos/profile/' . $name_gen);
            $save_url = 'uploads/photos/profile/' . $name_gen;
        }

        $user->avatar = $save_url;
        $user->save();

        return response()->json($user);
    }

    public function address(Request $request)
    {
        // return $request->all();
        $request->validate([
            'address'=> 'required'
        ]);
        $user = User::firstWhere('id', $request->user()->id);

        $user->address = $request->address;
        $user->division = $request->division;
        $user->district = $request->district;
        $user->upazila = $request->upazila;
        $user->unions = $request->union;
        $user->save();
        return response()->json($user);

    }
    public function name(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name'=> 'required'
        ]);
        $user = User::firstWhere('id', $request->user()->id);

        $user->name = $request->name;
        $user->save();
        return response()->json($user);

    }
}
