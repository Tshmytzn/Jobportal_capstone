<script>
    function loginAdmin() {
        var formElement = document.getElementById('adminLoginForm');
        var formData = new FormData(formElement);

        $.ajax({
            type: "POST",
            url: '{{ route('LoginAdmin') }}',
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
                        window.location.href = '{{ route('dashboard') }}';
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
