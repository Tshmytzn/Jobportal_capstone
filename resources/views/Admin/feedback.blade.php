<!DOCTYPE html>
<html lang="en">

@include('Admin.components.head', ['title' => 'Feedbacks'])
@include('admin.components.loading')
<body class="g-sidenav-show  bg-gray-100">

    @include('Admin.components.aside', ['active' => 'Feedbacks'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('Admin.components.navbar', ['headtitle' => 'Feedbacks'], ['pagetitle' => 'User'])        
        <!-- End Navbar -->

        {{-- cards --}}
        <div class="container-fluid">
            <div class="row">

                <ul class="nav nav-pills">
                    <li class="nav-item">
                      <a class="nav-link active" id="agency-tab" data-bs-toggle="pill" href="#agency">Agency</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="jobseeker-tab" data-bs-toggle="pill" href="#jobseeker">Jobseeker</a>
                    </li>
                  </ul>
                  
                  <div class="tab-content mt-3">
                    <!-- Agency Tab Content -->
                    <div class="tab-pane fade show active" id="agency">
                        <table id="AgencyF_tbl" class="table table-striped" style="width: 100%">
                            <thead style="width: 100%">
                                <tr>
                                    <th>#</th>
                                    <th>Applicant Name</th>
                                    <th>Job Title</th>
                                    <th>Rating</th>
                                    <th>Comments</th>
                                    <th>Submitted At</th>
                                </tr>
                            </thead>
                        </table>
                        
                    </div>
                  
                    <!-- Jobseeker Tab Content -->
                    <div class="tab-pane fade" id="jobseeker">
                        <table id="JobseekerF_tbl" class="table table-striped" style="width: 100%">
                            <thead style="width: 100%">
                                <tr>
                                    <th>#</th>
                                    <th>Applicant Name</th>
                                    <th>Job Title</th>
                                    <th>Rating</th>
                                    <th>Comments</th>
                                    <th>Submitted At</th>
                                </tr>
                            </thead>
                        </table>
                        
                    </div>
                  </div>
                  
                
            </div>
            @include('Admin.components.footer')
        </div>
    </main>
    @include('Admin.components.scripts')
    @include('Admin.components.feedbackscripts')
    @include('Admin.components.modals.feedbacksmodal')

</body>

</html>
