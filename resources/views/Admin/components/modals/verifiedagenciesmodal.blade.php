    {{-- Create JobSeeker Modal start --}}
    <div class="modal fade" id="deactivateagency" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bgp-gradient">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Job Seeker</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <form method="POST" id="banjobseekerform">
                        @csrf

                        <input type="hidden" class="form-control" name="jobseeker_name" id="jobseeker_name" required
                            placeholder="Enter jobseeker's name">

                            <div class="form-group">
                                <label for="block_reason" class="col-form-label">Reason for Deactivating:</label>
                                <select class="form-select" name="block_reason" id="block_reason" required>
                                    <option value="" disabled selected>Select Reason</option>
                                    <option value="Inappropriate Behavior">Inappropriate Behavior</option>
                                    <option value="Unreliable Performance">Unreliable Performance</option>
                                    <option value="Violation of Policies">Violation of Policies</option>
                                    <option value="Fraudulent Activity">Fraudulent Activity</option>
                                    <option value="Lack of Communication">Lack of Communication</option>
                                    <option value="Failure to Meet Standards">Failure to Meet Standards</option>
                                    <option value="Misrepresentation of Services">Misrepresentation of Services</option>
                                    <option value="Persistent Complaints from Jobseekers">Persistent Complaints from Jobseekers</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" data-id="USER_ID" onclick="deactivateAgency(this)" class="btn bgp-gradient">Deactivate Account</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Create Agency Modal end --}}

