<script>
    function submit(formID,route){
        document.getElementById('loading').style.display='grid';
        var formData = $(formID).serialize();

        $.ajax({
            url: route,
            type: "POST",
            data: formData,
            success: function(response) {
                if(response.status =='success'){
                document.getElementById('loading').style.display='none';
                  Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    document.getElementById(response.form).reset()
                     });
                }else{
                    document.getElementById('loading').style.display='none';
                     Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                   
                     });
                }
                },
            error: function(xhr, status, error) {
                var errors = xhr.responseJSON.errors;
                var errorMessage = '';

                $.each(errors, function(key, value) {
                    errorMessage += value + '<br>';
                });

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: errorMessage,
                    showConfirmButton: true
                });
            }
        });
    }
</script>