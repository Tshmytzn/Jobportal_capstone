<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agency;
use App\Models\JobDetails;
use App\Models\JobseekerApplication;


class ReportsController extends Controller
{
    public function getcompliance(Request $request)
    {
        $compliance = Agency::select('agency_name', 'geo_coverage', 'employee_count', 'agency_business_permit', 'agency_dti_permit', 'agency_bir_permit', 'agency_mayors_permit', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json(['data' => $compliance]);
    }
    public function getreports(Request $request)
    {
        $reports = Agency::where('status', 'approved') 
            ->with([
                'jobs' => function ($query) {
                    $query->select('id', 'agency_id', 'category_id', 'job_title', 'job_vacancy') 
                        ->with([
                            'category:id,name', 
                        ])
                        ->withCount([
                            'applications as hired_count' => function ($q) {
                                $q->where('js_status', 'hired');
                            },
                            'applications as pending_count' => function ($q) {
                                $q->where('js_status', 'pending');
                            },
                        ]);
                }
            ])
            ->orderBy('created_at', 'desc')
            ->get();
    
        $flattenedData = $reports->flatMap(function ($agency) {
            return $agency->jobs->map(function ($job) use ($agency) {
                return [
                    'agency_name' => $agency->agency_name, 
                    'job_id' => $job->id,
                    'category_name' => $job->category->name ?? 'Unknown', 
                    'job_title' => $job->job_title, 
                    'job_vacancy' => $job->job_vacancy,
                    'hired_count' => $job->hired_count,
                    'pending_count' => $job->pending_count,
                ];
            });
        });
    
        return response()->json(['data' => $flattenedData]);
    }
    
      

}
