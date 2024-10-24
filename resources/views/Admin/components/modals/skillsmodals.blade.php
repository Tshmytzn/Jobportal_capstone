    {{-- Create Skills Modal start --}}
    <div class="modal fade" id="createskillsmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bgp-gradient">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Add Skill</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <form method="POST" id="createskillsform">
                        @csrf

                        <div class="form-group">
                            <label for="jobcategory_name" class="col-form-label">Skill:</label>
                            <input type="text" class="form-control" name="jobcategory_name" id="jobcategory_name">
                        </div>
                        <div class="form-group">
                            <label for="job_description" class="col-form-label">Description:</label>
                            <textarea class="form-control" name="job_description" id="job_description"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="CreateJobCategory()" class="btn bgp-gradient">Save Changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Create Skills Modal end --}}

    {{-- Edit Job Categories Modal start --}}
    <div class="modal fade" id="editjobcategories" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bgp-gradient">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Edit Job Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <form method="POST" id="editJobCategoryForm">
                        @csrf

                        <input type="hidden" id="jobCategoryId" name="jobCategoryId" value="">

                        <div class="form-group">
                            <img class="img-fluid text-center" src="" id="category_image" alt="Job Category Image" style="max-width: 200px; max-height: 100px;">
                        </div>

                        <div class="form-group">
                            <label for="jobcategory_image" class="col-form-label">Image:</label>
                            <input type="file" class="form-control" name="jobcategory_image_input" accept="image/*" id="jobcategory_image_input">
                        </div>
                        <div class="form-group">
                            <label for="jobcategory_name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" name="jobcategory_name" id="jobcategory_name">
                        </div>
                        <div class="form-group">
                            <label for="job_description" class="col-form-label">Description:</label>
                            <textarea class="form-control" name="job_description" id="job_description"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="UpdateJobCategory()" class="btn bgp-gradient">Save Changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Edit Job Categories Modal end --}}
