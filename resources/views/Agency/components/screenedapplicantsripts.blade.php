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
                            return `
                                <div style="display: flex; gap: 5px;">
                                    <button class="btn bgp-gradient" onclick="HireJobSeeker(${row.id})">Hire</button>
                                    <button class="btn btn-danger" onclick="DeclineJobSeeker(${row.id})">Decline</button>
                                </div>
                            `;
                        },


                    orderable: false
                }
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
                                response.message || 'There was an error hiring the job seeker.',
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

<script>
    function DeclineJobSeeker(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you really want to decline this job seeker?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, decline them!',
            cancelButtonText: 'No, cancel!'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: "{{ route('declineJobSeeker') }}",  
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id,
                        js_status: 'declined'
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire(
                                'Declined!',
                                'The job seeker has been declined successfully.',
                                'success'
                            );
                            $('#Screened_tbl').DataTable().ajax.reload();
                        } else {
                            Swal.fire(
                                'Error!',
                                response.message || 'There was an error declining the job seeker.',
                                'error'
                            );
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire(
                            'Error!',
                            'An error occurred while declining the job seeker.',
                            'error'
                        );
                    }
                });
            }
        });
    }
</script>
