<script>
    $(document).ready(function() {
        $('#Admin_tbl').DataTable({
            processing: true,
            serverSide: false,
            destroy: true,
            ajax: {
                url: "{{ route('getAdminData') }}",
                type: 'GET',
                dataSrc: 'data',
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'admin_name',
                    name: 'admin_name'
                },
                {
                    data: 'admin_email',
                    name: 'admin_email'
                },
                {
                    data: 'admin_mobile',
                    name: 'admin_mobile'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return `
                    <button class="btn btn-sm bgp-table edit-btn text-center" data-bs-toggle="modal" data-bs-target="#editAdminModal" data-id="${row.id}">Edit</button>
                    <button class="btn btn-sm btn-danger delete-btn text-center" data-id="${row.id}">Delete</button>

                `;
                    }
                }
            ]
        });

        $('#editAdminModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var adminId = button.data('id');

            var modal = $(this);


            $.ajax({
                url: '/admin/get/' + adminId,
                type: 'GET',
                success: function(response) {

                    modal.find('#adminId').val(response.id);
                    modal.find('#newAdminFullName').val(response.admin_name);
                    modal.find('#newAdminMobile').val(response.admin_mobile);
                    modal.find('#newAdminEmail').val(response.admin_email);
                },
                error: function(error) {
                    console.log(error);
                    alert('Failed to fetch admin data');
                }
            });
        });
    });

    $(document).on('click', '.delete-btn', function() {
        var id = $(this).data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/Admin/Delete/' + id,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire(
                            'Deleted!',
                            response.message,
                            'success'
                        );
                        $('#Admin_tbl').DataTable().ajax.reload();
                    },
                    error: function(xhr) {
                        Swal.fire(
                            'Oops...',
                            'Something went wrong!',
                            'error'
                        );
                    }
                });
            }
        });
    });
</script>


<script>
    function UpdateAdmin() {
        var form = document.getElementById('editadmindetailsForm');
        var formData = new FormData(form);

        $.ajax({
            url: '/Admin/EditAdministrators',
            type: 'POST',
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
                    var modalElement = document.getElementById('editAdminModal');
                    var modal = bootstrap.Modal.getInstance(modalElement);
                    if (modal) {
                        modal.hide();
                    }
                    $('#Admin_tbl').DataTable().ajax.reload();
                    $('#editadmindetailsForm')[0].reset();
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
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Name',
                    text: 'Name can only contain letters and spaces.'
                });
                $(this).val(nameValue.replace(/[^a-zA-Z\s]/g, ''));
            }
        });

        $('#adminMobile').on('input', function() {
            const mobileValue = $(this).val();
            const validNumber = /^[0-9]*$/;
            if (!validNumber.test(mobileValue) || mobileValue.length > 9) {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Mobile Number',
                    text: 'Mobile number can only contain digits and must be 9 digits long.'
                });
                $(this).val(mobileValue.replace(/[^0-9]/g, '').slice(0, 10));
            }
        });

        $('#adminEmail').on('blur', function() {
            const emailValue = $(this).val();
            const validEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            if (!validEmail.test(emailValue)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Email',
                    text: 'Please enter a valid email address.'
                });
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
                Swal.fire({
                    icon: 'error',
                    title: 'Password Mismatch',
                    text: 'Passwords do not match!'
                });
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
                        Swal.fire({
                            icon: 'success',
                            title: 'success',
                            text: 'Admin account successsfully added',
                            showConfirmButton: false,
                            timer: 1500
                        });

                        $('#addNewAdminModal').modal('hide');
                        $('#Admin_tbl').DataTable().ajax.reload();

                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Error creating admin: ' + data.error
                        });
                    }
                })

                .catch((error) => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'An Error Occurred',
                        text: 'An error occurred: ' + error.message
                    });
                });
        });
    });
</script>
