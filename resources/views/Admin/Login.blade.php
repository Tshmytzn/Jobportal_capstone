<!DOCTYPE html>
<html lang="en">
@include('Admin.components.head', ['title' => 'Admin Login'])
<body class="">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-2">
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <div class="text-center mb-4 mr-5">
                                        <!-- Use 'img-fluid' to make the image responsive and 'w-50' to set width -->
                                        <img src="{{ asset('../assets/svg/undraw_Hello_re_3evm.png') }}"
                                            class="img-fluid w-100" alt="Hello Image">
                                    </div>
                                    <h2 class="font-weight-bolder text-info text-gradient-primary">Hello Admin!</h2>
                                    <p class="mb-0">Enter your email and password to login</p>
                                </div>
                                <div class="card-body">
                                    <form method="POST" id="adminLoginForm">
                                        @csrf
                                        <label>Email</label>
                                        <div class="mb-3">
                                            <input type="email" id="admin_email" name="email" class="form-control" placeholder="Email"
                                                aria-label="Email" aria-describedby="email-addon">
                                        </div>
                                        <label>Password</label>
                                        <div class="mb-3">
                                            <input type="password" id="admin_password" name="password" class="form-control" placeholder="Password"
                                                aria-label="Password" aria-describedby="password-addon">
                                        </div>
                                        <div class="text-center">
                                            <button type="button" onclick="loginAdmin()"
                                                class="btn bg-gradient-primary w-100 mt-4 mb-0">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('Admin.components.scripts')
    @include('Admin.components.adminloginscripts')

</body>

</html>
