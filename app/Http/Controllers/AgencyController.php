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
    public function RegisterAgency(Request $request)
    {

        // Validate the form data
        $validatedData = $request->validate([
            'agency_name' => 'required|string|max:255',
            'agency_address' => 'required|string|max:255',
            'email_address' => 'required|string|email|max:255|unique:agencies',
            'contact_number' => 'required|string|max:15',
            'landline_number' => 'nullable|string|max:15',
            'geo_coverage' => 'required|in:local,national,international',
            'employee_count' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
            'agency_business_permit' => 'nullable|file|mimes:pdf,jpeg,png,jpg,gif,webp|max:2048',
            'agency_dti_permit' => 'nullable|file|mimes:pdf,jpeg,png,jpg,gif,webp|max:2048',
            'agency_bir_permit' => 'nullable|file|mimes:pdf,jpeg,png,jpg,gif,webp|max:2048'

        ]);

        // Handle file uploads
        $filePaths = [
            'agency_business_permit' => null,
            'agency_dti_permit' => null,
            'agency_bir_permit' => null,
        ];

        foreach ($filePaths as $field => &$path) {
            if ($request->hasFile($field)) {
                try {
                    $fileName = time() . '-' . $field . '.' . $request->file($field)->extension();
                    $request->file($field)->move(public_path('agencyfiles'), $fileName);
                    $path = 'agencyfiles/' . $fileName;
                } catch (\Exception $e) {
                    Log::error($field . ' upload failed: ' . $e->getMessage());
                    return response()->json([
                        'message' => 'Failed to upload file for ' . $field,
                        'status' => 'error'
                    ], 422);
                }
            }
        }

        // Create the agency record
        try {
            Agency::create([
                'agency_name' => $validatedData['agency_name'],
                'agency_address' => $validatedData['agency_address'],
                'email_address' => $validatedData['email_address'],
                'contact_number' => $validatedData['contact_number'],
                'landline_number' => $validatedData['landline_number'],
                'geo_coverage' => $validatedData['geo_coverage'],
                'employee_count' => $validatedData['employee_count'],
                'agency_business_permit' => $filePaths['agency_business_permit'],
                'agency_dti_permit' => $filePaths['agency_dti_permit'],
                'agency_bir_permit' => $filePaths['agency_bir_permit'],
                'password' => Hash::make($validatedData['password']),
            ]);
        } catch (\Exception $e) {
            Log::error('Database insert failed: ' . $e->getMessage());
            return response()->json([
                'message' => 'Failed to create account.',
                'status' => 'error'
            ], 500);
        }

        return response()->json([
            'message' => 'Account Created Successfully',
            'status' => 'success'
        ], 201);
    }

    public function UpdateAgency(Request $request){

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

        // Save the changes to the database
        $agency->save();

        // Return a JSON response
        return response()->json(['message' => 'Agency details updated successfully.']);
    }

    
    public function updatePassword(Request $request)
    {
        $validatedData = $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);
    
        $userId = Auth::id();
    
        $agency = Agency::find($userId);
    
        if (!$agency) {
            return response()->json([
                'message' => 'User not found.',
            ], 404);
        }
    
        if (!Hash::check($request->current_password, $agency->password)) {
            return response()->json([
                'message' => 'Current password is incorrect.',
                'errors' => ['current_password' => ['Current password is incorrect.']]
            ], 422);
        }
    
        $agency->password = Hash::make($request->new_password);
        $agency->save(); 
    
        return response()->json([
            'message' => 'Password updated successfully.',
        ]);
    }

    public function Agency(request $request){
        if($request->process=='add'){
            if($request->job_title==''||$request->job_category==''||$request->job_location==''||$request->job_type==''||$request->job_details==''|| $request->job_image == ''){
            return response()->json(['message' => 'Please fill in all required  fields.','status'=>'error']);
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
            $data->job_image = $imageNameWithExtension;
            $data->job_location = $request->job_location;
            $data->job_type = $request->job_type;
            $data->job_description = $request->job_details;
            $data->save();
            return response()->json(['message' => 'Job Details successfully added.','modal'=> 'jobpostmodal','form'=> 'jobDetailsForm','reload'=> 'getJobDetails','status'=>'success']);
        }else if($request->process =='get'){
            $jobs = JobDetails::join('job_categories', 'job_details.category_id', '=', 'job_categories.id')
            ->select('job_details.*', 'job_categories.name')
            ->orderBy('job_details.created_at', 'desc') // Order by 'created_at' in descending order
            ->get();

            return response()->json(['data'=>$jobs,'status'=>'success']);
        }else if($request->process=='update'){
            if ($request->job_title == '' || $request->job_category == '' || $request->job_location == '' || $request->job_type == '' || $request->job_details == ''||$request->job_image=='') {
                return response()->json(['message' => 'Please fill in all required  fields.', 'status' => 'error']);
            }   
            $job = JobDetails::where('id',$request->id)->first();

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
            unlink($oldImagePath); // Delete the old image

            $job->update([
                'job_title' => $request->job_title,
                'job_category' => $request->job_category,
                'job_location' => $request->job_location,
                'job_type' => $request->job_type,
                'job_description' => $request->job_details,
                'job_image' => $imageNameWithExtension,
            ]);

            return response()->json(['message' => 'Job Details successfully added.', 'modal' => 'jobpostmodal', 'form' => 'jobDetailsForm', 'reload' => 'getJobDetails', 'status' => 'success']);
      
        }
        else if($request->process=='delete'){
            $job = JobDetails::where('id', $request->id)->first();
            $oldImagePath = public_path('agencyfiles/job_image/' . $job->job_image);
            unlink($oldImagePath); // Delete the old image
            $job->delete();
            return response()->json(['message' => 'Job Details successfully Deleted.','form' => 'deletejobdetail','reload' => 'getJobDetails', 'status' => 'success']);
      
        }
    }

}
