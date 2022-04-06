<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width initial-scale=1.0">
 <!-- GLOBAL MAINLY STYLES-->
  <link href="{{asset('/')}}./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="{{asset('/')}}./assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
  <link href="{{asset('/')}}./assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
  <!-- PLUGINS STYLES-->
  <link href="{{asset('/')}}./assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
  {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css"> --}}

  <!-- THEME STYLES-->
  <link href="{{asset('/')}}assets/css/main.min.css" rel="stylesheet" />
  <link href="{{asset('/')}}assets/css/sweetalert.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('public/adminpanel/assets/css/sweetalert.css') }}">

  <link rel="icon" href="{{asset('uploads/'.$theme->favicon)}}" type="image/png" sizes="16x16" />
  <!-- PAGE LEVEL STYLES-->
  <link href="{{asset('/')}}./assets/vendors/DataTables/datatables.min.css" rel="stylesheet" />
