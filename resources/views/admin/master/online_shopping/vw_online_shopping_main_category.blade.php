@extends('.admin/dashboard/vw_dashboard')
@section('content')
<!-- Content Wrapper. Contains page content -->
<style>
  .cross {
    top: 12px;
  }
</style>
<div class="content-wrapper">

  <!-- Main content -->
  <section class="content">
    <div class="row no-margin">
      <div class="col-md-4 no-pad">
        <section class="content-header">
          <h1>Add Main Category </h1>
        </section>

        <div class="box box-primary">
          <div class="box-body light-green-body" style="min-height:480px">
            <form action="{{route('online-shopping-main-category.store')}}" method="post" enctype="multipart/form-data" id="main_shopping_form">
              @csrf
              <div class="col-md-12 form-group no-padd">
                <label>Main Category<span style="color: red;">*</span></label>
                <input type="text" name="main_shopping_category_name" id="" value="{{!empty($main_shopping_category->main_shopping_category_name) ? $main_shopping_category->main_shopping_category_name : ''; }}" autocomplete="off" class="form-control isAlpha">
              </div> <!-- End form-group -->
             
              <div class="col-md-12 form-group no-padd">
                <label>Upload Thumbnail Image <small class="text-danger">(size:1350*400, Only .png format)</small><span style="color: red;">*</span></label>
                <input type="file" name="category_image" id="category_image" autocomplete="off" class="form-control valid preview1 ">
                <div class="img-preview">
                  <div class="photo p-relative">
                    <img src="{{!empty($main_shopping_category->category_image) ? $main_shopping_category->category_image  : asset('commonarea/dist/img/default.png')}}" alt="product Image" height="150px" width="150px" class="img-select img-upload preview_image1">
                  </div>
                </div>
              </div>
            
              <input type="hidden" name="txtpkey" id="txtpkey" value="{{!empty($main_shopping_category->id) ? $main_shopping_category->id : ''; }}">
              <div class="clearfix"></div>
              <div class="col-md-12 form-group no-padd">
                <button type="submit" name="submit_btn" id="submit_btn" class="btn btn-success save_btn submit sub-btn" data-id="submit"><i class="fa fa-check-circle"></i> Submit</button>
                <a href=""> <button type="button" class="btn btn-danger cancel-btn"><i class="fa fa-times-circle"></i> Cancel</button></a>
              </div> <!-- End form-group -->
            </form>
          </div> <!-- End box-body -->
        </div> <!-- End box -->
      </div>

      <div class="col-md-8 no-pad-right">
        <section class="content-header">
          <h1>Main Category List </h1>

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
                              <th width="50%">Main Category</th>
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
<script src="{{asset('controller_js/cn_shopping_main_category.js')}}"></script>
<script type="text/javascript">
  $(".s_meun").removeClass("active");
  $(".master_active").addClass("active");
  $(".master_online_shopping_main_category_active").addClass("active");
</script>
@endsection