@extends('.admin/dashboard/vw_dashboard')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="overflow:hidden">
   <!-- Main content -->
   <section class="content">
      <!-- Content Header (Page header) -->
      <section class="content-header" style="padding: 0px 0px 15px 0;">
         <h1>
            Social Login 
         </h1>
         <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            
            <li class="active"><i class="fa fa-globe"></i> Social Login </li>
            </ol> -->
      </section>
      <div class="row">
         <div class="col-lg-6 col-md-12">
            <div class="box box-primary">
               <div class="box-header with-border">
                  <h3 class="box-title">Facebook Login</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form action="" method="post" accept-charset="utf-8">
                  <div class="box-body">
                     <!-- include message block -->
                     <div class="form-group">
                        <label class="label-sitemap">App ID</label>
                        <input type="text" class="form-control" name="facebook_app_id" placeholder="App ID" value="">
                     </div>
                     <div class="form-group">
                        <label class="label-sitemap">App Secret</label>
                        <input type="text" class="form-control" name="facebook_app_secret" placeholder="App Secret" value="">
                     </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                     <button type="submit" class="btn btn-primary pull-right">Save Changes</button>
                  </div>
                  <!-- /.box-footer -->
               </form>
               <!-- form end -->
            </div>
         </div>
         <div class="col-lg-6 col-md-12">
            <div class="box box-primary">
               <div class="box-header with-border">
                  <h3 class="box-title">Google Login</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form action="" method="post" accept-charset="utf-8">
                  <div class="box-body">
                     <!-- include message block -->
                     <div class="form-group">
                        <label class="label-sitemap">Client ID</label>
                        <input type="text" class="form-control" name="google_client_id" placeholder="Client ID" value="">
                     </div>
                     <div class="form-group">
                        <label class="label-sitemap">Client Secret</label>
                        <input type="text" class="form-control" name="google_client_secret" placeholder="Client Secret" value="">
                     </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                     <button type="submit" class="btn btn-primary pull-right">Save Changes</button>
                  </div>
                  <!-- /.box-footer -->
               </form>
               <!-- form end -->
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-6 col-md-12">
            <div class="box box-primary">
               <div class="box-header with-border">
                  <h3 class="box-title">VKontakte Login</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form action="" method="post" accept-charset="utf-8">
                  <div class="box-body">
                     <!-- include message block -->
                     <div class="form-group">
                        <label class="label-sitemap">App ID</label>
                        <input type="text" class="form-control" name="vk_app_id" placeholder="App ID" value="">
                     </div>
                     <div class="form-group">
                        <label class="label-sitemap">Secure Key</label>
                        <input type="text" class="form-control" name="vk_secure_key" placeholder="Secure Key" value="">
                     </div>
                     <!-- /.box-body -->
                     <div class="box-footer" style="padding-left: 0; padding-right: 0;">
                        <button type="submit" class="btn btn-primary pull-right">Save Changes</button>
                     </div>
                     <!-- /.box-footer -->
                     <!-- form end -->
                  </div>
               </form>
               <!-- /.box -->
            </div>
         </div>
      </div>
   </section>
</div>

@endsection
@section('script')
<script type="text/javascript">
   $(".s_meun").removeClass("active");
   
   $(".settings_active").addClass("active");
   $(".social_login_settings_active").addClass("active");
</script>
@endsection