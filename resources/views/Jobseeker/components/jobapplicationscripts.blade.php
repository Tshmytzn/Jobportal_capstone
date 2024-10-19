<script>

document.getElementById('applyButton').addEventListener('click', function(event) {
        // Pass the session status from Laravel to JavaScript using session()->has()
        const isLoggedIn = {{ session()->has('user_id') ? 'true' : 'false' }};

        if (!isLoggedIn) {
            event.preventDefault(); // Prevent the default action
            $('#loginPromptModal').modal('show'); // Show the login prompt modal
        } else {
            $('#applicationmodal').modal('show'); // Show the application modal if user is logged in
        }
    });
</script>