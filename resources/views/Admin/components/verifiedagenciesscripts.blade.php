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
                            <button class="btn btn-sm bgp-table delete-btn" data-bs-toggle='modal' data-bs-target='#agencyInfoModal' data-id="${row.id}">View</button>
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

    $('#agencyInfoModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var agencyId = button.data('id');

            $.ajax({
                url: `/agency/${agencyId}`,
                type: 'GET',
                success: function(data) {
                    var agency = data.data;

                    var modal = $('#agencyInfoModal');
                    modal.find('#agencyIdInput').val(agency.id);
                    document.getElementById('agencyImage').src = agency.agency_image ?
                        '/agency_profile/' + agency.agency_image :
                        '/agency_profile/default.png';
                    modal.find('#agencyName').val(agency.agency_name);

                    modal.find('#province').val(agency.agency_province);
                    modal.find('#city').val(agency.agency_city);
                    modal.find('#baranggay').val(agency.agency_baranggay);

                    modal.find('#agencyAddress').val(agency.agency_address);
                    modal.find('#emailAddress').val(agency.email_address);
                    modal.find('#contactNumber').val(agency.contact_number);
                    modal.find('#landlineNumber').val(agency.landline_number);
                    modal.find('#geoCoverage').val(agency.geo_coverage);
                    modal.find('#employeeCount').val(agency.employee_count);
                    document.getElementById('businessPermit').src = '/agencyfiles/' + agency
                        .agency_business_permit;
                    document.getElementById('dtiPermit').src = '/agencyfiles/' + agency
                        .agency_dti_permit;
                    document.getElementById('birPermit').src = '/agencyfiles/' + agency
                        .agency_bir_permit;
                        document.getElementById('mayorsPermit').src = '/agencyfiles/' + agency
                        .agency_mayors_permit;

                    var statusBadge = modal.find('#statusBadge');
                    statusBadge.text(agency.status.charAt(0).toUpperCase() + agency.status
                        .slice(1));
                    if (agency.status === 'approved') {
                        statusBadge.removeClass('bg-warning text-dark').addClass(
                            'bg-success text-white');
                    } else if (agency.status === 'rejected') {
                        statusBadge.removeClass('bg-warning text-dark').addClass(
                            'bg-danger text-white');
                    } else {
                        statusBadge.removeClass(
                            'bg-success text-white bg-danger text-white').addClass(
                            'bg-warning text-dark');
                    }
                },
                error: function(xhr) {

                    console.error('Error fetching agency data:', xhr);
                }
            });
        });

    });

</script>

