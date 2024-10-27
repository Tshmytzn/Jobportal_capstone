<script>
    function UploadResume() {
        var formData = new FormData(document.getElementById("uploadResumeForm"));

        document.getElementById('loading').style.display = 'grid';

        $.ajax({
            url: "{{ route('uploadResume') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                document.getElementById('loading').style.display = 'none';

                $('#uploadResumeForm')[0].reset();
                $('#Uploadresumemodal').modal('hide');
                document.getElementById('uploadedResume').style.display =
                'block'; // Show the filename container
                document.getElementById('resumeFilename').textContent = response
                .resume_file; // Set the filename


                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500
                });
            },
            error: function(xhr, status, error) {
                document.getElementById('loading').style.display = 'none';

                var errorMessage = xhr.responseJSON.message || 'An unexpected error occurred.';

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: errorMessage,
                    showConfirmButton: true
                });
            }
        });
    }
</script>
