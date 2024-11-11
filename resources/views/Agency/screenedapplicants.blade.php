<!DOCTYPE html>
<html lang="en">

@include('Agency.components.head', ['title' => 'Screened Applicants'])

<body class="g-sidenav-show bg-gray-100">

    @include('Agency.components.aside', ['active' => 'screenedapplicants'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include(
            'Agency.components.navbar',
            ['headtitle' => 'Screened Applicants'],
            ['pagetitle' => 'Agency']
        )
        <!-- End Navbar -->

        {{-- No Screened Applicants Message --}}
        <div class="container-fluid py-4 text-center">
            {{-- <div style="margin: 0 auto;">

                <img src="{{ asset('img/nodata.png') }}" alt="No Data Available" style="max-width: 100%; height: auto; margin-bottom: 20px;">

                <h5 style="font-size: 1.25rem;">No Screened Applicants</h5>
                <p style="font-size: 0.9rem;">There are currently no applicants who have been screened.</p>
            </div> --}}

            <table id="Screened_tbl" class="table table-hover" style="width:100%">
                
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Applicant Name</th>
                        <th>Applied Job</th>
                        <th>Applicant Email</th>
                        <th>Applicant Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>

            </table>
          
        </div>
        </div>

        @include('Agency.components.footer')
    </main>
    @include('Agency.components.scripts')
    @include('Agency.components.screenedapplicantsripts')

</body>

</html>
