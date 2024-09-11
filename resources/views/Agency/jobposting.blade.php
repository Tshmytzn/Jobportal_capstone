<!DOCTYPE html>
<html lang="en">

@include('Agency.components.head', ['title' => 'Post a Job'])

<style>
    .list-group-item-action.custom-hover:hover {
        background-color: #ddbbe2;
        /* Light blue shade */
        transition: background-color 0.3s;
        /* Smooth transition */
    }
</style>
@include('Admin.components.loading')
<body class="g-sidenav-show  bg-gray-100">

    @include('Agency.components.aside', ['active' => 'jobposting'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('Agency.components.navbar', ['headtitle' => 'Post a Job'], ['pagetitle' => 'Agency'])
        <!-- End Navbar -->

        {{-- cards --}}
        <div class="container-fluid py-4">

            <div class="position-fixed top-6 end-0 m-4">
                <button data-bs-toggle="modal" data-bs-target="#jobpostmodal"
                    class="btn w-100 d-flex align-items-center justify-content-center text-white"
                    style="background: linear-gradient(90deg, rgba(77, 7, 99, 1) 0%, rgba(121, 9, 128, 1) 50%, rgba(189, 11, 186, 1) 100%);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        viewBox="0 0 448 512" class="me-2">
                        <path fill="#ffffff"
                            d="M64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zM200 344l0-64-64 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l64 0 0-64c0-13.3 10.7-24 24-24s24 10.7 24 24l0 64 64 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-64 0 0 64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                    </svg>
                    Post A Job
                </button>
            </div>

            <div class="row mt-4">

                <div class="col-4">
                    <div class="card text-sm">
                        <div class="card-header"
                            style="background: linear-gradient(90deg, rgba(77, 7, 99, 1) 0%, rgba(121, 9, 128, 1) 50%, rgba(189, 11, 186, 1) 100%); height: 50px; display: flex; align-items: center;">
                            <h5 class="card-title text-white">Jobs Listed</h5>
                        </div>
                        <div class="list-group list-group-flush overflow-auto" style="max-height: 400px;">
                            <div class="list-group-item list-group-item-action custom-hover">
                                <div class="row align-items-center">
                                    <!-- Image Column -->
                                    <div class="col-4">
                                        <a href="#">
                                            <span class="avatar" style=" width: 100%;">
                                                <img src="{{ asset('img/about-1.png') }}" alt="">
                                            </span> </a>
                                    </div>
                                    <!-- Job Details Column -->
                                    <div class="col-8">
                                        <a href="#" class="text-reset d-block fw-bold">Plumber - Residential
                                            Maintenance</a>
                                        <div class="d-block text-secondary mt-n1 text-truncate">
                                            We are looking for an experienced plumber to handle residential maintenance
                                            and repair tasks. Must have at least 2 years of experience and valid
                                            certification.
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- Job Listing 2 -->
                            <div class="list-group-item list-group-item-action custom-hover">
                                <div class="row align-items-center">
                                    <div class="col-4">
                                        <a href="#">
                                            <span class="avatar" style=" width: 100%;">
                                                <img src="{{ asset('img/blog-1.png') }}" alt="">
                                            </span> </a>
                                    </div>
                                    <div class="col-8">
                                        <a href="#" class="text-reset d-block fw-bold">Electrician - Commercial
                                            Projects</a>
                                        <div class="d-block text-secondary mt-n1 text-truncate"
                                            style="max-width: 100%;">
                                            Seeking a skilled electrician for commercial project installations. Requires
                                            experience with high voltage systems and adherence to safety protocols...
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- Repeat similar structure for more job listings -->
                            <div class="list-group-item list-group-item-action custom-hover">
                                <div class="row align-items-center">
                                    <div class="col-4">
                                        <a href="#">
                                            <span class="avatar" style="width: 100%;">
                                                <img src="{{ asset('img/blog-2.png') }}" alt="">
                                            </span>
                                        </a>
                                    </div>
                                    <div class="col-8">
                                        <a href="#" class="text-reset d-block fw-bold">Carpenter - Residential
                                            Renovations</a>
                                        <div class="d-block text-secondary mt-n1 text-truncate"
                                            style="max-width: 100%;">
                                            Looking for an experienced carpenter to work on residential renovation
                                            projects. Must be skilled in cabinetry, framing, and flooring
                                            installation...
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item list-group-item-action custom-hover">
                                <div class="row align-items-center">
                                    <div class="col-4">
                                        <a href="#">
                                            <span class="avatar" style="width: 100%;">
                                                <img src="{{ asset('img/blog-3.png') }}" alt="">
                                            </span>
                                        </a>
                                    </div>
                                    <div class="col-8">
                                        <a href="#" class="text-reset d-block fw-bold">Welder - Industrial
                                            Fabrication</a>
                                        <div class="d-block text-secondary mt-n1 text-truncate"
                                            style="max-width: 100%;">
                                            Seeking a certified welder for industrial fabrication work. Must have
                                            experience with MIG, TIG, and stick welding, and the ability to read
                                            blueprints...
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item list-group-item-action custom-hover">
                                <div class="row align-items-center">
                                    <div class="col-4">
                                        <a href="#">
                                            <span class="avatar" style="width: 100%;">
                                                <img src="{{ asset('img/blog-4.png') }}" alt="">
                                            </span>
                                        </a>
                                    </div>
                                    <div class="col-8">
                                        <a href="#" class="text-reset d-block fw-bold">HVAC Technician -
                                            Maintenance and
                                            Repair</a>
                                        <div class="d-block text-secondary mt-n1 text-truncate"
                                            style="max-width: 100%;">
                                            Hiring an HVAC technician for maintenance and repair services. Must be
                                            knowledgeable in HVAC systems, troubleshooting, and repair work...
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-8">
                    <div class="card text-sm">
                        <div class="card-header"
                            style="background: linear-gradient(90deg, rgba(77, 7, 99, 1) 0%, rgba(121, 9, 128, 1) 50%, rgba(189, 11, 186, 1) 100%); height: 50px; display: flex; align-items: center;">
                            <h5 class="card-title text-white">Job Details</h5>
                        </div>
                        <div class="card-body text-center">
                            <h4>No Job Post Selected</h4>
                            <p style="font-size: 15px;">Select a job to view its full details.</p>
                            <img src="{{ asset('img/unDraw_select-option_w7yy45h.svg') }}"
                                style="height: 250px; width: auto;" alt="">
                        </div>
                    </div>
                </div>
            </div>
            @include('Agency.components.footer')
        </div>
    </main>
    
    @include('Agency.components.scripts')
    @include('Agency.components.modals')
    @include('Agency.components.jobpostscript')
</body>

</html>
