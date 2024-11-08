<!DOCTYPE html>
<html lang="en">

@include('Agency.components.head', ['title' => 'Skills Requirement'])
<!-- jQuery -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<!-- DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" defer></script>


<body class="g-sidenav-show  bg-gray-100">

    @include('Agency.components.aside', ['active' => 'skillsrequirement'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('Agency.components.navbar', ['headtitle' => 'Skill Assessment', 'pagetitle' => 'Admin'])
        <!-- End Navbar -->

        {{-- cards --}}
        <div class="container-fluid py-0 mb-2 mt-2">

            <div class="row">
                <div class="container">
                    <button class="btn text-white"
                        style="background: linear-gradient(90deg, rgba(77, 7, 99, 1) 0%, rgba(121, 9, 128, 1) 50%, rgba(189, 11, 186, 1) 100%);"
                        data-bs-toggle="modal" data-bs-target="#createskillassessment" id="createAssessmentBtn">Create
                        New Assessment</button>
                    {{-- <button class="btn btn-secondary" id="exportAssessmentsBtn">Export Assessments</button> --}}

                    {{-- <div class="mb-3">
                        <input type="text" id="searchInput" class="form-control" placeholder="Search assessments...">
                    </div> --}}

                    <table id="assessmentsDataTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Assessment Title</th>
                                <th>Description</th>
                                <th>Job Title</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="">

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

<div class="modal fade" id="createskillassessment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Skill Assessment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" id="questionForm">
        <div class="row border m-4 p-2 rounded border-success">
            <div class="col-12 mb-2">
                @php
                    $jobD = App\Models\JobDetails::where('agency_id',session('agency_id'))->get();
                @endphp
                <label for="">Job Title</label>
                <select name="jd_id" id="" class="form-control" required>
                @foreach ($jobD as $job)
                    <option value="{{$job->id}}">{{$job->job_title}}</option>
                @endforeach
                </select>
            </div>
            <div class="col-6">
                <label for="">Title</label>
                <input type="text" name="title" id="" class="form-control">
            </div>
            <div class="col-6">
                <label for="">Description</label>
                <textarea type="text" name="desc" id="" class="form-control"></textarea>
            </div>
        </div>
        <div class="row border m-4 p-2 rounded border-success align-items-center justify-content-between">
            <div class="col-auto">
                <label for="">Question</label>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-success" onclick="addQuestion()">Add Question</button>
            </div>
            <div class="row" id="questionBody">
                
            </div>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="saveSkillAssessment()">Save changes</button>
      </div>
    </div>
  </div>
</div>

            @include('Agency.components.footer')
        </div>
    </main>
    @include('Agency.components.scripts')
    @include('Agency.components.skillsrequirementscripts')
    @include('Agency.components.modals.skillsrequirementmodals')

</body>

</html>
