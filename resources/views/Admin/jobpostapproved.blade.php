<!DOCTYPE html>
<html lang="en">

@include('Admin.components.head', ['title' => 'Admin Dashboard'])
@include('admin.components.loading')

<body class="g-sidenav-show  bg-gray-100">

    @include('Admin.components.aside', ['active' => 'jobpostapproved'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include(
            'Admin.components.navbar',
            ['headtitle' => 'Job Post Approved'],
            ['pagetitle' => 'Job Post Management']
        )
        <!-- End Navbar -->

        {{-- cards --}}
        <div class="container-fluid py-4">
            <div class="row">

                <table id="JobApproved_tbl" class="table table-hover" style="width:100%">
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
    @include('Admin.components.scripts')
    @include('Admin.components.jobpostapprovedscripts')
    @include('Admin.components.modals.jobpostapprovedmodals')

</body>

</html>
