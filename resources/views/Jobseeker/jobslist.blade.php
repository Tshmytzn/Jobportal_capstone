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
        <form class="row g-3">
            <div class="col-md-4">
                <input type="text" class="form-control" id="keyword" placeholder="Enter Keyword">
            </div>
            <div class="col-md-3">
                <select class="form-select" id="category">
                    <option selected>Category</option>
                    <option value="1">Construction</option>
                    <option value="2">Electrician</option>
                    <option value="3">Plumbing</option>
                    <option value="4">Welding and Metalwork</option>
                    <option value="5">Mechanical</option>
                    <option value="6">Driving and Transportation</option>
                    <option value="7">Warehouse and Custodial</option>
                    <option value="8">Gardening and Landscape</option>
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



    @include('Jobseeker.components.footer')

    @include('Jobseeker.components.scripts')


</body>

</html>
