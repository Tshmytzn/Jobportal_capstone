<!DOCTYPE html>
<html lang="en">

@include('Jobseeker.components.head', ['title' => 'Jobs'])

<body>

    @include('Jobseeker.components.spinner')

    @include('Jobseeker.components.navbar', ['active' => 'jobs'])

    @include('Jobseeker.components.header', ['title' => 'Job Categories'])


    <!-- job category Start -->
    <div class="container-fluid service py-2">
        <div class="container py-2">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
                <h4 class="mb-1 text-primary">Opportunities for Blue-Collar Workers</h4>
                <h1 class="display-5 mb-4">Featured Job Categories</h1>

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
                            <a href="{{ route('jobslist') }}"
                                class="btn btn-light rounded-pill text-primary py-2 px-4">View Jobs</a>
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
                            <a href="#" class="btn btn-light rounded-pill text-primary py-2 px-4">View Jobs</a>
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
                            <a href="#" class="btn btn-light rounded-pill text-primary py-2 px-4">View Jobs</a>
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
                            <a href="#" class="btn btn-light rounded-pill text-primary py-2 px-4">View Jobs</a>
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
                            <a href="#" class="btn btn-light rounded-pill text-primary py-2 px-4">View Jobs</a>
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
                            <a href="#" class="btn btn-light rounded-pill text-primary py-2 px-4">View Jobs</a>
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
                            <a href="#" class="btn btn-light rounded-pill text-primary py-2 px-4">View Jobs</a>
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
                            <a href="#" class="btn btn-light rounded-pill text-primary py-2 px-4">View Jobs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job category End -->

    @include('Jobseeker.components.footer')

    @include('Jobseeker.components.scripts')


</body>

</html>
