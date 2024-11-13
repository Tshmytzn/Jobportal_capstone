<!DOCTYPE html>
<html lang="en">

@include('Jobseeker.components.head', ['title' => 'Agency Feedback'])

<body>

    @include('Jobseeker.components.spinner')

    @include('Jobseeker.components.navbar', ['active' => 'feedback'])

    @include('Jobseeker.components.header', ['title' => 'Agency Feedback'])

    <!-- Testimonial Start -->
    <div class="container-fluid testimonial py-5 bg-white">
        <div class="container py-5">

            <div class="testimonial-carousel owl-carousel wow zoomInDown" data-wow-delay="0.2s">
                <div class="testimonial-item" data-dot="<img class='img-fluid' src='img/testimonial-img-1.jpg' alt=''>">
                    <div class="testimonial-inner text-center p-5">
                        <div class="d-flex align-items-center justify-content-center mb-4">
                            <div class="testimonial-inner-img border border-primary border-3 me-4"
                                style="width: 100px; height: 100px; border-radius: 50%;">
                                <img src="img/testimonial-img-1.jpg" class="img-fluid rounded-circle" alt="">
                            </div>
                            <div>
                                <h5 class="mb-2">Acme Recruitment Agency</h5>
                                <p class="mb-0">Bacolod, Negros</p>
                            </div>
                        </div>
                        <p class="fs-7">"The job portal system has streamlined our hiring process significantly. We've
                            connected with highly qualified candidates faster than ever. The user-friendly interface and
                            advanced search features have been game changers for our recruitment team."
                        </p>
                        <div class="text-center">
                            <div class="d-flex justify-content-center">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item" data-dot="<img class='img-fluid' src='img/testimonial-img-2.jpg' alt=''>">
                    <div class="testimonial-inner text-center p-5">
                        <div class="d-flex align-items-center justify-content-center mb-4">
                            <div class="testimonial-inner-img border border-primary border-3 me-4"
                                style="width: 100px; height: 100px; border-radius: 50%;">
                                <img src="img/testimonial-img-2.jpg" class="img-fluid rounded-circle" alt="">
                            </div>
                            <div>
                                <h5 class="mb-2">Global Staffing Solutions</h5>
                                <p class="mb-0">Talisay, Negros</p>
                            </div>
                        </div>
                        <p class="fs-7">"Using this portal, we have cut down on recruitment time by 50%. The
                            platform's filters make it easy to find the right candidates. We've been impressed with the
                            ongoing updates and improvements to the system."
                        </p>
                        <div class="text-center">
                            <div class="d-flex justify-content-center">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item" data-dot="<img class='img-fluid' src='img/testimonial-img-3.jpg' alt=''>">
                    <div class="testimonial-inner text-center p-5">
                        <div class="d-flex align-items-center justify-content-center mb-4">
                            <div class="testimonial-inner-img border border-primary border-3 me-4"
                                style="width: 100px; height: 100px; border-radius: 50%;">
                                <img src="img/testimonial-img-3.jpg" class="img-fluid rounded-circle" alt="">
                            </div>
                            <div>
                                <h5 class="mb-2">Pioneer Talent Agency</h5>
                                <p class="mb-0">Victorias, Negros</p>
                            </div>
                        </div>
                        <p class="fs-7">"The portal has made it easy for us to post jobs and review applications. The customer support has been exceptional, ensuring that any issues are resolved quickly. We are thrilled with the results so far."
                        </p>
                        <div class="text-center">
                            <div class="d-flex justify-content-center">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    @include('Jobseeker.components.footer')

    @include('Jobseeker.components.scripts')

</body>

</html>
