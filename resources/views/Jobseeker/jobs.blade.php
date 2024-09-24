<!DOCTYPE html>
<html lang="en">

@include('Jobseeker.components.head', ['title' => 'Jobs'])

<body>

    @include('Jobseeker.components.spinner')

    @include('Jobseeker.components.navbar', ['active' => 'jobs'])

    @include('Jobseeker.components.header', ['title' => 'Job Categories'])


    <!-- job category Start -->
    <div class="container-fluid service py-2">
        <div class="container py-2">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
                <h4 class="mb-1 text-primary">Opportunities for Blue-Collar Workers</h4>
                <h1 class="display-5 mb-4">Featured Job Categories</h1>

            </div>
            <div class="row g-4 justify-content-center">
                <div class="row g-4 justify-content-center">
                    @foreach ($jobCategories as $category)
                        <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item text-center rounded p-4">
                                <div class="service-icon d-inline-block bg-light rounded p-4 mb-4">
                                    <img src="{{ asset('job_categories/' . $category->image) }}"
                                        alt="{{ $category->name }}" class="img-fluid"
                                        style="width: 150px; height: 150px; object-fit: cover;">

                                </div>
                                <div class="service-content">
                                    <h4 class="mb-4">{{ $category->name }}</h4>
                                    <p class="mb-4">{{ Str::limit($category->description, 25, '...') }}</p>
                                    <!-- Truncate description here -->
                                    <a href="#" class="btn btn-light rounded-pill text-primary py-2 px-4">See
                                        Jobs</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- job category End -->

    @include('Jobseeker.components.footer')

    @include('Jobseeker.components.scripts')


</body>

</html>
