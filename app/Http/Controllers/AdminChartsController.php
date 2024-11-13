<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JobseekerApplication;
use Illuminate\Http\Request;
use App\Models\Jobseeker;
use App\Models\Agency;
use Carbon\Carbon;

class AdminChartsController extends Controller
{


    public function getRegistrationsData()
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
    
        $jobseekerCounts = [];
        $agencyCounts = [];
        $months = [];
    
        for ($i = 0; $i < 12; $i++) {
            $month = Carbon::create($currentYear, $currentMonth - $i, 1); 
            $monthLabel = $month->format('M'); 
    
            array_unshift($months, $monthLabel);
    
            $jobseekerCount = Jobseeker::whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->count();
            $agencyCount = Agency::whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->count();
    
            array_unshift($jobseekerCounts, $jobseekerCount);
            array_unshift($agencyCounts, $agencyCount);
        }
    
        return response()->json([
            'labels' => $months,         
            'jobseekers' => $jobseekerCounts, 
            'agencies' => $agencyCounts, 
        ]);
    }

    public function getHiredJobseekersData() {

        $hiredJobseekers = JobseekerApplication::where('js_status', 'hired') 
        ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->groupBy('month')
        ->orderBy('month')
        ->get();
    
    $declinedJobseekers = JobseekerApplication::where('js_status', 'declined') 
        ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->groupBy('month')
        ->orderBy('month')
        ->get();
    
    $labels = ['Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov'];
    
    $hiredJobseekersData = array_fill(0, 12, 0);
    foreach ($hiredJobseekers as $jobseeker) {
        $hiredJobseekersData[$jobseeker->month - 1] = $jobseeker->count;  
    }
    
    $declinedJobseekersData = array_fill(0, 12, 0);
    foreach ($declinedJobseekers as $jobseeker) {
        $declinedJobseekersData[$jobseeker->month - 1] = $jobseeker->count;  
    }
    
    return response()->json([
        'labels' => $labels,
        'hiredJobseekers' => $hiredJobseekersData,
        'declinedJobseekers' => $declinedJobseekersData,
    ]);

    }
    
}
