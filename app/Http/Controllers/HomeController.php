<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    function Dashboard()
    {

        $user = User::with('role')->latest()->get();
        $posts = Post::latest()->get();
        
        ///return  $users;
        //$users = U::latest()->get();

        return view('dashboard',compact('posts','user'));// end metho
      
    }



function CreateGate(){


    
    return "Create form";
}







}
