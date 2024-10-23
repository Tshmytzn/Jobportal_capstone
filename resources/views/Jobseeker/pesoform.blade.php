<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<!-- Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<!-- Include SweetAlert 2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<!-- Include SweetAlert 2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('Jobseeker.components.head', ['title' => 'PESO REGISTRATION'])
@include('Jobseeker.components.pesoformstyle')


<body>
    @include('Jobseeker.components.loading')
    @include('Jobseeker.components.spinner')

    <div class="container m-5">
        <div class="centered-container">
            <div>
                <img src="{{ asset('assets/img/PESOLOGO.png') }}" class="m-0" alt=""
                    style="width: 15%; height: 15%">
            </div>
            <header class="mt-1">PESO Registration Form</header>
        </div>

        <form id="pesoform" action="#">
            <div class="form first">

                <div class="details ID">
                    <span class="title"> <strong>Personal Information</strong></span>
                    <hr>

                    <div class="fields">
                        <div class="input-field">
                            <label>SRS ID <span style="color:red"> *</span></label>
                            <input type="number" placeholder="Enter SRS ID (e.g., 1234567)" required>
                        </div>

                        <div class="input-field">
                            <label for="full-name">Full Name <span style="color:red"> *</span></label>
                            <input type="text" id="full-name" placeholder="Enter full name"
                                oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')" pattern="[A-Za-z\s]+"
                                title="Please enter letters only" required>
                        </div>


                        <div class="input-field">
                            <label>Birthdate <span style="color:red"> *</span></label>
                            <input type="date" id="birthdate" placeholder="Select birthdate" oninput="calculateAge()"
                                required>
                        </div>

                        <div class="input-field">
                            <label>Age <span style="color:red"> *</span></label>
                            <input type="text" id="age" placeholder="ex. 36yrs 0months" readonly required>
                        </div>

                        <div class="input-field">
                            <label for="sex">Gender<span style="color:red"> *</span></label>
                            <select id="sex" required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label for="civil-status">Civil Status <span style="color:red"> *</span></label>
                            <select id="civil-status" required>
                                <option disabled selected>Select Civil Status</option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                                <option value="widowed">Widowed</option>
                                <option value="separated">Separated</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>City/Municipality</label>
                            <input type="text" value="Victorias City" placeholder="Enter city/municipality" readonly>
                        </div>

                        <div class="input-field">
                            <label for="barangay">Barangay<span style="color:red"> *</span></label>
                            <select id="barangay" required>
                                <option value="" disabled selected>Select Barangay</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Street Address<span style="color:red"> *</span></label>
                            <input type="text" placeholder="Enter street address" required>
                        </div>

                    </div>
                </div>

                {{-- <div class="input-field">
                            <label>Province</label>
                            <input type="text" placeholder="Enter province" required>
                        </div>

                        <div class="input-field">
                            <label>Region</label>
                            <input type="text" placeholder="Enter region" required>
                        </div> --}}

                {{-- contact info --}}

                <div class="details ID">
                    <span class="title">Contact Information</span>

                    <hr>
                    <div class="fields">

                        <div class="input-field">
                            <label>Email<span style="color:red"> *</span></label>
                            <input type="email" placeholder="example@email.com" required>
                        </div>

                        <div class="input-field">
                            <label>Telephone<span style="color:red"> *</span></label>
                            <input type="tel" id="telephone" placeholder="e.g. 1234-5678"
                                   pattern="^\d{4}-\d{4}$" maxlength="9"
                                   title="Please enter a valid telephone number in the format: 1234-5678"
                                   required oninput="formatTelephone(this)">
                        </div>


                        <div class="input-field">
                            <label>Cellphone Number<span style="color:red"> *</span></label>
                            <div style="display: flex; align-items: center;">
                                <span style="margin-right: 5px;">+63</span>
                                <input type="tel" id="cellphone" placeholder="ex. 9123456789"
                                       pattern="^(9\d{9})$" maxlength="10"
                                       title="Please enter a valid cellphone number (must start with 9 and 10 digits total)"
                                       required
                                       onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                       oninput="validateCellphone(this)">
                            </div>
                        </div>


                    </div>

                </div>

                {{-- contact info --}}

                <button class="nextBtn">
                    <span class="btnText">Next</span>
                    <i class="uil uil-navigator"></i>
                </button>

            </div>


            <div class="form second">
                <div class="details address">
                    <span class="title">Employment Information</span>
                    <hr>
                    <div class="fields">
                        <div class="input-field">
                            <label>Employment Status</label>
                            <select required>
                                <option value="" disabled selected>Select Employment Status</option>
                                <option value="employed">Employed</option>
                                <option value="unemployed">Unemployed</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label for="education-level">Education Level</label>
                            <select id="education-level" required>
                                <option value="" disabled selected>Select Education Level</option>
                                <option value="high-school">High School Graduate</option>
                                <option value="associate">Associate Degree</option>
                                <option value="bachelor">Bachelor's Degree</option>
                                <option value="master">Master's Degree</option>
                                <option value="doctorate">Doctorate Degree</option>
                                <option value="none">No Formal Education</option>
                            </select>
                        </div>


                        <div class="input-field">
                            <label>Preferred Position</label>
                            <input type="text" placeholder="Preferred Position" required>
                        </div>

                        <div class="input-field">
                            <label>Skills</label>
                            <textarea class="form-control" placeholder="List your skills" required></textarea>
                        </div>
                        <div class="input-field">
                            <label>Work Experience</label>
                            <textarea class="form-control" placeholder="Enter work experience" required></textarea>
                        </div>

                        <div class="input-field">
                            <label>4P's Beneficiary</label>
                            <select required>
                                <option disabled selected>Select Option</option>
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>PWD</label>
                            <select required>
                                <option disabled selected>Select Option</option>
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label for="registration-date">Registration Date</label>
                            <input type="text" id="registration-date" value="" readonly required>
                        </div>

                        <div class="input-field">
                            <label>Remarks</label>
                            <textarea class="form-control" placeholder="Remarks"></textarea>
                        </div>

                    </div>
                </div>


                <div class="details family">
                    <span class="title">Office Details</span>
                    <hr>
                    <div class="fields">
                        <div class="input-field">
                            <label>Office Name</label>
                            <input type="text" placeholder="Enter office name" value="Victorias" required>
                        </div>

                        <div class="input-field">
                            <label>Area Type</label>
                            <input type="text" placeholder="Enter area type" value="Component City" required>
                        </div>

                        <div class="input-field">
                            <label>Area Class</label>
                            <input type="text" placeholder="Enter area class (e.g., 4th class)" value="4th Class" required>
                        </div>

                        <div class="input-field">
                            <label>Program</label>
                            <input type="text" placeholder="Enter Program" value="PESO" required>
                        </div>

                        <div class="input-field">
                            <label>Event</label>
                            <input type="text" placeholder="Enter event" required>
                        </div>

                        <div class="input-field">
                            <label>Transaction</label>
                            <input type="text" placeholder="Enter Transaction" required>
                        </div>


                    </div>

                    <div class="buttons">
                        <div class="backBtn">
                            <i class="uil uil-navigator"></i>
                            <span class="btnText">Back</span>
                        </div>

                        <button class="sumbit">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>



    {{-- @include('Jobseeker.components.footer') --}}
    @include('Jobseeker.components.scripts')
    @include('Jobseeker.components.pesofromscripts')

</body>

</html>
