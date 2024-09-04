<?php

use Illuminate\Support\Facades\Route;

// Admin Routes
Route::get('/Blank', function () { return view('Admin.blank'); })->name('blankpage');
Route::get('/Admin/Login', function () { return view('Admin.Login'); })->name('AdminLogin');
Route::get('/Admin/Dashboard', function () { return view('Admin.index'); })->name('dashboard');
Route::get('/Verification/Request', function () { return view('Admin.verifiedrequests'); })->name('verifiedrequests');
Route::get('/Verified/Agencies', function () { return view('Admin.verifiedagencies'); })->name('verifiedagencies');
Route::get('/Unverified/Agencies', function () { return view('Admin.unverifiedagencies'); })->name('unverifiedagencies');
Route::get('/Admin/Jobseeker', function () { return view('Admin.jobseeker'); })->name('jobseeker');
Route::get('/Admin/Notification', function () { return view('Admin.notif'); })->name('adminnotif');
Route::get('/Admin/Settings', function () { return view('Admin.settings'); })->name('adminsettings');


// Agency Routes
Route::get('/Blank1', function () { return view('Agency.blank'); })->name('blankpage');
Route::get('/Agency/Dashboard', function () { return view('Agency.index'); })->name('agencydashboard');
Route::get('/Agency/Notification', function () { return view('Agency.notif'); })->name('agencynotif');
Route::get('/Agency/Settings', function () { return view('Agency.settings'); })->name('agencysettings');
Route::get('/Agency/JobPosting', function () { return view('Agency.jobposting'); })->name('agencyjobposting');
Route::get('/Agency/SkillAssessment', function () { return view('Agency.assessed'); })->name('agencyskillassess');
Route::get('/Agency/SubmittedApplications', function () { return view('Agency.submittedapplications'); })->name('submittedapplications');
Route::get('/Agency/SASCompleted', function () { return view('Agency.sascompleted'); })->name('sascompleted');
Route::get('/Agency/ScreenedApplicants', function () { return view('Agency.screenedapplicants'); })->name('screenedapplicants');
Route::get('/Agency/ApprovedApplications', function () { return view('Agency.approvedapplications'); })->name('approvedapplications');

// Jobseeker Routes
Route::get('/Blank2', function () { return view('Jobseeker.blank'); })->name('blankpage');
Route::get('/', function () { return view('Jobseeker.index'); })->name('homepage');
Route::get('/About', function () { return view('Jobseeker.about'); })->name('about');
Route::get('/SignUp', function () { return view('Jobseeker.signup'); })->name('signup');
Route::get('/AgencySignUp', function () { return view('Jobseeker.agencysignup'); })->name('agencysignup');
Route::get('/Login', function () { return view('Jobseeker.Login'); })->name('login');
Route::get('/AgencyLogin', function () { return view('Jobseeker.agencylogin'); })->name('agencylogin');
Route::get('/404', function () { return view('Jobseeker.404'); })->name('404');


