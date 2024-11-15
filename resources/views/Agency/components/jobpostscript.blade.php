<script>
    function submit(formID, route) {

        document.getElementById('loading').style.display = 'grid';

        var formElement = document.getElementById(formID);
        var formData = new FormData(formElement);

        document.querySelectorAll('input[name="skills[]"]:checked').forEach((checkbox) => {
            formData.append('skills[]', checkbox.value);
        });

        formData.forEach((value, key) => {
    console.log(`${key}: ${value}`);
});

        // Append the CSRF token to the FormData
        formData.append('_token', '{{ csrf_token() }}');

        $.ajax({
            url: route,
            type: "POST",
            data: formData,
            contentType: false, // Important for file uploads
            processData: false, // Important for file uploads
            success: function(response) {
                if (response.status == 'success') {
                    $('#' + response.modal).modal('hide');
                    document.getElementById(response.form).reset()
                    document.getElementById('loading').style.display = 'none';
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        if (response.reload && typeof window[response.reload] === 'function') {
                            window[response.reload](); // Safe dynamic function call
                        }
                    });
                } else {
                    document.getElementById('loading').style.display = 'none';
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {

                    });
                }
            },
            error: function(xhr, status, error) {
                var errors = xhr.responseText;
                var errorMessage = '';
                console.log(error)
                $.each(errors, function(key, value) {
                    errorMessage += value + '<br>';
                });

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: errorMessage,
                    showConfirmButton: true
                });
            }
        });
    }

    function getJobDetails() {
        var formData = new FormData();
        formData.append('process', 'get');
        formData.append('_token', '{{ csrf_token() }}');

        $.ajax({
            url: "{{ route('Agency') }}",
            method: 'POST',
            dataType: 'json',
            data: formData,
            contentType: false, // Disable setting content type for FormData
            processData: false,
            success: function(response) {
                var cardsContainer = document.getElementById('joblist');
                cardsContainer.innerHTML = '';
                var d = document.getElementById('job_detail');
                d.innerHTML = ``;
                if (response.data.length === 0) {
                    d.innerHTML = `
                    <div class="text-center">
                    <h4>No Job Post Selected</h4>
                            <p style="font-size: 15px;">Select a job to view its full details.</p>
                            <img src="{{ asset('img/unDraw_select-option_w7yy45h.svg') }}"
                                style="height: 250px; width: auto;" alt="">
                                </div>`;
                    cardsContainer.innerHTML = `
                    <div class="list-group-item list-group-item-action custom-hover">
                                <div class="row align-items-center">
                                    <!-- Image Column -->
                                    <div class="col-4">
                                        <a href="#">
                                            <span class="avatar" style=" width: 100%;">
                                                <img src="{{ asset('img/no-data.jpg') }}" alt="">
                                            </span> </a>
                                    </div>
                                    <!-- Job Details Column -->
                                    <div class="col-8">
                                        <a href="#" class="text-reset d-block fw-bold">No Data Found</a>
                                        <div class="d-block text-secondary mt-n1 text-truncate">
                                           ........
                                        </div>
                                    </div>
                                </div>
                            </div>
                    `;
                } else {
                    // Iterate through the data array and create card elements
                    d.innerHTML = `
                    <div class="text-center">
                    <h4>No Job Post Selected</h4>
                            <p style="font-size: 15px;">Select a job to view its full details.</p>
                            <img src="{{ asset('img/unDraw_select-option_w7yy45h.svg') }}"
                                style="height: 250px; width: auto;" alt="">
                                </div>`;
                    response.data.forEach(function(item, index) {
                        console.log(item)
                        var maxLength = 15; // Set the desired maximum length for the description

                        // Truncate the job description if it's too long
                        var truncatedDescription = item.job_description.length > maxLength ?
                            item.job_description.substring(0, maxLength) + '...' :
                            item.job_description;

                        var cardHtml = `
                        <div class="list-group-item list-group-item-action custom-hover" onclick="display('get','${item.id}','${item.job_title}','${item.job_description}','${item.job_location}','${item.job_type}','${item.name}','${item.category_id}','${item.skills_required}','${item.job_salary}','${item.job_vacancy}','${item.salary_frequency}','${item.skill_required}','${item.other_skills}')">
                                <div class="row align-items-center">
                                    <!-- Image Column -->
                                    <div class="col-4">
                                        <span class="avatar" style="width: 100%; height: 80px; overflow: hidden;">
                                            <img src="{{ asset('agencyfiles/job_image/${item.job_image}') }}" alt="" style="width: 100%; height: auto; object-fit: cover;">
                                        </span>
                                    </div>

                                    <!-- Job Details Column -->
                                    <div class="col-8">
                                         <h5 class="card-title">${item.job_title}</h5>
                                        <div class="d-block text-secondary mt-n1 text-truncate">
                                           ${truncatedDescription}
                                        </div>
                                        <span class="text-primary">Status : ${item.job_status}</span>
                                    </div>
                                </div>
                            </div>
                        `;
                        cardsContainer.innerHTML += cardHtml;
                    });
                }


            },
            error: function(xhr, textStatus, errorThrown) {
                console.log("Error: " + textStatus + " - " + errorThrown);
                console.log(xhr.responseText); // Uncommented for better debugging
            }
        });
    }

    function display(process, id, title, description, location, type, cat_name, cat_id, skill,salary,vacancy,frequency,required,other) {
        
        var cardsContainer = document.getElementById('job_detail');
        if (process == 'get') {
            let data = skill;
            let uniqueDataArray = [...new Set(data.split(","))];
            let formattedData = uniqueDataArray.join("<br>");
            cardsContainer.innerHTML = `
             <div class="row">
                <div class="card mb-4 border-light shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="card-title">${title}</h3>
                            <div>
                                <button class="btn btn-sm text-white" style="background: linear-gradient(90deg, rgba(77, 7, 99, 1) 0%, rgba(121, 9, 128, 1) 50%, rgba(189, 11, 186, 1) 100%);" type="button" onclick="display('edit','${id}','${title}','${description}','${location}','${type}','${cat_name}','${cat_id}','${skill}','${salary}','${vacancy}','${frequency}','${required}','${other}')">Update</button>
                                <button class="btn btn-sm btn-danger" type="button" onclick="deletejobdetails('${id}')">Disable</button>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <p class="text-muted">${description}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h6 class="text-primary">Job Details</h6>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item p-1"><strong>Location:</strong> ${location}</li>
                                    <li class="list-group-item p-1"><strong>Category:</strong> ${cat_name}</li>
                                    <li class="list-group-item p-1"><strong>Job Type:</strong> ${type}</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6 class="text-primary">Required Skills</h6>
                                <ul class="list-inline">
                    ${formattedData == 'null' || formattedData.trim() === '' ? 'No Specific Skills Required.' : formattedData}
                                </ul>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h6 class="text-primary">Job Vacancy</h6>
                                <ul class="list-inline">
                                    ${vacancy}
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6 class="text-primary">Job Salary</h6>
                                <ul class="list-inline">
                                    ${salary}
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        `;
        } else if (process == 'edit') {
            cardsContainer.innerHTML = `
     <form id="updatejobDetailsForm" method="POST" enctype="multipart/form-data">
        @csrf
                            <div class="row">
                                <div class="col-6 form-group">
                                    <h6>Job Title</h6>
                                    <input type="text" name="process" id="" value="update" hidden>
                                    <input type="text" name="id" id="" value="${id}" hidden>
                                    <input type="text" class="form-control" name="job_title" id="" placeholder="Construction....." value="${title}">
                                </div>
                                <div class="col-6 form-group">
                                    <h6>Job Location</h6>
                                    <input type="text" class="form-control" name="job_location" id="" placeholder="Bacolod....." value="${location}">
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-6 form-group">
                                <h6>Job Category</h6>
                                 @php
                                     $category = App\Models\JobCategory::all();
                                 @endphp
                                <select class="form-select" name="job_category"  id="" value="">
                                    <!-- You can manually add static options here -->
                                    @foreach ($category as $cat)
                                        <option ${cat_id=="{{ $cat->id }}"?'selected':''} value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-6 form-group">
                                <h6>Employment Type</h6>
                                <select class="form-select" name="job_type" id="">
                                    <option ${type=='Full Time'?'selected':''} value="Full Time">Full Time</option>
                                    <option ${type=='Part Time'?'selected':''} value="Part Time">Part Time</option>
                                </select>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <h6>Job Image</h6>
                                    <input type="file" class="form-control" name="job_image" id="job_image"
                                        placeholder="Image.....">
                                                                        <div class="row mt-3">
                                    <div class="col-12 form-group">
                                        <h6>Job Vacancy</h6>
                                        <input type="number" class="form-control" name="job_vacancy" id="job_vacancy"
                                            placeholder="Enter number of hires" value="${vacancy}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 form-group">
                                        <h6>Other Skill Requirement</h6>
                                        <input type="text" class="form-control" name="other_skills" id="other_skills"
                                            placeholder="Enter other skill requirement" value="${other}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6 form-group">
                                        <h6>Job Salary</h6>
                                        <input type="text" class="form-control" name="salary" id="salary"
                                            placeholder="Enter other skill requirement" value="${salary}">
                                    </div>
                                    <div class="col-6 form-group">
                                        <h6>Salary Frequency</h6>
                                            <select class="form-select" name="frequency" id="salary_frequency" required>
                                                <option value="monthly" ${ frequency === 'monthly' ? 'selected' : '' }>Monthly</option>
                                                <option value="fortnight" ${ frequency === 'fortnight' ? 'selected' : '' }>Fortnight</option>
                                                <option value="daily" ${ frequency === 'daily' ? 'selected' : '' }>Daily</option>
                                            </select>

                                    </div>
                                </div>

                                </div>

                                <div class="col-6 form-group">
                                    <h6>Required Skills</h6>

                                    @php
                                        $pesoSkill = \App\Models\JobseekerSkill::all();
                                    @endphp

                                    <div id="skill_req">
                                        @foreach ($pesoSkill as $skill)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="skills[]" id="skill_{{ $skill->id }}" value="{{ $skill->skill_name }}">
                                                <label class="form-check-label" for="skill_{{ $skill->id }}">
                                                    {{ $skill->skill_name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="container mb-2">
                            <h6>Description:</h6>
                            <textarea id="job_details" class="summernote" name="job_details">${description}</textarea>
                            </div>
                            </form>
                             <div class="container mb-2">
                            <button type="button"
                            class="btn w-100 d-flex align-items-center justify-content-center text-white"
                            onclick='submit("updatejobDetailsForm", "{{ route('Agency') }}")'
                            style="background: linear-gradient(90deg, rgba(77, 7, 99, 1) 0%, rgba(121, 9, 128, 1) 50%, rgba(189, 11, 186, 1) 100%);">
                            Update
                            </button>
                            </div>
     `;

            $('.summernote').summernote({
                height: 200,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                placeholder: 'Start typing here...'
            });

        }
    }

    function deletejobdetails(id) {
        // Set the job ID in a hidden form input
        document.getElementById('jobid').value = id;

        // Show SweetAlert2 confirmation dialog
        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to disable this job post.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33', // Red color for confirmation
            cancelButtonColor: '#3085d6', // Blue color for cancel
            confirmButtonText: 'Yes, disable it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // If the user confirmed, submit the form
                submit('deletejobdetail', "{{ route('Agency') }}");
            }
        });
    }

    $(document).ready(function() {
        getJobDetails()
    });
</script>
