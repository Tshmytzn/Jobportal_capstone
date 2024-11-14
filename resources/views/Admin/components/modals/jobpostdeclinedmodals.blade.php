<!-- Modal Structure -->
<div class="modal fade" id="reviewjob" tabindex="-1" aria-labelledby="reviewjobLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-scrollable">
        <div class="modal-content border-0 rounded-3 shadow-lg">
            <div class="modal-header bgp-gradient border-bottom-0">
                <h5 class="modal-title text-white" id="reviewjobLabel">Job Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                <form id="jobDetailsForm">
                    @csrf
                    <div class="row g-3">

                        <div class="col-md-12">
                            <label for="job_title" class="form-label">Job Title</label>
                            <div id="job_title" class="form-control" style="text-align: center;">
                                <img id="job_image" src="path/to/your/image.jpg" alt="Job Title Image" class="img-fluid rounded-circle" style="height: 150px; width: 150px; object-fit: cover; border-radius: 50%"/>
                            </div>
                        </div>
                        
                        <!-- Job Title -->
                        <div class="col-md-6">
                            <label for="job_title" class="form-label">Job Title</label>
                            <input type="text" class="form-control" id="job_title" disabled>
                        </div>

                        <!-- Category Name -->
                        <div class="col-md-6">
                            <label for="category_name" class="form-label">Category</label>
                            <input type="text" class="form-control" id="category_name" disabled>
                        </div>

                        <!-- Agency Name -->
                        <div class="col-md-6">
                            <label for="agency_name" class="form-label">Agency</label>
                            <input type="text" class="form-control" id="agency_name" disabled>
                        </div>

                        <!-- Job Location -->
                        <div class="col-md-6">
                            <label for="job_location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="job_location" disabled>
                        </div>

                        <!-- Job Type -->
                        <div class="col-md-6">
                            <label for="job_type" class="form-label">Job Type</label>
                            <input type="text" class="form-control" id="job_type" disabled>
                        </div>

                        <!-- Skills Required -->
                        <div class="col-md-6">
                            <label for="skills_required" class="form-label">Skills Required</label>
                            <input type="text" class="form-control" id="skills_required" disabled>
                        </div>

                        <!-- Salary -->
                        <div class="col-md-6">
                            <label for="job_salary" class="form-label">Salary</label>
                            <input type="text" class="form-control" id="job_salary" disabled>
                        </div>

                        <div class="col-md-6">
                            <label for="job_status" class="form-label">Status</label>
                            <input type="text" class="form-control" id="job_status" disabled>
                        </div>

                        <!-- Job Description -->
                        <div class="col-12">
                            <label for="job_description" class="form-label">Job Description</label>
                            <div id="job_description" class="form-control"
                                style="height: 150px; overflow-y: auto; white-space: pre-wrap; word-wrap: break-word;">
                            </div>
                        </div>


                    </div>
                </form>
            </div>
            <div class="modal-footer border-top-0 me-2">
                <button type="button" class="btn bgp-gradient" id="approveBtn">Grant Approval</button>
            </div>

        </div>
    </div>
</div>
