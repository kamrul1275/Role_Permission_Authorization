<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    function Dashboard(){

        $users = User::with('role')->latest()->get();

        //return  $users;
       
           if (!Gate::allows('admin', auth()->user())) {
               return "Error";
           }
       

        return view('dashboard');
    }
}
