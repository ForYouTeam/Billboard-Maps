<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('assets/js/ruang-admin.min.js')}}"></script>
  {{-- <script src="{{asset('assets/vendor/chart.js/Chart.min.js')}}"></script> --}}
  {{-- <script src="{{asset('assets/js/demo/chart-area-demo.js')}}"></script>   --}}
  <script src="{{asset('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  {{-- <script src="{{asset('initial/js/initial.min.js')}}"></script> --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>

  <script>
    $(document).ready(function () {
      $('#data-tabel').DataTable();
      // $('.profile').initial();
    });
  </script>