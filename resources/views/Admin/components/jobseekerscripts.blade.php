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
        $('#Jobseeker_tbl').DataTable({
            processing: false,
            serverSide: false,
            destroy: true,
            ajax: {
                url: "{{ route('jobseekers') }}",
                type: 'GET',
                dataSrc: 'data',
            },
            order: [
                [0, 'asc']
            ],
            scrollY: '400px', 
            scrollX: true,
            scrollCollapse: true,
            processing:true,
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
                    data: null,
                    render: function(data, type, row) {
                        const name = data.js_firstname + ' ' + data.js_middlename + ' ' + data
                            .js_lastname
                        return name;
                    }
                },
                {
                    data: 'js_email',
                    name: 'js_email'
                },
                {
                    data: 'js_contactnumber',
                    name: 'js_contactnumber'
                },
                {
                    data: 'created_at',
                    render: function(data) {
                        const date = new Date(data);
                        return date.toLocaleString();
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
</script>


<script>
    function blockUser(element) {
        const userId = $(element).data('id'); // Get the user ID from the button

        Swal.fire({
            title: 'Are you sure?',
            text: "Do you really want to block this user?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, block it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('loading').style.display = 'none';

                // $.ajax({
                //     url: '/block-user/' + userId,
                //     type: 'POST',
                //     data: {
                //         _token: '{{ csrf_token() }}'
                //     },
                //     success: function(response) {
                //         document.getElementById('loading').style.display = 'none';

                //         Swal.fire(
                //             'Blocked!',
                //             'User has been blocked successfully.',
                //             'success'
                //         );
                //     },
                //     error: function(xhr) {
                //         document.getElementById('loading').style.display = 'none';

                //         Swal.fire(
                //             'Error!',
                //             'There was an error blocking the user.',
                //             'error'
                //         );
                //     }
                // });
            }
        });
    }
</script>
