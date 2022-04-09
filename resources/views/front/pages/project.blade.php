@extends('front.master')

@section('body')



  <!-- start page title area-->
  <div class="page-title-area bg-thin">
    <div class="container">
        <div class="page-title-content">
            <h1>Projects</h1>
            <ul>
                <li class="item"><a href="{{route('index')}}">Home</a></li>
                <li class="item"><a href="{{route('proj')}}">Projects</a></li>
            </ul>
        </div>
    </div>
    <div class="shape">
        <span class="shape1"></span>
        <span class="shape2"></span>
        <span class="shape3"></span>
        <span class="shape4"></span>
    </div>
</div>
<!-- end page title area -->

<!-- start gallery section -->
<section class="gallery-section ptb-100 bg-white">
    <div class="container">

        <div class="section-title">
            <h2>See Our Recent Case Study</h2>
            <p>Does any industry face a more complex audience journey and marketing sales process than B2B technology.Does any industry face a more complex audience.</p>
        </div>

            <!-- gallery-item -->
            @foreach ($projects as $project )
            <div class="gallery-item">
            
                <div class="gallery-image"><img src="{{asset('uploads/'.$project->image)}}" alt="gallery-member" /></div>
                <div class="gallery-content">
                    <h3>
                        <a href="project-details.html">{{$project->name}}</a>
                    </h3>
                </div>
              
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- end gallery section -->
@endsection