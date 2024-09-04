        <!-- Navbar & Hero Start -->
        <div class="container-fluid header position-relative overflow-hidden p-0">
            <nav class="navbar navbar-expand-lg fixed-top navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="index.html" class="navbar-brand p-0">
                    <h1 class="display-6 text-primary m-0">
                        <img src="{{ asset('../assets/img/PESOLOGO.png') }}" alt="" class="mb-2 me-2">
                        {{-- <i class="fa-solid fa-helmet-safety me-3"></i> --}}
                        </i>Job Portal
                    </h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="{{ route('homepage') }}" class="nav-item nav-link active">Home</a>
                        <a href="{{ route('about') }}" class="nav-item nav-link">About</a>
                        <a href="service.html" class="nav-item nav-link">Services</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                                <a href="feature.html" class="dropdown-item">Features</a>
                                <a href="pricing.html" class="dropdown-item">Pricing</a>
                                <a href="blog.html" class="dropdown-item">Blog</a>
                                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                <a href="404.html" class="dropdown-item">404 Page</a>
                            </div>
                        </div>
                        <a href="contact.html" class="nav-item nav-link">Contact Us</a>
                    </div>
                    <!-- Log In Dropdown -->
                    <div class="dropdown d-inline">
                        <button
                            class="btn btn-light border border-primary rounded-pill text-primary py-2 px-4 dropdown-toggle me-4"
                            type="button" id="loginDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Log In
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="loginDropdown">
                            <li><a class="dropdown-item" href="{{route('login')}}">as Jobseeker</a></li>
                            <li><a class="dropdown-item" href="{{route('agencylogin')}}">as Agency</a></li>
                        </ul>
                    </div>

                    <!-- Sign Up Dropdown -->
                    <div class="dropdown d-inline">
                        <button class="btn btn-primary rounded-pill text-white py-2 px-4 dropdown-toggle" type="button"
                            id="signupDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Sign Up
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="signupDropdown">
                            <li><a class="dropdown-item" href="{{route('signup')}}">as Jobseeker</a></li>
                            <li><a class="dropdown-item" href="{{route('agencysignup')}}">as Agency</a></li>
                        </ul>
                    </div>

                </div>
            </nav>
