@extends('.admin/dashboard/vw_dashboard')
@section("content")
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="row no-margin">
            <div class="col-md-4 no-pad">
                <section class="content-header" style="padding: 0px;">
                    <h1>FAQ </h1>
                </section>

                <div class="box box-primary">
                    <div class="box-body light-green-body" style="min-height:480px">
                        <form action="{{route('faqs.store')}}" method="POST" enctype="multipart/form-data" id="faq_form">
                            @csrf
                            <input type="hidden" name="txtpkey" id="txtpkey" value="{{!empty($faq->id) ? $faq->id : '';}}">
                            <div class="col-md-12 form-group no-padd">
                                <label>Question<span style="color: red;">*</span></label>
                                <input type="text" name="question" value="{{!empty($faq->question) ? $faq->question : ''; }}" class="form-control" autocomplete="off">
                            </div>
                            <div class="col-md-12 form-group no-padd">
                                <label>Answer<span style="color: red;">*</span></label>
                                <input type="text" name="answer" value="{{!empty($faq->answer) ? $faq->answer : ''; }}" class="form-control" autocomplete="off">
                            </div>
                            <!-- End form-group -->
                            <div class="clearfix"></div>
                            <div class="col-md-12 form-group no-padd">
                                <button type="submit" class="btn btn-success save_btn submit" data-id="submit"><i class="fa fa-check-circle"></i>
                                    {{!empty($faq->id) ? 'Update' : 'Submit';}}</button>
                                <a href=""> <button type="button" class="btn btn-danger clear_btn"><i class="fa fa-times-circle"></i>Clear</button></a>
                            </div> <!-- End form-group -->
                        </form>
                    </div> <!-- End box-body -->
                </div> <!-- End box -->
            </div>

            <div class="col-md-8 no-pad-right">
                <section class="content-header" style="padding: 0px;">
                    <h1>FAQ's List </h1>
                </section>

                <div class="box box-primary">
                    <div class="box-body " style="min-height:480px">
                        <div class=" no-height">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">

                                        <div class="row no-margin">
                                            <div class="col-sm-12 no-pad">
                                                <table id="example" class="table table-bordered">
                                                    <thead>
                                                        <tr role="row">
                                                            <th width="10%">Sr No</th>
                                                            <th width="30%">Question</th>
                                                            <th width="30%">Answer</th>
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
                    </div> <!-- End box-body -->
                </div> <!-- End box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
</div>
@endsection
@section('script')
<script src="{{asset('controller_js/cn_faq.js')}}"></script>

<script type="text/javascript">
    $(".s_meun").removeClass("active");
    $(".faq_active").addClass("active");

    $('.clear_btn').on('click', function() {
        location.reload();
    });
</script>

@endsection