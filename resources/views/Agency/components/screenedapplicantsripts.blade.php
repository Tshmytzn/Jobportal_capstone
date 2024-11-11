<script>
      $(document).ready(function() {
        $('#Screened_tbl').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            ajax: {
                url: "{{ route('getScreened') }}",
                type: 'GET',
                dataSrc: 'data'
            },
            order: [[0, 'asc']],
            scrollY: '400px',
            scrollX: true,
            scrollCollapse: true,
            paging: true,
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
                    data: 'applicant_name',
                    name: 'applicant_name'
                },
                {
                    data: 'job_name',
                    name: 'job_name'
                },
                {
                    data: 'applicant_email',
                    name: 'applicant_email'
                },
                {
                    data: 'applicant_phone',
                    name: 'applicant_phone'
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return `<button class="btn bgp-gradient" onclick="HireJobSeeker(${row.id})">Hire</button>`;
                    },
                    orderable: false
                }
            ],
            dom: 'Bfrtip',
            buttons: [
                'colvis',
                { extend: 'copy' },
                { extend: 'csv' },
                { extend: 'excel' },
                { extend: 'pdf', exportOptions: { columns: ':visible' }},
                { extend: 'print', exportOptions: { columns: ':visible' }}
            ],
            fixedHeader: true
        });
    });
</script>

<script>
function HireJobSeeker(id) {

    Swal.fire({
        title: 'Are you sure?',
        text: "Do you really want to hire this job seeker?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, hire them!',
        cancelButtonText: 'No, cancel!'
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                url: "{{ route('hireJobSeeker') }}",  
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}", 
                    id: id,
                    js_status: 'hired'
                },
                success: function(response) {

                    if (response.success) {
                        Swal.fire(
                            'Hired!',
                            'The job seeker has been hired successfully.',
                            'success'
                        );
                        $('#Screened_tbl').DataTable().ajax.reload();  
                    } else {
                        Swal.fire(
                            'Error!',
                            'There was an error hiring the job seeker.',
                            'error'
                        );
                    }
                },
                error: function(xhr, status, error) {

                    Swal.fire(
                        'Error!',
                        'An error occurred while hiring the job seeker.',
                        'error'
                    );
                }
            });
        }
    });
}


</script>