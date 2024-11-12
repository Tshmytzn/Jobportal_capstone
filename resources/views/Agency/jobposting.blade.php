<!DOCTYPE html>
<html lang="en">

@include('Agency.components.head', ['title' => 'Post a Job'])

<style>
    .list-group-item-action.custom-hover:hover {
        background-color: #ddbbe2;
        /* Light blue shade */
        transition: background-color 0.3s;
        /* Smooth transition */
    }
</style>
@include('Agency.components.loading')
<body class="g-sidenav-show  bg-gray-100">

    @include('Agency.components.aside', ['active' => 'jobposting'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('Agency.components.navbar', ['headtitle' => 'Post a Job'], ['pagetitle' => 'Agency'])
        <!-- End Navbar -->

        {{-- cards --}}
        <div class="container-fluid py-4">

            <div class="position-fixed top-6 end-0 m-4">
                <button data-bs-toggle="modal" data-bs-target="#jobpostmodal"
                    class="btn w-100 d-flex align-items-center justify-content-center text-white"
                    style="background: linear-gradient(90deg, rgba(77, 7, 99, 1) 0%, rgba(121, 9, 128, 1) 50%, rgba(189, 11, 186, 1) 100%);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        viewBox="0 0 448 512" class="me-2">
                        <path fill="#ffffff"
                            d="M64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zM200 344l0-64-64 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l64 0 0-64c0-13.3 10.7-24 24-24s24 10.7 24 24l0 64 64 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-64 0 0 64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                    </svg>
                    Post A Job
                </button>
            </div>

            <div class="row mt-4">

                <div class="col-4">
                    <div class="card text-sm">
                        <div class="card-header"
                            style="background: linear-gradient(90deg, rgba(77, 7, 99, 1) 0%, rgba(121, 9, 128, 1) 50%, rgba(189, 11, 186, 1) 100%); height: 50px; display: flex; align-items: center;">
                            <h5 class="card-title text-white">Jobs Listed</h5>
                        </div>
                        <div class="list-group list-group-flush overflow-auto" style="max-height: 400px;" id="joblist">

                            {{-- <div class="list-group-item list-group-item-action custom-hover">
                                <div class="row align-items-center">
                                    <!-- Image Column -->
                                    <div class="col-4">
                                        <a href="#">
                                            <span class="avatar" style=" width: 100%;">
                                                <img src="{{ asset('img/about-1.png') }}" alt="">
                                            </span> </a>
                                    </div>
                                    <!-- Job Details Column -->
                                    <div class="col-8">
                                        <a href="#" class="text-reset d-block fw-bold">Plumber - Residential
                                            Maintenance</a>
                                        <div class="d-block text-secondary mt-n1 text-truncate">
                                            We are looking for an experienced plumber to handle residential maintenance
                                            and repair tasks. Must have at least 2 years of experience and valid
                                            certification.
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>

                <div class="col-8">
                    <div class="card text-sm">
                        <div class="card-header"
                            style="background: linear-gradient(90deg, rgba(77, 7, 99, 1) 0%, rgba(121, 9, 128, 1) 50%, rgba(189, 11, 186, 1) 100%); height: 50px; display: flex; align-items: center;">
                            <h5 class="card-title text-white">Job Details</h5>
                        </div>
                        <div class="card-body ms-3 me-3" id="job_detail" style="max-height: 500px; overflow-y: auto;">
                            <!-- Job Overview -->
                        
                        </div>

                        </div>
                </div>
                
            </div>
            <form action="" id="deletejobdetail" method="post" hidden>
                @csrf
                <input type="text" name="id"  id="jobid" >
                <input type="text" name="process" id="" value="delete">
            </form>
            @include('Agency.components.footer')
        </div>
    </main>
    
    @include('Agency.components.scripts')
    @include('Agency.components.modals')
    @include('Agency.components.jobpostscript')
</body>

</html>
