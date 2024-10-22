<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
@include('Jobseeker.components.head', ['title' => 'PESO REGISTRATION'])
@include('Jobseeker.components.pesoformstyle')
<body>
    @include('Jobseeker.components.loading')
    @include('Jobseeker.components.spinner')

    <div class="container m-5">
        <div class="centered-container">
            <div>
                <img src="{{asset('assets/img/PESOLOGO.png')}}" class="m-0" alt="" style="width: 15%; height: 15%">
            </div>
            <header class="mt-1">PESO Registration Form</header>
        </div>

        <form id="pesoform" action="#">
            <div class="form first">

                <div class="details ID">
                    <span class="title"> <strong>Jobseeker Details</strong></span>


                    <div class="fields">
                        <div class="input-field">
                            <label>SRS ID</label>
                            <input type="text" placeholder="Enter SRS ID (e.g., 1234567)" required>
                        </div>
                
                        <div class="input-field">
                            <label>Full Name</label>
                            <input type="text" placeholder="Enter full name" required>
                        </div>
                
                        <div class="input-field">
                            <label>Birthdate</label>
                            <input type="date" placeholder="Select birthdate" required>
                        </div>
                
                        <div class="input-field">
                            <label>Age</label>
                            <input type="number" placeholder="Enter age" required>
                        </div>
                
                        <div class="input-field">
                            <label>Sex</label>
                            <select required>
                                <option disabled selected>Choose...</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                            </select>
                        </div>
                
                        <div class="input-field">
                            <label>Street Address</label>
                            <input type="text" placeholder="Enter street address" required>
                        </div>
                
                        <div class="input-field">
                            <label>Barangay</label>
                            <input type="text" placeholder="Enter barangay" required>
                        </div>
                
                        <div class="input-field">
                            <label>City/Municipality</label>
                            <input type="text" placeholder="Enter city/municipality" required>
                        </div>
                
                        <div class="input-field">
                            <label>Province</label>
                            <input type="text" placeholder="Enter province" required>
                        </div>
                
                        <div class="input-field">
                            <label>Region</label>
                            <input type="text" placeholder="Enter region" required>
                        </div>
                
                        <div class="input-field">
                            <label>Email</label>
                            <input type="email" placeholder="Enter email" required>
                        </div>
                
                        <div class="input-field">
                            <label>Cellphone Number</label>
                            <input type="tel" placeholder="Enter cellphone number" required>
                        </div>
                    </div>

                    <button class="nextBtn">
                        <span class="btnText">Next</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                </div>
            </div>

            <div class="form second">
                <div class="details address">
                    <span class="title">Employment Information</span>
                
                    <div class="fields">
                        <div class="input-field">
                            <label>Employment Status</label>
                            <select required>
                                <option value="" disabled selected>Choose...</option>
                                <option value="employed">Employed</option>
                                <option value="unemployed">Unemployed</option>
                                <option value="student">Student</option>
                                <option value="freelancer">Freelancer</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                
                        <div class="input-field">
                            <label>Education Level</label>
                            <input type="text" placeholder="e.g., High School Graduate" required>
                        </div>
                
                        <div class="input-field">
                            <label>Preferred Position</label>
                            <input type="text" placeholder="Preferred Position" required>
                        </div>
                
                        <div class="input-field">
                            <label>Skills</label>
                            <textarea placeholder="List your skills" required></textarea>
                        </div>
                
                        <div class="input-field">
                            <label>Registration Date</label>
                            <input type="date" required>
                        </div>
                
                        <div class="input-field">
                            <label>Remarks</label>
                            <textarea placeholder="Remarks"></textarea>
                        </div>
                    </div>
                </div>
                

                <div class="details family">
                    <span class="title">Office Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Office Name</label>
                            <input type="text" placeholder="Enter office name" required>
                        </div>

                        <div class="input-field">
                            <label>Area Type</label>
                            <input type="text" placeholder="Enter area type" required>
                        </div>

                        <div class="input-field">
                            <label>Area Class</label>
                            <input type="text" placeholder="Enter area class (e.g., 4th class)" required>
                        </div>

                        <div class="input-field">
                            <label>Program</label>
                            <input type="text" placeholder="Enter Program" required>
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
