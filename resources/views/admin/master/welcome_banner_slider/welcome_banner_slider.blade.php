@extends('.admin/dashboard/vw_dashboard')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="row no-margin">
            <div class="col-md-4 no-pad">
                <section class="content-header">
                    <h1>Add Banner </h1>
                </section>

                <div class="box box-primary">
                    <div class="box-body light-green-body" style="min-height:480px">
                        <form action="{{route('sliders.store')}}" method="POST" enctype= "multipart/form-data" id="slider_form">
                        @csrf
                        <div class="col-md-12 form-group no-padd">
                            <label>Title<span style="color: red;">*</span></label>
                            <input type="text" name="title" id="title" autocomplete="off" class="form-control" value="{{!empty($slider->title) ? $slider->title : '';}}">
                        </div>
                        <input type="hidden" name="txtpkey" id="txtpkey" value="{{!empty($slider->id) ? $slider->id : '';}}">
                        <div class="col-md-12 form-group no-padd">
                            <label>Upload Banner Image <small class="text-danger">(size:1350*400, Only .png format)</small><span style="color: red;">*</span></label>
                            <input type="file" name="slider_image" id="slider_image" autocomplete="off" class="form-control valid preview ">
                            <div class="img-preview">
                                <div class="photo p-relative">
                                    <img src="{{!empty($slider->slider_image) ? Storage::url($slider->slider_image) :  asset('commonarea/dist/img/default.png')}}" alt="product Image" height="150px" width="150px" class="img-upload profile-img4 preview_image">
                                </div>
                            </div>
                            <input type="hidden" name="old_slider_image" id="old_slider_image" value="{{!empty($slider->slider_image) ? $slider->slider_image : '';}}" >
                        </div><!-- End form-group -->
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
                    <h1>Banner List </h1>

                </section>
                <div class="box box-primary">
                    <div class="box-body " style="min-height:480px">
                        <div class="box-body no-height">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">

                                        <div class="row no-margin">
                                            <div class="col-sm-12 no-pad">
                                                <table id="example" class="table table-bordered td_img data-table">
                                                    <thead>
                                                        <tr role="row">
                                                            <th width="10%">Sr No.</th>
                                                            <th width="30%">Title</th>
                                                            <th width="30%">Banner Images</th>
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

<script src="{{asset('controller_js/cn_slider.js')}}"></script>

<script type="text/javascript">
    $(".s_meun").removeClass("active");
    $(".master_active").addClass("active");
    $(".welcome_banner_slider_active").addClass("active");

</script>
@endsection