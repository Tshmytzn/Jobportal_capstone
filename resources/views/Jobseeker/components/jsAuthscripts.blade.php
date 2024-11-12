<script>
    // Data for cities and their respective barangays by province
    const citiesByProvince = {
    "Aklan": {
        "Kalibo": ["Andagao", "Bachaw Norte", "Bachaw Sur", "Bulwang", "Poblacion", "Tigayon", "Tinigao"],
        "Malay": ["Caticlan", "Manoc-Manoc", "Balabag", "Argao", "Cubay Sur", "Naasug", "Yapak"],
        "Numancia": ["Albasan", "Badio", "Bacong", "Camanci", "Navitas", "Poblacion", "Laguinbanua East"],
        "Ibajay": ["Agdugayan", "Agcuyawan", "Bugtong", "Poblacion", "Santa Cruz", "Tabon", "Maloco"],
        "Banga": ["Agcawilan", "Cortes", "Jumarap", "Morocoro", "Venturanza", "Poblacion", "Sibalew"]
    },
    "Antique": {
        "San Jose": ["Barangay 1", "Barangay 2", "Barangay 3", "Barangay 4", "Barangay 5", "Barangay 6", "Barangay 7"],
        "Sibalom": ["Bongbongan I", "Bongbongan II", "Bugnay", "Igbucagay", "Pasong", "Poblacion", "Villafont"],
        "Hamtic": ["Binangbang Centro", "Binangbang Ilaya", "Casanayan", "Caridad", "Cubay", "Guintas", "Poblacion"],
        "Tobias Fornier": ["Batuan", "Bagumbayan", "Balud I", "Balud II", "Igpanolong", "Pasong", "San Juan"],
        "Patnongon": ["Amparo", "Apdo", "Aureliana", "Camarines", "Padang", "Poblacion", "Tigbalua"]
    },
    "Capiz": {
        "Roxas City": ["Bago", "Balijuagan", "Banica", "Dinginan", "Jumabong", "Lonoy", "Poblacion"],
        "Panay": ["Agbabadiang", "Agkilo", "Bailan", "Poblacion Ilawod", "Poblacion Ilaya", "Talon", "Pawa"],
        "Pilar": ["Binaobawan", "Culilang", "Natividad", "Poblacion", "San Blas", "San Esteban", "San Nicolas"],
        "Ivisan": ["Agmalobo", "Balaring", "Cabugao", "Malocloc Norte", "Malocloc Sur", "Poblacion", "Santa Cruz"],
        "Dumalag": ["Aglimocon", "Bato", "Concepcion", "Duran", "San Juan", "San Rafael", "Poblacion"]
    },
    "Guimaras": {
        "Jordan": ["Alaguisoc", "Balcon Maravilla", "Balcon Melliza", "Hoskyn", "Poblacion", "San Miguel", "Santa Teresa"],
        "Buenavista": ["Avila", "Banban", "Cabano", "Dagsaan", "East Valencia", "Getulio", "Poblacion"],
        "Nueva Valencia": ["Canhawan", "Concordia", "Dolores", "Igang", "La Paz", "Magamay", "Poblacion"],
        "San Lorenzo": ["Agsanayan", "Ayangan", "Cabalagnan", "M. Chavez", "Poblacion", "San Enrique", "Suclaran"],
        "Sibunag": ["Alegria", "Bubog", "Concordia", "Dasal", "Inampulugan", "Poblacion", "Tanglad"]
    },
    "Iloilo": {
        "Iloilo City": ["Aduana", "Aripdip", "Baldoza", "Bantud", "Calaparan", "Calumpang", "Jalandoni Estate"],
        "Oton": ["Abilay Norte", "Abilay Sur", "Agbabadiang", "Botong", "Calam-Isan", "Cagbang", "Poblacion South"],
        "Pototan": ["Agcuyawan", "Agdahon", "Amamaros", "Igang", "Poblacion", "Rumbang", "Zarrague"],
        "Passi City": ["Aglalana", "Agupalo Este", "Agupalo Oeste", "Agtabo", "Agtambi", "Maasin", "Poblacion"],
        "Santa Barbara": ["Agutayan", "Bagumbayan", "Bakhaw", "Bancal", "Catoogan", "Daga", "Poblacion"]
    },
    "Negros Occidental": {
        "Bacolod": ["Alijis", "Banago", "Barangay 1", "Barangay 2", "Barangay 3", "Barangay 4", "Barangay 5"],
        "Bago": ["Atipuluan", "Balingasag", "Binubuhan", "Bunga", "Calumangan", "Don Jorge Araneta", "Poblacion"],
        "Cadiz": ["Andres Bonifacio", "Banquerohan", "Burgos", "Cabahug", "Caduha-an", "Daga", "Poblacion"],
        "Escalante": ["Alimango", "Arac", "Balintawak", "Cervantes", "Japitan", "Poblacion", "Washington"],
        "Sagay": ["Bato", "Bulanon", "Carmen", "Colonia Divina", "Lopez Jaena", "Poblacion", "Vito"]
    }
};


    document.getElementById("province").addEventListener("change", function() {
        const selectedProvince = this.value;
        const cityDropdown = document.getElementById("city");
        const baranggayDropdown = document.getElementById("baranggay");

        cityDropdown.innerHTML = '<option value="" disabled selected>Select City</option>';
        baranggayDropdown.innerHTML = '<option value="" disabled selected>Select Barangay</option>';

        if (selectedProvince && citiesByProvince[selectedProvince]) {
            Object.keys(citiesByProvince[selectedProvince]).forEach(city => {
                const option = document.createElement("option");
                option.value = city;
                option.textContent = city;
                cityDropdown.appendChild(option);
            });
        }
    });

    document.getElementById("city").addEventListener("change", function() {
        const selectedProvince = document.getElementById("province").value;
        const selectedCity = this.value;
        const baranggayDropdown = document.getElementById("baranggay");

        // Clear previous barangay options
        baranggayDropdown.innerHTML = '<option value="" disabled selected>Select Barangay</option>';

        // Populate barangay dropdown
        if (selectedProvince && selectedCity && citiesByProvince[selectedProvince][selectedCity]) {
            citiesByProvince[selectedProvince][selectedCity].forEach(baranggay => {
                const option = document.createElement("option");
                option.value = baranggay;
                option.textContent = baranggay;
                baranggayDropdown.appendChild(option);
            });
        }
    });
    </script>

