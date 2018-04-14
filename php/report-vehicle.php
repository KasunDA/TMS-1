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
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase">Vehicle Detailed Report</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form class="form-horizontal" role="form">
                            <div class="form-body">
                                <div class="row"> 
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Date Range</label>
                                        <div class="col-md-3">
                                            <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                                                <input type="text" class="form-control" name="from" placeholder="mm/dd/yyyy">
                                                <span class="input-group-addon"> to </span>
                                                <input type="text" class="form-control" name="to" placeholder="mm/dd/yyyy"> </div>
                                            <!-- /input-group -->
                                        </div>
                                        <label class="col-md-2 control-label">Select Vehicle:</label>
                                        <div class="col-md-3">
                                            <select class="form-control">
                                                <option>All</option>
                                                <option>KP9076</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-9 col-md-push-2">
                                            <div class="">
                                                <button type="submit" class="btn blue">Check</button> 
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
                            <a href="" class="expand"> </a>
                        </div>
                    </div>
                    <div class="portlet-body table-both-scroll" style="display: none;">
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                        <thead>
                                            <tr>
                                               <th> Transaction ID: </th>
                                                <th> Date </th>
                                                <th> From  </th>
                                                <th> To </th>
                                                <th> Movement </th>
                                                <th> Empty Terminal </th>
                                                <th> Container No </th>
                                                <th> Size </th>
                                                <th> Line </th>
                                                <th> Vehcle No </th>
                                                <th> Advance </th>
                                                <th> Account  </th>
                                                <th> Name </th>
                                                <th> Remarks: No </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         
                                            <tr class="odd gradeX">
                                                <td> 1602365 </td>
                                                <td> 02/3/2018 </td>
                                                <td> DPWM-1 </td>
                                                <td> QICT </td>
                                                <td> EMPTY </td>
                                                <td> PCT-PQ </td>
                                                <td> MRKU4990688 </td>
                                                <td> 40 </td>
                                                <td> N/A </td>
                                                <td> JT8685 </td>
                                                <td> 500 </td>
                                                <td> QICT </td>
                                                <td> POS.PQ </td>
                                                <td> N/A </td>

                                            </tr>
                                                     
                                                       
                                          
                                             
                                        </tbody>
                                    </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <!-- BEGIN BORDERED TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered ">
                    
                    <div class="portlet-body ">
                        <div class="table-scrollable  table-scrollable-borderless">
                            <table class="table table-hover table-light">
                                <thead>
                                    <tr class="uppercase">
                                        <td> # </td>
                                        <td> Total Trips </td>
                                        <td> 90 </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="uppercase">
                                        <td> 1 </td>
                                        <td> Advance Taken </td>
                                        <td> 9000 </td>
                                    </tr>
                                    <tr>
                                        <td> 2 </td>
                                        <td> Balance (Total of all trips) </td>
                                        <td> 80000 </td>
                                    </tr>
                                    <tr>
                                        <td> 3 </td>
                                        <td> Diesle </td>
                                        <td> 6000 </td>
                                    </tr>
                                    <tr>
                                        <td> 4 </td>
                                        <td> Repair & Maintenance </td>
                                        <td> 20000</td>
                                    </tr>
                                    <tr>
                                        <td> 5 </td>
                                        <td> Driver Salary</td>
                                        <td> 20000</td>
                                    </tr>
                                    <tr>
                                        <td> 6 </td>
                                        <td> Paid </td>
                                        <td> 0</td>
                                    </tr>
                                    <tr>
                                        <td> 7 </td>
                                        <td> Total Balance </td>
                                        <td> 40000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END BORDERED TABLE PORTLET-->
            </div>
            <div class="col-md-6">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase">Debit:</span>
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
                                        <label class="col-md-4 control-label">Bank Name</label>
                                        <div class="col-md-5">
                                           <input type="text" class="form-control" placeholder="HBL">
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