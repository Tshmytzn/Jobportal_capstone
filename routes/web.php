<?php

use App\Http\Controllers\AgencyController;
use App\Http\Controllers\JobseekerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCRUDController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\AdminChartsController;

// Admin Protected Routes
Route::middleware([AuthMiddleware::class])->group(function () {

//Admin view routes
Route::get('/Blank', function () { return view('Admin.blank'); })->name('blankpage1');
Route::get('/Admin/Dashboard', function () { return view('Admin.index'); })->name('dashboard');
Route::get('/Verification/Request', function () { return view('Admin.verifiedrequests'); })->name('verifiedrequests');
Route::get('/Verified/Agencies', function () { return view('Admin.verifiedagencies'); })->name('verifiedagencies');
Route::get('/Unverified/Agencies', function () { return view('Admin.unverifiedagencies'); })->name('unverifiedagencies');
Route::get('/Admin/SkillAssessment', function () { return view('Admin.SkillAssessment'); })->name('adminskillassessment');
Route::get('/Admin/Jobseeker', function () { return view('Admin.jobseeker'); })->name('jobseeker');
Route::get('/Admin/JobCategory', function () { return view('Admin.jobcategory'); })->name('jobcategory');
Route::get('/Admin/Administrators', function () { return view('Admin.admins'); })->name('administrators');
Route::get('/Admin/CustomerInquiries', function () { return view('Admin.customerinquiries'); })->name('customerinquiries');

//dashboard chart
Route::get('/api/registrations', [AdminChartsController::class, 'getMonthlyRegistrations']);

//Admin view
Route::get('/Admin/Settings', [AdminController::class, 'showAdminDetails'])->name('adminsettings');
Route::get('/Admin/AddAdministrators', [AdminController::class, 'showAllAdmins'])->name('administrators');
Route::post('/Admin/EditAdministrators', [AdminController::class, 'UpdateAdmin'])->name('UpdateAdmin');
Route::delete('/Admin/DeleteAdministrator', [AdminController::class, 'DeleteAdmin'])->name('DeleteAdmin');

//Jobseekers Admin view
Route::get('/Job/Seekers', [AdminCRUDController::class, 'getJobseekers'])->name('jobseekers');

// Contacts View
Route::get('/Contact/Inquiries', [AdminCRUDController::class, 'getContacts'])->name('getContacts');

//Verification Request
Route::get('/verification-requests', [AdminCRUDController::class, 'getVerificationRequests'])->name('getpendingdata');

//Verified Agencies
Route::get('/verified-agencies', [AdminCRUDController::class, 'getVerifiedAgencies'])->name('getVerifiedAgencies');

//Unverified Agencies
Route::get('/unverified-agencies', [AdminCRUDController::class, 'getUnverifiedAgencies'])->name('getUnverifiedAgencies');

//Show Agency
Route::get('/agency/{id}', [AdminCRUDController::class, 'showagency'])->name('getagencyid');

//Approve Agency
Route::post('/approveAgency', [AdminCRUDController::class, 'approveAgency'])->name('approveAgency');

//Reject Agency
Route::post('/rejectAgency', [AdminCRUDController::class, 'rejectAgency'])->name('rejectAgency');

//Job Categories Admin View
Route::get('/Job/Categories', [AdminCRUDController::class, 'getJobCategories'])->name('jobcategories');

//Get ADmin data to populate datatable
Route::get('/Admin/Accounts', [AdminCRUDController::class, 'getAdminData'])->name('getAdminData');
Route::get('/admin/get/{id}', action: [AdminCRUDController::class, 'getAdmin']);
Route::delete('/Admin/Delete/{id}', [AdminCRUDController::class, 'deleteAdminData'])->name('deleteAdminData');


//Admin Profile Settings
Route::post('/Admin/UpdateSettings', [AdminController::class, 'UpdateAdmin'])->name('UpdateAdmin');
Route::post('/Admin/UpdatePassword', [AdminController::class, 'UpdateAdminPassword'])->name('UpdateAdminPassword');
Route::post('/Admin/ProfilePic', [AdminController::class, 'UpdateAdminProfilePic'])->name('UpdateAdminProfilePic');

//Job Category admin controller routes
Route::post('/Admin/CreateJobCategory', [AdminCRUDController::class, 'CreateJobCategory'])->name('CreateJobCategory');
Route::delete('/Job/Categories/{id}', [AdminCRUDController::class, 'deleteJobCategory'])->name('DeleteJobCategory');

//Administrator post controller routes
Route::post('/Admin/Create', [AdminController::class, 'createAdmin'])->name('createAdmin');
});

//Admin Login and Logouts
Route::post('/LoginAdmin', [AuthController::class, 'LoginAdmin'])->name('LoginAdmin');
Route::post('/logoutAdmin', [AuthController::class, 'logoutAdmin'])->name('logoutAdmin');
Route::get('/Admin/Login', function () { return view('Admin.Login'); })->name('AdminLogin');

//update job categories
Route::get('/admin/getjobcategory/{id}', action: [AdminCRUDController::class, 'getJobcategory']);
// Route::post('/admin/updatejobcategory', [AdminCRUDController::class, 'updatejobcategory'])->name('updatejobcategory');
Route::put('/job-categories/update/{id}', [AdminCRUDController::class, 'updatejobcategory'])->name('updatejobcategory');

//ShowAgency Details in AgencySettings
Route::get('/Agency/Settings', [AgencyController::class, 'showAgencyDetails'])->name('agencysettings');

//Update Profile
Route::post('/Agency/ProfilePic', [AgencyController::class, 'UpdateAgencyProfilePic'])->name('UpdateAgencyProfilePic');

