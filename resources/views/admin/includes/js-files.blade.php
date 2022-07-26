<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>

<!-- ./wrapper --><!-- AdminLTE App -->
<script src="{{asset('commonarea/dist/js/adminlte.min.js')}}"></script>

<!-- jQuery 3 -->

<!-- jQuery UI 1.11.4 -->
<script src="{{asset('commonarea/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- Bootstrap 3.3.7 -->
<script src="{{asset('commonarea/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{asset('commonarea/bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{asset('commonarea/bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('commonarea/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('commonarea/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('commonarea/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('commonarea/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('commonarea/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('commonarea/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('commonarea/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- timepicker -->
<script src="{{asset('commonarea/plugins/timepicker/bootstrap-timepicker.js')}}"></script>
<script src="{{asset('commonarea/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('commonarea/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('commonarea/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('commonarea/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{asset('commonarea/dist/js/pages/dashboard.js')}}"></script> --}}
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{asset('commonarea/dist/js/demo.js')}}"></script> --}}
<script src="{{asset('commonarea/plugins/iCheck/icheck.js')}}"></script>
<script src="{{asset('commonarea/plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{asset('commonarea/plugins/file-manager/js/file-manager-panel.js')}}"></script>
<script src="{{asset('commonarea/plugins/file-manager/js/jquery.dm-uploader.min.js')}}"></script>
<script src="{{asset('commonarea/plugins/file-manager/js/ui.js')}}"></script>
<script src="{{asset('commonarea/plugins/dataTables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('commonarea/plugins/dataTables/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('commonarea/plugins/dataTables/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('commonarea/plugins/dataTables/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{asset('commonarea/plugins/dataTables/buttons.html5.min.js')}}"></script>
{{-- <script src="{{asset('commonarea/dist/js/multiple-select.min.js')}}"></script> --}}
{{-- <script src="{{asset('commonarea/dist/js/multiselect.js')}}"></script> --}}
<script src="{{asset('commonarea/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('commonarea/plugins/dataTables/jszip.min.js')}}"></script>
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<!-- Toastr JS -->
<script src="{{ asset('js/jquery.toast.min.js')}}"></script>
<!-- AdminLTE for summernote -->
<script src="{{asset('commonarea/plugins/summernote/summernote.js')}}"></script>
<!-- select2.min start -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('js/sweetalert.min.js')}}"></script>

<!-- fselect -->
<script src="{{asset('js/validations/common/common.js')}}"></script>
<script src="{{asset('js/js_common_validations.js')}}"></script>

<script src="{{ asset('js/multi_select/multiple-select.js')}}"></script>


<script src="{{asset('commonarea/plugins/multi-image-select/aksFileUpload.js')}}"></script>

<script>
  function loadFunction() {
    $('#preloader').hide();
  }
</script>


<script>
  $(document).ready(function() {
    toastr.options = {
      "closeButton": true,
      "progressBar": true,
      "positionClass": "toast-bottom-right",
    }
    @if (Session::has('error'))
        toastr.error('{{ Session::get('error') }}');
    @elseif(Session::has('success'))
        toastr.success('{{ Session::get('success') }}');
    @endif
  });
</script>


<script>
  function success_toast(title = '', message = '') {
    $.toast({
      heading: title,
      text: message,
      icon: 'success',
      loader: true, // Change it to false to disable loader
      loaderBg: '#9EC600', // To change the background,
      position: "bottom-right"
    });
  }

  function fail_toast(title = '', message = '') {
    $.toast({
      heading: title,
      text: message,
      icon: 'error',
      loader: true, // Change it to false to disable loader
      loaderBg: '#9EC600', // To change the background,
      position: "bottom-right"
    });
  }
</script>

