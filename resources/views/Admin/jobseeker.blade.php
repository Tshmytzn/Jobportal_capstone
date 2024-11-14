<!DOCTYPE html>
<html lang="en">
<!-- FixedHeader CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.3.2/css/fixedHeader.dataTables.min.css">

<!-- FixedHeader JS -->
<script src="https://cdn.datatables.net/fixedheader/3.3.2/js/dataTables.fixedHeader.min.js"></script>

@include('Admin.components.head', ['title' => 'Jobseeker'])

<body class="g-sidenav-show  bg-gray-100">
    @include('Admin.components.loading')

    @include('Admin.components.aside', ['active' => 'Jobseeker'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('Admin.components.navbar', ['headtitle' => 'Jobseeker'], ['pagetitle' => 'Admin']) <!-- End Navbar -->
        <!-- End Navbar -->

        {{-- cards --}}
        <div class="container-fluid py-0 m-2">
            <div class="row m-2">
                <table id="Jobseeker_tbl" class="table table-hover" style="width:100%;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>Date Created</th>
                        </tr>
                    </thead>
                </table>

            </div>
            @include('Admin.components.footer')
        </div>
    </main>
    @include('Admin.components.scripts')
    @include('Admin.components.jobseekerscripts')
    @include('Admin.components.modals.jobseekermodals')

</body>

</html>
