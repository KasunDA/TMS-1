<?php 
include 'header.php';
include 'nav.php';
require 'connection.php';
date_default_timezone_set("Asia/Karachi");
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
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase">Party Payment Report</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form class="form-horizontal" role="form" method="post">
                            <div class="form-body">
                                <div class="row"> 
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Date Range</label>
                                        <div class="col-md-3">
                                            <div class="input-group input-large date-picker input-daterange">
                                                <input type="text" class="form-control"  id="from_datee" name="from_datee" required tabindex="1" <?php echo 'value="'.date('m/d/Y').'"'; ?> placeholder="mm/dd/yyyy">
                                                <span class="input-group-addon"> to </span>
                                                <input type="text" class="form-control" id="to_datee" name="to_datee" required tabindex="2" <?php echo 'value="'.date('m/d/Y').'"'; ?> placeholder="mm/dd/yyyy"> </div>
                                            <!-- /input-group -->
                                        </div>
                                        <label class="col-md-2 control-label">Select Type:</label>
                                        <div class="col-md-3">
                                             <select class="form-control" name="vehicle_id" id="vehicle_id" tabindex="3">
                                                         <option value="">Select Vehicle</option>
                                                         <?php 

                                                          $q = mysqli_query($mycon,'SELECT vehicle_id,vehicle_number from vehicle where status=1 ORDER BY vehicle_id DESC');

                                                          while( $r = mysqli_fetch_array($q) )
                                                            {?>
                                                              <option value="<?php echo $r['vehicle_id']; ?>"><?php echo $r['vehicle_number']; ?></option>
                                                          <?php } //END OF WHILE ?>
                                                          
                                                     </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-9 col-md-push-2">
                                            <div class="">
                                                <button type="submit" class="btn blue" id="btn_submit" tabindex="4">Check</button>
                                                <!-- <button type="button" class="btn default">Cancel</button> -->
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
        <!-- END PAGE BASE CONTENT -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-green">
                            <i class="icon-settings font-green"></i>
                            <span class="caption-subject bold uppercase">Detailed Report</span>
                        </div>
                        <div class="tools">
                            <a href="" class="collapse"> </a>
                            <a href="" class="remove"> </a>
                        </div>
                    </div>
                    <div class="portlet-body table-both-scroll">
                        <table class="table table-striped table-bordered table-hover order-column" id="sample_3">
                            <thead>
                                <tr>
                                    <th>Action</th>
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
                                    <td> 
                                      <ul class="addremove">
                                        <li> 
                                            <a href="recivePartyPaymentSingle.php">
                                            <button class="btn btn-xs green" type="button">  
                                            <i class="fa fa-plus-square"></i>
                                            </button>
                                            </a> 
                                        </li>
                                      </ul>
                                    </td>
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
                                <tr>
                                    <td> 
                                      <ul class="addremove">
                                        <li> 
                                            <a href="recivePartyPaymentSingle.php">
                                            <button class="btn btn-xs green" type="button">  
                                            <i class="fa fa-plus-square"></i>
                                            </button>
                                            </a> 
                                        </li>
                                      </ul>
                                    </td>
                                    <td>15</td>
                                    <td><span class="label label-sm label-success"> paid </span></td>
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
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-push-6">
                <!-- BEGIN BORDERED TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered ">
                    
                    <div class="portlet-body ">
                        <div class="table-scrollable  table-scrollable-borderless">
                            <table class="table table-hover table-light">
                                <thead>
                                    <tr class="uppercase">
                                        <th> # </th>
                                        <th> Total unpaid Bills </th>
                                        <th> 20 </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> 1 </td>
                                        <td> Total Party Bill </td>
                                        <td> 800000 </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END BORDERED TABLE PORTLET-->
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