
<script>
    function submit(formID,route){
        
        document.getElementById('loading').style.display='grid';

        var formElement = document.getElementById(formID);
        var formData = new FormData(formElement);

        // Append the CSRF token to the FormData
        formData.append('_token', '{{ csrf_token() }}');

        $.ajax({
            url: route,
            type: "POST",
            data: formData,
            contentType: false, // Important for file uploads
            processData: false, // Important for file uploads
            success: function(response) {
                if(response.status =='success'){
                $('#' + response.modal).modal('hide');
                document.getElementById(response.form).reset()
                document.getElementById('loading').style.display='none';
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
                }else{
                    document.getElementById('loading').style.display='none';
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
            
            console.log(response);

            var cardsContainer = document.getElementById('joblist');
                cardsContainer.innerHTML = '';
            var d = document.getElementById('job_detail');
                if (response.data.length === 0) {
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
                }else {
                    // Iterate through the data array and create card elements
                    d.innerHTML = `
                    <div class="text-center">
                    <h4>No Job Post Selected</h4>
                            <p style="font-size: 15px;">Select a job to view its full details.</p>
                            <img src="{{ asset('img/unDraw_select-option_w7yy45h.svg') }}"
                                style="height: 250px; width: auto;" alt="">
                                </div>`;
                    response.data.forEach(function(item, index) {
                        var maxLength = 15; // Set the desired maximum length for the description

                        // Truncate the job description if it's too long
                        var truncatedDescription = item.job_description.length > maxLength
                        ? item.job_description.substring(0, maxLength) + '...'
                        : item.job_description;

                        var cardHtml = `
                        <div class="list-group-item list-group-item-action custom-hover" onclick="display('get','${item.id}','${item.job_title}','${item.job_description}','${item.job_location}','${item.job_type}','${item.name}','${item.category_id}')">
                                <div class="row align-items-center">
                                    <!-- Image Column -->
                                    <div class="col-4">
                                            <span class="avatar" style=" width: 100%;">
                                                <img src="{{ asset('agencyfiles/job_image/${item.job_image}') }}" alt="">
                                            </span>
                                    </div>
                                    <!-- Job Details Column -->
                                    <div class="col-8">
                                         <h5 class="card-title">${item.job_title}</h5>
                                        <div class="d-block text-secondary mt-n1 text-truncate">
                                           ${truncatedDescription}
                                        </div>
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

function display(process,id,title,description,location,type,cat_name,cat_id){
 var cardsContainer = document.getElementById('job_detail');
if(process=='get'){
        cardsContainer.innerHTML = `
             <div class="row">
                <div class="col text-start">
                <button class="btn btn-secondary btn-sm" type="button" onclick="display('edit','${id}','${title}','${description}','${location}','${type}','${cat_name}','${cat_id}')">Update</button>
              </div>
              <div class="col text-end">
                <button class="btn btn-primary btn-sm" type="button" onclick="deletejobdetails('${id}')">Delete</button>
              </div>
            </div>
            <br>
            <div class="row mb-3">
            <div class="col-md-6">
                <h5 class="card-title">${title}</h5>
                <p class="card-text">${description}</p>
            </div>
            <div class="col-md-6">
                <h5 class="card-title">Key Details</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Location: </strong>${location}</li>
                    <li class="list-group-item"><strong>Category: </strong>${cat_name}</li>
                    <li class="list-group-item"><strong>Job Type: </strong>${type}</li>
                </ul>
            </div>
            </div>
        `;
}else if(process=='edit'){
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
                                        <option ${cat_id=="{{$cat->id}}"?'selected':''} value="{{$cat->id}}">{{$cat->name}}</option>
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
                            <div class="col-12 form-group">
                                <input type="file" class="form-control" name="job_image" id="" placeholder="Image.....">
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
   function deletejobdetails(id){
    document.getElementById('jobid').value=id
    submit('deletejobdetail',"{{ route('Agency') }}")
   }
    $(document).ready(function() {
        getJobDetails()  
    });
</script>