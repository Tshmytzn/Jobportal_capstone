<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use Illuminate\Http\Request;
use App\Models\Jobseeker;
use App\Models\JobCategory;
use App\Models\Contact;
use App\Models\JobDetails;
use Illuminate\Support\Facades\Hash;

class JobseekerController extends Controller
{
    public function getJobseeker()
    {
        $user_id = session('user_id');

        $jobseeker = Jobseeker::where('js_id', $user_id)->first();

        return view('Jobseeker.profile', compact('jobseeker'));
    }

    public function getJobseeker2()
    {
        $user_id = session('user_id');

        $jobseeker = Jobseeker::where('js_id', $user_id)->first();

        return view('Jobseeker.settings', compact('jobseeker'));
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
            'js_contact' => 'required|regex:/^9[0-9]{9}$/|max:10'

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
            'contact' => 'required|regex:/^9[0-9]{9}$/|max:10',
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

    public function index()
    {
        $jobCategories = JobCategory::all();
        return view('Jobseeker.index', compact('jobCategories'));
    }

    public function jobs()
    {
        $jobCategories = JobCategory::all();
        return view('Jobseeker.jobs', compact('jobCategories'));
    }

    public function jobslist(Request $request)
    {
        $jobs = JobDetails::all();
        $jobCategories = JobCategory::all();

        return view('Jobseeker.jobslist', compact( 'jobs','jobCategories'));
    }

    public function filterJobs(Request $request)
    {
        $categoryId = $request->input('category');

        $jobs = JobDetails::where('category_id', $categoryId)->get();
        $jobCategories = JobCategory::all();

        return view('Jobseeker.jobslist', compact('jobs', 'jobCategories'));
    }


    public function agencylist(Request $request)
    {
        $agency = Agency::where ('status', 'approved')->get();

        return view('Jobseeker.agencies', compact( 'agency'));
    }

    public function SaveContact(Request $request)
    {
        $validatedData = $request->validate([
            'contact_name' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'contact_mesage' => 'required|string',
        ]);

        Contact::create([
            'name' => $validatedData['contact_name'],
            'email' => $validatedData['contact_email'],
            'message' => $validatedData['contact_mesage'],
        ]);

        return response()->json(['message' => 'Inquiry Successfully Submitted!'], 201);
    }

    public function searchfilterjobs(Request $request) {
        // Start a query on the JobDetails model
        $query = JobDetails::query();

        // Check if employment type is provided, and apply a filter if so
        if (!empty($request->employmenttype)) {
            $query->where('job_type', $request->employmenttype);
        }

        // Check if category is provided, and apply a filter if so
        if (!empty($request->category)) {
            $query->where('category_id', $request->category);
        }

        if (!empty($request->joblocation)) {
            $query->where('job_location', $request->joblocation);
        }
        // Execute the query and get the filtered job categories
        $jobcategory = $query->get();

        // Return the response as JSON with status 'success' and the job data
        return response()->json(['status' => 'success', 'data' => $jobcategory], 201);
    }

    public function Showjobdetails($id) {

        $job = JobDetails::find($id); // Assuming JobDetail is your model
        if ($job) {
            return response()->json($job);
        } else {
            return response()->json(['message' => 'Job not found'], 404);
        }
    }

    public function searchFilterAgencyJobs(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'agencyid' => 'required|integer|exists:job_details,agency_id',
        ]);

        // Fetch job details based on the agency_id
        $jobs = JobDetails::where('agency_id', $request->agencyid)->get();

        return response()->json($jobs);
    }

}
