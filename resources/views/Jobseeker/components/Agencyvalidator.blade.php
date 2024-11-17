<script>
    const agencyNameInput = document.getElementById("agency_name");
    const agencyNameError = document.getElementById("agency_name_error");

    agencyNameInput.addEventListener("blur", () => {
        if (agencyNameInput.value.trim() === "") {
            agencyNameInput.style.borderColor = "red";
            agencyNameError.style.display = "inline";
        } else {
            agencyNameError.style.display = "none";
        }
    });

    agencyNameInput.addEventListener("focus", () => {
        agencyNameInput.style.borderColor = "";
        agencyNameError.style.display = "none";
    });


    function validateField(input, errorElement) {
        if (input.value.trim() === "" || input.value === null) {
            input.style.borderColor = "red";
            errorElement.style.display = "inline";
        } else {
            input.style.borderColor = "";
            errorElement.style.display = "none";
        }
    }

    const provinceInput = document.getElementById("agency_province");
    const cityInput = document.getElementById("agency_city");
    const barangayInput = document.getElementById("agency_baranggay");
    const addressInput = document.getElementById("agency_address");

    const provinceError = document.getElementById("province_error");
    const cityError = document.getElementById("city_error");
    const barangayError = document.getElementById("barangay_error");
    const addressError = document.getElementById("address_error");

    provinceInput.addEventListener("blur", () => validateField(provinceInput, provinceError));
    cityInput.addEventListener("blur", () => validateField(cityInput, cityError));
    barangayInput.addEventListener("blur", () => validateField(barangayInput, barangayError));
    addressInput.addEventListener("blur", () => validateField(addressInput, addressError));

    [provinceInput, cityInput, barangayInput, addressInput].forEach(input => {
        input.addEventListener("focus", () => {
            input.style.borderColor = "";
            document.getElementById(`${input.id}_error`).style.display = "none";
        });
    });

    document.getElementById('email').addEventListener('input', function() {
        const email = this.value;
        const emailError = document.getElementById('emailError');
        const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

        if (!regex.test(email)) {
            emailError.style.display = 'block';
        } else {
            emailError.style.display = 'none';
        }
    });
</script>

<script>
    const emailInput = document.getElementById("email_address");
    const emailError = document.getElementById("email_error");
    const emailInvalidError = document.getElementById("email_invalid_error");

    // Utility function to validate email format
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Simple email regex
        return emailRegex.test(email);
    }

    // Validate on blur (check if empty)
    emailInput.addEventListener("blur", () => {
        if (emailInput.value.trim() === "") {
            emailInput.style.borderColor = "red"; // Set border color to red
            emailError.style.display = "inline";
            emailInvalidError.style.display = "none"; // Hide invalid email error
        } else {
            emailError.style.display = "none"; // Hide required error
        }
    });

    // Validate email format on input
    emailInput.addEventListener("input", () => {
        if (emailInput.value.trim() !== "" && !isValidEmail(emailInput.value)) {
            emailInput.style.borderColor = "red"; // Set border color to red
            emailInvalidError.style.display = "inline";
        } else {
            emailInvalidError.style.display = "none";
            emailInput.style.borderColor = ""; // Reset border color when valid
        }
    });

    // Reset border and errors on focus
    emailInput.addEventListener("focus", () => {
        emailInput.style.borderColor = ""; // Reset border color
        emailError.style.display = "none";
        emailInvalidError.style.display = "none";
    });
</script>

<script>
    const phoneInput = document.getElementById("contact_number");
    const phoneError = document.getElementById("phone_error");
    const phoneInvalidError = document.getElementById("phone_invalid_error");

    // Utility function to validate phone number format
    function isValidPhoneNumber(phone) {
        const phoneRegex = /^9\d{9}$/; // Matches numbers starting with 9 and exactly 10 digits
        return phoneRegex.test(phone);
    }

    // Validate on blur (check if empty)
    phoneInput.addEventListener("blur", () => {
        if (phoneInput.value.trim() === "") {
            phoneInput.style.borderColor = "red"; // Set border color to red
            phoneError.style.display = "inline";
            phoneInvalidError.style.display = "none"; // Hide invalid phone error
        } else {
            phoneError.style.display = "none"; // Hide required error
        }
    });

    // Validate phone number format on input
    phoneInput.addEventListener("input", () => {
        if (phoneInput.value.trim() !== "" && !isValidPhoneNumber(phoneInput.value)) {
            phoneInput.style.borderColor = "red"; // Set border color to red
            phoneInvalidError.style.display = "inline";
        } else {
            phoneInvalidError.style.display = "none";
            phoneInput.style.borderColor = ""; // Reset border color when valid
        }
    });

    // Reset border and errors on focus
    phoneInput.addEventListener("focus", () => {
        phoneInput.style.borderColor = ""; // Reset border color
        phoneError.style.display = "none";
        phoneInvalidError.style.display = "none";
    });
