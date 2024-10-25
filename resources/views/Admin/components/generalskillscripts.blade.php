<script>
    $(document).ready(function() {
        $('#Skills_tbl').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '/Job/Skills',
                type: 'GET'
            },
            order: [
                [0, 'asc']
            ],
            columns: [{
                    data: null,
                    name: 'index',
                    render: function(data, type, row, meta) {
                        return meta.row + 1 + meta.settings
                        ._iDisplayStart; // Adjust row index with page offset
                    },
                    orderable: false
                },
                {
                    data: 'skill_name',
                    name: 'skill_name'
                },
                {
                    data: 'skill_desc',
                    name: 'skill_desc',
                    render: function(data, type, row) {
                        return data.length > 50 ? data.substr(0, 50) + '...' : data;
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return `
                        <button class="btn btn-sm bgp-table edit-btn" data-bs-toggle="modal" data-bs-target="#editgeneralskillmodal" data-id="${row.skill_id}"> ${row.skill_id} Edit</button>
                        <button class="btn btn-sm bgp-danger delete-btn" data-id="${row.skill_id}">Delete</button>
                    `;
                    }
                }
            ]
        });

        $('#editgeneralskillmodal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var skillId = button.data('id');

            $.ajax({
                url: `/Job/ViewSkills/${skillId}`,
                type: 'GET',
                success: function(skill) {

                    var modal = $('#editgeneralskillmodal');
                    modal.find('#skillId').val(skill.skill_id);
                    modal.find('#skill_name').val(skill.skill_name);
                    modal.find('#skill_desc').val(skill.skill_desc);

                },
                error: function(xhr) {

                    console.error('Error fetching agency data:', xhr);
                }
            });
        });

    });

    function createskills() {

        var formElement = document.getElementById("createskillsform");
        var formData = new FormData(formElement);
        formData.append('_token', '{{ csrf_token() }}');

        document.getElementById('loading').style.display = 'grid';


        $.ajax({
            url: "{{ route('creategeneralskill') }}",
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
                    var modalElement = document.getElementById('createskillsmodal');
                    var modal = bootstrap.Modal.getInstance(modalElement);
                    if (modal) {
                        modal.hide();
                    }
                    $('#Skills_tbl').DataTable().ajax.reload();
                    $('#createskillsform')[0].reset();
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

    function updategeneralskills() {

        var formElement = document.getElementById("editgeneralskillsform");
        var formData = new FormData(formElement);
        formData.append('_token', '{{ csrf_token() }}');

        document.getElementById('loading').style.display = 'grid';


        $.ajax({
            url: "{{ route('updategeneralskills') }}",
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
                    var modalElement = document.getElementById('editgeneralskillmodal');
                    var modal = bootstrap.Modal.getInstance(modalElement);
                    if (modal) {
                        modal.hide();
                    }
                    $('#Skills_tbl').DataTable().ajax.reload();
                    $('#editgeneralskillsform')[0].reset();
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

    $(document).on('click', '.delete-btn', function() {
        var skillId = $(this).data('id');
        var url = "{{ route('deleteSkill', ':id') }}".replace(':id', skillId);

        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            });

                            $('#Skills_tbl').DataTable().ajax.reload();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: response.error,
                                showConfirmButton: true
                            });
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Failed to delete skill.',
                            showConfirmButton: true
                        });
                    }
                });
            }
        });
    });
</script>
