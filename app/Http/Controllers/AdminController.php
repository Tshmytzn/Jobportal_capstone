<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admins; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{

    public function showAdminDetails()
    {
        $user_id = session('admin_id');

        $admin = Admins::where('id', $user_id)->first();

        return view('Admin.Settings', compact('admin'));
    } 

    public function showAllAdmins()
    {
        $user_id = session('admin_id');

        $admins = Admins::where('id', '!=', $user_id)->get();

        return view('Admin.admins', compact('admins'));
    }

    public function createAdmin(Request $request)
    {
        try {

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'contact_number' => 'required|string|max:20',
                'email' => 'required|email|unique:admins,admin_email',
                'password' => 'required|string|min:8|confirmed', 
            ]);
    

            $admin = new Admins();
            $admin->admin_name = $validatedData['name'];
            $admin->admin_mobile = $validatedData['contact_number'];
            $admin->admin_email = $validatedData['email'];
            $admin->admin_password = bcrypt($validatedData['password']); 
            $admin->admin_profile = null; 
            $admin->save();
    
            return response()->json(['success' => true, 'message' => 'Admin created successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
    
    
    public function UpdateAdmin(Request $request)
    {

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

        return response()->json([
            'message' => 'Admin details updated successfully.',
            'admin_name' => $admin->admin_name,
        ]);    }

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
            $imgName = $request->file('admin_profile');
            $imageNameWithExtension =   $imgName->getClientOriginalName();
            $request->admin_profile->move(public_path('admin_profile/'), $imageNameWithExtension);

            
            $admin->admin_profile = $imageNameWithExtension;
            $admin->save();
        }

        return response()->json([
            'message' => 'Profile picture updated successfully.',
            'admin_profile' => $imageNameWithExtension  
        ]);    }

}
