
<script>
    $(document).ready(function() {

        $('#Contacts_tbl').DataTable({
            processing: true,
            serverSide: false,
            destroy: true, 
            ajax: {
                url: "{{ route('getContacts') }}", 
                type: 'GET',
            }, 
            columns: [
                {
                    data: 'id',
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