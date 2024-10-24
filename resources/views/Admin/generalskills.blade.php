<!DOCTYPE html>
<html lang="en">

@include('Admin.components.head', ['title' => 'Admin Dashboard'])
@include('admin.components.loading')
<body class="g-sidenav-show  bg-gray-100">

    @include('Admin.components.aside', ['active' => 'generalskills'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('Admin.components.navbar', ['headtitle' => ' Skills'], ['pagetitle' => 'General Skills'])
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
    @include('Admin.components.scripts')
    @include('Admin.components.modals.skillsmodals')

</body>

</html>
