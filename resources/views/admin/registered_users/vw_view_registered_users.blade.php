@extends('.admin/dashboard/vw_dashboard')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-md-12">
            <section class="content-header">
               <h1>
                  View Registered User Details
                  <div class="pull-right">
                     <a href="{{url('registered-users-list')}}">
                     <button type="button" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i> Back</button>
                     </a>
                  </div>
               </h1>
            </section>
            <section class="content" style="padding:5px 0px;">
               <div class="row">
                  <div class="col-md-4 form-group text-center">
                     <div class="box box-primary">
                        <div class="box-body" style="padding:0px !important">
                           <div class="row no-margin">
                              <div class="col-md-12 form-group profile_img text-center">                            
                                 <img src="{{!empty($user->profile_image) ? $user->profile_image : asset('commonarea/dist/img/avatar5.png')}}" class="view-cnt" style="width:120px">
                              </div>
                              <div class="col-md-12 reg_view_label no-pad">
                              <!-- End form-group Photocopy -->
                              <div class="col-md-12 no-pad br-bt-1px">
                              <div class="col-md-4 reg_view_label text-left">
                                 <label class="lbl-heading">Full Name</label>
                              </div>
                               <div class="col-md-8 reg_view_value  text-left">
                                 <p>{{!empty($user->name) ? $user->name : ''}}</p>
                              </div>
                              </div>
                              <!-- End form-group -->
                              <div class="col-md-12 no-pad br-bt-1px">
                              <div class="col-md-4 reg_view_label text-left">
                                 <label class="lbl-heading">User Id</label>                           
                              </div>
                               <div class="col-md-8 reg_view_value  text-left">
                                 <p>{{!empty($user->id) ? $user->id : ''}}</p>
                              </div>
                              </div>
                              <!-- End form-group -->
                              <div class="col-md-12 no-pad br-bt-1px">
                              <div class="col-md-4 reg_view_label text-left">    
                                 <label class="lbl-heading">Mobile No.</label>
                              </div>
                               <div class="col-md-8 reg_view_value  text-left">
                                 <p>+91{{!empty($user->phone_number) ? $user->phone_number : ''}}</p>
                              </div>
                              </div >

                              <div class="col-md-12 no-pad br-bt-1px">
                              <div class="col-md-4 reg_view_label text-left">
                                 <label class="lbl-heading">Email</label>
                              </div>
                               <div class="col-md-8 reg_view_value  text-left">
                                 <p>{{!empty($user->email) ? $user->email : ''}}</p>
                              </div>
                              </div>

                              <div class="col-md-12 no-pad br-bt-1px">
                        <div class="col-md-4 reg_view_label  text-left"> 
                           <label class="lbl-heading">Gender</label>
                          
                        </div>
                         <div class="col-md-8 reg_view_value text-left"> 
                           <p>{{!empty($user->gender) ? $user->gender : ''}}</p>
                        </div>
                        </div>
                              <!-- End form-group -->
                              <div class="col-md-12 no-pad br-bt-1px">
                              <div class="col-md-4 reg_view_label text-left">    
                                 <label class="lbl-heading">State</label>
                              </div>
                               <div class="col-md-8 reg_view_value  text-left">
                                 <p>{{!empty($state->state_name) ? $state->state_name : ''}}</p>
                              </div>
                              </div>

                              <div class="col-md-12 no-pad br-bt-1px">
                              <div class="col-md-4 reg_view_label text-left">
                                 <label class="lbl-heading">City</label>
                              </div>
                               <div class="col-md-8 reg_view_value  text-left">
                                 <p>{{!empty($city->city_name) ? $city->city_name : ''}}</p>
                              </div>
                              </div>
                              <!-- End form-group -->

                              <!-- End form-group -->
                              <div class="col-md-12 no-pad br-bt-1px">
                              <div class="clearfix"></div>
                              <div class="col-md-4 reg_view_label text-left">
                                 <label class="lbl-heading">DOB</label>
                              </div>
                               <div class="col-md-8 reg_view_value  text-left">
                                 <p>{{!empty($user->date_of_birth) ? $user->date_of_birth : ''}}</p>
                              </div>
                              </div>
                              
                             
                              <!-- End form-group -->
                              <div class="clearfix"></div>
                              <div class="col-md-4 eg_view_label margin-bt-0px form-group text-left"> 
                           <label class="lbl-heading">Address</label>
                           
                        </div>
                        <div class="col-md-8 reg_view_value margin-bt-0px form-group text-left"> 
                          
                           <p>{{!empty($user->address) ? $user->address : ''}}</p>
                        </div>
                              </div>
                           </div>
                        </div>
                        <!-- End box-body -->
                     </div>
                  </div>
                  <div class="col-md-8 form-group text-center">
                     <div class="box box-primary">
                        <div class="box-body"  style="min-height:480px">
                        </div>
                     </div>
                  </div>
               </div>
               <!-- End box -->
            </section>
         </div>
      </div>
      <!-- /.row -->
   </section>
</div>

@endsection
@section('script')
<script type="text/javascript">
   $(".s_meun").removeClass("active");
   $(".registered_users_active").addClass("active");
   
</script>
@endsection