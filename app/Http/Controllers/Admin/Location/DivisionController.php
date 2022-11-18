<?php

namespace App\Http\Controllers\Admin\Location;

use App\Http\Controllers\Controller;
use Devfaysal\BangladeshGeocode\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function index()
    {
        $divisions=Division::paginate(2);
        return view('admin.location.divisions',compact('divisions'));
    }
}
