<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobDetails;

class JobListingController extends Controller
{
    public function getJobRequests(Request $request)
    {
        $jobRequests = JobDetails::with(['category', 'agency'])
        ->where('job_status', 'pending') 
        ->select('id', 'category_id', 'agency_id', 'job_title', 'job_location', 'created_at', 'updated_at')
        ->orderBy('id', 'desc')
        ->get();

        return response()->json([
            'data' => $jobRequests->map(function($jobRequest) {
                return [
                    'id' => $jobRequest->id,
                    'category_name' => $jobRequest->category->name,
                    'agency_name' => $jobRequest->agency->agency_name,
                    'job_title' => $jobRequest->job_title,
                    'job_location' => $jobRequest->job_location,
                    'created_at' => $jobRequest->created_at->format('Y-m-d H:i:s'),
                    'updated_at' => $jobRequest->updated_at->format('Y-m-d H:i:s'),
                ];
            })
        ]);
    }

    public function getJobDetails($id)
    {
        $jobDetails = JobDetails::with(['category', 'agency'])->find($id);

        if (!$jobDetails) {
            return response()->json(['message' => 'Job not found'], 404);
        }

        return response()->json([
            'job_title' => $jobDetails->job_title,
            'category_name' => $jobDetails->category->name,
            'agency_name' => $jobDetails->agency->agency_name,
            'job_location' => $jobDetails->job_location,
            'job_type' => $jobDetails->job_type,
            'skills_required' => $jobDetails->skills_required,
            'job_salary' => $jobDetails->job_salary,
            'job_description' => $jobDetails->job_description,
            'job_status' => $jobDetails->job_status,
        ]);
    }

    public function updateJobStatus(Request $request)
    {

        $request->validate([
            'job_id' => 'required|exists:job_details,id',
            'status' => 'required|in:approved,rejected',
        ]);

        $job = JobDetails::find($request->job_id);

        if ($job) {
            $job->job_status = $request->status;
            $job->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Job not found'], 404);
    }

    public function getJobApproved(Request $request)
    {
        $jobRequests = JobDetails::with(['category', 'agency'])
        ->where('job_status', 'approved') 
        ->select('id', 'category_id', 'agency_id', 'job_title', 'job_location', 'created_at', 'updated_at')
        ->orderBy('id', 'desc')
        ->get();

        return response()->json([
            'data' => $jobRequests->map(function($jobRequest) {
                return [
                    'id' => $jobRequest->id,
                    'category_name' => $jobRequest->category->name,
                    'agency_name' => $jobRequest->agency->agency_name,
                    'job_title' => $jobRequest->job_title,
                    'job_location' => $jobRequest->job_location,
                    'created_at' => $jobRequest->created_at->format('Y-m-d H:i:s'),
                    'updated_at' => $jobRequest->updated_at->format('Y-m-d H:i:s'),
                ];
            })
        ]);
    }

    public function getJobDeclined(Request $request)
    {
        $jobRequests = JobDetails::with(['category', 'agency'])
        ->where('job_status', 'rejected') 
        ->select('id', 'category_id', 'agency_id', 'job_title', 'job_location', 'created_at', 'updated_at')
        ->orderBy('id', 'desc')
        ->get();

        return response()->json([
            'data' => $jobRequests->map(function($jobRequest) {
                return [
                    'id' => $jobRequest->id,
                    'category_name' => $jobRequest->category->name,
                    'agency_name' => $jobRequest->agency->agency_name,
                    'job_title' => $jobRequest->job_title,
                    'job_location' => $jobRequest->job_location,
                    'created_at' => $jobRequest->created_at->format('Y-m-d H:i:s'),
                    'updated_at' => $jobRequest->updated_at->format('Y-m-d H:i:s'),
                ];
            })
        ]);
    }

}

