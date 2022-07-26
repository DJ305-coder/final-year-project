<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="row no-margin">

            <div class="col-md-12 no-pad">
                <section class="content-header">
                    <h1>View Pending Online Shopping Order List
                        <div class="pull-right">
                            <a href="<?= site_url('admin/orders/online-orders') ?>">
                                <button type="button" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i> Back</button>
                            </a>

                        </div>
                    </h1>
                </section>
                <section class="content" style="padding:7px 0px;">
                    <div class="col-md-4 no-pad-left">
                        <div class="col-md-12 mb-10">
                            <div class="row">
                                <div class="col-md-12 no-pad">
                                    <div class="view-hd">
                                        <p class="text-left mb-0"> Customer Details
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-12 bg-white box-body no-height">

                                    <div class="col-md-12 no-pad contact_person_details">
                                        <div class="i-text"><i class="fa fa-user"></i> <span>Yogita Patil</span></div>
                                        <div class="i-text"><i class="fa fa-envelope"></i> <span>yogita@gmail.com</span></div>
                                        <div class="i-text"><i class="fa fa-phone"></i> <span>1234567890</span></div>
                                        <div class="i-text"><i class="fa fa-map-marker"></i> <span>A Wing, Vishrantwadi, Pune, Maharashtra, 411 052.</span></div>

                                    </div>

                                </div>
                                <div class="col-md-12 no-pad">
                                    <div class="view-hd">
                                        <p class="text-left mb-0"> Order Details</p>
                                    </div>
                                </div>
                                <div class="col-md-12 bg-white box-body no-height">
                                    <table class="usertable mb-10" style="width:100%">
                                        <tbody>

                                            <tr>
                                                <th width="50%">Payment Type <span class="float-right">:</span></th>
                                                <td width="50%" style="padding-left: 10px;text-align:left !important;">QR Code</td>
                                            </tr>
                                            <tr>
                                                <th>Transaction ID <span class="float-right">:</span></th>
                                                <td style="padding-left: 10px;text-align:left !important;"> #44723</td>
                                            </tr>
                                            <tr>
                                                <th>Paid Amount <span class="float-right">:</span></th>
                                                <td style="padding-left: 10px;text-align:left !important;"> 1420.00</td>
                                            </tr>
                                            <tr>
                                                <th>Order Date <span class="float-right">:</span></th>
                                                <td style="padding-left: 10px;text-align:left !important;"> 02-09-2021 01:29:00 PM</td>
                                            </tr>
                                            <tr>
                                                <th>Delivery Address<span class="float-right">:</span></th>
                                                <td style="padding-left: 10px;text-align:left !important;"> Vishrantwadi, Pune 444607.</td>
                                            </tr>
                                            <tr>
                                                <th>Delivery Date & Time<span class="float-right">:</span></th>
                                                <td style="padding-left: 10px;text-align:left !important;"> 04-09-2021 12 pm - 3 pm</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 no-pad">
                        <div class="col-md-12 mb-10">
                            <div class="row">

                                <div class="col-md-12 no-pad">
                                    <div class="view-hd">
                                        <p class="text-left mb-0"> Order Details <small><b>( Order Id:- DB425 )</b></small>
                                            <!-- <span class="float-right">Order Type - Basket</span> -->
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-12 bg-white box-body">
                                    <div class="basic-strip">Status - Pending</div>

                                    <div class="col-md-12 no-pad mt-10">
                                        <table id="example" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="8%">Sr No.</th>
                                                    <th width="20%">Item</th>
                                                    <th width="15%">MRP</th>
                                                    <th width="15%">Discount Price</th>
                                                    <th width="15%">Quantity</th>
                                                    <th width="15%">Total Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Item 1</td>
                                                    <td>40</td>
                                                    <td>35</td>
                                                    <td>1</td>
                                                    <td>35</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5" style="text-align: right !important;"><b>Sub Total (Rs.)</b></td>
                                                    <td style="text-align: left !important;"><b>35</b></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5" style="text-align: right !important;"><b>Delivery Charges (Rs.)</b></td>
                                                    <td style="text-align: left !important;"><b>0.00</b></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5" style="text-align: right !important;"><b>Total (Rs.)</b></td>
                                                    <td style="text-align: left !important;"><b>35</b></td>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12 no-pad">
                        <div class="box box-primary">
                            <div class="box-body no-height">
                                <div class="col-md-4 form-group no-pad-left">

                                    <label>Status <span style="color: red;">*</span></label>

                                    <select class="form-control" id="selstatus" name="statusorder">

                                        <option value="">Select Status</option>
                                        <option value="2">Inprocess</option>
                                        <option value="2">Confirm</option>

                                        <option value="6">Cancel</option>

                                    </select>
                                </div>
                                <div class="col-md-4 form-group no-pad">

                                    <label>Invoice</label>
                                    <button class="btn btn-falcon-default d-block"><img src="<?= site_url('assets/commonarea/'); ?>dist/img/download.png" width="18" alt=""><span class="ml-2">Download Invoice</span></button>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-4 form-group no-pad-left">
                                    <label>Delivery Date <span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar podate"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right podate" id="" name="" autocomplete="off" value="13/12/2021" disabled>

                                    </div>
                                </div>
                                <div class="col-md-4 form-group no-pad-left">
                                    <label>Select Slot<span style="color: red;">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        <select class="form-control">

                                            <option value="">Select Status</option>
                                            <option value="9">9 PM 12 PM</option>
                                            <option value="10">12 PM 3 PM</option>
                                            <option value="11">3 PM 6 PM</option>
                                            <option value="12">6 PM 9 PM</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-3 form-group no-pad-left">
                                    <label>Delivery Boy<span style="color: red;">*</span></label>
                                    <select class="form-control">
                                        <option value="">Select</option>
                                        <option value="2">ram jadhav</option>
                                        <option value="3">Suddhi</option>
                                    </select>

                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-4 form-group no-pad-left">
                                    <label>Packed By<span style="color: red;">*</span></label>
                                    <select class="form-control" name="packed_by_id" style="color: #555;" autocomplete="off" id="packed_by_id">
                                        <option value="">Select</option>
                                        <option value="5">Aakash</option>
                                        <option value="4">Kiran Ingale</option>
                                        <option value="3">Ranju</option>
                                        <option value="1">Test</option>

                                    </select>

                                </div>
                                <div class="col-md-4 form-group no-pad-left">
                                    <label>Checked By<span style="color: red;">*</span></label>
                                    <select class="form-control" name="checked_by_id" style="color: #555;" autocomplete="off" id="checked_by_id">
                                        <option value="">Select</option>
                                        <option value="5">Aakash</option>
                                        <option value="4">Kiran Ingale</option>
                                        <option value="3">Ranju</option>
                                        <option value="1">Test</option>

                                    </select>

                                </div>
                                <div class="col-md-12 form-group no-pad">
                                    <button type="submit" name="submit_btn" id="submit_btn" class="btn btn-success form_btn submit leftpri city_add" data-id="submit"><i class="fa fa-check-circle"></i> Submit</button>


                                    <button type="button" class="btn btn-danger form_btn"><i class="fa fa-times-circle"></i> Cancel</button>
                                </div>
                            </div>
                        </div>

                    </div>
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

    // $("#example").dataTable();
</script>