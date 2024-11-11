<script>
    $(document).ready(function() {

        const urlParams = new URLSearchParams(window.location.search);
        let id = urlParams.get('categoryid'); // Get the categoryid from the URL

        if (id) {
            id = parseInt(id, 10);
            // Check if id is a valid number and use it as the selected index
            if (!isNaN(id)) {
                document.getElementById('category').value = id;
                searchfilterjobs()
            }
        } else {
            searchfilterjobs()
        }

    });

    function searchfilterjobs() {

        var formElement = document.getElementById('filterForm');
        var formData = new FormData(formElement);

        formData.append('_token', '{{ csrf_token() }}');

        $.ajax({
            type: "POST",
            url: '{{ route('searchfilterjobs') }}',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {

                const displayJobs = document.getElementById('displayJobs');
                // Clear the display area
                displayJobs.innerHTML = ``;

                // Check if there are jobs in the response
                if (response.data.length > 0) {
                    response.data.forEach(element => {
                        // Display each job's details
                        const desc = element.job_description.substring(0, 50) + '...';

                        displayJobs.innerHTML += `
                                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="service-item text-center rounded p-4">
                                        <div class="service-icon d-inline-block bg-light rounded p-4 mb-4"
                                            style="height: 150px; width: 150px; overflow: hidden;">
                                            <img src="{{ asset('/agencyfiles/job_image/${element.job_image}') }}"
                                                alt="" class="img-fluid"
                                                style="width: 150px; height: 150px; object-fit: cover;">
                                        </div>
                                        <div class="service-content">
                                            <h4 class="mb-4">${element.job_title}</h4>
                                            <p class="mb-2"><strong>Salary:</strong> ${element.job_salary}</p>
                                            <p class="mb-2"><strong>Location:</strong> ${element.job_location}</p>
                                            <p class="mb-2"><strong>Type:</strong> ${element.job_type}</p>
                                            <p class="mb-4">${desc}</p>
                                        <a href="{{ route('jobdetails') }}?id=${element.job_id}" class="btn btn-light rounded-pill text-primary py-2 px-4"> Job Details</a>
                                        </div>
                                    </div>
                                </div>
                            `;
                    });
                } else {
                    // Display 'No Jobs Found' if there are no jobs in the data
                    displayJobs.innerHTML = `
                            <div class="col-12 text-center mb-2">
                                <h1>No Jobs Found</h1>
                            </div>
                        `;
                }



            },
            error: function(xhr) {
                console.error('AJAX Error:', xhr.responseText);
                Swal.fire('Error', 'An error occurred while submitting the form. Please try again.',
                    'error');
            }
        });
    }
</script>
