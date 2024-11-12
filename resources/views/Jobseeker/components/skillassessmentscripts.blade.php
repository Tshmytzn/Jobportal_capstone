<script>
    function submitAssessment() {
        var formElement = document.getElementById('assessmentForm');
        var formData = new FormData(formElement);

        var allAnswered = true;
        var unansweredQuestions = [];

        // Check each question in the form
        @foreach ($skillassessment->sections as $section)
            @foreach ($section->questions as $question)
                if (!$("input[name='q{{ $question->id }}']:checked").length) {
                    allAnswered = false;
                }
            @endforeach
        @endforeach

        if (!allAnswered) {
            // Alert user to answer all questions
            Swal.fire({
                title: 'Incomplete Submission',
                text: 'Please answer all questions before submitting. ' + unansweredQuestions.join(', '),
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then(() => {
                document.getElementById('loading').style.display = 'none';
            });
            return; // Stop submission if not all questions are answered
        }

        $.ajax({
            type: "POST",
            url: '{{ route('submitassessment') }}',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                document.getElementById('loading').style.display = 'none';

                if (response.status === 'error') {
                    Swal.fire('Error', response.message, 'error');
                } else {
                    Swal.fire({
                        title: 'Success',
                        text: response.message,
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1000
                    }).then(() => {


                        var myModal = new bootstrap.Modal(document.getElementById(
                            'assessmentModal'));
                        myModal.show();
                    });
                }
            },
            error: function(xhr) {
                document.getElementById('loading').style.display = 'none';
                console.error('AJAX Error:', xhr.responseText);
                Swal.fire('Error', 'An error occurred while submitting the assessment.', 'error');
            }
        });
    }

</script>

<script>
    function showResults() {
        // Hide the initial "Well done!" message and prompt to view results
        document.querySelector('.modal-body.text-center.p-4').style.display = 'none';

        // Show the "Results" section inside the modal
        document.getElementById('assessmentResults').style.display = 'block';

        // Make an AJAX request to get the assessment results
        $.ajax({
            type: "GET",
            url: '{{ route('getAssessmentResults') }}', // Route to get results
            success: function(response) {
                if (response.status === 'success') {
                    // Populate the results in the modal
                    $('#scoreResult span').text(response.score);
                    $('#passStatus span').text(response.passed);
                    $('#scorePercentage span').text(response.percentage + '%');

                    const categories = document.getElementById('categoryScores');
                    response.categories.forEach( data=> {
                        categories.innerHTML += `<p>${data.category.name} (${data.percentage}%)</p>`
                      });

                } else {
                    // Show error message in case no results were found
                    $('#scoreResult span').text('N/A');
                    $('#passStatus span').text('No result found');
                    $('#scorePercentage span').text('N/A'); // No percentage if no result
                }
            },
            error: function(xhr, status, error) {
                console.error("Error fetching results:", error);
                // Handle errors if needed
                $('#scoreResult span').text('Error');
                $('#passStatus span').text('Unable to fetch result');
                $('#scorePercentage span').text('Error'); // Show error if fetch fails
            }
        });
    }
</script>
