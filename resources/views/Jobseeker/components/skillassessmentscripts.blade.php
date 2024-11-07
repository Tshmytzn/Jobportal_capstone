
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        if (typeof submitAssessment === "function") {
            console.log("submitAssessment function is available.");
        } else {
            console.error("submitAssessment function is not defined.");
        }

        function submitAssessment() {

            console.log('clicked'); 
            var formData = new FormData($('#assessmentForm')[0]);

            $.ajax({
                url: '{{ route("assessment.submit") }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status === 'success') {
                        alert('Assessment submitted successfully!');
                    } else {
                        alert('There was an error submitting your assessment.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    alert('An error occurred, please try again later.');
                }
            });
        }
    });
</script>
