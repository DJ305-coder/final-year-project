@extends('.admin/dashboard/vw_dashboard')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="row no-margin">
            <div class="col-md-12 no-pad">
                <section class="content-header">
                    <h1>
                        Registered Users list
                    </h1>
                </section>
                <section class="content" style="padding:5px 0px;">
                    <div class="col-md-12 no-pad">
                        <div class="box box-primary">
                            <div class="box-body light-green-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="6%">Sr No.</th>
                                                <th width="18%">Registration Date & Time</th>
                                                <th width="8%">User Id</th>
                                                <th width="12%">Full Name</th>
                                                <th width="9%">DOB</th>
                                                <th width="11%">Email</th>
                                                <th width="10%">Mobile No</th>
                                                <th width="8%">State</th>
                                                <th width="8%">City</th>                                                
                                                <th width="3%">Status</th>
                                                <th width="7%">Action</th>
                                            </tr>
                                            </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
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
<script src="{{asset('controller_js/cn_registered_users.js')}}"></script>
<script type="text/javascript">
    $(".s_meun").removeClass("active");
    $(".registered_users_active").addClass("active");
</script>
@endsection

