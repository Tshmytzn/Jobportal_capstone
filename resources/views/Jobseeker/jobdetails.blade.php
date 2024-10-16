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
            <h1 class="fw-bold text-center display-4">Welder</h1> <!-- Increased size and boldness -->

            <div class="row">
                <div class="col-12">
                    <p class="lead">Join our team of experts in Bacolod. Full-time position.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <div class="container-fluid" style="margin-top: -7%">
        <!-- Job Details Section -->
        <div class="row justify-content-center py-5">
            <div class="col-md-8 mx-auto">
                <!-- Job Title and Details -->
                <h2 class="fw-semibold text-center">Job Description</h2>
                <div class="mt-4">
                    <p>We are looking for a skilled Welder to join our team in Bacolod. This position is full-time, offering competitive pay and benefits. The ideal candidate will have experience in welding and a strong understanding of safety protocols. Responsibilities include handling welding equipment, performing precision tasks, and maintaining high-quality standards.</p>
                    <p>Qualifications include previous experience in welding, knowledge of equipment maintenance, and a strong focus on safety. Candidates should be able to work in a fast-paced environment and adhere to company policies and procedures.</p>
                </div>

                <!-- Job Meta Information -->
                <div class="mt-5">
                    <div class="mb-3">
                        <i class="bi bi-geo-alt-fill text-primary"></i> Location: Bacolod
                    </div>
                    <div class="mb-3">
                        <i class="bi bi-briefcase-fill text-primary"></i> Job Type: Full Time
                    </div>
                </div>

                <!-- Job Dates -->
                <div class="mt-4 text-muted">
                    <p>Posted on: 2024-09-12 02:32:48</p>
                    <p>Last updated: 2024-09-12 02:32:48</p>
                </div>

                <!-- Apply Button -->
                <div class="text-center mt-5">
                    <button class="btn btn-primary btn-lg px-5">Apply Now</button>
                </div>
            </div>
        </div>
    </div>

    @include('Jobseeker.components.footer')

    @include('Jobseeker.components.scripts')

</body>
</html>
