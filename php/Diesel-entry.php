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
                                <span class="caption-subject bold uppercase">Diesel Entry</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form class="form-horizontal" role="form" method="post">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="form-group">
                                            <div id="_div" class="hidden">
                                              <label class="col-md-2 control-label">ID:</label>
                                              <div class="col-md-3">
                                                <input type="text" class="form-control" id="" name="" required readonly >
                                              </div>
                                            </div>
                                    
                                        </div>
                                        
                                    </div>
                                    <div class="row"> 
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Date:</label>
                                            <div class="col-md-3">
                                              <input type="date-picker" class="form-control form-control-inline input-medium date-picker"  size="16" id="datee" name="datee" value="<?php echo date('m-d-Y'); ?>"  required tabindex="1">
                                            </div>
                                            
                                            <label class="col-md-2 control-label">vehicle#:</label>
                                            <div class="col-md-3">
                                                <select class="form-control" id="vehicle_id" name="vehicle_id" required tabindex="3">
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
                                            <label class="col-md-2 control-label">From:</label>
                                            <div class="col-md-3">
                                                <select class="form-control">
                                                    <option>Yard 1</option>
                                                    <option>Yard 2</option>
                                                </select>
                                            </div>
                                            <label class="col-md-2 control-label">To:</label>
                                            <div class="col-md-3">
                                                <select class="form-control">
                                                    <option>Yard 2</option>
                                                    <option>Yard 3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">1 Litter Rate:</label>
                                            <div class="col-md-3">
                                               <input type="text" class="form-control" placeholder="100">
                                            </div>
                                            <label class="col-md-2 control-label">Total Price #:</label>
                                            <div class="col-md-3">
                                               <input type="text" class="form-control" placeholder="auto fill (1 litter price X total litters)" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Extra Litters:</label>
                                            <div class="col-md-3">
                                               <input type="text" class="form-control" placeholder="7">
                                            </div>
                                            <label class="col-md-2 control-label">Discription:</label>
                                            <div class="col-md-3">
                                               <input type="text" class="form-control" placeholder="Why extra Litters">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-5 col-md-push-2">
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
                                            <td> 110 </td>
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