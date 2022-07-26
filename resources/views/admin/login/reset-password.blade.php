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
  <form action="{{url('new-password')}}" method="post" id="confirmpasswordForm" role="form">
    @csrf
    <h1 >Reset Your Password</h1>
    <p class="mb-50px ">Check Your Email For OTP</p>   
    <div class="col-md-12">
      <input type="password" name="new_password" id="password" placeholder="New Password">
      @if($errors->has('new_password'))
        <div class="error text-danger"><strong>{{$errors->first('new_password')}}</strong></div>
      @endif
      <span class="pass-show"><i class="fa fa-eye"></i></span>
    </div>
    <div class="col-md-12">
      <input type="password" name="confirm_password" id="confirmpassword" placeholder="Confirm Password">
      @if($errors->has('confirm_password'))
        <div class="error text-danger"><strong>{{$errors->first('confirm_password')}}</strong></div>
      @endif
      <span class="pass-show"><i class="fa fa-eye"></i></span>
    </div>
    <div class="col-md-12">
      <button type="submit" class="login-btn submit">Continue</button>
    </div>
  </form>
</div>
</div>

<script src="{{URL::asset('assets/admin_panel/commonarea/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ URL::asset('assets/admin_panel/js/jquery.validate.min.js')}}"></script>
<script src="{{ URL::asset('assets/admin_panel/js/validations/custom/settings/change_password.js')}}"></script>

  <!-- jQuery 3 -->
  <!-- Bootstrap 3.3.7 -->
  <script src="{{URL::asset('assets/admin_panel/commonarea/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <!-- iCheck -->


<script>
    $(".pass-show").on('click', function() {
      var passwordId = $(this).siblings();
      console.log("passwordId........",passwordId)
      if (passwordId.attr("type") === "password") {
        passwordId.attr("type", "text");
        $(this).find("i").removeClass("fa-eye")
        $(this).find("i").addClass("fa-eye-slash")
      }else{
        passwordId.attr("type", "password");
        $(this).find("i").addClass("fa-eye")
        $(this).find("i").removeClass("fa-eye-slash")
      }
    })
  </script>
  <script>
        @if(Session::has('message'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
        }
        toastr.success("{{ session('message') }}");
        @endif
  </script>
</body>
</html>