<script>
    function loginJobseeker() {

        document.getElementById('loading').style.display='grid';

        var formElement = document.getElementById('jobseekerloginform');
        var formData = new FormData(formElement);

        $.ajax({
            type: "POST",
            url: '{{ route('LoginJobseeker') }}',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {

                if (response.status === 'error') {
                    document.getElementById('loading').style.display='none';

                    Swal.fire('Error', response.message, 'error');

                } else {
                    document.getElementById('loading').style.display='none';

                    Swal.fire({
                        title: 'Success',
                        text: response.message,
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1000
                    }).then(() => {
                        window.location.href = '{{ route('homepage') }}';
                    });
                }
            },
            error: function(xhr) {
                document.getElementById('loading').style.display='none';

                console.error('AJAX Error:', xhr.responseText);
                Swal.fire('Error', 'Invalid Credentials.', 'error');
            }
        });
    }
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {

        $('input[name="firstname"], input[name="midname"], input[name="lastname"], input[name="suffix"]').on(
            'input',
            function(e) {
                this.value = this.value.replace(/[^A-Za-z\s-]/g, '');
            });


        $('#jobseekerForm').on('submit', function(event) {
            event.preventDefault();
            document.getElementById('loading').style.display='grid';


            $.ajax({
                url: "{{ route('jobseekersCreate') }}",
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    document.getElementById('loading').style.display='none';

                    Swal.fire({
                        title: 'Success',
                        text: response.message,
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1000
                    }).then(() => {

                        document.getElementById('jobseekerForm').reset();
                        window.location.href = "{{ route('login') }}";
                    });
                },

                error: function(xhr) {
                    document.getElementById('loading').style.display='none';
                    var errors = xhr.responseJSON.errors;
                    var errorMessages = '';
                    $.each(errors, function(key, value) {
                        errorMessages += value[0] + '<br>';
                    });

                    Swal.fire({
                        title: 'Error!',
                        html: errorMessages,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#updateJobseekerInfo').on('submit', function(event) {
            event.preventDefault();

            document.getElementById('loading').style.display = 'grid';


            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        document.getElementById('loading').style.display = 'none';

                        Swal.fire({
                            title: 'Success',
                            text: response.message,
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else {
                        document.getElementById('loading').style.display = 'none';
                        Swal.fire({
                            title: 'Failed',
                            text: 'Update failed. Please try again.',
                            icon: 'error',
                            showConfirmButton: true
                        });
                    }
                },
                error: function(xhr, status, error) {
                    document.getElementById('loading').style.display = 'none';

                    Swal.fire({
                        title: 'Error',
                        text: 'An error occurred: ' + error,
                        icon: 'error',
                        showConfirmButton: true
                    });
                }

            });
        });
    });
</script>

<script>
    document.getElementById('js_changePasswordForm').addEventListener('submit', function(e) {
        e.preventDefault();

        var currentPassword = document.getElementById('js_currentPassword').value;
        var newPassword = document.getElementById('js_newPassword').value;
        var confirmPassword = document.getElementById('js_confirmPassword').value;

        if (newPassword !== confirmPassword) {
            alert('New passwords do not match');
            return;
        }

        $.ajax({
            url: '{{ route('updateJsPassword') }}',
            type: 'POST',
            data: {
                currentPassword: currentPassword,
                newPassword: newPassword,
                newPassword_confirmation: confirmPassword,
                id: '{{ session('user_id') }}',
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                alert(response.success);
                // Clear the form fields after successful update
                document.getElementById('js_changePasswordForm').reset();
            },
            error: function(xhr) {
                var errors = xhr.responseJSON.errors;
                var errorMessages = '';
                if (errors) {
                    for (var key in errors) {
                        errorMessages += errors[key] + '\n';
                    }
                } else {
                    errorMessages = 'Current password is incorrect!';
                }
                alert(errorMessages);
            }
        });
    });
</script>

<!-- Ensure you include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
