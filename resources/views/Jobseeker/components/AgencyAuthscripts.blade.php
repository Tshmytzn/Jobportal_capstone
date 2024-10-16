<script>
    function loginAgency() {
        var formElement = document.getElementById('agencyloginform');
        var formData = new FormData(formElement);

        $.ajax({
            type: "POST",
            url: '{{ route('LoginAgency') }}',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status === 'error') {
                    Swal.fire('Error', response.message, 'error');
                }else if(response.status === 'checking'){
                    window.location.replace('/AgencyReview?id='+response.user_id);
                } else {
                    Swal.fire({
                        title: 'Success',
                        text: response.message,
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href = '{{ route('agencydashboard') }}';
                    });
                }
            },
            error: function(xhr) {
                console.error('AJAX Error:', xhr.responseText); // Log the error

            }
        });
    }
</script>

<script>
    function registerAgency() {

        var formElement = document.getElementById("agencyForm");
        var formData = new FormData(formElement);
        formData.append('_token', '{{ csrf_token() }}'); // Append CSRF token

        // Send the AJAX request
        $.ajax({
            type: "POST",
            url: '{{ route('RegisterAgency') }}',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status === 'error') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Warning',
                        text: response.message,
                    });
                } else {
                    formElement.reset(); // Reset form
                    $('#' + response.modal).modal('hide');
                    Swal.fire({
                        title: 'Success',
                        text: response.message,
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    if (response.reload && typeof window[response.reload] === 'function') {
                        window[response.reload]();
                    }
                    window.location.href = '{{ route('agencylogin') }}';
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                const responseObject = JSON.parse(xhr.responseText);

// Initialize an empty array to store all error messages
const allErrorMessages = [];

// Loop through the errors object and collect the messages
for (const key in responseObject.errors) {
    if (responseObject.errors.hasOwnProperty(key)) {
        allErrorMessages.push(...responseObject.errors[key]);
    }
}

const errorMessageString = allErrorMessages.join(', ');
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: errorMessageString,
                });
            }
        });
    }
</script>
