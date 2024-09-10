<!DOCTYPE html>
<html lang="en">

@include('Jobseeker.components.head', ['title' => 'Job Portal'])

<style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css"><script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script><style>select.form-select {
        background-color: #fff;
        color: #495057;
        border: 1px solid #ced4da;
        border-radius: 0.375rem;
        padding: 0.375rem 0.75rem;
        box-shadow: 0 0.2rem 0.5rem rgba(0, 0, 0, 0.05);
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
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
</style>

<body style="background-color: #e3ddeb">

    @include('Jobseeker.components.spinner')

    @include('Jobseeker.components.navbar', ['active' => 'agencysignup'])

    <div class="row mt-5 mb-4">

        <div class="row mt-5 mb-4">
            <div class="col-xl-8 col-lg-8 col-md-8 d-flex flex-column mx-auto">
                <div class="card card-plain mt-2">
                    <div class="card-header pb-0 text-center bg-transparent" style="border: none">
                        <div class="text-center mb-2 mr-5">
                            <!-- Use 'img-fluid' to make the image responsive and 'w-50' to set width -->
                            <img src="{{ asset('../assets/svg/undraw_Hello_re_3evm.png') }}" class="img-fluid w-50"
                                alt="Hello Image">
                        </div>
                        <h2 class="font-weight-bolder text-info text-gradient-primary ">Welcome Agency!</h2>
                        <p class="mb-3">Please fill in the information below to create an account</p>
                    </div>
                    <hr>
                    <div class="card-body " style="border: none">

                        <form id="agencyForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Agency Name -->
                                <div class="col-12 mb-3">
                                    <label for="agency_name">Agency Name: </label>
                                    <input type="text" id="agency_name" name="agency_name" class="form-control"
                                        placeholder="Enter Agency Name" aria-label="Agency Name">
                                </div>

                                <!-- Agency Address -->
                                <div class="col-12 mb-3">
                                    <label for="agency_address">Agency Address: </label>
                                    <input type="text" id="agency_address" name="agency_address" class="form-control"
                                        placeholder="Enter Agency Address" aria-label="Agency Address">
                                </div>

                                <!-- Email Address -->
                                <div class="col-4 mb-3">
                                    <label for="email_address">Email Address: </label>
                                    <input type="email" id="email_address" name="email_address" class="form-control"
                                        placeholder="Enter Email Address" aria-label="Email Address" required>
                                </div>

                                <!-- Contact Number -->
                                <div class="col-4 mb-3">
                                    <label for="contact_number">Contact Number: </label>
                                    <div class="input-group">
                                        <span class="input-group-text">+63</span>
                                        <input type="tel" id="contact_number" name="contact_number"
                                            class="form-control" placeholder="9123456789"
                                            aria-label="Contact Number" pattern="[0-9]{10}">
                                    </div>
                                </div>

                                <!-- Landline Number -->
                                <div class="col-4 mb-3">
                                    <label for="landline_number">Landline Number: </label>
                                    <div class="input-group">
                                        <input type="tel" id="landline_number" name="landline_number"
                                            class="form-control" placeholder="02-12345678"
                                            aria-label="Landline Number" pattern="[0-9]{2}-[0-9]{8}">
                                    </div>
                                </div>

                                <!-- Geographical Coverage Dropdown -->
                                <div class="col-6 mb-3">
                                    <label for="geo_coverage" class="form-label">Geographical Coverage:</label>
                                    <select id="geo_coverage" name="geo_coverage" class="form-select">
                                        <option value="local">Local</option>
                                        <option value="national">National</option>
                                        <option value="international">International</option>
                                    </select>
                                </div>

                                <!-- Number of Employees Dropdown -->
                                <div class="col-6 mb-3">
                                    <label for="employee_count" class="form-label">Number of Employees:</label>
                                    <select id="employee_count" name="employee_count" class="form-select">
                                        <option value="1-10">1-10</option>
                                        <option value="11-20">11-20</option>
                                        <option value="21-30">21-30</option>
                                        <option value="31-40">31-40</option>
                                        <option value="41-50">41-50</option>
                                        <option value="51-above">51 and above</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Agency Business Permit -->
                                <div class="col-4 mb-3">
                                    <label for="agency_business_permit">Agency Business Permit:</label>
                                    <input type="file" id="agency_business_permit" name="agency_business_permit"
                                        class="form-control">
                                </div>

                                <!-- Agency DTI Permit -->
                                <div class="col-4 mb-3">
                                    <label for="agency_dti_permit">Agency DTI Permit:</label>
                                    <input type="file" id="agency_dti_permit" name="agency_dti_permit"
                                        class="form-control">
                                </div>

                                <!-- Agency BIR Permit -->
                                <div class="col-4 mb-3">
                                    <label for="agency_bir_permit">Agency BIR Permit:</label>
                                    <input type="file" id="agency_bir_permit" name="agency_bir_permit"
                                        class="form-control">
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label>Password: </label>
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="Enter Password" aria-label="Password">
                                </div>
                                <div class="col-6 mb-3">
                                    <label>Confirm Password: </label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" placeholder="Confirm Password"
                                        aria-label="Confirm Password">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="button" onclick="registerAgency()"
                                    class="btn btn-light border border-primary rounded-pill w-100 mt-3 mb-3">Sign
                                    Up</button>
                            </div>
                            <div class="text-center">
                                <label for="signin">Already have an account? <span class="text-secondary small"> <a
                                            href="{{ route('agencylogin') }}">Sign in
                                            here.</a></span></label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Jobseeker.components.scripts')
    @include('Jobseeker.components.AgencyAuthscripts')

</body>

</html>
