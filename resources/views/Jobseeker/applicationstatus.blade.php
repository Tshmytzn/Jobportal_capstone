<!DOCTYPE html>
<html lang="en">

@include('Jobseeker.components.head', ['title' => 'Job Portal'])

<style>
    .card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: scale(1.05);
    }

    .card-header {
        background: linear-gradient(135deg, #007bff, #6c757d);
        color: white;
        padding: 1rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .job-title {
        font-size: 1.25rem;
        font-weight: bold;
    }

    .company-name {
        font-size: 0.9rem;
        font-weight: 500;
    }

    .card-body {
        padding: 1rem;
    }

    .status-icon {
        font-size: 1.5rem;
        color: #28a745;
        margin-right: 0.5em;
    }

    .timeline {
        margin-top: 1rem;
    }

    .timeline-step {
        display: flex;
        align-items: center;
        margin-bottom: 0.5em;
    }

    .timeline-step .circle {
        width: 12px;
        height: 12px;
        background-color: #ced4da;
        border-radius: 50%;
        margin-right: 0.5em;
    }

    .timeline-step.active .circle {
        background-color: #28a745;
    }

    .step-label {
        font-size: 0.85rem;
    }

    .star-rating {
        font-size: 2rem;
        color: #ccc;
        cursor: pointer;
        transition: color 0.3s ease;
        padding: 0 5px;
    }

    .star-rating:hover,
    .star-rating.checked {
        color: gold;
    }

    input[type="radio"] {
        display: none;
    }

    input[type="radio"]:checked~label {
        color: gold;
    }

    input[type="radio"]:checked:nth-of-type(1)~label,
    input[type="radio"]:checked:nth-of-type(2)~label,
    input[type="radio"]:checked:nth-of-type(3)~label,
    input[type="radio"]:checked:nth-of-type(4)~label,
    input[type="radio"]:checked:nth-of-type(5)~label {
        color: gold;
    }

    input[type="radio"]:checked~label,
    input[type="radio"]:checked~label~label,
    input[type="radio"]:checked~label~label~label,
    input[type="radio"]:checked~label~label~label~label {
        color: gold;
    }
</style>

<body>

    @include('Jobseeker.components.spinner')

    @include('Jobseeker.components.navbar', ['active' => 'blank'])

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
        <div class="container text-center py-1" style="max-width: 900px;">
            <h3 class="h1 mb-1 wow fadeInDown" data-wow-delay="0.1s"> Job Applications Status</h3>
            <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="#">Track the status of each application at a glance</a></li>
            </ol>
        </div>
    </div>
    <!-- Header End -->


    @php
        use App\Models\JobseekerApplication;
        use App\Models\UserFeedbacks;

        $applications = JobseekerApplication::where('js_id', session('user_id'))
            ->with(['job.agency'])
            ->get();

        $hiredApplication = $applications->firstWhere('js_status', 'hired');

        $hasHiredStatus = $applications->contains(function ($application) {
            return $application->js_status == 'hired';
        });

        $hasSubmittedFeedback = $hiredApplication
            ? UserFeedbacks::where('application_id', $hiredApplication->id)->exists()
            : false;
    @endphp


    <!-- Feedback Modal -->
    <div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bgp-gradient">
                    <h5 class="modal-title text-white" id="exampleModalLabel"> We Value Your Feedback </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-primary">Congratulations on getting hired! We’d love to hear your feedback on your
                        application process.
                    </p>
                    <form id="SubmitContactForm" class="needs-validation" novalidate>

                        <input type="hidden" name="application_id" id="application_id"
                            value="{{ $hiredApplication->id ?? '' }}">
                        <input type="hidden" name="user_id" id="user_id"
                            value="{{ $hiredApplication->js_id ?? '' }}">

                        <div class="form-group mb-2">
                            <label class="mb-2" for="rating"> <strong> How would you rate your experience?
                                </strong></label>

                            <div class="container-wrapper">
                                <div class="container d-flex align-items-center justify-content-center">
                                    <div class="row justify-content-center">

                                        <!-- Star Rating -->
                                        <div class="rating-wrapper">

                                            <!-- Star 5 -->
                                            <input type="radio" id="5-star-rating" name="star-rating" value="5">
                                            <label for="5-star-rating" class="star-rating">
                                                <i class="fas fa-star d-inline-block"></i>
                                            </label>

                                            <!-- Star 4 -->
                                            <input type="radio" id="4-star-rating" name="star-rating" value="4">
                                            <label for="4-star-rating" class="star-rating">
                                                <i class="fas fa-star d-inline-block"></i>
                                            </label>

                                            <!-- Star 3 -->
                                            <input type="radio" id="3-star-rating" name="star-rating" value="3">
                                            <label for="3-star-rating" class="star-rating">
                                                <i class="fas fa-star d-inline-block"></i>
                                            </label>

                                            <!-- Star 2 -->
                                            <input type="radio" id="2-star-rating" name="star-rating" value="2">
                                            <label for="2-star-rating" class="star-rating">
                                                <i class="fas fa-star d-inline-block"></i>
                                            </label>
                                            <!-- Star 1 -->
                                            <input type="radio" id="1-star-rating" name="star-rating" value="1">
                                            <label for="1-star-rating" class="star-rating">
                                                <i class="fas fa-star d-inline-block"></i>
                                            </label>


                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Comments -->
                        <div class="form-group mb-2">
                            <label class="mb-2" for="comments"> <strong> Tell us more about your experience
                                </strong></label>
                            <textarea class="form-control" id="comments" name="comments" rows="4" placeholder="Write your feedback here..."
                                required></textarea>
                            <div class="invalid-feedback">Please enter your comments.</div>
                        </div>

                        <button class="btn btn-primary btn-block mt-4" onclick="SubmitFeedback('SubmitContactForm')"
                            role="button" type="button">Submit Feedback</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @php
        $hasSubmittedFeedback = $hiredApplication
            ? UserFeedbacks::where('application_id', $hiredApplication->id)->exists()
            : false;
    @endphp

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if ($hasHiredStatus && !$hasSubmittedFeedback)
                var feedbackModal = new bootstrap.Modal(document.getElementById('feedbackModal'));
                feedbackModal.show();
            @endif
        });
    </script>


    <!-- Progress for Job Application -->
    <div class="container my-5">
        <div class="row mb-2">

            @php

                $applications = JobseekerApplication::where('js_id', session('user_id'))
                    ->with(['job.agency'])
                    ->get();
            @endphp

            @foreach ($applications as $application)
                <div class="card col-4 mx-auto mb-5" style="width: 400px;">
                    <div class="card-header">
                        <div>
                            <div class="job-title">{{ $application->job->job_title ?? 'Job Title Not Found' }}</div>
                            <div class="company-name">
                                {{ $application->job->agency->agency_name ?? 'Agency Name Not Found' }}</div>
                        </div>
                        <span class="status-icon">⚡</span>
                    </div>
                    <div class="card-body">
                        <p>Location: <strong>{{ $application->job->job_location ?? 'Location Not Available' }}</strong>
                        </p>
                        <p>Applied on: <strong>{{ $application->created_at->format('M d, Y') }}</strong></p>
                        <div class="timeline">
                            {{-- Pending Application --}}
                            <div class="timeline-step {{ $application->js_status == 'pending' ? 'active' : '' }}">
                                <div class="circle"></div>
                                <span class="step-label">Pending Application</span>
                            </div>

                            {{-- Disqualified --}}
                            <div class="timeline-step {{ $application->js_status == 'disqualified' ? 'active' : '' }}">
                                <div class="circle"></div>
                                <span class="step-label">Disqualified</span>
                            </div>

                            {{-- Screening --}}
                            <div class="timeline-step {{ $application->js_status == 'qualified' ? 'active' : '' }}">
                                <div class="circle"></div>
                                <span class="step-label">Screening</span>
                            </div>

                            {{-- Declined --}}
                            <div class="timeline-step {{ $application->js_status == 'declined' ? 'active' : '' }}">
                                <div class="circle"></div>
                                <span class="step-label">Declined</span>
                            </div>

                            {{-- Hired --}}
                            <div class="timeline-step {{ $application->js_status == 'hired' ? 'active' : '' }}">
                                <div class="circle"></div>
                                <span class="step-label">Hired</span>
                            </div>


                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>


    @include('Jobseeker.components.footer')

    @include('Jobseeker.components.scripts')
    @include('Jobseeker.components.feedbackscripts')



</body>

</html>
