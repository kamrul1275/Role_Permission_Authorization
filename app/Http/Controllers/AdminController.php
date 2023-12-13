<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class AdminController extends Controller
{
    function adminLogin(){
        return view('backend.auth.login');
    }


    public function AdminPostLogin(Request $request)

{
    $request->validate([

        'email' => 'required',
        'password' => 'required',
    ]);



    //dd($request->all());

    $request->session()->regenerate();

    //dd($request->session()->regenerate());

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {

        return redirect()->intended(RouteServiceProvider::ADMIN_DASHBOARD)->withSuccess('Admin Successfully loggedin');
    }

    return redirect("/admin/login")->withSuccess('Oppes! You have entered invalid credentials');
}



// end admin login



    public function AdminDashboard()

    {

        //$roles = Role::latest()->get();
        return  view('backend.layout.dashboard');
    }



    public function Adminlogout()
    {
        Auth::logout();
        return Redirect()->route('admin.login');
    } //end method



}
