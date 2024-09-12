<script>
    function UpdateAdmin() {
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
                });

                setTimeout(function() {
                    $('#adminProfileName').text(response.admin_name);
                    var myModal = bootstrap.Modal.getInstance(document.getElementById(
                        'UpdateProfilePic'));
                    myModal.hide();
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

<script>
    function UpdateAdminPassword() {
        var formData = $("#updateAdminpasswordForm").serialize();

        $.ajax({
            url: "{{ route('UpdateAdminPassword') }}",
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

        $.ajax({
            url: "{{ route('UpdateAdminProfilePic') }}",
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
                    $('#adminProfileImage').attr('src', '/admin_profile/' + response.admin_profile);
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

<script>
    $(document).ready(function() {

        $('#adminFullName').on('input', function() {
            const nameValue = $(this).val();
            const validName = /^[a-zA-Z\s]*$/;
            if (!validName.test(nameValue)) {
                alert('Name can only contain letters and spaces.');
                $(this).val(nameValue.replace(/[^a-zA-Z\s]/g, ''));
            }
        });

        $('#adminMobile').on('input', function() {
            const mobileValue = $(this).val();
            const validNumber = /^[0-9]*$/;
            if (!validNumber.test(mobileValue) || mobileValue.length > 10) {
                alert('Mobile number can only contain digits and must be 10 digits long.');
                $(this).val(mobileValue.replace(/[^0-9]/g, '').slice(0, 10));
            }
        });

        $('#adminEmail').on('blur', function() {
            const emailValue = $(this).val();
            const validEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            if (!validEmail.test(emailValue)) {
                alert('Please enter a valid email address.');
                $(this).val('');
            }
        });

        $('#adminConfirmPassword').on('input', function() {
            const password = $('#adminPassword').val();
            const confirmPassword = $(this).val();
            if (password !== confirmPassword) {
                this.setCustomValidity('Passwords do not match');
            } else {
                this.setCustomValidity('');
            }
        });

        $('#submitAdminForm').on('click', function(event) {
            event.preventDefault();

            const formData = {
                name: $('#adminFullName').val(),
                contact_number: $('#adminMobile').val(),
                email: $('#adminEmail').val(),
                password: $('#adminPassword').val(),
                password_confirmation: $('#adminConfirmPassword').val()
            };

            if (formData.password !== formData.password_confirmation) {
                alert('Passwords do not match!');
                return;
            }

            fetch('{{ route('createAdmin') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    body: JSON.stringify(formData)
                })
                .then(response => {
                    const contentType = response.headers.get("content-type");
                    if (contentType && contentType.includes("application/json")) {
                        return response.json();
                    } else {
                        return response.text().then(text => {
                            throw new Error(text);
                        });
                    }
                })
                .then(data => {
                    if (data.success) {
                        alert('Admin created successfully.');

                        $('#adminForm')[0].reset();

                        const modal = new bootstrap.Modal(document.getElementById(
                            'addNewAdminModal'));
                        modal.hide();

                        location.reload();
                    } else {
                        alert('Error creating admin: ' + data.error);
                    }
                })
                .catch((error) => {
                    console.error('Error:', error);
                    alert('An error occurred: ' + error.message);
                });
        });
    });
</script>

<script>
    $(document).ready(function() {

        $('.editAdminBtn').on('click', function() {

            const adminId = $(this).data('id');
            const adminName = $(this).data('name');
            const adminEmail = $(this).data('email');
            const adminMobile = $(this).data('mobile');

            $('#newAdminFullName').val(adminName);
            $('#newAdminEmail').val(adminEmail);
            $('#newAdminMobile').val(adminMobile);

            $('#editadminForm').attr('action', `/admin/update/${adminId}`);
        });
    });
</script>

