<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function updateAgency() {
        var formData = $("#updateAgencyForm").serialize();

        $.ajax({
            url: "{{ route('UpdateAgency') }}",
            type: "POST",
            data: formData,
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500
                });

                setTimeout(function() {
                    $('#agencyProfileName').text(response.agency_name);
                    $('#agency_name').val(response.data.agency_name);
                    $('#email_address').val(response.data.email_address);
                    $('#agency_address').val(response.data.agency_address);
                    $('#contact_number').val(response.data.contact_number);
                    $('#landline_number').val(response.data.landline_number);
                    $('#geo_coverage').val(response.data.geo_coverage);
                    $('#employee_count').val(response.data.employee_count);
                }, 1500);
            },
            error: function(xhr, status, error) {
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
    }
</script>

<script>
    function updatePassword() {
        var formData = $("#updatePasswordForm").serialize();

        $.ajax({
            url: "{{ route('UpdatePassword') }}",
            type: "POST",
            data: formData,
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500
                });

                $('#new_password').val('');
                $('#new_password_confirmation').val('');
            },
            error: function(xhr, status, error) {
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
    }
</script>

<script>
    function updateProfilePic() {
        var formData = new FormData(document.getElementById("updateProfilePicForm"));
        console.log(formData)
        $.ajax({
            url: "{{ route('UpdateAgencyProfilePic') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500
                });

                setTimeout(function() {
                    $('#AgencyProfileImage').attr('src', '/agency_profile/' + response.agency_profile);
                    var modalElement = document.getElementById('UpdateProfilePic');
                    var modal = bootstrap.Modal.getInstance(modalElement);
                    if (modal) {
                        modal.hide();
                    }
                    $('#updateProfilePicForm')[0].reset();
                }, 1500);
            },
            error: function(xhr, status, error) {
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
    }
</script>
