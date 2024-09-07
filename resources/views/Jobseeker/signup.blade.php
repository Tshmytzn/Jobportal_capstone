<!DOCTYPE html>
<html lang="en">

@include('Jobseeker.components.head', ['title' => 'Job Portal'])

<body style="background-color: #e3ddeb">

    @include('Jobseeker.components.spinner')

    @include('Jobseeker.components.navbar', ['active' => 'signup'])

    <div class="row mt-5 mb-4">
        <div class="row mt-5 mb-4">
            <div class="col-xl-8 col-lg-8 col-md-8 d-flex flex-column mx-auto">
                <div class="card card-plain mt-2">
                    <div class="card-header pb-0 text-center bg-transparent" style="border: none">
                        <div class="text-center mb-2 mr-5">
                            <img src="{{ asset('../assets/svg/undraw_Hello_re_3evm.png') }}" class="img-fluid w-50"
                                alt="Hello Image">
                        </div>
                        <h2 class="font-weight-bolder text-info text-gradient-primary ">Welcome Jobseeker!</h2>
                        <p class="mb-3">Please fill in the information below to create an account</p>
                    </div>
                    <hr>
                    <div class="card-body " style="border: none">
                        <form id="jobseekerForm" role="form" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-3 mb-3">
                                    <label for="firstname">First Name: </label>
                                    <input type="text" class="form-control" name="firstname"
                                        placeholder="Enter First Name" aria-label="First Name" required>
                                </div>
                                <div class="col-3 mb-3">
                                    <label for="midname">Middle Name: </label>
                                    <input type="text" class="form-control" name="midname"
                                        placeholder="Enter Middle Name" aria-label="Middle Name" required>
                                </div>
                                <div class="col-3 mb-3">
                                    <label for="lastname">Last Name: </label>
                                    <input type="text" class="form-control" name="lastname"
                                        placeholder="Enter Last Name" aria-label="Last Name" required>
                                </div>
                                <div class="col-3 mb-3">
                                    <label for="suffix">Suffix: </label>
                                    <input type="text" class="form-control" name="suffix"
                                        placeholder="Enter Suffix (e.g., Jr., Sr.)" aria-label="Suffix" required>
                                </div>
                            </div>

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

                            <label for="address">Home Address: </label>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="address"
                                    placeholder="Enter Home Address" aria-label="Home Address" required>
                            </div>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label for="email">Email Address: </label>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Enter Email Address" aria-label="Email" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="contact">Contact Number: </label>
                                    <div class="input-group">
                                        <span class="input-group-text">+63</span>
                                        <input type="tel" class="form-control" name="contact"
                                            placeholder="Enter Contact Number" aria-label="Contact Number" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label for="password">Password: </label>
                                    <input type="password" class="form-control" name="password"
                                        placeholder="Enter Password" aria-label="Password" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="password_confirmation">Confirm Password: </label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                        placeholder="Confirm Password" aria-label="Confirm Password" required>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit"
                                    class="btn btn-light border border-primary rounded-pill w-100 mt-3 mb-3">Sign
                                    Up</button>
                            </div>
                        </form>
                        <div class="text-center">
                            <label for="signin">Already have an account? <span class="text-secondary small"> <a
                                        href="{{ route('login') }}">Sign in
                                        here.</a></span></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('Jobseeker.components.scripts')

    <!-- Include jQuery if not already included -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#jobseekerForm').on('submit', function(event) {
                event.preventDefault();

                $.ajax({
                    url: "{{ route('jobseekersCreate') }}",
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Account created successfully!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Redirect after alert is closed
                                window.location.href = "{{ route('login') }}";
                            }
                        });
                    },
                    error: function(xhr) {
                        var errors = xhr.responseJSON.errors;
                        var errorMessages = '';
                        $.each(errors, function(key, value) {
                            errorMessages += value[0] + '<br>';
                        });

                        Swal.fire({
                            title: 'Error!',
                            html: errorMessages,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });
        });
    </script>


</body>

</html>
