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
                        <button class="btn btn-sm btn-success edit-btn" data-bs-toggle="modal" data-bs-target="#editjobcategories" data-id="${row.id}">Edit</button>
                        <button class="btn btn-sm btn-danger delete-btn" data-id="${row.id}">Delete</button>
                    `;
                    }
                }
            ]
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
                    url: '/Job/Categories/' + id,
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
                        $('#JobCategories_tbl').DataTable().ajax.reload();
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
