<script>
    function SubmitContact(formID) {

        var formElement = document.getElementById(formID);
        var formData = new FormData(formElement);

        formData.append('_token', '{{ csrf_token() }}');

        $.ajax({
            type: "POST",
            url: '{{ route('SaveContact') }}',
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
                        window.location.href = '{{ route('homepage') }}';
                    });
                }
            },
            error: function(xhr) {
                console.error('AJAX Error:', xhr.responseText);
                Swal.fire('Error', 'An error occurred while submitting the form. Please try again.', 'error');
            }
        });
    }
</script>
