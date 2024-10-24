<script>

$(document).ready(function() {
        $('#JobCategories_tbl').DataTable({
            processing: false,
            serverSide: true,
            ajax: {
                url: '/Job/Categories',
                type: 'GET'
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
                    name: 'name'
                },
                {
                    data: 'description',
                    name: 'description',
                    render: function(data, type, row) {
                        return data.length > 50 ? data.substr(0, 50) + '...' : data;
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return `
                        <button class="btn btn-sm bgp-table edit-btn" data-bs-toggle="modal" data-bs-target="#editjobcategories" data-id="${row.id}">Edit</button>
                        <button class="btn btn-sm bgp-danger delete-btn" data-id="${row.id}">Delete</button>
                    `;
                    }
                }
            ]
        });
    });

    function createskills() {

    }

</script>