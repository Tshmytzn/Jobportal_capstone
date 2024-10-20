{{-- <script>

$(document).ready(function() {

    const urlParams = new URLSearchParams(window.location.search);
    let agencyId = urlParams.get('agencyid');

    if (agencyId && !isNaN(agencyId)) {
        console.log("Agency ID from URL: " + agencyId);

    } else {
        console.log("Invalid or missing 'agencyid' in URL.");
    }
});

</script> --}}

<script>
    $(document).ready(function() {

        const urlParams = new URLSearchParams(window.location.search);
        let agencyId = urlParams.get('agencyid');


        if (agencyId && !isNaN(agencyId)) {
            document.getElementById('loading').style.display = 'grid';


            $.ajax({
                url: '{{ route('searchfilteragencyjobs') }}',
                type: 'GET',
                data: {
                    agencyid: agencyId
                },

                success: function(response) {
                    document.getElementById('loading').style.display = 'none';

                    const displayJobs = document.getElementById('displayJobs');
                    // Clear the display area
                    displayJobs.innerHTML = ``;

                    // Check if there are jobs in the response
                    if (response.length > 0) { // Assuming response is a JSON array
                        response.forEach(element => {
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
                                <p class="mb-2"><strong>Location:</strong> ${element.job_location}</p>
                                <p class="mb-2"><strong>Type:</strong> ${element.job_type}</p>
                                <p class="mb-4">${desc}</p>
                                <a href="{{ route('jobdetails') }}?id=${element.id}" class="btn btn-light rounded-pill text-primary py-2 px-4">Job Details</a>
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
                error: function(xhr, status, error) {
                    document.getElementById('loading').style.display = 'none';

                    console.error('Error fetching job details:', error);
                }
            });


        }

    });
</script>
