<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobQuestion;
use App\Models\JobQuestionAnswer;
use App\Models\JobQuestionTitle;
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


}
