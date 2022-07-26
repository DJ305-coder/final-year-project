<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="row no-margin">

            <div class="col-md-12 no-pad">
                <section class="content-header">
                    <h1>Inprocess Online Shopping Order List
                        <div class="pull-right">
                            <a href="<?= site_url('admin/orders/online-orders') ?>">
                                <button type="button" class="btn bg-w tab-p" style="padding: 6px 12px !important;">
                                    <i class="fa fa-clock-o"></i> Pending <span class="badge bg-white text-primary ml-5">4</span>
                                </button>
                            </a>
                            <a href="<?= site_url('admin/inprocess-orders') ?>">
                                <button type="button" class="btn btn-warning tab-p" style="padding: 6px 12px !important;">
                                    <i class="fa fa-signal"></i> Inprocess <span class="badge bg-white text-primary ml-5">4</span>
                                </button>
                            </a>
                            <a href="<?= site_url('admin/orders/confirmed-online-orders') ?>">
                                <button type="button" class="btn bg-w tab-p" style="padding: 6px 12px !important;">
                                    <i class="fa fa-check-circle"></i> Confirmed <span class="badge bg-white text-primary ml-5">4</span>
                                </button>
                            </a>

                            <a href="<?= site_url('admin/orders/delivered-online-orders') ?>">
                                <button type="button" class="btn bg-w tab-p" style="padding: 6px 12px !important;">
                                    <i class="fa fa-truck" aria-hidden="true"></i> Delivered <span class="badge bg-white text-primary ml-5">4</span>
                                </button>
                            </a>

                        </div>
                    </h1>
                </section>
                <section class="content" style="padding:7px 0px;">
                    <div class="box box-primary">
                        <div class="box-body">

                            <div class="row">
                                <div class="col-sm-12 ">
                                    <button style="" type="submit" class="btn btn-warning mb-10"> <i class="fa fa-file-excel-o" aria-hidden="true"></i> Export To Excel</button>
                                    <div class="table-responsive">
                                        <table id="example" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="min-width: 40px;" class="text-center">Sr No.</th>
                                                    <th style="min-width: 70px;"> Order ID</th>

                                                    <th style="min-width: 140px;">Date & Time</th>
                                                    <th style="min-width: 140px;">Delivery Date & Time </th>
                                                    <th style="min-width: 80px;">Name</th>
                                                    <th style="min-width: 80px;">Mobile No.</th>
                                                    <th style="min-width: 120px;">Location</th>
                                                    <th style="min-width: 80px;">Total Cost</th>
                                                    <th style="min-width: 50px;" class="text-center">Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td>DB552</td>


                                                    <td>04-10-2021 ,03:38 PM</td>
                                                    <td>29-09-2021 ,12 pm - 3 pm</td>
                                                    <td>Ygita Patil</td>
                                                    <td>1234567890</td>
                                                    <td>Pune, Maharashtra, 444607.</td>
                                                    <td>933.00</td>
                                                    <td class="text-center">
                                                        <a href="<?= site_url('admin/orders/vw-inprocess-online-orders') ?>" class="btn btn-primary btn-xs" title="Add Stock">
                                                            <i class="fa fa-eye"></i>
                                                        </a>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">2</td>
                                                    <td>DB500</td>

                                                    <td>05-10-2021 ,03:38 PM</td>
                                                    <td>06-10-2021 ,12 pm - 3 pm</td>
                                                    <td>Kranti K</td>
                                                    <td>1234567890</td>
                                                    <td>Pune, Maharashtra, 444607.</td>
                                                    <td>546.00</td>
                                                    <td class="text-center">
                                                        <a href="<?= site_url('admin/orders/vw-inprocess-online-orders') ?>" class="btn btn-primary btn-xs" title="Add Stock">
                                                            <i class="fa fa-eye"></i>
                                                        </a>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- End box-body -->
                        </div>
                        <!-- End box-body -->
                    </div>
                    <!-- End box -->
                </section>
            </div>
        </div>
        <!-- /.row -->
    </section>
</div>



<script type="text/javascript">
    $(".s_meun").removeClass("active");
    $(".orders_active").addClass("active");
    $(".online_orders_active").addClass("active");

    $("#example").dataTable();
</script>