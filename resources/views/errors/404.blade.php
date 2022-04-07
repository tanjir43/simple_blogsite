@extends('front.master')

@section('body')
         <!-- start page title area-->
         <div class="page-title-area ptb-100 bg-thin">
            <div class="container">
                <div class="page-title-content">
                    <h1>Error page</h1>
                    <ul>
                        <li class="item"><a href="index.html">Home</a></li>
                        <li class="item"><a href="error-404.html">Error page</a></li>
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

        <!-- Start 404 Error Area -->
        <section class="error-area ptb-100 bg-thin">
            <div class="container">
                <div class="error-content">
                    <img src="{{asset('/')}}assets/img/error.png" alt="image" />
                    <h3>Ooops! Page Not Found</h3>
                    <p>
                        The page you are looking for might have been removed had its name changed or is temporarily unavailable.
                    </p>
                </div>
                <form class="newsletter-form">
                    <div class="input-group">
                        <input class="form-control" placeholder="E-mail address" type="text" />
                        <div class="cta-btn">
                            <button class="btn btn-solid" type="submit">
                                subscribe
                                <i class="envy envy-right-arrow"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <div class="cta-btn">
                    <a href="index.html" class="btn btn-solid">Back to Homepage</a>
                </div>
            </div>
        </section>
        <!-- end error 404 area -->

@endsection