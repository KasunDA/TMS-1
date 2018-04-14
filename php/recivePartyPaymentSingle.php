<?php 
include 'header.php';
include 'nav.php';
 ?>

    <!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEAD-->
        <div class="page-head">
        <!-- END PAGE HEAD-->
        <!-- BEGIN PAGE BASE CONTENT -->
       
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-green">
                            <i class="icon-settings font-green"></i>
                            <span class="caption-subject bold uppercase">M/S : Agha Steel</span>
                        </div>
                        <div class="tools">
                            <a href="" class="collapse"> </a>
                            <a href="" class="remove"> </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover order-column">
                            <thead>
                                <tr>
                                    <th>Bill No.</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Agent</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Empty Terminal</th>
                                    <th>Line</th>
                                    <th>BL No.</th>
                                    <th>Cont. QTY</th>
                                    <th>Party Rate</th>
                                    <th>Total Party Bill</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>14</td>
                                    <td><span class="label label-sm label-danger"> Unpaid </span></td>
                                    <td>12-3-2018</td>
                                    <td>Tayyab</td>
                                    <td>QICT</td>
                                    <td>Agha Steel</td>
                                    <td>QICT</td>
                                    <td>MSC</td>
                                    <td>MSCUU7786</td>
                                    <td>22</td>
                                    <td>8000</td>
                                    <td>176000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable table-scrollable-borderless">
                            <table class="table table-hover table-light">
                                <thead>
                                    <tr class="uppercase">
                                        <th> # </th>
                                        <th> Name </th>
                                        <th> Vehicle No. </th>
                                        <th> CONT. Size </th>
                                        <th> Index No. </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> 1 </td>
                                        <td> Mark </td>
                                        <td> E5050 </td>
                                        <td> 20 x 20 </td>
                                        <td> 5090 </td>
                                    </tr>
                                    <tr>
                                        <td> 2 </td>
                                        <td> Mark </td>
                                        <td> E5050 </td>
                                        <td> 20 x 20 </td>
                                        <td> 5090 </td>
                                    </tr>
                                    <tr>
                                        <td> 3 </td>
                                        <td> Mark </td>
                                        <td> E5050 </td>
                                        <td> 20 x 20 </td>
                                        <td> 5090 </td>
                                    </tr>
                                    <tr>
                                        <td> 4 </td>
                                        <td> Mark </td>
                                        <td> E5050 </td>
                                        <td> 20 x 20 </td>
                                        <td> 5090 </td>
                                    </tr>
                                    <tr>
                                        <td> 5 </td>
                                        <td> Mark </td>
                                        <td> E5050 </td>
                                        <td> 20 x 20 </td>
                                        <td> 5090 </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-9">
                                <div class="">
                                    <button type="submit" class="btn blue">Print</button> 
                                    <button type="button" class="btn default">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-push-6">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase">Payment Recived:</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form class="form-horizontal" role="form">
                            <div class="form-body">
                                <div class="row"> 
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">voucher #:</label>
                                        <div class="col-md-5">
                                           <input type="text" class="form-control" placeholder="58680">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Payment Method</label>
                                        <div class="col-md-5">
                                            <div class="mt-radio-list">
                                                <label class="mt-radio">
                                                    <input type="radio" name="optionsRadios" id="optionsRadios22" value="option1" checked> Check
                                                    <span></span>
                                                </label>
                                                <label class="mt-radio">
                                                    <input type="radio" name="optionsRadios" id="optionsRadios23" value="option2" checked> Cash
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Check #</label>
                                        <div class="col-md-5">
                                           <input type="text" class="form-control" placeholder="58680">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Amount</label>
                                        <div class="col-md-5">
                                           <input type="text" class="form-control" placeholder="58680">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-5 col-md-push-4">
                                            <div class="">
                                                <button type="submit" class="btn blue">Submit</button> 
                                                <button type="button" class="btn default">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Form ends -->
                    <!-- end table -->
                    
                </div> 
            </div>
        </div>
    <!-- END CONTENT BODY -->
        </div>
<!-- END CONTENT -->
    </div>
</div>
<!-- END CONTAINER -->
<?php 
include 'footer.php';
 ?>