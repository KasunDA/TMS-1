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
                            <form class="form-horizontal" role="form" method="post">
                                <div class="form-body">
                                   
                                    <div class="row"> 
                                        <div class="form-group">
                                                <div id="cm_id_div" class="hidden">
                                                  <label class="col-md-2 control-label">Transaction ID:</label>
                                                  <div class="col-md-3">
                                                    <input type="text" class="form-control" placeholder="E-1035" id="cm_id" name="cm_id" required readonly >
                                                  </div>
                                                </div>
                                    
                                                  <label class="col-md-2 control-label">Transaction Date:</label>
                                                <div class="col-md-3">
                                                  <input type="date" class="form-control" id="datee" name="datee" value="<?php echo date('Y-m-d'); ?>" required tabindex="1">
                                                </div>
                                         </div>  
                                     </div>
                                     <div class="row"> 
                                           <div class="form-group">
                                                 <label class="col-md-2 control-label"> Clearing Agent:</label>
                                                 <div class="col-md-3">
                                                     <select class="form-control" name="agent_id" id="agent_id" required tabindex="2">
                                                         <option value="">Select Agent</option>
                                                         <?php 

                                                          $q = mysqli_query($mycon,'SELECT agent_id,name from agent where status=1 ORDER BY agent_id DESC');

                                                          while( $r = mysqli_fetch_array($q) )
                                                            {?>
                                                              <option value="<?php echo $r['agent_id']; ?>"><?php echo $r['name']; ?></option>
                                                          <?php } //END OF WHILE ?>
                                                          
                                                     </select>
                                                 </div>
                                                 
                                             </div> 
                                       </div>
                                     <div class="row"> 
                                          <div class="form-group">
                                                <label class="col-md-2 control-label">On Account Of:</label>
                                                <div class="col-md-3">
                                                    <select class="form-control" id="coa_id" name="coa_id" required tabindex="3">
                                                        <option value="">Select Account</option>
                                                        <?php 

                                                          $q = mysqli_query($mycon,'SELECT coa_id,short_form from chart_of_account where status=1 ORDER BY coa_id DESC');

                                                          while( $r = mysqli_fetch_array($q) )
                                                            {?>
                                                              <option value="<?php echo $r['coa_id']; ?>"><?php echo $r['short_form']; ?></option>
                                                          <?php } //END OF WHILE ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-5">
                                                  <input type="text" class="form-control" placeholder="Full Form" id="coa_id_full_form" readonly>
                                                </div>
                                            </div> 
                                      </div>
                                          <div class="row"> 
                                          <div class="form-group">
                                                <label class="col-md-2 control-label">Consignee:</label>
                                                <div class="col-md-3">
                                                    <select class="form-control" id="consignee_id" name="consignee_id" required tabindex="4">
                                                        <option value="">Select Consignee</option>
                                                        <?php 

                                                          $q = mysqli_query($mycon,'SELECT consignee_id,short_form from consignee where status=1 ORDER BY consignee_id DESC');

                                                          while( $r = mysqli_fetch_array($q) )
                                                            {?>
                                                              <option value="<?php echo $r['consignee_id']; ?>"><?php echo $r['short_form']; ?></option>
                                                          <?php } //END OF WHILE ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-5">
                                                  <input type="text" class="form-control" placeholder="Full Form" id="consignee_id_full_form" readonly>
                                                </div>
                                            </div> 
                                      </div>
                                    <div class="row"> 
                                          <div class="form-group">
                                                <label class="col-md-2 control-label"> Movement:</label>
                                                <div class="col-md-3">
                                                    <select class="form-control" id="movement" name="movement" tabindex="5">
                                                        <option value="empty">Empty</option>
                                                        <option value="import">Import</option>
                                                        <option value="export">Export</option> 
                                                    </select>
                                                </div>
                                                
                                            </div> 
                                      </div>
                                      <div class="row"> 
                                            <div class="form-group">
                                                  <label class="col-md-2 control-label"> Empty Terminal:</label>
                                                  <div class="col-md-3">
                                                      <select class="form-control" id="empty_terminal_id" name="empty_terminal_id" required tabindex="6">
                                                          <option value="">Select Terminal</option>
                                                          <?php 

                                                          $q = mysqli_query($mycon,'SELECT yard_id,short_form from yard where status=1 ORDER BY yard_id DESC');

                                                          while( $r = mysqli_fetch_array($q) )
                                                            {?>
                                                              <option value="<?php echo $r['yard_id']; ?>"><?php echo $r['short_form']; ?></option>
                                                          <?php } //END OF WHILE ?>
                                                      </select>
                                                  </div>
                                                  <div class="col-md-5">
                                                    <input type="text" class="form-control" placeholder="Full Form" id="empty_terminal_id_full_form" readonly>
                                                  </div>
                                              </div> 
                                        </div>
                                        <div class="row"> 
                                              <div class="form-group">
                                                    <label class="col-md-2 control-label">From Yard:</label>
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="from_yard_id" name="from_yard_id" required tabindex="7">
                                                            <option value="">Select Yard</option>
                                                            <?php 

                                                          $q = mysqli_query($mycon,'SELECT yard_id,short_form from yard where status=1 ORDER BY yard_id DESC');

                                                          while( $r = mysqli_fetch_array($q) )
                                                            {?>
                                                              <option value="<?php echo $r['yard_id']; ?>"><?php echo $r['short_form']; ?></option>
                                                          <?php } //END OF WHILE ?>
                                                            
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5">
                                                      <input type="text" class="form-control" placeholder="Full Form" id="from_yard_id_full_form" readonly>
                                                    </div>
                                                </div> 
                                          </div>
                                          <div class="row"> 
                                                <div class="form-group">
                                                      <label class="col-md-2 control-label">To Yard:</label>
                                                      <div class="col-md-3">
                                                          <select class="form-control" id="to_yard_id" name="to_yard_id" required tabindex="8">
                                                              <option value="">Select Yard</option>
                                                                <?php 

                                                          $q = mysqli_query($mycon,'SELECT yard_id,short_form from yard where status=1 ORDER BY yard_id DESC');

                                                          while( $r = mysqli_fetch_array($q) )
                                                            {?>
                                                              <option value="<?php echo $r['yard_id']; ?>"><?php echo $r['short_form']; ?></option>
                                                          <?php } //END OF WHILE ?>
                                                              
                                                          </select>
                                                      </div>
                                                      <div class="col-md-5">
                                                        <input type="text" class="form-control" placeholder="Full Form" id="to_yard_id_full_form" readonly>
                                                      </div>
                                                  </div> 
                                            </div>
                                            <div class="row"> 
                                                <div class="form-group">
                                                          <label class="col-md-2 control-label">B/L OR CRO No:</label>
                                                        <div class="col-md-3">
                                                          <input type="text" class="form-control" placeholder="E-1035" id="bl_cro_number" name="bl_cro_number" required tabindex="9">
                                                        </div>
                                            
                                                          <label class="col-md-1 control-label">Job No:</label>
                                                        <div class="col-md-4">
                                                          <input type="text" class="form-control" placeholder="E-1035" id="job_number" name="job_number" required tabindex="10">
                                                        </div>
                                                 </div>  
                                             </div>
                                      
                                             <div class="row"> 
                                                 <div class="form-group">
                                                     <label class="col-md-2 control-label">Container No:</label>
                                                         <div class="col-md-3">
                                                           <input type="text" class="form-control" placeholder="E-1035" id="container_number" name="container_number" required tabindex="11">
                                                         </div>

                                                           
                                                         <div class="col-md-2 small-lab">
                                                          <label class=" control-label">Index No</label>
                                                           <input type="text" class="form-control" placeholder="E-1035" id="index_number" name="index_number" required tabindex="12">
                                                         </div>
                                                    
                                                      <div class="col-md-3 small-lab2">
                                                        <label class=" control-label">Container Size:</label>
                                                          <select class="form-control" id="container_size" name="container_size" tabindex="13">
                                                              <option value="20">20</option>
                                                              <option value="40">40</option>
                                                              <option value="45">45</option>
                                                          </select>
                                                      </div>
                                                         
                                                  </div>  
                                              </div>
                                              <div class="row"> 
                                                    <div class="form-group">
                                                          <label class="col-md-2 control-label">Vehicle No:</label>
                                                          <div class="col-md-3">
                                                              <select class="form-control" id="vehicle_id" name="vehicle_id" required tabindex="14" >
                                                                <option value="">Select Vehicle</option>
                                                                  <?php 

                                                          $q = mysqli_query($mycon,'SELECT vehicle_id,vehicle_number from vehicle where status=1 ORDER BY vehicle_id DESC');

                                                          while( $r = mysqli_fetch_array($q) )
                                                            {?>
                                                              <option value="<?php echo $r['vehicle_id']; ?>"><?php echo $r['vehicle_number']; ?></option>
                                                          <?php } //END OF WHILE ?>
                                                              </select>
                                                          </div>
                                                          <div class="col-md-5">
                                                            <input type="text" class="form-control" placeholder="Owner Name" id="vehicle_id_full_form" readonly>
                                                          </div>
                                                      </div> 
                                                </div>
                                                <div class="row"> 
                                                      <div class="form-group">
                                                            <label class="col-md-2 control-label">Advance:</label>
                                                             
                                                            <div class="col-md-2">
                                                              <input type="number" min="0" class="form-control" placeholder="Advance" required id="advance" name="advance" tabindex="15">
                                                            </div>

                                                            <label class="col-md-1 control-label">Rent:</label>
                                                             
                                                            <div class="col-md-2">
                                                              <input type="number" min="0" class="form-control" placeholder="Rent" id="rent" name="rent"  tabindex="17">
                                                            </div>
                                                              
                                                              <label class="col-md-1 control-label">Balance:</label>
                                                              <div class="col-md-2">
                                                                <input type="number" class="form-control" placeholder="Balance" id="balance" name="balance" readonly tabindex="18">
                                                              </div>
                                                        </div> 

                                                  </div>
                                                  <div class="row"> 
                                                        <div class="form-group">
                                                              
                                                              <label class="col-md-2 control-label">Party Rent:</label>
                                                               
                                                              <div class="col-md-3">
                                                                <input type="number" min="0" class="form-control" placeholder="Party Chagers" id="party_charges" name="party_charges" required tabindex="19">
                                                              </div>
                                                             
                                                          </div> 

                                                    </div>

                                              
                                              <div class="row"> 
                                                    <div class="form-group">
                                                          <label class="col-md-2 control-label">Container Type:</label>
                                                          <div class="col-md-3">
                                                              <select class="form-control" id="container_id" name="container_id" required tabindex="20">
                                                                  <option value="">Select Container Type</option>
                                                                  <?php 

                                                          $q = mysqli_query($mycon,'SELECT container_id,type from container where status=1 ORDER BY container_id DESC');

                                                          while( $r = mysqli_fetch_array($q) )
                                                            {?>
                                                              <option value="<?php echo $r['container_id']; ?>"><?php echo $r['type']; ?></option>
                                                          <?php } //END OF WHILE ?>

                                                                  <!-- <option>40</option>
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
                                                                  <option>Car Carriers</option>  -->
                                                               
                                                              </select>
                                                          </div>
                                                          <label class="col-md-1 control-label">Lot Of :</label>
                                                           
                                                          <div class="col-md-4">
                                                            <input type="number" min="0"  class="form-control" placeholder="Lot Of" id="lot_of" name="lot_of" required tabindex="21" >
                                                          </div>
                                                           
                                                      </div> 
                                                </div>
                                                <div class="row"> 
                                                      <div class="form-group">
                                                            <label class="col-md-2 control-label">Shipping Line:</label>
                                                            <div class="col-md-3">
                                                                <select class="form-control" id="line_id" name="line_id" required tabindex="22">
                                                                    <option value="">Select Shipping Line</option>
                                                                    <?php 

                                                          $q = mysqli_query($mycon,'SELECT line_id,short_form from line where status=1 ORDER BY line_id ');

                                                          while( $r = mysqli_fetch_array($q) )
                                                            {?>
                                                              <option value="<?php echo $r['line_id']; ?>"><?php echo $r['short_form']; ?></option>
                                                          <?php } //END OF WHILE ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-5">
                                                              <input type="text" class="form-control" placeholder="Full Form" id="line_id_full_form" readonly>
                                                            </div>
                                                        </div> 
                                                  </div>
                                            
                                                     
                                                      <div class="row"> 
                                                          <div class="form-group">
                                                                    <label class="col-md-2 control-label">Lolo Charges:</label>
                                                                  <div class="col-md-3">
                                                                    <input type="number" min="0" step="0.01" class="form-control" placeholder="lolo Charges" id="lolo_charges" name="lolo_charges" required tabindex="23">
                                                                  </div>
                                                                  <label class="col-md-2 control-label">Weight Charges</label>
                                                                   
                                                                  <div class="col-md-3">
                                                                    <input type="number" min="0" step="0.01" class="form-control" placeholder="Weight Charges" id="weight_charges" name="weight_charges" required tabindex="24">
                                                                  </div>
                                                      
                                                                   
                                                           </div>  
                                                       </div>
                                                       <div class="row"> 
                                                           <div class="form-group"> 
                                                            <label class="col-md-2 control-label">Special Transaction Color:</label>
                                                            <div class="col-md-3">
                                                                <select class="form-control" id="color" name="color" tabindex="25">
                                                                    <option value="red">Red</option>
                                                                    <option value="green">Green</option>
                                                                    <option value="yellow">Yellow</option> 
                                                                </select>
                                                            </div>
                                                                     <label class="col-md-2 control-label">Maintinace & Repair Charges:</label>
                                                                   <div class="col-md-3">
                                                                     <input type="number" min="0" step="0.01" class="form-control" placeholder="Charges" id="mr_charges" name="mr_charges"  tabindex="26">
                                                                   </div>
                                                            </div>  
                                                        </div>
                                                          <div class="row"> 
                                                            <div class="form-group">
                                                                  <label class="col-md-2 control-label">Remarks:</label>
                                                                
                                                                  <div class="col-md-8">
                                                                   <textarea class="form-control" rows="5" id="remarks" name="remarks" tabindex="27"></textarea>
                                                                  </div>
                                                              </div> 
                                                        </div>                                     
                                    <div class="form-actions ">
                                        <button type="submit" class="btn blue" id="btn_submit" tabindex="28">Submit (F2)</button> 
                                        <button type="reset" class="btn default" id="btn_reset" tabindex="29">Cancel</button>

                                        <button type="submit" class="btn blue hidden" id="update_form_btn" tabindex="28">Update</button> 
                                        <button type="button" class="btn default hidden"  id="add_new" tabindex="29">Add New</button>

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
                                              
                                                <th> # </th>
                                                <th> Date </th>
                                                <th> Agent Name </th>
                                                <th> Chart of Account </th>
                                                <th> Consignee </th>
                                                <th> Movement </th>
                                                <th> Empty Terminal </th>
                                                <th> From  </th>
                                                <th> To </th>
                                                <th> BL/CRO </th>
                                                <th> Job no </th>
                                                <th> Container No </th>
                                                <th> Index no </th>
                                                <th> Size </th>
                                                <th> Vehicle No </th>
                                                <th> Advance </th>
                                                <th> Rent </th>
                                                <th> Balance </th>
                                                <th> Party Charges </th>
                                                <th> Container Type </th>
                                                <th> Lot Of </th>
                                                <th> Line </th>
                                                <th> Lolo Charges </th>
                                                <th> Weight Charges </th>
                                                <th> Color </th>
                                                <th> Maintainance Charges </th>
                                                <th> Remarks</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                           <?php 
                                                $q = mysqli_query($mycon,'SELECT * FROM container_movement WHERE status=1 ORDER BY cm_id DESC ');
                                                $n  = 1;
                                                while($r = mysqli_fetch_array($q))
                                                {
                                                  $c= '';
                                                  if($r['color'] == 'red'){
                                                    $c = '#f36a5a';
                                                  }

                                                  else if( $r['color'] == 'yellow' )
                                                  {
                                                    $c = '#d5d82d';
                                                   }

                                                  else{
                                                    $c = '#26c281';
                                                  }
                                                  

                                                  ?>
                                                    <tr class="odd gradeX" style="background-color:<?php echo $c; ?> ; color: #fff;"  >

                                                    <td> 
                                                      <ul class="addremove">
                                                        <li> <button class="btn btn-xs green update_btn" id="<?php echo $r['cm_id']; ?>"  type="button">  
                                                        <i class="fa fa-plus-square"></i>
                                                        </button> </li>
                                                        <li>  <button class="btn btn-xs red delete_btn" id="<?php echo $r['cm_id']; ?>" type="button">  
                                                        <i class="fa fa-minus-square"></i>
                                                        </button> </li>
                                                      </ul>
                                                    </td>
                                                    <td style="color: #000;"><?php echo $n ?></td>
                                                    <td><?php echo $r['datee']; ?></td>
                                                    
                                                    <?php
                                                    $q1 = mysqli_query($mycon,"SELECT name from agent where agent_id=".$r['agent_id']);
                                                    if($r1 = mysqli_fetch_array($q1))
                                                    ?><td id="<?php echo $r['agent_id']; ?>"><?php echo $r1['name']; ?> </td><?php
                                                    
                                                    $q1 = mysqli_query($mycon,"SELECT short_form from chart_of_account where coa_id=".$r['coa_id']);
                                                    if($r1 = mysqli_fetch_array($q1))
                                                    ?> <td id="<?php echo $r['coa_id']; ?>"><?php echo $r1['short_form']; ?> </td> <?php

                                                    $q1 = mysqli_query($mycon,"SELECT short_form from consignee where consignee_id=".$r['consignee_id']);
                                                    if($r1 = mysqli_fetch_array($q1))
                                                     ?><td id="<?php echo $r['consignee_id']; ?>"><?php echo $r1['short_form']; ?> </td>
                                                    
                                                    <td><?php echo $r['movement']; ?></td>
                                                    
                                                  <?php $q1 = mysqli_query($mycon,"SELECT short_form from yard where yard_id=".$r['empty_terminal_id']);
                                                    if($r1 = mysqli_fetch_array($q1))
                                                     ?> <td id="<?php echo $r['empty_terminal_id']; ?>"><?php echo $r1['short_form']; ?> </td><?php
                                                    
                                                    $q1 = mysqli_query($mycon,"SELECT short_form from yard where yard_id=".$r['from_yard_id']);
                                                    if($r1 = mysqli_fetch_array($q1))
                                                    ?> <td id="<?php echo $r['from_yard_id']; ?>"><?php echo $r1['short_form']; ?> </td><?php
                                                    
                                                  $q1 = mysqli_query($mycon,"SELECT short_form from yard where yard_id=".$r['to_yard_id']);
                                                  if($r1 = mysqli_fetch_array($q1))
                                                  ?> <td id="<?php echo $r['to_yard_id']; ?>"><?php echo $r1['short_form']; ?> </td>

                                                  <td><?php echo $r['bl_cro_number']; ?></td>
                                                  <td><?php echo $r['job_number']; ?></td>
                                                  <td><?php echo $r['container_number']; ?></td>
                                                  <td><?php echo $r['index_number']; ?></td>
                                                  <td><?php echo $r['container_size']; ?></td>
                                                  
                                                  <?php $q1 = mysqli_query($mycon,"SELECT vehicle_number from vehicle where vehicle_id=".$r['vehicle_id']);
                                                  if($r1 = mysqli_fetch_array($q1))
                                                  ?> <td id="<?php echo $r['vehicle_id']; ?>"><?php echo $r1['vehicle_number']; ?> </td>
                                                  
                                                  <td><?php echo $r['advance']; ?></td>
                                                  <td><?php echo $r['rent']; ?></td>
                                                  <td><?php echo $r['balance']; ?></td>
                                                  <td><?php echo $r['party_charges']; ?></td>
                                                  
                                                <?php  $q1 = mysqli_query($mycon,"SELECT type from container where container_id=".$r['container_id']);
                                                  if($r1 = mysqli_fetch_array($q1))
                                                   ?><td id="<?php echo $r['container_id']; ?>"><?php echo $r1['type']; ?> </td>
                              
                                                  <td><?php echo $r['lot_of']; ?></td>
                                                
                                                  <?php $q1 = mysqli_query($mycon,"SELECT short_form from line where line_id=".$r['line_id']);
                                                  if($r1 = mysqli_fetch_array($q1))?> 
                                                  <td id="<?php echo $r['line_id']; ?>"><?php echo $r1['short_form']; ?></td>
                                                  
                                                  <td><?php echo $r['lolo_charges']; ?></td>
                                                  <td><?php echo $r['weight_charges']; ?></td>
                                                  <td><?php echo $r['color']; ?></td>
                                                  <td><?php echo $r['mr_charges']; ?></td>
                                                  <td><?php echo $r['remarks']; ?></td>

                                                </tr>

                                                <?php $n++; }// END OF WHILE ?>

                                         
