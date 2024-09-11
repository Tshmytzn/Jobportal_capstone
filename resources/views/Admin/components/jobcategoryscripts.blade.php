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