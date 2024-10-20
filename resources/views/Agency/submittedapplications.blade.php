<!DOCTYPE html>
<html lang="en">

@include('Agency.components.head', ['title' => 'Submitted Applications'])

<body class="g-sidenav-show  bg-gray-100">

    @include('Agency.components.aside', ['active' => 'submittedapps'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include(
            'Agency.components.navbar',
            ['headtitle' => 'Submitted Applications'],
            ['pagetitle' => 'Agency']
        )
        <!-- End Navbar -->

        {{-- cards --}}
        <div class="container-fluid py-4">
            <div class="row mb-5 ms-5 me-5">
                
                <div class="card" style="width: 18rem; height: auto; padding: 10px; margin: 10px;">
                    <img src="{{ asset('admin_profile/default.jpg') }}" class="card-img-top mx-auto" alt="Job Seeker"
                        style="height:8rem; width:8rem; margin-bottom: 10px;">
                    <div class="card-body">
                        <h5 class="card-title text-center"
                            style="font-size: 1.5rem; background: linear-gradient(to right, purple, #8A2BE2); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                            John Doe
                        </h5>
                        <hr class="mt-3 mb-3"
                            style="border: none; height: 2px; background-image: linear-gradient(to right, rgb(128, 0, 0), #7a0000);">
                        <p class="card-text" style="font-size: 0.9rem;"><strong>Position:</strong> Electrician </p>
                        <p class="card-text" style="font-size: 0.9rem;"><strong>Application Date:</strong> 2024-10-20
                        </p>
                        <p class="card-text" style="font-size: 0.9rem;">
                            <strong>Status:</strong>
                            <span style="color: orange; font-weight: bold;">
                                <i class="fas fa-hourglass-half ms-2" style="margin-right: 5px;"></i>
                                Under Review
                            </span>
                        </p>
                        <p class="card-text" style="font-size: 0.9rem;"><strong>Email:</strong> johndoe@example.com</p>
                        <div class="text-center mt-4">
                            <a href="#" class="btn btn-primary btn-md">View Resume</a>
                        </div>
                    </div>
                </div>



            </div>
            @include('Agency.components.footer')
        </div>
    </main>
    @include('Agency.components.scripts')
</body>

</html>
