<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobseekerPesoForm; // Ensure your JobSeeker model is linked to jobseeker_pesoform table
use Illuminate\Database\QueryException; // Import QueryException for error handling

class JobseekerPesoController extends Controller
{
    public function savePesoForm(Request $request)
    {
        // Validate the incoming request data
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
            'telephone' => 'required|string|max:9',
            'cellphone' => 'required|string|max:10',
            'employment_status' => 'required|string',
            'education_level' => 'required|string',
            'preferred_position' => 'required|string|max:255',
            'skills' => 'required|array',
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
        $jobSeeker->peso_skills = json_encode($validatedData['skills']);
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
            return response()->json(['success' => 'Data saved successfully!']);
        } catch (QueryException $e) {

            if ($e->errorInfo[1] == 1062) { 
                return response()->json(['message' => 'This email is already registered. Please use a different email.'], 409); // Conflict
            } else {
                return response()->json(['message' => 'An error occurred while processing your request. Please try again later.'], 500);
            }
        }
    }
}
