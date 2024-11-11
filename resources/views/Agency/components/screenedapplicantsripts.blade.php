<script>
    $(document).ready(function() {
        $('#Screened_tbl').DataTable({
            processing: true,
            serverSide: false,
            destroy: true,
            ajax: {
                url: "{{ route('getScreened') }}",  
                type: 'GET',
                dataSrc: 'data',
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
                    data: 'job_title',  
                    name: 'job_title'
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
                        return `<button class="btn btn-danger" onclick="disqualifyJobSeeker(${row.id})">Disqualify</button>`;
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
            fixedHeader: true,
        });
    });
</script>
