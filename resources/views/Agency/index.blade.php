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
