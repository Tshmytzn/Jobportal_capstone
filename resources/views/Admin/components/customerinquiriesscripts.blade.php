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

        $('#Contacts_tbl').DataTable({
            processing: false,
            serverSide: false,
            destroy: true,
            ajax: {
                url: "{{ route('getContacts') }}",
                type: 'GET',
            },
            order: [[0,'asc']],
            scrollY: '400px', // Fixed height for vertical scroll
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
                    data: 'name',

                },
                {
                    data: 'email',
                },
                {
                    data: 'message',
                },
                {
                    data: 'created_at',
                    render: function(data) {
                        const date = new Date(data);
                        return date.toLocaleString();
                    }
                },
                // {
                //     data: null,
                //     render: function(data, type, row) {
                //         return `
                //             <button class="btn btn-sm bgp-table delete-btn" data-bs-toggle='modal' data-bs-target='#banjobseeker' data-id="${row.id}">Block</button>
                //         `;
                //     }
                // }
            ],
            dom: 'Bfrtip',
            buttons: [
                'colvis', {
                    extend: 'copy',
                    text: 'Copy'
                }, {
                    extend: 'csv',
                    text: 'Export CSV'
                }, {
                    extend: 'excel',
                    text: 'Export Excel'
                }, {
                    extend: 'pdf',
                    text: 'Export PDF',
                    exportOptions: {
                        columns: ':visible'
                    }
                }, {
                    extend: 'print',
                    text: 'Print',
                    exportOptions: {
                        columns: ':visible:not(:first-child)'
                    },
                    customize: function(win) {

                        $(win.document.body)
                            .prepend(
                                `<div class="print-header">
                                    <img src="{{ asset('assets/img/PESOLOGO.png') }}" style="width: 100px; height: auto;">
                                    <h1>Public Employment Service Office Victorias City</h1>
                                </div>
                                <div class="print-header-date">
                                    Public Employment Service Office Victorias City
                                </div>`
                            );


                        $(win.document.body).find('h1').remove();

                        var style = `
                <style>
                    table {
                        width: 100%;
                        border-collapse: collapse;
                    }
                    table, th, td {
                        border: 1px solid #ddd;
                    }
                    th, td {
                        padding: 8px;
                        text-align: left;
                    }
                    tr:nth-child(even) {
                        background-color: #f2f2f2;
                    }
                    tr:nth-child(odd) {
                        background-color: #ffffff;
                    }
                    .print-header, .print-header-date {
                        position: fixed;
                        top: 140px;
                        left: 0;
                        width: 100%;
                        text-align: center;
                        z-index: 9999;
                        background: #fff;
                    }
                    .print-header-date {
                        font-size: 22px;
                        color: #666;
                        margin-top: 100px;
                        margin-bottom: 20px;

                    }
                    body {
                        margin-top: 150px; 
                    }
                    @media print {
                        .print-header, .print-header-date {
                            position: fixed;
                            top: 10px;
                            left: 0;
                            width: 100%;
                            text-align: center;
                            z-index: 9999;
                            background: #fff;
                        }
                        body {
                            margin-top: 150px;
                        }
                        .page-break {
                        page-break-before: always;
                    }
                            
                    }
                </style>
            `;

                        // Add the style to the printed window
                        $(win.document.head).append(style);

                      var rowsPerPage = 25;
                        var rows = $(win.document.body).find('table tr');
                        for (var i = rowsPerPage; i < rows.length; i += rowsPerPage) {
                            $(rows[i]).before(
                                '<tr class="page-break"><td colspan="100%"></td></tr>');
                        }

                        // Adjust page margins for the print view
                        $(win.document.body).css('margin-top', '150px');
                    }
                }

            ],
            initComplete: function() {

                $('.dt-button').attr(
                    'style',
                    'background: linear-gradient(to right, #FADCD9, #d8bfd8 ); color: #444; border: 1px solid #DDD; padding: 8px 12px; border-radius: 4px; font-size: 14px; cursor: pointer; margin: 4px; transition: all 0.3s ease; box-shadow: none;'
                );
            },
            fixedHeader: true,
        });

    });
</script>
