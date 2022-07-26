<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <link rel="stylesheet" href="{{ URL::asset('assets/admin_panel/commonarea/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ URL::asset('assets/admin_panel/commonarea/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ URL::asset('assets/admin_panel/commonarea/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::asset('assets/admin_panel/commonarea/dist/css/AdminLTE.min.css')}}">

  <link rel="shortcut icon" href="{{URL::asset('assets/frontend/img/logo-light.png')}}" />
  <!-- <link rel="icon" href="{{ URL::asset('assets/admin_panel/commonarea/dist/img/KGB-Fevicon.png')}}" type="image/png" sizes="16x16"> -->
  <link rel="stylesheet" href="{{ URL::asset('assets/admin_panel/commonarea/dist/css/login.css')}}">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

    .admin-login-page-icon {
      height: 110px;
      object-fit: cover;
      /*background-color: #272727;*/
      padding: 6px;
      margin-bottom: 40px;
    }

    a {
      color: #453494;
    }

    a:hover,
    a:active,
    a:focus {
      outline: none;
      text-decoration: none;
      color: #453494;
    }
  </style>
</head>

<body class="hold-transition login-page">
  <div class="container" id="container">
    <div class="form-container sign-in-container">

      <form action="{{url('admin-login')}}" method="post" id="loginForm">
        @csrf
        <div class="col-md-12">
          <img src="{{URL::asset('assets/admin_panel/commonarea/dist/img/logo-light.png')}}" alt="" class="admin-login-page-icon">
        </div>
        <div class="col-md-12 text-left">
          <input type="email" placeholder="Email" name="email" />
        </div>
        <div class="col-md-12 text-left">
          <input type="password" placeholder="Password" name="password" id="password" />
          <span class="pass-show"><i class="fa fa-eye"></i></span>
        </div>
        <div class="col-md-12">
          <div class="pad-10px mb-10px">
            <a href="{{url('forgot-password')}}">Forgot your password?</a>
          </div>
        </div>

        <div class="col-md-12">
          <button type="submit" class="login-btn submit">Sign In</button>
        </div>
      </form>
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery 3 -->
  <script src="{{ URL::asset('assets/admin_panel/commonarea/bower_components/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{ URL::asset('assets/admin_panel/js/jquery.validate.min.js')}}"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="{{ URL::asset('assets/admin_panel/commonarea/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

  <script src="{{ URL::asset('assets/admin_panel/js/sweetalert.min.js')}}"></script>

  <script src="{{ URL::asset('assets/admin_panel/js/validations/custom/admin/login.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


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