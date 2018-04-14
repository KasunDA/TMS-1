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
                                <span class="caption-subject bold uppercase">Diesel Report</span>
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
                             </div>
                         </div>
                         <div class="portlet-body table-both-scroll">
                             <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                 <thead>
                                     <tr>
                                        <th> ID: </th>
                                         <th> Date: </th>
                                         <th> Vehicle #: </th>
                                         <th> From: </th>
                                         <th> To: </th>
                                         <th> 1 Litter Rate: </th>
                                         <th> Extra Litters: </th>   
                                         <th> Discription: </th>   
                                         <th> Total Price: </th>   
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <tr class="odd gradeX">
                                         <td> 15 </td>
                                         <td> 02/3/2018 </td>
                                         <td> EN865 </td>
                                         <td> Port Qasim </td>
                                         <td> Agha Steel </td>
                                         <td> 110 </td>
                                         <td> Nil </td>
                                         <td> Nil </td>
                                         <td> 11000 </td>
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
                                            <td> One litter Price</td>
                                            <td> 110, 100, 105</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="uppercase">
                                            <td> 1 </td>
                                            <td> Total Litters </td>
                                            <td> 120 </td>
                                        </tr>
                                        <tr>
                                            <td> 2 </td>
                                            <td> Extra Litters </td>
                                            <td> 20 </td>
                                        </tr>
                                        <tr>
                                            <td> 3 </td>
                                            <td> Total Price </td>
                                            <td> 15400 </td>
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
<!-- END CONTAINER -->
<?php 
include 'footer.php';
 ?>