</script>

<script>
    const landlineInput = document.getElementById("landline_number");
    const landlineError = document.getElementById("landline_error");
    const landlineInvalidError = document.getElementById("landline_invalid_error");

    // Utility function to validate landline number format
    function isValidLandlineNumber(landline) {
        const landlineRegex = /^\d{4}-\d{4}$/; // Matches format 1234-5678
        return landlineRegex.test(landline);
    }

    // Validate on blur (check if empty)
    landlineInput.addEventListener("blur", () => {
        if (landlineInput.value.trim() === "") {
            landlineInput.style.borderColor = "red"; // Set border color to red
            landlineError.style.display = "inline";
            landlineInvalidError.style.display = "none"; // Hide invalid format error
        } else {
            landlineError.style.display = "none"; // Hide required error
        }
    });

    // Validate landline number format on input
    landlineInput.addEventListener("input", () => {
        if (landlineInput.value.trim() !== "" && !isValidLandlineNumber(landlineInput.value)) {
            landlineInput.style.borderColor = "red"; // Set border color to red
            landlineInvalidError.style.display = "inline";
        } else {
            landlineInvalidError.style.display = "none";
            landlineInput.style.borderColor = ""; // Reset border color when valid
        }
    });

    // Reset border and errors on focus
    landlineInput.addEventListener("focus", () => {
        landlineInput.style.borderColor = ""; // Reset border color
        landlineError.style.display = "none";
        landlineInvalidError.style.display = "none";
    });
</script>

<script>
    const geoCoverageDropdown = document.getElementById("geo_coverage");
    const geoCoverageError = document.getElementById("geo_coverage_error");
    const employeeCountDropdown = document.getElementById("employee_count");
    const employeeCountError = document.getElementById("employee_count_error");

    // Validate Geographical Coverage Dropdown
    geoCoverageDropdown.addEventListener("blur", () => {
        if (geoCoverageDropdown.value === "") {
            geoCoverageDropdown.style.borderColor = "red";
            geoCoverageError.style.display = "inline";
        } else {
            geoCoverageDropdown.style.borderColor = "";
            geoCoverageError.style.display = "none";
        }
    });

    geoCoverageDropdown.addEventListener("focus", () => {
        geoCoverageDropdown.style.borderColor = "";
        geoCoverageError.style.display = "none";
    });

    // Validate Number of Employees Dropdown
    employeeCountDropdown.addEventListener("blur", () => {
        if (employeeCountDropdown.value === "") {
            employeeCountDropdown.style.borderColor = "red";
            employeeCountError.style.display = "inline";
        } else {
            employeeCountDropdown.style.borderColor = "";
            employeeCountError.style.display = "none";
        }
    });

    employeeCountDropdown.addEventListener("focus", () => {
        employeeCountDropdown.style.borderColor = "";
        employeeCountError.style.display = "none";
    });
</script>

<script>
    const passwordInput = document.getElementById("password");
    const confirmPasswordInput = document.getElementById("confirm_password");
    const passwordError = document.getElementById("password_error");
    const confirmPasswordError = document.getElementById("confirm_password_error");
    const passwordMismatchError = document.getElementById("password_mismatch_error");

    // Check if password is filled
    passwordInput.addEventListener("blur", () => {
        if (passwordInput.value.trim() === "") {
            passwordInput.style.borderColor = "red";
            passwordError.style.display = "inline";
        } else {
            passwordError.style.display = "none";
            passwordInput.style.borderColor = "";
        }
    });

    // Check if confirm password is filled
    confirmPasswordInput.addEventListener("blur", () => {
        if (confirmPasswordInput.value.trim() === "") {
            confirmPasswordInput.style.borderColor = "red";
            confirmPasswordError.style.display = "inline";
        } else {
            confirmPasswordError.style.display = "none";
            confirmPasswordInput.style.borderColor = "";
        }
    });

    // Check if passwords match on input
    confirmPasswordInput.addEventListener("input", () => {
        if (passwordInput.value !== confirmPasswordInput.value) {
            passwordMismatchError.style.display = "inline";
            confirmPasswordInput.style.borderColor = "red";
        } else {
            passwordMismatchError.style.display = "none";
            confirmPasswordInput.style.borderColor = "";
        }
    });

    // Reset error styles on focus
    passwordInput.addEventListener("focus", () => {
        passwordInput.style.borderColor = "";
        passwordError.style.display = "none";
    });

    confirmPasswordInput.addEventListener("focus", () => {
        confirmPasswordInput.style.borderColor = "";
        confirmPasswordError.style.display = "none";
        passwordMismatchError.style.display = "none";
    });
</script>


