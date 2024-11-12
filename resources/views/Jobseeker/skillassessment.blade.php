@php
    use App\Models\Assessment;
    use App\Models\AssessmentResult;

    $skillassessment = Assessment::with('sections.questions.options')->first();

    $userId = session('user_id');
    $assessmentId = $skillassessment ? $skillassessment->id : null;
    $existingResult = \App\Models\AssessmentResult::where('jobseeker_id', session('user_id'))
                            ->where('assessment_id', $skillassessment->id)
                            ->first();

@endphp

<!DOCTYPE html>
<html lang="en">

@include('Jobseeker.components.head', ['title' => 'Skill Assessment'])

<body>
    @include('Jobseeker.components.spinner')
    @include('Jobseeker.components.navbar', ['active' => 'skills'])

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <ul class="breadcrumb-animation">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>

    @if ($skillassessment)
        @if ($existingResult)

        @php
        $percentage = ($existingResult->score / $existingResult->total_questions) * 100;
    @endphp
            <!-- Display existing result if the assessment has already been submitted -->
            <div class="container text-center my-5">
                <h3 class="mb-4">Assessment Already Submitted</h3>
                <p class="text-muted">You have already submitted this assessment. Here are your results:</p>

                <div class="card my-4 mx-auto shadow-lg" style="max-width: 600px; border-radius: 12px;">
                    <div class="card-header bgp-gradient text-white" style="border-radius: 12px 12px 0 0;">
                        <h5 class="mb-0 text-white ">Your Assessment Results</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 text-center">
                                <h6 class="font-weight-bold text-muted">Score</h6>
                                <p class="display-4 text-primary">{{ number_format($percentage, 2) }}%</p>
                            </div>
                            <div class="col-6 text-center">
                                <h6 class="font-weight-bold text-muted">Passed</h6>
                                <p class="display-4 text-success">{{ $existingResult->passed ? 'Yes' : 'No' }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row text-center">
                            <div class="col-6">
                                <h6 class="font-weight-bold text-muted">Correct Answers</h6>
                                <p>{{ $existingResult->correct_answers }} / {{ $existingResult->total_questions }}</p>
                            </div>
                            <div class="col-6">
                                <h6 class="font-weight-bold text-muted">Total Questions</h6>
                                <p>{{ $existingResult->total_questions }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @else
            <!-- Display the assessment form if no previous result exists -->
            <div id="loading" style="display: none;">Loading...</div>
            <form id="assessmentForm" method="POST">
                @csrf
                <input type="hidden" name="js_id" value="{{ $userId }}">
                <input type="hidden" name="assessment_id" value="{{ $assessmentId }}">

                <div class="container text-center py-1" style="max-width: 900px;">
                    <h3 class="h1 mb-1 wow fadeInDown" data-wow-delay="0.1s">{{ $skillassessment->title }}</h3>
                    <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                        <li class="breadcrumb-item"><a
                                href="{{ route('homepage') }}">{{ $skillassessment->description }}</a></li>
                    </ol>
                </div>

                <div class="container my-5">
                    @foreach ($skillassessment->sections as $section)
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="mb-0">{{ $section->title }} @if($section->job_category != null)
                                        @php
                                            $job_category = App\Models\JobCategory::where('id', $section->job_category)->first();
                                        @endphp

                                        <span class="text-muted">({{ $job_category->name }})</span>
                                    @endif
                                </h5>
                            </div>
                            <div class="card-body">
                                <p>{{ $section->description }}</p>

                                @foreach ($section->questions as $question)
                                    <div class="mb-3">
                                        <h6 class="font-weight-bold">{{ $question->question_text }}</h6>

                                        @foreach ($question->options as $option)
                                            <div class="form-check">
                                                @if ($question->question_type == 'multiple')
                                                    <input class="form-check-input" type="checkbox"
                                                        name="q{{ $question->id }}[]"
                                                        id="q{{ $question->id }}_{{ $option->option_text }}"
                                                        value="{{ $option->option_text }}">
                                                @else
                                                    <input class="form-check-input" type="radio"
                                                        name="q{{ $question->id }}"
                                                        id="q{{ $question->id }}_{{ $option->option_text }}"
                                                        value="{{ $option->option_text }}">
                                                @endif
                                                <label class="form-check-label"
                                                    for="q{{ $question->id }}_{{ $option->option_text }}">
                                                    {{ $option->option_text }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                    <button class="btn bgp-gradient btn-lg" type="button" onclick="submitAssessment()">Submit
                        Assessment</button>
                </div>
            </form>
        @endif
    @else
        <div class="container text-center my-5">
            <h5>No assessment available at this time.</h5>
            <p>Please check back later or contact support for assistance.</p>
        </div>
    @endif

    @include('Jobseeker.components.footer')
    @include('Jobseeker.components.scripts')
    @include('Jobseeker.components.skillassessmentscripts')
    @include('Jobseeker.components.resultsskillassessmentmodal')

</body>

</html>
