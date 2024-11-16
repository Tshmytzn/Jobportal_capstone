<?php

use App\Http\Controllers\AgencyController;
use App\Http\Controllers\JobseekerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCRUDController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\AdminChartsController;
use App\Http\Controllers\JobseekerPesoController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\SkillAssessmentController;
use App\Http\Controllers\AssessmentResultsController;
use App\Http\Controllers\JobQuestion;
use App\Http\Controllers\JobQuestionController;
use App\Http\Controllers\JobListingController;
use App\Http\Controllers\UserFeedbacksController;
use App\Http\Controllers\ReportsController;



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
Route::get('/Admin/Administrators', function () { return view('Admin.admins'); })->name('adminadministrators');

Route::get('/Admin/SystemAdministrators', function () { return view('Admin.systemadmin'); })->name('systemadministrators');

Route::get('/Admin/CustomerInquiries', function () { return view('Admin.customerinquiries'); })->name('customerinquiries');
Route::get('/Admin/GeneralSkills', function () { return view('Admin.generalskills'); })->name('generalskills');
Route::get('/Admin/PesoForms', function () { return view('Admin.pesoforms'); })->name('adminpesoforms');
Route::get('/Admin/Feedbacks', function () { return view('Admin.feedback'); })->name('Feedbacks');

//Job Post Management
Route::get('/Admin/Jobpost', function () { return view('Admin.jobpostrequest'); })->name('jobpostrequest');
Route::get('/Admin/JobpostApproved', function () { return view('Admin.jobpostapproved'); })->name('jobpostapproved');
Route::get('/Admin/JobpostDeclined', function () { return view('Admin.jobpostdeclined'); })->name('jobpostdeclined');

//create general skill assessment
Route::get('/fetch-job-categories', [SkillAssessmentController::class, 'getJobCategories']);

//get jobseeker and agency feedback
Route::get('/jobseeker-feedbacks', [UserFeedbacksController::class, 'getJobseekerFeedbacks'])->name('getJobseekerFeedbacks');
Route::get('/agency-feedbacks', [UserFeedbacksController::class, 'getAgencyFeedbacks'])->name('getAgencyFeedbacks');

Route::post('/assessments', [SkillAssessmentController::class, 'store'])->name('assessments.store');

//display general skill assessment
Route::get('/viewassessments', [SkillAssessmentController::class, 'fetchAssessments']);

//delete general skill assessments
Route::delete('/api/assessments/{id}', [SkillAssessmentController::class, 'destroy'])->name('assessments.destroy');

// Route to fetch a single assessment by ID
Route::get('/showassessments/{id}', [SkillAssessmentController::class, 'show']);

// Route to update an assessment by ID
// Route::put('/updateassessments/{id}', [SkillAssessmentController::class, 'update']);

// Route to set answers
Route::post('/saveAssessment', [SkillAssessmentController::class, 'saveAssessment'])->name('saveAssessment');

//dashboard chart
Route::get('/api/registrations', [AdminChartsController::class, 'getRegistrationsData']);

//Admin view
Route::get('/Admin/Settings', [AdminController::class, 'showAdminDetails'])->name('adminsettings');
Route::get('/Admin/AddAdministrators', [AdminController::class, 'showAllAdmins'])->name('administrators');
Route::post('/Admin/EditAdministrators', [AdminController::class, 'UpdateAdmin'])->name('UpdateAdmin');
Route::delete('/Admin/DeleteAdministrator', [AdminController::class, 'DeleteAdmin'])->name('DeleteAdmin');
//Jobseekers Admin view
Route::get('/Job/Seekers', [AdminCRUDController::class, 'getJobseekers'])->name('jobseekers');

Route::get('/Job/PesoForms', [AdminCRUDController::class, 'getPesoForms'])->name('getPesoForms');

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
//Global Skills Admin View
Route::get('/Job/Skills', [AdminCRUDController::class, 'getGeneralSkills'])->name('getGeneralSkills');
//Global Skills Admin Create
Route::post('/Job/CreateSkills', [AdminController::class, 'creategeneralskill'])->name('creategeneralskill');
//Global Skills Admin Update
Route::post('/Job/UpdateSkills', [AdminController::class, 'updategeneralskills'])->name('updategeneralskills');
//Global Skills Admin View
Route::get('/Job/ViewSkills/{id}', [AdminController::class, 'getSkill']);
//Global Skills Admin Delete
Route::delete('/Job/DeleteSkills/{id}', [AdminController::class, 'deleteSkill'])->name('deleteSkill');
//Get ADmin data to populate datatable
Route::get('/Admin/Accounts', [AdminCRUDController::class, 'getAdminData'])->name('getAdminData');

