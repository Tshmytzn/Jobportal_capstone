<!DOCTYPE html>
<html lang="en">

@include('Jobseeker.components.head', ['title' => 'Job Portal'])

<body>

    @include('Jobseeker.components.spinner')

    @include('Jobseeker.components.navbar', ['active' => 'blank'])

    @include('Jobseeker.components.header', ['title' => 'blank'])

    

    @include('Jobseeker.components.footer')

    @include('Jobseeker.components.scripts')
    

</body>

</html>
