<!DOCTYPE html>
<html lang="en">

@include('Jobseeker.components.head', ['title' => 'About'])

<body>

    @include('Jobseeker.components.spinner')

    @include('Jobseeker.components.navbar', ['active' => 'about'])

    @include('Jobseeker.components.header', ['title' => 'About Us'])

    <!-- About Start -->
    <div class="container-fluid overflow-hidden py-4 mt-3"> <!-- Reduced py-5 to py-4 and mt-5 to mt-3 -->
        <div class="container py-4"> <!-- Reduced py-5 to py-4 -->
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="RotateMoveLeft">
                        <img src="img/about-1.png" class="img-fluid w-100" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h4 class="mb-1 text-secondary">About Us</h4>
                    <h1 class="display-5 mb-4">The Public Employment Service Office Blue-Collar Center (PESOBCC)</h1>
                    <p class="mb-4">Is a non-fee charging multi-dimenstional employment service facility or entity
                        established in all Local Government Units (LGUs) in coordination with the Department of Labor
                        and Employment (DOLE) pursuant to R.A. No. 8759 or the PESO Act of 1999 as amended by R.A. No.
                        10691. The PESO aims to ensure prompt and efficient delivery of employment facilitation services
                        as well as to provide timely information on labor market and DOLE Programs.
                    </p>

                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- About Start -->
    <div class="container-fluid overflow-hidden py-4"> <!-- Reduced py-5 to py-4 and mt-5 to mt-3 -->
        <div class="container py-4"> <!-- Reduced py-5 to py-4 -->
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="RotateMoveLeft">
                        <img src="img/about-2.png" class="img-fluid w-100" alt="">
                    </div>
                </div>
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s">
                    <h4 class="mb-1 text-secondary">Welcome to PESO</h4>
                    <h1 class="display-5 mb-4">Blue Collar Job Portal</h1>
                    <p class="mb-4">Are you seeking meaningful employment in hands-on roles that drive our economy
                        forward? Look no further than the Job Portal For Blue-Collar Workers, brought to you by the
                        Public Employment Service Office (PESO). Our platform is designed specifically to connect job
                        seekers with a wide range of opportunities in the skilled trades and essential industries.</p>

                    <div class="row g-4 mb-4">
                        <div class="col-md-6">
                            <div class="feature-box d-flex align-items-center p-4 bg-light rounded">
                                <i class="fas fa-briefcase fa-3x text-primary me-3"></i>
                                <div>
                                    <h4 class="mb-2">Diverse Opportunities</h4>
                                    <p class="mb-0">Discover job listings in various sectors like construction,
                                        manufacturing, and transportation. Suitable for both seasoned professionals and
                                        newcomers.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-box d-flex align-items-center p-4 bg-light rounded">
                                <i class="fas fa-search fa-3x text-primary me-3"></i>
                                <div>
                                    <h4 class="mb-2">Easy Navigation</h4>
                                    <p class="mb-0">Browse job openings effortlessly with our user-friendly interface.
                                        Filter results by location, industry, and job title to match your preferences.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-box d-flex align-items-center p-4 bg-light rounded">
                                <i class="fas fa-tools fa-3x text-primary me-3"></i>
                                <div>
                                    <h4 class="mb-2">Resources & Support</h4>
                                    <p class="mb-0">Access tools and resources for resume building, interview
                                        preparation, and career development to enhance your job search.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="feature-box d-flex align-items-center p-4 bg-light rounded">
                                <i class="fas fa-handshake fa-3x text-primary me-3"></i>
                                <div>
                                    <h4 class="mb-2">Connect with Employers</h4>
                                    <p class="mb-0">Engage directly with employers, submit applications, and showcase
                                        your skills through our platform.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="my-4">
                        <a href="#" class="btn btn-primary rounded-pill py-3 px-5">Start Your Journey</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    @include('Jobseeker.components.footer')

    @include('Jobseeker.components.scripts')


</body>

</html>
