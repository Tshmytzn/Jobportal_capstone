<!DOCTYPE html>
<html lang="en">

@include('Admin.components.head', ['title' => 'Settings'])

<body class="g-sidenav-show  bg-gray-100">
    @include('Admin.components.loading')

    @include('Admin.components.aside', ['active' => 'Settings'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('Admin.components.navbar', ['headtitle' => 'Settings'], ['pagetitle' => 'Admin'])
        <!-- End Navbar -->

        <div class="container-fluid">
            <div class="page-header min-height-150 border-radius-xl mt-4"
                style="background-image: url('{{ asset('../assets/img/curved-images/curved0.jpg') }}'); background-position-y: 50%;">
                <span class="mask bg-gradient-primary opacity-6"></span>
            </div>
            <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img id="adminProfileImage" src="/admin_profile/{{ $admin->admin_profile }}" alt="profile_image"
                                class="w-100 border-radius-md shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 id="adminProfileName" class="mb-1">
                                {{ $admin->admin_name }}
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                Administrator
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        <div class="nav-wrapper position-relative end-0">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12 col-xl-4 mb-2">
                    <div class="card h-100">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-0">Update Account Password</h6>
                        </div>
                        <div class="card-body p-3">

                            <div class="ms-4 me-4 mt-4">
                                <button data-bs-toggle="modal" data-bs-target="#UpdateProfilePic" class="btn btn-outline-primary w-100">Update Profile Picture</button>
                            </div>

                            <form method="POST" id="updateAdminpasswordForm">
                                @csrf

                                <input type="hidden" name="id" value="{{ session('admin_id') }}"
                                    placeholder="User ID">

                                <div class="m-4">
                                    <input type="password" class="form-control" id="new_password" name="new_password"
                                        placeholder="Enter New Password" aria-label="Password"
                                        aria-describedby="Password-addon">
                                </div>
                                <div class="m-4">
                                    <input type="password" class="form-control" id="new_password_confirmation"
                                        name="new_password_confirmation" placeholder="Confirm New Password"
                                        aria-label="Password" aria-describedby="Password-addon">
                                </div>

                                <div class="text-center m-4" style="margin-top: -6%">
                                    <button type="button" onclick="UpdateAdminPassword()"
                                        class="btn bg-gradient-primary w-100 mt-4 mb-0">Save
                                        Changes</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-8">
                    <div class="card h-60">
                        <div class="card-header pb-0 p-3">
                            <div class="row" style="margin-top: -0%">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-0">Profile Information</h6>
                                </div>
                                <div class="col-md-4 text-end">
                                    <a href="javascript:;">
                                        <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Edit Profile"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3" style="margin-top: -2%">
                            <div class="m-4">
                                <form method="POST" id="updateAdminForm">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ session('admin_id') }}"
                                        placeholder="User ID">

                                    <div class="mb-1">
                                        <label class="form-label text-dark"><strong>Full Name:</strong></label>
                                        <input type="text" id="admin_name" name="admin_name" class="form-control"
                                            value="{{ $admin->admin_name }}">
                                    </div>

                                    <div class="mb-1">
                                        <label class="form-label text-dark"><strong>Mobile:</strong></label>
                                        <input type="text" id="admin_mobile" name="admin_mobile" class="form-control"
                                            value="{{ $admin->admin_mobile }}">
                                    </div>

                                    <div class="mb-1">
                                        <label class="form-label text-dark"><strong>Email:</strong></label>
                                        <input type="email" id="admin_email" name="admin_email" class="form-control"
                                            value="{{ $admin->admin_email }}">
                                    </div>

                                </form>
                            </div>


                            <div class="text-center mx-4 mb-4" style="margin-top: -2%">
                                <button type="button" onclick="UpdateAdmin()"
                                    class="btn bg-gradient-primary w-100 mt-4 mb-0">Save
                                    Changes</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>

        {{-- cards --}}
        <div class="container-fluid py-4">
            <div class="row">

            </div>
            @include('Admin.components.adminscripts')
            @include('Admin.components.footer')
        </div>
    </main>
    @include('Admin.components.scripts')
</body>

</html>
