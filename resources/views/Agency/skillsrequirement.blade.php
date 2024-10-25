<!DOCTYPE html>
<html lang="en">

@include('Agency.components.head', ['title' => 'Skills Requirement'])

<body class="g-sidenav-show  bg-gray-100">

    @include('Agency.components.aside', ['active' => 'skillsrequirement'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('Agency.components.navbar', ['headtitle' => 'Skills Requirement'], ['pagetitle' => 'Skills'])        
        <!-- End Navbar -->

        {{-- cards --}}
        <div class="container-fluid py-4">

            <a href="" data-bs-toggle="modal" data-bs-target="#createskillsmodal">
                <button class="btn bgp-gradient ms-4 text-white">Add Skill</button>
            </a>

            <div class="row m-2">
                <table id="Skills_tbl" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Skills</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            @include('Admin.components.footer')
        </div>
    </main>
    @include('Agency.components.scripts')
    @include('Agency.components.skillsrequirementscripts')
    @include('Agency.components.modals.skillsrequirementmodals')

</body>

</html>
