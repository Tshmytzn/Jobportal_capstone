<!DOCTYPE html>
<html lang="en">
    <style>

    .modal-title {
        font-size: 1.25rem;
        font-weight: 600;
    }

    .form-label {
        font-weight: 500;
        font-size: 0.95rem;
    }

    .form-control {
        border-radius: 0.375rem;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
    }

    .modal-body {
        padding: 2rem;
    }

    #job_description {
        max-height: 250px;
        overflow-y: auto;
    }

    #job_description p {
        margin: 10px 0;
        font-size: 16px;
    }


    </style>
@include('Admin.components.head', ['title' => 'Admin Dashboard'])
@include('admin.components.loading')


<body class="g-sidenav-show  bg-gray-100">

    @include('Admin.components.aside', ['active' => 'jobpostrequest'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('Admin.components.navbar', ['headtitle' => 'Job Post Requests'], ['pagetitle' => 'Job Post Management'])
        <!-- End Navbar -->

        {{-- cards --}}
        <div class="container-fluid py-4">
        <!-- End Navbar -->

        {{-- cards --}}
        <div class="container-fluid py-4">
            <div class="row">
                <table id="JobRequests_tbl" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Agency </th>
                            <th>Job Title</th>
                            <th>Job location</th>
                            <th>Date Created</th>
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
    @include('Admin.components.jobrequestscripts')
    @include('Admin.components.modals.jobrequestsmodals')

</body>

</html>
