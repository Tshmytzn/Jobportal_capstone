<script>
    $(document).ready(function() {
        const urlParams = new URLSearchParams(window.location.search);
        let id = urlParams.get('id'); // Get the job ID from the URL

        console.log('Retrieved Job ID from URL:', id);

        if (id) {
            id = parseInt(id, 10);

            if (!isNaN(id)) {
                console.log('Job ID:', id);

                // AJAX request to fetch the job details by ID
                $.ajax({
                    url: `/Showjobdetails/${id}`,
                    type: 'GET',
                    success: function(response) {
                        if (response) {

                            $('#jobIdInput').val(id);

                            $('#job_title').text(response.job_title);
                            $('#job_overview').text(
                                `Join our team of experts in ${response.job_location}. ${response.job_type} position.`
                                );
                            $('#job_description').html(response.job_description);
                            $('#job_location').text(response.job_location);
                            $('#job_type').text(response.job_type);
                            $('#job_salary').text(response.job_salary);
                            $('#salary_frequency').text(response.salary_frequency);

                            $('#job_vacancy').text(response.job_vacancy);
                            $('#skill_required').text(response.skills_required && response.skills_required.length > 0 ? response.skills_required : 'No skills required.');

                            const options = {
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric'
                            };
                            $('#job_posted_date').text(new Date(response.created_at)
                                .toLocaleDateString(undefined, options));
                            $('#job_updated_date').text(new Date(response.updated_at)
                                .toLocaleDateString(undefined, options));

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
