<!DOCTYPE html>
<html lang="en">

@include('Jobseeker.components.head', ['title' => 'Job Portal'])

<body style="background-color: #e3ddeb">

    @include('Jobseeker.components.spinner')

    <div class="row mt-3 mb-4">
        <div class="col-xl-8 col-lg-8 col-md-8 d-flex flex-column mx-auto">
            <div class="card card-plain mt-2">
                <div class="card-header pb-0 text-center bg-transparent" style="border: none">
                    <div class="text-center mb-2 mr-5">
                        <!-- Use 'img-fluid' to make the image responsive and 'w-50' to set width -->
                        <img src="{{ asset('../assets/svg/undraw_Hello_re_3evm.png') }}" class="img-fluid w-50"
                            alt="Hello Image">
                    </div>
                    <h2 class="font-weight-bolder text-info text-gradient-primary ">Welcome Jobseeker!</h2>
                    <p class="mb-3">Please fill in the information below to create an account</p>
                </div>
                <hr>
                <div class="card-body " style="border: none">

                    <form role="form" class="">

                        <div class="row">
                            <div class="col-3 mb-3">
                                <label>First Name: </label>

                                <input type="text" class="form-control" placeholder="Enter First Name"
                                    aria-label="First Name">
                            </div>
                            <div class="col-3 mb-3">
                                <label>Middle Name: </label>

                                <input type="text" class="form-control" placeholder="Enter Middle Name"
                                    aria-label="Middle Name">
                            </div>
                            <div class="col-3 mb-3">
                                <label>Last Name: </label>
                                <input type="text" class="form-control" placeholder="Enter Last Name"
                                    aria-label="Last Name">
                            </div>
                            <div class="col-3 mb-3">
                                <label>Suffix: </label>
                                <input type="text" class="form-control" placeholder="Enter Suffix (e.g., Jr., Sr.)"
                                    aria-label="Suffix">
                            </div>
                        </div>

                        <label>Gender: </label>
                        <div class="mb-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="male"
                                    value="Male">
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

                        <label>Home Address: </label>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Enter Home Address"
                                aria-label="Home Address">
                        </div>
                        <div class="row">

                            <div class="col-6 mb-3">
                                <label>Email Address: </label>
                                <input type="email" class="form-control" placeholder="Enter Email Address"
                                    aria-label="Email">
                            </div>
                            <div class="col-6 mb-3">
                                <label>Contact Number: </label>
                                <div class="input-group">
                                    <span class="input-group-text">+63</span>
                                    <input type="tel" class="form-control" placeholder="Enter Contact Number"
                                        aria-label="Contact Number">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 mb-3">
                                <label>Password: </label>
                                <input type="password" class="form-control" placeholder="Enter Password"
                                    aria-label="Password">
                            </div>
                            <div class="col-6 mb-3">
                                <label>Confirm Password: </label>
                                <input type="password" class="form-control" placeholder="Confirm Password"
                                    aria-label="Confirm Password">
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button"
                                class="btn btn-light border border-primary rounded-pill w-100 mt-3 mb-3">Sign
                                Up</button>
                        </div>
                        <div class="text-center">
                            <label for="signin">Already have an account? <span class="text-secondary small"> <a
                                        href="{{ route('login') }}">Sign in
                                        here.</a></span></label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @include('Jobseeker.components.scripts')


</body>

</html>
