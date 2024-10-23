<!DOCTYPE html>
<html lang="en">

@include('Jobseeker.components.head', ['title' => 'Job Portal'])

<body>

    @include('Jobseeker.components.spinner')

    @include('Jobseeker.components.navbar', ['active' => 'faqs'])

    @include('Jobseeker.components.header', ['title' => 'Frequently asked questions'])

            <!-- FAQ Start -->
            <div class="container-fluid FAQ bg-light overflow-hidden">
                <div class="container py-5">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item border-0 mb-4">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button rounded-top" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            How do I register as a job seeker on the portal?
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body my-2">
                                            <h5>Registration is simple and free.</h5>
                                            <p>To register as a job seeker, simply click on the "Register" button at the top right corner of the portal. Fill out the required information including your contact details and resume. Once completed, you'll be able to search and apply for jobs.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item border-0 mb-4">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed rounded-top" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            How can agencies post job listings?
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body my-2">
                                            <h5>Agencies can post jobs after account approval.</h5>
                                            <p>Once an agency has registered on the portal, it must wait for approval from the admin team. After approval, the agency can post job listings, specify job details, and track applicants through the portal dashboard.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item border-0">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed rounded-top" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            What are the benefits of using this job portal?
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body my-2">
                                            <h5>Efficient job matching and simplified process.</h5>
                                            <p>The job portal offers features such as an intuitive search engine, easy-to-navigate interface, real-time notifications, and detailed analytics for agencies. Job seekers can find tailored job matches based on their profile and receive instant application updates.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                            <div class="FAQ-img RotateMoveRight rounded">
                                <img src="img/about-1.png" class="img-fluid w-100" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FAQ End -->

    @include('Jobseeker.components.footer')

    @include('Jobseeker.components.scripts')
    

</body>

</html>
