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

<body style="background-color: #e3ddeb">

    @include('Jobseeker.components.spinner')

    @include('Jobseeker.components.navbar', ['active' => 'agencysignup'])

    <div class="row mt-5 mb-4">

        <div class="row mt-5 mb-4">
            <div class="col-xl-8 col-lg-8 col-md-8 d-flex flex-column mx-auto">
                <div class="card card-plain mt-2">
                    <div class="card-header pb-0 text-center bg-transparent" style="border: none">
                        <div class="text-center mb-2 mr-5">

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
                                    <small id="agency_name_error" style="color: red; display: none;">Agency name is
                                        required*</small>
                                </div>

                                <!-- Agency Address -->
                                <div class="col-3 mb-3">
                                    <label for="province">Province: </label>
                                    <select class="form-select" id="agency_province" name="agency_province"
                                        aria-label="agency_province" required>
                                        <option value="" disabled selected>Select Province</option>
                                        <option value="Aklan">Aklan</option>
                                        <option value="Antique">Antique</option>
                                        <option value="Capiz">Capiz</option>
                                        <option value="Guimaras">Guimaras</option>
                                        <option value="Iloilo">Iloilo</option>
                                        <option value="Negros Occidental">Negros Occidental</option>
                                    </select>
                                    <small id="province_error" style="color: red; display: none;">Province is
                                        required*</small>
                                </div>

                                <div class="col-3 mb-3">
                                    <label for="city">City: </label>
                                    <select class="form-select" id="agency_city" name="agency_city"
                                        aria-label="agency_city" required>
                                        <option value="" disabled selected>Select City</option>
                                    </select>
                                    <small id="city_error" style="color: red; display: none;">City is required*</small>
                                </div>

                                <div class="col-3 mb-3">
                                    <label for="barangay">Barangay: </label>
                                    <select class="form-select" id="agency_baranggay" name="agency_baranggay"
                                        aria-label="agency_baranggay" required>
                                        <option value="" disabled selected>Select Barangay</option>
                                    </select>
                                    <small id="barangay_error" style="color: red; display: none;">Barangay is
                                        required*</small>
                                </div>

                                <div class="col-3 mb-3">
                                    <label for="agency_address">Street: </label>
                                    <input type="text" id="agency_address" name="agency_address" class="form-control"
                                        placeholder="Enter Agency Address" aria-label="Agency Address" required>
                                    <small id="address_error" style="color: red; display: none;">Street address is
                                        required*</small>
                                </div>


                                <!-- Email Address -->
                                <div class="col-4 mb-3">
                                    <label for="email_address">Email Address: </label>
                                    <input type="email" id="email_address" name="email_address" class="form-control"
                                        placeholder="Enter Email Address" aria-label="Email Address" required>
                                    <small id="email_error" style="color: red; display: none;">Email address is
                                        required*</small>
                                    <small id="email_invalid_error" style="color: red; display: none;">Please enter a
                                        valid email address*</small>
                                </div>

                                <!-- Contact Number -->
                                <div class="col-4 mb-3">
                                    <label for="phone_number">Phone Number: </label>
                                    <input type="text" id="phone_number" name="phone_number" class="form-control"
                                        maxlength="10" placeholder="Enter Phone Number" aria-label="Phone Number"
                                        required>
                                    <small id="phone_error" style="color: red; display: none;">Phone number is
                                        required*</small>
                                    <small id="phone_invalid_error" style="color: red; display: none;">Phone number must
                                        start with 9 and be 10 digits*</small>
                                </div>

                                <!-- Landline Number -->
                                <div class="col-4 mb-3">
                                    <label for="landline_number">Landline Number: </label>
                                    <div class="input-group">
                                        <input type="tel" id="landline_number" name="landline_number"
                                            class="form-control" placeholder="e.g. 1234-5678" pattern="^\d{4}-\d{4}$"
                                            maxlength="9" oninput="formatTelephone(this)"
                                            title="Please enter a valid telephone number in the format: 1234-5678"
                                            required>
                                    </div>
                                    <small id="landline_error" style="color: red; display: none;">Landline number is
                                        required*</small>
                                    <small id="landline_invalid_error" style="color: red; display: none;">Landline
                                        number must be in the format 1234-5678*</small>
                                </div>


                                <div class="col-6 mb-3">
                                    <label for="geo_coverage" class="form-label">Geographical Coverage:</label>
                                    <select id="geo_coverage" name="geo_coverage" class="form-select">
                                        <option value="" disabled selected>Select Geographical Coverage</option>
                                        <option value="local">Local</option>
                                        <option value="national">National</option>
                                        <option value="international">International</option>
                                    </select>
                                    <small id="geo_coverage_error" style="color: red; display: none;">Please select
                                        geographical coverage*</small>
                                </div>

                                <!-- Number of Employees Dropdown -->
                                <div class="col-6 mb-3">
                                    <label for="employee_count" class="form-label">Number of Employees:</label>
                                    <select id="employee_count" name="employee_count" class="form-select">
                                        <option value="" disabled selected>Select Number of Employees</option>
                                        <option value="1-10">1-10</option>
                                        <option value="11-20">11-20</option>
                                        <option value="21-30">21-30</option>
                                        <option value="31-40">31-40</option>
                                        <option value="41-50">41-50</option>
                                        <option value="51-above">51 and above</option>
                                    </select>
                                    <small id="employee_count_error" style="color: red; display: none;">Please select
                                        the number of employees*</small>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Agency Business Permit -->
                                <div class="col-3 mb-3">
                                    <label for="agency_business_permit">Agency Business Permit:</label>
                                    <input type="file" id="agency_business_permit" name="agency_business_permit"
                                        class="form-control">
                                </div>

                                <!-- Agency DTI Permit -->
                                <div class="col-3 mb-3">
                                    <label for="agency_dti_permit">Agency DTI Permit:</label>
                                    <input type="file" id="agency_dti_permit" name="agency_dti_permit"
                                        class="form-control">
                                </div>

                                <!-- Agency BIR Permit -->
                                <div class="col-3 mb-3">
                                    <label for="agency_bir_permit">Agency BIR Permit:</label>
                                    <input type="file" id="agency_bir_permit" name="agency_bir_permit"
                                        class="form-control">
                                </div>

                                <!-- Agency Mayors Permit -->
                                <div class="col-3 mb-3">
                                    <label for="agency_mayors_permit">Agency Mayors Permit:</label>
                                    <input type="file" id="agency_mayors_permit" name="agency_mayors_permit"
                                        class="form-control">
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label for="password" class="form-label">Password:</label>
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="Enter Password" aria-label="Password" required>
                                    <small id="password_error" style="color: red; display: none;">Password is
                                        required*</small>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="confirm_password" class="form-label">Confirm Password:</label>
                                    <input type="password" id="confirm_password" name="confirm_password"
                                        class="form-control" placeholder="Confirm Password"
                                        aria-label="Confirm Password" required>
                                    <small id="confirm_password_error" style="color: red; display: none;">Confirm
                                        Password is required*</small>
                                    <small id="password_mismatch_error" style="color: red; display: none;">Passwords
                                        do not match*</small>
                                </div>
                            </div>

                            <div class="row me-2 mt-1 mb-1">
                                <div class="col-12">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="privacyCheckbox"
                                            required>
                                        <label class="form-check-label" for="privacyCheckbox">
                                            I have read and agree to the <a href="/PrivacyPolicy" target="_blank">Data
                                                Privacy Terms and Conditions</a>.
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="button" onclick="registerAgency()" id="submitBtn"
                                    class="btn btn-light border border-primary rounded-pill w-100 mt-3 mb-3"
                                    disabled>Sign Up</button>
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
    @include('Jobseeker.components.Agencyvalidator')

    <script>
        const privacyCheckbox = document.getElementById("privacyCheckbox");
        const submitBtn = document.getElementById("submitBtn");


        privacyCheckbox.addEventListener("change", function() {
            submitBtn.disabled = !privacyCheckbox.checked;
        });
    </script>

</body>

</html>
