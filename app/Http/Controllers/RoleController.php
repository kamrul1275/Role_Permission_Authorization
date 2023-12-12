<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    function Index()
    {
        $roles = Role::latest()->get();

        //return $roles;

        return view('backend.role.index', compact('roles'));
    } //end method


    function Create()
    {
        return view('backend.role.create');
    } //end method


    function Store(Request $request)
    {
        $roles = new Role();
        $roles->name = $request->name;
        $roles->save();

    
        return redirect('/role');
    } //end method


    function Delete($id)
    {
        $data = Role::find($id);
        $data->delete();
        return redirect()->back()->with('msg', 'delete.....!');
    } //end method
}
