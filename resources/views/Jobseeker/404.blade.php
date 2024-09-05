<!DOCTYPE html>
<html lang="en">

@include('Jobseeker.components.head', ['title' => 'Job Portal'])

<body>

    @include('Jobseeker.components.spinner')

    <nav class="navbar navbar-expand-lg fixed-top navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="index.html" class="navbar-brand p-0">
            <h1 class="display-6 text-primary m-0">
                <img src="{{ asset('../assets/img/PESOLOGO.png') }}" alt="" class="mb-2 me-2">
                {{-- <i class="fa-solid fa-helmet-safety me-3"></i> --}}
                </i>Job Portal
            </h1>
            <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
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
            <a href="{{ route('login') }}"
                class="btn btn-light border border-primary rounded-pill text-primary py-2 px-4 me-4">Log In</a>
            <a href="#" class="btn btn-primary rounded-pill text-white py-2 px-4">Sign Up</a>
        </div>
    </nav>


    <!-- 404 Start -->
    <div class="container-fluid py-5 mt-5">
        <div class="container py-5 text-center">
            <div class="row justify-content-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <i class="bi bi-exclamation-triangle display-1 text-secondary"></i>
                    <h1 class="display-1">404</h1>
                    <h1 class="mb-4">Page Not Found</h1>
                    <p class="mb-4">We’re sorry, the page you have looked for does not exist in our website! Maybe go
                        to our home page or try to use a search?</p>
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="index.html">Go Back To Home</a>
                </div>
            </div>
        </div>
    </div>
    <!-- 404 End -->

    @include('Jobseeker.components.scripts')


</body>

</html>
