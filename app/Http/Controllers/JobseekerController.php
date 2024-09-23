<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobseeker;
use App\Models\JobCategory;
use Illuminate\Support\Facades\Hash;

class JobseekerController extends Controller
{
    public function getJobseeker()
    {
        $user_id = session('user_id');

        $jobseeker = Jobseeker::where('js_id', $user_id)->first();

        return view('Jobseeker.profile', compact('jobseeker'));
    } 

    public function updateJobseeker(Request $request)
    {
        // Validate and update jobseeker data here
        $validated = $request->validate([
            'js_firstname' => 'required|string|max:255',
            'js_midname' => 'nullable|string|max:255',
            'js_lastname' => 'required|string|max:255',
            'js_suffix' => 'nullable|string|max:255',
            'js_gender' => 'required|string',
            'js_address' => 'required|string',
            'js_email' => 'required|email',
            'js_contact' => 'required|string',
        ]);
    
        $jobseeker = Jobseeker::findOrFail($request->id);
        $jobseeker->update($validated);
    
        return response()->json(['success' => true, 'message' => 'Your information has been updated successfully.']);
    }
    

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
    public function updateJsPassword(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'currentPassword' => ['required', 'string'],
            'newPassword' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Get the logged-in jobseeker
        $jobseeker = Jobseeker::find($request->input('id'));

        if (!$jobseeker) {
            return response()->json(['error' => 'Jobseeker not found'], 404);
        }

        // Check if current password is correct
        if (!Hash::check($request->input('currentPassword'), $jobseeker->js_password)) {
            return response()->json(['error' => 'Current password is incorrect'], 401);
        }

        // Update the password
        $jobseeker->js_password = Hash::make($request->input('newPassword'));
        $jobseeker->save();

        return response()->json(['success' => 'Password updated successfully']);
    }

    public function uploadResume(Request $request)
    {
        // Validate the file input
        $request->validate([
            'resume' => 'required|mimes:pdf,doc,docx|max:10240',
        ]);

        // Handle the file upload
        if ($request->hasFile('resume')) {
            $file = $request->file('resume');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('jobseekerfiles', $filename, 'public'); // Store in storage/app/public/resumes

            return response()->json(['success' => 'File uploaded successfully']);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }

    public function index()
    {
        $jobCategories = JobCategory::all(); 
        return view('Jobseeker.index', compact('jobCategories'));
    }
    
}
