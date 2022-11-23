<?php

namespace App\Http\Controllers\Api\Location;

use App\Http\Controllers\Controller;
use Devfaysal\BangladeshGeocode\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function districtList()
    {
        $districts = District::orderBy('name', 'asc')->get();
        return response()->json($districts);
    }
}
