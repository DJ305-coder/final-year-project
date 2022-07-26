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
                     <li class=""><a href="{{url('general-settings/contact-settings')}}">Contact Settings</a></li>
                     <li class="active"><a href="{{url('general-settings/social-media-settings')}}">Social Media Settings</a></li>
                  </ul>
                    <form action="{{url('general-settings/store')}}" method="post" id="general_settings_social_media_form">
                     @csrf
                    <!-- /.tab-content Start -->
                        <div class="tab-content settings-tab-content">
                            <!-- tab_2 start -->
                            <!-- tab_3 start -->
                            <div id="tab_3">
                                <div class="form-group">
                           <input type="hidden" name="txtpkey" id="txtpkey" value="{{!empty($general_settings->id) ? $general_settings->id : ''}}">
                                    <label class="control-label">Facebook URL</label>
                                    <input type="text" class="form-control" name="social_media_facebook_url" id="social_media_facebook_url" placeholder="Facebook URL" value="{{!empty($general_settings->social_media_facebook_url) ? $general_settings->social_media_facebook_url : ''}}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Twitter URL</label>
                                    <input type="text" class="form-control" name="social_media_twitter_url" id="social_media_twitter_url" placeholder="Twitter URL" value="{{!empty($general_settings->social_media_twitter_url) ? $general_settings->social_media_twitter_url : ''}}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Instagram URL</label>
                                    <input type="text" class="form-control" name="social_media_instagram_url" id="social_media_instagram_url" placeholder="Instagram URL" value="{{!empty($general_settings->social_media_instagram_url) ? $general_settings->social_media_instagram_url : ''}}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Pinterest URL</label>
                                    <input type="text" class="form-control" name="social_media_pinterest_url" id="social_media_pinterest_url" placeholder="Pinterest URL" value="{{!empty($general_settings->social_media_pinterest_url) ? $general_settings->social_media_pinterest_url : ''}}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Youtube URL</label>
                                    <input type="text" class="form-control" name="social_media_youtube_url" id="social_media_youtube_url" placeholder="Youtube URL" value="{{!empty($general_settings->social_media_youtube_url) ? $general_settings->social_media_youtube_url : ''}}">
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-content End -->
                        <div class="box-footer">
                            <button type="submit" name = "social_media_settings" id="submit_btn" class="btn btn-primary pull-right">Save Changes</button>
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
   //active sidebar menu end
</script>
@endsection