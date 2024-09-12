<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{

    // AGENCY AUTHENTICATION
    protected function checkAuth()
    {
        if (!Session::has(key: 'agency_id')) {
            return redirect()->route(route: 'agencylogin')->with('error', 'Please login first.');
        }
    }

    // AGENCY LOGIN
    public function LoginAgency(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = DB::table('agencies')
            ->where('email_address', $request->input('email'))
            ->first();

        if ($user && Hash::check($request->input('password'), $user->password)) {
            Auth::loginUsingId($user->id); 

            session([
                'agency_id' => $user->id, 
                'agency_name' => $user->agency_name, 
            ]);

            return response()->json(['message' => 'Login successful!', 'status' => 'success']);
        } else {
            return response()->json(['message' => 'Invalid credentials.', 'status' => 'error']);
        }
    }

    // AGENCY LOGOUT
    public function logoutAgency(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('agencylogin'); 
    }

    // AGENCY PAGE AUTHENTICATION
    public function dashboard(Request $request)
    {
        $response = $this->checkAuth();
        if ($response instanceof \Illuminate\Http\RedirectResponse) {
            return $response;
        }
        $userId = Session::get('agency_id');
        $user = DB::table('agencies')->where('id', $userId)->first();

        return view('Agency.index', compact('user'));
    }

    public function notification(Request $request)
    {
        $response = $this->checkAuth();
        if ($response instanceof \Illuminate\Http\RedirectResponse) {
            return $response;
        }
        $userId = Session::get('agency_id');
        $user = DB::table('agencies')->where('id', $userId)->first();

        return view('Agency.notif', compact('user'));
    }

    public function settings(Request $request)
    {
        $response = $this->checkAuth();
        if ($response instanceof \Illuminate\Http\RedirectResponse) {
            return $response;
        }
        $userId = Session::get('agency_id');
        $user = DB::table('agencies')->where('id', $userId)->first();

        return view('Agency.settings', compact('user'));
    }

    public function jobposting(Request $request)
    {
        $response = $this->checkAuth();
        if ($response instanceof \Illuminate\Http\RedirectResponse) {
            return $response;
        }
        $userId = Session::get('agency_id');
        $user = DB::table('agencies')->where('id', $userId)->first();

        return view('Agency.jobposting', compact('user'));
    }

    public function skillAssessment(Request $request)
    {
        $response = $this->checkAuth();
        if ($response instanceof \Illuminate\Http\RedirectResponse) {
            return $response;
        }

        $userId = Session::get('agency_id');
        $user = DB::table('agencies')->where('id', $userId)->first();

        return view('Agency.assessed', compact('user'));
    }

    public function submittedApplications(Request $request)
    {
        $response = $this->checkAuth();
        if ($response instanceof \Illuminate\Http\RedirectResponse) {
            return $response;
        }
        $userId = Session::get('agency_id');
        $user = DB::table('agencies')->where('id', $userId)->first();

        return view('Agency.submittedapplications', compact('user'));
    }

    public function sasCompleted(Request $request)
    {
        $response = $this->checkAuth();
        if ($response instanceof \Illuminate\Http\RedirectResponse) {
            return $response;
        }
        $userId = Session::get('agency_id');
        $user = DB::table('agencies')->where('id', $userId)->first();

        return view('Agency.sascompleted', compact('user'));
    }

    public function screenedApplicants(Request $request)
    {
        $response = $this->checkAuth();
        if ($response instanceof \Illuminate\Http\RedirectResponse) {
            return $response;
        }

        $userId = Session::get('agency_id');
        $user = DB::table('agencies')->where('id', $userId)->first();

        return view('Agency.screenedapplicants', compact('user'));
    }

    public function approvedApplications(Request $request)
    {
        $response = $this->checkAuth();
        if ($response instanceof \Illuminate\Http\RedirectResponse) {
            return $response;
        }

        $userId = Session::get('agency_id');
        $user = DB::table('agencies')->where('id', $userId)->first();

        return view('Agency.approvedapplications', compact('user'));
    }

    // JOBSEEKER LOGIN
    public function LoginJobseeker(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = DB::table('jobseeker_details')
            ->where('js_email', $request->input('email'))
            ->first();

        if ($user && Hash::check($request->input('password'), $user->js_password)) {
            Auth::loginUsingId($user->js_id); 

            session([
                'user_id' => $user->js_id, 
                'user_name' => $user->js_firstname, 
            ]);

            return response()->json(['message' => 'Login successful!', 'status' => 'success']);
        } else {
            return response()->json(['message' => 'Invalid credentials.', 'status' => 'error']);
        }
    }

    //JOBSEEKER LOGOUT
    public function LogoutJobseeker(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('homepage'); 
    }

    // ADMIN LOGIN
    public function LoginAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = DB::table('admins')
            ->where('admin_email', $request->input('email'))
            ->first();

        if ($user && Hash::check($request->input('password'), $user->admin_password)) {
            Auth::loginUsingId($user->id); 

            session([
                'admin_id' => $user->id, 
                'admin_name' => $user->admin_name, 
            ]);

            return response()->json(['message' => 'Login successful!', 'status' => 'success']);
        } else {
            return response()->json(['message' => 'Invalid credentials.', 'status' => 'error']);
        }
    }

    //ADMIN LOGOUT
    public function logoutAdmin(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('AdminLogin'); 
    }


}
