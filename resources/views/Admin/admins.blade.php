<!DOCTYPE html>
<html lang="en">

@include('Admin.components.head', ['title' => 'Administrators'])

<body class="g-sidenav-show  bg-gray-100">

    @include('Admin.components.aside', ['active' => 'Administrators'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('Admin.components.navbar', ['headtitle' => 'Administrators'], ['pagetitle' => 'Admin'])        
        <!-- End Navbar -->

        {{-- cards --}}
        <div class="container-fluid py-0 m-2">
            <div class="row m-2">
                    <a href="" data-bs-toggle="modal" data-bs-target="#addNewAdminModal">
                        <button class="btn bgp-gradient text-white">Add New Admin</button>
                    </a>

                    <table id="example" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>Date Added</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>John Doe</td>
                            <td>john.doe@example.com</td>
                            <td>0917-123-4567</td>
                            <td>2023-02-10</td>
                            <td>Active</td>
                            <td>
                                <button class="btn btn-sm btn-warning">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Jane Smith</td>
                            <td>jane.smith@example.com</td>
                            <td>0918-234-5678</td>
                            <td>2022-11-18</td>
                            <td>Active</td>
                            <td>
                                <button class="btn btn-sm btn-warning">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Michael Johnson</td>
                            <td>michael.johnson@example.com</td>
                            <td>0920-345-6789</td>
                            <td>2021-08-05</td>
                            <td>Inactive</td>
                            <td>
                                <button class="btn btn-sm btn-warning">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
            @include('Admin.components.footer')
        </div>
    </main>
    @include('Admin.components.scripts')
</body>

</html>
