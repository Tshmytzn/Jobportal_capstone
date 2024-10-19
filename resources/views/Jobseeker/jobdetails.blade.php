<!DOCTYPE html>
<html lang="en">


@include('Jobseeker.components.head', ['title' => 'Job Portal'])

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
            <h1 id="job_title" class="fw-bold text-center display-4">Job Title</h1> <!-- Dynamically populated title -->

            <div class="row">
                <div class="col-12">
                    <p id="job_overview" class="lead">Join our team. <span id="job_type"></span> position.</p>
                </div>

            </div>
        </div>
    </div>

    <!-- Header End -->

    <div class="container-fluidn m-3">
        <div class="row justify-content-center">
            <!-- Image Column -->
            <div class="col-6">
                <div class="image-container"
                    style="width: 90%; margin: 0 auto; border: 2px solid #ccc; border-radius: 10px; overflow: hidden;">
                    <img id="job_image" src="" alt="Job Image" class="img-fluid"
                        style="width: 100%; height: auto; object-fit: cover;"> <!-- Dynamically populated image -->
                </div>
            </div>

            <!-- Job Details Column -->
            <div class="col-6 d-flex align-items-start">
                <div class="details-container">
                    <h2 class="fw-semibold">Job Description</h2>
                    {{-- <h3> {{session('user_name')}}</h3>  --}}

                    <div class="mt-4">
                        <p id="job_description">We are looking for a skilled individual. This position offers
                            competitive pay and benefits.</p> <!-- Dynamically populated description -->
                    </div>

                    <!-- Job Meta Information -->
                    <div class="mt-5">
                        <div class="mb-3">
                            <i class="bi bi-geo-alt-fill text-primary"></i> Location: <span
                                id="job_location">Location</span>
                        </div>
                        <div class="mb-3">
                            <i class="bi bi-briefcase-fill text-primary"></i> Job Type: <span id="job_type"></span>
                        </div>
                    </div>

                    <!-- Job Dates -->
                    <div class="mt-4 text-muted">
                        <p class="m-0">Date Posted: <span id="job_posted_date">2024-09-12</span></p>
                    </div>
                    <!-- Apply Button -->
                    <div class="mt-4">
                        <button role="button" class="btn btn-primary btn-lg w-100 px-5 " id="applyButton"> Apply Now </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="loginPrompt" style="display: none;">
        <p>Please <a href="login.php">login first</a>.</p>
    </div>

    </div>
    </div>
    </div>

    @include('Jobseeker.components.footer')

    @include('Jobseeker.components.scripts')
    @include('Jobseeker.components.jobdetailsscripts')
    @include('Jobseeker.components.jobapplicationmodal')
    @include('Jobseeker.components.jobapplicationscripts')

</body>

</html>
