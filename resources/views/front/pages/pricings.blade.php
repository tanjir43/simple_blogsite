@extends('front.master')

@section('body')
      <!-- start page title area-->
      <div class="page-title-area bg-thin">
        <div class="container">
            <div class="page-title-content">
                <h1>pricing</h1>
                <ul>
                    <li class="item"><a href="{{route('index')}}">Home</a></li>
                    <li class="item"><a href="{{route('pricings')}}">pricing</a></li>
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

    <!-- pricing plan start -->
    <section class="pricing-section pricing-single pt-100 pb-70 bg-thin">
        <div class="container">
            <div class="section-title pb-100">
                <span class="subtitle">pricing packages</span>
                <h2>Choose Your Best Packages</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque, numquam.
                </p>
            </div>
            <div class="row justify-content-center">
                @foreach ($pricings as $price )
                <div class="col-lg-4 pb-70">
                    <div class="pricing-item-single">
                        <div class="pricing-item-content">
                            <div class="content-text">
                                <span class="label">{{$price->title}}</span>
                                <h2 class="price"><span>$</span>{{$price->price}}</h2>
                                <p>monthly</p>
                            </div>
                            <div class="content-bg">
                                <img src="{{asset('uploads/'.$price->image)}}" alt="" />
                            </div>
                        </div>
                        <div class="pricing-item-list">
                            <ul class="mb-3">
                                @php
                                    $resp = json_decode($price->features)
                                @endphp
                                @for ($i=0; $i < sizeof($resp[0]); $i++)
                                <li><i class="envy envy-paper-plane"></i>{{$resp[0][$i]}}</li>
                                @endfor
                            </ul>
                            <a href="#" class="btn btn-solid">choose plan <i class="envy envy-right-arrow"></i></a>
                        </div>
                    </div>
                    <!-- pricing-item-single -->
                </div>
                @endforeach  
            </div>
        </div>
    </section>
    <!-- pricing plan end -->

@endsection