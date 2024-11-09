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

                        var jobseekerId = response.result.js_id;
                        var assessmentId = response.result.assessment_id;
                        var score = response.result
                            .score; 
                        var passed = response.result.passed; 

                        var resultsUrl =
                            '{{ route('assessment.results', ['jobseekerId' => '__jobseeker_id__', 'assessmentId' => '__assessment_id__']) }}';
                        resultsUrl = resultsUrl.replace('__jobseeker_id__', jobseekerId);
                        resultsUrl = resultsUrl.replace('__assessment_id__', assessmentId);

                        document.getElementById('viewResultsBtn').setAttribute('href', resultsUrl);

                        var myModal = new bootstrap.Modal(document.getElementById(
                            'assessmentModal'));
                        myModal.show();

                        document.getElementById('assessmentResults').style.display =
                            'none'; // Hide results initially
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
