<script>
    $(document).ready(function() {
        $('#VerificationRequest_tbl').DataTable({
            processing: true,
            serverSide: false,
            destroy: true,
            ajax: {
                url: "{{ route('getpendingdata') }}",
                type: 'GET',
                dataSrc: 'data',
            },
            columns: [{
                    data: 'id',
                    name: 'id'
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
                            <button class="btn btn-sm bgp-table delete-btn" data-bs-toggle='modal' data-bs-target='#banjobseeker' data-id="${row.id}">Review</button>
                        `;
                    }
                }
            ]
        });
    });
</script>
