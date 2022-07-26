@extends('.admin/dashboard/vw_dashboard')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="row no-margin">

            <div class="col-md-12 no-pad">
                <section class="content-header">
                    <h1>Add Delivery Agent
                        <div class="pull-right">
                            <a href="{{url('delivery-agent-list')}}">
                                <button type="button" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i> Back</button>
                            </a>
                        </div>
                    </h1>
                </section>
                <section class="content" style="padding:5px 0px;">
                    <div class="box box-primary">
                        <div class="box-body">
                            <form action="{{route('add-delivery-agent.store')}}" method="post" enctype="multipart/form-data" id="delivery_agent_form">
                            @csrf
                                <div class="row">
                                <div class="col-md-9 no-pad">
                                    <!-- id for update -->
                                <input type="hidden" name="txtpkey" id="txtpkey" value="{{!empty($agent->id) ? $agent->id : ''}}">

                                    <div class="col-sm-4 form-group">
                                        <label>Name <span style="color:red;">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" autocomplete="off" value="{{!empty($agent->name) ? $agent->name : ''}}">
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>Email<span style="color:red;">*</span></label>
                                        <input type="text" name="email" id="email" class="form-control" autocomplete="off" value="{{!empty($agent->email) ? $agent->email : ''}}">
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>Mobile No. <span style="color:red;">*</span></label>
                                        <input type="text" name="mobile_number" id="mobile_number" class="form-control" autocomplete="off" value="{{!empty($agent->mobile_number) ? $agent->mobile_number : ''}}">
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>Date Of Birth <span style="color:red;">*</span></label>
                                        <i class="fa fa-calendar"></i>
                                        <input type="text" name="dob" id="dob" class="form-control" id="dob" autocomplete="off" value="{{!empty($agent->dob) ? $agent->dob : ''}}">
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>Gender <span style="color:red;">*</span></label>
                                        <select class="form-control" name="gender" autocomplete="off">
                                            <option value="">Select</option>
                                            <option value="male" {{!empty($agent->gender) && $agent->gender == 'male' ? 'selected' : ''}}>Male</option>
                                            <option value="female" {{!empty($agent->gender) && $agent->gender == 'female' ? 'selected' : ''}}>Female</option>
                                            <option value="other" {{!empty($agent->gender) && $agent->gender == 'other' ? 'selected' : ''}}>Other</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>Salary<span style="color:red;">*</span></label>
                                        <input type="number" name="salary" id="salary" class="form-control" autocomplete="off" value="{{!empty($agent->salary) ? $agent->salary : ''}}">
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>Country<span style="color:red;">*</span></label>
                                        <select class="form-control" name="country_id" autocomplete="off">
                                            <option value="">Select Country</option>
                                            @foreach($countries as $country_data)
                                            <option value="{{$country_data->id}}" {{!empty($agent->country_id) && $agent->country_id == $country_data->id ? 'selected' : ''}}>{{$country_data->country_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>State <span style="color:red;">*</span></label>
                                        <select class="form-control" name="state_id" id="state_id" autocomplete="off">
                                            <option value="">Select State</option>
                                            @foreach($states as $state_data)
                                            <option value="{{$state_data->id}}" {{!empty($agent->state_id) && $agent->state_id == $state_data->id ? 'selected' : ''}}>{{$state_data->state_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>City <span style="color:red;">*</span></label>
                                        <select class="form-control" name="city_id" id="city_id" autocomplete="off">
                                            <option value="">Select City</option>
                                            @if(!empty($cities))
                                                @foreach($cities as $city_data)
                                                <option value="{{$city_data->id}}" {{!empty($agent->city_id) && $agent->city_id == $city_data->id ? 'selected' : ''}}>{{$city_data->city_name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    <div class="col-sm-6 form-group">
                                        <label>Address <span style="color:red;">*</span></label>
                                        <textarea class="form-control" rows="3" style="resize: none;" name="address" id="address">{{!empty($agent->address) ? $agent->address : ''}}</textarea>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Area<span style="color:red;">*</span></label>
                                        <textarea class="form-control" rows="3" style="resize: none;" name="area" id="area">{{!empty($agent->area) ? $agent->area : ''}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-3 no-pad">
                                    <div class="col-md-12 form-group">
                                        <label>Profile Photo<span style="color: red;">*</span></label>
                                        <input type="file" class="form-control preview" id="profile_image_path" name="profile_image_path" accept="image/*">
                                        <img src="{{!empty($agent->profile_image_path) ? $agent->profile_image_path : asset('commonarea/dist/img/default.png')}}" class="img-select preview_image" alt="{{!empty($agent->profile_image_name) ? $agent->profile_image_name : 'Profile Image'}}">
                                        <input type="hidden" name="old_profile_image" id="old_profile_image" value="{{!empty($agent->profile_image_path) ? $agent->profile_image_path : ''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 no-pad">
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label>Aadhar Card Number<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="aadhar_card_number" value="{{!empty($agent->aadhar_card_number) ? $agent->aadhar_card_number : ''}}">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>PAN Card Number<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="pan_card_number" value="{{!empty($agent->pan_card_number) ? $agent->pan_card_number : ''}}">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>Driving License Number<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="DL_number" value="{{!empty($agent->DL_number) ? $agent->DL_number : ''}}">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>RC Book Number<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="RC_book_number" value="{{!empty($agent->RC_book_number) ? $agent->RC_book_number : ''}}">
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label>Upload Aadhar Card<span style="color: red;">*</span></label>
                                        <input type="file" class="form-control preview2" id="" name="aadhar_card_image_path" accept="image/*">
                                        <img src="{{!empty($agent->aadhar_card_image_path) ? $agent->aadhar_card_image_path : asset('commonarea/dist/img/default.png')}}" class="img-select preview_image2" alt="{{!empty($agent->aadhar_card_image_name) ? $agent->aadhar_card_image_name : 'Aadhar Card Image'}}">
                                        <input type="hidden" name="old_aadhar_card_image" id="old_aadhar_card_image" value="{{!empty($agent->aadhar_card_image_path) ? $agent->aadhar_card_image_path : ''}}">

                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label>Upload PAN Card<span style="color: red;">*</span></label>
                                        <input type="file" class="form-control preview3" id="" name="pan_card_image_path" accept="image/*">
                                        <img src="{{!empty($agent->pan_card_image_path) ? $agent->pan_card_image_path : asset('commonarea/dist/img/default.png')}}" class="img-select preview_image3" alt="{{!empty($agent->pan_card_image_name) ? $agent->pan_card_image_name : 'Pan Card Image'}}">
                                        <input type="hidden" name="old_pan_card_image" id="old_pan_card_image" value="{{!empty($agent->pan_card_image_path) ? $agent->pan_card_image_path : ''}}">

                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label>Upload Driving License<span style="color: red;">*</span></label>
                                        <input type="file" class="form-control preview4" id="" name="DL_image_path" accept="image/*">
                                        <img src="{{!empty($agent->DL_image_path) ? $agent->DL_image_path : asset('commonarea/dist/img/default.png')}}" class="img-select preview_image4" alt="{{!empty($agent->DL_image_name) ? $agent->DL_image_name : 'Driving License Image'}}">
                                        <input type="hidden" name="old_DL_image" id="old_DL_image" value="{{!empty($agent->DL_image_path) ? $agent->DL_image_path : ''}}">

                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label>Upload RC Book<span style="color: red;">*</span></label>
                                        <input type="file" class="form-control preview5" id="" name="RC_image_path" accept="image/*">
                                        <img src="{{!empty($agent->RC_image_path) ? $agent->RC_image_path : asset('commonarea/dist/img/default.png')}}" class="img-select preview_image5" alt="{{!empty($agent->RC_image_name) ? $agent->RC_image_name : 'RC Book Image'}}">
                                        <input type="hidden" name="old_RC_image" id="old_RC_image" value="{{!empty($agent->RC_image_path) ? $agent->RC_image_path : ''}}">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <button type="submit" id="submit_btn" class="btn btn-success form_btn submit leftpri city_add" data-id="submit"><i class="fa fa-check-circle"></i> Submit</button>
                                        <button type="button" class="btn btn-danger form_btn"><i class="fa fa-times-circle"></i> Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                            <!-- End box-body -->
                        </div>
                        <!-- End box-body -->
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

<script src="{{asset('controller_js/cn_delivery_agent.js')}}"></script>
<script type="text/javascript">
    $(".s_meun").removeClass("active");
    $(".delivery_agent_active").addClass("active");


    $(document).ready(function() {

        $('#dob').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
            changeMonth: true,
            changeYear: true
        })
        .on("changeDate", function(selected) {
            $('#dob-error').html("");
            $('#dob').removeClass("error");
            $('#dob-error').removeClass("error");
            $('#dob-error').css('display','none');
        });

    });
</script>
@endsection