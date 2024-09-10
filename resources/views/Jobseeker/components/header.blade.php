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
                <h3 class="h1 mb-1 wow fadeInDown" data-wow-delay="0.1s">{{$title}}</h3> <!-- Reduced to h5 and mb-1 -->
                <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-primary"><a href="">{{$title}}</a></li>
                </ol>    
            </div>
        </div>        
        <!-- Header End -->