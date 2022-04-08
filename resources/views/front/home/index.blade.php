@extends('front.master')

@section('body')
 <!-- start home banner area -->
 <div id="home" class="home-banner-area banner-type-one" style=" padding-top: 280px;  padding-bottom: 200px; background: url('{{asset('uploads/'.$bannersImage->image)}}') no-repeat center;">
     
         
     
    <div class="home-slider owl-carousel">
        @foreach ($banners as  $banner)
        <div class="item">
            <div class="container">
                <div class="banner-content">
                    <h1>{{$banner->title}}</h1>
                    <p>
                       {!!$banner->banner_content!!}
                    </p>
                    <div class="cta-btn">
                        <a href="{{$banner->link_url}}" class="btn btn-solid">{{$banner->link_title}}</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach  
    </div>  
</div>
<!--end home banner area -->
<!-- start promo section -->
<section class="promo-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-feature">
                    <div class="single-feature-content">
                        <i class="envy envy-cloud-computing1"></i>
                        <h3 class="mt-3">Cloud Computing</h3>
                    </div>
                    <div class="hover-overlay"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-feature">
                    <div class="single-feature-content">
                        <i class="envy envy-code2"></i>
                        <h3 class="mt-3">Web Development</h3>
                    </div>
                    <div class="hover-overlay"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-feature">
                    <div class="single-feature-content">
                        <i class="envy envy-server2"></i>
                        <h3 class="mt-3">Data Management</h3>
                    </div>
                    <div class="hover-overlay"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-feature">
                    <div class="single-feature-content">
                        <i class="envy envy-global"></i>
                        <h3 class="mt-3">SEO Optimization</h3>
                    </div>
                    <div class="hover-overlay"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end feature section -->

<!--start about section-->
<section id="about" class="about-section ptb-70">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-sm-12 pb-30">
                <div class="section-title">
                    <span class="subtitle">about us</span>
                    <h2>Manages IT service across various business</h2>
                </div>
                <div class="about-text-blc">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type </p>
                    <p>Risus commodo viverra maecenas accumsan lacus vel facilisis.!</p>
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
                            <img src="assets/img/about/about_1.png" class="image-responsive" alt="office_image" />
                        </div>
                        <div class="grid-img-inner">
                            <img src="assets/img/about/about_2.png" class="image-responsive" alt="office_image" />
                        </div>
                        <div class="grid-img-inner">
                            <img src="assets/img/about/about_3.png" class="image-responsive" alt="office_image" />
                        </div>
                        <div class="grid-img-inner">
                            <img src="assets/img/about/about_4.png" class="image-responsive" alt="office_image" />
                        </div>
                    </div>
                    <div class="logo-overlay">
                        <img src="assets/img/logos/logo.png" alt="logo_without_slogan" />
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

<!--start service section-->
<section id="featured-service" class="featured-service-section pt-100 pb-70 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12 col-md-12 pb-30">
                <div class="featured-service-image">
                    <img src="assets/img/resource/service_left.png" alt="service_illustration" />
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 col-md-12">
                <div class="featured-service-content">
                    <div class="section-title">
                        <span class="subtitle">OUR SERVICES</span>
                        <h2>Custom IT Solutions for Your Successful Business</h2>
                        <p>Solit is innovative and dynamic software development, outsourcing and consulting company. We have proven success and experience in building Dedi cated Development Teams of different sizes for us.</p>
                    </div>
                    <div class="row">
                        <div class="content-inner col-lg-6 col-md-6 col-sm-6">
                            <i class="envy envy-shield"></i>
                            <h5>Cyber Security</h5>
                            <p>There are many variations of passages of Lorem Ipsum available</p>
                            <a href="service-details.html" target="_blank" class="btn btn-text-only">
                                read more
                                <i class="envy envy-right-arrow"></i>
                            </a>
                        </div>
                        <div class="content-inner col-lg-6 col-md-6 col-sm-6">
                            <i class="envy envy-cpu"></i>
                            <h5>Data Analytics</h5>
                            <p>There are many variations of passages of Lorem Ipsum available</p>
                            <a href="service-details.html" target="_blank" class="btn btn-text-only">
                                read more
                                <i class="envy envy-right-arrow"></i>
                            </a>
                        </div>
                        <div class="content-inner col-lg-6 col-md-6 col-sm-6">
                            <i class="envy envy-code"></i>
                            <h5>Web Development</h5>
                            <p>There are many variations of passages of Lorem Ipsum available</p>
                            <a href="service-details.html" target="_blank" class="btn btn-text-only">
                                read more
                                <i class="envy envy-right-arrow"></i>
                            </a>
                        </div>
                        <div class="content-inner col-lg-6 col-md-6 col-sm-6">
                            <i class="envy envy-global"></i>
                            <h5>SEO Optimization</h5>
                            <p>There are many variations of passages of Lorem Ipsum available</p>
                            <a href="service-details.html" target="_blank" class="btn btn-text-only">
                                read more
                                <i class="envy envy-right-arrow"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shape">
        <img src="assets/img/resource/Illustration_Cloud.png" alt="shape" class="shape-inner" />
        <img src="assets/img/resource/Illustration_Settings.png" alt="shape" class="shape-inner" />
    </div>
