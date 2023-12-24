<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    function Dashboard()
    {


        if (Auth::check()) {

            Auth::user();
            $roles =  Auth::user()->role;

           // dd($roles);

            // $permissions = [];
            // foreach ($roles as $role) {
            //     dd($role->permissions);
            //     $permissions = array_merge($role->permissions->toArray(), $permissions);
            // };


            //dd($permissions);  with diya kora jabe

        
        $user = User::with('role')->latest()->get();
        $posts = Post::latest()->get();
        
        ///return  $users;
        //$users = U::latest()->get();

        return view('dashboard',compact('posts','user'));// end metho
      
    }
 }
    
                        

function CreateGate(){


    
    return "Create form";
}







}
