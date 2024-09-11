<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admins; 
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function showAdminDetails()
    {
        $user_id = session('user_id');

        $admin = Admins::where('id', $user_id)->first();

        return view('Admin.Settings', compact('admin'));
    } 

    public function UpdateAdmin(Request $request){

        // Validate the incoming request data
        $validated = $request->validate([
            'id' => 'required|integer|exists:admins,id',
            'admin_name' => 'required|string|max:255',
            'admin_mobile' => 'required|string|max:255',
            'admin_email' => 'required|email|max:255',
        ]);

        $admin = Admins::find($validated['id']);

        $admin->admin_name = $validated['admin_name'];
        $admin->admin_mobile = $validated['admin_mobile'];
        $admin->admin_email = $validated['admin_email'];

        $admin->save();

        return response()->json(['message' => 'Admin details updated successfully.']);
    }

    public function UpdateAdminPassword(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer|exists:admins,id', 
            'new_password' => 'required|string|min:8|max:255|confirmed', 
        ]);
    
        $admin = Admins::find($validated['id']);
    
        $admin->admin_password = Hash::make($validated['new_password']);
    
        $admin->save();
    
        return response()->json(['message' => 'Admin password updated successfully.']);
    }

        public function UpdateAdminProfilePic(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:admins,id',
            'admin_profile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        $admin = Admins::find($request->id);

        if ($request->hasFile('admin_profile')) {
            $fileName = time() . '_' . $request->file('admin_profile')->getClientOriginalName();

            $filePath = $request->file('admin_profile')->storeAs('admin_profile', $fileName, 'public');

            $admin->admin_profile = $filePath;
            $admin->save();
        }

        return response()->json(['message' => 'Profile picture updated successfully.']);
    }

}
