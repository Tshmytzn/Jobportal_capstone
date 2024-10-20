<script>
    function SubmitContact(formID) {

        var formElement = document.getElementById(formID);
        var formData = new FormData(formElement);

        formData.append('_token', '{{ csrf_token() }}');

        document.getElementById('loading').style.display = 'grid';


        $.ajax({
            type: "POST",
            url: '{{ route('SaveContact') }}',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                document.getElementById('loading').style.display = 'none';

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
                        $('#contactform')[0].reset();

                        window.location.href = '{{ route('homepage') }}';
                    });
                }
            },
            error: function(xhr) {
                document.getElementById('loading').style.display = 'none';

                // Display specific error details
                console.error('AJAX Error:', xhr.status, xhr.statusText);
                console.error('Response Text:', xhr.responseText);

                // Optionally, you can parse the response if it's JSON
                let errorMessage = 'An error occurred while submitting the form. Please try again.';
                try {
                    const jsonResponse = JSON.parse(xhr.responseText);
                    errorMessage = jsonResponse.message ||
                    errorMessage; // Use a custom message if available
                } catch (e) {
                    console.error('Error parsing JSON:', e);
                }

                Swal.fire('Error', errorMessage, 'error');
            }
        });
    }
</script>