//System Administrator
Route::get('/Admin/System', [AdminCRUDController::class, 'getAdminData2'])->name('getAdminData2');

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
Route::post('/Admin/CreateSystemAdmin', [AdminCRUDController::class, 'createAdmin2'])->name('createAdmin2');

//get agency compliance and reports
Route::get('/Admin/getcompliance', [ReportsController::class, 'getcompliance'])->name('getcompliance');
Route::get('/Admin/getreports', [ReportsController::class, 'getreports'])->name('getreports');


Route::get('/Admin/AgencyCompliance', function () { return view('Admin.agencycompliance'); })->name('agencycompliance');
Route::get('/Admin/AgencyReports', function () { return view('Admin.agencyreports'); })->name('agencyreports');

});

//Admin Login and Logouts
Route::post('/LoginAdmin', [AuthController::class, 'LoginAdmin'])->name('LoginAdmin');
Route::post('/logoutAdmin', [AuthController::class, 'logoutAdmin'])->name('logoutAdmin');
Route::get('/Admin/Login', function () { return view('Admin.Login'); })->name('AdminLogin');

//dashboard chart
Route::get('/api/hiredjobseekers', [AdminChartsController::class, 'getHiredJobseekersData']);

//update job categories
Route::get('/admin/getjobcategory/{id}', action: [AdminCRUDController::class, 'getJobcategory']);
// Route::post('/admin/updatejobcategory', [AdminCRUDController::class, 'updatejobcategory'])->name('updatejobcategory');
Route::put('/job-categories/update/{id}', [AdminCRUDController::class, 'updatejobcategory'])->name('updatejobcategory');

//ShowAgency Details in AgencySettings
Route::get('/Agency/Settings', [AgencyController::class, 'showAgencyDetails'])->name('agencysettings');

Route::get('/SkillsRequirement', function () { return view('Agency.skillsrequirement'); })->name('skillsrequirement');

//Update Profile
Route::post('/Agency/ProfilePic', [AgencyController::class, 'UpdateAgencyProfilePic'])->name('UpdateAgencyProfilePic');

//Agency Login and Signup
Route::post('/AgencyRegister', [AgencyController::class, 'RegisterAgency'])->name('RegisterAgency');
Route::post('/LoginAgency', [AuthController::class, 'LoginAgency'])->name('LoginAgency');
Route::post('/UpdateAgency', [AgencyController::class, 'UpdateAgency'])->name('UpdateAgency');

//Agency Job details creation done, update $ delete: pending
Route::post('/Agency', [AgencyController::class, 'Agency'])->name('Agency');

//Qualify Agencyf
Route::post('/qualify-jobseeker', [JobApplicationController::class, 'qualifyjobseeker'])->name('qualifyjobseeker');

Route::post('/disqualify-jobseeker', [JobApplicationController::class, 'disqualifyJobseeker'])->name('disqualifyJobseeker');

//hire jobseeker
// Add this route in your routes/web.php or routes/api.php depending on how you're handling AJAX requests
Route::post('/hire-job-seeker', [JobApplicationController::class, 'hireJobSeeker'])->name('hireJobSeeker');

// routes/api.php
Route::get('/screened-applicants', [JobApplicationController::class, 'getScreenedApplicants'])->name('getScreened');

//decline jobseeker application
Route::post('/decline-job-seeker', [JobApplicationController::class, 'declineJobSeeker'])->name('declineJobSeeker');

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

//jobseeker feedback
Route::get('/Feedback', function () { return view('Agency.Agencyfeedback'); })->name('Agencyfeedback');

Route::get('/About', function () { return view('Jobseeker.about'); })->name('about');
Route::get('/SignUp', function () { return view('Jobseeker.signup'); })->name('signup');
Route::get('/AgencySignUp', function () { return view('Jobseeker.agencysignup'); })->name('agencysignup');
Route::get('/AgencyLogin', function () { return view('Jobseeker.agencylogin'); })->name('agencylogin');
Route::get('/Login', function () { return view('Jobseeker.Login'); })->name('login');
// Route::get('/Jobs', function () { return view('Jobseeker.jobs'); })->name('jobs');

//Job request get route
Route::get('/job-requests', [JobListingController::class, 'getJobRequests'])->name('getJobRequests');

//Approved Jobs get route
Route::get('/job-declined', [JobListingController::class, 'getJobDeclined'])->name('getJobDeclined');

//Approved Jobs get route
Route::get('/job-approved', [JobListingController::class, 'getJobApproved'])->name('getJobApproved');

