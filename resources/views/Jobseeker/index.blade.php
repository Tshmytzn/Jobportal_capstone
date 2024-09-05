<!DOCTYPE html>
<html lang="en">

@include('Jobseeker.components.head', ['title' => 'Job Portal'])

<body>

    @include('Jobseeker.components.spinner')

    @include('Jobseeker.components.navbar', ['active' => 'homepage'])

    <!-- Hero Header Start -->

    <div class="hero-header overflow-hidden px-5">
        <div class="rotate-img">
            <img src="img/sty-1.png" class="img-fluid w-100" alt="">
            <div class="rotate-sty-2"></div>
        </div>
        <div class="row gy-5 align-items-center">
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                <h1 class="display-4 text-dark mb-4 wow fadeInUp" data-wow-delay="0.3s">
                    <p> <span>Public Employment Service Office </span> <br><span>Blue-Collar Center (PESOBCC)</span></p>
                </h1>
                <p class="fs-4 mb-4 wow fadeInUp" data-wow-delay="0.5s">Looking for meaningful hands-on work that drives
                    the economy? The Job Portal for Blue-Collar Workers by PESO connects job seekers with a wide range
                    of opportunities in skilled trades and essential industries.
                </p>
                <a href="#" class="btn btn-primary rounded-pill py-3 px-5 wow fadeInUp" data-wow-delay="0.7s">Get
                    Started</a>
            </div>
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.2s">
                <img src="img/undraw_under_construction_-46-pa.svg" class="img-fluid w-100 h-100" alt="">
            </div>
        </div>
    </div>
    <!-- Hero Header End -->

    </div>
    <!-- Navbar & Hero End -->

    <!-- Search Bar -->
    <div class="search-bar container mt-5">
        <form class="row g-3">
            <div class="col-md-4">
                <input type="text" class="form-control" id="keyword" placeholder="Enter Keyword">
            </div>
            <div class="col-md-3">
                <select class="form-select" id="category">
                    <option selected>Category</option>
                    <option value="1">Construction</option>
                    <option value="2">Electrician</option>
                    <option value="3">Plumbing</option>
                    <option value="4">Welding and Metalwork</option>
                    <option value="5">Mechanical</option>
                    <option value="6">Driving and Transportation</option>
                    <option value="7">Warehouse and Custodial</option>
                    <option value="8">Gardening and Landscape</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select" id="location">
                    <option selected>Location</option>
                    <option value="1">Location 1</option>
                    <option value="2">Location 2</option>
                    <option value="3">Location 3</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Search</button>
            </div>
        </form>
    </div>
    {{-- Search bar end --}}

    <!-- Service Start -->
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
                <h4 class="mb-1 text-primary">Opportunities for Blue-Collar Workers</h4>
                <h1 class="display-5 mb-4">Featured Job Categories</h1>
                <p class="mb-0">Explore a wide range of hands-on, skilled job opportunities. From construction and
                    electrical work to welding, plumbing, and transportation, our platform connects you with essential
                    industries. Whether you're starting your career or seeking new opportunities, these vital roles
                    drive the workforce and offer rewarding paths in skilled trades.</p>

            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center rounded p-4">
                        <div class="service-icon d-inline-block bg-light rounded p-4 mb-4"><i
                                class="fa-solid fa-helmet-safety fa-5x text-secondary"></i></div>
                        <div class="service-content">
                            <h4 class="mb-4">Construction</h4>
                            <p class="mb-4">Engage in building and repairing structures. Key tasks include carpentry,
                                masonry, and site management for residential and commercial projects.</p>
                            <a href="#" class="btn btn-light rounded-pill text-primary py-2 px-4">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center rounded p-4">
                        <div class="service-icon d-inline-block bg-light rounded p-4 mb-4"><i
                                class="fa-solid fa-bolt-lightning fa-5x text-secondary"></i></div>
                        <div class="service-content">
                            <h4 class="mb-4">Electrician</h4>
                            <p class="mb-4">Install and maintain electrical systems. Responsibilities cover wiring,
                                circuit repairs, and ensuring electrical safety in various settings.</p>
                            <a href="#" class="btn btn-light rounded-pill text-primary py-2 px-4">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center rounded p-4">
                        <div class="service-icon d-inline-block bg-light rounded p-4 mb-4"><i
                                class="fa-solid fa-wrench fa-5x text-secondary"></i></div>
                        <div class="service-content">
                            <h4 class="mb-4">Plumbing</h4>
                            <p class="mb-4">Handle installation and repair of water systems. Tasks include fixing
                                leaks, installing pipes, and ensuring proper water flow in buildings.</p>
                            <a href="#" class="btn btn-light rounded-pill text-primary py-2 px-4">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center rounded p-4">
                        <div class="service-icon d-inline-block bg-light rounded p-4 mb-4"><i
                                class="fa-solid fa-tachometer-alt fa-5x text-secondary"></i></div>
                        <div class="service-content">
                            <h4 class="mb-4">Welding and Metalwork</h4>
                            <p class="mb-4">Perform welding and metal fabrication. Includes joining metal parts,
                                cutting, and shaping for construction and manufacturing projects.</p>
                            <a href="#" class="btn btn-light rounded-pill text-primary py-2 px-4">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center rounded p-4">
                        <div class="service-icon d-inline-block bg-light rounded p-4 mb-4"><i
                                class="fa-solid fa-screwdriver-wrench fa-5x text-secondary"></i></div>
                        <div class="service-content">
                            <h4 class="mb-4">Mechanical</h4>
                            <p class="mb-4">Work on various complex machinery and engines. Includes maintaining,
                                repairing, and troubleshooting mechanical systems across diverse industries.</p>
                            <a href="#" class="btn btn-light rounded-pill text-primary py-2 px-4">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center rounded p-4">
                        <div class="service-icon d-inline-block bg-light rounded p-4 mb-4"><i
                                class="fa-solid fa-car fa-5x text-secondary"></i></div>
                        <div class="service-content">
                            <h4 class="mb-4">Driving and Transportation</h4>
                            <p class="mb-4">Transport goods and people. Responsibilities include driving, delivery,
                                and ensuring safe and timely transportation in various settings.</p>
                            <a href="#" class="btn btn-light rounded-pill text-primary py-2 px-4">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center rounded p-4">
                        <div class="service-icon d-inline-block bg-light rounded p-4 mb-4"><i
                                class="fa-solid fa-warehouse fa-5x text-secondary"></i></div>
                        <div class="service-content">
                            <h4 class="mb-4">Warehouse and Custodial</h4>
                            <p class="mb-4">Manage inventory and maintain facilities. Key tasks include organizing
                                stock, cleaning, and ensuring smooth operations within warehouses.</p>
                            <a href="#" class="btn btn-light rounded-pill text-primary py-2 px-4">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center rounded p-4">
                        <div class="service-icon d-inline-block bg-light rounded p-4 mb-4"><i
                                class="fa-solid fa-trowel fa-5x text-secondary"></i></div>
                        <div class="service-content">
                            <h4 class="mb-4">Gardening and Landscape</h4>
                            <p class="mb-4">Design and maintain outdoor spaces. Tasks include planting, landscaping,
                                and ensuring the beauty and functionality of gardens and public areas.</p>
                            <a href="#" class="btn btn-light rounded-pill text-primary py-2 px-4">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Feature Start -->
    <div class="container-fluid feature overflow-hidden py-5">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">

                <h4 class="text-primary">Our Feature</h4>
                <h1 class="display-5 mb-4">How to Apply Using Our Job Portal</h1>
                <p class="mb-0">Easily navigate our job portal with these four essential steps:</p>
            </div>
            <div class="row g-4 justify-content-center text-center mb-5">
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="text-center p-4">
                        <div class="d-inline-block rounded bg-light p-4 mb-4">
                            <i class="fas fa-user-plus fa-5x text-secondary"></i>
                        </div>
                        <div class="feature-content">
                            <a href="#" class="h4">Register Your Account <i
                                    class="fa fa-long-arrow-alt-right"></i></a>
                            <p class="mt-4 mb-0">Create your profile, and set preferences for job searches.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="text-center p-4">
                        <div class="d-inline-block rounded bg-light p-4 mb-4">
                            <i class="fas fa-search fa-5x text-secondary"></i>
                        </div>
                        <div class="feature-content">
                            <a href="#" class="h4">Search Job listings <i
                                    class="fa fa-long-arrow-alt-right"></i></a>
                            <p class="mt-4 mb-0">Apply filters to find job openings that match your skills and
                                interests.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="text-center rounded p-4">
                        <div class="d-inline-block rounded bg-light p-4 mb-4">
                            <i class="fas fa-file-alt fa-5x text-secondary"></i>
                        </div>
                        <div class="feature-content">
                            <a href="#" class="h4">Submit Your Application <i
                                    class="fa fa-long-arrow-alt-right"></i></a>
                            <p class="mt-4 mb-0">Customize cover letters, complete forms, and apply directly to jobs.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="text-center rounded p-4">
                        <div class="d-inline-block rounded bg-light p-4 mb-4">
                            <i class="fas fa-clipboard-check fa-5x text-secondary"></i>
                        </div>
                        <div class="feature-content">
                            <a href="#" class="h4">Track Your Status <i
                                    class="fa fa-long-arrow-alt-right"></i></a>
                            <p class="mt-4 mb-0">Monitor your application status, and update your profile.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="my-3">
                        <a href="#" class="btn btn-primary d-inline rounded-pill px-5 py-3">More Features</a>
                    </div>
                </div>
            </div>

            <div class="row g-5 pt-5" style="margin-top: 6rem;">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="feature-img RotateMoveLeft h-100" style="object-fit: cover;">
                        <img src="img/undraw_people_search_re_5rre.svg" class="img-fluid w-100 h-100" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.1s">
                    <h4 class="text-primary">Benefits for Agencies</h4>
                    <h1 class="display-5 mb-4">Maximize Your Recruitment Efficiency</h1>
                    <p class="mb-4">Registering with our job portal offers agencies unparalleled access to a wide
                        pool of skilled candidates. Streamline your hiring process and connect with qualified candidates
                        effortlessly.</p>
                    <div class="row g-4 m-4">
                        <div class="col-6">
                            <div class="d-flex">
                                <i class="fas fa-search fa-4x text-secondary"></i>
                                <div class="d-flex flex-column ms-3">
                                    <h2 class="mb-0 fw-bold">500+</h2>
                                    <small class="text-dark">Candidates Available</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex">
                                <i class="fas fa-handshake fa-4x text-secondary"></i>
                                <div class="d-flex flex-column ms-3">
                                    <h2 class="mb-0 fw-bold">1000+</h2>
                                    <small class="text-dark">Successful Placements</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="my-4">
                        <a href="#" class="btn btn-primary rounded-pill py-3 px-5 mt-4">Get Started</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Feature End -->



    @include('Jobseeker.components.footer')

    @include('Jobseeker.components.scripts')

</body>

</html>
