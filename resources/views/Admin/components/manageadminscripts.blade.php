<script>
    $(document).ready(function() {

        $('#editadmindetailsForm').on('submit', function(e) {
            e.preventDefault();
            UpdateAdmin();
        });


        var phpVariable = <?php echo json_encode($admins); ?>;
        console.log(phpVariable);

        var formattedData = phpVariable.map(function(item) {
            return [
                item.id,
                item.admin_name,
                item.admin_email,
                item.admin_mobile,
                item.created_at,

                '<button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editAdminModal" onclick="displayAdmin(`' +
                item.admin_name + '`,`' + item.admin_email + '`,`' + item.admin_mobile + '`,`' +
                item.id + '`)">Edit</button> ' +
                '<button class="btn btn-sm btn-danger deleteAdminBtn" >Delete</button>'
            ];


        });


        $('#admindatatable').DataTable({
            data: formattedData,
            columns: [{
                    title: "ID"
                },
                {
                    title: "Full Name"
                },
                {
                    title: "Email"
                },
                {
                    title: "Contact Number"
                },
                {
                    title: "Date Added"
                },
                {
                    title: "Action"
                }
            ]
        });

    });

    function displayAdmin(name, email, num, id) {
        console.log(name)
        document.getElementById('newAdminFullName').value = name
        document.getElementById('newAdminEmail').value = email
        document.getElementById('newAdminMobile').value = num
        document.getElementById('adminId').value = id
    }

    function reloadElementById(elementId) {
        var element = document.getElementById(elementId);
        if (element) {
            $(element).load(window.location.href + ' #' + elementId);
        }
    }

    function UpdateAdmin() {
        var formElement = document.getElementById("editadmindetailsForm");
        var formData = new FormData(formElement);
        formData.append('_token', '{{ csrf_token() }}');

        $.ajax({
            url: "{{ route('EditAdmin') }}",
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
                }).then(() => {
                    $('#editAdminModal').modal('hide');

                    $('#editadmindetailsForm')[0].reset();

                        reloadElementById('admindatatable')
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

    $('#admindatatable').on('click', '.deleteAdminBtn', function() {
        var adminId = $(this).data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this record!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('DeleteAdmin') }}",
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: adminId
                    },
                    success: function(response) {
                        Swal.fire(
                            'Deleted!',
                            response.message,
                            'success'
                        );

                        $('#example').DataTable().ajax.reload(null, false);
                    },
                    error: function(xhr) {
                        var errorMessage = 'An error occurred. Please try again.';
                        Swal.fire(
                            'Error!',
                            errorMessage,
                            'error'
                        );
                    }
                });
            }
        });
    });
</script>
