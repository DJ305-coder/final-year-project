<!-- Content Wrapper. Contains page content -->
@extends('.admin/dashboard/vw_dashboard')
@section('content')
<div class="content-wrapper">
   <!-- Main content -->
   <section class="content">
      <!-- Content Header (Page header) -->
      <section class="content-header pb_10px" style="padding: 0px 0px 15px 0;">
         <h1>
            General Settings
         </h1>
      </section>
      <!-- /.row start -->
      <div class="row">
         <!-- col-start -->
         <div class="col-md-12">
            <!-- form start -->
            {{-- <?php
               $attribute = array('role' => 'form', 'id' => 'settings_form');
               echo form_open('settings/settings-action', $attribute);
            ?> --}}
               <!-- Custom Tabs Start-->
               <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs setting_ul_mobi">
                     <li class="active"><a href="{{url('general-settings/contact-settings')}}">Contact Settings</a></li>
                     <li class=""><a href="{{url('general-settings/social-media-settings')}}">Social Media Settings</a></li>
                  </ul>
                  <form action="{{url('general-settings/store')}}" method="post" id="general_settings_contact_form">
                     @csrf
                     <!-- /.tab-content Start -->
                     <div class="tab-content settings-tab-content">
                        <!-- tab_2 start -->
                        <div id="tab_2">
                           <div class="form-group">
                           <input type="hidden" name="txtpkey" id="txtpkey" value="{{!empty($general_settings->id) ? $general_settings->id : ''}}">
                              <label class="control-label">Email Address</label>
                              <input type="text" class="form-control" name="contact_email" id="contact_email" placeholder="Email Address" value="{{!empty($general_settings->contact_email) ? $general_settings->contact_email : ''}}">
                           </div>
                           <div class="form-group">
                              <label class="control-label">Phone</label>
                              <input type="text" class="form-control" name="contact_phone" id="contact_phone" placeholder="Phone" value="{{!empty($general_settings->contact_phone) ? $general_settings->contact_phone : ''}}">
                           </div>
                           <div class="form-group">
                              <label class="control-label">Mobile No.</label>
                              <input type="text" class="form-control" name="contact_mobile" id="contact_mobile" placeholder="Mobile Number" value="{{!empty($general_settings->contact_mobile) ? $general_settings->contact_mobile : ''}}">
                           </div>
                           <div class="form-group">
                              <label class="control-label">Address</label>
                              <input type="text" class="form-control" name="contact_address" id="contact_address" placeholder="Address" value="{{!empty($general_settings->contact_address) ? $general_settings->contact_address : ''}}">
                           </div>
                           <div class="form-group">
                              <label class="control-label">Latitude</label>
                              <input type="text" class="form-control" name="contact_latitude" id="contact_latitude" placeholder="Address Latitude" value="{{!empty($general_settings->contact_latitude) ? $general_settings->contact_latitude : ''}}">
                           </div>
                           <div class="form-group">
                              <label class="control-label">Longitude</label>
                              <input type="text" class="form-control" name="contact_longitude" id="contact_longitude" placeholder="Email Longitude" value="{{!empty($general_settings->contact_longitude) ? $general_settings->contact_longitude : ''}}">
                           </div>
                        </div>
                     </div>
                     <!-- /.tab-content End -->
                     <div class="box-footer">
                        <button type="submit" name = "contact_settings" id="submit_btn" class="btn btn-primary pull-right">Save Changes</button>
                     </div>
                  </form>
               </div>
               <!-- Custom Tabs End-->
               {{-- <?php echo form_close(); ?> --}}
            <!-- form end --> 
         </div>
         <!-- col-end -->
      </div>
      <!-- /.row end -->
   </section>
   <!-- /.content -->
</div>
@endsection
@section('script')
<script src="{{asset('controller_js/cn_general_settings.js')}}"></script>
<!-- /.content-wrapper -->
<script type="text/javascript">
   //active sidebar menu start
     $(".s_meun").removeClass("active");
     $(".settings_active").addClass("active");
     $(".general_settings_active").addClass("active");
   
</script>
@endsection