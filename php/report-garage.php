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
                                <span class="caption-subject bold uppercase">Garage Report</span>
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
                                                <option>ALL</option>
                                                <option>EN509</option>
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
                        <hr>
                             <div class="row">
                              <div class="col-md-3">
                                  <!-- BEGIN WIDGET THUMB -->
                                  <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                      <h4 class="widget-thumb-heading">Total Expenses</h4>
                                      <div class="widget-thumb-wrap">
                                          <i class="widget-thumb-icon bg-red icon-bar-chart"></i>
                                          <div class="widget-thumb-body">
                                              <span class="widget-thumb-subtitle">PKR</span>
                                              <span class="widget-thumb-body-stat" data-counter="counterup" data-value="1,293">0</span>
                                          </div>
                                      </div>
                                  </div>
                                  <!-- END WIDGET THUMB -->
                              </div>
                         <div class="col-md-9">

                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    
                                    <div class="portlet-body">
                                 
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                            <thead>
                                                <tr>
                                                   
                                                   <th> Date: </th>
                                                    <th> Description: </th>
                                                    <th> vehicle #: </th>
                                                    <th> Amount </th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                             
                                                <tr class="odd gradeX">
                                                     
                                                    
                                                     
                                                    <td> 03/28/2018</td>
                                                    <td> Repairing</td>
                                                    <td> EN585584</td>
                                                    <td> 52000</td>
                                                

                                                </tr>
                                                <tr class="odd gradeX">
                                                     
                                                    
                                                     
                                                    <td> 03/28/2018</td>
                                                    <td> Repairing</td>
                                                    <td> EN585584</td>
                                                    <td> 52000</td>
                                                

                                                </tr>
                                                <tr class="odd gradeX">
                                                     
                                                    
                                                     
                                                    <td> 03/28/2018</td>
                                                    <td> Repairing</td>
                                                    <td> EN585584</td>
                                                    <td> 52000</td>
                                                

                                                </tr>
                                                <tr class="odd gradeX">
                                                     
                                                    
                                                     
                                                    <td> 03/28/2018</td>
                                                    <td> Repairing</td>
                                                    <td> EN585584</td>
                                                    <td> 52000</td>
                                                

                                                </tr>
                                                <tr class="odd gradeX">
                                                     
                                                    
                                                     
                                                    <td> 03/28/2018</td>
                                                    <td> Repairing</td>
                                                    <td> EN585584</td>
                                                    <td> 52000</td>
                                                

                                                </tr>
                                                <tr class="odd gradeX">
                                                     
                                                    
                                                     
                                                    <td> 03/28/2018</td>
                                                    <td> Repairing</td>
                                                    <td> EN585584</td>
                                                    <td> 52000</td>
                                                

                                                </tr>
                                                <tr class="odd gradeX">
                                                     
                                                    
                                                     
                                                    <td> 03/28/2018</td>
                                                    <td> Repairing</td>
                                                    <td> EN585584</td>
                                                    <td> 52000</td>
                                                

                                                </tr>
                                                
                                              
                                                 
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                         </div>
                        </div>
                        <!-- end table -->
                        
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