<?php

namespace App\Http\Controllers\Admin\Location;

use App\Http\Controllers\Controller;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use Illuminate\Http\Request;

class UpazilaController extends Controller
{
    public function index()
    {
        $upazilas= Upazila::with('district')->paginate(10);
        return view('admin.location.upazilas',compact('upazilas'));
    }
}
