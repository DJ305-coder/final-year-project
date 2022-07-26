@extends('.admin/dashboard/vw_dashboard')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Main content -->
  <section class="content">
    <div class="row no-margin">
      <div class="col-md-4 no-pad">
        <section class="content-header">
          <h1>@if(isset($country))Update Country @else Add Country @endif</h1>
        </section>

        <div class="box box-primary">
          <div class="box-body light-green-body" style="min-height:480px">
          <form action="{{route('country.store')}}" method="post" id="country_form">
            @csrf
            <div class="col-md-12 form-group no-padd">
              <input type="hidden" name="txtpkey" id="txtpkey" value="{{isset($country->id) ? $country->id : '';}}">
              <label>Country<span style="color: red;">*</span></label>
              <input type="text" name="country_name" id="country_name" autocomplete="off" value="{{ isset($country->country_name) ? $country->country_name : '' }}" class="form-control isAlpha">
            </div> <!-- End form-group -->
            <div class="clearfix"></div>
            <div class="col-md-12 form-group no-padd">
              <button type="submit" id="submit_btn" class="btn btn-success save_btn submit sub-btn" data-id="submit"><i class="fa fa-check-circle"></i>@if(isset($country)) Update @else Submit @endif</button>
              <a href=""> <button type="button" class="btn btn-danger cancel-btn"><i class="fa fa-times-circle"></i> Cancel</button></a>
            </div> <!-- End form-group -->
          </form>
          </div> <!-- End box-body -->
        </div> <!-- End box -->
      </div>

      <div class="col-md-8 no-pad-right">
        <section class="content-header">
          <h1>Country List </h1>

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
                              <th width="50%">Country</th>
                              <th width="20%" class="text-center">Status</th>
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
<script src="{{asset('controller_js/cn_country.js')}}"></script>
<script type="text/javascript">
  $(".s_meun").removeClass("active");
  $(".master_active").addClass("active");
  $(".master_country_active").addClass("active");
  
</script>

@endsection