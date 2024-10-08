<script>
    $(document).ready(function() {
        $('#Jobseeker_tbl').DataTable({
            processing: false,
            serverSide: false,
            destroy:true, 
            ajax: {
                url: "{{route('jobseekers')}}",
                type: 'GET',
                dataSrc: 'data',
            },
            columns: [
                {
                    data: 'js_id',
                    name: 'js_id'
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        const name = data.js_firstname +' '+data.js_middlename+' '+data.js_lastname
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
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return `
                    <button class="btn btn-sm bgp-table delete-btn" data-bs-toggle='modal' data-bs-target='#banjobseeker' data-id="${row.js_id}">Block</button>
                `;
                    }
                }
            ]
        });
    });
</script>
