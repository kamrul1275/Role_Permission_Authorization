<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Role; // Make sure to import your User model
use App\Models\Permission; // Import your Permission model


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

       $user= Role::create([
            'name' => $request->name,

        ]);
        $post_users = $request->input('permissions');
//dd($post_users );
//$post_users = $request->input('roles');

if ($post_users !== null) {
    $permissions = [];
    foreach ($post_users as $key => $val) {
        $permissions[intval($val)] = intval($val);
    }

    $user->permissions()->sync($permissions);

        return redirect()->back();
    }





    }




    function Delete($id)
    {
        $data = Role::find($id);
        $data->delete();
        return redirect()->back()->with('msg', 'delete.....!');
    } //end method


}
