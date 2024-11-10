<!DOCTYPE html>
<html lang="en">

@include('Jobseeker.components.head', ['title' => 'Settings'])

<body>
    @include('Jobseeker.components.loading')
    @include('Jobseeker.components.spinner')
    @include('Jobseeker.components.navbar')
    @include('Jobseeker.components.header', ['title' => 'Settings'])

    <div class="container mb-5 ms-5 me-5 align-items-center" style="margin-top: -5%">
        <!-- Pills navigation -->
        <div class="row">
            <div class="col-1">
                <div>

                </div>
            </div>
            <div class="col-11">
                <ul class="nav nav-pills nav-fill mb-3" id="pills-nav" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="true">
                            <i class="fas fa-user"></i> Profile Information
                        </button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-resume-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-resume" type="button" role="tab" aria-controls="pills-resume"
                            aria-selected="false">
                            <i class="fas fa-file-upload"></i> Resume Submission
                        </button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-password-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-password" type="button" role="tab"
                            aria-controls="pills-password" aria-selected="false">
                            <i class="fas fa-key"></i> Account Password
                        </button>
                    </li>
                </ul>

                <!-- Pills content -->
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-profile" role="tabpanel"
                        aria-labelledby="pills-profile-tab">
                        <div class="p-3 bg-light">
                            <div class="modal-header">
                                <h4>Profile Information</h4>
                            </div>
                            <div class="card-body mt-2">
                                <form method="POST" id="updateJobseekerInfo" action="{{ route('updateJobseeker') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ session('user_id') }}"
                                        placeholder="User ID">

                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label for="firstname">First Name: </label>
                                            <input type="text" class="form-control" name="js_firstname"
                                                value="{{ $jobseeker->js_firstname }}" aria-label="First Name">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="midname">Middle Name: </label>
                                            <input type="text" class="form-control" name="js_midname"
                                                value="{{ $jobseeker->js_middlename }}" aria-label="Middle Name">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label for="lastname">Last Name: </label>
                                            <input type="text" class="form-control" name="js_lastname"
                                                value="{{ $jobseeker->js_lastname }}" aria-label="Last Name">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="suffix">Suffix: </label>
                                            <input type="text" class="form-control" name="js_suffix"
                                                value="{{ $jobseeker->js_suffix }}" aria-label="Suffix" optional>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label>Gender: </label>
                                        <div class="mb-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="js_gender"
                                                    id="male" value="Male"
                                                    {{ $jobseeker->js_gender == 'Male' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="male">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="js_gender"
                                                    id="female" value="Female"
                                                    {{ $jobseeker->js_gender == 'Female' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="female">Female</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="js_gender"
                                                    id="other" value="Other"
                                                    {{ $jobseeker->js_gender == 'Other' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="other">Other</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label for="address">Home Address: </label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="js_address"
                                                value="{{ $jobseeker->js_address }}" aria-label="Home Address">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-4">
                                            <label for="email">Email Address: </label>
                                            <input type="email" class="form-control" name="js_email"
                                                value="{{ $jobseeker->js_email }}" aria-label="Email" required>
                                        </div>
                                        <div class="col-6 mb-4">
                                            <label for="contact">Contact Number: </label>
                                            <div class="input-group">
                                                <span class="input-group-text">+63</span>
                                                <input type="tel" class="form-control" name="js_contact"
                                                    value="{{ $jobseeker->js_contactnumber }}"
                                                    aria-label="Contact Number" maxlength="10" required>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 mb-2">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- Upload Resume --}}
                    <div class="tab-pane fade" id="pills-resume" role="tabpanel" aria-labelledby="pills-resume-tab">
                        <div class="p-3 bg-light">
                            <div class="modal-header">
                                <h4>Upload and View Your Resume</h4>
                            </div>
                            <div class="card-body">
                                @php
                                    $jobseeker = \App\Models\Jobseeker::where('js_id', session('user_id'))->first();
                                @endphp

                                <div id="uploadedResume" class="mt-3" style="{{ $jobseeker && $jobseeker->js_resume ? 'display: block;' : 'display: none;' }}">
                                    <strong>Uploaded Resume:</strong>
                                    <span id="resumeFilename">
                                        @if ($jobseeker && $jobseeker->js_resume)
                                            <a href="{{ asset('jobseeker_resume/' . $jobseeker->js_resume) }}" target="_blank">
                                                {{ $jobseeker->js_resume }}
                                            </a>
                                        @else
                                            No resume uploaded
                                        @endif
                                    </span>

                                    <!-- Resume Preview (only for PDF files) -->
                                    <iframe id="resumeViewer" src="{{ $jobseeker && Str::endsWith($jobseeker->js_resume, '.pdf') ? asset('jobseeker_resume/' . $jobseeker->js_resume) : '' }}"
                                            style="width: 100%; height: 400px; border: 1px solid #ddd; {{ $jobseeker && Str::endsWith($jobseeker->js_resume, '.pdf') ? 'display: block;' : 'display: none;' }}">
                                    </iframe>

                                    <!-- Print Button -->
                                    <button type="button" class="btn btn-secondary mt-3" onclick="printResume()">Print Resume</button>
                                </div>

                                <button type="button" class="btn btn-primary w-100 mt-4 mb-2" data-bs-toggle="modal" data-bs-target="#Uploadresumemodal">
                                    Upload Resume
                                </button>
                            </div>
                        </div>
                    </div>


                    {{-- <div class="tab-pane fade" id="pills-resume" role="tabpanel" aria-labelledby="pills-resume-tab">
                        <div class="p-3 bg-light">
                            <div class="modal-header">
                                <h4>Upload and View Your Resume
                                </h4>
                            </div>
                            <div class="card-body">

                                @php
                                    $pesoForm = \App\Models\Jobseeker::where('js_id', session('user_id'))->first();

                                @endphp

                                <div id="uploadedResume" class="mt-3"
                                    style="{{ $pesoForm && $pesoForm->js_resume ? 'display: block;' : 'display: none;' }}">
                                    <strong>Uploaded Resume:</strong>
                                    <span id="resumeFilename">
                                        @if ($pesoForm && $pesoForm->js_resume)
                                            <a href="{{ asset('jobseeker_resume/' . $pesoForm->js_resume) }}"
                                                target="_blank">
                                                {{ $pesoForm->js_resume }}
                                            </a>
                                        @else
                                            No resume uploaded
                                        @endif
                                    </span>
                                </div>
                                <button type="button" class="btn btn-primary w-100 mt-4 mb-2" data-bs-toggle="modal"
                                    data-bs-target="#Uploadresumemodal">
                                    Upload Resume
                                </button>
                            </div>
                        </div>
                    </div> --}}
                    {{-- Upload Resume --}}
                    <div class="tab-pane fade" id="pills-password" role="tabpanel"
                        aria-labelledby="pills-password-tab">
                        <div class="p-3 bg-light">
                            <div class="modal-header">
                                <h4>Account Password</h4>
                            </div>
                            <div class="card-body">
                                <form id="js_changePasswordForm" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ session('user_id') }}"
                                        placeholder="User ID">
                                    <div class="form-group mb-3">
                                        <label for="currentPassword">Enter Current Password</label>
                                        <input type="password" id="js_currentPassword" name="currentPassword" class="form-control"
                                            placeholder="Current Password" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="newPassword">Enter New Password</label>
                                        <input type="password" id="js_newPassword" name="newPassword" class="form-control"
                                            placeholder="New Password" required>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="confirmPassword">Confirm New Password</label>
                                        <input type="password" id="js_confirmPassword" name="newPassword_confirmation" class="form-control"
                                            placeholder="Confirm Password" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 mb-2">Change Password</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    @include('Jobseeker.components.footer')
    @include('Jobseeker.components.jsAuthscripts')
    @include('Jobseeker.components.scripts')
    @include('Jobseeker.components.resumemodal')
    @include('Jobseeker.components.resumescripts')


</body>

</html>
