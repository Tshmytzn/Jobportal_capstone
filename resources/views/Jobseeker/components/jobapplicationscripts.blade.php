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
        var formData = new FormData(formElement);
        formData.append('_token', '{{ csrf_token() }}');

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
</script>
