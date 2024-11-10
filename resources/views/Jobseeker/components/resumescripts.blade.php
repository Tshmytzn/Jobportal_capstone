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
                document.getElementById('uploadedResume').style.display = 'block';

                // Update filename and link
                document.getElementById('resumeFilename').innerHTML =
                    `<a href="{{ asset('jobseeker_resume/') }}/${response.resume_file}" target="_blank">
                        ${response.resume_file}
                    </a>`;

                // Set iframe src if PDF
                const resumeViewer = document.getElementById('resumeViewer');
                if (response.resume_file.endsWith('.pdf')) {
                    resumeViewer.src = `{{ asset('jobseeker_resume/') }}/${response.resume_file}`;
                    resumeViewer.style.display = 'block';
                } else {
                    resumeViewer.style.display = 'none';
                }

                // Show success message
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

    function printResume() {
        const resumeViewer = document.getElementById('resumeViewer');
        if (resumeViewer && resumeViewer.contentWindow) {
            // Access the document inside the iframe and print it
            resumeViewer.contentWindow.focus();
            resumeViewer.contentWindow.print();
        } else {
            alert('No PDF resume to print.');
        }
    }
    
</script>
