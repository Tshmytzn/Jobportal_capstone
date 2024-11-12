<style>
    select.form-select {
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

<!-- AGency Profile Modal start -->
<div class="modal fade" id="agencyProfileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-custom">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">Administrator</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @php
                $agencyData = App\Models\Agency::where('id', session('agency_id'))->first();
            @endphp

            <div class="modal-body text-center">
                <div class="avatar avatar-xl mx-auto mb-3">
                    <img src="{{ asset('agency_profile/' . $agencyData->agency_image) }}"alt="profile_image"
                        class="w-100 border-radius-md shadow-sm">

                </div>

                <h6 class="mb-2">{{ session('agency_name') }}</h6>
                <a href="{{ route('agencysettings') }}"> <button
                        class="btn bg-gradient-primary text-white w-100 mb-2">Settings</button></a>
                <form action="{{ route('logoutAgency') }}" method="POST" id="logoutForm">
                    @csrf
                    <button type="submit" class="btn bg-gradient-primary w-100">Log out</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- AGency Profile Modal End-->

{{-- Create Job Post Modal --}}
<div class="modal fade bd-example-modal-lg" id="jobpostmodal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header"
                style="background: linear-gradient(90deg, rgba(77, 7, 99, 1) 0%, rgba(121, 9, 128, 1) 50%, rgba(189, 11, 186, 1) 100%);">
                <h5 class="modal-title text-white">Job Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <form action="" id="jobDetailsForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">

                    <div class="card-body m-2">

                        <input type="hidden" id="agencyid" name="agencyid" value="{{ session('agency_id') }}">

                        <div class="row">
                            <div class="col-6 form-group">
                                <h6>Job Title</h6>
                                <input type="text" name="process" id="" value="add" hidden>
                                <input type="text" class="form-control" name="job_title" id="job_title"
                                    placeholder="Enter Job Title"
                                     oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '');" required>

                            </div>


                            <div class="col-6 form-group">
                                <h6>Job Location</h6>
                                <select class="form-select" name="job_location" id="job_location">
                                    <option value="" disabled selected>Select Job location</option>
                                    <option value="Bacolod">Bacolod</option>
                                    <option value="Talisay">Talisay</option>
                                    <option value="Victorias">Victorias</option>
                                </select>
                            </div>

                        </div>
                        @php
                            $category = App\Models\JobCategory::all();
                        @endphp
                        <div class="row">
                            <div class="col-6 form-group">
                                <h6>Job Category</h6>
                                <select class="form-select" name="job_category" id="job_category">
                                    <option value="" disabled selected> Select Job Category </option>
                                    <!-- You can manually add static options here -->
                                    @foreach ($category as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-6 form-group">
                                <h6>Employment Type</h6>
                                <select class="form-select" name="job_type" id="job_type">
                                    <option value="" disabled selected> Select Employment Type </option>
                                    <option value="Full Time">Full Time</option>
                                    <option value="Part Time">Part Time</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <h6>Job Image</h6>
                                <input type="file" class="form-control" name="job_image" id="job_image"
                                    placeholder="Image.....">

                                <div class="row mt-3">

                                    <div class="col-6 form-group">
                                        <h6>Salary Frequency</h6>
                                        <select class="form-select" name="salary_frequency" id="salary_frequency" required>
                                            <option value="" disabled selected>Select frequency</option>
                                            <option value="monthly">Monthly</option>
                                            <option value="fortnight">Fortnight</option>
                                            <option value="daily">Daily</option>
                                        </select>
                                    </div>

                                    <div class="col-6 form-group">
                                        <h6>Salary Amount</h6>
                                        <input type="text" class="form-control" name="job_salary" id="job_salary"
                                            placeholder="Enter Salary Amount in PHP"
                                            oninput="
                                                let value = this.value.replace(/[^0-9]/g, '');
                                                if (value) {
                                                    value = Number(value).toLocaleString('en-PH');
                                                }
                                                this.value = '₱ ' + value;" required>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-6 form-group">
                                        <h6>Other Skill Requirement</h6>
                                        <input type="text" class="form-control" name="other_skills" id="other_skills"
                                        placeholder="Enter other skill requirement"
                                        oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '');" required>
                                    </div>
                                    <div class="col-6 form-group">
                                        <h6>Job Vacancy</h6>
                                        <input type="number" class="form-control" name="job_vacancy" id="job_vacancy"
                                            placeholder="Enter number of hires"
                                            oninput="this.value=this.value.replace(/[^0-9]/g, '');" required>
                                    </div>
                                </div>


                            </div>

                            <div class="col-6 form-group">
                                <h6>Required Skills</h6>

                                @php
                                    $pesoSkill = \App\Models\JobseekerSkill::all();
                                @endphp

                                <div class="mt-3" id="skill_req">
                                    @foreach ($pesoSkill as $skill)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="skills[]"
                                                id="skill_{{ $skill->id }}" value="{{ $skill->skill_name }}">
                                            <label class="form-check-label" for="skill_{{ $skill->id }}">
                                                {{ $skill->skill_name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="container mb-2">
                            <h6>Job Description:</h6>
                            <textarea class="summernote" name="job_details"></textarea>
                        </div>

                    </div>

                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn text-white"
                    onclick="submit('jobDetailsForm',`{{ route('Agency') }}`)"
                    style="background: linear-gradient(90deg, rgba(77, 7, 99, 1) 0%, rgba(121, 9, 128, 1) 50%, rgba(189, 11, 186, 1) 100%);">Save
                    changes</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        // Initialize Summernote only on the desired elements
        $('.summernote').each(function() {
            $(this).summernote({
                height: 200,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                placeholder: 'Enter Job Description here...',
                callbacks: {
                    onKeydown: function(e) {
                        if ((e.which >= 48 && e.which <= 57) || (e.which >= 96 && e.which <= 105)) { // Block numbers (0-9 and numpad numbers)
                            e.preventDefault();
                        }
                    }
                }
            });
        });
    });
</script>
