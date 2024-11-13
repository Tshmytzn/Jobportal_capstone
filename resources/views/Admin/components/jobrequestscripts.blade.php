<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<!-- Buttons extension -->
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<!-- Print button script -->
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<!-- Other export buttons (optional) -->
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>

<!-- JSZip for Excel export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<!-- pdfmake for PDF export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<!-- Buttons for HTML5 exports (Excel, PDF) -->
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>

<script>
    $(document).ready(function() {
        $('#JobRequests_tbl').DataTable({
            processing: true,
            serverSide: false,
            destroy: true,
            ajax: {
                url: "{{ route('getJobRequests') }}",
                type: 'GET',
                dataSrc: 'data',
            },
            order: [
                [0, 'asc']
            ],
            scrollY: '400px',
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            columns: [{
                    data: null,
                    name: 'index',
                    render: function(data, type, row, meta) {
                        return meta.row + 1;
                    },
                    orderable: false
                },
                {
                    data: 'category_name',
                    name: 'category_name'
                },
                {
                    data: 'agency_name',
                    name: 'agency_name'
                },
                {
                    data: 'job_title',
                    name: 'job_title'
                },
                {
                    data: 'job_location',
                    name: 'job_location'
                },
                {
                    data: 'created_at',
                    render: function(data) {
                        const date = new Date(data);
                        return date.toLocaleString();
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return `
                        <button class="btn btn-sm bgp-table delete-btn" data-bs-toggle='modal' data-bs-target='#reviewjob' data-id="${row.id}">Review</button>
                    `;
                    }
                }
            ],
            dom: 'Bfrtip',
            buttons: [
                'colvis',
                {
                    extend: 'copy'
                },
                {
                    extend: 'csv'
                },
                {
                    extend: 'excel'
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    }
                }
            ],
            fixedHeader: true,
        });

        // Open Modal and Fetch Job Details by ID
        $('#reviewjob').on('show.bs.modal', function(e) {
            var jobId = $(e.relatedTarget).data('id'); // Get the job ID from the button that triggered the modal

            // Set the job ID for both the "Approve" and "Reject" buttons dynamically
            $('#approveBtn').data('id', jobId);
            $('#rejectBtn').data('id', jobId);

            $.ajax({
                url: '/job-details/' + jobId,
                method: 'GET',
                success: function(response) {
                    $('#job_title').val(response.job_title);
                    $('#category_name').val(response.category_name);
                    $('#agency_name').val(response.agency_name);
                    $('#job_location').val(response.job_location);
                    $('#job_type').val(response.job_type);
                    $('#skills_required').val(response.skills_required);
                    $('#job_salary').val(response.job_salary);
                    $('#job_description').html(response.job_description);
                    $('#job_status').val(response.job_status);
                },
                error: function() {
                    alert('Failed to fetch job details');
                }
            });
        });

        $('#approveBtn').on('click', function() {
            let jobId = $(this).data('id');

            if (jobId) {
                $.ajax({
                    url: '/update-job-status',
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        job_id: jobId,
                        status: 'approved',
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Job status updated to approved');
                        } else {
                            alert('Error updating job status');
                        }
                        $('#reviewjob').modal('hide');
                    },
                    error: function() {
                        alert('Error processing your request');
                    }
                });
            }
        });

        // When the "Reject" button is clicked
        $('#rejectBtn').on('click', function() {
            let jobId = $(this).data('id');

            if (jobId) {
                $.ajax({
                    url: '/update-job-status',
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        job_id: jobId,
                        status: 'rejected',
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Job status updated to rejected');
                        } else {
                            alert('Error updating job status');
                        }
                        $('#reviewjob').modal('hide');
                    },
                    error: function() {
                        alert('Error processing your request');
                    }
                });
            }
        });

    });
</script>
