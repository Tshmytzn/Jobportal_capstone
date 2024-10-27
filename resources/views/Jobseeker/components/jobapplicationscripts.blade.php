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

                console.error('AJAX Error:', xhr.status, xhr.statusText);
                console.error('Response Text:', xhr.responseText);

                let errorMessage = 'Oops! Something went wrong while processing your request. Please try again later.';
                try {
                    const jsonResponse = JSON.parse(xhr.responseText);
                    errorMessage = jsonResponse.message || errorMessage;
                } catch (e) {
                    console.error('Error parsing JSON:', e);
                }

                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: errorMessage,
                    confirmButtonText: 'OK'
                });
            }
        });
    }
</script>
