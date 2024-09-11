<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admins; 

class AdminController extends Controller
{

public function showAdminDetails()
{
    $user_id = session('user_id');

    $admin = Admins::where('id', $user_id)->first();

    return view('Admin.Settings', compact('admin'));
} 

}
