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
        // $roles = new Role();
        // $roles->name = $request->name;

        // //dd($request->permission_id);
        // $roles->permission_id = $request->permission_id;

        // //dd($roles);
        // $roles->save();

        $data = $request->all();

        $user = $this->create($data);

         $post_users = $request->input('permissions');

        //dd( $post_users);

        if ($post_users !== null) {
            $permissions = [];
            foreach ($post_users as $key => $val) {
                $permissions[intval($val)] = intval($val);
            }

            $user->permissions()->sync($permissions);


          dd($user);



    
        return redirect('/role');
    } //end method



}
    function Delete($id)
    {
        $data = Role::find($id);
        $data->delete();
        return redirect()->back()->with('msg', 'delete.....!');
    } //end method

    }