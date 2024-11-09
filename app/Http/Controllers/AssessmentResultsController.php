<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jobseeker;
use App\Models\JobseekerSkillAnswers;
use App\Models\AssessmentResult;
use App\Models\Question;
use App\Models\JobseekerGlobalAnswer;


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
            JobseekerSkillAnswers::create([
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


       public function submit(Request $request)
    {
        $jobseekerId = $request->input('js_id');

        foreach ($request->all() as $key => $value) {
            if (str_starts_with($key, 'q')) {
                $questionId = (int) str_replace('q', '', $key);
                $answer = new JobseekerGlobalAnswer();
                $answer->js_id = $jobseekerId;
                $answer->question_id = $questionId;

                if (is_array($value)) {
                    // Handle checkbox type questions
                    foreach ($value as $optionId) {
                        $answer->option_id = $optionId;
                        $answer->save();
                    }
                } else {
                    // Handle radio or text type questions
                    $answer->option_id = $value ? $value : null; // For radio questions
                    $answer->answer_text = is_string($value) ? $value : null; // For text questions
                    $answer->save();
                }
            }
        }

        return response()->json(['status' => 'success', 'message' => 'Assessment submitted successfully!']);
    }

}
