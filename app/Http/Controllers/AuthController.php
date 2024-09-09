<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{

    protected function checkAuth()
    {
        // Check if the session has user_id
        if (!Session::has('user_id')) {
            // Redirect to login page with an error message if not authenticated
            return redirect()->route('agencylogin')->with('error', 'Please login first.');
        }
    }

    public function LoginAgency(Request $request)
    {
        // Validate the login data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Fetch user from the agencies table
        $user = DB::table('agencies')
            ->where('email_address', $request->input('email'))
            ->first();

        // Check if user exists and passwords match
        if ($user && Hash::check($request->input('password'), $user->password)) {
            // Authentication passed
            Auth::loginUsingId($user->id); // Log the user in using their ID

            // Store user data in session
            session([
                'user_id' => $user->id, 
                'user_name' => $user->agency_name, 
            ]);

            return response()->json(['message' => 'Login successful!', 'status' => 'success']);
        } else {
            // Authentication failed
            return response()->json(['message' => 'Invalid credentials.', 'status' => 'error']);
        }
    }

    public function logoutAgency(Request $request)
    {
        // Log the user out
        Auth::logout();

        // Clear session data
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('agencylogin'); 
    }

    public function dashboard(Request $request)
    {
        // Check if the user is authenticated
        $response = $this->checkAuth();
        if ($response instanceof \Illuminate\Http\RedirectResponse) {
            return $response;
        }
        return view('Agency.index');
    }

    public function notification(Request $request)
    {
        // Check if the user is authenticated
        $response = $this->checkAuth();
        if ($response instanceof \Illuminate\Http\RedirectResponse) {
            return $response;
        }
        return view('Agency.notif');
    }

    public function settings(Request $request)
    {
        // Check if the user is authenticated
        $response = $this->checkAuth();
        if ($response instanceof \Illuminate\Http\RedirectResponse) {
            return $response;
        }
        return view('Agency.settings');
    }

    public function jobposting(Request $request)
    {
        // Check if the user is authenticated
        $response = $this->checkAuth();
        if ($response instanceof \Illuminate\Http\RedirectResponse) {
            return $response;
        }
        return view('Agency.jobposting');
    }

    public function skillAssessment(Request $request)
    {
        // Check if the user is authenticated
        $response = $this->checkAuth();
        if ($response instanceof \Illuminate\Http\RedirectResponse) {
            return $response;
        }
        return view('Agency.assessed');
    }

    public function submittedApplications(Request $request)
    {
        // Check if the user is authenticated
        $response = $this->checkAuth();
        if ($response instanceof \Illuminate\Http\RedirectResponse) {
            return $response;
        }
        return view('Agency.submittedapplications');
    }

    public function sasCompleted(Request $request)
    {
        // Check if the user is authenticated
        $response = $this->checkAuth();
        if ($response instanceof \Illuminate\Http\RedirectResponse) {
            return $response;
        }
        return view('Agency.sascompleted');
    }

    public function screenedApplicants(Request $request)
    {
        // Check if the user is authenticated
        $response = $this->checkAuth();
        if ($response instanceof \Illuminate\Http\RedirectResponse) {
            return $response;
        }
        return view('Agency.screenedapplicants');
    }

    public function approvedApplications(Request $request)
    {
        // Check if the user is authenticated
        $response = $this->checkAuth();
        if ($response instanceof \Illuminate\Http\RedirectResponse) {
            return $response;
        }
        return view('Agency.approvedapplications');
    }

    // JOBSEEKER Authentication

    public function LoginJobseeker(Request $request)
    {
        // Validate the login data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Fetch user from the jobseeker table
        $user = DB::table('jobseeker_details')
            ->where('js_email', $request->input('email'))
            ->first();

        // Check if user exists and passwords match
        if ($user && Hash::check($request->input('password'), $user->js_password)) {
            // Authentication passed
            Auth::loginUsingId($user->js_id); // Log the user in using their ID

            // Store user data in session
            session([
                'user_id' => $user->js_id, 
                'user_name' => $user->js_firstname, 
            ]);

            return response()->json(['message' => 'Login successful!', 'status' => 'success']);
        } else {
            // Authentication failed
            return response()->json(['message' => 'Invalid credentials.', 'status' => 'error']);
        }
    }

    // ADMIN AUTHENTICATION
    public function LoginAdmin(Request $request)
    {
        // Validate the login data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Fetch user from the jobseeker table
        $user = DB::table('admins')
            ->where('admin_email', $request->input('email'))
            ->first();

        // Check if user exists and passwords match
        if ($user && Hash::check($request->input('password'), $user->admin_password)) {
            // Authentication passed
            Auth::loginUsingId($user->id); // Log the user in using their ID

            // Store user data in session
            session([
                'user_id' => $user->id, 
                'user_name' => $user->admin_name, 
            ]);

            return response()->json(['message' => 'Login successful!', 'status' => 'success']);
        } else {
            // Authentication failed
            return response()->json(['message' => 'Invalid credentials.', 'status' => 'error']);
        }
    }

    
    public function logoutAdmin(Request $request)
    {
        // Log the user out
        Auth::logout();

        // Clear session data
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('AdminLogin'); 
    }

    public function admindashboard(Request $request)
    {
        // Check if the user is authenticated
        $response = $this->checkAuth();
        if ($response instanceof \Illuminate\Http\RedirectResponse) {
            return $response;
        }
        return view('admindashboard');
    }
}
