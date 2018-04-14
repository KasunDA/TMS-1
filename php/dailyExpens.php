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
                <div class="col-md-6">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-red-sunglo">
                                <i class="icon-settings font-red-sunglo"></i>
                                <span class="caption-subject bold uppercase">Expenses:</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form class="form-horizontal" role="form">
                                <div class="form-body">
                                    <div class="row"> 
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Date:</label>
                                            <div class="col-md-5">
                                                <input class="form-control form-control-inline input-medium date-picker" size="16" type="date-picker" value="" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Description:</label>
                                            <div class="col-md-5">
                                                <select class="form-control">
                                                    <option>Lunch</option>
                                                    <option>Advance</option>
                                                    <option>Diesel</option>
                                                    <option>Bike Expenses</option>
                                                    <option>Driver Salary</option>
                                                </select>
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
                                            <label class="col-md-4 control-label">Check No.</label>
                                            <div class="col-md-5">
                                               <input type="text" class="form-control" placeholder="5033554">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Bank Name</label>
                                            <div class="col-md-5">
                                               <select class="form-control">
                                                   <option>HBL</option>
                                                   <option>BHL</option>
                                               </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Amount</label>
                                            <div class="col-md-5">
                                               <input type="text" class="form-control" placeholder="58680">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Vehicle #:</label>
                                            <div class="col-md-5">
                                                <select class="form-control">
                                                    <option>EN6087</option>
                                                    <option>KH9087</option>
                                                    <option>ML908</option>
                                                    <option>PL098</option>
                                                    <option>MN098</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Name:</label>
                                            <div class="col-md-5">
                                                <select class="form-control">
                                                    <option>Tayyab</option>
                                                    <option>Port Qasim</option>
                                                    <option>Agha Steel</option>
                                                    <option>Steel Mill</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Occupation:</label>
                                            <div class="col-md-5">
                                                <select class="form-control">
                                                    <option>Driver</option>
                                                    <option>Owner</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Discription:</label>
                                            <div class="col-md-5">
                                               <input type="text" class="form-control" placeholder="Text Here">
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
                <div class="col-md-6">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-red-sunglo">
                                <i class="icon-settings font-red-sunglo"></i>
                                <span class="caption-subject bold uppercase">Income:</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form class="form-horizontal" role="form">
                                <div class="form-body">
                                    <div class="row"> 
                                        <div class="form-group">
                                            <label class="control-label col-md-4">Date:</label>
                                            <div class="col-md-5">
                                                <input class="form-control form-control-inline input-medium date-picker" size="16" type="date-picker" value="" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Description:</label>
                                            <div class="col-md-5">
                                                <select class="form-control">
                                                    <option>Advance</option>
                                                    <option>Bank</option>
                                                    <option>Driver Salary</option>
                                                </select>
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
                                            <label class="col-md-4 control-label">Check No.</label>
                                            <div class="col-md-5">
                                               <input type="text" class="form-control" placeholder="5033554">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Bank Name</label>
                                            <div class="col-md-5">
                                               <select class="form-control">
                                                   <option>HBL</option>
                                                   <option>BHL</option>
                                               </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Amount</label>
                                            <div class="col-md-5">
                                               <input type="text" class="form-control" placeholder="58680">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Name:</label>
                                            <div class="col-md-5">
                                                <select class="form-control">
                                                    <option>Tayyab</option>
                                                    <option>Port Qasim</option>
                                                    <option>Agha Steel</option>
                                                    <option>Steel Mill</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Discription:</label>
                                            <div class="col-md-5">
                                               <input type="text" class="form-control" placeholder="Text Here">
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
            <div class="row">
                 <div class="col-md-6">
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
                                        <th> ID: </th>
                                         <th> Date </th>
                                         <th> Discription  </th>
                                         <th> Check No </th>
                                         <th> Bank Name </th>
                                         <th> Amount </th>
                                         <th> Vehicle # </th>
                                         <th> Name: </th>
                                         <th> Occupation: </th>
                                         <th> Discription: </th>    
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <tr class="odd gradeX">
                                         <td> 15 </td>
                                         <td> 02/3/2018 </td>
                                         <td> DPWM-1 </td>
                                         <td> QICT </td>
                                         <td> EMPTY </td>
                                         <td> PCT-PQ </td>
                                         <td> MRKU4990688 </td>
                                         <td> 40 </td>
                                         <td> N/A </td>
                                         <td> JT8685 </td>
                                     </tr>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-6">
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
                             <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_2">
                                 <thead>
                                     <tr>
                                        <th> ID: </th>
                                         <th> Date </th>
                                         <th> Discription  </th>
                                         <th> Check No </th>
                                         <th> Bank Name </th>
                                         <th> Amount </th>
                                         <th> Vehicle # </th>
                                         <th> Name: </th>
                                         <th> Occupation: </th>
                                         <th> Discription: </th>    
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <tr class="odd gradeX">
                                         <td> 15 </td>
                                         <td> 02/3/2018 </td>
                                         <td> DPWM-1 </td>
                                         <td> QICT </td>
                                         <td> EMPTY </td>
                                         <td> PCT-PQ </td>
                                         <td> MRKU4990688 </td>
                                         <td> 40 </td>
                                         <td> N/A </td>
                                         <td> JT8685 </td>
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
                                            <td> # </td>
                                            <td> Last Balance</td>
                                            <td> 900000 </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="uppercase">
                                            <td> 1 </td>
                                            <td> Today Income </td>
                                            <td> 9000 </td>
                                        </tr>
                                        <tr>
                                            <td> 2 </td>
                                            <td> Today Expenses </td>
                                            <td> 80000 </td>
                                        </tr>
                                        <tr>
                                            <td> 3 </td>
                                            <td> Balance </td>
                                            <td> 810000 </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END BORDERED TABLE PORTLET-->
                </div>
            </div>
            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<?php 
include 'footer.php';
 ?>