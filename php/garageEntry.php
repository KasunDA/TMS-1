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
                                <span class="caption-subject bold uppercase">Garage Entry</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form class="form-horizontal" role="form">
                                <div class="form-body">
                                    <div class="row"> 
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Date:</label>
                                            <div class="col-md-3">
                                                <input class="form-control form-control-inline input-medium date-picker" size="16" type="date-picker" value="" placeholder="Today Date" />
                                            </div>
                                    
                                            <label class="col-md-2 control-label">Description:</label>
                                            <div class="col-md-3">
                                              <input type="text" id="daily_expense_auto" name="daily_expense_auto" class="form-control" placeholder="Details" /> </div>
                                            </div>
                                         </div>    
                                     <div class="row"> 
                                         <div class="form-group">
                                            <label class="col-md-2 control-label">vehicle#:</label>
                                            <div class="col-md-3">
                                                <select class="form-control">
                                                    <option>E8797</option>
                                                    <option>E8797</option>
                                                </select>
                                            </div>
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
                                                   
                                                    <th> Action </th> 
                                                   <th> Date: </th>
                                                    <th> Description: </th>
                                                    <th> vehicle #: </th>
                                                    <th> Amount </th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                             
                                                <tr class="odd gradeX">
                                                     
                                                    <td> 
                                                      <ul class="addremove">
                                                        <li> <button class="btn btn-xs green" type="button">  
                                                        <i class="fa fa-plus-square"></i>
                                                        </button> </li>
                                                        <li>  <button class="btn btn-xs red" type="button">  
                                                        <i class="fa fa-minus-square"></i>
                                                        </button> </li>
                                                      </ul>
                                                       
                                                      
                                                    </td>
                                                     
                                                    <td> 03/28/2018</td>
                                                    <td> Repair</td>
                                                    <td> EN585584</td>
                                                    <td>5100</td>
                                                    
                                                

                                                </tr>
                                                <tr class="odd gradeX">
                                                     
                                                    <td> 
                                                      <ul class="addremove">
                                                        <li> <button class="btn btn-xs green" type="button">  
                                                        <i class="fa fa-plus-square"></i>
                                                        </button> </li>
                                                        <li>  <button class="btn btn-xs red" type="button">  
                                                        <i class="fa fa-minus-square"></i>
                                                        </button> </li>
                                                      </ul>
                                                       
                                                      
                                                    </td>
                                                     
                                                    <td> 03/28/2018</td>
                                                    <td> Repair</td>
                                                    <td> EN585584</td>
                                                    <td>5100</td>
                                                    
                                                

                                                </tr>
                                                <tr class="odd gradeX">
                                                     
                                                    <td> 
                                                      <ul class="addremove">
                                                        <li> <button class="btn btn-xs green" type="button">  
                                                        <i class="fa fa-plus-square"></i>
                                                        </button> </li>
                                                        <li>  <button class="btn btn-xs red" type="button">  
                                                        <i class="fa fa-minus-square"></i>
                                                        </button> </li>
                                                      </ul>
                                                       
                                                      
                                                    </td>
                                                     
                                                    <td> 03/28/2018</td>
                                                    <td> Repair</td>
                                                    <td> EN585584</td>
                                                    <td>5100</td>
                                                    
                                                

                                                </tr>
                                                <tr class="odd gradeX">
                                                     
                                                    <td> 
                                                      <ul class="addremove">
                                                        <li> <button class="btn btn-xs green" type="button">  
                                                        <i class="fa fa-plus-square"></i>
                                                        </button> </li>
                                                        <li>  <button class="btn btn-xs red" type="button">  
                                                        <i class="fa fa-minus-square"></i>
                                                        </button> </li>
                                                      </ul>
                                                       
                                                      
                                                    </td>
                                                     
                                                    <td> 03/28/2018</td>
                                                    <td> Repair</td>
                                                    <td> EN585584</td>
                                                    <td>5100</td>
                                                    
                                                

                                                </tr>
                                                <tr class="odd gradeX">
                                                     
                                                    <td> 
                                                      <ul class="addremove">
                                                        <li> <button class="btn btn-xs green" type="button">  
                                                        <i class="fa fa-plus-square"></i>
                                                        </button> </li>
                                                        <li>  <button class="btn btn-xs red" type="button">  
                                                        <i class="fa fa-minus-square"></i>
                                                        </button> </li>
                                                      </ul>
                                                       
                                                      
                                                    </td>
                                                     
                                                    <td> 03/28/2018</td>
                                                    <td> Repair</td>
                                                    <td> EN585584</td>
                                                    <td>5100</td>
                                                    
                                                

                                                </tr>
                                                <tr class="odd gradeX">
                                                     
                                                    <td> 
                                                      <ul class="addremove">
                                                        <li> <button class="btn btn-xs green" type="button">  
                                                        <i class="fa fa-plus-square"></i>
                                                        </button> </li>
                                                        <li>  <button class="btn btn-xs red" type="button">  
                                                        <i class="fa fa-minus-square"></i>
                                                        </button> </li>
                                                      </ul>
                                                       
                                                      
                                                    </td>
                                                     
                                                    <td> 03/28/2018</td>
                                                    <td> Repair</td>
                                                    <td> EN585584</td>
                                                    <td>5100</td>
                                                    
                                                

                                                </tr>
                                                <tr class="odd gradeX">
                                                     
                                                    <td> 
                                                      <ul class="addremove">
                                                        <li> <button class="btn btn-xs green" type="button">  
                                                        <i class="fa fa-plus-square"></i>
                                                        </button> </li>
                                                        <li>  <button class="btn btn-xs red" type="button">  
                                                        <i class="fa fa-minus-square"></i>
                                                        </button> </li>
                                                      </ul>
                                                       
                                                      
                                                    </td>
                                                     
                                                    <td> 03/28/2018</td>
                                                    <td> Repair</td>
                                                    <td> EN585584</td>
                                                    <td>5100</td>
                                                    
                                                

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