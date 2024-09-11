<!DOCTYPE html>
<html lang="en">

@include('Jobseeker.components.head', ['title' => 'Profile'])

<body>

    @include('Jobseeker.components.spinner')

    @include('Jobseeker.components.navbar')

    @include('Jobseeker.components.header', ['title' => 'Profile'])

    <div class="container mt-5 mb-5">
        <div class="row">
            <!-- Profile Picture and Info -->
            <div class="card col-md-4">
                <div class="text-center">
                    <div class="card-body">
                        <img src="{{asset('../assets/img/team-1.jpg')}}" alt="profile_image" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                        <h5 class="card-title">John Doe</h5> <!-- Replace with dynamic jobseeker name -->
                        <p class="text-muted">Job Seeker</p>
                        <button class="btn btn-outline-primary btn-sm w-100">Update Profile Picture</button>
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-header">
                        <h6>Update Account Password</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="currentPassword">Enter Current Password</label>
                            <input type="password" id="currentPassword" class="form-control" placeholder="Current Password">
                        </div>
                        <div class="form-group mb-3">
                            <label for="newPassword">Enter New Password</label>
                            <input type="password" id="newPassword" class="form-control" placeholder="New Password">
                        </div>
                        <div class="form-group mb-4">
                            <label for="confirmPassword">Confirm New Password</label>
                            <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm Password">
                        </div>
                        <button class="btn btn-primary w-100 mb-2">Change Password</button>
                    </div>
                </div>
            </div>

            <!-- Update Profile Info -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h6>Profile Information</h6>
                    </div>
                    <div class="card-body mt-2">
                        <form action="">
                            @csrf
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label for="firstname">First Name: </label>
                                    <input type="text" class="form-control" name="firstname"
                                        placeholder="Enter First Name" aria-label="First Name" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="midname">Middle Name: </label>
                                    <input type="text" class="form-control" name="midname"
                                        placeholder="Enter Middle Name" aria-label="Middle Name" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label for="lastname">Last Name: </label>
                                    <input type="text" class="form-control" name="lastname"
                                        placeholder="Enter Last Name" aria-label="Last Name" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="suffix">Suffix: </label>
                                    <input type="text" class="form-control" name="suffix"
                                        placeholder="Enter Suffix (e.g., Jr., Sr.)" aria-label="Suffix" optional>
                                </div>
                            </div>
                            <div class="row">
                                <label>Gender: </label>
                                <div class="mb-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="male"
                                            value="Male" required>
                                        <label class="form-check-label" for="male">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="female"
                                            value="Female">
                                        <label class="form-check-label" for="female">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="other"
                                            value="Other">
                                        <label class="form-check-label" for="other">Other</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="address">Home Address: </label>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="address"
                                        placeholder="Enter Home Address" aria-label="Home Address" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mb-4">
                                    <label for="email">Email Address: </label>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Enter Email Address" aria-label="Email" required>
                                </div>
                                <div class="col-6 mb-4">
                                    <label for="contact">Contact Number: </label>
                                    <div class="input-group">
                                        <span class="input-group-text">+63</span>
                                        <input type="tel" class="form-control" name="contact"
                                            placeholder="Enter Contact Number" aria-label="Contact Number" required>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100 mb-2">Save Changes</button>
                        </form>
                    </div>
                </div>
                <div class="card mt-4 mb-1">
                    <div class="card-header">
                        <h6>Upload Resume</h6>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <label for="resume">Resume:</label>
                            <input type="file" id="resume" name="resume" class="form-control">   
                            <button class="btn btn-primary w-100 mt-4 mb-2">Upload</button>                         
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('Jobseeker.components.footer')

    @include('Jobseeker.components.scripts')


</body>

</html>
