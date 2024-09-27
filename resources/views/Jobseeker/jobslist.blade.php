<!DOCTYPE html>
<html lang="en">

@include('Jobseeker.components.head', ['title' => 'Job List'])

<body>

    @include('Jobseeker.components.spinner')

    @include('Jobseeker.components.navbar', ['active' => 'jobslist'])

    @include('Jobseeker.components.header', ['title' => 'Job List'])

    <!-- Search Bar -->
    <div class="search-bar container mt-2 mb-5">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
            <h4 class="mb-1 text-primary">Start Your Job Search Now</h4>
            <h2 class="display-7 mb-4">Filter Opportunities Based on Your Skills and Preferences

            </h2>

        </div>
        <form class="row g-3" action="{{ route('filterJobs') }}" method="GET" id="filterForm">
            <div class="col-md-4">
                <select class="form-select" id="employment">
                    <option selected disabled>Employment Type</option>
                    <option value="Full Time">Full Time</option>
                    <option value="Part Time">Part Time</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select" id="category" name="category"
                    onchange="document.getElementById('filterForm').submit();">
                    <option disabled {{ is_null(request()->category) ? 'selected' : '' }}>Category</option>
                    @foreach ($jobCategories as $category)
                        <option value="{{ $category->id }}"
                            {{ request()->category == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select" id="location">
                    <option selected>Location</option>
                    <option value="1">Location 1</option>
                    <option value="2">Location 2</option>
                    <option value="3">Location 3</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Search</button>
            </div>
        </form>
    </div>
    {{-- Search bar end --}}

    <div class="container-fluid service py-2">
        <div class="container py-2">
            <div class="row g-4 justify-content-center">
                @if ($jobs->isEmpty())
                    <p>No jobs found for this category.</p>
                @else
                    @foreach ($jobs as $job)
                        <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item text-center rounded p-4">
                                <div class="service-icon d-inline-block bg-light rounded p-4 mb-4"
                                    style="height: 150px; width: 150px; overflow: hidden;">
                                    <img src="{{ asset('agencyfiles/job_image/' . $job->job_image) }}"
                                        alt="{{ $job->title }}" class="img-fluid"
                                        style="width: 150px; height: 150px; object-fit: cover;">
                                </div>
                                <div class="service-content">
                                    <h4 class="mb-4">{{ $job->job_title }}</h4>
                                    <p class="mb-2"><strong>Location:</strong> {{ $job->job_location }}</p>
                                    <p class="mb-2"><strong>Type:</strong> {{ $job->job_type }}</p>
                                    <p class="mb-4">{{ Str::limit(strip_tags($job->job_description), 30) }}</p>
                                    <a href="" class="btn btn-light rounded-pill text-primary py-2 px-4">Job
                                        Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    @include('Jobseeker.components.footer')
    @include('Jobseeker.components.scripts')

</body>

</html>
