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

    $(document).ready(function() {

        $('.summernote').each(function() {
            $(this).summernote({
                height: 200,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                placeholder: 'Start typing here...'
            });
        });
    });
</script>
