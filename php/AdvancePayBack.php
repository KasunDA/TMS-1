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
                                <span class="caption-subject bold uppercase">Advance Payment</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form class="form-horizontal" role="form">
                                <div class="form-body">
                                    <div class="row"> 
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Default Datepicker</label>
                                            <div class="col-md-3">
                                                <input class="form-control form-control-inline input-medium date-picker" size="16" type="date-picker" value="" />
                                            </div>
                                    
                                            <label class="col-md-2 control-label">Description:</label>
                                            <div class="col-md-3">
                                              <input type="text" id="daily_expense_auto" name="daily_expense_auto" class="form-control" placeholder="Details" /> </div>
                                            </div>
                                         </div>    
                                     <div class="row"> 
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Payment Method</label>
                                            <div class="col-md-3">
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
                                            <label class="col-md-2 control-label">Check #</label>
                                            <div class="col-md-3">
                                               <input type="text" class="form-control" placeholder="58680">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                                <label class="col-md-2 control-label">Amount #</label>
                                                <div class="col-md-3">
                                                   <input type="text" class="form-control" placeholder="58680">
                                                </div>
                                          </div>  
                                      </div> 


                                        
                                     
                                    <div class="form-actions ">
                                        <button type="submit" class="btn blue">Submit</button> 
                                        <button type="button" class="btn default">Cancel</button>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                        <!-- Form ends -->
                        <hr>
                             <div class="row">
                         <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    
                                    <div class="portlet-body">
                                 
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                            <thead>
                                                <tr>
                                                   
                                                   <th> Date: </th>
                                                    <th> Description: </th>
                                                    <th> Amount </th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                             
                                                <tr class="odd gradeX">
                                                    <td> 03/28/2018</td>
                                                    <td> Lunch</td>
                                                    <td> EN585584</td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                    <td> 03/28/2018</td>
                                                    <td> Lunch</td>
                                                    <td> EN585584</td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                    <td> 03/28/2018</td>
                                                    <td> Lunch</td>
                                                    <td> EN585584</td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                    <td> 03/28/2018</td>
                                                    <td> Lunch</td>
                                                    <td> EN585584</td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                    <td> 03/28/2018</td>
                                                    <td> Lunch</td>
                                                    <td> EN585584</td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                    <td> 03/28/2018</td>
                                                    <td> Lunch</td>
                                                    <td> EN585584</td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                    <td> 03/28/2018</td>
                                                    <td> Lunch</td>
                                                    <td> EN585584</td>
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