<script>
    $(document).ready(function() {
        $('#PesoForms_tbl').DataTable({
            processing: true,
            serverSide: false,
            destroy: true,
            ajax: {
                url: "{{ route('getPesoForms') }}",
                type: 'GET',
                dataSrc: 'data',
            },
            order: [
                [0, 'asc']
            ],
            scrollY: '400px', 
            scrollCollapse: true,
            columns: [{
                    data: null,
                    render: function(data, type, row, meta) {
                        return meta.row + 1;
                    },
                    orderable: false
                },
                {
                    data: 'peso_fullname'
                },
                {
                    data: 'peso_birthdate'
                },
                {
                    data: 'peso_age'
                },
                {
                    data: 'peso_gender'
                },
                {
                    data: 'peso_civilstatus'
                },
                {
                    data: 'peso_city'
                },
                {
                    data: 'peso_baranggay'
                },
                {
                    data: 'peso_street'
                },
                {
                    data: 'peso_email'
                },
                {
                    data: 'peso_tel'
                },
                {
                    data: 'peso_cell'
                },
                {
                    data: 'peso_employment'
                },
                {
                    data: 'peso_educ'
                },
                {
                    data: 'peso_position'
                },
                {
                    data: 'peso_skills'
                },
                {
                    data: 'peso_work'
                },
                {
                    data: 'peso_4ps'
                },
                {
                    data: 'peso_pwd'
                },
                {
                    data: 'peso_registration'
                },
                {
                    data: 'peso_remarks'
                },
                {
                    data: 'peso_office'
                },
                {
                    data: 'peso_type'
                },
                {
                    data: 'peso_class'
                },
                {
                    data: 'peso_program'
                },
                {
                    data: 'peso_event'
                },
                {
                    data: 'peso_transaction'
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
                            <button class="btn btn-sm bgp-table delete-btn" 
                                    data-bs-toggle='modal' 
                                    data-bs-target='#' 
                                    data-id="${row.peso_id}"> View </button>
                        `;
                    }
                },
            ],
            dom: 'Bfrtip',
            buttons: [{
                extend: 'print',
                text: 'Print Table',
                className: 'btn btn-primary',
                exportOptions: {
                    columns: ':visible'
                },
                customize: function(win) {
                    $(win.document.body)
                        .css('font-size', '10pt')
                        .prepend('<h3>Registration Forms</h3>');
                }
            }]
        });
    });
</script>
