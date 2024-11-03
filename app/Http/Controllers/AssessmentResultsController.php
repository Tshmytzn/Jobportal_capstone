<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jobseeker;
use App\Models\JobseekerSkillAnswers;
use App\Models\AssessmentResult;
use App\Models\Question;

class AssessmentResultsController extends Controller
{

    public function submitAssessment(Request $request)
    
    {
        $request->validate([
            'jobseeker_id' => 'required|exists:jobseekers,id',
            'assessment_id' => 'required|exists:assessments,id',
            'answers' => 'required|array',
            'answers.*' => 'exists:options,id',  // Ensures each answer exists in options
        ]);

        $jobseekerId = $request->input('jobseeker_id');
        $assessmentId = $request->input('assessment_id');
        $answers = $request->input('answers');

        // Save each answer
        foreach ($answers as $questionId => $optionId) {
            JobseekerAnswer::create([
                'jobseeker_id' => $jobseekerId,
                'question_id' => $questionId,
                'option_id' => $optionId,
            ]);
        }

        // Calculate score
        $score = 0;
        $totalQuestions = count($answers);

        foreach ($answers as $questionId => $optionId) {
            $question = Question::find($questionId);

            // Increment score if the answer matches
            if ($question->answer == $optionId) {
                $score++;
            }
        }

        // Set a passing score threshold, e.g., 60%
        $passingScore = 0.6 * $totalQuestions;
        $passed = $score >= $passingScore;

        // Store the assessment result
        AssessmentResult::create([
            'jobseeker_id' => $jobseekerId,
            'assessment_id' => $assessmentId,
            'score' => $score,
            'passed' => $passed,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Assessment submitted successfully!',
            'score' => $score,
            'passed' => $passed,
        ]);
    }
}
