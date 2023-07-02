<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function AdminDashboard(){

        return view('admin.index');

    }// END AdminDashboard





    public function AdminLogout(Request $request){

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');

    }// END AdminLogout





    public function AdminLogin(){

        return view('admin.admin_login');

    }// END AdminLogin
}
