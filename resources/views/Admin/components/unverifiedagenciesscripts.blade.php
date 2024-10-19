<script>
    $(document).ready(function() {
        $('#Unverifiedagencies_tbl').DataTable({
            processing: false,
            serverSide: false,
            destroy: true,
            ajax: {
                url: "{{ route('getUnverifiedAgencies') }}",
                type: 'GET',
                dataSrc: 'data',
            },
            order: [[0,'asc']],
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
                            <button class="btn btn-sm bgp-table" data-bs-toggle='modal' data-bs-target='#viewAgencymodal' data-id="${row.id}">Review Again </button>
                        `;
                    }
                }
            ]
        });

        $('#viewAgencymodal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var agencyId = button.data('id');

            $.ajax({
                url: `/agency/${agencyId}`,
                type: 'GET',
                success: function(data) {
                    var agency = data.data;

                    var modal = $('#viewAgencymodal');
                    modal.find('#agencyIdInput').val(agency.id);
                    document.getElementById('agencyImage').src = agency.agency_image ?
                        '/agencyfiles/' + agency.agency_image :
                        '/agencyfiles/default_image.jpg';
                    modal.find('#agencyName').val(agency.agency_name);
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