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
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

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
            scrollY: '400px', // Fixed height for vertical scroll
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            columns: [{
                    data: null,
                    render: (data, type, row, meta) => meta.row + 1,
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
                    render: data => new Date(data).toLocaleString()
                },

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
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    }
                }
            ],
            fixedHeader: true,
        });

    });
</script>
