<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobseeker;
use Illuminate\Support\Facades\Hash;

class JobseekerController extends Controller
{
    public function create(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'firstname' => 'required|string|max:50',
            'midname' => 'nullable|string|max:30',
            'lastname' => 'required|string|max:30',
            'suffix' => 'nullable|string|max:10',
            'gender' => 'required|string|in:Male,Female,Other',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:100|unique:jobseeker_details,js_email',
            'contact' => 'required|string|max:15',
            'password' => 'required|string|min:8|confirmed', // Confirm the password
        ]);

        // Create a new Jobseeker instance and fill it with form data
        $jobseeker = new Jobseeker();
        $jobseeker->js_firstname = $request->input('firstname');
        $jobseeker->js_middlename = $request->input('midname');
        $jobseeker->js_lastname = $request->input('lastname');
        $jobseeker->js_suffix = $request->input('suffix');
        $jobseeker->js_gender = $request->input('gender');
        $jobseeker->js_address = $request->input('address');
        $jobseeker->js_email = $request->input('email');
        $jobseeker->js_contactnumber = $request->input('contact'); // Ensure this is correct

        // Hash the password before saving
        $jobseeker->js_password = Hash::make($request->input('password'));

        // Save the jobseeker details into the database
        $jobseeker->save();

        // Return a JSON response for the AJAX request
        return response()->json(['message' => 'Account created successfully!']);
    }
}
