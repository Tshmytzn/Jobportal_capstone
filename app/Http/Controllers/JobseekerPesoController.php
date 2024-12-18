<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobseekerPesoForm;
use Illuminate\Database\QueryException;
use App\Models\Jobseeker;

class JobseekerPesoController extends Controller
{
    public function savePesoForm(Request $request)
    {

        $validatedData = $request->validate([
            'srs_id' => 'required|numeric',
            'js_id' => 'required|numeric',
            'full_name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'age' => 'required|string|max:20',
            'jobseeker_gender' => 'required|string',
            'civil_status' => 'required|string',
            'city' => 'required|string',
            'barangay' => 'required|string',
            'street' => 'required|string|max:255',
            'jobseeker_email' => 'required|email',
            'telephone' => 'nullable|string|max:9',
            'cellphone' => 'required|string|max:10',
            'employment_status' => 'required|string',
            'education_level' => 'required|string',
            'preferred_position' => 'required|string|max:255',
            'selectedSkill' => 'required|string',
            'work_experience' => 'required|string',
            '4ps' => 'required|string',
            'pwd' => 'required|string',
            'registration_date' => 'required|string',
            'remarks' => 'nullable|string',
            'office_name' => 'required|string',
            'area_type' => 'required|string',
            'area_class' => 'required|string',
            'program' => 'required|string',
            'event_name' => 'required|string',
            'trans' => 'required|string'
        ]);

        // Check if the jobseeker with the given js_id already exists
        if (JobseekerPesoForm::where('js_id', $validatedData['js_id'])->exists()) {
            return response()->json(['message' => 'This job seeker is already registered.'], 409); // Conflict
        }

        // Create a new instance of the JobseekerPesoForm model
        $jobSeeker = new JobseekerPesoForm();
        $jobSeeker->peso_srsid = $validatedData['srs_id'];
        $jobSeeker->js_id = $validatedData['js_id'];
        $jobSeeker->peso_fullname = $validatedData['full_name'];
        $jobSeeker->peso_birthdate = $validatedData['birthdate'];
        $jobSeeker->peso_age = $validatedData['age'];
        $jobSeeker->peso_gender = $validatedData['jobseeker_gender'];
        $jobSeeker->peso_civilstatus = $validatedData['civil_status'];
        $jobSeeker->peso_city = $validatedData['city'];
        $jobSeeker->peso_baranggay = $validatedData['barangay'];
        $jobSeeker->peso_street = $validatedData['street'];
        $jobSeeker->peso_email = $validatedData['jobseeker_email'];
        $jobSeeker->peso_tel = $validatedData['telephone'];
        $jobSeeker->peso_cell = $validatedData['cellphone'];
        $jobSeeker->peso_employment = $validatedData['employment_status'];
        $jobSeeker->peso_educ = $validatedData['education_level'];
        $jobSeeker->peso_position = $validatedData['preferred_position'];
        $jobSeeker->peso_skills = $validatedData['selectedSkill'];
        $jobSeeker->peso_work = $validatedData['work_experience'];
        $jobSeeker->peso_4ps = $validatedData['4ps'];
        $jobSeeker->peso_pwd = $validatedData['pwd'];
        $jobSeeker->peso_registration = $validatedData['registration_date'];
        $jobSeeker->peso_remarks = $validatedData['remarks'];
        $jobSeeker->peso_office = $validatedData['office_name'];
        $jobSeeker->peso_type = $validatedData['area_type'];
        $jobSeeker->peso_class = $validatedData['area_class'];
        $jobSeeker->peso_program = $validatedData['program'];
        $jobSeeker->peso_event = $validatedData['event_name'];
        $jobSeeker->peso_transaction = $validatedData['trans'];

        try {
            $jobSeeker->save();
            return response()->json(['success' => 'PESO Registration form successfully completed!']);
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return response()->json(['message' => 'This email is already registered. Please use a different email.'], 409); // Conflict
            } else {
                return response()->json(['message' => 'An error occurred while processing your request. Please try again later.'], 500);
            }
        }
    }


    public function updatePesoForm(Request $request)
{
    // Validate the incoming request data
        $validatedData = $request->validate([
            'srs_id' => 'required|numeric',
            'full_name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'age' => 'required|string|max:20',
            'jobseeker_gender' => 'required|string',
            'civil_status' => 'required|string',
            'city' => 'required|string',
            'barangay' => 'required|string',
            'street' => 'required|string|max:255',
            'jobseeker_email' => 'required|email',
            'telephone' => 'nullable|string|max:9',
            'cellphone' => 'required|string|max:10',
            'employment_status' => 'required|string',
            'education_level' => 'required|string',
            'preferred_position' => 'required|string|max:255',
            'selectedSkill' => 'required|string',
            'work_experience' => 'required|string',
            '4ps' => 'required|string',
            'pwd' => 'required|string',
            'registration_date' => 'required|string',
            'remarks' => 'nullable|string',
            'office_name' => 'required|string',
            'area_type' => 'required|string',
            'area_class' => 'required|string',
            'program' => 'required|string',
            'event_name' => 'required|string',
            'trans' => 'required|string'
        ]);

        // Find the existing job seeker entry
        $jobSeeker = JobseekerPesoForm::where('js_id', $request->js_id)->first();

        // If no record found, return error
        if (!$jobSeeker) {
            return response()->json(['message' => 'Record not found.'], 404); // Not Found
        }

        // Update the job seeker record
        $jobSeeker->peso_srsid = $validatedData['srs_id'];
        $jobSeeker->peso_fullname = $validatedData['full_name'];
        $jobSeeker->peso_birthdate = $validatedData['birthdate'];
        $jobSeeker->peso_age = $validatedData['age'];
        $jobSeeker->peso_gender = $validatedData['jobseeker_gender'];
        $jobSeeker->peso_civilstatus = $validatedData['civil_status'];
        $jobSeeker->peso_city = $validatedData['city'];
        $jobSeeker->peso_baranggay = $validatedData['barangay'];
        $jobSeeker->peso_street = $validatedData['street'];
        $jobSeeker->peso_email = $validatedData['jobseeker_email'];
        $jobSeeker->peso_tel = $validatedData['telephone'];
        $jobSeeker->peso_cell = $validatedData['cellphone'];
        $jobSeeker->peso_employment = $validatedData['employment_status'];
        $jobSeeker->peso_educ = $validatedData['education_level'];
        $jobSeeker->peso_position = $validatedData['preferred_position'];
        $jobSeeker->peso_skills = $validatedData['selectedSkill'];
        $jobSeeker->peso_work = $validatedData['work_experience'];
        $jobSeeker->peso_4ps = $validatedData['4ps'];
        $jobSeeker->peso_pwd = $validatedData['pwd'];
        $jobSeeker->peso_registration = $validatedData['registration_date'];
        $jobSeeker->peso_remarks = $validatedData['remarks'];
        $jobSeeker->peso_office = $validatedData['office_name'];
        $jobSeeker->peso_type = $validatedData['area_type'];
        $jobSeeker->peso_class = $validatedData['area_class'];
        $jobSeeker->peso_program = $validatedData['program'];
        $jobSeeker->peso_event = $validatedData['event_name'];
        $jobSeeker->peso_transaction = $validatedData['trans'];

        try {
            $jobSeeker->save();
            return response()->json(['success' => 'PESO Registration form successfully Updated!']);
        } catch (QueryException $e) {

            if ($e->errorInfo[1] == 1062) {
                return response()->json(['message' => 'This email is already registered. Please use a different email.'], 409); // Conflict
            } else {
                return response()->json(['message' => 'An error occurred while updating your details. Please try again later.'], 500);
            }
        }
    }

    public function uploadResume(Request $request)
    {
        $request->validate([
            'js_id' => 'required|integer|exists:jobseeker_details,js_id',
            'js_resume' => 'required|file|mimes:pdf,doc,docx,rtf|max:2048',
        ]);

        $jobseeker = Jobseeker::find($request->js_id);

        if ($request->hasFile('js_resume')) {
            $resumeFile = $request->file('js_resume');
            $resumeNameWithExtension = time() . '_' . $resumeFile->getClientOriginalName();

            // Move the file to the jobseeker_resume folder in the public directory
            $resumeFile->move(public_path('jobseeker_resume/'), $resumeNameWithExtension);

            // Save the file name/path to the jobseeker's resume field
            $jobseeker->js_resume = $resumeNameWithExtension;
            $jobseeker->save();

            // Check if the jobseeker was updated
            if ($jobseeker->wasChanged('js_resume')) {
                return response()->json([
                    'message' => 'Resume uploaded successfully.',
                    'resume_file' => $resumeNameWithExtension
                ]);
            } else {
                return response()->json([
                    'message' => 'No changes made to resume.',
                    'error' => 'Nothing inserted.'
                ], 400); // Return a 400 Bad Request
            }
        }

        return response()->json([
            'message' => 'No file uploaded.',
            'error' => 'Nothing inserted.'
        ], 400); // Return a 400 Bad Request
    }


}
