<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ActiveUserController extends Controller
{
    public function AllUser(){

        $user = User::where('role','user')->latest()->get();
        return view('backend.users.all_user', compact('user'));

    }// End Method 

    public function AllVendor(){

        $user = User::where('role','vendor')->latest()->get();
        return view('backend.users.all_vendor', compact('user'));

    }// End Method
}
