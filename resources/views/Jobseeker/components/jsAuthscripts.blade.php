<script>
    function loginJobseeker() {

        document.getElementById('loading').style.display='grid';

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
                    document.getElementById('loading').style.display='none';

                    Swal.fire('Error', response.message, 'error');

                } else {
                    document.getElementById('loading').style.display='none';

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
                document.getElementById('loading').style.display='none';

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


        $('#jobseekerForm').on('submit', function(event) {
            event.preventDefault();
            document.getElementById('loading').style.display='grid';


            $.ajax({
                url: "{{ route('jobseekersCreate') }}",
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    document.getElementById('loading').style.display='none';

                    Swal.fire({
                        title: 'Success',
                        text: response.message,
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1000
                    }).then(() => {

                        document.getElementById('jobseekerForm').reset();
                        window.location.href = "{{ route('login') }}";
                    });
                },

                error: function(xhr) {
                    document.getElementById('loading').style.display='none';
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

<script>
    $(document).ready(function() {
        $('#updateJobseekerInfo').on('submit', function(event) {
            event.preventDefault();

            document.getElementById('loading').style.display = 'grid';


            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        document.getElementById('loading').style.display = 'none';

                        Swal.fire({
                            title: 'Success',
                            text: response.message,
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else {
                        document.getElementById('loading').style.display = 'none';
                        Swal.fire({
                            title: 'Failed',
                            text: 'Update failed. Please try again.',
                            icon: 'error',
                            showConfirmButton: true
                        });
                    }
                },
                error: function(xhr, status, error) {
                    document.getElementById('loading').style.display = 'none';

                    Swal.fire({
                        title: 'Error',
                        text: 'An error occurred: ' + error,
                        icon: 'error',
                        showConfirmButton: true
                    });
                }

            });
        });
    });
</script>

<script>
    document.getElementById('js_changePasswordForm').addEventListener('submit', function(e) {
        e.preventDefault();

        var currentPassword = document.getElementById('js_currentPassword').value;
        var newPassword = document.getElementById('js_newPassword').value;
        var confirmPassword = document.getElementById('js_confirmPassword').value;

        if (newPassword !== confirmPassword) {
            alert('New passwords do not match');
            return;
        }

        $.ajax({
            url: '{{ route('updateJsPassword') }}',
            type: 'POST',
            data: {
                currentPassword: currentPassword,
                newPassword: newPassword,
                newPassword_confirmation: confirmPassword,
                id: '{{ session('user_id') }}',
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                alert(response.success);
                // Clear the form fields after successful update
                document.getElementById('js_changePasswordForm').reset();
            },
            error: function(xhr) {
                var errors = xhr.responseJSON.errors;
                var errorMessages = '';
                if (errors) {
                    for (var key in errors) {
                        errorMessages += errors[key] + '\n';
                    }
                } else {
                    errorMessages = 'Current password is incorrect!';
                }
                alert(errorMessages);
            }
        });
    });
</script>

<!-- Ensure you include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#resumeForm').on('submit', function(event) {
            event.preventDefault();

            let formData = new FormData(this);
            $.ajax({
                url: '{{ route('uploadResume') }}',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    alert(response.success);
                },
                error: function(xhr) {
                    alert(xhr.responseJSON.error);
                }
            });
        });
    });
</script>
