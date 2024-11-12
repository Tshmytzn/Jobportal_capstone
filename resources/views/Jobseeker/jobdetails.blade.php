<!DOCTYPE html>
<html lang="en">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Bootstrap CSS and JS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<!-- Summernote CSS and JS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>

<style>
    .custom-modal-lg {
    max-width: 200px;
}
</style>

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
    <div class="container-fluid m-3">
        <div class="row justify-content-center">
            <!-- Image Column -->
            <div class="col-6">
                <div class="image-container"
                style="width: 90%; height: 510px; margin: 0 auto; border: 2px solid #ccc; border-radius: 10px; overflow: hidden;">
                <img id="job_image" src="" alt="Job Image" class="img-fluid"
                    style="width: 100%; height: 100%; object-fit: cover;"> <!-- Dynamically populated image -->
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
                    <div class="mt-4 p-3 me-4 border rounded shadow-sm" style="background-color: #f8f9fa;">
                        <div class="mb-3 d-flex align-items-center">
                            <i class="bi bi-credit-card-fill text-primary me-2" style="font-size: 1.5rem;"></i>
                            <h6 class="mb-0">Salary:</h6>
                            <span id="job_salary" class="ms-2 fw-bold text-secondary">Salary</span>
                        </div>

                        <div class="mb-3 d-flex align-items-center">
                            <i class="bi bi-calendar-week text-primary me-2" style="font-size: 1.5rem;"></i>
                            <h6 class="mb-0">Salary Frequency:</h6>
                            <span id="salary_frequency" class="ms-2 fw-bold text-secondary">Salary frequency</span>
                        </div>

                        <div class="mb-3 d-flex align-items-center">
                            <i class="bi bi-person-plus-fill text-primary me-2" style="font-size: 1.5rem;"></i>
                            <h6 class="mb-0">Job Vacancy:</h6>
                            <span id="job_vacancy" class="ms-2 fw-bold text-secondary">Vacancy</span>
                        </div>


                        <div class="mb-3 d-flex align-items-center">
                            <i class="bi bi-geo-alt-fill text-primary me-2" style="font-size: 1.5rem;"></i>
                            <h6 class="mb-0">Location:</h6>
                            <span id="job_location" class="ms-2 fw-bold text-secondary">Location</span>
                        </div>

                        <div class="mb-3 d-flex align-items-center">
                            <i class="bi bi-briefcase-fill text-primary me-2" style="font-size: 1.5rem;"></i>
                            <h6 class="mb-0">Job Type:</h6>
                            <span id="job_type" class="ms-2 fw-bold text-secondary"></span>
                        </div>

                        <div class="mb-3 d-flex align-items-center">
                            <i class="bi bi-tools text-primary me-2" style="font-size: 1.5rem;"></i>
                            <h6 class="mb-0">Skills required:</h6>
                            <span id="skill_required" class="ms-2 fw-bold text-secondary"></span>
                        </div>
                    </div>

                    <!-- Job Dates -->
                    <div class="mt-4 text-muted">
                        <p class="m-0">Date Posted: <span id="job_posted_date">2024-09-12</span></p>
                    </div>
                    <!-- Apply Button -->
                    <div class="mt-2 me-2 mb-2">
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
