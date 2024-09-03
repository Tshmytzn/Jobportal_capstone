<!DOCTYPE html>
<html lang="en">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>

  <style>

select.form-select {
    background-color: #fff; /* White background for select */
    color: #495057; /* Bootstrap text color */
    border: 1px solid #ced4da; /* Light border */
    border-radius: 0.375rem; /* Slight rounding */
    padding: 0.375rem 0.75rem; /* Consistent padding */
    box-shadow: 0 0.2rem 0.5rem rgba(0, 0, 0, 0.05); /* Soft shadow for depth */
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out; /* Smooth transitions */
}

select.form-select option {
    background-color: #fff; 
    color: #49868c; 
    padding: 10px; 
    border-bottom: 1px solid #e9ecef; 
    cursor: pointer; 
}

select.form-select option:hover {
    background-color: #f8f9fa; 
    color: #43475c; 
}

select.form-select option:checked {
    background-color: #40166f; 
    color: #fff; 
}

  </style>
  
@include('Agency.components.head', ['title' => 'Settings'])

<body class="g-sidenav-show  bg-gray-100">

    @include('Agency.components.aside', ['active' => 'Settings'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('Agency.components.navbar', ['headtitle' => 'Settings'], ['pagetitle' => 'Agency'])
        <!-- End Navbar -->

        <div class="container-fluid">
            <div class="page-header min-height-100 border-radius-xl mt-4"
                style="background-image: url('{{ asset('../assets/img/curved-images/curved0.jpg') }}'); background-position-y: 50%;">
                <span class="mask bg-gradient-primary opacity-6"></span>
            </div>
            <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ asset('../assets/img/team-1.jpg') }}" alt="profile_image"
                                class="w-100 border-radius-md shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                Kailah Leyva
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                Administrator
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        <div class="nav-wrapper position-relative end-0">
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12 col-xl-4">
                    <div class="card h-100">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-0">Update Profile</h6>
                        </div>
                        <div class="card-body p-3">

                          
                          <div class="mt-2 mb-2 ms-4 me-4">
                            <button class="btn btn-outline-primary w-100">Update Profile Picture</button>
                          </div>
                          

                          <div class="mt-1 mb-2 ms-4 me-4">
                            <label class="form-label text-dark"><strong>Agency Name:</strong></label>
                                <input type="Password" class="form-control" placeholder="Enter Current Password"
                                    aria-label="Password" aria-describedby="Password-addon">
                            </div>

                            <div class="mt-2 mb-2 ms-4 me-4">
                              <label class="form-label text-dark"><strong>Agency Name:</strong></label>
                                <input type="Password" class="form-control" placeholder="Enter New Password"
                                    aria-label="Password" aria-describedby="Password-addon">
                            </div>
                            <div class="mt-2 mb-3 ms-4 me-4">
                              <label class="form-label text-dark"><strong>Agency Name:</strong></label>
                                <input type="Password" class="form-control" placeholder="Confirm New Password"
                                    aria-label="Password" aria-describedby="Password-addon">
                            </div>

                            <div class="text-center mx-4" style="margin-top: -6%">
                                <button type="button" class="btn bg-gradient-primary w-100 mt-4 mb-0">Save
                                    Changes</button>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-8">
                    <div class="card h-60">
                        <div class="card-header pb-0 p-3">
                            <div class="row" style="margin-top: -0%">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-0">Agency Information</h6>
                                </div>
                                <div class="col-md-4 text-end">
                                    <a href="javascript:;">
                                        <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Edit Profile"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3" style="margin-top: -3%">
                            <div class="m-4">
                                <div class="mb-1">
                                    <label class="form-label text-dark"><strong>Agency Name:</strong></label>
                                    <input type="text" class="form-control" value="Kailah Leyva" readonly>
                                </div>

                                <div class="mb-1">
                                    <label class="form-label text-dark"><strong>Email:</strong></label>
                                    <input type="email" class="form-control" value="kailah@gmail.com" readonly>
                                </div>

                                <div class="row">

                                    <div class="col-6 mb-1">
                                        <label class="form-label text-dark"><strong>Contact Number:</strong></label>
                                        <input type="text" class="form-control" value="09176473485" readonly>
                                    </div>

                                    <div class=" col-6 mb-1">
                                        <label class="form-label text-dark"><strong>Landline Number:</strong></label>
                                        <input type="text" class="form-control" value="6756745633" readonly>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6 mb-1">
                                        <label class="form-label text-dark"><strong>Geographical
                                                Coverage:</strong></label>
                                        <select class="form-select">
                                            <option value="local">Local</option>
                                            <option value="national">National</option>
                                            <option value="international">International</option>
                                        </select>
                                    </div>

                                    <div class="col-6 mb-1">
                                        <label class="form-label text-dark"><strong>Number of
                                                Employees:</strong></label>
                                        <select class="form-select">
                                            <option value="1-10">1-10</option>
                                            <option value="11-20">11-20</option>
                                            <option value="21-30">21-30</option>
                                            <option value="31-40">31-40</option>
                                            <option value="41-50">41-50</option>
                                            <option value="41-50">51 and above</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="text-center mx-4 mb-4" style="margin-top: -4%">
                                <button type="button" class="btn bg-gradient-primary w-100 mt-4 mb-0">Save
                                    Changes</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>

        {{-- cards --}}
        <div class="container-fluid py-4">
            <div class="row">

            </div>
            @include('Agency.components.footer')
        </div>
    </main>
    @include('Agency.components.scripts')
</body>

</html>
