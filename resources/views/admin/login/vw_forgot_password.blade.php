<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Trenta-Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('commonarea/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('commonarea/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('commonarea/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('commonarea/dist/css/AdminLTE.min.css')}}">

  <!-- <link rel="icon" href="{{ asset('commonarea/dist/img/KGB-Fevicon.png')}}" type="image/png" sizes="16x16"> -->
  <link rel="stylesheet" href="{{asset('commonarea/dist/css/login.css')}}">


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
    .error {
      color: #FF0000;
    }

    .checkbox input[type="checkbox"],
    .checkbox-inline input[type="checkbox"],
    .radio input[type="radio"],
    .radio-inline input[type="radio"] {
      position: relative !important;
      margin-left: 0px !important;
    }
  </style>
</head>

<body class="hold-transition login-page">
<div class="forgot-password-container" id="container">

<div class="form-container forgot-password-form">
  <form action="{{url('send-otp')}}" method="POST" id="forgetpasswordForm">
    @csrf
    <h1 >Forgot Password</h1>
   
    <p class="mb-50px">Enter the email associated with your account and we'll send OTP to reset your password</p> 
    @if($errors->has('email'))
        <div class="error text-danger"><strong>{{$errors->first('email')}}</strong></div>
    @endif
    <input type="email" name="email" placeholder="Enter Email" />
    
    {{-- <a class="login-btn" href="{{url('otp')}}">Send OTP</a> --}}
    <div class="col-md-12">
      <button type="submit" class="login-btn">Send OTP</button>
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

  <!-- /.login-box -->
  <script src="{{asset('commonarea/bower_components/jquery/dist/jquery.min.js')}}"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="{{asset('commonarea/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

  <script src="{{asset('js/sweetalert.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <!-- jQuery 3 -->
  <!-- Bootstrap 3.3.7 -->
  
  <!-- iCheck -->
  <script>
    $(function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
    
  </script>
</body>

</html>