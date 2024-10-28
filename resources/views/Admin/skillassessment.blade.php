<!DOCTYPE html>
<html lang="en">

<style>
    .question-section {
        margin-bottom: 20px;
    }

    .hidden {
        display: none;
    }

    .section {
        margin-bottom: 30px;
        padding: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        position: relative;
    }

    .remove-section-btn {
        position: absolute;
        top: 10px;
        right: 15px;
        background-color: transparent;
        border: none;
        color: #dc3545;
        cursor: pointer;
    }
</style>

<meta name="csrf-token" content="{{ csrf_token() }}">
@include('Admin.components.head', ['title' => 'Skill Assessment'])

<body class="g-sidenav-show  bg-gray-100">
    @include('admin.components.loading')

    @include('Admin.components.aside', ['active' => 'SkillAssessment'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('Admin.components.navbar', ['headtitle' => 'Skill Assessment', 'pagetitle' => 'Admin'])
        <!-- End Navbar -->

        {{-- cards --}}
        <div class="container-fluid py-0 mb-2 mt-2">

            <div class="row">
                <div class="container">
                    <button class="btn text-white"
                        style="background: linear-gradient(90deg, rgba(77, 7, 99, 1) 0%, rgba(121, 9, 128, 1) 50%, rgba(189, 11, 186, 1) 100%);"
                        data-bs-toggle="modal" data-bs-target="#createskillassessment" id="createAssessmentBtn">Create
                        New Assessment</button>
                    <button class="btn btn-secondary" id="exportAssessmentsBtn">Export Assessments</button>

                    {{-- <div class="mb-3">
                        <input type="text" id="searchInput" class="form-control" placeholder="Search assessments...">
                    </div> --}}

                    <table id="assessmentsTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Assessment Title</th>
                                <th>Description</th>
                                <th>Number of Sections</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="assessmentsTableBody">
                            <!-- Assessment rows will be dynamically populated here -->
                        </tbody>
                    </table>

                    <nav aria-label="Page navigation">
                        <ul class="pagination" id="paginationControls">
                            <!-- Pagination buttons will be dynamically added here -->
                        </ul>
                    </nav>
                </div>
            </div>


            {{-- <div class="row">
                <div class="container-fluid text-center">
                    <div style="margin: 0 auto;">

                        <img src="{{ asset('img/nodata.png') }}" alt="No Data Available"
                            style="max-width: 100%; height: auto; margin-bottom: 20px;">

                        <h5 style="font-size: 1.25rem;">No Skill Assessments Found</h5>
                        <p style="font-size: 1.1rem;">It seems there are currently no skill assessment surveys created.
                            Why not create one now to get started?</p>
                    </div>
                </div>
            </div> --}}
            
            @include('Admin.components.footer')
        </div>
    </main>
    @include('Admin.components.scripts')
    @include('Admin.components.modals.skillassessmentmodals')
    @include('Admin.components.skillassessmentscripts')
    @include('Admin.components.skillassessmentscrudscripts')

</body>

</html>
