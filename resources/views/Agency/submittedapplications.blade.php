<!DOCTYPE html>
<html lang="en">

@include('Agency.components.head', ['title' => 'Submitted Applications'])

<body class="g-sidenav-show  bg-gray-100">

    @include('Agency.components.aside', ['active' => 'submittedapps'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include(
            'Agency.components.navbar',
            ['headtitle' => 'Submitted Applications'],
            ['pagetitle' => 'Agency']
        )
        <!-- End Navbar -->
        {{-- cards --}}
        <div class="container-fluid py-0">
            @php
                $agencyId = session('agency_id');
                $jobposts = \App\Models\JobDetails::where('agency_id', $agencyId)->get();
            @endphp

            <div class="mb-3 ms-5 me-5" style="overflow-x: auto; white-space: nowrap;">
                @foreach ($jobposts as $job)
                    @php
                        // Get the count of applications for the current job
                        $applicationCount = \App\Models\JobseekerApplication::where('job_id', $job->id)->count();
                    @endphp

                    <div class="card d-inline-block border-success mb-3"
                        style="max-width: 18rem; margin-right: 10px; display: inline-block;">
                        <div class="card-body">
                            <h6 class="card-title">{{ $job->job_title }}</h6>
                            <p class="card-text">Applications: {{ $applicationCount }}</p>
                        </div>
                    </div>
                @endforeach
            </div>


            <div class="row mb-5 ms-5 me-5">

                @php

                    use App\Models\JobseekerApplication;
                    use App\Models\Jobseeker;

                    $applications = JobseekerApplication::where('js_status', 'pending')->get();

                @endphp

                @foreach ($applications as $application)
                    @php
                        $job = \App\Models\JobDetails::where('id', $application->job_id)->first();
                        $jobName = $job->job_title ?? 'No job name found';
                    @endphp

                    <div class="card m-2" style="width: 15rem; height: auto; ">

                        @foreach ($applications as $application)
                            @php
                                $jobseeker = Jobseeker::find($application->js_id);
                            @endphp

                            @if ($jobseeker && $jobseeker->js_image)
                                <img src="{{ asset('jobseeker_profile/' . $jobseeker->js_image) }}"
                                    class="card-img-top mx-auto mt-2" alt="Jobseeker Image">
                            @else
                                <p>No image available</p>
                            @endif
                        @endforeach

                        {{-- <img src="{{ asset('admin_profile/default.jpg') }}" class="card-img-top mx-auto mt-2"
                            alt="Job Seeker" style="height:5rem; width:5rem;"> --}}
                        <div class="card-body">
                            <h5 class="card-title text-center"
                                style="font-size: 1rem; background: linear-gradient(to right, purple, #8A2BE2); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                                {{ $application->applicant_name }}
                            </h5>
                            <hr class="mt-3 mb-3"
                                style="border: none; height: 2px; background-image: linear-gradient(to right, rgb(128, 0, 0), #7a0000);">
                            <p class="card-text" style="font-size: 0.7rem;"><strong>Position:</strong>
                                {{ $jobName }}</p>
                            <p class="card-text" style="font-size: 0.7rem;"><strong>Application Date:</strong>
                                {{ $application->created_at->format('Y-m-d') }}
                            </p>
                            <p class="card-text" style="font-size: 0.7rem;">
                                <strong>Status:</strong>
                                <span
                                    style="color:
                                    @if ($application->js_status === 'pending') orange
                                    @elseif($application->js_status === 'Approved') green
                                    @elseif($application->js_status === 'Rejected') red
                                    @else gray @endif; font-weight: bold;">
                                    <i class="fas fa-hourglass-half ms-2" style="margin-right: 5px;"></i>
                                    {{ $application->js_status ?? 'No Status' }}
                                </span>
                            </p>

                            <p class="card-text" style="font-size: 0.7rem;"><strong>Email:</strong>
                                {{ $application->applicant_email }}
                            </p>
                            <div class="text-center mt-4">


                                <!-- Review Button with Application ID -->
                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                    data-bs-target="#reviewApplicationModal{{ $application->id }}"
                                    class="btn btn-primary btn-sm">
                                    Review
                                </a>

                                <!-- Modal Structure for each application -->
                                <div class="modal fade" id="reviewApplicationModal{{ $application->id }}" tabindex="-1"
                                    aria-labelledby="agencyInfoModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bgp-gradient">
                                                <h5 class="modal-title text-white" id="agencyInfoModalLabel">Review
                                                    Application</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <form id="Applicationform">
                                                    @csrf
                                                    <input type="hidden" id="applicationId" name="applicationId"
                                                        readonly value="{{ $application->id }}" />

                                                    <div class="mb-0 text-center">
                                                        @foreach ($applications as $application)
                                                            @php
                                                                $jobseeker = Jobseeker::find($application->js_id);
                                                            @endphp

                                                            @if ($jobseeker && $jobseeker->js_image)
                                                                <img src="{{ asset('jobseeker_profile/' . $jobseeker->js_image) }}"
                                                                    class="card-img-top mx-auto mt-2"
                                                                    alt="Jobseeker Image"
                                                                    style="max-height: 150px; width: auto; border: 2px solid #007bff;" />
                                                            @else
                                                                <p>No image available</p>
                                                            @endif
                                                        @endforeach

                                                        <div class="m-2">
                                                            <label class="form-label">Job Position:</label>
                                                            <span id="statusBadge"
                                                                class="badge bg-info text-white">{{ $jobName }}</span>
                                                            <!-- Use different classes for different statuses -->
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6 mb-1">
                                                            <label for="agencyName" class="form-label">Jobseeker
                                                                Name</label>
                                                            <input type="text" class="form-control" id="agencyName"
                                                                value="{{ $application->applicant_name }}" readonly>
                                                        </div>
                                                        <div class="col-6 mb-1">
                                                            <label for="emailAddress" class="form-label">Email
                                                                Address</label>
                                                            <input type="email" class="form-control"
                                                                value="{{ $application->applicant_email }}"
                                                                id="emailAddress" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class="col-6 mb-1">
                                                            <label for="contactNumber" class="form-label">Contact
                                                                Number</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $application->applicant_phone }}"
                                                                id="contactNumber" readonly>
                                                        </div>
                                                        <div class="col-6 mb-1">
                                                            <label for="landlineNumber"
                                                                class="form-label">Skills</label>
                                                            <input type="text" class="form-control"
                                                                id="landlineNumber" value="{{ $jobName }}"
                                                                readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row m-4">
                                                        <div class="col-6 mb-1">
                                                            <label for="jobseekerresume"
                                                                class="form-label">Resume</label> <br>
                                                            <iframe id="jobseekerresume"
                                                                src="{{ asset('jobseeker_resume/' . $application->resume_file) }}"
                                                                style="height: 200px; width: 100%; border: none;"
                                                                title="Jobseeker Resume">
                                                                Your browser does not support iframes.
                                                            </iframe>
                                                        </div>

                                                        {{-- <img id="jobseekerresume"
                                         src="{{ asset('jobseeker_resume/' . $application->resume_file) }}"
                                         alt="jobseeker resume"
                                         class="img-fluid"
                                         style="height: 200px; width: 200px; object-fit: cover; cursor: pointer;" /> --}}

                                                        <div class="col-6 mb-1">
                                                            <label for="pesoform" class="form-label">Peso Registration
                                                                Forms</label> <br>
                                                            <iframe id="jobseekerresume"
                                                                src="{{ asset('jobseeker_resume/' . $application->resume_file) }}"
                                                                style="height: 200px; width: 100%; border: none;"
                                                                title="Jobseeker Resume">
                                                                Your browser does not support iframes.
                                                            </iframe>
                                                            {{-- <img id="pesoform" src="" alt="peso form" class="img-fluid"
                                        style="height: 200px; width: 200px; object-fit: cover; cursor: pointer;"
                                        data-bs-toggle="modal" data-bs-target="#imageModal" onclick="viewImage(this.src)" /> --}}
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>



                                            <div class="modal-footer">

                                                <button type="button" class="btn bgp-gradient"
                                                    onclick="qualifyjobseeker('Applicationform')">Approve
                                                    Agency</button>

                                                <button type="button" class="btn btn-danger"
                                                    onclick="disqualifyJobseeker('Applicationform')"
                                                    id="rejectButton">Disqualify</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            @include('Agency.components.footer')
        </div>
    </main>
    @include('Agency.components.scripts')
    @include('Agency.components.modals.submittedapplicationsmodal')
    @include('Agency.components.submittedapplicationscripts')

</body>

</html>
