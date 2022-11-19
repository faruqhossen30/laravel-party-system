<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Division;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        $divisions=Division::get();
        $districts=District::get();
        // return $districts;

        return view('admin.user.index', compact('users'));;
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        // return $user;
        return view('admin.user.show', compact('user'));
    }
}
