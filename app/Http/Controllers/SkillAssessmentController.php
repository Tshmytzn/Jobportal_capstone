<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assessment;
use App\Models\Section;
use App\Models\Question;
use App\Models\Option;
use App\Models\JobCategory;
use Illuminate\Http\Response;

class SkillAssessmentController extends Controller
{

    public function fetchAssessments()
    {
        try {
            // Fetch all assessments
            $assessments = Assessment::all(); // You can modify this to include pagination or filtering as needed

            // Format the data if needed
            $formattedAssessments = $assessments->map(function ($assessment) {
                return [
                    'id' => $assessment->id,
                    'title' => $assessment->title,
                    'description' => $assessment->description,
                    'sections' => $assessment->sections, // assuming you have a sections relationship
                    'createdAt' => $assessment->created_at,
                ];
            });

            return response()->json($formattedAssessments);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Could not fetch assessments'], 500);
        }
    }

    public function store(Request $request)
        {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'sections' => 'required|array',
            ]);
            $reset= Assessment::all();
            foreach($reset as $res){
                $res->delete();
                // $deletesec= Section::all();
                // foreach($deletesec as $sec){
                //     $sec->delete();
                //     $deleteques = Question::all();
                //     foreach($deleteques as $ques){
                //         $ques->delete();
                //         $deleteop = Option::all()->delete();
                //     }
                // }
            }

            $assessment = Assessment::create([
                'title' => $validated['title'],
                'description' => $validated['description'],
            ]);

            foreach ($validated['sections'] as $sectionData) {
                $section = Section::create([
                    'assessment_id' => $assessment->id,
                    'title' => $sectionData['title'],
                    'description' => $sectionData['description'],
                    'job_category' => $sectionData['jobCat']
                ]);

                foreach ($sectionData['questions'] as $questionData) {
                    $question = Question::create([
                        'section_id' => $section->id,
                        'question_text' => $questionData['question_text'],
                        'question_type' => $questionData['question_type'],
                    ]);

                    foreach ($questionData['options'] as $optionText) {
                        Option::create([
                            'question_id' => $question->id,
                            'option_text' => $optionText,
                        ]);
                    }
                }
            }

            return response()->json(['success' => true, 'message' => 'Assessment created successfully!']);
        }

        public function destroy($id)
        {
            $assessment = Assessment::find($id);

            if ($assessment) {
                $assessment->delete();
                return response()->json(['message' => 'Assessment deleted successfully.']);
            } else {
                return response()->json(['error' => 'Assessment not found.'], 404);
            }
        }

            // Method to fetch a single assessment by ID
            public function show($id)
            {
                try {
                    $assessment = Assessment::with(['sections.questions.options'])->findOrFail($id);

                    return response()->json([
                        'id' => $assessment->id,
                        'title' => $assessment->title,
                        'description' => $assessment->description,
                        'createdAt' => $assessment->created_at,
                        'sections' => $assessment->sections->map(function ($section) {
                            return [
                                'id' => $section->id,
                                'title' => $section->title,
                                'description' => $section->description,
                                'questions' => $section->questions->map(function ($question) {
                                    return [
                                        'id' => $question->id,
                                        'question_text' => $question->question_text,
                                        'question_type' => $question->question_type,
                                        'options' => $question->options->map(function ($option) {
                                            return [
                                                'id' => $option->id,
                                                'option_text' => $option->option_text,
                                            ];
                                        }),
                                    ];
                                }),
                            ];
                        }),
                    ]);
                } catch (\Exception $e) {
                    return response()->json(['error' => 'Assessment not found'], 404);
                }
            }

    // public function update(Request $request, $id)
    // {
    //     $validated = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //     ]);

    //     try {
    //         $assessment = Assessment::findOrFail($id);
    //         $assessment->update([
    //             'title' => $validated['title'],
    //             'description' => $validated['description'],
    //         ]);

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Assessment updated successfully!',
    //         ], 200);
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => 'Could not update assessment'], 500);
    //     }
    // }

    public function saveAssessment(Request $request)
    {
        // Validate incoming data
        $request->validate([
            'selectedAnswers' => 'required|string',
            'assessmentId' => 'required|integer|exists:assessments,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Decode JSON string of selected answers
        $selectedAnswers = json_decode($request->input('selectedAnswers'), true);

        // Process each answer
        foreach ($selectedAnswers as $questionId => $optionId) {
            // Find the question by ID
            $question = Question::find($questionId);

            if ($question) {

                $question->answer = $optionId;
                $question->save();
            }
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Assessment answers saved successfully!',
        ], 200);
    }

    public function getJobCategories(Request $req){
        $job = JobCategory::all();

        return response()->json(['data'=> $job]);
    }
}
