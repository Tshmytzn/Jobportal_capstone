<script>
    $(document).ready(function() {
        const urlParams = new URLSearchParams(window.location.search);
        let id = urlParams.get('id'); // Get the job ID from the URL

        if (id) {
            id = parseInt(id, 10);
            // Check if id is a valid number
            if (!isNaN(id)) {
                console.log('Job ID:', id); // Log the job ID to the console

                // AJAX request to fetch the job details by ID
                $.ajax({
                    url: `/Showjobdetails/${id}`, // Your route to fetch job details
                    type: 'GET',
                    success: function(response) {
                        if (response) {

                            $('#job_title').text(response.job_title);
                            $('#job_overview').text(
                                `Join our team of experts in ${response.job_location}. ${response.job_type} position.`
                                );
                            $('#job_description').html(response.job_description);
                            $('#job_location').text(response.job_location);
                            $('#job_type').text(response.job_type);
                            
                            const options = {
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric'
                            };
                            $('#job_posted_date').text(new Date(response.created_at)
                                .toLocaleDateString(undefined, options));
                            $('#job_updated_date').text(new Date(response.updated_at)
                                .toLocaleDateString(undefined, options));

                            // $('#job_title').text(response.job_title);
                            // $('#job_location').text(response.job_location);
                            // $('#job_type').text(response.job_type);

                            $('#job_image').attr('src',
                                `/agencyfiles/job_image/${response.job_image}`);
                        } else {
                            console.log('No job details found');
                        }
                    },
                    error: function(error) {
                        console.log('Error fetching job details:', error);
                    }
                });
            }
        } else {
            console.log('No ID found in URL');
        }
    });
</script>
