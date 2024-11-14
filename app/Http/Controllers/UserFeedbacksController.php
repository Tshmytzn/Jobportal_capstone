<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserFeedbacks;

class UserFeedbacksController extends Controller
{
    public function getAgencyFeedbacks() {

        return response()->json(['message' => 'test'], 404);
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
    
    
    
}
