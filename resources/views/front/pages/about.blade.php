@extends('front.master')

@section('body')
        <!-- start page title area-->
        <div class="page-title-area bg-thin">
            <div class="container">
                <div class="page-title-content">
                    <h1>about</h1>
                    <ul>
                        <li class="item"><a href="{{route('index')}}">Home</a></li>
                        <li class="item"><a href="{{route('about.index')}}">about</a></li>
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

        <!--start about section-->
        <section id="about" class="about-section ptb-100 bg-thin">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-12 pb-30">
                        <div class="section-title">
                            <span class="subtitle">{{$about->page_content}}</span>
                            <h2>Manages IT service across various business</h2>
                        </div>
                        <div class="about-text-blc">
                            <p>{{$about->page_content}}</p>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="about-feature-blc">
                                    <i class="envy envy-quality blue"></i>
                                    <div class="about-feature-content">
                                        <h6>The Certified Studio</h6>
                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="about-feature-blc">
                                    <i class="envy envy-quality red"></i>
                                    <div class="about-feature-content">
                                        <h6>Award Ceremony</h6>
                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cta-btn">
                            <a href="about.html" class="btn btn-solid">
                                Read more
                                <i class="envy envy-right-arrow"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 pb-30">
                        <div class="about-img">
                            <div class="grid-img">
                                <div class="grid-img-inner">
                                    <img src="{{asset('uploads/about/'.$about->image_1)}}" class="image-responsive" alt="office_image" />
                                </div>
                                <div class="grid-img-inner">
                                    <img src="{{asset('uploads/about/'.$about->image_2)}}" class="image-responsive" alt="office_image" />
                                </div>
                                <div class="grid-img-inner">
                                    <img src="{{asset('uploads/about/'.$about->image_3)}}" class="image-responsive" alt="office_image" />
                                </div>
                                <div class="grid-img-inner">
                                    <img src="{{asset('uploads/about/'.$about->image_4)}}" class="image-responsive" alt="office_image" />
                                </div>
                            </div>
                           
                            <div class="shape">
                                <img src="assets/img/resource/shape_2.png" alt="shape" class="shape-inner" />
                                <img src="assets/img/resource/shape_4.png" alt="shape" class="shape-inner" />
                                <img src="assets/img/resource/shape_2.png" alt="shape" class="shape-inner" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--end about section-->

        <!-- start team section-->
        <section class="team-section ptb-100 bg-light">
            <div class="container">
                <div class="section-title">
                    <span class="subtitle">OUR Team</span>
                    <h2>Meet Awesome People</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                </div>
                <div class="team-slider owl-carousel">

                    @foreach ($teams as $team )
                        
                    <div class="team-item">
                        <div class="team-image">
                            <img src="{{asset('uploads/'.$team->image)}}" alt="team-member" />
                        </div>
                        <div class="team-content">
                            <h5>
                                <a href="#">{{$team->name}}</a>
                            </h5>
                            <p class="mb-2">{{$team->designation->title}}</p>
                            <div class="social-link">
                                <a href="{{$team->facebook}}" class="bg-tertiary" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="{{$team->twitter}}" class="bg-success" target="_blank">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="{{$team->instagram}}" class="bg-danger" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="{{$team->linkedin}}" class="bg-info" target="_blank">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- end team section -->

        <!-- Start Partner Area -->
        <div class="partner-area ptb-50 bg-faded">
            <div class="container">
                <div class="partner-slider owl-carousel">
                    <div class="partner-item">
                        <img src="assets/img/partner/partner_1.png" alt="image" />
                        <img src="assets/img/partner/partner_hover_1.png" alt="partner" />
                    </div>
                    <div class="partner-item">
                        <img src="assets/img/partner/partner_2.png" alt="image" />
                        <img src="assets/img/partner/partner_hover_2.png" alt="partner" />
                    </div>
                    <div class="partner-item">
                        <img src="assets/img/partner/partner_3.png" alt="image" />
                        <img src="assets/img/partner/partner_hover_3.png" alt="partner" />
                    </div>
                    <div class="partner-item">
                        <img src="assets/img/partner/partner_4.png" alt="image" />
                        <img src="assets/img/partner/partner_hover_4.png" alt="partner" />
                    </div>
                    <div class="partner-item">
                        <img src="assets/img/partner/partner_5.png" alt="image" />
                        <img src="assets/img/partner/partner_hover_5.png" alt="partner" />
                    </div>
                    <div class="partner-item">
                        <img src="assets/img/partner/partner_6.png" alt="image" />
                        <img src="assets/img/partner/partner_hover_6.png" alt="partner" />
                    </div>
                </div>
            </div>
        </div>
        <!-- end partner area -->
    

@endsection