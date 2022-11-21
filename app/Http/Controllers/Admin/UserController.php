<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\Union;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        $keyword = null;
        if (isset($_GET['keyword'])) {
            $keyword = trim($_GET['keyword']);
        }

        $division_id = null;
        if (isset($_GET['division_id'])) {
            $division_id = $_GET['division_id'];
        }
        $district_id = null;
        if (isset($_GET['district_id'])) {
            $district_id = $_GET['district_id'];
        }
        $upazila_id = null;
        if (isset($_GET['upazila_id'])) {
            $upazila_id = $_GET['upazila_id'];
        }
        $union_id = null;
        if (isset($_GET['union_id'])) {
            $union_id = $_GET['union_id'];
        }
        $userlist = User::when($keyword, function ($query, $keyword) {
            return $query->where('name', 'like', '%' . $keyword . '%');
        })->when($division_id, function ($query, $division_id) {
                return $query->where('division', $division_id);
            })
            ->when($district_id, function ($query, $district_id) {
                return $query->where('district', $district_id);
            })->when($upazila_id, function ($query, $upazila_id) {
                return $query->where('upazila', $upazila_id);
            })->when($union_id, function ($query, $union_id) {
                return $query->where('union', $union_id);
            })->latest()->paginate(10);

            // return $userlist;
            $users     = User::paginate(10);
            $divisions = Division::get();
            $districts = District::get();
            $upazilas  = Upazila::get();
            $unions    = Union::get();
            // return $upzilaid;




        // return $circulars;

        return view('admin.user.index', compact('users', 'userlist','divisions', 'districts', 'upazilas', 'unions'));;
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        // return $user;
        return view('admin.user.show', compact('user'));
    }
}
