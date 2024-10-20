<!DOCTYPE html>
<html lang="en">

@include('Agency.components.head', ['title' => 'Approved Applications'])

<body class="g-sidenav-show  bg-gray-100">

    @include('Agency.components.aside', ['active' => 'approvedapplications'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('Agency.components.navbar', ['headtitle' => 'Approved Applications'], ['pagetitle' => 'Agency'])
        <!-- End Navbar -->

        {{-- cards --}}
        <div class="container-fluid py-4">
            <div class="row mb-5 ms-5 me-5">

                <div class="card" style="width: 18rem; height: auto; padding: 10px; margin: 10px;">
                    <img src="{{ asset('admin_profile/default.jpg') }}" class="card-img-top mx-auto" alt="Job Seeker"
                        style="height:8rem; width:8rem; margin-bottom: 10px;">
                    <div class="card-body">
                        <h5 class="card-title text-center"
                            style="font-size: 1.5rem; background: linear-gradient(to right, purple, #8A2BE2); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                            John Doe
                        </h5>
                        <hr class="mt-3 mb-3"
                            style="border: none; height: 2px; background-image: linear-gradient(to right, #4CAF50, #388E3C);">
                        <p class="card-text" style="font-size: 0.9rem;"><strong>Position:</strong> Electrician</p>
                        <p class="card-text" style="font-size: 0.9rem;"><strong>Application Date:</strong> 2024-10-20</p>
                        <p class="card-text" style="font-size: 0.9rem;">
                            <strong>Status:</strong>
                            <span style="color: green; font-weight: bold;">
                                <i class="fas fa-check-circle ms-2" style="margin-right: 5px;"></i>
                                Approved
                            </span>
                        </p>
                        <p class="card-text" style="font-size: 0.9rem;"><strong>Email:</strong> johndoe@example.com</p>
                        <div class="text-center mt-4">
                            <a href="#" class="btn btn-primary btn-md">View Resume</a>
                        </div>
                    </div>
                </div>

{{--
                <div class="card" style="width: 18rem; height: 20rem">
                    <img src="{{ asset('img/jobseeker_icon.jpg') }}" class="card-img-top ms-5" alt="Job Seeker" style="height:10rem; width:10rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $jobSeeker->name }}</h5>
                        <p class="card-text"><strong>Position:</strong> {{ $job->title }}</p>
                        <p class="card-text"><strong>Application Date:</strong> {{ $application->created_at->format('Y-m-d') }}</p>
                        <p class="card-text"><strong>Status:</strong> {{ $application->status }}</p>
                        <p class="card-text"><strong>Email:</strong> {{ $jobSeeker->email }}</p>
                        <a href="{{ route('resume.download', $application->id) }}" class="btn btn-primary">View Resume</a>
                    </div>
                </div> --}}


                  {{-- <div class="container py-4">
                    <h2 class="mb-4">Manage Job Applications</h2>

                    <!-- Job Postings Section -->
                    <div id="jobPostings" class="mb-5">
                        <h3>Job Postings</h3>
                        <div class="row g-4">
                            <!-- Example Job Posting Card -->
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">Job Title: Frontend Developer</h5>
                                        <p class="card-text"><strong>Location:</strong> Remote</p>
                                        <p class="card-text"><strong>Type:</strong> Full-Time</p>
                                        <p class="card-text"><strong>Description:</strong> Looking for a skilled frontend developer...</p>
                                        <button class="btn btn-primary" data-job-id="1" onclick="toggleApplications(1)">View Applications (5)</button>
                                        <div id="applications-1" class="applications-list" style="display: none;">
                                            <!-- Applications for this job will be populated here -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Repeat for other job postings -->
                        </div>
                    </div>
                </div> --}}


            </div>
            @include('Agency.components.footer')
        </div>
    </main>
    @include('Agency.components.scripts')
</body>

</html>
