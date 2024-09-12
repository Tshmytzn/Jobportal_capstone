<script>
    function loginAgency() {
        var formElement = document.getElementById('agencyloginform');
        var formData = new FormData(formElement);

        $.ajax({
            type: "POST",
            url: '{{ route('LoginAgency') }}',
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
                        window.location.href = '{{ route('agencydashboard') }}';
                    });
                }
            },
            error: function(xhr) {
                console.error('AJAX Error:', xhr.responseText); // Log the error
                Swal.fire('Error', 'Invalid Credentials.', 'error');
            }
        });
    }
</script>

<script>
    function registerAgency() {

        var formElement = document.getElementById("agencyForm");
        var formData = new FormData(formElement);
        formData.append('_token', '{{ csrf_token() }}'); // Append CSRF token

        // Send the AJAX request
        $.ajax({
            type: "POST",
            url: '{{ route('RegisterAgency') }}',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status === 'error') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Warning',
                        text: response.message,
                    });
                } else {
                    formElement.reset(); // Reset form
                    $('#' + response.modal).modal('hide');
                    Swal.fire({
                        title: 'Success',
                        text: response.message,
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    if (response.reload && typeof window[response.reload] === 'function') {
                        window[response.reload]();
                    }
                    window.location.href = '{{ route('agencylogin') }}';
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while processing your request.',
                });
            }
        });
    }
</script>