//Agency Login and Signup
Route::post('/AgencyRegister', [AgencyController::class, 'RegisterAgency'])->name('RegisterAgency');
Route::post('/LoginAgency', [AuthController::class, 'LoginAgency'])->name('LoginAgency');
Route::post('/UpdateAgency', [AgencyController::class, 'UpdateAgency'])->name('UpdateAgency');

//Agency Job details creation done, update $ delete: pending
Route::post('/Agency', [AgencyController::class, 'Agency'])->name('Agency');

//Agency update password: pending
Route::post('/UpdatePassword', [AgencyController::class, 'updatePassword'])->name('UpdatePassword');

// Agency Protected routes
Route::get('/Agency/Dashboard', [AuthController::class, 'dashboard'])->name('agencydashboard');
Route::get('/Agency/Notification', [AuthController::class, 'notification'])->name('agencynotif');
// Route::get('/Agency/Settings', [AuthController::class, 'settings'])->name('agencysettings');
Route::get('/Agency/JobPosting', [AuthController::class, 'jobposting'])->name('agencyjobposting');
Route::get('/Agency/SkillAssessment', [AuthController::class, 'skillAssessment'])->name('agencyskillassess');
Route::get('/Agency/SubmittedApplications', [AuthController::class, 'submittedApplications'])->name('submittedapplications');
Route::get('/Agency/SASCompleted', [AuthController::class, 'sasCompleted'])->name('sascompleted');
Route::get('/Agency/ScreenedApplicants', [AuthController::class, 'screenedApplicants'])->name('screenedapplicants');
Route::get('/Agency/ApprovedApplications', [AuthController::class, 'approvedApplications'])->name('approvedapplications');
Route::post('/logoutAgency', [AuthController::class, 'logoutAgency'])->name('logoutAgency');

// Jobseeker Routes
Route::get('/Blank2', function () { return view('Jobseeker.blank'); })->name('blankpage');
Route::get('/', [JobseekerController::class, 'index'])->name('homepage');
Route::get('/Jobs', [JobseekerController::class, 'jobs'])->name('jobs');
Route::get('/AgencyReview', function () { return view('Jobseeker.accountReview');})->name('accountReview');

Route::get('/About', function () { return view('Jobseeker.about'); })->name('about');
Route::get('/SignUp', function () { return view('Jobseeker.signup'); })->name('signup');
Route::get('/AgencySignUp', function () { return view('Jobseeker.agencysignup'); })->name('agencysignup');
Route::get('/AgencyLogin', function () { return view('Jobseeker.agencylogin'); })->name('agencylogin');
Route::get('/Login', function () { return view('Jobseeker.Login'); })->name('login');
// Route::get('/Jobs', function () { return view('Jobseeker.jobs'); })->name('jobs');

//Show Jobs in Jobslist
Route::get('/jobslist', [JobseekerController::class, 'jobslist'])->name('jobslist');

// jobdetailsroute
Route::get('/jobdetails', function () { return view('Jobseeker.jobdetails'); })->name('jobdetails');

//show jobdetails
Route::get('/Showjobdetails/{id}', [JobseekerController::class, 'Showjobdetails']);

Route::get('/AgencyJobs', function () { return view('Jobseeker.agencyjobs'); })->name('agencyjobs');

//filter jobs by agency
Route::get('/searchfilteragencyjobs', [JobseekerController::class, 'searchFilterAgencyJobs'])->name('searchfilteragencyjobs');

//filter jobs
Route::post('/searchfilterjobs', [JobseekerController::class, 'searchfilterjobs'])->name('searchfilterjobs');


//filter jobs by category_id
Route::get('/jobs/filter', action: [JobseekerController::class, 'filterJobs'])->name('filterJobs');

Route::get('/ContactUs', function () { return view('Jobseeker.contactus'); })->name('contactus');

//Show Agencylist
Route::get('/Agency', [JobseekerController::class, 'agencylist'])->name('agencies');
// Route::get('/Agency', function () { return view('Jobseeker.agencies'); })->name('agencies');


Route::get('/AgencyFeedback', function () { return view('Jobseeker.agencyfeedback'); })->name('agencyfeedback');
Route::get('/ContactUs', function () { return view('Jobseeker.contactus'); })->name('contactus');
Route::get('/404', function () { return view('Jobseeker.404'); })->name('404');
Route::get('/Profile', function () { return view('Jobseeker.profile'); })->name('profile');
// Route::get('/Settings', function () { return view('Jobseeker.settings'); })->name('settings');
Route::get('/PESORegistrationForm', function () { return view('Jobseeker.pesoform'); })->name('pesoform');
Route::get('/FAQS', function () { return view('Jobseeker.faqs'); })->name('faqs');


// Jobseeker Page Controllers
Route::post('/', [JobseekerController::class, 'create'])->name('jobseekersCreate');
Route::post('/LoginJobseeker', [AuthController::class, 'LoginJobseeker'])->name('LoginJobseeker');
Route::post('/LogoutJobseeker', [AuthController::class, 'LogoutJobseeker'])->name('LogoutJobseeker');
Route::get('/Profile', [JobseekerController::class, 'getJobseeker'])->name('profile');
Route::get('/Settings', [JobseekerController::class, 'getJobseeker2'])->name('settings');

Route::post('/Update', [JobseekerController::class, 'updateJobseeker'])->name('updateJobseeker');
Route::post('/updateJsPassword', [JobseekerController::class, 'updateJsPassword'])->name('updateJsPassword');
Route::post('/uploadResume', [JobseekerController::class, 'uploadResume'])->name('uploadResume');

// Jobcategory Display
// Route::get('/job-categories', [JobseekerController::class, 'index']);

Route::post('/contacts', [JobseekerController::class, 'SaveContact'])->name('SaveContact');
