<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use Illuminate\Http\Request;
use App\Models\JobCategory; 
use App\Models\Jobseeker; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminCRUDController extends Controller
{
    public function CreateJobCategory(Request $request)
    {  
        $validatedData = $request->validate([
            'jobcategory_name' => 'required|string|max:255',
            'job_description' => 'required|string|max:255',
            'jobcategory_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048', 
        ]);
    
        try {
            if ($request->hasFile('jobcategory_image')) {
                $image = $request->file('jobcategory_image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/job_categories'), $imageName);
    
                $validatedData['jobcategory_image'] = $imageName;
            } else {
                $validatedData['jobcategory_image'] = 'default.jpg';
            }
    
            JobCategory::create([
                'name' => $validatedData['jobcategory_name'],
                'description' => $validatedData['job_description'],
                'image' => $validatedData['jobcategory_image'],
            ]);
        } catch (\Exception $e) {
            Log::error('Database insert failed: ' . $e->getMessage());
            return response()->json([
                'message' => 'Failed to Create Job Category.',
                'status' => 'error'
            ], 500);
        }
    
        return response()->json([
            'message' => 'Job Category Created Successfully',
            'status' => 'success'
        ], 201);
    }

    public function getJobCategories(Request $request)
    {
        // Define the columns
        $columns = ['id', 'name', 'description'];
    
        // Create a query to fetch the data
        $query = JobCategory::query();
    
        // Get the total count of records before filtering
        $totalData = $query->count();
    
        // Apply filtering if a search value is present
        if (!empty($request->search['value'])) {
            $searchValue = $request->search['value'];
            $query->where(function ($query) use ($searchValue) {
                $query->where('name', 'LIKE', "%{$searchValue}%")
                      ->orWhere('description', 'LIKE', "%{$searchValue}%");
            });
        }
    
        // Get the total count of records after filtering
        $totalFiltered = $query->count();
    
        // Apply pagination
        $jobCategories = $query->offset($request->start)
                               ->limit($request->length)
                               ->get($columns);
    
        // Format the data for DataTables
        $data = [];
        foreach ($jobCategories as $category) {
            $data[] = [
                'id' => $category->id,
                'name' => $category->name,
                'description' => $category->description,
                // Add additional fields if needed
            ];
        }
    
        // Return the JSON response in the required format
        return response()->json([
            "draw" => intval($request->draw),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        ]);
    }
    

    public function getJobseekers(Request $request)
    {
        $jobseekers = Jobseeker::select('js_id', 'js_firstname','js_middlename', 'js_lastname', 'js_email', 'js_contactnumber', 'created_at')->get();
        return response()->json(['data' => $jobseekers]);
    }

    public function getAdminData(Request $request)
    {
        $admins = Admins::all();

        return response()->json([
            'data' => $admins
        ]);
    }

        public function getAdmin($id)
    {
        $admin = Admins::select('id', 'admin_name', 'admin_email', 'admin_mobile')
        ->where('id', $id)
        ->firstOrFail();

        // Return the admin data as a JSON response
        return response()->json($admin);
    }

    public function getjobcategory($id)
    {
        $jobcategory = JobCategory::select('id', 'name', 'description', 'image')
        ->where('id', $id)
        ->firstOrFail();

        // Return the admin data as a JSON response
        return response()->json($jobcategory);
    }

    public function updatejobcategory(Request $request)
    {
        $validatedData = $request->validate([
            'jobCategoryId' => 'required|exists:job_categories,id',
            'jobcategory_name' => 'required|string|max:255',
            'job_description' => 'required|string',
            'jobcategory_image_input' => 'nullable|image|max:2048',
        ]);
    
        $jobCategory = JobCategory::findOrFail($validatedData['jobCategoryId']);
        
        $jobCategory->name = $validatedData['jobcategory_name'];
        $jobCategory->description = $validatedData['job_description'];
    
        if ($request->hasFile('jobcategory_image_input')) {
            if ($jobCategory->image && file_exists(public_path('/job_categories/' . $jobCategory->image))) {
                unlink(public_path('/job_categories/' . $jobCategory->image));
            }
    
            $image = $request->file('jobcategory_image_input');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/job_categories'), $imageName);
            $jobCategory->image = $imageName;
        }
    
        $jobCategory->save();
    
        return response()->json(['success' => true, 'message' => 'Job category updated successfully.']);
    }
    
    


    public function deleteAdminData($id)
    {
        try {
            $admin = Admins::findOrFail($id);
            $admin->delete();

            return response()->json([
                'message' => 'Admin account deleted successfully!'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error deleting Admin!'
            ], 500);
        }
    }

    public function deleteJobCategory($id)
    {
        try {
            $jobCategory = JobCategory::findOrFail($id);
            $jobCategory->delete();

            return response()->json([
                'message' => 'Job category deleted successfully!'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error deleting job category!'
            ], 500);
        }
    }

    public function UpdateAdmin(Request $request)
    {
        $admin = Admins::find($request->id);
        $admin->name = $request->name;
        $admin->mobile = $request->mobile;
        $admin->email = $request->email;

        if ($request->password && $request->password === $request->confirm_password) {
            $admin->password = bcrypt($request->password);
        }

        $admin->save();

        return response()->json(['success' => 'Admin updated successfully']);
    }

    }

