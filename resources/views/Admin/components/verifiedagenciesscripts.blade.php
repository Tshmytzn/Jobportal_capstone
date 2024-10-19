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
            ]
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

