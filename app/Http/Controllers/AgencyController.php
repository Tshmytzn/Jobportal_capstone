<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\JobCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\JobDetails;

class AgencyController extends Controller
{
    /**
     * Store a newly created agency in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function showAgencyDetails()
    {
        $user_id = session('agency_id');

        $agency = Agency::where('id', $user_id)->first();

        return view('Agency.Settings', compact('agency'));
    }


    public function RegisterAgency(Request $request)
    {

        $validatedData = $request->validate([
            'agency_name' => 'required|string|max:255',
            'agency_address' => 'required|string|max:255',
            'email_address' => 'required|string|email|max:255|unique:agencies',
            'contact_number' => 'required|string|regex:/^9[0-9]{9}$/',
            'landline_number' => 'nullable|string|regex:/^02-[0-9]{8}$/',
            'geo_coverage' => 'required|in:local,national,international',
            'employee_count' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
            'agency_business_permit' => 'nullable|file|mimes:pdf,jpeg,png,jpg,gif,webp|max:2048',
            'agency_dti_permit' => 'nullable|file|mimes:pdf,jpeg,png,jpg,gif,webp|max:2048',
            'agency_bir_permit' => 'nullable|file|mimes:pdf,jpeg,png,jpg,gif,webp|max:2048',
            'agency_mayors_permit' => 'nullable|file|mimes:pdf,jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $agency_business_permit = $this->uploadPic($request, 'agency_business_permit', 'agencyfiles/');
        $agency_dti_permit = $this->uploadPic($request, 'agency_dti_permit', 'agencyfiles/');
        $agency_bir_permit = $this->uploadPic($request, 'agency_bir_permit', 'agencyfiles/');
        $agency_mayors_permit = $this->uploadPic($request, 'agency_mayors_permit', 'agencyfiles/');


        $data = new Agency();
        $data->agency_name = $request->agency_name;
        $data->agency_address = $request->agency_address;
        $data->email_address = $request->email_address;
        $data->contact_number = $request->contact_number;
        $data->landline_number = $request->landline_number;
        $data->geo_coverage = $request->geo_coverage;
        $data->employee_count = $request->employee_count;
        $data->agency_business_permit = $agency_business_permit;
        $data->agency_dti_permit = $agency_dti_permit;
        $data->agency_bir_permit = $agency_bir_permit;
        $data->agency_mayors_permit = $agency_mayors_permit;
        $data->agency_image = $request->hasFile('agency_image')
        ? $request->file('agency_image')->store('agency_profile', 'public')
        : 'default.png';
        $data->password = Hash::make($request->password_confirmation);
        $data->status = 'pending';
        $data->save();

        return response()->json([
            'message' => 'Account Created Successfully',
            'status' => 'success'
        ], 201);
    }
    public function uploadPic(Request $request, $fileFieldName, $directoryPath)
    {
        // Validate the request to ensure the image is provided and is valid
        $request->validate([
            $fileFieldName => 'required|mimes:jpg,jpeg,png|max:2048', // Validate image type and size (max 2MB)
        ]);

        // Generate a random string for the file name
        $length = 30;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        // Handle the uploaded image dynamically using the file field name
        if ($request->hasFile($fileFieldName)) {
            $image = $request->file($fileFieldName);
            $imageNameWithExtension = $randomString . '.' . $image->getClientOriginalExtension(); // Image name with extension

            // Move the image to the dynamically provided directory path
            $image->move(public_path($directoryPath), $imageNameWithExtension);

            // Return the image name with extension after successful upload
            return $imageNameWithExtension;
        }

        // Return null if no file was uploaded
        return null;
    }


    public function UpdateAgency(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'id' => 'required|integer|exists:agencies,id',
            'agency_name' => 'required|string|max:255',
            'email_address' => 'required|email|max:255',
            'agency_address' => 'required|string|max:255',
            'contact_number' => 'nullable|string|max:20',
            'landline_number' => 'nullable|string|max:20',
            'geo_coverage' => 'required|string',
            'employee_count' => 'required|string',
        ]);

        // Find the agency by ID
        $agency = Agency::find($validated['id']);

        // Update the agency details
        $agency->agency_name = $validated['agency_name'];
        $agency->email_address = $validated['email_address'];
        $agency->agency_address = $validated['agency_address'];
        $agency->contact_number = $validated['contact_number'];
        $agency->landline_number = $validated['landline_number'];
        $agency->geo_coverage = $validated['geo_coverage'];
        $agency->employee_count = $validated['employee_count'];

        $agency->save();

        return response()->json(['message' => 'Agency details updated successfully.']);
    }


    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer|exists:agencies,id',
            'new_password' => 'required|string|min:8|max:255|confirmed',
        ]);

        $agency = Agency::find($validated['id']);

        $agency->password = Hash::make($validated['new_password']);

        $agency->save();

        return response()->json(['message' => 'Agency password updated successfully.']);
    }

    public function Agency(request $request)
    {
        if ($request->process == 'add') {
            if ($request->job_title == '' || $request->job_category == '' || $request->job_location == '' || $request->job_type == '' || $request->input('skills') == '' || $request->job_details == '' || $request->job_image == ''|| $request->job_vacancy == ''|| $request->other_skills == '') {
                return response()->json(['message' => 'Please fill in all required  fields.', 'status' => 'error']);
            }
            $image = $request->file(key: 'job_image');

            // Store the image in the 'public/party_image' directory
            $length = 30; // Fixed length
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';

            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }

            // Extract the original name and extension, then combine them
            $imageNameWithExtension =  $randomString . '.' . $image->getClientOriginalExtension(); // Image name with extension
            $request->job_image->move(public_path('agencyfiles/job_image/'), $imageNameWithExtension);

            $data = new JobDetails;
            $data->job_title = $request->job_title;
            $data->category_id = $request->job_category;
            $data->agency_id = $request->agencyid;
            $data->job_image = $imageNameWithExtension;
            $data->job_location = $request->job_location;
            $data->job_type = $request->job_type;
            $data->job_vacancy = $request->job_vacancy;
            $data->other_skills = $request->other_skills;
            $data->skills_required = implode(',', $request->input('skills'));
            $data->job_description = $request->job_details;
            $data->save();

            return response()->json(['message' => 'Job Details successfully added.', 'modal' => 'jobpostmodal', 'form' => 'jobDetailsForm', 'reload' => 'getJobDetails', 'status' => 'success']);
        
        } else if ($request->process == 'get') {
            $jobs = JobDetails::join('job_categories', 'job_details.category_id', '=', 'job_categories.id')
                ->select('job_details.*', 'job_categories.name')
                ->orderBy('job_details.created_at', 'desc') // Order by 'created_at' in descending order
                ->get();

            return response()->json(['data' => $jobs, 'status' => 'success']);
        } else if ($request->process == 'update') {
            if ($request->job_title == '' || $request->job_category == '' || $request->job_location == '' || $request->job_type == '' || $request->input('skills') == '' || $request->job_details == '' || $request->job_image == ''|| $request->job_vacancy == ''|| $request->other_skills == '') {
                return response()->json(['message' => 'Please fill in all required  fields.', 'status' => 'error']);
            }
            $job = JobDetails::where('id', $request->id)->first();

            $image = $request->file(key: 'job_image');

            // Store the image in the 'public/party_image' directory
            $length = 30; // Fixed length
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';

            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }

            // Extract the original name and extension, then combine them
            $imageNameWithExtension =  $randomString . '.' . $image->getClientOriginalExtension();
            $request->job_image->move(public_path('agencyfiles/job_image/'), $imageNameWithExtension);

            $oldImagePath = public_path('agencyfiles/job_image/' . $job->job_image);
            unlink($oldImagePath);

            $job->update([
                'job_title' => $request->job_title,
                'job_category' => $request->job_category,
                'job_location' => $request->job_location,
                'job_type' => $request->job_type,
                'job_vacancy' => $request->job_vacancy,
                'other_skills' => $request->other_skills,
                'skills_required' => implode(',', $request->input('skills')),
                'job_description' => $request->job_details,
                'job_image' => $imageNameWithExtension,
            ]);

            return response()->json(['message' => 'Job Details successfully added.', 'modal' => 'jobpostmodal', 'form' => 'jobDetailsForm', 'reload' => 'getJobDetails', 'status' => 'success']);
        } else if ($request->process == 'delete') {
            $job = JobDetails::where('id', $request->id)->first();
            $oldImagePath = public_path('agencyfiles/job_image/' . $job->job_image);
            unlink($oldImagePath); // Delete the old image
            $job->delete();
            return response()->json(['message' => 'Job Details successfully Deleted.', 'form' => 'deletejobdetail', 'reload' => 'getJobDetails', 'status' => 'success']);
        }
    }

    public function UpdateAgencyProfilePic(Request $request)
    {

        $request->validate([
            'id' => 'required|integer|exists:agencies,id',
            'agency_profile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $agency = Agency::find($request->id);

        if ($request->hasFile('agency_profile')) {

            $imgName = $request->file('agency_profile');
            $imageNameWithExtension = time() . '_' . $imgName->getClientOriginalName();
            $request->agency_profile->move(public_path('/agency_profile/'), $imageNameWithExtension);


            $agency->agency_image = $imageNameWithExtension;
            $agency->save();
        }


        return response()->json([
            'message' => 'Profile picture updated successfully.',
            'agency_profile' => $imageNameWithExtension
        ]);
    }
}
