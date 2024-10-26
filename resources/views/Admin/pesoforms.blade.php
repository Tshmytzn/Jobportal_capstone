<!DOCTYPE html>
<html lang="en">

@include('Admin.components.head', ['title' => 'PESO Registration Forms'])
@include('admin.components.loading')
<body class="g-sidenav-show  bg-gray-100">

    @include('Admin.components.aside', ['active' => 'adminpesoforms'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('Admin.components.navbar', ['headtitle' => 'Registration  Forms'], ['pagetitle' => 'PESO'])
        <!-- End Navbar -->

        {{-- cards --}}
        <div class="container-fluid py-0 mb-2 ms-2 me-2">
            <div class="row m-2">
                <table id="PesoForms_tbl" class="table table-hover" style="width:100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Birthdate</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Civil Status</th>
                            <th>City</th>
                            <th>Barangay</th>
                            <th>Street</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th>Cellphone</th>
                            <th>Employment Status</th>
                            <th>Education</th>
                            <th>Position</th>
                            <th>Skills</th>
                            <th>Work Experience</th>
                            <th>4Ps</th>
                            <th>PWD</th>
                            <th>Registration Date</th>
                            <th>Remarks</th>
                            <th>Office</th>
                            <th>Type</th>
                            <th>Class</th>
                            <th>Program</th>
                            <th>Event</th>
                            <th>Transaction</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                </table>
            </div>
            @include('Admin.components.footer')
        </div>
    </main>
    @include('Admin.components.scripts')
    @include('Admin.components.pesoformsdatascripts')

</body>

</html>
