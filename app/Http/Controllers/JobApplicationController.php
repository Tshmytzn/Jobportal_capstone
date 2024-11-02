<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobseekerApplication;
use Illuminate\Support\Facades\Validator;


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

        // Handle the uploaded file
        $resumePath = null;
        if ($request->hasFile('resume_file')) {
            $resumePath = $request->file('resume_file')->store('application_resume', 'public');
        } else {
            // If the resume file is not uploaded, use the existing resume path
            $resumePath = $request->resumeFileInput ?: null; // Use the hidden input value if it exists
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

}
