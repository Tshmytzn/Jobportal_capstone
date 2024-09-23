{{-- Create Skill Assessment Modal start --}}
<div class="modal fade" id="createskillassessment" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bgp-gradient">
                <h5 class="modal-title text-white" id="exampleModalLabel">Skill Assessment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="createskillassessmentForm">
                    @csrf
                    <div class="form-step">
                        <!-- Step 1 -->
                        <div class="step" id="step1">

                            <div class="form-group">
                                <label for="job_title" class="col-form-label">Position Title:</label>
                                <select class="form-control" name="job_title" id="job_title" required onchange="toggleOtherInput()">
                                    <option value="" disabled selected>Select Position</option>
                                    <option value="Construction Worker">Construction Worker</option>
                                    <option value="Electrician">Electrician</option>
                                    <option value="Plumber">Plumber</option>
                                    <option value="Welder">Welder</option>
                                    <option value="Other">Other</option>
                                </select>
                                <input type="text" class="form-control d-none" id="otherJobTitle" name="otherJobTitle" placeholder="Please specify..." required>
                            </div>      
                            <!-- Contact Information Fields -->
                            <div class="form-group">
                                <label for="email" class="col-form-label">Email Address:</label>
                                <input type="email" class="form-control" name="email" id="email" required placeholder="Enter your email">
                            </div>
                            <div class="form-group">
                                <label for="phone_number" class="col-form-label">Phone Number:</label>
                                <input type="tel" class="form-control" name="phone_number" id="phone_number" required placeholder="Enter your phone number">
                            </div>
                        </div>
                        

                        <!-- Step 2 -->
                        <div class="step d-none" id="step2">
                            <div class="form-group">
                                <label for="job_description" class="col-form-label">Description:</label>
                                <textarea class="form-control" name="job_description" id="job_description" required></textarea>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="step d-none" id="step3">
                            <div class="form-group">
                                <label for="skills" class="col-form-label">Skills Required:</label>
                                <input type="text" class="form-control" name="skills" id="skills" required>
                            </div>
                            <div class="form-group">
                                <label for="experience" class="col-form-label">Years of Experience:</label>
                                <input type="number" class="form-control" name="experience" id="experience" required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="prevBtn" class="btn btn-secondary d-none">Previous</button>
                <button type="button" id="nextBtn" class="btn bgp-gradient">Next</button>
                <button type="button" onclick="CreateJobCategory()" class="btn bgp-gradient d-none" id="submitBtn">Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- Create Skill Assessment Modal end --}}

<script>
    let currentStep = 1;
    const totalSteps = 3;

    function showStep(step) {
        document.querySelectorAll('.step').forEach((el, index) => {
            el.classList.toggle('d-none', index + 1 !== step);
        });
        document.getElementById('prevBtn').classList.toggle('d-none', step === 1);
        document.getElementById('nextBtn').classList.toggle('d-none', step === totalSteps);
        document.getElementById('submitBtn').classList.toggle('d-none', step !== totalSteps);
    }

    document.getElementById('nextBtn').addEventListener('click', function() {
        if (currentStep < totalSteps) {
            currentStep++;
            showStep(currentStep);
        }
    });

    document.getElementById('prevBtn').addEventListener('click', function() {
        if (currentStep > 1) {
            currentStep--;
            showStep(currentStep);
        }
    });

    showStep(currentStep); // Show the first step initially
</script>
