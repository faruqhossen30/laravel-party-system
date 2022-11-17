<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizations=Organization::get();
        // return $organizations;
        return view('admin.organization.index',compact('organizations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.organization.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'bn_name' => 'required',
            'description' => 'required',
        ]);

        Organization::create([
            'name'=>$request->name,
            'bn_name'=>$request->bn_name,
            'description'=>$request->description,
            'user_id'=>Auth::user()->id
        ]);
        return redirect()->route('organizations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $organization = Organization::firstWhere('id', $id);
        // return $organization;
        return view('admin.organization.edit',compact('organization'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'bn_name' => 'required',
            'description' => 'required',
        ]);

        Organization::where('id',$id)->update([
            'name'=>$request->name,
            'bn_name'=>$request->bn_name,
            'description'=>$request->description,
            'user_id'=>Auth::user()->id
        ]);
        return redirect()->route('organizations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $organization = Organization::where('id', $id)->first();
        Organization::where('id', $id)->delete();
        return redirect()->route('organizations.index');
    }
}
