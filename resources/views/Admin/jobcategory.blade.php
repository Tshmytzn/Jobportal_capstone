<!DOCTYPE html>
<html lang="en">

@include('Admin.components.head', ['title' => 'Job Category'])

<body class="g-sidenav-show  bg-gray-100">

    @include('Admin.components.aside', ['active' => 'jobcategory'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('Admin.components.navbar', ['headtitle' => 'Job Category'], ['pagetitle' => 'Admin']) <!-- End Navbar -->
        <!-- End Navbar -->


        {{-- cards --}}
        <div class="container-fluid py-0 m-2">

            <a href="" data-bs-toggle="modal" data-bs-target="#createjobcategories1">
                <button class="btn bgp-gradient ms-4 text-white">Add Job Category</button>
            </a>

            <div class="row m-2">
                <table id="JobCategories_tbl" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
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
    @include('Admin.components.modals.jobcategorymodal')
    @include('Admin.components.scripts')
    @include('Admin.components.jobcategoryscripts')
</body>

</html>
