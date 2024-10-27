<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assessment;
use App\Models\Section;
use App\Models\Question;
use App\Models\Option;
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

            $assessment = Assessment::create([
                'title' => $validated['title'],
                'description' => $validated['description'],
            ]);

            foreach ($validated['sections'] as $sectionData) {
                $section = Section::create([
                    'assessment_id' => $assessment->id,
                    'title' => $sectionData['title'],
                    'description' => $sectionData['description'],
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
                return response()->json(['message' => 'Assessment deleted successfully.'], Response::HTTP_OK);
            } else {
                return response()->json(['message' => 'Assessment not found.'], Response::HTTP_NOT_FOUND);
            }
        }
    }
