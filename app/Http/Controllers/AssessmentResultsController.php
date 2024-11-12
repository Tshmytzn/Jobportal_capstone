<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jobseeker;
use App\Models\JobseekerSkillAnswers;
use App\Models\AssessmentResult;
use App\Models\Question;
use App\Models\Section;
use App\Models\JobDetails;
use App\Models\JobseekerGlobalAnswer;
use App\Models\JobseekerSkillAssessmentResult;


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

            $checkResult = JobseekerSkillAssessmentResult::where('section_id', $question->section_id)
                            ->where('jobseeker_id', $jobseekerId)->first();


            if(!$checkResult){
                $newResult = new JobseekerSkillAssessmentResult();
                $newResult->jobseeker_id = $jobseekerId;
                $newResult->section_id = $question->section_id;
                $newResult->score = 0;
                $newResult->total_items = Question::where('section_id', $question->section_id)->get()->count();
                $newResult->percentage = 0;
                $newResult->save();
            }
            if ($jobseekerAnswer) {
                // Compare the jobseeker's selected option_id with the stored correct option_id
                $correctOptionId = $question->answer; // This stores option_id as the correct answer

                if ($jobseekerAnswer->option_id == $correctOptionId) {
                    $correctAnswersCount++; // Increment correct answer count
                    if($checkResult){
                        $checkResult->update([
                            'score'=> $checkResult->score + 1,
                            'percentage' => (($checkResult->score + 1) / $checkResult->total_items) * 100
                        ]);

                    }else{
                        $newResult->update([
                            'score'=> $newResult->score + 1,
                            'percentage' => (($newResult->score + 1) / $newResult->total_items) * 100
                        ]);
                    }
                }
            }
        }



        // Determine if the jobseeker passed or failed (70% or higher correct answers)
        $passed = $correctAnswersCount >= ($totalQuestions * 0.7) ? 'Passed' : 'Failed';

        // Save the result in the assessment_results table
        $assessmentResult = AssessmentResult::create([
            'jobseeker_id' => $jobseekerId,
            'assessment_id' => $assessmentId,
            'correct_answers' => $correctAnswersCount, // Store the correct answer count
            'total_questions' => $totalQuestions, // Store the total questions count
            'score' => $correctAnswersCount, // Store the number of correct answers as the score
            'passed' => $passed, // Store 'Passed' or 'Failed'
        ]);

        // If the jobseeker passed, set the badge image
        if ($passed == 'Passed') {
            // Update the jobseeker's js_badge field with the path to the badge image
            $jobseeker = Jobseeker::find($jobseekerId);
            $jobseeker->js_badge = 'badge.png';
            $jobseeker->save();
        }

        return $correctAnswersCount;
    }

    public function getAssessmentResults(Request $request)
    {
        $jobseekerId = session('user_id');

        $result = AssessmentResult::where('jobseeker_id', $jobseekerId)->latest()->first();

        if ($result) {

            $percentage = ($result->correct_answers / $result->total_questions) * 100;

            return response()->json([
                'status' => 'success',
                'score' => $result->correct_answers,
                'percentage' => number_format($percentage, 2),
                'passed' => $result->passed,
                'total_questions' => $result->total_questions,
                'correct_answers' => $result->correct_answers
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'No assessment results found for this user.'
            ]);
        }
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

    public function recommendedJob(){
        $result = JobseekerSkillAssessmentResult::where('jobseeker_id', session('user_id'))->get();
        $categories = [];
        foreach($result as $res){
            $section = Section::where('id', $res->section_id)->first();
            $assessmentResult = JobseekerSkillAssessmentResult::where('section_id', $res->section_id)->first();
            if($assessmentResult->percentage > 75){
                $categories[] = $section->job_category;
            }
        }

        $joblist = JobDetails::whereIn('category_id', $categories)->get();

        return response()->json(['data'=> $joblist]);

    }

}
