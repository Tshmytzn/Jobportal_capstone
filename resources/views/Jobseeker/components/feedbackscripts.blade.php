<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('.star-rating');

        stars.forEach(star => {
            star.addEventListener('click', function() {
                stars.forEach(s => s.classList.remove('checked'));
                this.classList.add('checked');
            });
        });
    });


    function SubmitFeedback(formID) {
        var formElement = document.getElementById(formID);
        var formData = new FormData(formElement);

        var selectedRating = document.querySelector('input[name="star-rating"]:checked');
        if (selectedRating) {
            formData.append('rating', selectedRating.value);
        }

        formData.append('_token', '{{ csrf_token() }}');

        document.getElementById('loading').style.display = 'grid';

        $.ajax({
            type: "POST",
            url: '{{ route('submitFeedback') }}',
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
                        timer: 1500
                    }).then(() => {
                        $('#SubmitContactForm')[0]
                            .reset();
                        window.location.href = '{{ route('applicationstatus') }}';
                    });
                }
            },
            error: function(xhr) {
                document.getElementById('loading').style.display = 'none';

                console.error('AJAX Error:', xhr.status, xhr.statusText);
                console.error('Response Text:', xhr.responseText);

                let errorMessage = 'An error occurred while submitting the form. Please try again.';
                try {
                    const jsonResponse = JSON.parse(xhr.responseText);
                    errorMessage = jsonResponse.message || errorMessage;
                } catch (e) {
                    console.error('Error parsing JSON:', e);
                }

                Swal.fire('Error', errorMessage, 'error');
            }
        });
    }
</script>
