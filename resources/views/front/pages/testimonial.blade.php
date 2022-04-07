@extends('front.master')

@section('body')

    <!-- start page title area-->
    <div class="page-title-area bg-thin">
        <div class="container">
            <div class="page-title-content">
                <h1>Testimonials</h1>
                <ul>
                    <li class="item"><a href="index.html">Home</a></li>
                    <li class="item"><a href="testimonials.html">Testimonials</a></li>
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
    <!-- start testimonial section  -->
    <section id="testimonial" class="testimonial-section testimonial ptb-100 bg-thin">
        <div class="container">
            <div class="section-title">
                <span class="subtitle">TESTIMONIALS</span>
                <h2>What People Say About Us</h2>
                <p>
                    Does any industry face a more complex audience journey and marketing sales process than B2B technology.Does any industry face a more complex audience.
                </p>
            </div>
            <div class="tesimonial-grid">
                <div class="dot active">
                    <img src="assets/img/clients/client_1.png" alt="client-1" />
                </div>
                <div class="dot">
                    <img src="assets/img/clients/client_2.png" alt="client-2" />
                </div>
                <div class="dot">
                    <img src="assets/img/clients/client_3.png" alt="client-3" />
                </div>
                <div class="dot">
                    <img src="assets/img/clients/client_4.png" alt="client-4" />
                </div>
                <div class="dot">
                    <img src="assets/img/clients/client_5.png" alt="client-5" />
                </div>
                <div class="dot">
                    <img src="assets/img/clients/client_6.png" alt="client-5" />
                </div>
                <div class="testimonial-slider owl-carousel">

                    @foreach ($testimonials as $testimonial )
                    <div class="slider-item">
                        <div class="qoute-icon mb-3">
                            <img src="{{asset('/')}}/assets/img/resource/quotation.png" alt="quotation" />
                        </div>
                        <div class="inner-text">
                            <p>
                                {{$testimonial->details}}
                            </p>
                        </div>
                        <div class="client">
                            <div class="client-img">
                                <img src="{{asset('uploads/'.$testimonial->image)}}" alt="client-1" />
                            </div>
                            <div class="client-info">
                                <h3>{{$testimonial->name}}</h3>
                                <span>{{$testimonial->position}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                 
                    
                </div>
                <div class="overlay-img">
                    <img src="{{asset('/')}}assets/img/background/Testimonial_bg.png" alt="Testimonial_bg" />
                </div>
            </div>
            <!-- tesimonial-grid -->
        </div>
        <div class="shape">
            <img src="assets/img/resource/shape_6.png" alt="shape" class="shape-inner" />
            <img src="assets/img/resource/Ellipse_1.png" alt="shape" class="shape-inner" />
            <img src="assets/img/resource/Rectangle_1.png" alt="shape" class="shape-inner" />
            <img src="assets/img/resource/Ellipse_1.png" alt="shape" class="shape-inner" />
            <img src="assets/img/resource/Rectangle_1.png" alt="shape" class="shape-inner" />
            <img src="assets/img/resource/shape_2.png" alt="shape" class="shape-inner" />
        </div>
    </section>
    <!-- testimonial section end  -->

@endsection