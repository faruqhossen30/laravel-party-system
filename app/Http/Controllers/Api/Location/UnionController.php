<?php

namespace App\Http\Controllers\Api\Location;

use App\Http\Controllers\Controller;
use Devfaysal\BangladeshGeocode\Models\Union;
use Illuminate\Http\Request;

class UnionController extends Controller
{
    public function unionList()
    {
        $unions = Union::orderBy('name', 'asc')->get();
        return response()->json($unions);
    }
}
