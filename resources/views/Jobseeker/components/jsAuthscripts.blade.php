<script>
    function loginJobseeker() {
        var formElement = document.getElementById('jobseekerloginform');
        var formData = new FormData(formElement);

        $.ajax({
            type: "POST",
            url: '{{ route('LoginJobseeker') }}',
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
                Swal.fire('Error', 'Invalid Credentials.', 'error');
            }
        });
    }
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {

        $('input[name="firstname"], input[name="midname"], input[name="lastname"], input[name="suffix"]').on(
            'input',
            function(e) {
                this.value = this.value.replace(/[^A-Za-z\s-]/g, '');
            });

        $('input[name="contact"]').on('input', function(e) {
            this.value = this.value.replace(/\D/g, '');
            if (this.value.length > 9) {
                this.value = this.value.slice(0, 9);
            }
        });

        $('#jobseekerForm').on('submit', function(event) {
            event.preventDefault();

            $.ajax({
                url: "{{ route('jobseekersCreate') }}",
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        title: 'Success',
                        text: response.message,
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('login') }}";
                        }
                    });
                },
                error: function(xhr) {
                    var errors = xhr.responseJSON.errors;
                    var errorMessages = '';
                    $.each(errors, function(key, value) {
                        errorMessages += value[0] + '<br>';
                    });

                    Swal.fire({
                        title: 'Error!',
                        html: errorMessages,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    });
</script>
