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

        $('#jobseeker-tab').on('show.bs.tab', function(e) {

            $('#JobseekerF_tbl').DataTable({
                processing: true,
                serverSide: false,
                destroy: true,
                ajax: {
                    url: "{{ route('getJobseekerFeedbacks') }}",
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
                        data: 'applicant_name',
                        name: 'applicant_name'
                    },
                    {
                        data: 'job_title',
                        name: 'job_title'
                    },
                    {
                        data: 'rating',
                        name: 'rating'
                    },
                    {
                        data: 'comments',
                        name: 'comments'
                    },
                    {
                        data: 'created_at',
                        render: function(data) {
                            const date = new Date(data);
                            return date.toLocaleString();
                        }
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
        

         $('#agency-tab').on('show.bs.tab', function(e) {
loadagencyfeedback()
        });
loadagencyfeedback()
    });
    function loadagencyfeedback(){
         $('#AgencyF_tbl').DataTable({
                processing: true,
                serverSide: false,
                destroy: true,
                ajax: {
                    url: "{{ route('getallagencyfeedback') }}",
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
                        data: 'agency_name',
                        name: 'Agency'
                    },
                    {
                        data: 'job_title',
                        name: 'job_title'
                    },
                    {
                        data: 'rating',
                        name: 'rating'
                    },
                    {
                        data: 'comments',
                        name: 'comments'
                    },
                    {
                        data: 'created_at',
                        render: function(data) {
                            const date = new Date(data);
                            return date.toLocaleString();
                        }
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
    }
</script>
