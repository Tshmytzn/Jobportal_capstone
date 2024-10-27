@php
    $jobseekerdata = null;
    $fullName = '';
    $userId = session('user_id');

    if ($userId) {
        $jobseekerdata = \App\Models\Jobseeker::where('js_id', $userId)->first();
        $fullName = "{$jobseekerdata->js_firstname} {$jobseekerdata->js_middlename} {$jobseekerdata->js_lastname}";
    }
@endphp

<!-- Modal for application -->
<div class="modal fade" id="applicationmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable custom-modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bgp-gradient">
                <h5 class="modal-title text-white" id="exampleModalLabel"> Job Application </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="jobApplicationForm">
                    @csrf
                    <input type="hidden" id="userIdInput" value="{{ $userId ?? '' }}" readonly />

                    <div class="mb-3">
                        <label for="applicantName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="applicantName" name="applicantName"
                            value="{{ $fullName ?? '' }}" placeholder="Kaila Leyva" required>
                    </div>
                    <div class="mb-3">
                        <label for="applicantEmail" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="applicantEmail" name="applicantEmail"
                            value="{{ $jobseekerdata->js_email ?? '' }}" placeholder="kaila@gmail.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="applicantPhone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="applicantPhone" placeholder="09634728364"
                            name="applicantPhone" maxlength="12" value="+63{{ $jobseekerdata->js_contactnumber ?? '' }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="coverLetter" class="form-label">Cover Letter</label>
                        <textarea class="summernote" id="coverLetter" name="coverLetter" rows="4"
                            placeholder="Write your cover letter here..." required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Review Resume</label>
                        <div class="border p-2 form-control">
                            @if ($userId)
                                @if ($jobseekerdata && $jobseekerdata->js_resume)
                                    <a href="{{ asset('path/to/resumes/' . $jobseekerdata->js_resume) }}"
                                        target="_blank" class="text-decoration-none">
                                        {{ $jobseekerdata->js_resume }}
                                    </a>
                                @else
                                    <small class="text-danger">No resume uploaded</small>
                                @endif
                            @else
                                <strong>Please log in to view your resume.</strong>
                            @endif
                        </div>
                    </div>

                    @php
                        // Check if the user has submitted the PESO form
                        $hasSubmitted = $userId
                            ? \App\Models\JobseekerPesoForm::where('js_id', $userId)->exists()
                            : false;
                    @endphp

                    <div class="mt-2 mb-2">
                        @if (!$hasSubmitted)
                            <a href="{{ route('pesoform') }}">
                                <button type="button" class="btn btn-primary w-100" style="height: 150%">
                                    Complete PESO Registration Form
                                </button>
                            </a>
                        @else
                            <small class="text-success">
                                <strong>Note: </strong>PESO Registration Form will be submitted automatically upon
                                application.
                            </small>
                        @endif
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bgp-gradient" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn bgp-danger">Submit Application</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for login prompt -->
<div class="modal fade" id="loginPromptModal" tabindex="-1" aria-labelledby="loginPromptModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bgp-gradient">
                <h5 class="modal-title text-white" id="exampleModalLabel"> Login Required </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6 class="m-2">It looks like you're not logged in yet. To proceed with your application, please <a
                        href="{{ route('login') }}">click here to login</a>.</h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bgp-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
