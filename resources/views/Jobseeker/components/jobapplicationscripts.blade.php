<script>
    document.getElementById('applyButton').addEventListener('click', function(event) {
        const isLoggedIn = {{ session()->has('user_id') ? 'true' : 'false' }};
        const userId = {{ session('user_id') ?? 'null' }};

        if (!isLoggedIn) {
            event.preventDefault(); 
            $('#loginPromptModal').modal('show'); 
        } else {
            document.getElementById('userIdInput').value = userId;
            $('#applicationmodal').modal('show'); 
        }
    });
</script>
