<!DOCTYPE html>
<html lang="en">

@include('Jobseeker.components.head', ['title' => 'Profile'])

<style>
    .badge-placeholder {
        width: auto;
        height: auto;
        border: 5px dotted red;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: white;
        color: red;
        font-size: 2rem;
        margin: 30px auto;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .card-custom {
        background-color: white;
        border: 2px solid red;
        border-radius: 10px;
    }

    .card-title {
        color: red;
        margin-bottom: 15px;
    }

    .card-text {
        margin-bottom: 20px;
    }

    .center-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .upload-icon {
        display: flex;
        align-items: center;
        cursor: pointer;
        color: #ff6600;
        font-size: 16px;
        padding: 10px;
        border-radius: 5px;
    }

    #file-upload {
        display: none;
    }

    #image-preview {
        display: none;
        margin-bottom: 10px;
        width: 110px;
        height: 110px;
        object-fit: cover;/ border-radius: 5px;
    }

    @media print {

        .print-btn {
            display: none;
        }

        body * {
            visibility: hidden;
        }

        #printableContent,
        #printableContent * {
            visibility: visible;
        }

        #printableContent {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }

        .printable {
            border: 1px solid #000;
            padding: 10px;
            margin: 10px 0;
        }
    }
</style>

<body>

    @include('Jobseeker.components.loading')

    @include('Jobseeker.components.spinner')

    @include('Jobseeker.components.navbar')

    @include('Jobseeker.components.header', ['title' => 'Profile'])

    <div class="container mb-5">
        <div class="row">
            {{-- <a href="{{ route('pesoform') }}">
                <button class="btn btn-primary w-100" style="height: 150%"> Complete PESO Registration Form</button>
            </a> --}}
            @php
                $userId = session('user_id');

                $hasSubmitted = \App\Models\JobseekerPesoForm::where('js_id', $userId)->exists();
            @endphp

            <div class="mb-5">
                @if (!$hasSubmitted)
                    <a href="{{ route('pesoform') }}">
                        <button class="btn btn-primary w-100" style="height: 150%"> Complete PESO Registration
                            Form</button>
                    </a>
                @else
                    <h5 class="text-success text-center">
                        You have Submitted PESO Registration Form! If you’d like to edit your details, please
                        click the edit icon beside the print icon below.
                    </h5>
                @endif
            </div>

            <!-- Profile Picture and Info -->
            <div class="card col-md-3">
                <div class="text-center">
                    <div class="card-body">

                        <form id="UploadProfileForm" enctype="multipart/form-data">
                            @csrf
                            <!-- Hidden field to store the jobseeker ID -->
                            <input type="hidden" id="jobseekerId" name="jobseekerId" value="{{ session('user_id') }}">
                            <!-- Set the jobseekerId dynamically -->

                            <div class="center-container mb-2">
                                <img class="img-fluid rounded-circle" id="image-preview"
                                    src="{{ session('user_id') ? asset('jobseeker_profile/' . App\Models\JobSeeker::find(session('user_id'))->js_image) : '' }}"
                                    alt="Image preview"
                                    style="{{ session('user_id') && App\Models\JobSeeker::find(session('user_id'))->js_image ? 'display:block;' : 'display:none;' }}" />
                                <label for="file-upload" class="upload-icon">
                                    <i class="fas fa-upload"></i> Upload Image
                                    <input type="file" id="file-upload" accept="image/*"
                                        onchange="previewImage(event)" />
                                </label>
                                <button class="btn btn-sm bgp-gradient" id="submit-btn" style="display:none;"
                                    type="button">Submit</button>
                            </div>
                        </form>
                        {{-- update profile --}}

                        <h5 class="card-title">{{ $jobseeker->js_firstname . ' ' . $jobseeker->js_lastname }}</h5>
                        <!-- Replace with dynamic jobseeker name -->
                        <p class="text-muted">Job Seeker</p>
                        {{-- <button class="btn btn-outline-primary btn-sm w-100">Update Profile Picture</button> --}}
                    </div>
                </div>
                <div class="container">
                    <div class="card card-custom mb-4">
                        <div class="card-body text-center">
                            <h5 class="card-title">Skill Assessment Badge</h5>
                <hr>
                            <div class="badge">
                                @if (session('user_id') && App\Models\JobSeeker::find(session('user_id'))->js_badge)
                                    <!-- If js_badge exists, display the badge image -->
                                    <img class="img-fluid rounded" id="badge-preview"
                                         src="{{ asset('img/' . App\Models\JobSeeker::find(session('user_id'))->js_badge) }}"
                                         alt="Skill Assessment Badge" style="display: block; width: 150px; height: auto;">
                                @else
                                <div class="badge-placeholder">

                                    <span class="badge-message"></span>
                                </div>

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
                

            </div>

            <!-- Update Profile Info -->
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="display-7"><strong>Profile Information</strong></h4>
                        <div>
                            <!-- Edit Profile Button -->
                            <a href="{{ route('pesoformupdate') }}" class="me-3" title="Edit Profile">
                                <i style="font-size: 20px" class="fas fa-edit"></i>
                            </a>

                            <!-- Print Profile Button -->
                            <a href="#" title="Print PESO Registration Form" onclick="printDiv('printableDiv')">
                                <i style="font-size: 20px" class="fas fa-print"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Print pesoform -->
                    <div class="container me-5" id="printableDiv">

                        @php
                            $pesoForm = null;
                            if (session()->has('user_id')) {
                                $pesoForm = \App\Models\JobseekerPesoform::where('js_id', session('user_id'))->first();
                            }
                        @endphp

                        @if (!$pesoForm)
                            <!-- Message if no pesoForm exists -->
                            <div class="alert alert-warning m-2">
                                <strong>Warning!</strong> You have not completed your personal information form. Please
                                fill out the form completely.
                            </div>
                        @else
                            <div class="centered-container text-center">
                                <div class="mt-2">
                                    <img src="{{ asset('assets/img/PESOLOGO.png') }}" class="m-0" alt="PESO Logo"
                                        style="max-width: 10%; max-height: 10%; width: auto; height: auto;">
                                </div>
                                <header class="mt-3">
                                    <h4>PESO Registration Form</h4>
                                </header>
                            </div>

                            @php
                                $pesoForm = null; // Initialize with null in case no user is logged in.
                                if (session()->has('user_id')) {
                                    $pesoForm = \App\Models\JobseekerPesoform::where(
                                        'js_id',
                                        session('user_id'),
                                    )->first();
                                }
                            @endphp

                            @php
                                $pesoForm = null;
                                if (session()->has('user_id')) {
                                    $pesoForm = \App\Models\JobseekerPesoform::where(
                                        'js_id',
                                        session('user_id'),
                                    )->first();
                                }
                            @endphp

                            <!-- Personal Information Section -->
                            <div class="form-section">
                                <div class="section-header mb-2">
                                    <h5>Personal Information</h5>
                                    <hr>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>SRS ID</label>
                                        <input type="number" id="srs_id" name="srs_id" class="form-control"
                                            value="{{ $pesoForm ? $pesoForm->peso_srsid : '' }}" readonly>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="full_name">Full Name</label>
                                        <input type="text" id="full_name" name="full_name" class="form-control"
                                            value="{{ $pesoForm ? $pesoForm->peso_fullname : '' }}" readonly>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Birthdate</label>
                                        <input type="date" id="birthdate" name="birthdate" class="form-control"
                                            value="{{ $pesoForm ? $pesoForm->peso_birthdate : '' }}" readonly>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Age</label>
                                        <input type="text" id="age" name="age" class="form-control"
                                            value="{{ $pesoForm ? $pesoForm->peso_age : '' }}" readonly>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="jobseeker_gender">Gender</label>
                                        <input type="text" id="jobseeker_gender" name="jobseeker_gender"
                                            class="form-control"
                                            value="{{ $pesoForm ? $pesoForm->peso_gender : '' }}" readonly>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="civil_status">Civil Status</label>
                                        <input type="text" id="civil_status" name="civil_status"
                                            class="form-control"
                                            value="{{ $pesoForm ? $pesoForm->peso_civilstatus : '' }}" readonly>
                                    </div>

                                    <div class="col-md-6">
                                        <label>City/Municipality</label>
                                        <input type="text" name="city" id="city" class="form-control"
                                            value="{{ $pesoForm ? $pesoForm->peso_city : '' }}" readonly>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="barangay">Barangay</label>
                                        <input type="text" id="barangay" name="barangay" class="form-control"
                                            value="{{ $pesoForm ? $pesoForm->peso_baranggay : '' }}" readonly>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Street Address</label>
                                        <input type="text" id="street" name="street" class="form-control"
                                            value="{{ $pesoForm ? $pesoForm->peso_street : '' }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <!-- Contact Information Section -->
                            <div class="form-section mt-2">
                                <div class="section-header mb-2">
                                    <h4>Contact Information</h4>
                                    <hr>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                        <input type="email" id="jobseeker_email" name="jobseeker_email"
                                            class="form-control" value="{{ $pesoForm ? $pesoForm->peso_email : '' }}"
                                            readonly>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Telephone</label>
                                        <input type="tel" id="telephone" name="telephone" class="form-control"
                                            value="{{ $pesoForm ? $pesoForm->peso_tel : '' }}" readonly>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Cellphone Number</label>
                                        <input type="tel" id="cellphone" name="cellphone" class="form-control"
                                            value="{{ $pesoForm ? $pesoForm->peso_cell : '' }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <!-- Employment Information Section -->
                            <div class="form-section mt-2">
                                <div class="section-header mb-2">
                                    <h4>Employment Information</h4>
                                    <hr>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Employment Status</label>
                                        <input type="text" id="employment_status" name="employment_status"
                                            class="form-control"
                                            value="{{ $pesoForm ? $pesoForm->peso_employment : '' }}" readonly>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="education_level">Education Level</label>
                                        <input type="text" id="education_level" name="education_level"
                                            class="form-control" value="{{ $pesoForm ? $pesoForm->peso_educ : '' }}"
                                            readonly>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="preferred_position">Preferred Position</label>
                                        <input type="text" id="preferred_position" name="preferred_position"
                                            class="form-control"
                                            value="{{ $pesoForm ? $pesoForm->peso_position : '' }}" readonly>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="skills">Skills</label>
                                        <input type="text" class="form-control" id="skills" name="skills"
                                            value="{{ $pesoForm ? $pesoForm->peso_skills : '' }}" readonly>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Work Experience</label>
                                        <textarea class="form-control" id="work_experience" name="work_experience" readonly>{{ $pesoForm ? $pesoForm->peso_work : '' }}</textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label>4P's Beneficiary</label>
                                        <input type="text" id="4ps" name="4ps" class="form-control"
                                            value="{{ $pesoForm ? $pesoForm->peso_4ps : '' }}" readonly>
                                    </div>

                                    <div class="col-md-6">
                                        <label>PWD</label>
                                        <input type="text" id="pwd" name="pwd" class="form-control"
                                            value="{{ $pesoForm ? $pesoForm->peso_pwd : '' }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <!-- Office Details Section -->
                            <div class="form-section mt-2 mb-2">
                                <div class="section-header mb-2">
                                    <h4>Office Details</h4>
                                    <hr>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="office">Office</label>
                                        <input type="text" id="office" name="office" class="form-control"
                                            value="{{ $pesoForm ? $pesoForm->peso_office : '' }}" readonly>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="transaction">Transaction</label>
                                        <input type="text" id="transaction" name="transaction"
                                            class="form-control"
                                            value="{{ $pesoForm ? $pesoForm->peso_transaction : '' }}" readonly>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="remarks">Remarks</label>
                                        <textarea class="form-control" id="remarks" name="remarks" readonly>{{ $pesoForm ? $pesoForm->peso_remarks : '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function printDiv(divId) {
            var divContent = document.getElementById(divId).innerHTML;

            var printWindow = window.open('', '', 'height=400,width=600');
            printWindow.document.write('<html><head><title>Print Content</title>');
            printWindow.document.write(
                '<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">');
            printWindow.document.write('<style>@media print {.col-md-6 { display: inline-block; width: 49%; } }</style>');
            printWindow.document.write('</head><body>');
            printWindow.document.write('<div class="container me-5">' + divContent + '</div>');
            printWindow.document.write('<script>window.onload = function() { window.print(); }<\/script>');
            printWindow.document.write('</body></html>');

            printWindow.document.close();
        }
    </script>

    @include('Jobseeker.components.footer')
    @include('Jobseeker.components.jsAuthscripts')
    @include('Jobseeker.components.scripts')
    @include('Jobseeker.components.profileupdatescripts')

</body>

</html>
