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

    public function contact(Request $request)
    {
        // return $request->all();
        $request->validate([
            'email'=> 'required',
            'mobile'=> 'required',
        ]);
        $user = User::firstWhere('id', $request->user()->id);

        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->save();
        return response()->json($user);
    }

    public function aditional_info(Request $request)
    {
        // return $request->all();
        $request->validate([
            'dob'=> 'required',
            'gender'=> 'required',
            'occupation'=> 'required',
            'relation_status'=> 'required',
            'blood'=> 'required',
        ]);
        $user = User::firstWhere('id', $request->user()->id);

        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->occupation = $request->occupation;
        $user->relation_status = $request->relation_status;
        $user->blood = $request->blood;
        $user->save();
        return response()->json($user);
    }

    public function social(Request $request)
    {
        // return $request->all();
        $request->validate([
            'website'=> 'required',
            'facebook'=> 'required',
            'youtube'=> 'required',
            'twitter'=> 'required',
        ]);
        $user = User::firstWhere('id', $request->user()->id);

        $user->website = $request->website;
        $user->facebook = $request->facebook;
        $user->youtube = $request->youtube;
        $user->twitter = $request->twitter;
        $user->save();
        return response()->json($user);
    }
}
