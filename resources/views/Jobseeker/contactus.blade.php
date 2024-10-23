<!DOCTYPE html>
<html lang="en">

@include('Jobseeker.components.head', ['title' => 'Contact Us'])

<body>
    @include('Jobseeker.components.loading')

    @include('Jobseeker.components.spinner')

    @include('Jobseeker.components.navbar', ['active' => 'contactus'])


    <!-- Contact Start -->
    <div class="container-fluid contact py-5">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
                <h4 class="text-primary mb-4">Contact Us</h4>
                <h1 class="display-4 mb-4">Get In Touch With Us</h1>
                <p class="mb-0">
                    We’re here to assist you with any inquiries or support you need. Whether you have questions about
                    job listings, application processes, or how our portal works, feel free to reach out.
                </p>


            </div>
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                    <h2 class="display-6 mb-2">Contact Form</h2>
                    <p class="mb-4">
                        Please fill out all fields in the contact form below for us to assist you.
                    </p>

                    <form id="contactform" role="form" method="POST">
                        <div class="row g-3">

                                @csrf
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="contact_name" name="contact_name" placeholder="Your Name"
                                        required>
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="contact_email" name="contact_email" placeholder="Your Email"
                                        required>
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Your Message" id="contact_message" name="contact_mesage" style="height: 160px" required></textarea>
                                    <label for="message">Your Message</label>
                                </div>
                            </div>


                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" onclick="SubmitContact('contactform')" type="button">Send Message</button>
                            </div>

                        </div>
                    </form>

                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                    <div class="d-flex align-items-center mt-4">
                        <div class="bg-light d-flex align-items-center justify-content-center mb-3"
                            style="width: 90px; height: 90px; border-radius: 50px;">
                            <i class="fa fa-map-marker-alt fa-2x text-primary"></i>
                        </div>
                        <div class="ms-4">
                            <h4>Address</h4>
                            <p class="mb-0">Ogranic Market Bldg., Brgy. 4, Victorias, Philippines</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-light d-flex align-items-center justify-content-center mb-3"
                            style="width: 90px; height: 90px; border-radius: 50px;">
                            <i class="fa fa-phone-alt fa-2x text-primary"></i>
                        </div>
                        <div class="ms-4">
                            <h4>Mobile</h4>
                            <p class="mb-0">+6391 6645 3802</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-light d-flex align-items-center justify-content-center mb-3"
                            style="width: 90px; height: 90px; border-radius: 50px;">
                            <i class="fa fa-envelope-open fa-2x text-primary"></i>
                        </div>
                        <div class="ms-4">
                            <h4>Email</h4>
                            <p class="mb-0">pesovictorias2021@gmail.com</p>
                        </div>
                    </div>

                </div>
                <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="rounded h-100">
                        <iframe class="rounded w-100" style="height: 500px;"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.8612098738686!2d122.97154007502579!3d10.745178259769384!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33aed6853e46d665%3A0x4ee4b890ca22f442!2sPublic%20Employment%20Services%20Office%20-%20Municipal%20Government%20of%20Talisay!5e0!3m2!1sen!2sph!4v1725561376892!5m2!1sen!2sph"
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    @include('Jobseeker.components.footer')
    @include('Jobseeker.components.scripts')
    @include('Jobseeker.components.contactscripts')

</body>

</html>
