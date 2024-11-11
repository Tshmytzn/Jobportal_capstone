<script>
    function qualifyjobseeker(formID) {
        var formElement = document.getElementById(formID); 
        var formData = new FormData(formElement);
        console.log(formData); 
        formData.append('_token', '{{ csrf_token() }}'); 

        $.ajax({
            type: "POST",
            url: '{{ route('qualifyjobseeker') }}',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {

                if (response.status === 'error') {
                    Swal.fire('Error', response.message, 'error');
                } else {
                    Swal.fire({
                        title: 'Success',
                        text: response.message,
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href = '{{ route('submittedapplications') }}';
                    });
                }
            },
            error: function(xhr) {

                console.error('AJAX Error:', xhr.status, xhr.statusText);
                console.error('Response Text:', xhr.responseText);

                let errorMessage = 'An error occurred while submitting the form. Please try again.';
                try {
                    const jsonResponse = JSON.parse(xhr.responseText);
                    errorMessage = jsonResponse.message || errorMessage;
                } catch (e) {
                    console.error('Error parsing JSON:', e);
                }

                Swal.fire('Error', errorMessage, 'error');
            }
        });
    }
</script>

<script>
    function disqualifyJobseeker() {

        var applicationId = document.getElementById('applicationId').value; 

        if (!applicationId) {
            Swal.fire('Error', 'Application ID not found.', 'error');
            return;
        }

        $.ajax({
            type: "POST",
            url: '{{ route('disqualifyJobseeker') }}',  
            data: {
                _token: '{{ csrf_token() }}',
                applicationId: applicationId,  
                status: 'rejected'  
            },
            success: function(response) {

                if (response.status === 'error') {
                    Swal.fire('Error', response.message, 'error');
                } else {
                    Swal.fire({
                        title: 'Success',
                        text: response.message,
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {

                        window.location.reload();  
                    });
                }
            },
            error: function(xhr) {
                console.error('AJAX Error:', xhr.status, xhr.statusText);
                Swal.fire('Error', 'An error occurred while rejecting the application.', 'error');
            }
        });
    }
</script>

