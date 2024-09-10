<!DOCTYPE html>
<html lang="en">

@include('Admin.components.head', ['title' => 'Job Category'])

<body class="g-sidenav-show  bg-gray-100">

    @include('Admin.components.aside', ['active' => 'jobcategory'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('Admin.components.navbar', ['headtitle' => 'Job Category'], ['pagetitle' => 'Admin'])        <!-- End Navbar -->
        <!-- End Navbar -->

    
        {{-- cards --}}
        <div class="container-fluid py-0 m-2">

            <div class="d-flex justify-content-start mb-3">
                <button class="btn bgp-gradient m-4" data-bs-toggle="modal" data-bs-target="#createjobcategories">Add Job Category</button>
            </div>
            <div class="row m-2">
                    <table id="example" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>John Doe</td>
                            <td>john.doe@example.com</td>
                            <td>Active</td>
                            <td>
                                <button class="btn btn-sm bgp-gradient">Ban</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Jane Smith</td>
                            <td>jane.smith@example.com</td>
                            <td>Active</td>
                            <td>
                                <button class="btn btn-sm bgp-gradient">Ban</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Michael Johnson</td>
                            <td>michael.johnson@example.com</td>
                            <td>Inactive</td>
                            <td>
                                <button class="btn btn-sm bgp-gradient">Ban</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
            @include('Admin.components.footer')
        </div>
    </main>
    @include('Admin.components.scripts')
    @include('Admin.components.modals')
</body>

</html>
