<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobseekerApplication;
use Illuminate\Support\Facades\Validator;
use App\Models\JobDetails;


class JobApplicationController extends Controller
{
    public function submitApplication(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'userIdInput' => 'nullable|integer',
            'jobId' => 'nullable|integer',
            'peso_form_id' => 'nullable|integer',
            'skillIdInput' => 'nullable|integer',
            'applicantName' => 'nullable|string|max:100',
            'applicantEmail' => 'nullable|email|max:100',
            'applicantPhone' => 'nullable|string|max:13',
            'coverLetter' => 'nullable|string',
            'resume_file' => 'nullable|file|mimes:pdf,doc,docx|max:2048', 
        ]);

        // Custom validation for either 'peso_form_id' or 'resume_file'
        $validator->after(function ($validator) use ($request) {
            if (empty($request->peso_form_id) && !$request->hasFile('resume_file')) {
                $validator->errors()->add('peso_form_or_resume', 'To complete your application, please upload your resume or provide your PESO form ID.');
            }
        });

        // Check if validation failed
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation errors',
                'errors' => $validator->errors(),
            ], 422);
        }


        // Ensure that either peso_form_id or resume_file is provided
        if (empty($request->peso_form_id) && !$request->hasFile('resume_file')) {
            return response()->json([
                'message' => 'To complete your application, please upload your resume or provide your PESO form ID.',
            ], 422);
        }


        // Check if the user has already submitted an application for this job
        $existingApplication = JobseekerApplication::where('js_id', $request->userIdInput)
            ->where('job_id', $request->jobId)
            ->first();

        if ($existingApplication) {
            return response()->json(['message' => 'You have already submitted an application for this job.'], 409);
        }

        // Handle the uploaded resume file
        $resumePath = null;

        // If resume file is provided
        if ($request->hasFile('resume_file')) {
            // Get the file extension
            $extension = $request->file('resume_file')->getClientOriginalExtension();

            // Generate a unique file name
            $fileName = uniqid('resume_') . '.' . $extension;

            // Store the file in the public directory under 'resumes' folder
            $request->file('resume_file')->move(public_path('application_resumes'), $fileName);

            // Set the resume path to the location in the public directory
            $resumePath = 'application_resumes/' . $fileName;
        } else {
            // If no file uploaded, use the existing resume path from hidden input (if available)
            $resumePath = $request->resumeFileInput ?: null; // Use existing path if available
        }

        // Create the application record
        JobseekerApplication::create([
            'js_id' => $request->userIdInput,
            'job_id' => $request->jobId,
            'peso_form_id' => $request->peso_form_id,
            'skill_results_id' => $request->skillIdInput,
            'applicant_name' => $request->applicantName,
            'applicant_email' => $request->applicantEmail,
            'applicant_phone' => $request->applicantPhone,
            'cover_letter' => $request->coverLetter,
            'resume_file' => $resumePath,
            'js_status' => 'pending',
        ]);

        return response()->json(['success' => 'Job application submitted successfully!']);
    }

    public function qualifyjobseeker(Request $request)
    {
        $validated = $request->validate([
            'applicationId' => 'required|exists:jobseeker_application,id',
        ]);
    
        $application = JobseekerApplication::find($validated['applicationId']);
    
        if (!$application) {
            return response()->json([
                'status' => 'error',
                'message' => 'Application not found.',
            ], 404);
        }
    
        $application->js_status = 'qualified';
        $application->save();
    
        return response()->json([
            'status' => 'success',
            'message' => 'Jobseeker Application Successfully Qualified.',
        ], 200);
    }

        public function disqualifyJobseeker(Request $request)
    {
        $validated = $request->validate([
            'applicationId' => 'required|exists:jobseeker_application,id',  
            'status' => 'required|string|in:rejected',  
        ]);

        $application = JobseekerApplication::find($validated['applicationId']);

        if (!$application) {
            return response()->json(['status' => 'error', 'message' => 'Application not found.'], 404);
        }

        $application->js_status = 'disqualified';
        $application->save();

        return response()->json(['status' => 'success', 'message' => 'Jobseeker Application Successfully Disqualified.']);
    }

    public function getScreenedApplicants(Request $request)
    {
        $searchValue = $request->input('search.value', '');
    
        $orderColumn = $request->input('order.0.column', 0); 
        $orderDirection = $request->input('order.0.dir', 'asc'); 
    
        $start = $request->input('start', 0); 
        $length = $request->input('length', 10); 
    
        $columns = [
            'applicant_name', 'job_name', 'applicant_email', 'applicant_phone', null
        ];
    
        $query = JobseekerApplication::select(
                'jobseeker_application.id', 
                'applicant_name',
                'applicant_email',
                'applicant_phone',
                'job_details.job_title as job_name'
            )
            ->join('job_details', 'jobseeker_application.job_id', '=', 'job_details.id')
            ->where('js_status', 'qualified');
    
        if ($searchValue) {
            $query->where(function($query) use ($searchValue) {
                $query->where('applicant_name', 'like', "%$searchValue%")
                    ->orWhere('applicant_email', 'like', "%$searchValue%")
                    ->orWhere('applicant_phone', 'like', "%$searchValue%")
                    ->orWhere('job_details.job_title', 'like', "%$searchValue%");
            });
        }
    
        if (isset($columns[$orderColumn])) {
            $query->orderBy($columns[$orderColumn], $orderDirection);
        }
    
        $totalRecords = $query->count();
        $applicants = $query->skip($start)->take($length)->get();
    
        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords, 
            'data' => $applicants
        ]);
    }
    
    public function hireJobSeeker(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:jobseeker_application,id',
            'js_status' => 'required|in:hired',
        ]);

        
        $jobSeeker = JobseekerApplication::find($request->id);
        $jobId = $jobSeeker->job_id;

        $existingHired = JobseekerApplication::where('js_id', $jobSeeker->js_id)
            ->where('js_status', 'hired')
            ->exists();

        if ($existingHired) {
            JobseekerApplication::where('js_id', $jobSeeker->js_id)
                ->where('js_status', '!=', 'hired')
                ->update(['js_status' => 'declined']);

            return response()->json([
                'success' => false,
                'message' => 'This jobseeker has already been hired for another position.'
            ]);
        }

        $jobSeeker->js_status = 'hired';
        $jobSeeker->save();

        $jobDetails = JobDetails::find($jobId);
        if (!$jobDetails) {
            return response()->json([
                'success' => false,
                'message' => 'Job details not found for the specified application.'
            ]);
        }
    
        $hiredCount = JobseekerApplication::where('job_id', $jobId)
                                            ->where('js_status', 'hired')
                                            ->count();
        
        if ($hiredCount >= $jobDetails->job_vacancy) {
            $jobDetails->update(['job_status' => 'disabled']); 
        }       
    
        return response()->json(['success' => true]);
    }
    

    public function declineJobSeeker(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:jobseeker_application,id',
            'js_status' => 'required|in:declined',
        ]);

        $jobSeeker = JobseekerApplication::find($request->id);

        $jobSeeker->js_status = 'declined';
        $jobSeeker->save();

        return response()->json(['success' => true]);
    }

      
}
