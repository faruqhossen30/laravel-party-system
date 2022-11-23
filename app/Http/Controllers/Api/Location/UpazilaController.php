<?php

namespace App\Http\Controllers\Api\Location;

use App\Http\Controllers\Controller;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use Illuminate\Http\Request;

class UpazilaController extends Controller
{
    public function upazilaList()
    {
        $upazilas = Upazila::get();
        return response()->json($upazilas);
    }
}
