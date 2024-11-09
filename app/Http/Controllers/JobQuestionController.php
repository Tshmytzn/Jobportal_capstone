<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobQuestion;
use App\Models\JobQuestionAnswer;
use App\Models\JobQuestionTitle;
use App\Models\JobseekerAssessmentResult;
use App\Models\Jobseeker;
class JobQuestionController extends Controller
{
    public function AddQuestion(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'jd_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'question' => 'required|array',
            'option' => 'required|array',
            'status' => 'required|array',
        ]);

        // Create a new JobQuestionTitle record
        $title = new JobQuestionTitle();
        $title->agency_id = session('agency_id');
        $title->jd_id = $request->jd_id;
        $title->title = $request->title;
        $title->save();

        // Loop through each question in the request
        foreach ($request->question as $index => $questionData) {
            // Check if $questionData is an array or a string
            if (is_array($questionData)) {
                // If it's an array, we can handle it accordingly (e.g., taking the first value or joining them)
                $questionText = implode(' ', $questionData); // Joining multiple question parts if needed
            } else {
                $questionText = $questionData;
            }

            // Create a new JobQuestion entry for the current question
            $question = new JobQuestion();
            $question->jqt_id = $title->id;
            $question->question = $questionText;  // Ensure this is a string
            $question->save();

            // Loop through the options and statuses for the current question
            if (isset($request->option[$index]) && is_array($request->option[$index]) && isset($request->status[$index]) && is_array($request->status[$index])) {
                foreach ($request->option[$index] as $key => $option) {
                    // Ensure the option and status are strings
                    $optionText = is_array($option) ? implode(' ', $option) : $option;
                    $statusText = $request->status[$index][$key];

                    // Create a JobQuestionAnswer entry for each option
                    $questionOption = new JobQuestionAnswer();
                    $questionOption->jq_id = $question->id;
                    $questionOption->answer = $optionText;  // Ensure this is a string
                    $questionOption->status = $statusText;  // Ensure this is a string
                    $questionOption->save();
                }
            } else {
                // Handle the case when options or statuses are not arrays (shouldn't happen if form is correct)
                return response()->json(['status' => 'error', 'message' => 'Option or status format is incorrect']);
            }
        }

        // Return success response after saving all questions and options
        return response()->json(['status' => 'success']);
    }


    public function GetAssessment()
    {
        $titles = JobQuestionTitle::join('job_details', 'job_question_title.jd_id', '=', 'job_details.id')
        ->where('job_question_title.agency_id', session('agency_id'))
        ->select('job_question_title.*', 'job_details.job_title')  // Select all from job_question_title and job_title from job_details
        ->get();
         $data = [];

        foreach ($titles as $title) {
            $questions = JobQuestion::where('jqt_id', $title->id)->get();
            $data2 = [];

            foreach ($questions as $question) {
                $answers = JobQuestionAnswer::where('jq_id', $question->id)->get();
                $data2[] = [
                    'question' => $question->question,
                    'answers' => $answers->map(function ($answer) {
                        return [
                            'answer' => $answer->answer,
                            'status' => $answer->status,
                        ];
                    }),
                ];
            }

            $data[] = [
                'title' => $title,
                'questions' => $data2,
            ];
        }

        return response()->json($data);
    }

    public function DeleteAssessment(request $request){
        $data = JobQuestionTitle::where('id',$request->id)->first();
        $questions = JobQuestion::where('jqt_id', $data->id)->get();
        foreach($questions as $question){
            JobQuestionAnswer::where('jq_id', $question->id)->delete();
            $question->delete();
        }
        $data->delete();
        return response()->json(['status' => 'success']);
    }

    public function LoadTestAssessment(request $request){
        $titles = JobQuestionTitle::where('jd_id',$request->id)->first();
        $questions = JobQuestion::where('jqt_id', $titles->id)->get();
        $data = [];
        foreach($questions as $question){
            $answers = JobQuestionAnswer::where('jq_id', $question->id)->get();
            $data[] = [
                'id'=>$titles->id,
                'question_id'=>$question->id,
                'question' => $question->question,
                'answer'=> $answers
            ];
        }
        return response()->json(['data' => $data]);
    }
    public function SubmitAssessmentTest(Request $request)
    {
        // Retrieve `question_id` and `flexRadioDefault` arrays from the request
        $questionIds = $request->input('question_id');
        $answers = $request->input('flexRadioDefault');

        // Initialize score counter
        $score = 0;

        // Loop through each question's answer and check if it is correct
        foreach ($questionIds as $index => $questionArray) {
            // Each question has a single ID in the array
            $questionId = $questionArray[0]; // Access the question ID

            // Get the answer for this question
            if (isset($answers[$index][0]) && $answers[$index][0] === 'Correct') {
                $score++; // Increment score if answer is correct
            }
        }

        // Determine the passing score based on the number of questions
        $totalQuestions = count($questionIds);
        if ($totalQuestions == 2) {
            $passingScore = $totalQuestions * 0.50; // 50% passing score for 2 questions
        } elseif ($totalQuestions > 3) {
            $passingScore = $totalQuestions * 0.75; // 75% passing score for more than 3 questions
        } else {
            $passingScore = $totalQuestions; // Default passing score for 3 or fewer questions (e.g., 100% for 3 questions)
        }

        // Set the passed status based on the score
        $passed = $score >= $passingScore ? 'pass' : 'not pass';

        // Save the assessment result in the database
        $data = new JobseekerAssessmentResult();
        $data->jobseeker_id = session('user_id');
        $data->assessment_id = $request->assId;
        $data->score = $score;
        $data->passed = $passed;
        $data->save();

        return response()->json(['status' => 'success']);
    }

    public function AssessmentList(request $request){
        $titles = JobQuestionTitle::join('job_details', 'job_question_title.jd_id', '=', 'job_details.id')
        ->where('job_details.agency_id', session('agency_id'))
        ->select('job_question_title.*', 'job_details.job_title') // Select all columns from job_question_title and only job_title from job_details
        ->get();
        $data = [];
        foreach($titles as $title){
            $data[]=[
                'test'=>$title,
                'result'=> $result = JobseekerAssessmentResult::where('assessment_id', $title->id)->first(),
                'user'=>$jobseeker = Jobseeker::where('js_id', $result->jobseeker_id)->first(),
            ];
        }
        return response()->json(['data' => $data]);
    }

}
