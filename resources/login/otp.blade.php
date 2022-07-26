<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>

  <style>
    .error{
      color: red;
    }
  </style>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{URL::asset('assets/admin_panel/commonarea/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{URL::asset('assets/admin_panel/commonarea/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{URL::asset('assets/admin_panel/commonarea/bower_components/Ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{URL::asset('assets/admin_panel/commonarea/dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/admin_panel/commonarea/dist/css/login.css')}}">

  <link rel="icon" href="{{URL::asset('assets/admin_panel/commonarea/dist/img/favicon.png')}}" type="image/png" sizes="16x16">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />

  

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
  
  <div class="forgot-password-container" id="container">

<div class="form-container forgot-password-form">
  <form action="{{url('otp-verify')}}" method="post" id="verifyotpForm">
    @csrf
    <h1 >Enter OTP</h1>
    <p class="mb-50px  ">Check Your Email For OTP</p>
   
    <input type="text" name="otp" id="otp" placeholder="OTP" maxlength="4" />
    @if($errors->has('otp'))
      <div class="error text-danger">{{$errors->first('otp')}}</div>
    @endif
      <div class="col-md-12">
        <button type="submit" class="login-btn">Verify OTP</button>
    </div>
  </form>
</div>
<!-- <div class="overlay-container">
  <div class="overlay">
  
    <div class="overlay-panel overlay-right">
    <h1>Property Tax Billing</h1>
     
			</div>
  </div> -->
</div>

<script src="{{URL::asset('assets/admin_panel/commonarea/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('assets/admin_panel/commonarea/bower_components/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{ URL::asset('assets/admin_panel/js/jquery.validate.min.js')}}"></script>
  <script src="{{ URL::asset('assets/admin_panel/js/validations/custom/settings/verify_otp.js')}}"></script>
  <!-- jQuery 3 -->
  <!-- Bootstrap 3.3.7 -->
  <!-- iCheck -->
  <script src="{{URL::asset('assets/admin_panel/commonarea/plugins/iCheck/icheck.min.js')}}"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
  <script>
    $(function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
    
  
  </script>
   <script>
        // $(document).ready(function() {
        //     toastr.options.timeOut = 10000;
        //     @if (Session::has('error'))
        //         toastr.error('{{ Session::get('error') }}');
        //     @elseif(Session::has('success'))
        //         toastr.success('{{ Session::get('success') }}');
        //     @endif
        // });
        @if(Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
            }
        toastr.success("{{ session('message') }}");
        // toastr.error("{{ session('error') }}");
        @endif
    </script>
</body>

</html>