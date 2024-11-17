<!DOCTYPE html>
<html lang="en">

@include('Agency.components.head', ['title' => 'Approved Applications'])

<body class="g-sidenav-show  bg-gray-100">

    @include('Agency.components.aside', ['active' => 'approvedapplications'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include(
            'Agency.components.navbar',
            ['headtitle' => 'Approved Applications'],
            ['pagetitle' => 'Agency']
        )
        <!-- End Navbar -->

        {{-- cards --}}
        <div class="container-fluid py-4">
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

                    $applications = JobseekerApplication::where('js_status', 'hired')->get();
                @endphp

                @foreach ($applications as $application)
                    @php
                        $job = \App\Models\JobDetails::where('id', $application->job_id)->first();
                        $jobName = $job->job_title ?? 'No job name found';
                        $jobseeker = Jobseeker::find($application->js_id);
                    @endphp

                    <div class="card m-2" style="width: 15rem; height: auto;">

                        {{-- Jobseeker Image --}}
                        @if ($jobseeker && $jobseeker->js_image)
                        <img class="img-fluid rounded-circle d-block mx-auto mt-2"
                        src="{{ asset('jobseeker_profile/' . $jobseeker->js_image) }}" alt="Jobseeker Image"
                        style="width: 100px">
                        @else
                            <p>No image available</p>
                        @endif

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
                                {{ $application->created_at->format('Y-m-d') }}</p>
                            <p class="card-text" style="font-size: 0.7rem;">
                                <strong>Status:</strong>
                                <span
                                    style="color: 
                                @if ($application->js_status === 'pending') orange
                                @elseif($application->js_status === 'hired') green
                                @elseif($application->js_status === 'Rejected') red
                                @else gray @endif; font-weight: bold;">
                                    <i class="fas fa-hourglass-half ms-2" style="margin-right: 5px;"></i>
                                    {{ $application->js_status ?? 'No Status' }}
                                </span>
                            </p>
                            <p class="card-text" style="font-size: 0.7rem;"><strong>Email:</strong>
                                {{ $application->applicant_email }}</p>
                        </div>
                        <button class="btn bgp-add view-details-btn" data-bs-toggle="modal"
                            data-bs-target="#hiredetails" data-name="{{ $application->applicant_name }}"
                            data-email="{{ $application->applicant_email }}"
                            data-phone="{{ $application->applicant_phone }}"
                            data-gender="{{ $jobseeker->js_gender ?? 'Not Provided' }}"
                            data-address="{{ $jobseeker->js_address ?? 'Not Provided' }}"
                            data-position="{{ $jobName }}" data-status="{{ $application->js_status }}"
                            data-date="{{ $application->created_at->format('Y-m-d') }}">
                            View Details
                        </button>


                    </div>
                @endforeach


            </div>
            @include('Agency.components.footer')
        </div>
    </main>
    @include('Agency.components.scripts')


    {{-- Modals --}}
    <div class="modal fade" id="hiredetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bgp-gradient">
                    <h5 class="modal-title text-white" id="addNewAdminLabel">Application Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="applicantName">Name</label>
                                <input type="text" id="applicantName" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="applicantEmail">Email</label>
                                <input type="text" id="applicantEmail" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="applicantPhone">Phone</label>
                                <input type="text" id="applicantPhone" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="applicantGender">Gender</label>
                                <input type="text" id="applicantGender" class="form-control" readonly>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="jobPosition">Position</label>
                                <input type="text" id="jobPosition" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="applicationDate">Application Date</label>
                                <input type="text" id="applicationDate" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="applicationStatus">Status</label>
                                <input type="text" id="applicationStatus" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="applicantAddress">Address</label>
                                <input type="text" id="applicantAddress" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    {{-- Modals --}}

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('hiredetails');
            const modalInputs = {
                name: document.getElementById('applicantName'),
                email: document.getElementById('applicantEmail'),
                phone: document.getElementById('applicantPhone'),
                gender: document.getElementById('applicantGender'),
                address: document.getElementById('applicantAddress'),
                position: document.getElementById('jobPosition'),
                date: document.getElementById('applicationDate'),
                status: document.getElementById('applicationStatus'),
            };

            document.querySelectorAll('.view-details-btn').forEach(button => {
                button.addEventListener('click', () => {
                    modalInputs.name.value = button.getAttribute('data-name');
                    modalInputs.email.value = button.getAttribute('data-email');
                    modalInputs.phone.value = button.getAttribute('data-phone');
                    modalInputs.gender.value = button.getAttribute('data-gender');
                    modalInputs.address.value = button.getAttribute('data-address');
                    modalInputs.position.value = button.getAttribute('data-position');
                    modalInputs.date.value = button.getAttribute('data-date');
                    modalInputs.status.value = button.getAttribute('data-status');
                });
            });
        });
    </script>

</body>

</html>
