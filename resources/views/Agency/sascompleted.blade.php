<!DOCTYPE html>
<html lang="en">

@include('Agency.components.head', ['title' => 'Skills Assessment Completed'])

<body class="g-sidenav-show  bg-gray-100">

    @include('Agency.components.aside', ['active' => 'sascompleted'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('Agency.components.navbar', ['headtitle' => 'Skills Assessment Completed'], ['pagetitle' => 'Agency'])
        <!-- End Navbar -->

        {{-- cards --}}
        <div class="container-fluid py-4">
            <div class="row">

                <div class="container-fluid py-4 text-center">
                    <div style="margin: 0 auto;">

                        <img src="{{ asset('img/nodata.png') }}" alt="No Data Available" style="max-width: 100%; height: auto; margin-bottom: 20px;">

                        <h5 style="font-size: 1.25rem;">No Skill Assessment Survey Completed</h5>
                        <p style="font-size: 0.9rem;">Currently, there are no applicants who have completed the skill assessment survey.</p>
                    </div>
                </div>


            </div>
            @include('Agency.components.footer')
        </div>
    </main>
    @include('Agency.components.scripts')
</body>

</html>
