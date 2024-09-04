<!DOCTYPE html>
<html lang="en">

@include('Jobseeker.components.head', ['title' => 'Jobseeker Login'])

{{-- @include('Jobseeker.components.navbar', ['header' => 'login']) --}}

<body style="background-color: #e3ddeb">

    @include('Jobseeker.components.spinner')


    <div class="row mt-5 mb-4">
        <div class="col-xl-4 col-lg-6 col-md-6 d-flex flex-column mx-auto">
            <div class="card card-plain mt-2">
                <div class="card-header pb-0 text-center bg-transparent" style="border: none">
                    <div class="text-center mb-4 mr-5">
                        <!-- Use 'img-fluid' to make the image responsive and 'w-50' to set width -->
                        <img src="{{ asset('../assets/svg/undraw_Hello_re_3evm.png') }}" class="img-fluid w-75"
                            alt="Hello Image">
                    </div>
                    <h2 class="font-weight-bolder text-info text-gradient-primary ">Hello Agency!</h2>
                    <p class="mb-4">Enter your email and password to login</p>
                </div>
                <hr>
                <div class="card-body" style="border: none">
                    <form role="form">
                        <label>Email: </label>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Enter Email" aria-label="Email"
                                aria-describedby="email-addon">
                        </div>
                        <label>Password: </label>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Enter Password"
                                aria-label="Password" aria-describedby="password-addon">
                        </div>
                        <div class="text-center">
                            <button type="button"
                                class="btn btn-light border border-primary rounded-pill w-100 mt-3 mb-3">Login</button>
                        </div>
                        <div class="text-center">
                            <label for="signup" >Don't have an account yet? <span class="text-secondary small"> <a href="{{route('agencysignup')}}">Sign up here. </a> </span></label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @include('Jobseeker.components.scripts')


</body>

</html>
