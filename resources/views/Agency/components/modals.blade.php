<style>
    select.form-select {
        background-color: #fff;
        color: #495057;
        border: 1px solid #ced4da;
        border-radius: 0.375rem;
        padding: 0.375rem 0.75rem;
        box-shadow: 0 0.2rem 0.5rem rgba(0, 0, 0, 0.05);
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    select.form-select option {
        background-color: #fff;
        color: #49868c;
        padding: 10px;
        border-bottom: 1px solid #e9ecef;
        cursor: pointer;
    }

    select.form-select option:hover {
        background-color: #f8f9fa;
        color: #43475c;
    }

    select.form-select option:checked {
        background-color: #40166f;
        color: #fff;
    }
</style>

<!-- Admin Profile Modal start -->
<div class="modal fade" id="agencyProfileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
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

                <h6 class="mb-2">{{ session('user_name') }}</h6>
                <a href="{{ route('agencysettings') }}"> <button
                        class="btn bg-gradient-primary text-white w-100 mb-2">Settings</button></a>
                <form action="{{ route('logoutAgency') }}" method="POST" id="logoutForm">
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
            <div class="modal-header">
                <h5 class="modal-title" id="addNewAdminLabel">Add New Administrator</h5>
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
                        <input type="password" class="form-control" id="adminConfirmPassword"
                            placeholder="Confirm Password">
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
                <button type="button" class="btn bg-gradient-primary">Add Admin</button>
            </div>
        </div>
    </div>
</div>
<!--Create New Admin Modal end -->

{{-- Create Job Post Modal --}}

<div class="modal fade bd-example-modal-lg" id="jobpostmodal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header"
                style="background: linear-gradient(90deg, rgba(77, 7, 99, 1) 0%, rgba(121, 9, 128, 1) 50%, rgba(189, 11, 186, 1) 100%);">
                <h5 class="modal-title text-white">Job Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body">

                <div class="card-body m-2">

                    <div class="row">
                    <div class="col-6 form-group">
                        <h6>Job Title</h6>
                        <input type="text" class="form-control" placeholder="Construction.....">
                    </div>
                    <div class="col-6 form-group">
                        <h6>Job Location</h6>
                        <input type="text" class="form-control" placeholder="Bacolod.....">
                    </div>
                </div>

                    <div class="row">
                        <div class="col-6 form-group">
                            <h6>Job Category</h6>
                            <select class="form-select">
                                <option value="0" disabled selected> Select Job Category </option>
                                <!-- You can manually add static options here -->
                                <option value="1">Construction</option>
                                <option value="2">IT</option>
                                <option value="3">Healthcare</option>
                            </select>
                        </div>

                        <div class="col-6 form-group">
                            <h6>Employment Type</h6>
                            <select class="form-select">
                                <option value="0"> Select Employment Type </option>
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                            </select>
                        </div>
                        
                    </div>

                    <div class="container mb-2">
                        <h6>Description:</h6>
                        <textarea id="job_details" class="summernote" name="job_details"></textarea>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn text-white" style="background: linear-gradient(90deg, rgba(77, 7, 99, 1) 0%, rgba(121, 9, 128, 1) 50%, rgba(189, 11, 186, 1) 100%);">Save changes</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> 

<!-- Include the required CSS and JS files -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize Summernote only on the desired elements
        $('.summernote').each(function() {
            $(this).summernote({
                height: 200,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                placeholder: 'Start typing here...'
            });
        });
    });
</script>