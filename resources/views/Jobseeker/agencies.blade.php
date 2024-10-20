<!DOCTYPE html>
<html lang="en">

@include('Jobseeker.components.head', ['title' => 'Agency'])

<body>

    @include('Jobseeker.components.spinner')

    @include('Jobseeker.components.navbar', ['active' => 'agencies'])

    @include('Jobseeker.components.header', ['title' => 'Agencies'])

    <!-- Search Bar -->
    <div class="search-bar container mt-2 mb-5">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
            <h4 class="mb-1 text-primary">Start Your Job Search Now</h4>
            <h2 class="display-7 mb-4">Filter Agencies Based on Your Industry and Location Preferences</h2>
            </h2>

        </div>
        {{-- <form class="row g-3">
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
        </form> --}}
    </div>
    {{-- Search bar end --}}

    <!-- Agency Start -->
    <div class="container-fluid blog py-2">
        <div class="container py-2">
            <div class="d-flex flex-column">

                @foreach ($agency as $agencylist)
                    <div class="d-flex align-items-center mb-3 wow fadeInUp" data-wow-delay="0.1s"
                        style="height: 150px;">
                        <div class="agency-img" style="width: 150px;">
                            <img src="{{ asset('agency_profile/' . $agencylist->agency_image) }}"
                                alt="{{ $agencylist->agency_name }}" style="width: 150px; height: 150px;">
                        </div>
                        <div class="agency-content text-dark border p-3 d-flex justify-content-between w-100 ms-3">
                            <div class="content">
                                <h5 class="mb-2">{{ $agencylist->agency_name }}</h5>
                                <p class="mb-2">{{ $agencylist->email_address }}</p>
                                <div class="row d-flex justify-content-between">
                                    <div class="col-5 d-flex align-items-center">
                                        <i class="fa fa-mobile-alt mr-2"></i>
                                        <span class="small"> {{ $agencylist->contact_number }}</span>
                                    </div>
                                    <div class="col-7 d-flex align-items-center">
                                        <i class="fa fa-phone mr-2"></i> <span class="small">{{ $agencylist->landline_number }}</span>
                                    </div>
                                </div>

                            </div>
                            <div class="ms-auto align-self-center">
                                <a href="{{ route('agencyjobs') }}?agencyid={{ $agencylist->id }}" class="btn btn-light rounded-pill text-primary py-2 px-4">See Jobs</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Agency End -->

    @include('Jobseeker.components.footer')

    @include('Jobseeker.components.scripts')


</body>

</html>
