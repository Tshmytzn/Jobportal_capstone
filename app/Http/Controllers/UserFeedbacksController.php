<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserFeedbacks;

class UserFeedbacksController extends Controller
{
    public function getJobseekerFeedbacks() {
        $jobRequests = UserFeedbacks::where('feedback_type', 'jobseeker') 
            ->orderBy('id', 'desc')  
            ->join('jobseeker_application', 'user_feedbacks.application_id', '=', 'jobseeker_application.id') 
            ->join('job_details', 'jobseeker_application.job_id', '=', 'job_details.id') 
            ->select('user_feedbacks.*', 'jobseeker_application.applicant_name', 'job_details.job_title')  
            ->get();
    
        return response()->json([
            'data' => $jobRequests->map(function($jobRequest) {
                return [
                    'id' => $jobRequest->id,
                    'application_id' => $jobRequest->application_id,
                    'user_id' => $jobRequest->user_id,
                    'feedback_type' => $jobRequest->feedback_type,
                    'rating' => $jobRequest->rating,
                    'comments' => $jobRequest->comments,
                    'created_at' => $jobRequest->created_at->format('Y-m-d H:i:s'),
                    'updated_at' => $jobRequest->updated_at->format('Y-m-d H:i:s'),
                    'applicant_name' => $jobRequest->applicant_name,  
                    'job_title' => $jobRequest->job_title,
                    
                ];
            })
        ]);
    }

    public function getAgencyFeedbacks() {
        $jobRequests = UserFeedbacks::where('feedback_type', 'jobseeker') 
            ->orderBy('id', 'desc')  
            ->join('jobseeker_application', 'user_feedbacks.application_id', '=', 'jobseeker_application.id') 
            ->join('job_details', 'jobseeker_application.job_id', '=', 'job_details.id') 
            ->select('user_feedbacks.*', 'jobseeker_application.applicant_name', 'job_details.job_title')  
            ->get();
    
        return response()->json([
            'data' => $jobRequests->map(function($jobRequest) {
                return [
                    'id' => $jobRequest->id,
                    'application_id' => $jobRequest->application_id,
                    'user_id' => $jobRequest->user_id,
                    'feedback_type' => $jobRequest->feedback_type,
                    'rating' => $jobRequest->rating,
                    'comments' => $jobRequest->comments,
                    'created_at' => $jobRequest->created_at->format('Y-m-d H:i:s'),
                    'updated_at' => $jobRequest->updated_at->format('Y-m-d H:i:s'),
                    'applicant_name' => $jobRequest->applicant_name,  
                    'job_title' => $jobRequest->job_title,
                    
                ];
            })
        ]);
    }
    
    
    public function submitFeedback(Request $request)
    {
        $request->validate([
            'application_id' => 'required|exists:jobseeker_application,id',
            'user_id' => 'required|exists:jobseeker_application,js_id',
            'rating' => 'required|integer|between:1,5',
            'comments' => 'required|string',
        ]);
    
        UserFeedbacks::create([
            'application_id' => $request->input('application_id'),
            'user_id' => $request->input('user_id'),
            'feedback_type' => 'jobseeker',
            'rating' => $request->input('rating'),
            'comments' => $request->input('comments'),
        ]);
    
        return response()->json([
            'status' => 'success',
            'message' => 'Thank you for your feedback!',
        ]);
    }
    
    public function submitagencyfeedback(Request $request){

        $check = UserFeedbacks::where('application_id',$request->jd_id)->where('user_id', session('agency_id'))->first();
        if($check){
            return response()->json([
                'status' => 'error',
                'message' => 'You already submitted feedback for this job detail',
            ]);
        }
        $data = new UserFeedbacks();
        $data->application_id = $request->jd_id;
        $data->user_id = session('agency_id');
        $data->feedback_type = 'agency';
        $data->rating = $request->rating;
        $data->comments = $request->comments;
        $data->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Thank you for your feedback!',
            'form'=> 'feedbackform'
            ]);
    }
    public function getallagencyfeedback(){
        $data = UserFeedbacks::join('agencies', 'user_feedbacks.user_id', '=', 'agencies.id')
            ->join('job_details', 'user_feedbacks.application_id', '=', 'job_details.id')
            ->where('feedback_type', 'agency')
            ->get();

        return response()->json(['data' => $data]);

    }
}