<!--                                             <tr class="odd gradeX">
                                                 
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
                                                <td> EMPTY </td>
                                                <td> DPWM-1 </td>
                                                <td> QICT </td>
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
                                                     
 -->                                                       
                                          
                                             
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
 <script src="../assets/global/scripts/select2.full.min.js"></script>
 <script type="text/javascript">
   $(document).ready(function(){

      document.onkeyup = KeyCheck;

      function KeyCheck(e)
      {
       var KeyID = (window.event) ? event.keyCode : e.keyCode;
       if(KeyID == 113)
       {
          $('#btn_submit').trigger('click');
       }
      }

      $('#advance,#rent').on('keyup change',function(){
          $('#balance').val($('#advance').val()-$('#rent').val());
        });

      //Select2
      $('#agent_id,#coa_id,#consignee_id,#empty_terminal_id,#movement,#vehicle_id,#container_id,#line_id,#color,#container_size,#from_yard_id,#to_yard_id').select2({
          width: 'resolve'
      });

      function load_full_form(v,param)
      {
        $.ajax({
          url:'ajax/container_movement/full_form.php?'+v+'='+param,
          dataType:'JSON',
          success:function(data){
            $('#'+v+'_full_form').val(data['val']);
          },
          error:function(){  alert('Error Ajax Call.') }
        })
      }

      $(document).on('change','#coa_id,#consignee_id,#line_id,#empty_terminal_id,#from_yard_id,#to_yard_id,#vehicle_id', function(){

        var param = $(this).val();

        if( $(this).val() == "" )
        {
          return;
        }

        if( $(this).attr('id') == 'coa_id' )
        {
          var v = 'coa_id';
        }
        else if( $(this).attr('id') == 'consignee_id' )
        {
          var v = 'consignee_id';
        }
        else if( $(this).attr('id') == 'empty_terminal_id' )
        {
          var v = 'empty_terminal_id';
        }
        else if( $(this).attr('id') == 'from_yard_id' )
        {
          var v = 'from_yard_id';
        }
        else if( $(this).attr('id') == 'to_yard_id' )
        {
          var v = 'to_yard_id';
        }
        else if( $(this).attr('id') == 'line_id' )
        {
          var v = 'line_id';
        }
        else
        {
          var v = 'vehicle_id';
        }

        load_full_form(v,param);

      });

      function loadData()
      {
        $.ajax({
            url:'ajax/container_movement/fetch.php',
            dataType:"JSON",
            success:function(data){

                var n = 1;
                $('tbody').html("");
                
                $.each(data,function(index,value){

                  var c= '';
                  if(value['color'] == 'red'){
                    c = '#f36a5a';
                  }

                  else if( value['color'] == 'yellow' )
                  {
                    c = '#d5d82d';
                   }

                  else{
                    c = '#26c281';
                  }

                    $('tbody').append('<tr class="odd gradeX" style="background-color:'+c+'; color: #fff;">'+

                            '<td>'+ 
                                '<ul class="addremove">'+
                                    '<li> <button class="btn btn-xs green update_btn" id="'+value['cm_id']+'" type="button">  '+
                                    '<i class="fa fa-plus-square"></i>'+
                                    '</button> </li>'+
                                    '<li>  <button class="btn btn-xs red delete_btn" id="'+value['cm_id']+'" type="button">  '+
                                    '<i class="fa fa-minus-square"></i>'+
                                    '</button> </li>'+
                                '</ul>'+
                            '</td>'+                       

                            '<td style="color:#000;">'+n+'</td>'+
                            '<td>'+value['datee']+'</td>'+
                            '<td id="'+value['agent_id']+'">'+value['agent_name']+'</td>'+
                            '<td id="'+value['coa_id']+'">'+value['coa']+'</td>'+
                            '<td id="'+value['consignee_id']+'">'+value['consignee']+'</td>'+
                            '<td>'+value['movement']+'</td>'+
                            '<td id="'+value['empty_terminal_id']+'">'+value['empty_terminal']+'</td>'+
                            '<td id="'+value['from_yard_id']+'">'+value['from_yard']+'</td>'+
                            '<td id="'+value['to_yard_id']+'">'+value['to_yard']+'</td>'+
                            '<td>'+value['bl_cro_number']+'</td>'+
                            '<td>'+value['job_number']+'</td>'+
                            '<td>'+value['container_number']+'</td>'+
                            '<td>'+value['index_number']+'</td>'+
                            '<td>'+value['container_size']+'</td>'+
                            '<td id="'+value['vehicle_id']+'">'+value['vehicle_number']+'</td>'+
                            '<td>'+value['advance']+'</td>'+
                            '<td>'+value['rent']+'</td>'+
                            '<td>'+value['balance']+'</td>'+
                            '<td>'+value['party_charges']+'</td>'+
                            '<td id="'+value['container_id']+'">'+value['container_type']+'</td>'+
                            '<td>'+value['lot_of']+'</td>'+
                            '<td id="'+value['line_id']+'">'+value['line']+'</td>'+
                            '<td>'+value['lolo_charges']+'</td>'+
                            '<td>'+value['weight_charges']+'</td>'+
                            '<td>'+value['color']+'</td>'+
                            '<td>'+value['mr_charges']+'</td>'+
                            '<td>'+value['remarks']+'</td>'+
                            
                            '</tr>');

                    n++;
                })
            },
            error:function(){ alert("Failed Fetch Ajax Call.") }
        });
      }

      // loadData();

      function add(datee,agent_id,coa_id,consignee_id,movement,empty_terminal_id,from_yard_id,to_yard_id,bl_cro_number,job_number,container_number,index_number,container_size,vehicle_id,advance,rent,balance,party_charges,container_id,lot_of,line_id,lolo_charges,weight_charges,color,mr_charges,remarks)
      {
          $.ajax({
              url:'ajax/container_movement/add.php?datee='+datee+'&agent_id='+agent_id+'&coa_id='+coa_id+'&consignee_id='+consignee_id+'&movement='+movement+'&empty_terminal_id='+empty_terminal_id+'&from_yard_id='+from_yard_id+'&to_yard_id='+to_yard_id+'&bl_cro_number='+bl_cro_number+'&job_number='+job_number+'&container_number='+container_number+'&index_number='+index_number+'&container_size='+container_size+'&vehicle_id='+vehicle_id+'&advance='+advance+'&rent='+rent+'&balance='+balance+'&party_charges='+party_charges+'&container_id='+container_id+'&lot_of='+lot_of+'&line_id='+line_id+'&lolo_charges='+lolo_charges+'&weight_charges='+weight_charges+'&color='+color+'&mr_charges='+mr_charges+'&remarks='+remarks,
              type:"POST",
              success:function(data){
                  if(data)
                  {
                      $('input').val("");
                      $('select').val("").trigger('change');
                      
                      loadData();
                  }
              },
              error:function(){ alert("Error in Add Ajax Call.") }
          });
      }

      function update(cm_id,datee,agent_id,coa_id,consignee_id,movement,empty_terminal_id,from_yard_id,to_yard_id,bl_cro_number,job_number,container_number,index_number,container_size,vehicle_id,advance,rent,balance,party_charges,container_id,lot_of,line_id,lolo_charges,weight_charges,color,mr_charges,remarks)
      {
          $.ajax({
              url:'ajax/container_movement/update.php?cm_id='+cm_id+'datee='+datee+'&agent_id='+agent_id+'&coa_id='+coa_id+'&consignee_id='+consignee_id+'&movement='+movement+'&empty_terminal_id='+empty_terminal_id+'&from_yard_id='+from_yard_id+'&to_yard_id='+to_yard_id+'&bl_cro_number='+bl_cro_number+'&job_number='+job_number+'&container_number='+container_number+'&index_number='+index_number+'&container_size='+container_size+'&vehicle_id='+vehicle_id+'&advance='+advance+'&rent='+rent+'&balance='+balance+'&party_charges='+party_charges+'&container_id='+container_id+'&lot_of='+lot_of+'&line_id='+line_id+'&lolo_charges='+lolo_charges+'&weight_charges='+weight_charges+'&color='+color+'&mr_charges='+mr_charges+'&remarks='+remarks,
              type:"POST",
              success:function(data){
                  if(data)
                  {
                      var trr = $('.selectedd');

                      addNewClick();

                      trr.find('td').eq(2).text();
                      trr.find('td').eq(3).text();
                      trr.find('td').eq(4).text();
                      trr.find('td').eq(5).text();
                  }
              },
              error:function(){ alert("Error in Update Ajax Call.") }
          });
      }

      function deletetr(trr,cm_id)
      {
          $.ajax({
              url:'ajax/container_movement/delete.php?cm_id='+cm_id,
              type:"POST",
              success:function(data){
                  trr.fadeOut(100,function(){
                     trr.remove(); 
                  });
              },
              error:function(){ alert("Error in Delete ajax Call.") }
          });
      }

      function updateClick()
      {

          $('form').addClass('update_form');

          $('#cm_id_div').removeClass('hidden');
          $('#update_form_btn').removeClass('hidden');
          $('#add_new').removeClass('hidden');

          $('#btn_submit').addClass('hidden');
          $('#btn_reset').addClass('hidden');

      }

      function addNewClick()
      {

          $('form').removeClass('update_form');

          $('form select').val("").trigger('change');
          $('#movement').val('empty').trigger('change');
          $('#container_size').val('20').trigger('change');
          $('#color').val('red').trigger('change');
          $('#btn_reset').trigger('click');

          $('#cm_id_div').addClass('hidden');
          $('#update_form_btn').addClass('hidden');
          $('#add_new').addClass('hidden');

          $('#btn_submit').removeClass('hidden');
          $('#btn_reset').removeClass('hidden');

      }

      //DELETE 
      $(document).on('click','.delete_btn',function(){

          var cm_id = $(this).attr('id'),
              trr = $(this).closest('tr');

          deletetr(trr,cm_id);
      });

      //ADD NEW 
      $(document).on('click','#add_new',function(){
          addNewClick();
      });

      //UPDATE 
      $(document).on('click','.update_btn',function(){

          updateClick();

          var cm_id = $(this).attr('id'),
              trr = $(this).closest('tr');

          $('tr').each(function(){
              if( $(this).hasClass('selectedd') )
              {
                $(this).removeClass('selectedd'); 
              }
          });

          trr.addClass('selectedd');   

          $('#cm_id').val( cm_id );
          $('#datee').val(trr.find('td').eq(2).text()); //trr.find('td').eq(2).text()
          $('#agent_id').val( trr.find('td').eq(3).attr('id') ).trigger('change');
          $('#coa_id').val( trr.find('td').eq(4).attr('id') ).trigger('change');
          $('#consignee_id').val( trr.find('td').eq(5).attr('id') ).trigger('change');
          $('#movement').val( trr.find('td').eq(6).text() ).trigger('change');
          $('#empty_terminal_id').val( trr.find('td').eq(7).attr('id') ).trigger('change');
          $('#from_yard_id').val( trr.find('td').eq(8).attr('id') ).trigger('change');
          $('#to_yard_id').val( trr.find('td').eq(9).attr('id') ).trigger('change');
          $('#bl_cro_number').val( trr.find('td').eq(10).text() );
          $('#job_number').val( trr.find('td').eq(11).text() );
          $('#container_number').val( trr.find('td').eq(12).text() );
          $('#index_number').val( trr.find('td').eq(13).text() );
          $('#container_size').val( trr.find('td').eq(14).text() ).trigger('change');
          $('#vehicle_id').val( trr.find('td').eq(15).attr('id') ).trigger('change');
          $('#advance').val( trr.find('td').eq(16).text() );
          $('#rent').val( trr.find('td').eq(17).text() );
          $('#balance').val( trr.find('td').eq(18).text() );
          $('#party_charges').val( trr.find('td').eq(19).text() );
          $('#container_id').val( trr.find('td').eq(20).attr('id') ).trigger('change');
          $('#lot_of').val( trr.find('td').eq(21).text() );
          $('#line_id').val( trr.find('td').eq(22).attr('id') ).trigger('change');
          $('#lolo_charges').val( trr.find('td').eq(23).text() );
          $('#weight_charges').val( trr.find('td').eq(24).text() );
          $('#color').val( trr.find('td').eq(25).text() ).trigger('change');
          $('#mr_charges').val( trr.find('td').eq(26).text() );
          $('#remarks').val( trr.find('td').eq(27).text() );
      });

      //Add & Update
      $('form').submit(function(e){
         e.preventDefault();
         
         var datee = $('#datee').val() ,
             agent_id = $('#agent_id').val(),
             coa_id = $('#coa_id').val(),
             consignee_id = $('#consignee_id').val(),
             movement = $('#movement').val(),
             empty_terminal_id = $('#empty_terminal_id').val(),
             from_yard_id = $('#from_yard_id').val(),
             to_yard_id = $('#to_yard_id').val(),
             bl_cro_number = $('#bl_cro_number').val(),
             job_number = $('#job_number').val(),
             container_number = $('#container_number').val(),
             index_number = $('#index_number').val(),
             container_size = $('#container_size').val(),
             vehicle_id = $('#vehicle_id').val(),
             advance = $('#advance').val(),
             rent = $('#rent').val(),
             balance = $('#balance').val(),
             party_charges = $('#party_charges').val(),
             container_id = $('#container_id').val(),
             lot_of = $('#lot_of').val(),
             line_id = $('#line_id').val(),
             lolo_charges = $('#lolo_charges').val(),
             weight_charges = $('#weight_charges').val(),
             color = $('#color').val(),
             mr_charges = $('#mr_charges').val(),
             remarks = $('#remarks').val(),
             cm_id =  $('#cm_id').val();

         if( $(this).hasClass('update_form') ) 
         {
              update(cm_id,datee,agent_id,coa_id,consignee_id,movement,empty_terminal_id,from_yard_id,to_yard_id,bl_cro_number,job_number,container_number,index_number,container_size,vehicle_id,advance,rent,balance,party_charges,container_id,lot_of,line_id,lolo_charges,weight_charges,color,mr_charges,remarks);
         }
         else
         {
              add(datee,agent_id,coa_id,consignee_id,movement,empty_terminal_id,from_yard_id,to_yard_id,bl_cro_number,job_number,container_number,index_number,container_size,vehicle_id,advance,rent,balance,party_charges,container_id,lot_of,line_id,lolo_charges,weight_charges,color,mr_charges,remarks);
         }
      });



    });
 </script>