@extends('.admin/dashboard/vw_dashboard')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-4 no-pad-right">
                <section class="content-header">
                    <h1>@if(isset($city))Update City @else Add City @endif</h1>
                </section>

                <div class="box box-primary">
                    <div class="box-body light-green-body mob_min_height_auto" style="min-height:480px">
                        <form method="post" id="city_form" action="{{route('city.store')}}" enctype="multipart/form-data">
                        @csrf
                            <div class="col-md-12 form-group no-padd">
                                <input type="hidden" name="txtpkey" id="txtpkey" value="{{!empty($city->id) ? $city->id : ''}}">
                                <label>Country<span style="color: red;">*</span></label>
                                  <select class="form-control" name="country_id" id="country_id" onchange="getStates(this.value)">
                                    <option value="" disabled selected>Select Country</option>
                                    @foreach ($countries as $country_data)
                                        @if(!empty($city->country_id))
                                            <option value="{{$country_data->id}}" {{$country_data->id == $city->country_id ? 'selected' : '' }}>{{$country_data->country_name}}</option> 
                                        @else
                                            <option value="{{$country_data->id}}">{{$country_data->country_name}}</option> 
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 form-group no-padd">
                                <label>State<span style="color: red;">*</span></label>
                                <select class="form-control" name="state_id" id="state_id">
                                    <option value="" disabled selected>Select State</option>
                                    @if (!empty($states))
                                        @foreach ($states as $state_data)
                                            @if(!empty($city->state_id))
                                                <option value="{{$state_data->id}}" {{$state_data->id == $city->state_id ? 'selected' : '' }}>{{$state_data->state_name}}</option> 
                                            @else
                                                <option value="{{$state_data->id}}">{{$state_data->state_name}}</option> 
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-12 form-group no-padd">
                                <label>City<span style="color: red;">*</span></label>
                                <input type="text" name="city_name" id="city_name" autocomplete="off" class="form-control" value="{{ !empty($city->city_name) ? $city->city_name : '' }}">
                            </div> <!-- End form-group -->
                            <div class="clearfix"></div>
                            <div class="col-md-12 form-group no-padd">
                                <button type="submit" id="submit_btn" class="btn btn-success save_btn submit sub-btn" data-id="submit"><i class="fa fa-check-circle"></i>@if(isset($city)) Update @else Submit @endif</button>
                                <a href=""> <button type="button" class="btn btn-danger cancel-btn"><i class="fa fa-times-circle"></i> Cancel</button></a>
                            </div> 
                        </form>
                        <!-- End form-group -->
                        
                    </div> <!-- End box-body -->
                </div> <!-- End box -->
            </div>

            <div class="col-md-8">
                <section class="content-header">
                    <h1>City List </h1>

                </section>
                <div class="box box-primary">

                    <div class="box-body" style="min-height:480px">

                        <div class="">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-bordered data-table">
                                            <thead>
                                                <tr role="row">
                                                    <th width="10%" class="text-center">Sr No.</th>
                                                    <th width="23%">Country</th>
                                                    <th width="23%">State</th>
                                                    <th width="24%">City</th>
                                                    <th width="10%" class="text-center">Status</th>
                                                    <th width="10%" class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                </div> <!-- End box-body -->
            </div> <!-- End box -->
        </div>
</div>
<!-- /.row -->
</section>
</div>

@endsection
@section('script')
<script src="{{asset('controller_js/cn_city.js')}}"></script>
<script type="text/javascript">
    $(".s_meun").removeClass("active");

    $(".master_active").addClass("active");
    $(".master_city_active").addClass("active");
</script>
@endsection