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


<script>
function blockUser(element) {
    const userId = $(element).data('id'); // Get the user ID from the button

    Swal.fire({
        title: 'Are you sure?',
        text: "Do you really want to block this user?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, block it!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('loading').style.display = 'none';

            // $.ajax({
            //     url: '/block-user/' + userId, 
            //     type: 'POST',
            //     data: {
            //         _token: '{{ csrf_token() }}' 
            //     },
            //     success: function(response) {
            //         document.getElementById('loading').style.display = 'none';

            //         Swal.fire(
            //             'Blocked!',
            //             'User has been blocked successfully.',
            //             'success'
            //         );
            //     },
            //     error: function(xhr) {
            //         document.getElementById('loading').style.display = 'none';

            //         Swal.fire(
            //             'Error!',
            //             'There was an error blocking the user.',
            //             'error'
            //         );
            //     }
            // });
        }
    });
}
</script>

