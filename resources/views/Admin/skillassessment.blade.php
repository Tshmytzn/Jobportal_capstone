<!DOCTYPE html>
<html lang="en">

@include('Admin.components.head', ['title' => 'Skill Assessment'])

<body class="g-sidenav-show  bg-gray-100">

    @include('Admin.components.aside', ['active' => 'SkillAssessment'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('Admin.components.navbar', ['headtitle'=> 'Skill Assessment', 'pagetitle' => 'Admin'])
        <!-- End Navbar -->

        {{-- cards --}}
        <div class="container-fluid py-0 m-2">

            <a href="" data-bs-toggle="modal" data-bs-target="#createskillassessment">
                <button class="btn bgp-gradient ms-4 text-white">Add Skill Assessment</button>
            </a>

            <div class="row">

            </div>
            @include('Admin.components.footer')
        </div>
    </main>
    @include('Admin.components.scripts')
    @include('Admin.components.skillassessmentscripts')
    @include('Admin.components.modals.skillassessmentmodals')
</body>

</html>
