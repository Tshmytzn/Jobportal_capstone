<!DOCTYPE html>
<html lang="en">

@include('Jobseeker.components.head', ['title' => 'About'])

<body>

    @include('Jobseeker.components.spinner')

    @include('Jobseeker.components.navbar')

    @include('Jobseeker.components.header')

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
                <p class="mb-4">Is a non-fee charging multi-dimenstional employment service facility or entity established in all Local Government Units (LGUs) in coordination with the Department of Labor and Employment (DOLE) pursuant to R.A. No. 8759 or the PESO Act of 1999 as amended by R.A. No. 10691. The PESO aims to ensure prompt and efficient delivery of employment facilitation services as well as to provide timely information on labor market and DOLE Programs.
                </p>
                <a href="#" class="btn btn-primary rounded-pill py-3 px-5">About More</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->



    @include('Jobseeker.components.footer')

    @include('Jobseeker.components.scripts')
    

</body>

</html>
