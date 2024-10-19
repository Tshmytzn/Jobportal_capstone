<!DOCTYPE html>
<html lang="en">

@include('Admin.components.head', ['title' => 'Verified Agencies'])

<body class="g-sidenav-show  bg-gray-100">
    @include('Admin.components.loading')

    @include('Admin.components.aside', ['active' => 'verifiedagencies'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include(
            'Admin.components.navbar',
            ['headtitle' => 'Verified Agencies'],
            ['pagetitle' => 'Agency']
        ) <!-- End Navbar -->
        <!-- End Navbar -->

        {{-- cards --}}
        <div class="container-fluid py-4">
            <div class="row">
                <table id="Verifiedagencies_tbl" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Agency Name</th>
                            <th>Email address</th>
                            <th>geo_coverage</th>
                            <th>Address</th>
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
    @include('Admin.components.verifiedagenciesscripts')
    @include('Admin.components.modals.verifiedagenciesmodal')
</body>

</html>
