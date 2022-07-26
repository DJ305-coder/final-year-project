@extends('.admin/dashboard/vw_dashboard')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="overflow:hidden">
   <!-- Main content -->   
   <section class="content">
      <!-- Content Header (Page header) -->
      <section class="content-header" style="padding: 0px 0px 15px 0;">
         <h1>
            Email Settings
         </h1>
         <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            
            <li class="active"><i class="fa fa-envelope"></i> Email Settings</li>
            </ol> -->
      </section>
      <!-- form start -->
      <form action="{{route('email-settings.store')}}" id="email_settings_form" method="post">
         @csrf
            <div class="row">
               <div class="col-lg-6 col-md-12">
                  <div class="box box-primary">
                     <div class="box-header with-border">
                        <h3 class="box-title">Email Settings</h3>
                     </div>
                     <!-- /.box-header -->
                     <div class="box-body">
                        <!-- include message block -->
                        <!-- <div class="form-group">
                           <label class="control-label">Mail Library</label>
                           <select name="mail_library" id="mail_library" class="form-control">
                              <option value="">Select Library</option>
                              <option value="php" {{(!empty($email_settings->mail_library) && ($email_settings->mail_library == 'php')) ? 'selected' : ''}}>PHP</option>
                           </select>
                        </div> -->
                        <div class=" form-group">
                           <label class="control-label">Mail Protocol</label>
                           <select name="mail_protocol" id="mail_protocol" class="form-control">
                           <option value="">Select Protocol</option>
                              <option value="smtp" {{(!empty($email_settings->mail_protocol) && ($email_settings->mail_protocol == 'smtp')) ? 'selected' : ''}}>SMTP</option>
                              <option value="sendmail" {{(!empty($email_settings->mail_protocol) && ($email_settings->mail_protocol == 'sendmail')) ? 'selected' : ''}}>SENDMAIL</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <label class="control-label">Mail Title</label>
                           <input type="text" class="form-control" name="mail_title" id="mail_title" placeholder="Mail Title" value="{{!empty($email_settings->mail_title) ? $email_settings->mail_title : ''}}">
                        </div>
                        <div class="form-group">
                           <label class="control-label">Mail Host</label>
                           <input type="text" class="form-control" name="mail_host" id="mail_host" placeholder="Mail Host" value="{{!empty($email_settings->mail_host) ? $email_settings->mail_host : ''}}">
                        </div>
                        <div class="form-group">
                           <label class="control-label">Mail Port</label>
                           <input type="text" class="form-control" name="mail_port" id="mail_port" placeholder="Mail Port" value="{{!empty($email_settings->mail_port) ? $email_settings->mail_port : ''}}">
                        </div>
                        <div class="form-group">
                           <label class="control-label">Mail Encryption</label>
                           <input type="text" class="form-control" name="mail_encryption" id="mail_encryption" placeholder="Mail Encryption" value="{{!empty($email_settings->mail_encryption) ? $email_settings->mail_encryption : ''}}">
                        </div>
                        <div class="form-group">
                           <label class="control-label">Mail Username</label>
                           <input type="text" class="form-control" name="mail_username" id="mail_username" placeholder="Mail Username" value="{{!empty($email_settings->mail_username) ? $email_settings->mail_username : ''}}">
                        </div>
                        <div class="form-group">
                           <label class="control-label">Mail Password</label>
                           <input type="text" class="form-control" name="mail_password" id="mail_password" placeholder="Mail Password" value="{{!empty($email_settings->mail_password) ? $email_settings->mail_password : ''}}">
                        </div>
                        <div class="callout" style="max-width: 500px;margin-top: 30px;">
                           <h4>Gmail SMTP</h4>
                           <p>To send e-mails with Gmail server, please read Email Settings section in our documentation.</p>
                        </div>
                     </div>
                     <!-- /.box-body -->
                     <div class="box-footer">
                        <button type="submit" name="email_settings" value="email" id="submit" class="btn btn-primary pull-right">Save Changes</button>
                     </div>
                     <!-- /.box-footer -->
                  </div>
               </div>
         
            <!-- form end -->
            
      
               <div class="col-lg-6 col-md-12">
                  <div class="box box-primary">
                     <div class="box-header with-border">
                        <h3 class="box-title">Email Verification</h3>
                     </div>
                     <!-- /.box-header -->
                     <div class="box-body">
                        <!-- include message block -->
                        <div class="form-group">
                           <div class="row">
                              <div class="col-sm-12 col-xs-12">
                                 <label>Email Verification</label>
                              </div>
                           
                              <div class="col-sm-4 col-xs-12 col-option">
                              <input type="radio" id="enable" name="enable" value="1" style="cursor:pointer" onclick="checkbox(this.value)" {{!empty($email_settings->status) && $email_settings->status == 'active' ? 'checked' : ''}}>
                              <label class="option-label">Enable</label>
                              </div>
                              <div class="col-sm-4 col-xs-12 col-option">
                              <input type="radio" id="disable" name="disable" value="0" style="cursor:pointer" onclick="checkbox(this.value)" {{!empty($email_settings->status) && $email_settings->status == 'inactive' ? 'checked' : ''}}>
                              <label class="option-label">Disable</label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- /.box-body -->
                     <div class="box-footer">
                        <button type="submit" name="email_verification" value="verification" class="btn btn-primary pull-right">Save Changes</button>
                     </div>
                  </div>
               </div>
            </div>
         </form>
   </section>
</div>

@endsection
@section('script')
<script src="{{asset('controller_js/cn_email_settings.js')}}"></script>
<script type="text/javascript">
   $(".s_meun").removeClass("active");
   $(".settings_active").addClass("active");
   $(".email_settings_active").addClass("active");  
   
</script>
@endsection
