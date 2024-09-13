<script>
    $(document).ready(function() {
        $('#Jobseeker_tbl').DataTable({
            processing: true,
            serverSide: false,
            destroy:true, // Since we're returning all jobseekers at once, we don't need server-side processing here
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
                    name: 'created_at'
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return `
                    <button class="btn btn-sm bgp-table delete-btn" data-id="${row.js_id}">Ban</button>
                `;
                    }
                }
            ]
        });
    });
</script>
