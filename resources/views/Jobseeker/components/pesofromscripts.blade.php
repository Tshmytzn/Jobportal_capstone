<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    const form = document.querySelector("form"),
        nextBtn = form.querySelector(".nextBtn"),
        backBtn = form.querySelector(".backBtn"),
        allInput = form.querySelectorAll(".first input");

    function validateForm() {
        let valid = true;
        allInput.forEach(input => {

            if (input.hasAttribute('required') && input.value.trim() === "") {
                valid = false;
            }
        });
        return valid;
    }

    nextBtn.addEventListener("click", (e) => {
        e.preventDefault();

        if (validateForm()) {
            form.classList.add('secActive');
        } else {

            Swal.fire({
                icon: 'error',
                title: 'Incomplete Form',
                text: 'Please fill in all fields to proceed.',
                confirmButtonText: 'OK'
            });

        }
    });

    backBtn.addEventListener("click", () => {
        form.classList.remove('secActive');
    });


    const skillsSelect = document.getElementById('skills');
    const selectedSkillsDiv = document.getElementById('selected-skills');
    
    skillsSelect.addEventListener('change', () => {
        const selectedOptions = Array.from(skillsSelect.selectedOptions).map(option => option.text);
        console.log(selectedOptions)
        selectedSkillsDiv.textContent = 'Selected Skills: ' + (selectedOptions.length ? selectedOptions.join(
            ', ') : 'None');
            const skillsString = selectedOptions.join(', ');
        document.getElementById('selectedSkill').value = skillsString
    });

    // const form = document.querySelector("form"),

    //     nextBtn = form.querySelector(".nextBtn"),
    //     backBtn = form.querySelector(".backBtn"),
    //     allInput = form.querySelectorAll(".first input");


    // nextBtn.addEventListener("click", () => {
    //     allInput.forEach(input => {
    //         if (input.value != "") {
    //             form.classList.add('secActive');
    //         } else {
    //             form.classList.remove('secActive');
    //         }
    //     })
    // })

    // backBtn.addEventListener("click", () => form.classList.remove('secActive'));

    function calculateAge() {
        const birthdateInput = document.getElementById('birthdate').value;
        const ageInput = document.getElementById('age');

        if (birthdateInput) {
            const birthdate = new Date(birthdateInput);
            const today = new Date();

            let age = today.getFullYear() - birthdate.getFullYear();
            let monthDifference = today.getMonth() - birthdate.getMonth();

            // Adjust age if birthdate has not occurred this year yet
            if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthdate.getDate())) {
                age--;
                monthDifference += 12;
            }

            // Check if age is below 18
            if (age < 15) {
                ageInput.value = '';
                ageInput.style.borderColor = 'red';

                // Display SweetAlert notification
                Swal.fire({
                    icon: 'error',
                    title: 'Age Restriction',
                    text: 'You must be at least 15 years old to proceed.',
                    confirmButtonText: 'OK'
                });

                ageInput.title = "You must be at least 15 years old.";
            } else {
                // Format the age as "XXyrs and XXmonths"
                const formattedAge = `${age}yrs and ${monthDifference}months`;
                ageInput.value = formattedAge;
                ageInput.style.borderColor = ''; // Reset border color
                ageInput.title = ""; // Clear title if valid
            }
        }
    }



    window.onload = function() {
        flatpickr("#birthdate", {
            dateFormat: "Y-m-d",
            onChange: function() {
                calculateAge(); // Calculate age whenever the date changes
            }
        });
    };

    const barangays = [
        "Barangay 1",
        "Barangay 2",
        "Barangay 3",
        "Barangay 4",
        "Barangay 5",
        "Barangay 6",
        "Barangay 6-A",
        "Barangay 7",
        "Barangay 8",
        "Barangay 9",
        "Barangay 10",
        "Barangay 11",
        "Barangay 12",
        "Barangay 13",
        "Barangay 14",
        "Barangay 15",
        "Barangay 15-A",
        "Barangay 16",
        "Barangay 16-A",
        "Barangay 17",
        "Barangay 18",
        "Barangay 18-A",
        "Barangay 19",
        "Barangay 19-A",
        "Barangay 20",
        "Barangay 21"
    ];

    // Function to populate the dropdown
    function populateBarangays() {
        const barangaySelect = document.getElementById("barangay");

        // Loop through barangays and create an option for each
        barangays.forEach(function(barangay) {
            const option = document.createElement("option");
            option.value = barangay;
            option.text = barangay;
            barangaySelect.appendChild(option);
        });
    }

    // Call the function to populate the dropdown
    populateBarangays();

    function formatTelephone(input) {
        // Remove any non-digit characters
        let value = input.value.replace(/\D/g, '');

        // Insert hyphen after the fourth character
        if (value.length > 4) {
            value = value.slice(0, 4) + '-' + value.slice(4, 8);
        }

        // Limit the length to 9 characters (including the hyphen)
        if (value.length > 9) {
            value = value.slice(0, 9);
        }

        input.value = value;
    }

    function validateCellphone(input) {
        const value = input.value;

        // Remove any non-digit characters
        const cleanedValue = value.replace(/\D/g, '');

        // Update the input with the cleaned value
        input.value = cleanedValue;

        // Check if the number starts with 9 and has exactly 10 digits
        if (cleanedValue.length === 10 && cleanedValue.startsWith('9')) {
            input.style.borderColor = '';
        } else {
            input.style.borderColor = 'red';
        }
    }

    document.addEventListener("DOMContentLoaded", () => {
        const today = new Date();
        const options = {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        const formattedDate = today.toLocaleDateString('en-US', options); // Format to "Month Day, Year"

        // Set the formatted date as the value of the input
        document.getElementById('registration-date').value = formattedDate;
    });
</script>

<script>
    function SubmitPesoForm() {

        var formElement = document.getElementById('PesoForm');
        var formData = new FormData(formElement);
        formData.append('_token', '{{ csrf_token() }}');

        document.getElementById('loading').style.display = 'grid';


        $.ajax({
            type: "POST",
            url: '{{ route('savePesoForm') }}',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                document.getElementById('loading').style.display = 'none';
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.success,
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        formElement.reset();
                        form.classList.remove('secActive');

                        window.location.href =
                            '{{ route('profile') }}';
                    }
                });
            },

            error: function(xhr) {
                document.getElementById('loading').style.display = 'none';

                // Log the error details for debugging purposes
                console.error('AJAX Error:', xhr.status, xhr.statusText);
                console.error('Response Text:', xhr.responseText);

                // General user-friendly error message
                let errorMessage =
                    'Oops! Something went wrong while processing your request. Please try again later.';

                // Check for specific error messages from the server if available
                try {
                    const jsonResponse = JSON.parse(xhr.responseText);
                    errorMessage = jsonResponse.message ||
                    errorMessage; // Use a custom message if available
                } catch (e) {
                    console.error('Error parsing JSON:', e);
                }

                // Display the error message using SweetAlert
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: errorMessage,
                    confirmButtonText: 'OK'
                });
            }

        });
    }
