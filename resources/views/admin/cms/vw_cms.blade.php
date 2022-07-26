@extends('.admin/dashboard/vw_dashboard')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


    <!-- Main content -->
    <section class="content">

        <!-- Content Header (Page header) -->
        <section class="content-header" style="padding: 0px 0px 15px 0;">
            <h1>
                Content Management System
            </h1>
            <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><i class="fa fa-bookmark-o"></i> CMS</li>
      </ol> -->
        </section>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-body">

                        <!---------------------- form start --------------------->
                        <form method="post" name="" id="cms_form" action="{{route('update_cms')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">


                                <div class="col-md-12 form-group">
                                    <label class="lablefnt">Pages </label>
                                    <select class="form-control" name="id" id="id" onchange="pageInfo(this.value)">
                                        <option value="" selected>Select Pages</option>
                                        @foreach($data as $data_cms)
                                        <option value="{{$data_cms->id}}">{{$data_cms->page}}</option>
                                        @endforeach
                                    </select>
                                    <label id="id-error" class="id-error error" for="id"></label>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-12 form-group">
                                    <label class="lablefnt">Title</label>
                                    <input type="text" name="title" value="" id="title" class="form-control" autocomplete="off">
                                    <label id="title-error" class="title-error error" for="title"></label>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-12 form-group">
                                    <label class="lablefnt">Description </label>
                                    <textarea name="content" id="content" class="summernote"></textarea>
                                    <label id="content-error" class="content-error error" for="content"></label>
                                </div>
                                <!-- <div class="col-md-6 form-group">
                            <label class="lablefnt">Title </label>
                            <input type="text" name="title_name" value="" id="title_id" class="form-control" autocomplete="off">
                        </div> -->
                                <div class="clearfix"></div>
                                <div class="col-md-8 form-group">
                                    <div class="col-md-12 form-group no-pad">
                                        <label class="lablefnt">Meta Title </label>
                                        <input type="text" name="meta_title" value="" id="meta_title" class="form-control" autocomplete="off">   
                                        <label id="meta_title-error" class="meta_title-error error" for="meta_title"></label>
                                    </div>
                                    <div class="col-md-12 form-group no-pad">
                                        <label class="lablefnt">Meta Keywords</label>
                                        <input type="text" name="meta_keywords" value="" id="meta_keywords" class="form-control" autocomplete="off">
                                        <label id="meta_keywords-error" class="meta_keywords-error error" for="meta_keywords"></label>
                                    </div>
                                    <div class="col-md-12 form-group  no-pad">
                                        <label class="lablefnt">Meta Description</label>
                                        <textarea type="text" name="description" id="description" class="form-control" autocomplete="off"></textarea>
                                        <label id="description-error" class="description-error error" for="description"></label>
                                    </div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="lablefnt">Upload Images</label>
                                    <input name="cms_image_path" class="form-control preview" id="cms_image_path" type="file">
                                    <img src="{{asset('commonarea/dist/img/default.png')}}" id="preview_profile_path" class="prof-photo mt-10 preview_image" width="150">
                                    <input type="hidden" name="old_image" id="old_image" value="">

                                </div>

                                <div class="clearfix"></div>

                                <div class="clearfix"></div>

                                <div class="clearfix"></div>

                                <div class="clearfix"></div>
                                <!---------------------- submit button start--------------------->
                                <div class="col-md-12">
                                    <button type="submit" value="submit" class="btn btn-success submit" id="form_submit"><i class="fa fa-check-circle"></i> Submit</button>
                                    <a href="">
                                        <button type="button" class="btn btn-danger">
                                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                                            Cancel
                                        </button>
                                    </a>
                                </div>
                                <!-- <div class="col-md-12">
                        <div class="box-footer">
                          <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </div> -->

                                <!---------------------- submit button end--------------------->
                            </div>
                        </form>
                        <!---------------------- form end --------------------->
                    </div>


                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
@section('script')
<script src="{{asset('controller_js/cn_cms.js')}}"></script>
<script type="text/javascript">
    $(".s_meun").removeClass("active");

    $(".content_management_active").addClass("active");
    $(".cms_active").addClass("active");

    $(document).ready(function() {
        $('.summernote').summernote({
            height: 200,
        }).on('summernote.keyup', function() {
            var text = $(".summernote").summernote("code").replace(/&nbsp;|<\/?[^>]+(>|$)/g, "").trim();
            //alert(text);
            if (text.length == 0) {
                $('#content-error').show();
            } else {
                $('#content-error').hide();
                // $("#btnForm").removeAttr("disabled");
            }
        });
    });
</script>

@endsection