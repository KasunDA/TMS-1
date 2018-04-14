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
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">Dashboard</span>
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE BASE CONTENT -->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-red-sunglo">
                                <i class="icon-settings font-red-sunglo"></i>
                                <span class="caption-subject bold uppercase"> Add New</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form class="form-horizontal" role="form">
                                <div class="form-body">
                                   
                                    <div class="row"> 
                                        <div class="form-group">
                                                  <label class="col-md-2 control-label">Transaction ID:</label>
                                                <div class="col-md-3">
                                                  <input type="text" class="form-control" placeholder="E-1035">
                                                </div>
                                    
                                                  <label class="col-md-2 control-label">Transaction Date:</label>
                                                <div class="col-md-3">
                                                  <input type="date" class="form-control" placeholder="E-1035">
                                                </div>
                                         </div>  
                                     </div>
                                     <div class="row"> 
                                           <div class="form-group">
                                                 <label class="col-md-2 control-label"> Clearing Agent:</label>
                                                 <div class="col-md-3">
                                                     <select class="form-control">
                                                         <option>Tayyab</option>
                                                         <option>Ali</option> 
                                                     </select>
                                                 </div>
                                                 
                                             </div> 
                                       </div>
                                     <div class="row"> 
                                          <div class="form-group">
                                                <label class="col-md-2 control-label">On Account Of:</label>
                                                <div class="col-md-3">
                                                    <select class="form-control">
                                                        <option>Part Name 1</option>
                                                        <option>Part Name 2</option>
                                                        <option>Part Name 3</option>
                                                        <option>Part Name 4</option>
                                                        <option>Part Name 5</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-5">
                                                  <input type="text" class="form-control" placeholder="Full Form">
                                                </div>
                                            </div> 
                                      </div>
                                          <div class="row"> 
                                          <div class="form-group">
                                                <label class="col-md-2 control-label">Consignee:</label>
                                                <div class="col-md-3">
                                                    <select class="form-control">
                                                        <option>Option 1</option>
                                                        <option>Option 2</option>
                                                        <option>Option 3</option>
                                                        <option>Option 4</option>
                                                        <option>Option 5</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-5">
                                                  <input type="text" class="form-control" placeholder="Full Form">
                                                </div>
                                            </div> 
                                      </div>
                                    <div class="row"> 
                                          <div class="form-group">
                                                <label class="col-md-2 control-label"> Movement:</label>
                                                <div class="col-md-3">
                                                    <select class="form-control">
                                                        <option>Empty</option>
                                                        <option>Import</option>
                                                        <option>Export</option> 
                                                    </select>
                                                </div>
                                                
                                            </div> 
                                      </div>
                                      <div class="row"> 
                                            <div class="form-group">
                                                  <label class="col-md-2 control-label"> Empty Terminal:</label>
                                                  <div class="col-md-3">
                                                      <select class="form-control">
                                                          <option>Option 1</option>
                                                          <option>Option 2</option>
                                                          <option>Option 3</option>
                                                          <option>Option 4</option>
                                                          <option>Option 5</option>
                                                      </select>
                                                  </div>
                                                  <div class="col-md-5">
                                                    <input type="text" class="form-control" placeholder="Full Form">
                                                  </div>
                                              </div> 
                                        </div>
                                        <div class="row"> 
                                              <div class="form-group">
                                                    <label class="col-md-2 control-label">From Yard:</label>
                                                    <div class="col-md-3">
                                                        <select class="form-control">
                                                            <option>Option 1</option>
                                                            <option>Option 2</option>
                                                            <option>Option 3</option>
                                                            <option>Option 4</option>
                                                            <option>Option 5</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5">
                                                      <input type="text" class="form-control" placeholder="Full Form">
                                                    </div>
                                                </div> 
                                          </div>
                                          <div class="row"> 
                                                <div class="form-group">
                                                      <label class="col-md-2 control-label">To Yard:</label>
                                                      <div class="col-md-3">
                                                          <select class="form-control">
                                                              <option>Option 1</option>
                                                              <option>Option 2</option>
                                                              <option>Option 3</option>
                                                              <option>Option 4</option>
                                                              <option>Option 5</option>
                                                          </select>
                                                      </div>
                                                      <div class="col-md-5">
                                                        <input type="text" class="form-control" placeholder="Full Form">
                                                      </div>
                                                  </div> 
                                            </div>
                                            <div class="row"> 
                                                <div class="form-group">
                                                          <label class="col-md-2 control-label">B/L OR CRO No:</label>
                                                        <div class="col-md-3">
                                                          <input type="text" class="form-control" placeholder="E-1035">
                                                        </div>
                                            
                                                          <label class="col-md-1 control-label">Job No:</label>
                                                        <div class="col-md-4">
                                                          <input type="text" class="form-control" placeholder="E-1035">
                                                        </div>
                                                 </div>  
                                             </div>
                                      
                                             <div class="row"> 
                                                 <div class="form-group">
                                                     <label class="col-md-2 control-label">Container No:</label>
                                                         <div class="col-md-3">
                                                           <input type="text" class="form-control" placeholder="E-1035">
                                                         </div>

                                                           
                                                         <div class="col-md-2 small-lab">
                                                          <label class=" control-label">Index No</label>
                                                           <input type="text" class="form-control" placeholder="E-1035">
                                                         </div>
                                                    
                                                      <div class="col-md-3 small-lab2">
                                                        <label class=" control-label">Container Size:</label>
                                                          <select class="form-control">
                                                              <option>20</option>
                                                              <option>40</option>
                                                              <option>45</option>
                                                          </select>
                                                      </div>
                                                         
                                                  </div>  
                                              </div>
                                              <div class="row"> 
                                                    <div class="form-group">
                                                          <label class="col-md-2 control-label">Vehcle No:</label>
                                                          <div class="col-md-3">
                                                              <select class="form-control" >
                                                                  <option>JT8685</option>
                                                                  <option>JT864</option>
                                                                  <option>Jdd84545</option>
                                                                  <option>AT8687</option>
                                                                  <option>JT8685</option>
                                                              </select>
                                                          </div>
                                                          <div class="col-md-5">
                                                            <input type="text" class="form-control" placeholder="Owner Name">
                                                          </div>
                                                      </div> 
                                                </div>
                                                <div class="row"> 
                                                      <div class="form-group">
                                                            <label class="col-md-2 control-label">Advance:</label>
                                                             
                                                            <div class="col-md-2">
                                                              <input type="text" class="form-control" placeholder="Advance" required>
                                                            </div>

                                                            <label class="col-md-1 control-label">Diesel:</label>
                                                             
                                                            <div class="col-md-2">
                                                              <input type="text" class="form-control" placeholder="Diesel">
                                                            </div>
                                                            <label class="col-md-1 control-label">Rent:</label>
                                                             
                                                            <div class="col-md-2">
                                                              <input type="text" class="form-control" placeholder="Rent">
                                                            </div>
                                                        </div> 

                                                  </div>
                                                  <div class="row"> 
                                                        <div class="form-group">
                                                              <label class="col-md-2 control-label">Balance:</label>
                                                               
                                                              <div class="col-md-3">
                                                                <input type="text" class="form-control" placeholder="Balance">
                                                              </div>
                                                              
                                                              <label class="col-md-2 control-label">Party Rent:</label>
                                                               
                                                              <div class="col-md-3">
                                                                <input type="text" class="form-control" placeholder="Party Chagers">
                                                              </div>
                                                             
                                                          </div> 

                                                    </div>

                                              
                                              <div class="row"> 
                                                    <div class="form-group">
                                                          <label class="col-md-2 control-label">Container Type:</label>
                                                          <div class="col-md-3">
                                                              <select class="form-control">
                                                                   <option>20</option>
                                                                  <option>40</option>
                                                                  <option>45</option>
                                                                  <option>Tanki</option> 
                                                                  <option>Dry Containers</option> 
                                                                  <option>Open Top Containers</option> 
                                                                  <option>Tunnel Container</option> 
                                                                  <option>Side Open Storage Container</option> 
                                                                  <option>Insulated or Thermal Containers</option> 
                                                                  <option>Tanks </option> 
                                                                  <option>Cargo Storage Roll Containers</option> 
                                                                  <option>Half Height Containers</option> 
                                                                  <option>Car Carriers</option> 
                                                               
                                                              </select>
                                                          </div>
                                                          <label class="col-md-1 control-label">Lot Of :</label>
                                                           
                                                          <div class="col-md-4">
                                                            <input type="text" class="form-control" placeholder="Lot Of" >
                                                          </div>
                                                           
                                                      </div> 
                                                </div>
                                                <div class="row"> 
                                                      <div class="form-group">
                                                            <label class="col-md-2 control-label">Shipping Line:</label>
                                                            <div class="col-md-3">
                                                                <select class="form-control">
                                                                    <option>Option 1</option>
                                                                    <option>Option 2</option>
                                                                    <option>Option 3</option>
                                                                    <option>Option 4</option>
                                                                    <option>Option 5</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-5">
                                                              <input type="text" class="form-control" placeholder="Full Form">
                                                            </div>
                                                        </div> 
                                                  </div>
                                            
                                                     
                                                      <div class="row"> 
                                                          <div class="form-group">
                                                                    <label class="col-md-2 control-label">Lolo Charges:</label>
                                                                  <div class="col-md-3">
                                                                    <input type="text" class="form-control" placeholder="E-1035">
                                                                  </div>
                                                                  <label class="col-md-2 control-label">Weight Charges</label>
                                                                   
                                                                  <div class="col-md-3">
                                                                    <input type="text" class="form-control" placeholder="Weight Charges">
                                                                  </div>
                                                      
                                                                   
                                                           </div>  
                                                       </div>
                                                       <div class="row"> 
                                                           <div class="form-group"> 
                                                            <label class="col-md-2 control-label">Special Transaction Color:</label>
                                                            <div class="col-md-3">
                                                                <select class="form-control">
                                                                    <option>Red</option>
                                                                    <option>Green</option>
                                                                    <option>Yellow</option> 
                                                                </select>
                                                            </div>
                                                                     <label class="col-md-2 control-label">Maintinace & Repair Charges:</label>
                                                                   <div class="col-md-3">
                                                                     <input type="text" class="form-control" placeholder="Charges">
                                                                   </div>
                                                            </div>  
                                                        </div>
                                                          <div class="row"> 
                                                            <div class="form-group">
                                                                  <label class="col-md-2 control-label">Remarks:</label>
                                                                
                                                                  <div class="col-md-8">
                                                                   <textarea class="form-control" rows="5"></textarea>
                                                                  </div>
                                                              </div> 
                                                        </div>


                                        
                                     
                                    <div class="form-actions ">
                                        <button type="submit" class="btn blue">Save (F2)</button> 
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