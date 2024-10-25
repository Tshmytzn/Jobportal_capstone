<!DOCTYPE html>
<html lang="en">

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.3/css/buttons.dataTables.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.print.min.js"></script>

@include('Admin.components.head', ['title' => 'Admin Dashboard'])
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
                            <th>Actions</th>
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
