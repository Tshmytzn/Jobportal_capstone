<!DOCTYPE html>
<html lang="en">

@include('Jobseeker.components.head', ['title' => 'Agency Login'])

{{-- @include('Jobseeker.components.navbar', ['header' => 'login']) --}}

<body style="background-color: #e3ddeb">

    @include('Jobseeker.components.spinner')

    @include('Jobseeker.components.navbar', ['active' => 'agencylogin'])

    <div class="row mt-5 mb-4">

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
                        <form method="POST" id="agencyloginform">
                            @csrf
                            <label for="agencyemail">Email: </label>
                            <div class="mb-3">
                                <input type="email" id="agencyemail" name="email" class="form-control"
                                    placeholder="Enter Email" aria-label="Email" aria-describedby="email-addon">
                            </div>
                            <label for="agencypassword">Password: </label>
                            <div class="mb-3">
                                <input type="password" id="agencypassword" name="password" class="form-control"
                                    placeholder="Enter Password" aria-label="Password"
                                    aria-describedby="password-addon">
                            </div>
                            <div class="text-center">
                                <button type="button" onclick="loginAgency()"
                                    class="btn btn-light border border-primary rounded-pill w-100 mt-3 mb-3">Login</button>
                            </div>
                            <div class="text-center">
                                <label for="signup">Don't have an account yet? <span class="text-secondary small"><a
                                            href="{{ route('agencysignup') }}">Sign up here.</a></span></label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('Jobseeker.components.scripts')

    <script>
        function loginAgency() {
            var formElement = document.getElementById('agencyloginform');
            var formData = new FormData(formElement);

            $.ajax({
                type: "POST",
                url: '{{ route('LoginAgency') }}',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status === 'error') {
                        Swal.fire('Error', response.message, 'error');
                    } else {
                        Swal.fire({
                            title: 'Success',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            window.location.href = '{{ route('agencydashboard') }}';
                        });
                    }
                },
                error: function(xhr) {
                    console.error('AJAX Error:', xhr.responseText); // Log the error
                    Swal.fire('Error', 'Invalid Credentials.', 'error');
                }
            });
        }
    </script>

</body>

</html>
