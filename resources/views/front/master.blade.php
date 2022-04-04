<!DOCTYPE html>
<html lang="en">
    <head>
        @include('front.includes.meta')
        <title>News portal </title>
        @include('front.includes.style')
    </head>
    <body>
        <!-- start preloader area-->
        <div class="preloader-main">
            <div class="loader">
                <div class="loader-dot"></div>
                <div class="loader-dot"></div>
                <div class="loader-dot"></div>
            </div>
        </div>
        <!--end preloader area -->
        
     @include('front.includes.header')
  
        @yield('body')
       

        @include('front.includes.footer')
        
        @include('front.includes.script')
    </body>
</html>
