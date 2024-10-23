<!DOCTYPE html>
<html lang="en">

@include('Jobseeker.components.head', ['title' => 'Profile'])

<style>
    .badge-placeholder {
        width: 150px;
        height: 150px;
        border: 5px dotted red;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: white;
        color: red;
        font-size: 2rem;
        margin: 30px auto;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
    .card-custom {
        background-color: white;
        border: 2px solid red;
        border-radius: 10px;
    }
    .card-title {
        color: red;
        margin-bottom: 15px;
    }
    .card-text {
        margin-bottom: 20px;
    }
</style>

<body>

    @include('Jobseeker.components.loading')

    @include('Jobseeker.components.spinner')

    @include('Jobseeker.components.navbar')

    @include('Jobseeker.components.header', ['title' => 'Profile'])

    <div class="container mb-5">
        <div class="row">

            {{-- <div class="mb-5">
                <a href="{{ route('pesoform') }}">
                <button class="btn btn-primary w-100"> Complete PESO Registration Form</button>
            </a>
            </div> --}}
            <!-- Profile Picture and Info -->
            <div class="card col-md-4">
                <div class="text-center">
                    <div class="card-body">
                        <img src="{{ asset('../assets/img/team-1.jpg') }}" alt="profile_image"
                            class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                        <h5 class="card-title">{{ $jobseeker->js_firstname . ' ' . $jobseeker->js_lastname }}</h5>
                        <!-- Replace with dynamic jobseeker name -->
                        <p class="text-muted">Job Seeker</p>
                        {{-- <button class="btn btn-outline-primary btn-sm w-100">Update Profile Picture</button> --}}
                    </div>
                </div>
                <div class="container">
                    <div class="card card-custom mb-4">
                        <div class="card-body text-center">
                            <h5 class="card-title">Skill Assessment Badge</h5>
                            <p class="card-text">Your assessment badge will be displayed here.</p>
                            <div class="badge-placeholder">
                                <span>Badge</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Update Profile Info -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="display-7"> <strong>Profile Information</strong></h4>
                        <div>
                            <a href="{{ route('pesoform') }}" class="me-3" title="Edit Profile">
                                <i style="font-size: 20px" class="fas fa-edit"></i>
                            </a>
                            <a href="#" title="Print Profile">
                                <i style="font-size: 20px" class="fas fa-print"></i>
                            </a>
                        </div>
                    </div>
                    <img src="{{ asset('img/pf.png') }}" alt="">
                </div>

            </div>
        </div>
    </div>

    @include('Jobseeker.components.footer')
    @include('Jobseeker.components.jsAuthscripts')
    @include('Jobseeker.components.scripts')

</body>

</html>
