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
                }).then(() => {
                    $('#agency_name').val(response.data.agency_name);
                    $('#email_address').val(response.data.email_address);
                    $('#agency_address').val(response.data.agency_address);
                    $('#contact_number').val(response.data.contact_number);
                    $('#landline_number').val(response.data.landline_number);
                    $('#geo_coverage').val(response.data.geo_coverage);
                    $('#employee_count').val(response.data.employee_count);
                });
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
                }).then(() => {
                    $('#updatePasswordForm')[0].reset();
                });
            },
            error: function(xhr) {
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
