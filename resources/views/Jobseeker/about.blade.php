<!DOCTYPE html>
<html lang="en">

@include('Jobseeker.components.head', ['title' => 'Job Portal'])

<body>

    @include('Jobseeker.components.spinner')

    @include('Jobseeker.components.navbar')

    @include('Jobseeker.components.header')

    <!-- About Start -->
    <div class="container-fluid overflow-hidden py-5 mt-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="RotateMoveLeft">
                        <img src="img/about-1.png" class="img-fluid w-100" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h4 class="mb-1 text-primary">About Us</h4>
                    <h1 class="display-5 mb-4">Get Started Easily With a Personalized Product Tour</h1>
                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, suscipit
                        itaque quaerat dicta porro illum, autem, molestias ut animi ab aspernatur dolorum officia nam
                        dolore. Voluptatibus aliquam earum labore atque.
                    </p>
                    <a href="#" class="btn btn-primary rounded-pill py-3 px-5">About More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Feature Start -->
    <div class="container-fluid feature overflow-hidden py-5">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
                <h4 class="text-primary">Our Feature</h4>
                <h1 class="display-5 mb-4">Important Features For Email Marketing</h1>
                <p class="mb-0">Dolor sit amet consectetur, adipisicing elit. Ipsam, beatae maxime. Vel animi eveniet
                    doloremque reiciendis soluta iste provident non rerum illum perferendis earum est architecto dolores
                    vitae quia vero quod incidunt culpa corporis, porro doloribus. Voluptates nemo doloremque cum.
                </p>
            </div>
            <div class="row g-4 justify-content-center text-center mb-5">
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="text-center p-4">
                        <div class="d-inline-block rounded bg-light p-4 mb-4"><i
                                class="fas fa-envelope fa-5x text-secondary"></i></div>
                        <div class="feature-content">
                            <a href="#" class="h4">Email Marketing <i
                                    class="fa fa-long-arrow-alt-right"></i></a>
                            <p class="mt-4 mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.consectetur
                                adipisicing elit
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="text-center p-4">
                        <div class="d-inline-block rounded bg-light p-4 mb-4"><i
                                class="fas fa-mail-bulk fa-5x text-secondary"></i></div>
                        <div class="feature-content">
                            <a href="#" class="h4">Email Builder <i
                                    class="fa fa-long-arrow-alt-right"></i></a>
                            <p class="mt-4 mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.consectetur
                                adipisicing elit
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="text-center rounded p-4">
                        <div class="d-inline-block rounded bg-light p-4 mb-4"><i
                                class="fas fa-sitemap fa-5x text-secondary"></i></div>
                        <div class="feature-content">
                            <a href="#" class="h4">Customer Builder <i
                                    class="fa fa-long-arrow-alt-right"></i></a>
                            <p class="mt-4 mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.consectetur
                                adipisicing elit
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="text-center rounded p-4">
                        <div class="d-inline-block rounded bg-light p-4 mb-4"><i
                                class="fas fa-tasks fa-5x text-secondary"></i></div>
                        <div class="feature-content">
                            <a href="#" class="h4">Campaign Manager <i
                                    class="fa fa-long-arrow-alt-right"></i></a>
                            <p class="mt-4 mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.consectetur
                                adipisicing elit
                            </p>
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
                        <img src="img/features-1.png" class="img-fluid w-100 h-100" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.1s">
                    <h4 class="text-primary">Fearutes</h4>
                    <h1 class="display-5 mb-4">Push Your Visitors Into Happy Customers</h1>
                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, suscipit
                        itaque quaerat dicta porro illum, autem, molestias ut animi ab aspernatur dolorum officia nam
                        dolore. Voluptatibus aliquam earum labore atque.
                    </p>
                    <div class="row g-4">
                        <div class="col-6">
                            <div class="d-flex">
                                <i class="fas fa-newspaper fa-4x text-secondary"></i>
                                <div class="d-flex flex-column ms-3">
                                    <h2 class="mb-0 fw-bold">285</h2>
                                    <small class="text-dark">Created Projects</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex">
                                <i class="fas fa-users fa-4x text-secondary"></i>
                                <div class="d-flex flex-column ms-3">
                                    <h2 class="mb-0 fw-bold">6560</h2>
                                    <small class="text-dark">Happy Clients</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="my-4">
                        <a href="#" class="btn btn-primary rounded-pill py-3 px-5">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->


    <!-- Blog Start -->
    <div class="container-fluid blog py-5">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
                <h4 class="text-primary">Our Blog</h4>
                <h1 class="display-5 mb-4">Join Us For New Blog</h1>
                <p class="mb-0">Dolor sit amet consectetur, adipisicing elit. Ipsam, beatae maxime. Vel animi eveniet
                    doloremque reiciendis soluta iste provident non rerum illum perferendis earum est architecto dolores
                    vitae quia vero quod incidunt culpa corporis, porro doloribus. Voluptates nemo doloremque cum.
                </p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="blog-item">
                        <div class="blog-img">
                            <img src="img/blog-1.png" class="img-fluid w-100" alt="">
                            <div class="blog-info">
                                <span><i class="fa fa-clock"></i> Dec 01.2024</span>
                                <div class="d-flex">
                                    <span class="me-3"> 3 <i class="fa fa-heart"></i></span>
                                    <a href="#" class="text-white">0 <i class="fa fa-comment"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="blog-content text-dark border p-4 ">
                            <h5 class="mb-4">Dolor, sit amet consectetur adipisicing</h5>
                            <p class="mb-4">Lorem ipsum dolor sit amet consectur adip sed eiusmod amet consectur
                                adip.</p>
                            <a class="btn btn-light rounded-pill py-2 px-4" href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="blog-item">
                        <div class="blog-img">
                            <img src="img/blog-2.png" class="img-fluid w-100" alt="">
                            <div class="blog-info">
                                <span><i class="fa fa-clock"></i> Dec 01.2024</span>
                                <div class="d-flex">
                                    <span class="me-3"> 3 <i class="fa fa-heart"></i></span>
                                    <a href="#" class="text-white">0 <i class="fa fa-comment"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="blog-content text-dark border p-4 ">
                            <h5 class="mb-4">Dolor, sit amet consectetur adipisicing</h5>
                            <p class="mb-4">Lorem ipsum dolor sit amet consectur adip sed eiusmod amet consectur
                                adip.</p>
                            <a class="btn btn-light rounded-pill py-2 px-4" href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="blog-item">
                        <div class="blog-img">
                            <img src="img/blog-3.png" class="img-fluid w-100" alt="">
                            <div class="blog-info">
                                <span><i class="fa fa-clock"></i> Dec 01.2024</span>
                                <div class="d-flex">
                                    <span class="me-3"> 3 <i class="fa fa-heart"></i></span>
                                    <a href="#" class="text-white">0 <i class="fa fa-comment"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="blog-content text-dark border p-4 ">
                            <h5 class="mb-4">Dolor, sit amet consectetur adipisicing</h5>
                            <p class="mb-4">Lorem ipsum dolor sit amet consectur adip sed eiusmod amet consectur
                                adip.</p>
                            <a class="btn btn-light rounded-pill py-2 px-4" href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="blog-item">
                        <div class="blog-img">
                            <img src="img/blog-4.png" class="img-fluid w-100" alt="">
                            <div class="blog-info">
                                <span><i class="fa fa-clock"></i> Dec 01.2024</span>
                                <div class="d-flex">
                                    <span class="me-3"> 3 <i class="fa fa-heart"></i></span>
                                    <a href="#" class="text-white">0 <i class="fa fa-comment"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="blog-content text-dark border p-4 ">
                            <h5 class="mb-4">Dolor, sit amet consectetur adipisicing</h5>
                            <p class="mb-4">Lorem ipsum dolor sit amet consectur adip sed eiusmod amet consectur
                                adip.</p>
                            <a class="btn btn-light rounded-pill py-2 px-4" href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->

    @include('Jobseeker.components.footer')

    @include('Jobseeker.components.scripts')
    

</body>

</html>
