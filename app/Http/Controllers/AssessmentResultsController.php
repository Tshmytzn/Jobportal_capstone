<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jobseeker;
use App\Models\JobseekerSkillAnswers;
use App\Models\AssessmentResult;
use App\Models\Question;
use App\Models\Section;
use App\Models\JobseekerGlobalAnswer;


class AssessmentResultsController extends Controller
{

    public function submit(Request $request)
    {
        $jobseekerId = $request->input('js_id');
        $assessmentId = $request->input('assessment_id'); // Assuming assessment_id is sent with the request

        // Save the jobseeker's answers
        foreach ($request->all() as $key => $value) {
            if (str_starts_with($key, 'q')) {
                $questionId = (int) str_replace('q', '', $key);
                $answer = new JobseekerGlobalAnswer();
                $answer->js_id = $jobseekerId;
                $answer->question_id = $questionId;

                if (is_array($value)) {
                    // Handle checkbox type questions (multiple options selected)
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

        // After saving the answers, calculate the result
        $this->calculateResults($jobseekerId, $assessmentId);

        return response()->json(['status' => 'success', 'message' => 'Assessment submitted and results calculated successfully!']);
    }

    public function calculateResults($jobseekerId, $assessmentId)
    {
        // Fetch the sections associated with the assessment
        $sections = Section::where('assessment_id', $assessmentId)->get();
    
        // Fetch all the questions belonging to these sections
        $questions = Question::whereIn('section_id', $sections->pluck('id'))->get();
    
        // Fetch the jobseeker's answers
        $jobseekerAnswers = JobseekerGlobalAnswer::where('js_id', $jobseekerId)->get();
    
        $correctAnswersCount = 0;
        $totalQuestions = $questions->count();
    
        // Loop through each question and compare answers
        foreach ($questions as $question) {
            // Find the jobseeker's answer for this question
            $jobseekerAnswer = $jobseekerAnswers->firstWhere('question_id', $question->id);
    
            if ($jobseekerAnswer) {
                // Ensure strict match after trimming both the jobseeker's answer and the correct answer
                $correctAnswer = trim($question->answer);
                $jobseekerResponse = trim($jobseekerAnswer->answer_text);
    
                // Compare the jobseeker's answer to the correct answer (strict match)
                if ($jobseekerResponse === $correctAnswer) {
                    $correctAnswersCount++; // Increment correct answer count
                }
            }
        }
    
        // Determine if the jobseeker passed or failed (70% or higher correct answers)
        $passed = $correctAnswersCount >= ($totalQuestions * 0.7) ? 'Passed' : 'Failed';
    
        // Save the result in the assessment_results table
        AssessmentResult::create([
            'jobseeker_id' => $jobseekerId,
            'assessment_id' => $assessmentId,
            'correct_answers' => $correctAnswersCount, // Store the correct answer count
            'total_questions' => $totalQuestions, // Store the total questions count
            'score' => $correctAnswersCount, // Store the number of correct answers as the score
            'passed' => $passed, // Store 'Passed' or 'Failed'
        ]);
    
        return $correctAnswersCount;
    }
    
    
    

    //     public function calculateResults($jobseekerId, $assessmentId)
    // {
    //     // Fetch the sections associated with the assessment
    //     $sections = Section::where('assessment_id', $assessmentId)->get();

    //     // Fetch all the questions belonging to these sections
    //     $questions = Question::whereIn('section_id', $sections->pluck('id'))->get();

    //     // Fetch the jobseeker's answers
    //     $jobseekerAnswers = JobseekerGlobalAnswer::where('js_id', $jobseekerId)->get();

    //     $correctAnswersCount = 0;
    //     $totalQuestions = $questions->count();

    //     // Loop through each question and compare answers
    //     foreach ($questions as $question) {
    //         // Find the jobseeker's answer for this question
    //         $jobseekerAnswer = $jobseekerAnswers->firstWhere('question_id', $question->id);

    //         if ($jobseekerAnswer) {
    //             // Compare the jobseeker's answer to the correct answer
    //             if ($jobseekerAnswer->answer_text == $question->answer) {
    //                 $correctAnswersCount++;
    //             }
    //         }
    //     }

    //     // Calculate the score percentage
    //     $score = ($correctAnswersCount / $totalQuestions) * 100;

    //     // Determine if the jobseeker passed (70% or above)
    //     $passed = $score >= 70 ? true : false;

    //     // Save the result
    //     AssessmentResult::create([
    //         'jobseeker_id' => $jobseekerId,
    //         'assessment_id' => $assessmentId,
    //         'score' => $score,
    //         'passed' => $passed,
    //     ]);

    //     return $score;
    // }



    //    public function submit(Request $request)
    // {
    //     $jobseekerId = $request->input('js_id');

    //     foreach ($request->all() as $key => $value) {
    //         if (str_starts_with($key, 'q')) {
    //             $questionId = (int) str_replace('q', '', $key);
    //             $answer = new JobseekerGlobalAnswer();
    //             $answer->js_id = $jobseekerId;
    //             $answer->question_id = $questionId;

    //             if (is_array($value)) {
    //                 // Handle checkbox type questions
    //                 foreach ($value as $optionId) {
    //                     $answer->option_id = $optionId;
    //                     $answer->save();
    //                 }
    //             } else {
    //                 // Handle radio or text type questions
    //                 $answer->option_id = $value ? $value : null; // For radio questions
    //                 $answer->answer_text = is_string($value) ? $value : null; // For text questions
    //                 $answer->save();
    //             }
    //         }
    //     }

    //     return response()->json(['status' => 'success', 'message' => 'Assessment submitted successfully!']);
    // }

}
