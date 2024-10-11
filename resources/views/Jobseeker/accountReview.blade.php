<!DOCTYPE html>
<html lang="en">

@include('Jobseeker.components.head', ['title' => 'Job Portal'])

<body>

    @include('Jobseeker.components.spinner')

    @include('Jobseeker.components.navbar', ['active' => 'blank'])

    @include('Jobseeker.components.header', ['title' => 'Review'])

    @php
        $id = $_GET['id'];
        $acc = App\Models\Agency::where('id',$id)->first();
    @endphp
    @if ($acc->status=='pending')
        <div class="text-center">
        <h3 class="display-4">ACCOUNT IS UNDER REVIEW</h3>
        <img src="{{asset('img/pendingAcc.png')}}" class="img-fluid" alt="Responsive image">
        </div>
        @else
        <div class="text-center">
        <h3 class="display-4">ACCOUNT REJECTED</h3>
        <img src="{{asset('img/rejectAcc.png')}}" class="img-fluid" alt="Responsive image">
    </div>
    @endif
    @include('Jobseeker.components.footer')

    @include('Jobseeker.components.scripts')
    

</body>

</html>
