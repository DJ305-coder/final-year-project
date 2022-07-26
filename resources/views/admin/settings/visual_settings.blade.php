@extends('.admin/dashboard/vw_dashboard')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="overflow:hidden">
   <!-- Content Header (Page header) -->
  
   <!-- Main content -->
   <section class="content">
   <section class="content-header">
      <h1>
         Visual Settings
      </h1>
     
   </section>
      <div class="row">
         <div class="col-sm-12 col-xs-12 col-md-12">
            <div class="box box-primary">
               <!-- /.box-header -->
               <!-- form start -->
               <form action="{{route('visual-settings.store')}}" method="post" id="visual_settings_form" enctype="multipart/form-data">
                  @csrf
      
                  <div class="box-body">
                  <input type="hidden" name="txtpkey" id="txtpkey" value="{{!empty($visual_settings->id) ? $visual_settings->id : ''}}">
                     <div class="form-group">
                        <label class="control-label">Logo (180x50px)</label>
                        <div style="margin-bottom: 10px;">
                           <img src="{{!empty($visual_settings->logo_image_path) ? $visual_settings->logo_image_path : URL::asset('commonarea/dist/img/default.png');}}" alt="{{!empty($visual_settings->logo_image_name) ? $visual_settings->logo_image_name : 'Logo Image'}}" style="max-width: 160px; max-height: 160px;" class="preview_image">
                        </div>
                        <div class="display-block">
                           <a class="btn btn-success btn-sm btn-file-upload">
                           Select Logo							
                           <input type="file" name="logo_image_path" size="40" accept="image/*" class="preview valid">
                           <input type="hidden" name="old_logo_image" id="old_logo_image" value="{{!empty($visual_settings->logo_image_path) ? $visual_settings->logo_image_path : ''}}">
                           </a>
                           (.png, .jpg, .jpeg, .gif, .svg)
                        </div>
                        <span class="label label-info" id="upload-file-info1"></span>
                     </div>
                     <div class="form-group">
                        <label class="control-label">Logo Email</label>
                        <div style="margin-bottom: 10px;">
                           <img src="{{!empty($visual_settings->logo_email_image_path) ? $visual_settings->logo_email_image_path : URL::asset('commonarea/dist/img/default.png');}}" alt="{{!empty($visual_settings->logo_email_image_name) ? $visual_settings->logo_email_image_name : 'Email Logo Image'}}" style="max-width: 160px; max-height: 160px;" class="preview_image2">
                        </div>
                        <div class="display-block">
                           <a class="btn btn-success btn-sm btn-file-upload">
                           Select Logo							
                           <input type="file" name="logo_email_image_path" size="40" accept="image/*" class="preview2 valid">
                           <input type="hidden" name="old_logo_email_image" id="old_logo_email_image" value="{{!empty($visual_settings->logo_email_image_path) ? $visual_settings->logo_email_image_path : ''}}">
                           </a>
                           (.png, .jpg, .jpeg)
                        </div>
                        <span class="label label-info" id="upload-file-info3"></span>
                     </div>
                     <div class="form-group">
                        <label class="control-label">Favicon (16x16px)</label>
                        <div style="margin-bottom: 10px;">
                           <img src="{{!empty($visual_settings->favicon_image_path) ? $visual_settings->favicon_image_path : URL::asset('commonarea/dist/img/default.png');}}" alt="{{!empty($visual_settings->favicon_image_name) ? $visual_settings->favicon_image_name : 'Favicon Image'}}" style="max-width: 160px; max-height: 160px;" class="preview_image3">
                        </div>
                        <div class="display-block">
                           <a class="btn btn-success btn-sm btn-file-upload">
                           Select Favicon							
                           <input type="file" name="favicon_image_path" size="40" accept="image/*" class="preview3 valid">
                           <input type="hidden" name="old_favicon_image" id="old_favicon_image" value="{{!empty($visual_settings->favicon_image_path) ? $visual_settings->favicon_image_path : ''}}">
                           </a>
                           (.png)
                        </div>
                        <span class="label label-info" id="upload-file-info2"></span>
                     </div>
                  </div>
                     <!-- /.box-body -->
                  <div class="box-footer">
                     <button type="submit" class="btn btn-primary pull-right">Save Changes</button>
                  </div>
                 
               </form>
               <!-- form end -->
            </div>
            <!-- /.box -->
         </div>
      </div>
   </section>
</div>

@endsection
@section('script')
<script src="{{asset('controller_js/cn_visual_settings.js')}}"></script>
<script type="text/javascript">
   $(".s_meun").removeClass("active");
   
   $(".settings_active").addClass("active");  
   $(".visual_settings_active").addClass("active");
   
   
     //select site color
     $(document).on('click', '.visual-color-box', function () {
         var data_color = $(this).attr('data-color');
         $('.visual-color-box').empty();
         $(this).html('<i class="fa fa-check"></i>');
         $('#input_user_site_color').val(data_color);
     });
   
</script>
@endsection