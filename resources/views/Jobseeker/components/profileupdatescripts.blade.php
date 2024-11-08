<script>
        function previewImage(event) {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function() {
            const image = document.getElementById('image-preview');
            const submitBtn = document.getElementById('submit-btn');
            image.src = reader.result;
            image.style.display = 'block'; // Show the image after upload
            submitBtn.style.display = 'inline-block'; // Show the submit button
        };

        if (file) {
            reader.readAsDataURL(file); // Read the file as a data URL
        }
    }

    // AJAX Request to submit form data
    $(document).ready(function() {
        $('#submit-btn').click(function(e) {
            e.preventDefault();

            // Create FormData object
            let formData = new FormData();
            formData.append('_token', $('input[name=_token]').val()); 
            formData.append('image', $('#file-upload')[0].files[0]);

            // Add jobseekerId to formData
            formData.append('jobseekerId', $('#jobseekerId').val()); 

            // Send AJAX request
            $.ajax({
                url: "{{ route('UpdateJobseekerProfilePic') }}", 
                type: "POST",
                data: formData,
                processData: false, 
                contentType: false, 
                success: function(response) {

                    $('#submit-btn').hide();

                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    });

                    setTimeout(function() {
                        $('#jobseekerProfileImage').attr('src', '/jobseeker_profile/' + response.jobseeker_profile);
                        var modalElement = document.getElementById('UpdateProfilePic');
                        var modal = bootstrap.Modal.getInstance(modalElement);
                        if (modal) {
                            modal.hide(); 
                        }
                        $('#UploadProfileForm')[0].reset(); 

                    }, 1500);
                },
                error: function(xhr, status, error) {

                    $('#submit-btn').prop('disabled', false);

                    var errors = xhr.responseJSON.errors;
                    var errorMessage = '';

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
        });
    });
</script>