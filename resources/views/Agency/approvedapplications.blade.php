<!DOCTYPE html>
<html lang="en">

@include('Agency.components.head', ['title' => 'Approved Applications'])

<body class="g-sidenav-show  bg-gray-100">

    @include('Agency.components.aside', ['active' => 'approvedapplications'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('Agency.components.navbar', ['headtitle' => 'Approved Applications'], ['pagetitle' => 'Agency'])
        <!-- End Navbar -->

        {{-- cards --}}
        <div class="container-fluid py-4">
            <div class="row mb-5 ms-5 me-5">

                @php
                use App\Models\JobseekerApplication;
                use App\Models\Jobseeker;
            
                $applications = JobseekerApplication::where('js_status', 'hired')->get();
            @endphp
            
            @foreach ($applications as $application)
                @php
                    $job = \App\Models\JobDetails::where('id', $application->job_id)->first();
                    $jobName = $job->job_title ?? 'No job name found';
                    $jobseeker = Jobseeker::find($application->js_id);
                @endphp
            
                <div class="card m-2" style="width: 15rem; height: auto;">
                    
                    {{-- Jobseeker Image --}}
                    @if ($jobseeker && $jobseeker->js_image)
                        <img src="{{ asset('jobseeker_profile/' . $jobseeker->js_image) }}" class="card-img-top mx-auto mt-2" alt="Jobseeker Image">
                    @else
                        <p>No image available</p>
                    @endif
            
                    <div class="card-body">
                        <h5 class="card-title text-center"
                            style="font-size: 1rem; background: linear-gradient(to right, purple, #8A2BE2); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                            {{ $application->applicant_name }}
                        </h5>
                        <hr class="mt-3 mb-3"
                            style="border: none; height: 2px; background-image: linear-gradient(to right, rgb(128, 0, 0), #7a0000);">
                        <p class="card-text" style="font-size: 0.7rem;"><strong>Position:</strong> {{ $jobName }}</p>
                        <p class="card-text" style="font-size: 0.7rem;"><strong>Application Date:</strong> {{ $application->created_at->format('Y-m-d') }}</p>
                        <p class="card-text" style="font-size: 0.7rem;">
                            <strong>Status:</strong>
                            <span style="color: 
                                @if ($application->js_status === 'pending') orange
                                @elseif($application->js_status === 'hired') green
                                @elseif($application->js_status === 'Rejected') red
                                @else gray @endif; font-weight: bold;">
                                <i class="fas fa-hourglass-half ms-2" style="margin-right: 5px;"></i>
                                {{ $application->js_status ?? 'No Status' }}
                            </span>
                        </p>
                        <p class="card-text" style="font-size: 0.7rem;"><strong>Email:</strong> {{ $application->applicant_email }}</p>
                    </div>
                </div>
            @endforeach
            

            </div>
            @include('Agency.components.footer')
        </div>
    </main>
    @include('Agency.components.scripts')
</body>

</html>
