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
    function CreateJobCategory() {

        var formElement = document.getElementById("createJobCategoryForm");
        var formData = new FormData(formElement);
        formData.append('_token', '{{ csrf_token() }}');

        $.ajax({
            url: "{{ route('CreateJobCategory') }}",
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
                    var modalElement = document.getElementById('createjobcategories1');
                    var modal = bootstrap.Modal.getInstance(modalElement);
                    if (modal) {
                        modal.hide();
                    }
                    $('#JobCategories_tbl').DataTable().ajax.reload();
                    $('#createJobCategoryForm')[0].reset();
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
        $('#JobCategories_tbl').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '/Job/Categories',
                type: 'GET'
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return `
                        <button class="btn btn-sm btn-success edit-btn" data-id="${row.id}">Edit</button>
                        <button class="btn btn-sm btn-danger delete-btn" data-id="${row.id}">Delete</button>
                    `;
                    }
                }
            ]
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#Jobseeker_tbl').DataTable({
            processing: true,
            serverSide: false,
            destroy:true, // Since we're returning all jobseekers at once, we don't need server-side processing here
            ajax: {
                url: "{{route('jobseekers')}}",
                type: 'GET',
                dataSrc: 'data',
            },
            columns: [
                {
                    data: 'js_id',
                    name: 'js_id'
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        const name = data.js_firstname +' '+data.js_middlename+' '+data.js_lastname
                        return name;
                    }
                },
                {
                    data: 'js_email',
                    name: 'js_email'
                },
                {
                    data: 'js_contactnumber',
                    name: 'js_contactnumber'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return `
                    <button class="btn btn-sm btn-primary edit-btn" data-id="${row.js_id}">Edit</button>
                    <button class="btn btn-sm btn-danger delete-btn" data-id="${row.js_id}">Delete</button>
                `;
                    }
                }
            ]
        });


    });
</script>
