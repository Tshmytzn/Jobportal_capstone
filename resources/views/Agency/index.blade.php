<!DOCTYPE html>
<html lang="en">

@include('Agency.components.head', ['title' => 'Agency Dashboard'])

<body class="g-sidenav-show  bg-gray-100">

    @include('Agency.components.aside', ['active' => 'Agencydashboard'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">

        <!-- Navbar -->
        @include('Agency.components.navbar', ['headtitle' => 'Dashboard'], ['pagetitle' => 'Agency'])
        <!-- End Navbar -->

        {{-- cards --}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Job Postings
                                        </p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{ \App\Models\JobDetails::where('agency_id', session('agencyid'))->count() }}
                                            {{-- <span class="text-success text-sm font-weight-bolder">+55%</span> --}}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-briefcase-24 text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Pending Applications</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{ \App\Models\Jobseeker::count() }}
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Applicant Screening
                                        </p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{ \App\Models\Agency::count() }}
                                            {{-- <span class="text-danger text-sm font-weight-bolder">-2%</span> --}}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-check-bold text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Approved Applications
                                        </p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{ \App\Models\Agency::where('status', 'approved')->count() }}
                                            {{-- <span class="text-success text-sm font-weight-bolder">+55%</span> --}}
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
            <div class="row">
                <div class="col-lg-12 col-md-12 text-center">

                    <div class="row my-4">
                        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">

                            <div class="col-lg-12">
                                <div class="card z-index-2">
                                  <div class="card-header pb-0">
                                    <h6>Monthly Overview: Jobseeker Applications</h6>
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

                    {{-- <div class="container d-flex flex-column justify-content-center align-items-center"> --}}
                        {{-- <div class="text-center p-5 shadow-lg rounded" style="background-color: #f9f9f9;">
                            <h2 class="mb-4" style="color: #333;">Account Pending for Approval</h2>
                            <p class="mb-4 text-muted">Your account is currently under review. Please check back later.</p>
                            <img src="{{ asset('/img/undraw_pending_approval_xuu9.svg') }}" alt="Account pending"
                                style="max-width: 60%; height: auto;">
                        </div> --}}
                    {{-- </div> --}}

                    <!-- Footer -->
                    @include('Agency.components.footer')
                    <!--End of Footer -->

                </div>
            </div>
        </div>
    </main>

    <!-- Scripts -->
    @include('Agency.components.scripts')
    <!-- End of Scripts -->

</body>

</html>
