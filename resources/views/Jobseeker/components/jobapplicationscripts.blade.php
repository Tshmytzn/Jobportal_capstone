<script>
    document.getElementById('applyButton').addEventListener('click', function(event) {
        const isLoggedIn = {{ session()->has('user_id') ? 'true' : 'false' }};
        const userId = {{ session('user_id') ?? 'null' }};

        if (!isLoggedIn) {
            event.preventDefault();
            $('#loginPromptModal').modal('show');
        } else {
            document.getElementById('userIdInput').value = userId;
            $('#applicationmodal').modal('show');
        }
    });
</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
<script>
    $(document).ready(function() {
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
    });
</script>


<script>
    function SubmitJobApplication() {
        var formElement = document.getElementById('jobApplicationForm');

        // Check if all required fields are filled
        var requiredFields = formElement.querySelectorAll('[required]');
        var allFilled = true;
        var emptyFields = [];

        requiredFields.forEach(function(field) {
            if (!field.value.trim()) {
                allFilled = false;
                emptyFields.push(field.name || field.id);
            }
        });

        if (typeof jsResume === 'undefined' || !jsResume) {
            allFilled = false;
            emptyFields.push('Resume');
        }

        // If there are empty fields, show a warning and prevent submission
        if (!allFilled) {
            Swal.fire({
                icon: 'warning',
                title: 'Incomplete Submission',
                text: 'Please fill in all required fields, including uploading your resume.',
            });
            return; // Prevent form submission
        }

        var formData = new FormData(document.getElementById('jobApplicationForm'));
        formData.append('_token', '{{ csrf_token() }}');

        if (typeof jsResume !== 'undefined' && jsResume) {
            formData.append('js_resume', jsResume);
        } else {
            formData.append('js_resume', ''); 
        }

        document.getElementById('loading').style.display = 'grid';

        $.ajax({
            type: "POST",
            url: '{{ route('job.application.submit') }}',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                document.getElementById('loading').style.display = 'none';

                $('#jobApplicationForm')[0].reset();
                $('#applicationmodal').modal('hide');

                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.success,
                    confirmButtonText: 'OK'
                });
            },
            error: function(xhr) {
                document.getElementById('loading').style.display = 'none';

                if (xhr.status === 422) { // Validation error
                    let errors = xhr.responseJSON.errors;
                    let message = xhr.responseJSON.message;

                    if (message === 'Please fill in all required fields.') {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Incomplete Submission',
                            text: message,
                        });
                    } else {
                        // Display individual validation errors in a list using Swal2
                        let errorMessages = '<ul>';
                        $.each(errors, function(key, value) {
                            errorMessages += `<li>${value[0]}</li>`;
                        });
                        errorMessages += '</ul>';

                        Swal.fire({
                            icon: 'error',
                            title: 'Validation Errors',
                            html: errorMessages, // Render HTML for the list of errors
                        });
                    }
                } else if (xhr.status === 409) { // Application already exists
                    Swal.fire({
                        icon: 'info',
                        title: 'Duplicate Application',
                        text: xhr.responseJSON.message,
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops!',
                        text: 'An error occurred. Please try again.',
                    });
                }
            }
        });
    }
const urlParams = new URLSearchParams(window.location.search);

// Retrieve a specific parameter by name
let id = urlParams.get('id'); 
let count = 1;
function LoadAssessmentTest() {
    $.ajax({
        url: `{{ route('LoadTestAssessment') }}?id=` + id,  // Blade syntax for the route and id
        method: 'GET',  // HTTP method
        dataType: 'json',  // Expected data type from the server
        success: function(response) {
            const body = document.getElementById('assessmentModalBody');
            body.innerHTML = '<input type="text" name="assId" id="assId" hidden>';  // Clear any existing content
            let assId = ''
            response.data.forEach(element => {
                assId = element.id;
                // Create the question container
                const questionDiv = document.createElement("div");
                questionDiv.classList.add("col-12", "p-2");
                questionDiv.id = element.question_id;

                // Create the input field
                const inputField = document.createElement("input");
                inputField.type = "text";
                inputField.classList.add("form-control");
                inputField.value = element.question;
                inputField.readOnly = true;

                const inputField2 = document.createElement("input");
                inputField2.type = "text";
                inputField2.classList.add("form-control");
                inputField2.value = element.question_id;
                inputField2.name = `question_id[${count}][]`
                inputField2.readOnly = true;
                inputField2.hidden = true;

                // Append the input field to the question container
                questionDiv.appendChild(inputField);
                questionDiv.appendChild(inputField2);
                // Create and append the answers
                element.answer.forEach((item, index) => {
                    const formCheckDiv = document.createElement("div");
                    formCheckDiv.classList.add("form-check");

                    const radioInput = document.createElement("input");
                    radioInput.classList.add("form-check-input");
                    radioInput.type = "radio";
                    radioInput.name = `flexRadioDefault[${count}][]`;
                    radioInput.id = `flexRadioDefault${count}_${index}`;
                    radioInput.value = item.status  // Unique ID

                    const label = document.createElement("label");
                    label.classList.add("form-check-label");
                    label.htmlFor = `flexRadioDefault${count}_${index}`;
                    label.textContent = item.answer;

                    formCheckDiv.appendChild(radioInput);
                    formCheckDiv.appendChild(label);

                    questionDiv.appendChild(formCheckDiv);
                });

                // Append the question container to the body
                body.appendChild(questionDiv);

                count++;  // Increment count for each question
            });
            document.getElementById('assId').value=assId
        },
        error: function(xhr, status, error) {
            // Code to run if there's an error
            console.error("Error:", error);
        }
    });
}
function submitAsessmentTestForm(){
    const form = document.getElementById("submitAssessmentForm");
    const formData = new FormData(form);
    for (let [key, value] of formData.entries()) {
    console.log(`${key}: ${value}`);
}
formData.append('_token', '{{ csrf_token() }}');
$.ajax({
        url: `{{route('SubmitAssessmentTest')}}`, // The URL to which the request will be sent
        type: 'POST', // The type of request
        data: formData, // Pass the FormData object
        processData: false, // Prevent jQuery from automatically transforming the data into a query string
        contentType: false, // Let the browser set the content type (for file uploads)
        success: function(response) {
            Swal.fire({
                    icon: "success",
                    title: "Test SuccessFully Submited",
                    showConfirmButton: false,
                    timer: 1500
                    });
            location.reload();
        },
             error: function(xhr, status, error) {
            // This function is executed if there is an error in the request
            console.error('Error:', error);
            // You can handle the error here
        }
    });

}
$(document).ready(function() {
LoadAssessmentTest();
});
</script>
