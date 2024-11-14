<script>
    $(document).ready(function() {
        $('#VerificationRequest_tbl').DataTable({
            processing: false,
            serverSide: false,
            destroy: true,
            ajax: {
                url: "{{ route('getpendingdata') }}",
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
                            <button class="btn btn-sm bgp-table delete-btn" data-bs-toggle='modal' data-bs-target='#agencyInfoModal' data-id="${row.id}">Review</button>
                        `;
                    }
                }
            ]
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

                    modal.find('#province').val(agency.province);
                    modal.find('#city').val(agency.city);
                    modal.find('#baranggay').val(agency.baranggay);

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

    function approveAgency() {
        var agencyId = $('#agencyIdInput').val();

        if (!agencyId) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Agency ID is missing.',
                showConfirmButton: true
            });
            return;
        }

        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to approve this agency?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, approve it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {

            document.getElementById('loading').style.display = 'grid';

            if (result.isConfirmed) {
                var formData = {
                    agency_id: agencyId,
                    status: 'approved',
                    _token: '{{ csrf_token() }}'
                };

                $.ajax({
                    url: "{{ route('approveAgency') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        document.getElementById('loading').style.display = 'none';

                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        });

                        setTimeout(function() {
                            $('#VerificationRequest_tbl').DataTable().ajax.reload();

                            $('#statusBadge').removeClass('bg-warning text-dark')
                                .addClass('bg-success text-white')
                                .text('Approved');

                            var myModal = bootstrap.Modal.getInstance(document
                                .getElementById('agencyInfoModal'));
                            myModal.hide();
                        }, 1500);
                    },
                    error: function(xhr) {
                        document.getElementById('loading').style.display = 'none';

                        var errors = xhr.responseJSON.errors || {};
                        var errorMessage = '';

                        $.each(errors, function(key, value) {
                            errorMessage += value + '<br>';
                        });

                        if (!errorMessage) {
                            errorMessage = 'An unexpected error occurred.';
                        }

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            html: errorMessage,
                            showConfirmButton: true
                        });
                    }
                });
            }
        });
    }


    function rejectAgency() {
        var agencyId = $('#agencyIdInput').val();

        if (!agencyId) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Agency ID is missing.',
                showConfirmButton: true
            });
            return;
        }

        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to proceed with rejecting this agency?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, reject it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            document.getElementById('loading').style.display = 'grid';

            if (result.isConfirmed) {
                var formData = {
                    agency_id: agencyId,
                    status: 'Rejected',
                    _token: '{{ csrf_token() }}'
                };

                $.ajax({
                    url: "{{ route('rejectAgency') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        document.getElementById('loading').style.display = 'none';

                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        });

                        setTimeout(function() {
                            $('#VerificationRequest_tbl').DataTable().ajax.reload();

                            $('#statusBadge').removeClass('bg-warning text-dark')
                                .addClass(
                                    'bg-danger text-white'
                                    ) // Change to 'bg-danger' for rejected status
                                .text('Rejected');

                            var myModal = bootstrap.Modal.getInstance(document
                                .getElementById('agencyInfoModal'));
                            myModal.hide();
                        }, 1500);
                    },
                    error: function(xhr) {
                        document.getElementById('loading').style.display = 'none';

                        var errors = xhr.responseJSON.errors || {};
                        var errorMessage = '';

                        $.each(errors, function(key, value) {
                            errorMessage += value + '<br>';
                        });

                        if (!errorMessage) {
                            errorMessage = 'An unexpected error occurred.';
                        }

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            html: errorMessage,
                            showConfirmButton: true
                        });
                    }
                });
            }
        });
    }
</script>
