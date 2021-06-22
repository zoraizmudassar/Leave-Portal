<!-- jQuery -->
<script src="{{ URL::asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/toastr.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ URL::asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ URL::asset('assets/js/jquery-ui.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ URL::asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ URL::asset('assets/dist/js/adminlte.js') }}"></script>
<!-- Sparkline -->
<script src="{{ URL::asset('assets/dist/js/demo.js') }}"></script>
<!-- JQVMap -->
<script src="{{ URL::asset('assets/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/raphael/raphael.min.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ URL::asset('assets/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ URL::asset('assets/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/custom.js') }}"></script>
<script>
@if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif
</script>
<!-- Tempusdominus Bootstrap 4 -->