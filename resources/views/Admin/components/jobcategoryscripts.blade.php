<script>
    function CreateJobCategory() {

        var formElement = document.getElementById("createJobCategoryForm");
        var formData = new FormData(formElement);
        formData.append('_token', '{{ csrf_token() }}');

        document.getElementById('loading').style.display = 'grid';


        $.ajax({
            url: "{{ route('CreateJobCategory') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                document.getElementById('loading').style.display = 'none';

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
                document.getElementById('loading').style.display = 'none';

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
            processing: false,
            serverSide: true,
            ajax: {
                url: '/Job/Categories',
                type: 'GET'
            },
            order: [[0,'asc']],
            columns: [
                {
                    data: null,
                    name: 'index',
                    render: function(data, type, row, meta) {
                        return meta.row + 1;
                    },
                    orderable: false 
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'description',
                    name: 'description',
                    render: function(data, type, row) {
                        return data.length > 50 ? data.substr(0, 50) + '...' : data;
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return `
                        <button class="btn btn-sm bgp-table edit-btn" data-bs-toggle="modal" data-bs-target="#editjobcategories" data-id="${row.id}">Edit</button>
                        <button class="btn btn-sm bgp-danger delete-btn" data-id="${row.id}">Delete</button>
                    `;
                    }
                }
            ]
        });

        //EDIT JOB CATEGORY
        $('#editjobcategories').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var jobCategoryId = button.data(
                'id');

            var modal = $(this);

            $.ajax({
                url: '/admin/getjobcategory/' + jobCategoryId,
                type: 'GET',
                success: function(response) {
                    modal.find('#jobCategoryId').val(response.id);
                    modal.find('#jobcategory_name').val(response.name);
                    modal.find('#job_description').val(response.description);

                    const imageUrl = '/job_categories/' + response
                        .image;

                    modal.find('#category_image').attr('src', imageUrl);
                },
                error: function(error) {
                    console.log(error);
                    alert('Failed to fetch job category data');
                }
            });
        });

        $('#jobcategory_image_input').on('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {

                    $('#category_image').attr('src', e.target.result);
                };

                reader.readAsDataURL(file);
            } else {

                $('#category_image').attr('src', '');
            }
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

                document.getElementById('loading').style.display = 'grid';

                $.ajax({
                    url: '/Job/Categories/' + id,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        document.getElementById('loading').style.display = 'none';

                        Swal.fire(
                            'Deleted!',
                            response.message,
                            'success'
                        );
                        $('#JobCategories_tbl').DataTable().ajax.reload();
                    },
                    error: function(xhr) {
                        document.getElementById('loading').style.display = 'none';

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
    $(document).on('click', '.edit-btn', function() {
        var jobCategoryId = $(this).data('id');
        $('#jobCategoryId').val(jobCategoryId);

    });

    function UpdateJobCategory() {
        var jobCategoryId = document.getElementById("jobCategoryId").value;
        var formElement = document.getElementById("editJobCategoryForm");
        var formData = new FormData(formElement);

        formData.append('_token', '{{ csrf_token() }}');

        document.getElementById('loading').style.display = 'grid';

        $.ajax({
            url: "/job-categories/update/" + jobCategoryId,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-HTTP-Method-Override': 'PUT'
            },
            success: function(response) {
                document.getElementById('loading').style.display = 'none';

                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500
                });

                setTimeout(function() {
                    var modalElement = document.getElementById('editjobcategories');
                    var modal = bootstrap.Modal.getInstance(modalElement);
                    if (modal) {
                        modal.hide();
                    }
                    $('#JobCategories_tbl').DataTable().ajax.reload();
                    $('#editJobCategoryForm')[0].reset();
                }, 1500);
            },
            error: function(xhr, status, error) {
                document.getElementById('loading').style.display = 'none';

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
