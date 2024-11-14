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
                <form id="adminForm" method="POST">
                    @csrf 

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

<!--Edit New Admin Modal start -->
<div class="modal fade" id="editAdminModal" tabindex="-1" aria-labelledby="editAdminModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bgp-gradient">
                <h5 class="modal-title text-white" id="editAdminModal">Edit Administrator</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Start -->
                <form method="POST" id="editadmindetailsForm">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">

                            <label for="newAdminFullName" class="form-label"><strong>Full Name</strong></label>
                            <input type="text" class="form-control" id="newAdminFullName" name="admin_name"
                                placeholder="Enter Full Name" required>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="newAdminMobile" class="form-label"><strong>Mobile Number</strong></label>
                                <input type="tel" class="form-control" id="newAdminMobile" name="admin_mobile"
                                    placeholder="Enter Mobile Number" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="newAdminEmail" class="form-label"><strong>Email</strong></label>
                                <input type="email" class="form-control" id="newAdminEmail" name="admin_email"
                                    placeholder="Enter Email" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="newAdminPassword" class="form-label"><strong>New Password</strong></label>
                                <input type="password" class="form-control" id="newAdminPassword"
                                    name="admin_password" placeholder="Enter New Password">
                            </div>
                            <div class="col-6 mb-3">
                                <label for="newAdminConfirmPassword" class="form-label"><strong>Confirm New
                                        Password</strong></label>
                                <input type="password" class="form-control" id="newAdminConfirmPassword"
                                    name="admin_confirm_password" placeholder="Confirm New Password">
                            </div>
                        </div>
                        <input type="hidden" id="adminId" name="id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn bgp-gradient" onclick="UpdateAdmin()">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Edit New Admin Modal end -->
