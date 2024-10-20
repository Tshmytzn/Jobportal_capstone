<!DOCTYPE html>
<html lang="en">

@include('Jobseeker.components.head', ['title' => 'Agency Job List'])

<body>

    @include('Jobseeker.components.loading')

    @include('Jobseeker.components.spinner')

    @include('Jobseeker.components.navbar', ['active' => 'agencyjobslist'])

    @include('Jobseeker.components.header', ['title' => 'Agency Job List'])

    <!-- Search Bar -->
    <div class="search-bar container mt-2 mb-5">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
            <h4 class="mb-1 text-primary">Start Your Job Search Now</h4>
            <h2 class="display-7 mb-4">Filter Opportunities Based on Your Preferred and Trusted Agency

            </h2>

        </div>
        {{-- <form class="row g-3" method="GET" id="filterForm">
            @csrf
            <div class="col-md-4">
                <select class="form-select" name="employmenttype" onchange="searchfilterjobs()" id="employmenttype">
                    <option selected disabled>Employment Type</option>
                    <option value="">All Types</option>
                    <option value="Full Time">Full Time</option>
                    <option value="Part Time">Part Time</option>
                </select>
            </div>

            <div class="col-md-4">
                <select class="form-select" id="category" name="category" onchange="searchfilterjobs()" >
                    <option value="">All Categories</option>
                    <option selected disabled {{ is_null(request()->category) ? 'selected' : '' }}>Job Category</option>
                    @foreach ($jobCategories as $category)
                        <option value="{{ $category->id }}"
                            {{ request()->category == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4">
                <select class="form-select" name="joblocation" onchange="searchfilterjobs()">
                    <option selected disabled>Location</option>
                    <option value="">All Locations</option>
                    <option value="Bacolod">Bacolod</option>
                    <option value="Talisay">Talisay</option>
                    <option value="Victorias">Victorias</option>
                </select>
            </div>

        </form> --}}
    </div>
    {{-- Search bar end --}}

    <div class="container-fluid service py-2">
        <div class="container py-2">
            <div class="row g-4 justify-content-center mb-4" id="displayJobs">

            </div>
        </div>
    </div>

    @include('Jobseeker.components.footer')
    @include('Jobseeker.components.scripts')
    @include('Jobseeker.components.agencyjobsscript')

</body>

</html>
