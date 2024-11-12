<!DOCTYPE html>
<html lang="en">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Chart.js Library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    .chart-canvas {
    width: 1200px; 
}

</style>
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
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Pending Applications
                                        </p>
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
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Screened
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
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Hired
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
                                        <h6>Hired vs Declined Jobseekers Over Time</h6>

                                    </div>
                                    <div class="card-body p-3">
                                        <div class="chart">

                                            <div style="width: 100%; overflow-x: auto;">
                                                <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                                            </div>
                                            
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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }

        fetch('/api/hiredjobseekers')
            .then(response => response.json())
            .then(data => {
                console.log(data);

                const dates = data.labels;
                const hiredJobseekerCounts = data.hiredJobseekers;
                const declinedJobseekerCounts = data
                    .declinedJobseekers;

                var ctx2 = document.getElementById("chart-line").getContext("2d");

                var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);
                gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
                gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
                gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)');

                var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);
                gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
                gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
                gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)');

                new Chart(ctx2, {
                    type: "line",
                    data: {
                        labels: dates,
                        datasets: [{
                                label: "Hired Jobseekers",
                                tension: 0.4,
                                borderWidth: 0,
                                pointRadius: 0,
                                borderColor: "#cb0c9f",
                                borderWidth: 3,
                                backgroundColor: gradientStroke1,
                                fill: true,
                                data: hiredJobseekerCounts,
                                maxBarThickness: 6
                            },
                            {
                                label: "Declined Jobseekers",
                                tension: 0.4,
                                borderWidth: 0,
                                pointRadius: 0,
                                borderColor: "#f39c12",
                                borderWidth: 3,
                                backgroundColor: gradientStroke2,
                                fill: true,
                                data: declinedJobseekerCounts,
                                maxBarThickness: 6
                            }
                        ],
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top'
                            },
                        },
                        interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#b2b9bf',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#b2b9bf',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                            autoSkip: false,  // Ensures that all labels are visible
                        },
                        // Enable scrollable behavior on x-axis
                        offset: true,
                        min: 0,
                        max: 12, // Ensure all months are included
                    },
                },
            },
        });
    })
    .catch(error => console.error('Error fetching data:', error));
    </script>

    <!-- Scripts -->
    @include('Agency.components.scripts')
    <!-- End of Scripts -->

</body>

</html>
