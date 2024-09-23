<!DOCTYPE html>
<html lang="en">

@include('Admin.components.head', ['title' => 'Admin Dashboard'])

<body class="g-sidenav-show  bg-gray-100">

    @include('Admin.components.aside', ['active' => 'Dashboard'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('Admin.components.navbar', ['headtitle' => 'Dashboard'], ['pagetitle' => 'Admin']) <!-- End Navbar -->

        {{-- cards --}}
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Registered Agency
                                        </p>
                                        <h5 class="font-weight-bolder mb-0">
                                            25
                                            {{-- <span class="text-success text-sm font-weight-bolder">+55%</span> --}}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-building text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Job Seekers</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            24
                                            {{-- <span class="text-success text-sm font-weight-bolder">+3%</span> --}}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-user-run text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Registered Applicants
                                        </p>
                                        <h5 class="font-weight-bolder mb-0">
                                            34
                                            {{-- <span class="text-danger text-sm font-weight-bolder">-2%</span> --}}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-badge text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row my-4">
                <div class="col-lg-12 col-md-12 mb-md-0 mb-4">

                    <div class="col-lg-12">
                        <div class="card z-index-2">
                          <div class="card-header pb-0">
                            <h6>Monthly Overview: Jobseeker and Agency Registrations</h6>
                            <p class="text-sm">
                              <i class="fa fa-arrow-up text-success"></i>
                              <span class="font-weight-bold">4% more</span> in 2024
                            </p>
                          </div>
                          <div class="card-body p-3">
                            <div class="chart">
                              <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
            @include('Admin.components.footer')
        </div>
    </main>

    @include('Admin.components.scripts')
</body>

</html>