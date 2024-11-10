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

                    <!-- FAQ 1: Objectives of PESO -->
                    <div class="accordion-item border-0 mb-4">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button rounded-top" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                WHAT ARE THE OBJECTIVES OF PESO?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body my-2">
                                <p><strong>General Objective:</strong> Ensure the prompt, timely, and efficient delivery of employment service and provision of information on other DOLE programs.</p>
                                <p><strong>Specific Objectives:</strong></p>
                                <ul>
                                    <li>Provide a venue where people can explore various employment options and seek assistance.</li>
                                    <li>Serve as a referral and information center for services and programs by DOLE and other government agencies.</li>
                                    <li>Provide adequate information on employment and labor market conditions in the area.</li>
                                    <li>Network with other PESOs within the region for job exchange purposes.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 2: Functions of PESO -->
                    <div class="accordion-item border-0 mb-4">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed rounded-top" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                WHAT ARE THE FUNCTIONS OF THE PESO?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body my-2">
                                <ul>
                                    <li>Encourage employers to submit job vacancies for labor market information services.</li>
                                    <li>Coordinate with professionals for effective job selection, training, and coaching.</li>
                                    <li>Refer individuals with entrepreneurial skills to livelihood programs.</li>
                                    <li>Offer employability enhancement trainings and seminars for jobseekers.</li>
                                    <li>Provide employment and career coaching, mass motivation, and values development.</li>
                                    <li>Conduct pre-employment counseling for prospective local and overseas workers.</li>
                                    <li>Offer reintegration assistance to returning migrant workers.</li>
                                    <li>Other functions to achieve the objectives of this Act.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 3: Special Services of PESO -->
                    <div class="accordion-item border-0 mb-4">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed rounded-top" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                WHAT ARE THE SPECIAL SERVICES OF PESO?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body my-2">
                                <ul>
                                    <li><strong>Job Fairs:</strong> Periodically conducted across the country to bring job seekers and employers together for immediate matching.</li>
                                    <li><strong>Livelihood and Self-employment Bazaars:</strong> Provide information on livelihood programs, especially in rural areas.</li>
                                    <li><strong>Special Credit Assistance for Overseas Workers:</strong> Helps qualified applicants to access overseas employment opportunities.</li>
                                    <li><strong>Special Program for Employment of Students and Out-of-School Youth (SPESOS):</strong> Provides job opportunities to students and out-of-school youth.</li>
                                    <li><strong>Work Appreciation Program (WAP):</strong> Exposes youth to actual work situations to develop work ethics.</li>
                                    <li><strong>Workers Hiring for Infrastructure Projects (WHIP):</strong> Requires hiring local skilled and unskilled workers for government-funded projects.</li>
                                    <li>Other programs to assist disadvantaged groups like PWDs and displaced workers.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 4: PESO Clients -->
                    <div class="accordion-item border-0 mb-4">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed rounded-top" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                WHO ARE THE PESO CLIENTS?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                            <div class="accordion-body my-2">
                                <ul>
                                    <li>Jobseekers</li>
                                    <li>Employers</li>
                                    <li>Students</li>
                                    <li>Out-of-School Youth</li>
                                    <li>Migratory Workers</li>
                                    <li>Planners</li>
                                    <li>Researchers</li>
                                    <li>Labor Market Information Users</li>
                                    <li>Persons with Disabilities (PWD)</li>
                                    <li>Returning Overseas Filipino Workers (OFWs)</li>
                                    <li>Displaced Workers</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 5: How to Avail of PESO Services -->
                    <div class="accordion-item border-0">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed rounded-top" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                HOW TO AVAIL OF PESO SERVICES?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                            <div class="accordion-body my-2">
                                <p><strong>For Employment Seekers:</strong> Report personally to your local PESO for registration and employment interview.</p>
                                <p><strong>For Employers:</strong> Notify the nearest PESO about job vacancies for job matching.</p>
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
