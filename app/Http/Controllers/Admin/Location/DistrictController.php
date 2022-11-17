<?php

namespace App\Http\Controllers\Admin\Location;

use App\Http\Controllers\Controller;
use Devfaysal\BangladeshGeocode\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index()
    {
        $districts= District::with('division')->paginate(10);
        return view('admin.location.districts',compact('districts'));
    }
}
