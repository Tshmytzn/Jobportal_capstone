<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<!-- Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<!-- Include SweetAlert 2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<!-- Include SweetAlert 2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('Jobseeker.components.head', ['title' => 'PESO REGISTRATION FORM'])
@include('Jobseeker.components.pesoformstyle')

<style>
    .form-control {
        width: 100%;
        height: 100px;
        overflow: auto;
        padding: 10px;
    }
</style>

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

        @php
            $pesoForm = \App\Models\Jobseeker::where('js_id', session('user_id'))->first();

            $fullName = "{$pesoForm->js_firstname} {$pesoForm->js_middlename} {$pesoForm->js_lastname}";

        @endphp

        <form id="PesoForm" method="POST">
            @csrf
            <div class="form first">

                <div class="details ID">
                    <span class="title"> <strong>Personal Information</strong></span>
                    <hr>

                    <div class="fields">
                        <div class="input-field">
                            <label>SRS ID <span style="color:red"> *</span></label>
                            <input type="number" id="srs_id" name="srs_id"
                                placeholder="Enter SRS ID (e.g., 1234567)" required>
                        </div>

                        <input type="hidden" id="js_id" name="js_id" value="{{ session('user_id') }}">

                        <div class="input-field">
                            <label for="full-name">Full Name <span style="color:red"> *</span></label>
                            <input type="text" id="full_name" name="full_name" placeholder="Enter full name"
                                value="{{ $fullName ?? '' }}"
                                oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')" pattern="[A-Za-z\s]+"
                                title="Please enter letters only" required>
                        </div>


                        <div class="input-field">
                            <label>Birthdate <span style="color:red"> *</span></label>
                            <input type="date" id="birthdate" name="birthdate" placeholder="Select birthdate"
                                oninput="calculateAge()" required>
                        </div>

                        <div class="input-field">
                            <label>Age <span style="color:red"> *</span></label>
                            <input type="text" id="age" name="age" placeholder="ex. 36yrs 0months" readonly
                                required>
                        </div>

                        <div class="input-field">
                            <label for="jobseeker_gender">Gender<span style="color:red"> *</span></label>
                            <select id="jobseeker_gender" name="jobseeker_gender" required>
                                <option value="" disabled>Select Gender</option>
                                <option value="{{ $pesoForm->js_gender ?? '' }}" hidden selected>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label for="civil-status">Civil Status <span style="color:red"> *</span></label>
                            <select id="civil_status" name="civil_status" required>
                                <option disabled selected>Select Civil Status</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widowed">Widowed</option>
                                <option value="Separated">Separated</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>City/Municipality</label>
                            <input type="text" name="city" id="city" value="Victorias City"
                                placeholder="Enter city/municipality" readonly>
                        </div>

                        <div class="input-field">
                            <label for="barangay">Barangay<span style="color:red"> *</span></label>
                            <select id="barangay" name="barangay" required>
                                <option value="" disabled selected>Select Barangay</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Street Address<span style="color:red"> *</span></label>
                            <input type="text" id="street" name="street" placeholder="Enter street address"
                                value="{{ $pesoForm->js_address ?? '' }}" required>
                        </div>

                    </div>
                </div>

                {{-- contact info --}}

                <div class="details ID">
                    <span class="title">Contact Information</span>

                    <hr>
                    <div class="fields">

                        <div class="input-field">
                            <label>Email<span style="color:red"> *</span></label>
                            <input type="email" id="jobseeker_email" name="jobseeker_email"
                                value="{{ $pesoForm->js_email ?? '' }}" placeholder="example@email.com" required>
                        </div>

                        <div class="input-field">
                            <label>Telephone<span style="color:red"> *</span></label>
                            <input type="tel" id="telephone" name="telephone" placeholder="e.g. 1234-5678"
                                pattern="^\d{4}-\d{4}$" maxlength="9"
                                title="Please enter a valid telephone number in the format: 1234-5678" required
                                oninput="formatTelephone(this)">
                        </div>


                        <div class="input-field">
                            <label>Cellphone Number<span style="color:red"> *</span></label>
                            <div style="display: flex; align-items: center;">
                                <span style="margin-right: 5px;">+63</span>
                                <input type="tel" id="cellphone" name="cellphone" placeholder="ex. 9123456789"
                                    value="{{ $pesoForm->js_contactnumber ?? '' }}" pattern="^(9\d{9})$"
                                    maxlength="10"
                                    title="Please enter a valid cellphone number (must start with 9 and 10 digits total)"
                                    required onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                    oninput="validateCellphone(this)">
                            </div>
                        </div>
                    </div>
                </div>

                <button type="button" class="nextBtn">
                    <span class="btnText">Next</span>
                    <i class="uil uil-navigator"></i>
                </button>
                <div id="error-message" style="color:red; display:none;"></div>

            </div>


            <div class="form second">
                <div class="details address">
                    <span class="title">Employment Information</span>
                    <hr>
                    <div class="fields">
                        <div class="input-field">
                            <label>Employment Status</label>
                            <select id="employment_status" name="employment_status" required>
                                <option value="" disabled selected>Select Employment Status</option>
                                <option value="Employed">Employed</option>
                                <option value="Unemployed">Unemployed</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label for="education_level">Education Level</label>
                            <select id="education_level" name="education_level" required>
                                <option value="" disabled selected>Select Education Level</option>
                                <option value="High School Graduate">High School Graduate</option>
                                <option value="Associate Degree">Associate Degree</option>
                                <option value="Bachelor's Degree">Bachelor's Degree</option>
                                <option value="Master's Degree">Master's Degree</option>
                                <option value="Doctorate Degree">Doctorate Degree</option>
                                <option value="No Formal Education">No Formal Education</option>
                            </select>
                        </div>


                        <div class="input-field">
                            <label>Preferred Position</label>
                            <input type="text" id="preferred_position" name="preferred_position"
                                placeholder="Preferred Position" required>
                        </div>

                        @php
                            $pesoSkill = \App\Models\JobseekerSkill::all();
                        @endphp

                        <div class="input-field">
                            <label for="skills">Skills</label>
                            <select class="form-control" id="skills" name="skills[]" multiple required>
                                <option value="" disabled>Select your skills</option>

                                @foreach ($pesoSkill as $skill)
                                    <option value="{{ $skill->skill_name }}">{{ $skill->skill_name }}</option>
                                @endforeach
                            </select>

                            <input type="text" id="selectedSkill" name="selectedSkill" hidden>
                            <div id="selected-skills" style="margin-top: 10px;"></div>
                        </div>

                        <div class="input-field">
                            <label>Work Experience</label>
                            <textarea class="form-control" id="work_experience" name="work_experience" placeholder="Enter work experience"
                                required></textarea>
                        </div>

                        <div class="input-field">
                            <label>4P's Beneficiary</label>
                            <select id="4ps" name="4ps" required>
                                <option disabled selected>Select Option</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>PWD</label>
                            <select id="pwd" name="pwd" required>
                                <option disabled selected>Select Option</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label for="registration_date">Registration Date</label>
                            <input type="text" id="registration-date" name="registration_date" value=""
                                readonly required>
                        </div>

                        <div class="input-field">
                            <label>Remarks</label>
                            <textarea class="form-control" id="remarks" name="remarks" placeholder="Remarks"></textarea>
                        </div>

                    </div>
                </div>


                <div class="details family">
                    <span class="title">Office Details</span>
                    <hr>
                    <div class="fields">
                        <div class="input-field">
                            <label>Office Name</label>
                            <input type="text" id="office_name" name="office_name"
                                placeholder="Enter office name" value="Victorias" required>
                        </div>

                        <div class="input-field">
                            <label>Area Type</label>
                            <input type="text" name="area_type" id="area_type" placeholder="Enter area type"
                                value="Component City" required>
                        </div>

                        <div class="input-field">
                            <label>Area Class</label>
                            <input type="text" id="area_class" name="area_class"
                                placeholder="Enter area class (e.g., 4th class)" value="4th Class" required>
                        </div>

                        <div class="input-field">
                            <label>Program</label>
                            <input type="text" id="program" name="program" placeholder="Enter Program"
                                value="PESO" required>
                        </div>

                        <div class="input-field">
                            <label>Event</label>
                            <input type="text" id="event_name" name="event_name" placeholder="Enter event"
                                required>
                        </div>

                        <div class="input-field">
                            <label>Transaction</label>
                            <input type="text" id="trans" name="trans" placeholder="Enter Transaction"
                                required>
                        </div>


                    </div>

                    <div class="buttons">
                        <div class="backBtn">
                            <i class="uil uil-navigator"></i>
                            <span class="btnText">Back</span>
                        </div>

                        <button type="button" onclick="SubmitPesoForm()" class="sumbit">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>

        <div class="d-flex justify-content-end">
            <a href="{{ route('profile') }}">
                <button class="btn btn-primary m-2">Back to Profile</button>
            </a>
        </div>
    </div>


    {{-- @include('Jobseeker.components.footer') --}}
    @include('Jobseeker.components.scripts')
    @include('Jobseeker.components.pesofromscripts')

</body>

</html>
