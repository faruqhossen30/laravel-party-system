<?php

namespace App\Http\Controllers\Admin\Location;

use App\Http\Controllers\Controller;
use Devfaysal\BangladeshGeocode\Models\Union;
use Illuminate\Http\Request;

class UnionController extends Controller
{
    public function index()
    {
        $unions=Union::with('upazila')->paginate(10);
        return view('admin.location.unions',compact('unions'));
    }
}
