<!DOCTYPE html>
<html lang="en">

@include('Jobseeker.components.head', ['title' => 'Job Portal'])

<style>
    .card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: scale(1.05);
    }

    .card-header {
        background: linear-gradient(135deg, #007bff, #6c757d);
        color: white;
        padding: 1rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .job-title {
        font-size: 1.25rem;
        font-weight: bold;
    }

    .company-name {
        font-size: 0.9rem;
        font-weight: 500;
    }

    .card-body {
        padding: 1rem;
    }

    .status-icon {
        font-size: 1.5rem;
        color: #28a745;
        margin-right: 0.5em;
    }

    .timeline {
        margin-top: 1rem;
    }

    .timeline-step {
        display: flex;
        align-items: center;
        margin-bottom: 0.5em;
    }

    .timeline-step .circle {
        width: 12px;
        height: 12px;
        background-color: #ced4da;
        border-radius: 50%;
        margin-right: 0.5em;
    }

    .timeline-step.active .circle {
        background-color: #28a745;
    }

    .step-label {
        font-size: 0.85rem;
    }

    #progressbar {
        display: flex;
        justify-content: space-between;
        padding: 0;
        list-style: none;
        margin: 0;
    }

    #progressbar li {
        text-align: center;
        font-size: 0.9rem;
        width: 100%;
        position: relative;
        color: #6c757d;
    }

    #progressbar li.active {
        font-weight: bold;
        color: #28a745;
    }

    .progress {
        height: 8px;
        border-radius: 5px;
        background-color: #ced4da;
        position: relative;
        margin-bottom: 1em;
    }

    .progress-bar {
        border-radius: 5px;
        background-color: #28a745;
    }
</style>

<body>

    @include('Jobseeker.components.spinner')

    @include('Jobseeker.components.navbar', ['active' => 'blank'])

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <ul class="breadcrumb-animation">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="container text-center py-1" style="max-width: 900px;">
            <h3 class="h1 mb-1 wow fadeInDown" data-wow-delay="0.1s"> Job Applications Status</h3>
            <!-- Reduced to h5 and mb-1 -->
            <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Track the status of each application at a
                        glance </li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Progress Bar for Job Application -->
    <div class="container my-5">
        <div class="row mb-2">


            @php
                use App\Models\JobseekerApplication;

                $applications = JobseekerApplication::where('js_id', session('user_id'))
                    ->with(['job.agency']) 
                    ->get();
            @endphp

            @foreach ($applications as $application)
                <div class="card col-4 mx-auto mb-5" style="width: 400px;">
                    <div class="card-header">
                        <div>
                            <div class="job-title">{{ $application->job->job_title ?? 'Job Title Not Found' }}</div>
                            <div class="company-name">
                                {{ $application->job->agency->agency_name ?? 'Agency Name Not Found' }}</div>
                        </div>
                        <span class="status-icon">⚡</span>
                    </div>
                    <div class="card-body">
                        <p>Location: <strong>{{ $application->job->job_location ?? 'Location Not Available' }}</strong>
                        </p>
                        <p>Applied on: <strong>{{ $application->created_at->format('M d, Y') }}</strong></p>
                        <div class="timeline">
                            {{-- Pending Application --}}
                            <div class="timeline-step {{ $application->js_status == 'pending' ? 'active' : '' }}">
                                <div class="circle"></div>
                                <span class="step-label">Pending Application</span>
                            </div>

                            {{-- Disqualified --}}
                            <div class="timeline-step {{ $application->js_status == 'disqualified' ? 'active' : '' }}">
                                <div class="circle"></div>
                                <span class="step-label">Disqualified</span>
                            </div>

                            {{-- Screening --}}
                            <div class="timeline-step {{ $application->js_status == 'qualified' ? 'active' : '' }}">
                                <div class="circle"></div>
                                <span class="step-label">Screening</span>
                            </div>

                             {{-- Declined --}}
                             <div class="timeline-step {{ $application->js_status == 'declined' ? 'active' : '' }}">
                                <div class="circle"></div>
                                <span class="step-label">Declined</span>
                            </div>

                            {{-- Hired --}}
                            <div class="timeline-step {{ $application->js_status == 'hired' ? 'active' : '' }}">
                                <div class="circle"></div>
                                <span class="step-label">Hired</span>
                            </div>


                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>


    @include('Jobseeker.components.footer')

    @include('Jobseeker.components.scripts')


</body>

</html>
