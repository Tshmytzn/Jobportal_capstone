
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
            ]
        });
        
    });
</script>