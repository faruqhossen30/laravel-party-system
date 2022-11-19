<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PeoplelistController extends Controller
{
    public function index()
    {
        $people = User::take(5)->get();
        return response()->json($people);
        return 'some';
    }
}
