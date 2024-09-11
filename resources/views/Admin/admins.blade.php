    <!DOCTYPE html>
    <html lang="en">

    @include('Admin.components.head', ['title' => 'Administrators'])

    <body class="g-sidenav-show  bg-gray-100">

        @include('Admin.components.aside', ['active' => 'Administrators'])

        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            @include('Admin.components.navbar', ['headtitle' => 'Administrators'], ['pagetitle' => 'Admin'])        
            <!-- End Navbar -->

            {{-- cards --}}
            <div class="container-fluid py-0 m-2">
                <div class="row m-2">
                        <a href="" data-bs-toggle="modal" data-bs-target="#addNewAdminModal">
                            <button class="btn bgp-gradient text-white">Add New Admin</button>
                        </a>

                        <table id="example" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Contact Number</th>
                                <th>Date Added</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($admins->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center">No admin accounts available.</td>
                            </tr>
                        @else
                            @foreach ($admins as $admin)
                                <tr>
                                    <td>{{$admin->id}}</td>
                                    <td>{{$admin->admin_name}}</td>
                                    <td>{{$admin->admin_email}}</td>
                                    <td>{{$admin->admin_mobile}}</td>
                                    <td>{{$admin->created_at}}</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>                            
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    
                </div>
                @include('Admin.components.footer')
            </div>
        </main>
        @include('Admin.components.scripts')
    
        <script>
            $(document).ready(function() {
                
                // Real-time validation for the name field (letters and spaces only)
                $('#adminFullName').on('input', function() {
                    const nameValue = $(this).val();
                    const validName = /^[a-zA-Z\s]*$/;
                    if (!validName.test(nameValue)) {
                        alert('Name can only contain letters and spaces.');
                        $(this).val(nameValue.replace(/[^a-zA-Z\s]/g, ''));
                    }
                });
        
                // Real-time validation for the mobile number (digits only, max length 10)
                $('#adminMobile').on('input', function() {
                    const mobileValue = $(this).val();
                    const validNumber = /^[0-9]*$/;
                    if (!validNumber.test(mobileValue) || mobileValue.length > 10) {
                        alert('Mobile number can only contain digits and must be 10 digits long.');
                        $(this).val(mobileValue.replace(/[^0-9]/g, '').slice(0, 10));
                    }
                });
        
                // Real-time validation for email format
                $('#adminEmail').on('blur', function() {
                    const emailValue = $(this).val();
                    const validEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        
                    if (!validEmail.test(emailValue)) {
                        alert('Please enter a valid email address.');
                        $(this).val(''); // Optionally clear the field if the email is invalid
                    }
                });
        
                // Real-time validation for password match
                $('#adminConfirmPassword').on('input', function() {
                    const password = $('#adminPassword').val();
                    const confirmPassword = $(this).val();
                    if (password !== confirmPassword) {
                        this.setCustomValidity('Passwords do not match');
                    } else {
                        this.setCustomValidity('');
                    }
                });
        
                // Handle form submission
                $('#submitAdminForm').on('click', function(event) {
                    event.preventDefault();
        
                    const formData = {
                        name: $('#adminFullName').val(),
                        contact_number: $('#adminMobile').val(),
                        email: $('#adminEmail').val(),
                        password: $('#adminPassword').val(),
                        password_confirmation: $('#adminConfirmPassword').val()
                    };
        
                    // Check if passwords match before submission
                    if (formData.password !== formData.password_confirmation) {
                        alert('Passwords do not match!');
                        return;
                    }
        
                    // Submit the form via fetch
                    fetch('{{ route('createAdmin') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': $('input[name="_token"]').val()
                        },
                        body: JSON.stringify(formData)
                    })
                    .then(response => {
                        const contentType = response.headers.get("content-type");
                        if (contentType && contentType.includes("application/json")) {
                            return response.json();
                        } else {
                            return response.text().then(text => { throw new Error(text); });
                        }
                    })
                    .then(data => {
                        if (data.success) {
                            alert('Admin created successfully.');
        
                            // Clear the form fields
                            $('#adminForm')[0].reset();
        
                            // Close the modal
                            const modal = new bootstrap.Modal(document.getElementById('addNewAdminModal'));
                            modal.hide();
        
                            // Optionally, refresh the page or update the table of admins
                            location.reload();
                        } else {
                            alert('Error creating admin: ' + data.error);
                        }
                    })
                    .catch((error) => {
                        console.error('Error:', error);
                        alert('An error occurred: ' + error.message);
                    });
                });
            });
        </script>
        
    </body>

    </html>
