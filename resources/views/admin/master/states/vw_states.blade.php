@extends('.admin/dashboard/vw_dashboard')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="row no-margin">
            <div class="col-md-4 no-pad">
                <section class="content-header">
                    <h1>@if(isset($state))Update State @else Add State @endif </h1>
                </section>

                <div class="box box-primary">
                    <div class="box-body light-green-body" style="min-height:480px">
                        <form action="{{route('states.store')}}" method="post" id="state_form">
                        @csrf
                            <div class="col-md-12 form-group no-padd">
                                <input type="hidden" name="txtpkey" id="txtpkey" value="{{!empty($state->id) ? $state->id : ''}}">
                                <label>Country<span style="color: red;">*</span></label>
                                <select class="form-control" name="country_id" id="country_id">
                                    <option value="" disabled selected>Select Country</option>   
                                    @foreach ($countries as $country_data)
                                        @if(!empty($state->country_id))
                                            <option value="{{$country_data->id}}" {{$country_data->id == $state->country_id ? 'selected' : '' }}>{{$country_data->country_name}}</option> 
                                        @else
                                            <option value="{{$country_data->id}}">{{$country_data->country_name}}</option> 
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 form-group no-padd">
                                <label>State<span style="color: red;">*</span></label>
                                <input type="text" name="state_name" id="state_name" autocomplete="off" class="form-control" value="{{ !empty($state->state_name) ? $state->state_name : '' }}">
                            </div>
                            <!-- End form-group -->
                            <div class="clearfix"></div>
                            <div class="col-md-12 form-group no-padd">
                                <button type="submit" id="submit_btn" class="btn btn-success save_btn submit sub-btn" data-id="submit"><i class="fa fa-check-circle"></i>@if(isset($state)) Update @else Submit @endif</button>
                                <a href=""> <button type="button" class="btn btn-danger cancel-btn"><i class="fa fa-times-circle"></i> Cancel</button></a>
                            </div>
                        </form>
                        <!-- End form-group -->

                    </div> <!-- End box-body -->
                </div> <!-- End box -->
            </div>

            <div class="col-md-8 no-pad-right">
                <section class="content-header">
                    <h1>State List </h1>

                </section>
                <div class="box box-primary">
                    <div class="box-body " style="min-height:480px">
                        <div class="box-body no-height">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">

                                        <div class="row no-margin">
                                            <div class="col-sm-12 no-pad">
                                                <table id="example" class="table table-bordered data-table">
                                                    <thead>
                                                        <tr role="row">
                                                            <th width="10%" class="text-center">Sr No.</th>
                                                            <th width="30%">Country</th>
                                                            <th width="30%">State</th>
                                                            <th width="10%" class="text-center">Status</th>
                                                            <th width="20%" class="text-center">Action</th>
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
                    </div> <!-- End box-body -->
                </div> <!-- End box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
</div>


@endsection
@section('script')
<script src="{{asset('controller_js/cn_states.js')}}"></script>
<script type="text/javascript">
    $(".s_meun").removeClass("active");
    $(".master_active").addClass("active");
    $(".master_state_active").addClass("active");
</script>
@endsection