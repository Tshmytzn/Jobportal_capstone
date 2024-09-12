    <!DOCTYPE html>
    <html lang="en">

    @include('Admin.components.head', ['title' => 'Administrators'])

    <body class="g-sidenav-show  bg-gray-100">

        @include('Admin.components.aside', ['active' => 'Administrators'])

        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            @include(
                'Admin.components.navbar',
                ['headtitle' => 'Administrators'],
                ['pagetitle' => 'Admin']
            )
            <!-- End Navbar -->

            {{-- cards --}}
            <div class="container-fluid py-0 m-2">
                <div class="row m-2" id="tabletag">
                    <a href="" data-bs-toggle="modal" data-bs-target="#addNewAdminModal">
                        <button class="btn bgp-gradient text-white">Add New Admin</button>
                    </a>

                    <table id="admindatatable" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Contact Number</th>
                                <th>Date Added</th>
                                <th>Action</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @if ($admins->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center">No admin accounts available.</td>
                                </tr>
                            @else
                                @foreach ($admins as $admin)
                                    <tr>
                                        <td>{{ $admin->id }}</td>
                                        <td>{{ $admin->admin_name }}</td>
                                        <td>{{ $admin->admin_email }}</td>
                                        <td>{{ $admin->admin_mobile }}</td>
                                        <td>{{ $admin->created_at }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-warning editAdminBtn"
                                            data-id="{{ $admin->id }}"
                                            data-name="{{ $admin->admin_name }}"
                                            data-email="{{ $admin->admin_email }}"
                                            data-mobile="{{ $admin->admin_mobile }}"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#editAdminModal">Edit</button>
                                            <button class="btn btn-sm btn-danger deleteAdminBtn" data-id="{{ $admin->id }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif --}}
                        </tbody>
                    </table>

                </div>
                @include('Admin.components.footer')
            </div>
        </main>
        @include('Admin.components.modals.adminmodals')
        @include('Admin.components.scripts')
        @include('Admin.components.manageadminscripts')

    </body>

    </html>
