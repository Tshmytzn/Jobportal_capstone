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
    @include('Admin.components.scripts')

    {{-- Create Job Categories Modal start --}}
    <div class="modal fade" id="createjobcategories1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bgp-gradient">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Job Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <form method="POST" id="createJobCategoryForm">
                        @csrf
                        <div class="form-group">
                            <label for="jobcategory_image" class="col-form-label">Image:</label>
                            <input type="file" class="form-control" name="jobcategory_image" id="jobcategory_image">
                        </div>
                        <div class="form-group">
                            <label for="jobcategory_name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" name="jobcategory_name" id="jobcategory_name">
                        </div>
                        <div class="form-group">
                            <label for="job_description" class="col-form-label">Description:</label>
                            <textarea class="form-control" name="job_description" id="job_description"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="CreateJobCategory()" class="btn bgp-gradient">Save Changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Create Job Categories Modal end --}}

    @include('Admin.components.modals')
    @include('Admin.components.adminscripts')
</body>

</html>
