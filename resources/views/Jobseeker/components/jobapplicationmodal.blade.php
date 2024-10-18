<div class="modal fade" id="applicationmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Job Application</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="jobApplicationForm">
                    <div class="mb-3">
                        <label for="applicantName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="applicantName" placeholder="Kaila Leyva" required>
                    </div>
                    <div class="mb-3">
                        <label for="applicantEmail" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="applicantEmail" placeholder="kaila@gmail.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="applicantPhone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="applicantPhone" placeholder="09634728364" required>
                    </div>
                    <div class="mb-3">
                        <label for="coverLetter" class="form-label">Cover Letter</label>
                        <textarea class="form-control" id="coverLetter" rows="4" placeholder="Write your cover letter here..." required></textarea>
                    </div>
                </form>
                <!-- Skill Assessment Button -->
                <div class="text-center">
                    <button type="button" class="btn btn-primary w-100" id="skillAssessmentBtn">Complete Skill Assessment</button>
                </div>
                <div class="text-center mt-2">
                    <button type="button" class="btn btn-primary w-100" id="skillAssessmentBtn">Upload Resume</button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bgp-gradient" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn bgp-danger" form="jobApplicationForm">Submit Application</button>
            </div>
        </div>
    </div>
</div>