<script>
    function updateAgency() {
        var formData = $("#updateAdminForm").serialize();

        $.ajax({
            url: "{{ route('UpdateAdmin') }}",
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
                    $('#admin_name').val(response.data.admin_name);
                    $('#admin_mobile').val(response.data.admin_mobile);
                    $('#admin_email').val(response.data.admin_email);
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