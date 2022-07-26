<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LocalTCustomer-Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('commonarea/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('commonarea/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('commonarea/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('commonarea/dist/css/AdminLTE.min.css')}}">

  <!-- <link rel="icon" href="{{ asset('commonarea/dist/img/KGB-Fevicon.png')}}" type="image/png" sizes="16x16"> -->
  <link rel="stylesheet" href="{{asset('commonarea/dist/css/login.css')}}">

  <!-- CSS -->

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


  <div class="wrapper">
    <div class="login" style="height: 460px;">

      <div class="login-form">
        <div class="logo-box">
          <img src="{{asset('commonarea/dist/img/APP-LOGO.png')}}" height="93px" alt="logo">
        </div>
        <div class="form-wrapper">
          <form action="{{url('admin-login')}}" method="POST" id="loginForm">
            @csrf
            <div class="input-wrapper mb-15">
              <div class="has-feedback">
                <label class="label">Email Address</label>
                <input class="input" autocomplete="off" type="email" placeholder="Email" name="email">
              </div>
            </div>
            <div class="input-wrapper mb-15 has-feedback">
              <label class="label">Password</label>
              <input class="input" type="password" placeholder="Password" name="password">

              <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>
            <div class="terms">
              <input id="checkid2" type="checkbox"> <label for="checkid2">Remember Me</label>
            </div>
            <div class="actions">
              <button type="submit" class="login-btn action"> Login
              </button>
            </div>
          </form>
          <div class="action-help">
            <a class="help-link" href="{{url('forgot-password')}}">Forgot your password?</a>
          </div>

        </div>
      </div>
      <div class="login-decoration">
      </div>
    </div>
  </div>

  <!-- Validation JS -->

  <script src="{{ asset('commonarea/bower_components/jquery/dist/jquery.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
  <script src="{{ asset('js/jquery.validate.min.js')}}"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="{{ asset('commonarea/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

  <script src="{{ asset('js/sweetalert.min.js')}}"></script>
  <script src="{{ asset('js/validations/custom/login/login.js')}}"></script>

  <script>
    $(".toggle-password").click(function() {
      $(this).toggleClass("fa-eye fa-eye-slash");
      var input = $($(this).attr("toggle"));
      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
    });
  </script>
  <script>
    $(".pass-show").on('click', function() {
      var passwordId = $(this).siblings();
      console.log("passwordId........", passwordId)
      if (passwordId.attr("type") === "password") {
        passwordId.attr("type", "text");
        $(this).find("i").removeClass("fa-eye")
        $(this).find("i").addClass("fa-eye-slash")
      } else {
        passwordId.attr("type", "password");
        $(this).find("i").addClass("fa-eye")
        $(this).find("i").removeClass("fa-eye-slash")
      }
    })
  </script>

  <script>
    $(document).ready(function() {
      toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
      }
      @if(Session::has('error'))
      toastr.error('{{ Session::get('
        error ') }}');
      @elseif(Session::has('success'))
      toastr.success('{{ Session::get('
        success ') }}');
      @endif
    });
  </script>

  <script>
    $("#loginForm").validate({
      rules: {
        email: {
          required: true,
          email: true,
        },
        password: {
          required: true,
        },
      },
      messages: {
        email: {
          required: "Email is required",
          email: "Please enter valid email",
        },
        password: {
          required: "Password is required",
        },
      },
    });
  </script>

</body>

</html>