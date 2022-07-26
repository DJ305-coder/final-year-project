@extends('.admin/dashboard/vw_dashboard')
@section('content')
<!-- Content Wrapper. Contains page content -->
<style>
    .remove-photo {
        width: auto !important;
    }
</style>
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="row no-margin">

            <div class="col-md-12 no-pad">
                <section class="content-header">
                    <h1>View Delivery Agent
                        <div class="pull-right">
                            <a href="{{url('delivery-agent-list')}}">
                                <button type="button" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i> Back</button>
                            </a>
                        </div>
                    </h1>
                </section>
                <section class="content" style="padding:5px 0px;">
                    <div class="col-md-4 no-pad-left">
                        <div class="col-md-12 mb-10">
                            <div class="row">
                                <div class="col-md-12 no-pad">
                                    <div class="view-hd">
                                        <p class="text-left mb-0">Basic Details</p>
                                    </div>
                                </div>
                                <div class="col-md-12 bg-white box-body" style="min-height: 420px;">
                                    <div class="col-md-12">
                                        <div class="reg-user-img">

                                            <img src="{{!empty($agent->profile_image_path) ? $agent->profile_image_path : asset('commonarea/dist/img/default.png')}}" class=" display-inline-xs width-400 d-flex" alt="{{!empty($agent->profile_image_name) ? $agent->profile_image_name : 'Profile Image'}}">
                                        </div>

                                    </div>
                                    <div class="col-md-12 no-pad ">
                                        <div class="custom_heading">
                                            <label>Personal Details :</label>
                                        </div>

                                        <div class="col-md-12 no-pad contact_person_details">
                                            <div class="i-text"><i class="fa fa-user"></i> <span>{{!empty($agent->name) ? $agent->name : ''}}</span></div>
                                            <div class="i-text"><i class="fa fa-envelope"></i> <span>{{!empty($agent->email) ? $agent->email : ''}}</span></div>
                                            <div class="i-text"><i class="fa fa-phone"></i> <span>{{!empty($agent->mobile_number) ? $agent->mobile_number : ''}}</span></div>
                                            <div class="i-text"><i class="fa fa-birthday-cake"></i> <span>{{!empty($agent->dob) ? $agent->dob : ''}}</span></div>
                                            <div class="i-text"><i class="fa fa-male"></i> <span>{{!empty($agent->gender) ? $agent->gender : ''}}</span></div>
                                            <div class="i-text"><i class="fa fa-money"></i> <span>INR {{!empty($agent->salary) ? number_format($agent->salary,2, '.', ',')  : ''}}</span></div>
                                            <div class="i-text"><i class="fa fa-globe"></i> <span>{{!empty($country->country_name) ? $country->country_name : ''}}</span></div>
                                            <div class="i-text"><i class="fa fa-flag"></i> <span>{{!empty($state->state_name) ? $state->state_name : ''}}</span></div>
                                            <div class="i-text"><i class="fa fa-building-o "></i> <span>{{!empty($city->city_name) ? $city->city_name : ''}}</span></div>
                                            <div class="i-text"><i class="fa fa-map-marker "></i> <span>{{!empty($agent->address) ? $agent->address : ''}}</span></div>
                                            <div class="i-text"><i class="fa fa-address-book-o"></i> <span>{{!empty($agent->area) ? $agent->area : ''}}</span></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 no-pad">
                        <div class="box box-primary">
                            <div class="box-body" style="min-height: 530px;">

                                <div class="col-md-12 no-pad">
                                    <div class="custom_heading">
                                        <label>Documents Details</label>
                                    </div>

                                </div>

                                <div class="col-sm-3 form-group">
                                    <label>Aadhar Card</label>
                                    <h2 class="view-cnt">{{!empty($agent->aadhar_card_number) ? $agent->aadhar_card_number : ''}}</h2>
                                    <div class="col-sm-12 form-group no-pad">

                                        <img src="{{!empty($agent->aadhar_card_image_path) ? $agent->aadhar_card_image_path : asset('commonarea/dist/img/default.png')}}" width="150" height="150" class=" display-inline-xs width-100" alt="{{!empty($agent->aadhar_card_image_name) ? $agent->aadhar_card_image_name : 'Aadhar Card Image'}}">
                                        <a class="remove-photo" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i> View</a>
                                    </div>
                                </div>

                                <div class="col-sm-3 form-group">
                                    <label>PAN Card</label>
                                    <h2 class="view-cnt">{{!empty($agent->pan_card_number) ? $agent->pan_card_number : ''}}</h2>

                                    <div class="col-sm-12 form-group no-pad">
                                        <img src="{{!empty($agent->pan_card_image_path) ? $agent->pan_card_image_path : asset('commonarea/dist/img/default.png')}}" width="150" height="150" class=" display-inline-xs width-100" alt="{{!empty($agent->pan_card_image_name) ? $agent->pan_card_image_name : 'Pan Card Image'}}">
                                        <a class="remove-photo" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i> View</a>

                                    </div>
                                </div>

                                <div class="col-sm-3 form-group">
                                    <label>Driving License</label>
                                    <h2 class="view-cnt">{{!empty($agent->DL_number) ? $agent->DL_number : ''}}</h2>

                                    <div class="col-sm-12 form-group no-pad">
                                        <img src="{{!empty($agent->DL_image_path) ? $agent->DL_image_path : asset('commonarea/dist/img/default.png')}}" width="150" height="150" class=" display-inline-xs width-100" alt="{{!empty($agent->DL_image_name) ? $agent->DL_image_name : 'Driving License Image'}}">
                                        <a class="remove-photo" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i> View</a>

                                    </div>
                                </div>

                                <div class="col-sm-3 form-group">
                                    <label>RC Book</label>
                                    <h2 class="view-cnt">{{!empty($agent->RC_book_number) ? $agent->RC_book_number : ''}}</h2>

                                    <div class="col-sm-12 form-group no-pad">
                                        <img src="{{!empty($agent->RC_image_path) ? $agent->RC_image_path : asset('commonarea/dist/img/default.png')}}" width="150" height="150" class=" display-inline-xs width-100" alt="{{!empty($agent->RC_image_name) ? $agent->RC_image_name : 'RC Book Image'}}">
                                        <a class="remove-photo" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i> View</a>

                                    </div>
                                </div>

                                <!-- End box-body -->
                            </div>
                            <!-- End box-body -->
                        </div>
                    </div>
                    <!-- End box -->
                </section>
            </div>
        </div>
    </section>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-body modal_img">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <img src="{{asset('commonarea/dist/img/default.png')}}">

            </div>

        </div>

    </div>
</div>

@endsection
@section('script')

<script type="text/javascript">
    $(".s_meun").removeClass("active");
    $(".delivery_agent_active").addClass("active");

    var table = $("#example").dataTable();

    $(document).ready(function() {

        $('#delivery-agent-dob').datepicker({
            dateFormat: 'yy-dd-mm',
            autoclose: true,
            todayHighlight: true,
            changeMonth: true,
            changeYear: true
        });

    });
</script>
@endsection