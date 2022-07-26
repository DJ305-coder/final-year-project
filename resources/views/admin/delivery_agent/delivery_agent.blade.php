@extends('.admin/dashboard/vw_dashboard')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="row no-margin">
            <div class="col-md-12 no-pad">
                <section class="content-header">
                    <h1>Delivery Agent List
                        <div class="pull-right">
                            <a href="{{url('add-delivery-agent')}}"><button type="button" class="btn btn-success leftpri systemuser_add"><i class="fa fa-plus-circle"></i> Add Delivery Agent </button></a>
                        </div>

                    </h1>
                </section>
                <section class="content" style="padding:5px 0px;">
                    <div class="col-md-12 no-pad">
                        <div class="box box-primary">
                            <div class="box-body">

                                <div class="row">
                                    <div class="col-sm-12 ">
                                        <div class="table-responsive">
                                            <table id="example" class="table table-bordered data-table">
                                                <thead>
                                                    <tr>
                                                        <th width="7%" class="text-center">Sr No.</th>
                                                        <th width="15%">Name</th>
                                                        <th width="15%">Email ID</th>
                                                        <th width="15%">Mobile No.</th>
                                                        <th width="15%">City</th>

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

                                <!-- End box-body -->
                            </div>
                        </div> <!-- End box-body -->
                    </div> <!-- End box -->
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

</script>
@endsection