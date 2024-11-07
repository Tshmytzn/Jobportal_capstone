<script>
    function previewImage(event) {
    const file = event.target.files[0];
    const reader = new FileReader();
    
    reader.onload = function() {
        const image = document.getElementById('image-preview');
        image.src = reader.result;
        image.style.display = 'block'; // Show the image after upload
    };
    
    if (file) {
        reader.readAsDataURL(file); // Read the file as a data URL
    }
}

function uploadImage() {
    const fileInput = document.getElementById('file-upload');
    const file = fileInput.files[0];
    
    if (!file) {
        alert('Please select an image to upload.');
        return;
    }

    const formData = new FormData();
    formData.append('image', file); // Append the file to FormData
    
    // Send AJAX request to Laravel route
    axios.post('/upload-image', formData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })
    .then(response => {
        if (response.data.success) {
            alert('Image uploaded successfully!');
            // Optionally, you can show the uploaded image or take further actions
        } else {
            alert('Error: ' + response.data.error);
        }
    })
    .catch(error => {
        console.error('There was an error uploading the image:', error);
        alert('An error occurred while uploading the image.');
    });
}

</script>