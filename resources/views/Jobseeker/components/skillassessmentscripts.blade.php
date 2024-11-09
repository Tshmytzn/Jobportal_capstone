<script>
    function submitAssessment() {
        // document.getElementById('loading').style.display = 'grid';

        var formElement = document.getElementById('assessmentForm');
        var formData = new FormData(formElement);

        $.ajax({
            type: "POST",
            url: '{{ route('submitassessment') }}',
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
                        timer: 1000
                    }).then(() => {
                        window.location.href = '{{ route('homepage') }}';
                    });
                }
            },
            error: function(xhr) {
                document.getElementById('loading').style.display = 'none';

                console.error('AJAX Error:', xhr.responseText);
                Swal.fire('Error', 'An error occurred while submitting the assessment.', 'error');
            }
        });
    }
</script>

{{--  --}}