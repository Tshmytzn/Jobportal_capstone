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
        <div class="container-fluid py-4">
            <div class="row">

            </div>
            @include('Admin.components.footer')
        </div>
    </main>
    @include('Admin.components.scripts')
</body>

</html>
