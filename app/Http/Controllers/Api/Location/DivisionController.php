<?php

namespace App\Http\Controllers\Api\Location;

use App\Http\Controllers\Controller;
use Devfaysal\BangladeshGeocode\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function divisionList()
    {
        $divisions = Division::orderBy('name', 'asc')->get();
        return response()->json($divisions);
    }
}
