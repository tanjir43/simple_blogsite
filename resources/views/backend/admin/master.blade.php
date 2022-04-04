<!DOCTYPE html>
<html lang="en">

<head>
 @include('backend.admin.includes.meta')  
<title>Molla - @yield('title') </title>
    @include('backend.admin.includes.style')
</head>



<body class="fixed-navbar">
<div class="page-wrapper">
@include('backend.admin.includes.header')
@include('backend.admin.includes.menu')
        <div class="content-wrapper">
@yield('body')
@include('backend.admin.includes.footer')
        </div>

@include('backend.admin.includes.script')
</div>

</body>
</html>