</section>
<!--end service section-->

<!-- start team section-->
<section class="team-section ptb-100">
    <div class="container">
        <div class="section-title">
            <span class="subtitle">OUR Team</span>
            <h2>Meet Awesome People</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
        </div>
        <div class="team-slider owl-carousel">
            <div class="team-item">
                <div class="team-image">
                    <img src="assets/img/team/team_1.jpg" alt="team-member" />
                </div>
                <div class="team-content">
                    <h5>
                        <a href="#">Rosalina</a>
                    </h5>
                    <p class="mb-2">CEO & Founder</p>
                    <div class="social-link">
                        <a href="#" class="bg-success" target="_blank"><i class="fab fa-tumblr"></i></a>
                        <a href="#" class="bg-danger" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="bg-info" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="team-item">
                <div class="team-image">
                    <img src="assets/img/team/team_2.jpg" alt="team-member" />
                </div>
                <div class="team-content">
                    <h5>
                        <a href="#">Fiona Endley</a>
                    </h5>
                    <p class="mb-2">Ul/UX Designer</p>
                    <div class="social-link">
                        <a href="#" class="bg-success" target="_blank"><i class="fab fa-tumblr"></i></a>
                        <a href="#" class="bg-danger" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="bg-info" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="team-item">
                <div class="team-image">
                    <img src="assets/img/team/team_3.jpg" alt="team-member" />
                </div>
                <div class="team-content">
                    <h5>
                        <a href="#">Billy Vogel</a>
                    </h5>
                    <p class="mb-2">Front End Developer</p>
                    <div class="social-link">
                        <a href="#" class="bg-success" target="_blank"><i class="fab fa-tumblr"></i></a>
                        <a href="#" class="bg-danger" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="bg-info" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="team-item">
                <div class="team-image">
                    <img src="assets/img/team/team_4.jpg" alt="team-member" />
                </div>
                <div class="team-content">
                    <h5>
                        <a href="#">Jane Anderson</a>
                    </h5>
                    <p class="mb-2">Digital Marketer</p>
                    <div class="social-link">
                        <a href="#" class="bg-success" target="_blank"><i class="fab fa-tumblr"></i></a>
                        <a href="#" class="bg-danger" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="bg-info" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="team-item">
                <div class="team-image">
                    <img src="assets/img/team/team_1.jpg" alt="team-member" />
                </div>
                <div class="team-content">
                    <h5>
                        <a href="#">Rosalina</a>
                    </h5>
                    <p class="mb-2">CEO & Founder</p>
                    <div class="social-link">
                        <a href="#" class="bg-success" target="_blank"><i class="fab fa-tumblr"></i></a>
                        <a href="#" class="bg-danger" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="bg-info" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end team section -->

<!-- start video section -->
<section class="video-section bg-light ptb-100">
    <div class="container">
        <div class="section-title title-light">
            <span class="subtitle">INTRO VIDEO</span>
            <h2>See How We Work In Team</h2>
            <p>Does any industry face a more complex audience journey and marketing sales process than B2B technology. Does any industry face a more complex audience.</p>
        </div>
        <div class="video-content">
            <div class="video-box">
                <figure class="video-image">
                    <img src="assets/img/background/intro_video.png" alt="video" />
                </figure>
                <a href="https://www.youtube.com/watch?v=kxPCFljwJws" class="youtube-popup video-btn">
                    <i class="fas fa-play"></i>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- end video section -->

