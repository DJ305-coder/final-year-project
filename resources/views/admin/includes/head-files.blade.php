<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Trenta-Admin</title>

  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('commonarea/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('commonarea/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('commonarea/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('commonarea/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('commonarea/dist/css/skins/_all-skins.min.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('commonarea/bower_components/morris.js/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('commonarea/bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('commonarea/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">

  <!-- timepicker -->
  <link rel="stylesheet" href="{{asset('commonarea/plugins/timepicker/bootstrap-timepicker.css')}}">
  <link rel="stylesheet" href="{{asset('commonarea/plugins/timepicker/bootstrap-timepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('commonarea/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('commonarea/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="{{asset('commonarea/dist/css/main.css')}}">
  <link rel="stylesheet" href="{{asset('commonarea/plugins/iCheck/square/purple.css')}}">
  <link rel="stylesheet" href="{{asset('commonarea/plugins/file-manager/css/file-manager.css')}}">
  <link rel="stylesheet" href="{{asset('commonarea/plugins/file-manager/css/file-uploader.css')}}">
  <link rel="stylesheet" href="{{asset('commonarea/plugins/file-manager/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('commonarea/dist/css/style.css')}}">

  <link rel="stylesheet" href="{{asset('commonarea/plugins/dataTables/fixedHeader.dataTables.min.css')}}">

  <link rel="stylesheet" href="{{asset('commonarea/dist/css/jquery.datatables.css')}}">

  <!-- <link rel="icon" href="{{asset('commonarea/dist/img/KGB-Fevicon.png" type="image/png')}}" sizes="16x16"> -->

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Summer note -->
  <link rel="stylesheet" href="{{asset('commonarea/plugins/summernote/summernote.css')}}">

  <!-- select2.min.css -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />
  <!-- fselect -->
  {{-- <link rel="stylesheet" href="{{asset('commonarea/dist/css/multiple-select.min.css')}}"> --}}

  <link rel="stylesheet" href="{{ asset('js/multi_select/multiple-select.css')}}">

  <link rel="stylesheet" href="{{asset('commonarea/plugins/multi-image-select/aksFileUpload.css')}}">

  
  <!-- toastr css -->
  <link rel="stylesheet" href="{{ asset('js/jquery.toast.min.css')}}">

  <style>
    .error {
      color: #FF0000;
    }
  </style>

</head>

<body onload="loadFunction()" class="hold-transition skin-blue sidebar-mini scrollbar " id="style-7" style="position: relative;">
<input type="hidden" id="base_url" value="{{ url("/")}}">
  <div class="wrapper">