</script>


<script>
    function UpdatePesoForm() {
        const data = document.getElementById('skills').value;
        var formElement = document.getElementById('PesoFormUpdate');
        var formData = new FormData(formElement);
        formData.append('_token', '{{ csrf_token() }}');

        document.getElementById('loading').style.display = 'grid';


        $.ajax({
            type: "POST",
            url: '{{ route('updatePesoForm') }}',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                document.getElementById('loading').style.display = 'none';
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.success,
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        formElement.reset();
                        form.classList.remove('secActive');

                        window.location.href =
                            '{{ route('profile') }}';
                    }
                });
            },

            error: function(xhr) {
                document.getElementById('loading').style.display = 'none';

                // Log the error details for debugging purposes
                console.error('AJAX Error:', xhr.status, xhr.statusText);
                console.error('Response Text:', xhr.responseText);

                // General user-friendly error message
                let errorMessage =
                    'Oops! Something went wrong while processing your request. Please try again later.';

                // Check for specific error messages from the server if available
                try {
                    const jsonResponse = JSON.parse(xhr.responseText);
                    errorMessage = jsonResponse.message ||
                    errorMessage; // Use a custom message if available
                } catch (e) {
                    console.error('Error parsing JSON:', e);
                }

                // Display the error message using SweetAlert
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: errorMessage,
                    confirmButtonText: 'OK'
                });
            }

        });
    }
</script>
