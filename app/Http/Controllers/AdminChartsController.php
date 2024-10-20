<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jobseeker;
use App\Models\Agency;

class AdminChartsController extends Controller
{


    public function getMonthlyRegistrations()
    {
        // Get the count of job seekers and agencies
        $jobseekerCount = Jobseeker::count();
        $agencyCount = Agency::count();

        // Prepare the data to return
        return response()->json([
            'jobseekers' => $jobseekerCount,
            'agencies' => $agencyCount,
        ]);
    }
    }
