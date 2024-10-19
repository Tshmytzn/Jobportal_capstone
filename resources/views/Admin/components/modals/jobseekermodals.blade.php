    {{-- Create JobSeeker Modal start --}}
    <div class="modal fade" id="banjobseeker" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                <label for="block_reason" class="col-form-label">Reason for Blocking:</label>
                                <select class="form-select" name="block_reason" id="block_reason" required>
                                    <option value="" disabled selected>Select Reason</option>
                                    <option value="Inappropriate Behavior">Inappropriate Behavior</option>
                                    <option value="Unreliable Attendance">Unreliable Attendance</option>
                                    <option value="Poor Work Quality">Poor Work Quality</option>
                                    <option value="Lack of Skills">Lack of Skills</option>
                                    <option value="Misrepresentation of Qualifications">Misrepresentation of Qualifications</option>
                                    <option value="Violation of Company Policies">Violation of Company Policies</option>
                                    <option value="Fraudulent Activity">Fraudulent Activity</option>
                                    <option value="Inconsistent Communication">Inconsistent Communication</option>
                                    <option value="No Show for Scheduled Interviews">No Show for Scheduled Interviews</option>
                                    <option value="Unprofessional Conduct">Unprofessional Conduct</option>
                                </select>
                            </div>

                        <div class="form-group">
                            <label for="block_duration" class="col-form-label">Block Duration:</label>
                            <select class="form-select" name="block_duration" id="block_duration" required>
                                <option value="" disabled selected>Select Duration</option>
                                <option value="1 Day">1 Day</option>
                                <option value="1 Week">1 Week</option>
                                <option value="1 Month">1 Month</option>
                                <option value="Permanently">Permanently</option>
                            </select>
                        </div>

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" data-id="USER_ID" onclick="blockUser(this)" class="btn bgp-gradient">Block User</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Create JobSeeker Modal end --}}

    