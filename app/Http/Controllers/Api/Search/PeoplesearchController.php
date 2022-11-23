<?php

namespace App\Http\Controllers\Api\Search;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PeoplesearchController extends Controller
{
    public function searchPeople(Request $request, $name)
    {
        $people = User::where('name', 'LIKE', "%{$name}%")->paginate(10);
        return response()->json($people);
    }
}
