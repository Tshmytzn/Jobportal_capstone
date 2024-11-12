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


    document.getElementById("agency_province").addEventListener("change", function() {
        const selectedProvince = this.value;
        const cityDropdown = document.getElementById("agency_city");
        const baranggayDropdown = document.getElementById("agency_baranggay");

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

    document.getElementById("agency_city").addEventListener("change", function() {
        const selectedProvince = document.getElementById("agency_province").value;
        const selectedCity = this.value;
        const baranggayDropdown = document.getElementById("agency_baranggay");

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
    function loginAgency() {
        var formElement = document.getElementById('agencyloginform');
        var formData = new FormData(formElement);

        document.getElementById('loading').style.display = 'grid';

        $.ajax({
            type: "POST",
            url: '{{ route('LoginAgency') }}',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                document.getElementById('loading').style.display = 'none';

                if (response.status === 'error') {
                    Swal.fire('Error', response.message, 'error');
                } else if (response.status === 'checking') {
                    window.location.replace('/AgencyReview?id=' + response.user_id);
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
                document.getElementById('loading').style.display = 'none';

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

        document.getElementById('loading').style.display = 'grid';


        // Send the AJAX request
        $.ajax({
            type: "POST",
            url: '{{ route('RegisterAgency') }}',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                document.getElementById('loading').style.display = 'none';

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
                document.getElementById('loading').style.display = 'none';

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

<script>
    function formatTelephone(input) {
        let value = input.value.replace(/\D/g, '');

        if (value.length > 4) {
            value = value.slice(0, 4) + '-' + value.slice(4, 8);
        }

        if (value.length > 9) {
            value = value.slice(0, 9);
        }

        input.value = value;
    }
</script>
