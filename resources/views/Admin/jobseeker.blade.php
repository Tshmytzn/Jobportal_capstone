<!DOCTYPE html>
<html lang="en">

@include('Admin.components.head', ['title' => 'Jobseeker'])

<body class="g-sidenav-show  bg-gray-100">

    @include('Admin.components.aside', ['active' => 'Jobseeker'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('Admin.components.navbar', ['headtitle' => 'Jobseeker'], ['pagetitle' => 'Admin'])        <!-- End Navbar -->
        <!-- End Navbar -->

        {{-- cards --}}
        <div class="container-fluid py-0 m-2">
            <div class="row m-2">
                    <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>Date Created</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>John A. Doe</td>
                            <td>john.doe@example.com</td>
                            <td>(555) 123-4567</td>
                            <td>2024-09-01</td>
                            <td><button class="btn btn-success">Edit</button> <button class="btn btn-primary">Delete</button></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jane B. Smith</td>
                            <td>jane.smith@example.com</td>
                            <td>(555) 234-5678</td>
                            <td>2024-08-15</td>
                            <td><button class="btn btn-success">Edit</button> <button class="btn btn-primary">Delete</button></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Michael C. Johnson</td>
                            <td>michael.johnson@example.com</td>
                            <td>(555) 345-6789</td>
                            <td>2024-07-20</td>
                            <td><button class="btn btn-success">Edit</button> <button class="btn btn-primary">Delete</button></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Emily D. Davis</td>
                            <td>emily.davis@example.com</td>
                            <td>(555) 456-7890</td>
                            <td>2024-06-10</td>
                            <td><button class="btn btn-success">Edit</button> <button class="btn btn-primary">Delete</button></td>
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
