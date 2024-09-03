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

            </div>
            @include('Agency.components.footer')
        </div>
    </main>
    @include('Agency.components.scripts')
</body>

</html>
