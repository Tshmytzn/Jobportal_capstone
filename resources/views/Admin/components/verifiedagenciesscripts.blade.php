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
        $('#Verifiedagencies_tbl').DataTable({
            processing: false,
            serverSide: false,
            destroy: true,
            ajax: {
                url: "{{ route('getVerifiedAgencies') }}",
                type: 'GET',
                dataSrc: 'data',
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
                    data: null,
                    render: function(data, type, row) {
                        return row.agency_name;
                    }
                },
                {
                    data: 'email_address',
                    name: 'email_address'
                },
                {
                    data: 'geo_coverage',
                    name: 'geo_coverage'
                },
                {
                    data: 'agency_address',
                    name: 'agency_address'
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
                            <button class="btn btn-sm bgp-table delete-btn" data-bs-toggle='modal' data-bs-target='#deactivateagency' data-id="${row.id}">Deactivate</button>
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

    });

    function deactivateAgency(button) {
    const agencyId = button.getAttribute('data-id');

    Swal.fire({
        title: 'Are you sure?',
        text: "You are about to deactivate this agency account!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, deactivate it!'
    }).then((result) => {
        if (result.isConfirmed) {

            document.getElementById('loading').style.display = 'none';


            // $.ajax({
            //     url: '/agency/deactivate/' + agencyId,
            //     type: 'POST',
            //     data: {
            //         _token: '{{ csrf_token() }}',

            //     },
            //     success: function(response) {
            //         // Show success message
            //         Swal.fire(
            //             'Deactivated!',
            //             'The agency account has been deactivated.',
            //             'success'
            //         );

            //         $('#AgencyTable').DataTable().ajax.reload();
            //     },
            //     error: function(xhr) {
            //         // Show error message
            //         Swal.fire(
            //             'Error!',
            //             'Something went wrong. Please try again.',
            //             'error'
            //         );
            //     }
            // });
        }
    });
}

</script>

