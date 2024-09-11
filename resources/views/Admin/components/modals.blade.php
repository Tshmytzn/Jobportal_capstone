<!-- Update Profile Picture Modal -->

<div class="modal fade" id="UpdateProfilePic" tabindex="-1" aria-labelledby="UpdateProfilePicLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="UpdateProfilePicLabel">Update Profile Picture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateProfilePicForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ session('user_id') }}">

                    <div class="mb-3">
                        <label for="admin_profile" class="form-label">Choose Profile Picture</label>
                        <input type="file" class="form-control" id="admin_profile" name="admin_profile"
                            accept="image/*" required>
                    </div>

                    <div class="text-center">
                        <button type="button" onclick="updateProfilePic()"
                            class="btn bg-gradient-primary w-100">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Update Profile Picture Modal -->

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
                <form action="{{ route('logoutAdmin') }}" method="POST" id="logoutadminForm">
                    @csrf
                    <button type="submit" class="btn bg-gradient-primary w-100">Log out</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Admin Profile Modal End-->

<!--Create New Admin Modal start -->
<div class="modal fade" id="addNewAdminModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="addNewAdminLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bgp-gradient">
                <h5 class="modal-title text-white" id="addNewAdminLabel">Add New Administrator</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Start -->
                <form id="adminForm" action="{{ route('createAdmin') }}" method="POST">
                    @csrf <!-- CSRF protection token -->

                    <!-- Full Name Input -->
                    <div class="mb-3">
                        <label for="adminFullName" class="form-label"><strong>Full Name</strong></label>
                        <input type="text" class="form-control" id="adminFullName" name="name"
                            placeholder="Enter Full Name" required>
                    </div>

                    <div class="row">
                        <!-- Mobile Number Input -->
                        <div class="col-6 mb-3">
                            <label for="adminMobile" class="form-label"><strong>Mobile Number</strong></label>
                            <input type="tel" class="form-control" id="adminMobile" name="contact_number"
                                placeholder="Enter Mobile Number" required>
                        </div>

                        <!-- Email Input -->
                        <div class="col-6 mb-3">
                            <label for="adminEmail" class="form-label"><strong>Email</strong></label>
                            <input type="email" class="form-control" id="adminEmail" name="email"
                                placeholder="Enter Email" required>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Password Input -->
                        <div class="col-6 mb-3">
                            <label for="adminPassword" class="form-label"><strong>Password</strong></label>
                            <input type="password" class="form-control" id="adminPassword" name="password"
                                placeholder="Enter Password" required>
                        </div>

                        <!-- Confirm Password Input -->
                        <div class="col-6 mb-3">
                            <label for="adminConfirmPassword" class="form-label"><strong>Confirm
                                    Password</strong></label>
                            <input type="password" class="form-control" id="adminConfirmPassword"
                                name="password_confirmation" placeholder="Confirm Password" required>
                        </div>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn bgp-gradient" id="submitAdminForm">Add Admin</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--Create New Admin Modal end -->


{{-- Create Job Categories Modal start --}}
<div class="modal fade" id="createjobcategories" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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
                        <input type="file" class="form-control" name="jobcategory_image" id="jobcategory_image"
                            optional>
                    </div>
                    <div class="form-group">
                        <label for="jobcategory_name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" name="jobcategory_name" id="jobcategory_name"
                            optional>
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
{{-- Create Job Categories Modal end --}}
