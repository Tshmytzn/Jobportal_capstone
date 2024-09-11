<!-- Admin Profile Modal start -->
<div class="modal fade" id="adminProfileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-custom">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">Administrator</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <div class="avatar avatar-xl mx-auto mb-3">
                    <img src="{{ asset('../assets/img/team-1.jpg') }}" alt="profile_image"
                        class="w-100 border-radius-md shadow-sm">
                </div>
                <h6 class="mb-2">Kailah Leyva</h6>
                <a href="{{ route('adminsettings') }}"> <button
                        class="btn bg-gradient-primary text-white w-100 mb-2">Settings</button></a>
                <button class="btn bg-gradient-primary text-white w-100">Log Out</button>
            </div>
        </div>
    </div>
</div>
<!-- Admin Profile Modal End-->

<!--Create New Admin Modal start -->
<div class="modal fade" id="addNewAdminModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addNewAdminLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bgp-gradient">
                <h5 class="modal-title text-white" id="addNewAdminLabel">Add New Administrator</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Full Name Input -->
                <div class="mb-3">
                    <label for="adminFullName" class="form-label"><strong>Full Name</strong></label>
                    <input type="text" class="form-control" id="adminFullName" placeholder="Enter Full Name">
                </div>

                <div class="row">
                    <!-- Mobile Number Input -->
                    <div class="col-6 mb-3">
                        <label for="adminMobile" class="form-label"><strong>Mobile Number</strong></label>
                        <input type="text" class="form-control" id="adminMobile" placeholder="Enter Mobile Number">
                    </div>

                    <!-- Email Input -->
                    <div class="col-6 mb-3">
                        <label for="adminEmail" class="form-label"><strong>Email</strong></label>
                        <input type="email" class="form-control" id="adminEmail" placeholder="Enter Email">
                    </div>
                </div>

                <div class="row">
                    <!-- Password Input -->
                    <div class="col-6 mb-3">
                        <label for="adminPassword" class="form-label"><strong>Password</strong></label>
                        <input type="password" class="form-control" id="adminPassword" placeholder="Enter Password">
                    </div>

                    <!-- Confirm Password Input -->
                    <div class="col-6 mb-3">
                        <label for="adminConfirmPassword" class="form-label"><strong>Confirm Password</strong></label>
                        <input type="password" class="form-control" id="adminConfirmPassword" placeholder="Confirm Password">
                    </div>
                </div>

                <!-- Profile Picture Upload -->
                <div class="mb-3">
                    <label for="adminProfilePicture" class="form-label"><strong>Upload Profile Picture</strong></label>
                    <input type="file" class="form-control" id="adminProfilePicture">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn bgp-gradient">Add Admin</button>
            </div>
        </div>
    </div>
</div>
<!--Create New Admin Modal end -->


{{-- Create Job Categories Modal start --}}
<div class="modal fade" id="createjobcategories" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bgp-gradient">
          <h5 class="modal-title text-white" id="exampleModalLabel">Job Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
                <label for="jobcategory_image" class="col-form-label">Image:</label>
                <input type="file" class="form-control" name="jobcategory_image" id="jobcategory_image" optional>
              </div>
            <div class="form-group">
              <label for="jobcategory_name" class="col-form-label">Name:</label>
              <input type="text" class="form-control" name="jobcategory_name" id="jobcategory_name" optional>
            </div>
            <div class="form-group">
              <label for="job_description" class="col-form-label">Description:</label>
              <textarea class="form-control" name="job_description" id="job_description"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn bgp-gradient">Save Changes</button>
        </div>
      </div>
    </div>
  </div>