<!-- start testimonial section  -->
<section id="testimonial" class="testimonial-section testimonial pb-100 bg-light">
    <div class="container">
        <div class="section-title">
            <span class="subtitle">TESTIMONIALS</span>
            <h2>What People Say About Us</h2>
            <p>Does any industry face a more complex audience journey and marketing sales process than B2B technology. Does any industry face a more complex audience.</p>
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
                        <img src="{{asset('/')}}assets/img/resource/quotation.png" alt="quotation" />
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

<!-- Start Partner Area -->
<div class="partner-area ptb-50">
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

<!--start blog section-->
<section id="blog" class="blog-section pt-100 pb-70">
    <div class="container">
        <div class="section-title title-light">
            <span class="subtitle">our blog</span>
            <h2>Our Latest Article To Help You</h2>
            <p>Does any industry face a more complex audience journey and marketing sales process than B2B technology? Does any industry faces a more complex audience.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog-item-single">
                    <div class="blog-item-img">
                        <a href="blog-details.html">
                            <img src="assets/img/blog/blog_1.png" alt="blog-bg-image" />
                        </a>
                        <p class="tag">Design</p>
                    </div>
                    <div class="blog-item-content">
                        <span> <i class="envy envy-calendar"></i>August 31, 2021 </span>
                        <a href="blog-details.html">
                            <h3>Content Tools & Techniques are complex</h3>
                        </a>
                        <p>
                            Strategy experience and analytical expert is combine to enable. Strate great experience.
                        </p>
                        <a href="blog-details.html" target="_self" class="btn btn-text-only">
                            read more
                            <i class="envy envy-right-arrow"></i>
                        </a>
                    </div>
                    <!-- blog-item-content -->
                </div>
                <!-- blog-item-single -->
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog-item-single">
                    <div class="blog-item-img">
                        <a href="blog-details.html">
                            <img src="assets/img/blog/blog_2.png" alt="blog-bg-image" />
                        </a>
                        <p class="tag">Development</p>
                    </div>
                    <div class="blog-item-content">
                        <span> <i class="envy envy-calendar"></i>May 01, 2021 </span>
                        <a href="blog-details.html">
                            <h3>Use the Mobile App Typography</h3>
                        </a>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</p>
                        <a href="blog-details.html" target="_self" class="btn btn-text-only">
                            read more
                            <i class="envy envy-right-arrow"></i>
                        </a>
                    </div>
                    <!-- blog-item-content -->
                </div>
                <!-- blog-item-single -->
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog-item-single">
                    <div class="blog-item-img">
                        <a href="blog-details.html">
                            <img src="assets/img/blog/blog_3.png" alt="blog-bg-image" />
                        </a>
                        <p class="tag">Brand</p>
                    </div>
                    <div class="blog-item-content">
                        <span> <i class="envy envy-calendar"></i>July 31, 2021 </span>
                        <a href="blog-details.html">
                            <h3>Agencies Can Successfully Recover</h3>
                        </a>
                        <p>Strategy experience and analytical expert is combine to enable. Strate great experience and analysis the content.</p>
                        <a href="blog-details.html" target="_self" class="btn btn-text-only">
                            read more
                            <i class="envy envy-right-arrow"></i>
                        </a>
                    </div>
                    <!-- blog-item-content -->
                </div>
                <!-- blog-item-single -->
            </div>
        </div>
        <!-- row -->
    </div>
</section>
<!--end blog section-->

<!-- start newsletter section -->
<section class="newsletter-section ptb-100">
    <div class="container">
        <div class="section-title title-light">
            <span class="subtitle">get action</span>
            <h2>Get A Quote Right Now</h2>
            <p>Does any industry face a more complex audience journey and marketing sales process than B2B technology. Does any industry face a more complex audience.</p>
        </div>
        <form class="newsletter-form" data-bs-toggle="validator">
            <div class="input-group">
                <input class="form-control" placeholder="E-mail address" type="text" name="EMAIL" required="" autocomplete="off" />
                <div class="cta-btn">
                    <button  type="submit" class="btn btn-solid">
                        Subscribe
                        <i class="envy envy-right-arrow"></i>
                    </button>
                </div>
            </div>
            <div id="validator-newsletter" class="form-result"></div>
        </form>
    </div>
</section>
<!-- end newsletter section -->

@endsection