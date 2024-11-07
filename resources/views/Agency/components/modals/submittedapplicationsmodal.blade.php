<div class="modal fade" id="reviewapplication" tabindex="-1" aria-labelledby="agencyInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bgp-gradient">
                <h5 class="modal-title text-white" id="agencyInfoModalLabel">Review Application</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            @php
                $applications = \App\Models\JobseekerApplication::all();
            @endphp

            @foreach ($applications as $application)
                @php
                    $job = \App\Models\JobDetails::where('id', $application->job_id)->first();
                    $jobName = $job->job_title ?? 'No job name found';
                @endphp

                <div class="modal-body">
                    <form id="Applicationform">
                        @csrf
                        <input type="hidden" id="applicationId" readonly />

                        <div class="mb-0 text-center">
                            <img id="JobseekerImage" src="" alt="Jobseeker Image"
                                class="img-fluid rounded-circle"
                                style="max-height: 150px; width: auto; border: 2px solid #007bff;" />
                            <div class="m-2">
                                <label class="form-label">Status:</label>
                                <span id="statusBadge" class="badge bg-warning text-dark">Pending</span>
                                <!-- Use different classes for different statuses -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-1">
                                <label for="agencyName" class="form-label">Jobseeker Name</label>
                                <input type="text" class="form-control" id="agencyName"
                                    value="{{ $application->applicant_name }}" readonly>
                            </div>
                            <div class="col-6 mb-1">
                                <label for="emailAddress" class="form-label">Email Address</label>
                                <input type="email" class="form-control" value="{{ $application->applicant_email }}"
                                    id="emailAddress" readonly>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-6 mb-1">
                                <label for="contactNumber" class="form-label">Contact Number</label>
                                <input type="text" class="form-control" value="{{ $application->applicant_phone }}"
                                    id="contactNumber" readonly>
                            </div>
                            <div class="col-6 mb-1">
                                <label for="landlineNumber" class="form-label">Skills</label>
                                <input type="text" class="form-control" id="landlineNumber" readonly>
                            </div>
                        </div>

                        <div class="row m-4">
                                <div class="col-6 mb-1">
                                    <label for="jobseekerresume" class="form-label">Resume</label> <br>
                                    <iframe id="jobseekerresume"
                                        src="{{ asset('jobseeker_resume/' . $application->resume_file) }}"
                                        style="height: 200px; width: 100%; border: none;" title="Jobseeker Resume">
                                        Your browser does not support iframes.
                                    </iframe>
                                </div>

                                {{-- <img id="jobseekerresume" 
                                     src="{{ asset('jobseeker_resume/' . $application->resume_file) }}" 
                                     alt="jobseeker resume" 
                                     class="img-fluid"
                                     style="height: 200px; width: 200px; object-fit: cover; cursor: pointer;" /> --}}

                            <div class="col-6 mb-1">
                                <label for="pesoform" class="form-label">Peso Registration Forms</label> <br>
                                <iframe id="jobseekerresume"
                                src="{{ asset('jobseeker_resume/' . $application->resume_file) }}"
                                style="height: 200px; width: 100%; border: none;" title="Jobseeker Resume">
                                Your browser does not support iframes.
                            </iframe>
                                {{-- <img id="pesoform" src="" alt="peso form" class="img-fluid"
                                    style="height: 200px; width: 200px; object-fit: cover; cursor: pointer;"
                                    data-bs-toggle="modal" data-bs-target="#imageModal" onclick="viewImage(this.src)" /> --}}
                            </div>
                        </div>

                    </form>
                </div>
            @endforeach


            <div class="modal-footer">
                <button type="button" class="btn bgp-gradient" onclick="approveAgency()"
                    id="approveButton">Qualify</button>
                <button type="button" class="btn btn-danger" onclick="rejectAgency()"
                    id="rejectButton">Disqualify</button>
            </div>
        </div>
    </div>
</div>