//populate modal with data
Route::get('/job-details/{id}', [JobListingController::class, 'getJobDetails']);

//update jobstatus
Route::post('/update-job-status', [JobListingController::class, 'updateJobStatus'])->name('updateJobStatus');


//Show Jobs in Jobslist
Route::get('/jobslist', [JobseekerController::class, 'jobslist'])->name('jobslist');

// jobdetailsroute
Route::get('/jobdetails', function () { return view('Jobseeker.jobdetails'); })->name('jobdetails');

//submit application
Route::post('/job-application', [JobApplicationController::class, 'submitApplication'])->name('job.application.submit');

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

// submit peso form
Route::post('/savePesoForm', [JobseekerPesoController::class, 'savePesoForm'])->name('savePesoForm');

//update peso form
Route::post('/updatePesoForm', [JobseekerPesoController::class, 'updatePesoForm'])->name('updatePesoForm');

//Upload Resume
Route::post('/JobseekerResume', [JobseekerPesoController::class, 'uploadResume'])->name('uploadResume');

Route::get('/PESORegistrationForm', function () { return view('Jobseeker.pesoform'); })->name('pesoform');
Route::get('/PESORegistrationFormUpdate', function () { return view('Jobseeker.pesoformupdate'); })->name('pesoformupdate');

Route::get('/AgencyFeedback', function () { return view('Jobseeker.agencyfeedback'); })->name('agencyfeedback');
Route::get('/ContactUs', function () { return view('Jobseeker.contactus'); })->name('contactus');

//skill assessment
Route::get('/SkillAssessment', function () { return view('Jobseeker.skillassessment'); })->name('skillassessment');

//answer submission
Route::post('/assessment/submit', [AssessmentResultsController::class, 'submit'])->name('submitassessment');
Route::get('/recommended-jobs-for-you', [AssessmentResultsController::class, 'recommendedJob']);

//results assessment display
Route::get('/getAssessmentResults', [AssessmentResultsController::class, 'getAssessmentResults'])
    ->name('getAssessmentResults');

Route::get('/404', function () { return view('Jobseeker.404'); })->name('404');
Route::get('/Profile', function () { return view('Jobseeker.profile'); })->name('profile');
Route::get('/FAQS', function () { return view('Jobseeker.faqs'); })->name('faqs');
Route::get('/PrivacyPolicy', function () { return view('Jobseeker.pesoprivacy'); })->name('pesoprivacy');


// Jobseeker Page Controllers
Route::post('/', [JobseekerController::class, 'create'])->name('jobseekersCreate');
Route::post('/LoginJobseeker', [AuthController::class, 'LoginJobseeker'])->name('LoginJobseeker');
Route::post('/LogoutJobseeker', [AuthController::class, 'LogoutJobseeker'])->name('LogoutJobseeker');
Route::get('/Profile', [JobseekerController::class, 'getJobseeker'])->name('profile');
Route::get('/Settings', [JobseekerController::class, 'getJobseeker2'])->name('settings');

Route::post('/Update', [JobseekerController::class, 'updateJobseeker'])->name('updateJobseeker');
Route::post('/updateJsPassword', [JobseekerController::class, 'updateJsPassword'])->name('updateJsPassword');

//update jobseeker imageprofile
Route::post('/upload-image', [JobseekerController::class, 'uploadImage']);

//update jobseeker imageprofile
Route::post('/update-jobseeker-profile-pic', [JobSeekerController::class, 'updateImage'])->name('UpdateJobseekerProfilePic');

//Application status page
Route::get('/ApplicationStatus', function () { return view('Jobseeker.applicationstatus'); })->name('applicationstatus');
Route::post('/contacts', [JobseekerController::class, 'SaveContact'])->name('SaveContact');

//Submit feedbacks
Route::post('/JobseekerFeedback', [UserFeedbacksController::class, 'submitfeedback'])->name('submitFeedback');

//JobQuestion
Route::post('/AddQuestion', [JobQuestionController::class, 'AddQuestion'])->name('AddQuestion');
Route::get('/GetAssessment', [JobQuestionController::class, 'GetAssessment'])->name('GetAssessment');
Route::post('/DeleteAssessment', [JobQuestionController::class, 'DeleteAssessment'])->name('DeleteAssessment');
Route::get('/LoadTestAssessment', [JobQuestionController::class, 'LoadTestAssessment'])->name('LoadTestAssessment');
Route::post('/SubmitAssessmentTest', [JobQuestionController::class, 'SubmitAssessmentTest'])->name('SubmitAssessmentTest');
Route::get('/AssessmentList', [JobQuestionController::class, 'AssessmentList'])->name('AssessmentList');
