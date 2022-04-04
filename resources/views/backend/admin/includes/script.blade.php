
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
 <!-- PAGE LEVEL SCRIPTS-->
 <script src="{{asset('/')}}./assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
 <!-- Sweet alert -->
 {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

 <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
 @yield('scripts')

 {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
{{-- <script>
        $('body').on('click','.btn-delete', function(event){
            alert()
            
            swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Poof! Your imaginary file has been deleted!", {
      icon: "success",
    });
  } else {
    swal("Your imaginary file is safe!");
  }
}
});
</script> --}}