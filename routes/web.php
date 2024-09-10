<?php

use App\Http\Controllers\AgencyController;
use App\Http\Controllers\JobseekerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AuthMiddleware;

// Admin Routes
Route::middleware([AuthMiddleware::class])->group(function () {

Route::get('/Blank', function () { return view('Admin.blank'); })->name('blankpage1');
Route::get('/Admin/Dashboard', function () { return view('Admin.index'); })->name('dashboard');
Route::get('/Verification/Request', function () { return view('Admin.verifiedrequests'); })->name('verifiedrequests');
Route::get('/Verified/Agencies', function () { return view('Admin.verifiedagencies'); })->name('verifiedagencies');
Route::get('/Unverified/Agencies', function () { return view('Admin.unverifiedagencies'); })->name('unverifiedagencies');
Route::get('/Admin/Jobseeker', function () { return view('Admin.jobseeker'); })->name('jobseeker');
Route::get('/Admin/Administrators', function () { return view('Admin.admins'); })->name('administrators');
Route::get('/Admin/SkillAssessment', function () { return view('Admin.SkillAssessment'); })->name('adminskillassessment');
Route::get('/Admin/Settings', function () { return view('Admin.settings'); })->name('adminsettings');

});

Route::post('/LoginAdmin', [AuthController::class, 'LoginAdmin'])->name('LoginAdmin');
Route::post('/logoutAdmin', [AuthController::class, 'logoutAdmin'])->name('logoutAdmin');
Route::get('/Admin/Login', function () { return view('Admin.Login'); })->name('AdminLogin');


// Agency Routes
// Route::get('/Blank1', function () { return view('Agency.blank'); })->name('blankpage');
// Route::get('/Agency/Dashboard', function () { return view('Agency.index'); })->name('agencydashboard');
// Route::get('/Agency/Notification', function () { return view('Agency.notif'); })->name('agencynotif');
// Route::get('/Agency/Settings', function () { return view('Agency.settings'); })->name('agencysettings');
// Route::get('/Agency/JobPosting', function () { return view('Agency.jobposting'); })->name('agencyjobposting');
// Route::get('/Agency/SkillAssessment', function () { return view('Agency.assessed'); })->name('agencyskillassess');
// Route::get('/Agency/SubmittedApplications', function () { return view('Agency.submittedapplications'); })->name('submittedapplications');
// Route::get('/Agency/SASCompleted', function () { return view('Agency.sascompleted'); })->name('sascompleted');
// Route::get('/Agency/ScreenedApplicants', function () { return view('Agency.screenedapplicants'); })->name('screenedapplicants');
// Route::get('/Agency/ApprovedApplications', function () { return view('Agency.approvedapplications'); })->name('approvedapplications');

// Agency Protected routes
Route::get('/Agency/Dashboard', [AuthController::class, 'dashboard'])->name('agencydashboard');
Route::get('/Agency/Notification', [AuthController::class, 'notification'])->name('agencynotif');
Route::get('/Agency/Settings', [AuthController::class, 'settings'])->name('agencysettings');
Route::get('/Agency/JobPosting', [AuthController::class, 'jobposting'])->name('agencyjobposting');
Route::get('/Agency/SkillAssessment', [AuthController::class, 'skillAssessment'])->name('agencyskillassess');
Route::get('/Agency/SubmittedApplications', [AuthController::class, 'submittedApplications'])->name('submittedapplications');
Route::get('/Agency/SASCompleted', [AuthController::class, 'sasCompleted'])->name('sascompleted');
Route::get('/Agency/ScreenedApplicants', [AuthController::class, 'screenedApplicants'])->name('screenedapplicants');
Route::get('/Agency/ApprovedApplications', [AuthController::class, 'approvedApplications'])->name('approvedapplications');
Route::post('/logoutAgency', [AuthController::class, 'logoutAgency'])->name('logoutAgency');


// Jobseeker Routes
Route::get('/Blank2', function () { return view('Jobseeker.blank'); })->name('blankpage');
Route::get('/', function () { return view('Jobseeker.index'); })->name('homepage');
Route::get('/About', function () { return view('Jobseeker.about'); })->name('about');
Route::get('/SignUp', function () { return view('Jobseeker.signup'); })->name('signup');
Route::get('/AgencySignUp', function () { return view('Jobseeker.agencysignup'); })->name('agencysignup');
Route::get('/AgencyLogin', function () { return view('Jobseeker.agencylogin'); })->name('agencylogin');
Route::get('/Login', function () { return view('Jobseeker.Login'); })->name('login');
Route::get('/Jobs', function () { return view('Jobseeker.jobs'); })->name('jobs');
Route::get('/JobsList', function () { return view('Jobseeker.jobslist'); })->name('jobslist');
Route::get('/ContactUs', function () { return view('Jobseeker.contactus'); })->name('contactus');
Route::get('/Agency', function () { return view('Jobseeker.agencies'); })->name('agencies');
Route::get('/AgencyFeedback', function () { return view('Jobseeker.agencyfeedback'); })->name('agencyfeedback');
Route::get('/ContactUs', function () { return view('Jobseeker.contactus'); })->name('contactus');
Route::get('/404', function () { return view('Jobseeker.404'); })->name('404');

// Jobseeker Page Controllers
Route::post('/', [JobseekerController::class, 'create'])->name('jobseekersCreate');
Route::post('/LoginJobseeker', [AuthController::class, 'LoginJobseeker'])->name('LoginJobseeker');

//Agency Login and Signup
Route::post('/AgencyRegister', [AgencyController::class, 'RegisterAgency'])->name('RegisterAgency');
Route::post('/LoginAgency', [AuthController::class, 'LoginAgency'])->name('LoginAgency');
Route::post('/UpdateAgency', [AgencyController::class, 'UpdateAgency'])->name('UpdateAgency');

// agency update password pending
Route::post('/UpdatePassword', [AgencyController::class, 'updatePassword'])->name('UpdatePassword');
