
<!-- CORE PLUGINS-->
 <script src="{{asset('/')}}./assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
 <script src="{{asset('/')}}./assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
 <script src="{{asset('/')}}./assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
 <script src="{{asset('/')}}./assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
 <script src="{{asset('/')}}./assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
 <!-- PAGE LEVEL PLUGINS-->
 <script src="{{asset('/')}}./assets/vendors/chart.js/dist/Chart.min.js" type="text/javascript"></script>
 <script src="{{asset('/')}}./assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
 <script src="{{asset('/')}}./assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
 <script src="{{asset('/')}}./assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js" type="text/javascript"></script>
 <!-- CORE SCRIPTS-->
 <script src="{{asset('/')}}assets/js/app.min.js" type="text/javascript"></script>
 <script src="{{asset('/')}}assets/js/jquery.sweet-alert.custom.js" type="text/javascript"></script>
 <script src="{{asset('/')}}assets/js/sweetalert.min.js" type="text/javascript"></script>

 <!-- PAGE LEVEL SCRIPTS-->
 <script src="{{asset('/')}}./assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>

 <script src="{{asset('/')}}./assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>
 <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
 <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js" />

<script src="{{ asset('public/adminpanel/assets/js/jquery.sweet-alert.custom.js') }}"></script>
<script src="{{ asset('public/adminpanel/assets/js/sweetalert.min.js') }}"></script>


<script>
     $(document).ready(function() {
    $('#summernote').summernote();
  });
</script>
 @yield('scripts')

 