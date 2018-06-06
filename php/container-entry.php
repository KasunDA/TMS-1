<?php 
include 'header.php';
include 'nav.php';

require 'connection.php';
date_default_timezone_set("Asia/Karachi");

// $_SESSION['cm_id'] = 4;
// $_SESSION['lot_of'] = 3;
// $_SESSION['datee'] = '2018-04-21';
// $_SESSION['agent_id'] = 2;
// $_SESSION['coa_id'] = 8;
// $_SESSION['consignee_id'] = 3;
// $_SESSION['movement'] = 'export';
// $_SESSION['empty_terminal_id'] = 3;
// $_SESSION['from_yard_id'] = 6;
// $_SESSION['to_yard_id'] = 2;
// $_SESSION['container_size'] = 45;
// $_SESSION['party_charges'] = 20000;
// $_SESSION['line_id'] = 2;

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
                <div class="col-md-12 no-pad">
                    <div class="portlet light bordered no-tb-style-cnt">
                        <div class="portlet-title">
                            <div class="caption font-red-sunglo">
                                <i class="icon-settings font-red-sunglo"></i>
                                <span class="caption-subject bold uppercase"> <?php $text = isset($_SESSION['disable_btn'])?'View':'Add New'; echo $text; ?> Container Entry</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                          <?php
                                if(!isset($_SESSION['disable_btn']) )
                                {?>
                            <form class="form-horizontal <?php if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL ) echo 'add_entry_form' ?>" role="form" method="post" autocomplete="off">
                                <div class="form-body">
                                   
                                    <div class="row"> 
                                        <div class="form-group">
                                                <!-- id="ce_id_div" class="hidden" -->
                                                <div  >
                                                  <label class="col-md-2 control-label">Transaction ID:</label>
                                                  <div class="col-md-3">
                                                    <input type="text" class="form-control" id="ce_id" tabindex="-1" name="ce_id" required readonly >
                                                  </div>
                                                </div>
                                    
                                                <label class="col-md-2 control-label">Transaction Date:</label>
                                                <div class="col-md-3">
                                                  <input type="date" class="form-control" id="datee" name="datee" required tabindex="1" <?php if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL ) { echo 'value="'.$_SESSION['datee'].'" readonly disabled';} else{ echo 'value="'.date('Y-m-d').'"'; } ?>  />
                                                </div>
                                         </div>  
                                     </div>
                                     <div class="row"> 
                                           <div class="form-group">
                                                 <label class="col-md-2 control-label"> Clearing Agent:</label>
                                                 <div class="col-md-3">
                                                     <select class="form-control" name="agent_id" id="agent_id" required tabindex="2" <?php if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL ) echo 'disabled' ?> >
                                                         <option value="">Select Agent</option>
                                                         <?php 

                                                          $q = mysqli_query($mycon,'SELECT agent_id,name from agent where status=1 ORDER BY agent_id DESC');

                                                          while( $r = mysqli_fetch_array($q) )
                                                            {?>
                                                              <option value="<?php echo $r['agent_id']; ?>"><?php echo $r['name']; ?></option>
                                                          <?php } //END OF WHILE ?>
                                                          
                                                     </select>
                                                 </div>

                                                 <div class="col-md-1">

                                                            <button class="btn btn-xs green agent_id" para="agent_id"  type="button">
                                                            
                                                              <i class="fa fa-refresh"></i>
                                                            
                                                            </button>

                                                </div>
                                                 
                                             </div> 
                                       </div>
                                     <div class="row"> 
                                          <div class="form-group">
                                                <label class="col-md-2 control-label">On Account Of:</label>
                                                <div class="col-md-3">
                                                    <select class="form-control" id="coa_id" name="coa_id" required tabindex="3" <?php if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL ) echo 'disabled' ?> >
                                                        <option value="">Select Account</option>
                                                        <?php 

                                                          $q = mysqli_query($mycon,'SELECT coa_id,short_form from chart_of_account where status=1 ORDER BY coa_id DESC');

                                                          while( $r = mysqli_fetch_array($q) )
                                                            {?>
                                                              <option value="<?php echo $r['coa_id']; ?>"><?php echo $r['short_form']; ?></option>
                                                          <?php } //END OF WHILE ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-1">

                                                            <button class="btn btn-xs green coa_id" para="coa_id"  type="button">
                                                            
                                                              <i class="fa fa-refresh"></i>
                                                            
                                                            </button>

                                                </div>

                                                <div class="col-md-4">
                                                  <input type="text" class="form-control" placeholder="Full Form" id="coa_id_full_form" tabindex="-1" readonly>
                                                </div>
                                            </div> 
                                      </div>
                                          <div class="row"> 
                                          <div class="form-group">
                                                <label class="col-md-2 control-label">Consignee:</label>
                                                <div class="col-md-3">
                                                    <select class="form-control" id="consignee_id" name="consignee_id" required tabindex="4" <?php if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL ) echo 'disabled' ?> >
                                                        <option value="">Select Consignee</option>
                                                        <?php 

                                                          $q = mysqli_query($mycon,'SELECT consignee_id,short_form from consignee where status=1 ORDER BY consignee_id DESC');

                                                          while( $r = mysqli_fetch_array($q) )
                                                            {?>
                                                              <option value="<?php echo $r['consignee_id']; ?>"><?php echo $r['short_form']; ?></option>
                                                          <?php } //END OF WHILE ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-1">

                                                            <button class="btn btn-xs green consignee_id" para="consignee_id"  type="button">
                                                            
                                                              <i class="fa fa-refresh"></i>
                                                            
                                                            </button>

                                                      </div>

                                                <div class="col-md-4">
                                                  <input type="text" class="form-control" placeholder="Full Form" id="consignee_id_full_form" tabindex="-1" readonly>
                                                </div>
                                            </div> 
                                      </div>
                                    <div class="row"> 
                                          <div class="form-group">
                                                <label class="col-md-2 control-label"> Movement:</label>
                                                <div class="col-md-3">
                                                    <select class="form-control" id="movement" name="movement" tabindex="5" <?php if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL ) echo 'disabled' ?> >
                                                        <option value="empty">Empty</option>
                                                        <option value="import">Import</option>
                                                        <option value="export">Export</option> 
                                                        <option value="open_cargo">Open Cargo</option> 
                                                    </select>
                                                </div>
                                                
                                            </div> 
                                      </div>
                                      <div class="row"> 
                                            <div class="form-group">
                                                  <label class="col-md-2 control-label"> Empty Terminal:</label>
                                                  <div class="col-md-3">
                                                      <select class="form-control" id="empty_terminal_id" name="empty_terminal_id" required tabindex="6" <?php if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL ) echo 'disabled' ?> >
                                                          <option value="">Select Terminal</option>
                                                          <?php 

                                                          $q = mysqli_query($mycon,'SELECT yard_id,short_form from yard where status=1 ORDER BY yard_id DESC');

                                                          while( $r = mysqli_fetch_array($q) )
                                                            {?>
                                                              <option value="<?php echo $r['yard_id']; ?>"><?php echo $r['short_form']; ?></option>
                                                          <?php } //END OF WHILE ?>
                                                      </select>
                                                  </div>

                                                  <div class="col-md-1">

                                                            <button class="btn btn-xs green empty_terminal_id" para="empty_terminal_id"  type="button">
                                                            
                                                              <i class="fa fa-refresh"></i>
                                                            
                                                            </button>

                                                      </div>

                                                  <div class="col-md-4">
                                                    <input type="text" class="form-control" placeholder="Full Form" id="empty_terminal_id_full_form" tabindex="-1" readonly>
                                                  </div>
                                              </div> 
                                        </div>
                                        <div class="row"> 
                                              <div class="form-group">
                                                    <label class="col-md-2 control-label">From Destination:</label>
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="from_yard_id" name="from_yard_id" required tabindex="7" <?php if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL ) echo 'disabled' ?> >
                                                            <option value="">Select Destination</option>
                                                            <?php 

                                                          $q = mysqli_query($mycon,'SELECT yard_id,short_form from yard where status=1 ORDER BY yard_id DESC');

                                                          while( $r = mysqli_fetch_array($q) )
                                                            {?>
                                                              <option value="<?php echo $r['yard_id']; ?>"><?php echo $r['short_form']; ?></option>
                                                          <?php } //END OF WHILE ?>
                                                            
                                                        </select>
                                                    </div>


                                                    <div class="col-md-1">

                                                            <button class="btn btn-xs green from_yard_id" para="from_yard_id"  type="button">
                                                            
                                                              <i class="fa fa-refresh"></i>
                                                            
                                                            </button>

                                                      </div>

                                                    <div class="col-md-4">
                                                      <input type="text" class="form-control" placeholder="Full Form" id="from_yard_id_full_form" tabindex="-1" readonly>
                                                    </div>
                                                </div> 
                                          </div>
                                          <div class="row"> 
                                                <div class="form-group">
                                                      <label class="col-md-2 control-label">To Destination:</label>
                                                      <div class="col-md-3">
                                                          <select class="form-control" id="to_yard_id" name="to_yard_id" required tabindex="8" <?php if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL ) echo 'disabled' ?> >
                                                              <option value="">Select Destination</option>
                                                                <?php 

                                                          $q = mysqli_query($mycon,'SELECT yard_id,short_form from yard where status=1 ORDER BY yard_id DESC');

                                                          while( $r = mysqli_fetch_array($q) )
                                                            {?>
                                                              <option value="<?php echo $r['yard_id']; ?>"><?php echo $r['short_form']; ?></option>
                                                          <?php } //END OF WHILE ?>
                                                              
                                                          </select>
                                                      </div>

                                                      <div class="col-md-1">

                                                            <button class="btn btn-xs green to_yard_id" para="to_yard_id"  type="button">
                                                            
                                                              <i class="fa fa-refresh"></i>
                                                            
                                                            </button>

                                                      </div>

                                                      <div class="col-md-4">
                                                        <input type="text" class="form-control" placeholder="Full Form" id="to_yard_id_full_form" tabindex="-1" readonly>
                                                      </div>
                                                  </div> 
                                            </div>
                                            <div class="row"> 
                                                <div class="form-group">
                                                          <label class="col-md-2 control-label">B/L OR CRO No:</label>
                                                        <div class="col-md-3">
                                                          <input type="text" class="form-control" placeholder="0898664" id="bl_cro_number" name="bl_cro_number" required  <?php if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL ) { echo 'value="'.$_SESSION['bl_cro_number'].'" readonly tabindex="-1" ';}?>  tabindex="9">
                                                        </div>
                                            
                                                          <label class="col-md-1 control-label">Job No:</label>
                                                        <div class="col-md-4">
                                                          <input type="text" class="form-control" placeholder="123456" id="job_number" name="job_number" required <?php if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL ) { echo 'value="'.$_SESSION['job_number'].'" readonly tabindex="-1" ';}?> tabindex="10">
                                                        </div>
                                                 </div>  
                                             </div>
                                      
                                             <div class="row"> 
                                                 <div class="form-group">
                                                    <label class="col-md-2 control-label">Container No:</label>
                                                    <div class="col-md-3">
                                                      <input type="text" class="form-control" placeholder="APZU4846408" id="container_number" name="container_number" required tabindex="11"  <?php if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL ) { echo 'autofocus=""';}?> >
                                                    </div>

                                                           
                                                         <div class="col-md-2 small-lab">
                                                          <label class=" control-label">Index No</label>
                                                           <input type="text" class="form-control" placeholder="123456" id="index_number" name="index_number" required  <?php if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL ) { echo 'value="'.$_SESSION['index_number'].'" readonly tabindex="-1" ';}?> tabindex="12">
                                                         </div>
                                                    
                                                      <div class="col-md-3 small-lab2">
                                                        <label class=" control-label">Container Size:</label>
                                                          <select class="form-control" id="container_size" name="container_size" tabindex="13" <?php if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL ) echo 'disabled' ?> >
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

                                                          <div class="col-md-1">

                                                            <button class="btn btn-xs green vehicle_id" para="vehicle_id"  type="button">
                                                            
                                                              <i class="fa fa-refresh"></i>
                                                            
                                                            </button>

                                                          </div>


                                                          <div class="col-md-4">
                                                            <input type="text" class="form-control" placeholder="Owner Name" id="vehicle_id_full_form" tabindex="-1" readonly>
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
                                                              <input type="number" min="0" class="form-control" placeholder="Rent" id="rent" name="rent"   <?php if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL ) { echo 'value="'.$_SESSION['rent'].'" readonly tabindex="-1" ';}?> tabindex="17">
                                                            </div>

                                                            <label class="col-md-1 control-label">Lolo Charges:</label>
                                                            <div class="col-md-2">
                                                              <input type="number" min="0" step="0.01" class="form-control" placeholder="lolo Charges" id="lolo_charges" name="lolo_charges" required  <?php if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL ) { echo 'value="'.$_SESSION['lolo_charges'].'" readonly tabindex="-1" ';}?> tabindex="18">
                                                            </div>
                                                              
                                                              
                                                        </div> 

                                                  </div>
                                                  <div class="row"> 
                                                        <div class="form-group">
                                                              
                                                              <label class="col-md-2 control-label">Party Rent:</label>
                                                              <div class="col-md-2">
                                                                <input type="number" min="0" class="form-control" placeholder="Party Charges" id="party_charges" name="party_charges" required   <?php if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL ) echo ' readonly tabindex="-1" ' ?> tabindex="19" />
                                                              </div>

                                                              <label class="col-md-1 control-label">Balance:</label>
                                                              <div class="col-md-2">
                                                                <input type="number" class="form-control" placeholder="Balance" id="balance" name="balance" tabindex="-1" readonly >
                                                              </div>

                                                              <label class="col-md-1 control-label">Diesel:</label>
                                                              <div class="col-md-2">
                                                                <input type="number" class="form-control" placeholder="Diesel" id="diesel" name="diesel" tabindex="20" min="0" required>
                                                              </div>
                                                             
                                                          </div> 


                                                    </div>

                                              
                                              <div class="row"> 
                                                    <div class="form-group">
                                                          <label class="col-md-2 control-label">Container Type:</label>
                                                          <div class="col-md-3">
                                                              <select class="form-control" id="container_id" name="container_id" required tabindex="21" <?php if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL ) echo 'disabled' ?> >
                                                                  <option value="">Select Container Type</option>
                                                                  <?php 

                                                          $q = mysqli_query($mycon,'SELECT container_id,type from container where status=1 ORDER BY container_id DESC');

                                                          while( $r = mysqli_fetch_array($q) )
                                                            {?>
                                                              <option value="<?php echo $r['container_id']; ?>"><?php echo $r['type']; ?></option>
                                                          <?php } //END OF WHILE ?>
                                                               
                                                              </select>
                                                          </div>

                                                          <div class="col-md-1">

                                                            <button class="btn btn-xs green container_id" para="container_id"  type="button">
                                                            
                                                              <i class="fa fa-refresh"></i>
                                                            
                                                            </button>

                                                          </div>
  

                                                          <label class="col-md-1 control-label">Lot Of :</label>
                                                           
                                                          <div class="col-md-3">
                                                            <input type="number" min="0"  class="form-control" placeholder="Lot Of" id="lot_of" name="lot_of" required  <?php if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL ) echo ' readonly tabindex="-1"' ?> tabindex="22" />
                                                          </div>
                                                           
                                                      </div> 
                                                </div>
                                                <div class="row"> 
                                                      <div class="form-group">
                                                            <label class="col-md-2 control-label">Shipping Line:</label>
                                                            <div class="col-md-3">
                                                                <select class="form-control" id="line_id" name="line_id" required tabindex="23" <?php if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL ) echo 'disabled' ?> >
                                                                    <option value="">Select Shipping Line</option>
                                                                    <?php 

                                                          $q = mysqli_query($mycon,'SELECT line_id,short_form from line where status=1 ORDER BY line_id ');

                                                          while( $r = mysqli_fetch_array($q) )
                                                            {?>
                                                              <option value="<?php echo $r['line_id']; ?>"><?php echo $r['short_form']; ?></option>
                                                          <?php } //END OF WHILE ?>
                                                                </select>
                                                            </div>

                                                            <div class="col-md-1">

                                                            <button class="btn btn-xs green line_id" para="line_id"  type="button">
                                                            
                                                              <i class="fa fa-refresh"></i>
                                                            
                                                            </button>

                                                          </div>
  

                                                            <div class="col-md-4">
                                                              <input type="text" class="form-control" placeholder="Full Form" id="line_id_full_form" tabindex="-1" readonly>
                                                            </div>
                                                        </div> 
                                                  </div>
                                            
                                                     
                                                      <div class="row"> 
                                                          <div class="form-group">
                                                                  
                                                                  <label class="col-md-2 control-label">Weight Charges</label>
                                                                   
                                                                  <div class="col-md-3">
                                                                    <input type="number" min="0" step="0.01" class="form-control" placeholder="Weight Charges" id="weight_charges" name="weight_charges" required  <?php if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL ) { echo 'value="'.$_SESSION['weight_charges'].'" readonly tabindex="-1" ';}?> tabindex="24">
                                                                  </div>
                                                      
                                                                   
                                                           </div>  
                                                       </div>
                                                       <div class="row"> 
                                                           <div class="form-group"> 
                                                            <label class="col-md-2 control-label">Special Transaction Color:</label>
                                                            <div class="col-md-3">
                                                                <select class="form-control" id="color" name="color" tabindex="25">
                                                                    <option value="white">White</option>
                                                                    <option value="red">Red</option>
                                                                    <option value="green">Green</option>
                                                                    <option value="yellow">Yellow</option> 
                                                                </select>
                                                            </div>
                                                                     <label class="col-md-2 control-label">Maintenance & Repair Charges:</label>
                                                                   <div class="col-md-3">
                                                                     <input type="number" min="0" step="0.01" value="0" class="form-control" placeholder="Charges" id="mr_charges" name="mr_charges"  tabindex="26">
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
                                      <div class="col-md-2 col-md-offset-2" style=" padding-left:  0px;">
                                        <button type="submit" class="btn blue" id="btn_submit" tabindex="28">Submit (F2)</button> 
                                        <!-- <button type="reset" class="btn default" id="btn_reset" tabindex="29">Cancel</button> -->

                                        <button type="submit" class="btn blue hidden" id="update_form_btn" tabindex="28">Update</button>
                                        <button type="button" class="btn default hidden"  id="add_new" tabindex="29">Add New</button>
                                      <?php 
                                        if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL )
                                        {
                                          echo '<a href="ajax/container_movement/destroy_cmid.php" class="btn default"  id="add_new_movement" tabindex="30">Add New Movement</a>';
                                        } ?>
                                      </div>
                                    </div>
                                </div>
                                
                            </form>

                            <?php }//END OF IF?> 

                        </div>
                        <!-- Form ends -->
                         <hr> 
                         <div class="row">
                     <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered no-defualt-set-cnt">
                                
                                <div class="portlet-title">
		                             <div class="caption font-green">
		                                 <i class="icon-settings font-green"></i>
		                                 <span class="caption-subject bold uppercase">Container Entries</span>
		                             </div>
		                             <div class="tools">
		                                 <button class="btn green" id="update_records_btn">Update Records</button>
		                                 <a href="" class="collapse "> </a>

		                             </div>
                         		</div>

                                <div class="portlet-body">
                  
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="mytable">
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
                                                <th> Diesel </th>
                                                <th> Party Charges </th>
                                                <th> Container Type </th>
                                                <th> Lot Of </th>
                                                <th> Line </th>
                                                <th> Lolo Charges </th>
                                                <th> Weight Charges </th>
                                                <th> Color </th>
                                                <th> Maintenance Charges </th>
                                                <th> Remarks</th>

                                            </tr>
                                        </thead>
                                        <tbody>
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

   		$('#update_records_btn').click(function(event) {
          
          <?php 
            if(isset($_SESSION['']))
            {
              echo 'loadData("'.$_SESSION['cm_id'].'")'; 
            }
          ?>  
        });

      document.onkeyup = KeyCheck;

      function KeyCheck(e)
      {
       var KeyID = (window.event) ? event.keyCode : e.keyCode;
       if(KeyID == 113)
       {
          $('#btn_submit').trigger('click');
       }
      }


      $('#advance,#rent,#lolo_charges,#weight_charges').on('keyup change',function(){
          var a = $('#rent').val()/1 + $('#lolo_charges').val()/1,
              b = $('#advance').val()/1 + $('#weight_charges').val()/1; 
          $('#balance').val( a - b );
        });


        //Select2
      $('#agent_id,#coa_id,#consignee_id,#empty_terminal_id,#movement,#vehicle_id,#container_id,#line_id,#color,#container_size,#from_yard_id,#to_yard_id').select2({
            width: 'resolve',
            theme: "classic"
          });
      $('.select2-selection').addClass('select');


      function updateField(param)
      {
        $.ajax({
          url:'ajax/container_movement/update_field.php?id='+param,
          dataType:'JSON',
          success:function(data){


              if( param =='agent_id' )
              {
                $('#'+param).html('<option value="">Select Agent</option>');
                
                $.each(data,function(index,value){
                  $('#'+param).append('<option value="'+value['agent_id']+'">'+value['name']+'</option> ');
                });
              }
              else if( param =='coa_id' )
              {
                $('#'+param+'_full_form').val('');
                $('#'+param).html('<option value="">Select Account</option>');
                
                $.each(data,function(index,value){
                  $('#'+param).append('<option value="'+value['coa_id']+'">'+value['short_form']+'</option> ');
                });
              }
              else if( param =='consignee_id' )
              {
                $('#'+param+'_full_form').val('');
                $('#'+param).html('<option value="">Select Consignee</option>');
                
                $.each(data,function(index,value){
                  $('#'+param).append('<option value="'+value['consignee_id']+'">'+value['short_form']+'</option> ');
                });
              }
              else if( param =='empty_terminal_id' )
              {
                $('#'+param+'_full_form').val('');
                $('#'+param).html('<option value="">Select Terminal</option>');
                
                $.each(data,function(index,value){
                  $('#'+param).append('<option value="'+value['yard_id']+'">'+value['short_form']+'</option> ');
                });
              }
              else if( param =='from_yard_id' )
              {
                $('#'+param+'_full_form').val('');
                $('#'+param).html('<option value="">Select Destination</option>');
                
                $.each(data,function(index,value){
                  $('#'+param).append('<option value="'+value['yard_id']+'">'+value['short_form']+'</option> ');
                });
              }
              else if( param =='to_yard_id' )
              {
                $('#'+param+'_full_form').val('');
                $('#'+param).html('<option value="">Select Destination</option>');
                
                $.each(data,function(index,value){
                  $('#'+param).append('<option value="'+value['yard_id']+'">'+value['short_form']+'</option> ');
                });
              }
              else if( param =='line_id' )
              {
                $('#'+param+'_full_form').val('');
                $('#'+param).html('<option value="">Select Shipping Line</option>');
                
                $.each(data,function(index,value){
                  $('#'+param).append('<option value="'+value['line_id']+'">'+value['short_form']+'</option> ');
                });
              }
              else if( param =='vehicle_id' )
              {
                $('#'+param+'_full_form').val('');
                $('#'+param).html('<option value="">Select Vehicle</option>');
                
                $.each(data,function(index,value){
                  $('#'+param).append('<option value="'+value['vehicle_id']+'">'+value['vehicle_number']+'</option> ');
                });
              }
              else
              {
                $('#'+param).html('<option value="">Select Container Type</option>');
                
                $.each(data,function(index,value){
                  $('#'+param).append('<option value="'+value['container_id']+'">'+value['type']+'</option> ');
                });
              }

              $('#'+param).select2({
                width: 'resolve',
                theme: "classic"
              });

            // $('#'+v+'_full_form').val(data['val']);
          },
          error:function(){  alert('Error in Updating Field Ajax Call.') }
        });
      }

      $(document).on('click','.agent_id,.coa_id,.consignee_id,.line_id,.empty_terminal_id,.from_yard_id,.to_yard_id,.vehicle_id,.container_id', function()
      {
        updateField(''+$(this).attr('para')+'');
      });

      function getId()
      {
        $.ajax({
          url :'ajax/container_movement/fetchid.php',
          dataType:'JSON',
          success: function(data)
          {
              $('#ce_id').val(data['ce_id']);
          }
          // error: function(){ alert('Error in get id Ajax.') }

        })
      }

      getId();
      

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


      function myDataTable()
        {
            var e=$("#mytable");
            e.dataTable({language:{aria:{sortAscending:": activate to sort column ascending",sortDescending:": activate to sort column descending"},emptyTable:"No data available in table",info:"Showing _START_ to _END_ of _TOTAL_ records",infoEmpty:"No records found",infoFiltered:"(filtered1 from _MAX_ total records)",lengthMenu:"Show _MENU_",search:"Search:",zeroRecords:"No matching records found",paginate:{previous:"Prev",next:"Next",last:"Last",first:"First"}},bStateSave:!0,columnDefs:[{targets:0,orderable:!1,searchable:!1}],lengthMenu:[[-1,5,15,20],["All",5,15,20]],pageLength:20,pagingType:"bootstrap_full_number",columnDefs:[{orderable:!1,targets:[0]},{searchable:!1,targets:[0]}],order:[[1,"asc"]]});
        }

      myDataTable();

      function loadData(cm_id)
      {
        $.ajax({
            url:'ajax/container_entry/fetch.php?cm_id='+cm_id,
            dataType:"JSON",
            success:function(data){

                var n = 1;
                var i = 0;

                $('#mytable').DataTable().destroy();
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

                   else if( value['color'] == 'green' )
                  {
                    c = '#26c281';
                   }

                  else{
                    c = '#fff'; // White Color
                  }

                    $('tbody').append('<tr index="'+i+'" class="odd gradeX" style="background-color:'+c+';">'+
                          <?php
                                if(!isset($_SESSION['disable_btn']) )
                                {?>
                            '<td>'+ 
                                '<ul class="addremove">'+
                                    '<li> <button class="btn btn-xs green update_btn" id="'+value['ce_id']+'" type="button">  '+
                                    '<i class="fa fa-plus-square"></i>'+
                                    '</button> </li>'+
                                    '<li>  <button class="btn btn-xs red delete_btn" id="'+value['ce_id']+'" type="button">  '+
                                    '<i class="fa fa-minus-square"></i>'+
                                    '</button> </li>'+
                                '</ul>'+
                            '</td>'+       
                            <?php }//END OF If
                                else{?>
                                    '<td></td>'+
                                <?php }//END OF ELSE ?>                

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
                            '<td>'+value['diesel']+'</td>'+
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

                    n++; i++;
                })

                myDataTable();
            },
            error:function(){ alert("Failed Fetch Ajax Call.") }
        });
      }

      <?php 

        if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL )
        {
          echo 'loadData("'.$_SESSION['cm_id'].'");';  
          ?>
          $('#datee').val('<?php echo $_SESSION['datee'] ?>');
          $('#agent_id').val(<?php echo $_SESSION['agent_id'] ?>).trigger('change');
          $('#coa_id').val(<?php echo $_SESSION['coa_id'] ?>).trigger('change');
          $('#consignee_id').val(<?php echo $_SESSION['consignee_id'] ?>).trigger('change');
          $('#movement').val('<?php echo $_SESSION['movement'] ?>').trigger('change');
          $('#empty_terminal_id').val(<?php echo $_SESSION['empty_terminal_id'] ?>).trigger('change');
          $('#from_yard_id').val(<?php echo $_SESSION['from_yard_id'] ?>).trigger('change');
          $('#to_yard_id').val(<?php echo $_SESSION['to_yard_id'] ?>).trigger('change');
          $('#container_size').val(<?php echo $_SESSION['container_size'] ?>).trigger('change');
          $('#party_charges').val(<?php echo $_SESSION['party_charges'] ?>);
          $('#lot_of').val(<?php echo $_SESSION['lot_of'] ?>);
          $('#line_id').val(<?php echo $_SESSION['line_id'] ?>).trigger('change');
          $('#container_id').val(<?php echo $_SESSION['container_id'] ?>).trigger('change');

        <?php }// END oF IF ?>

      function add_entry(cm_id,container_number,vehicle_id,advance,diesel,balance,color,mr_charges,remarks)
      {
          $.ajax({
              url:'ajax/container_entry/add.php?cm_id='+cm_id+'&container_number='+container_number+'&vehicle_id='+vehicle_id+'&advance='+advance+'&diesel='+diesel+'&balance='+balance+'&color='+color+'&mr_charges='+mr_charges+'&remarks='+encodeURIComponent(remarks),
              type:"POST",
              dataType:'JSON',
              success:function(data){
                  if(data['inserted'] == 'true')
                  {
                      $('#container_number,#advance,#balance,#remarks,#diesel').val("");
                      $('#mr_charges').val("0");
                      $('#color').val('white').trigger('change');
                      $('#vehicle_id').val("").trigger('change');
                      
                      <?php 

                        if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL )
                        {
                          echo 'loadData("'.$_SESSION['cm_id'].'")';  
                        }
                      ?>

                      alertMessage('Entry Added Successfully.','success');

                  }
                  else
                  {
                    // alert(data['lot_of_limit']);
                    alertMessage("'"+data['lot_of_limit']+"'",'error');
                  }
                  getId();
              },
              error:function(){ /*alert("Error in Add Container Entry Ajax Call.")*/ }
          });
      }

      function add(datee,agent_id,coa_id,consignee_id,movement,empty_terminal_id,from_yard_id,to_yard_id,bl_cro_number,job_number,container_number,index_number,container_size,vehicle_id,advance,rent,balance,diesel,party_charges,container_id,lot_of,line_id,lolo_charges,weight_charges,color,mr_charges,remarks)
      {
          $.ajax({
              url:'ajax/container_movement/add.php?datee='+encodeURIComponent(datee)+'&agent_id='+agent_id+'&coa_id='+coa_id+'&consignee_id='+consignee_id+'&movement='+encodeURIComponent(movement)+'&empty_terminal_id='+empty_terminal_id+'&from_yard_id='+from_yard_id+'&to_yard_id='+to_yard_id+'&container_size='+container_size+'&party_charges='+party_charges+'&lot_of='+lot_of+'&line_id='+line_id+'&bl_cro_number='+bl_cro_number+'&job_number='+job_number+'&index_number='+index_number+'&rent='+rent+'&container_id='+container_id+'&lolo_charges='+lolo_charges+'&weight_charges='+weight_charges,
              type:"POST",
              dataType:'JSON',
              success:function(data){
                  if(data['inserted'])
                  {
                      // $('#datee,#agent_id,#coa_id,#consignee_id,#movement,#empty_terminal_id,#from_yard_id,#to_yard_id,#container_size,#party_charges,#lot_of,#line_id').attr('readonly', 'readonly');
                      
                      add_entry(data['cm_id'],container_number,vehicle_id,advance,diesel,balance,color,mr_charges,remarks);

                      location.assign('container-entry.php');
                  }
              },
              error:function(){ /*alert("Error in Add Ajax Call.")*/ }
          });
      }

      function update(ce_id,container_number,vehicle_id,vehicle_number,advance,diesel,balance,color,mr_charges,remarks)
      {
          $.ajax({
              url:'ajax/container_entry/update.php?ce_id='+ce_id+'&container_number='+container_number+'&vehicle_id='+vehicle_id+'&advance='+advance+'&diesel='+diesel+'&balance='+balance+'&color='+color+'&mr_charges='+mr_charges+'&remarks='+encodeURIComponent(remarks),
              type:"POST",
              success:function(data){
                  if(data)
                  {
                      var i = $('.selectedd').attr('index');
                      var temp = $('#mytable').DataTable().row(i).data();
                      
                      addNewClick();

                      temp[12] = container_number;
                      temp[15] = vehicle_number;
                      temp[16] = advance;
                      temp[18] = balance;
                      temp[19] = diesel;
                      temp[26] = color;
                      temp[27] = mr_charges;
                      temp[28] = remarks;

                      $('#mytable').DataTable().row(i).data(temp).draw();

                    $('.selectedd').css('');

                    if(color == 'red')
                    {
                      $('.selectedd').css('background-color','#f36a5a');
                    }

                    else if( color == 'yellow' )
                    {
                      $('.selectedd').css('background-color','#d5d82d');
                    }

                    else if( color == 'green' )
                    {
                      $('.selectedd').css('background-color','#26c281'); // green color
                    }

                    else 
                    {
                      $('.selectedd').css('background-color','#fff');
                    }

                    getId();

                    alertMessage('Entry Updated Successfully.','success');
                  }
              },
              error:function(){ /*alert("Error in Update Ajax Call.") */  alertMessage('Entry Not Updated.','error'); }
          });
      }

      function deletetr(trr,ce_id)
      {
          $.ajax({
              url:'ajax/container_entry/delete.php?ce_id='+ce_id,
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

          $('#ce_id_div').removeClass('hidden');
          $('#update_form_btn').removeClass('hidden');
          $('#add_new').removeClass('hidden');

          $('#btn_submit').addClass('hidden');
          $('#btn_reset').addClass('hidden');

          $('#container_number').focus();

      }

      function addNewClick()
      {

          $('form').removeClass('update_form');

          $('#container_number,#advance,#remarks,#diesel').val("");
          $('#mr_charges').val("0"); 
          $('#color').val('white').trigger('change');
          $('#vehicle_id').val('').trigger('change');
          //$('#btn_reset').trigger('click');

          $('#ce_id_div').addClass('hidden');
          $('#update_form_btn').addClass('hidden');
          $('#add_new').addClass('hidden');

          $('#btn_submit').removeClass('hidden');
          $('#btn_reset').removeClass('hidden');

          getId();

      }

      //DELETE 
      $(document).on('click','.delete_btn',function(){

          var ce_id = $(this).attr('id'),
              trr = $(this).closest('tr');

          deletetr(trr,ce_id);
      });

      //ADD NEW 
      $(document).on('click','#add_new',function(){
          addNewClick();
      });

      //UPDATE 
      $(document).on('click','.update_btn',function(){

          updateClick();

          var ce_id = $(this).attr('id'),
              trr = $(this).closest('tr');

          $('tr').each(function(){
              if( $(this).hasClass('selectedd') )
              {
                $(this).removeClass('selectedd'); 
              }
          });

          trr.addClass('selectedd');   

          $('#ce_id').val( ce_id );
          // $('#datee').val(trr.find('td').eq(2).text()); //trr.find('td').eq(2).text()
          // $('#agent_id').val( trr.find('td').eq(3).attr('id') ).trigger('change');
          // $('#coa_id').val( trr.find('td').eq(4).attr('id') ).trigger('change');
          // $('#consignee_id').val( trr.find('td').eq(5).attr('id') ).trigger('change');
          // $('#movement').val( trr.find('td').eq(6).text() ).trigger('change');
          // $('#empty_terminal_id').val( trr.find('td').eq(7).attr('id') ).trigger('change');
          // $('#from_yard_id').val( trr.find('td').eq(8).attr('id') ).trigger('change');
          // $('#to_yard_id').val( trr.find('td').eq(9).attr('id') ).trigger('change');
          // $('#bl_cro_number').val( trr.find('td').eq(10).text() );
          // $('#job_number').val( trr.find('td').eq(11).text() );
          $('#container_number').val( trr.find('td').eq(12).text() );
          // $('#index_number').val( trr.find('td').eq(13).text() );
          // $('#container_size').val( trr.find('td').eq(14).text() ).trigger('change');
          $('#vehicle_id').val( trr.find('td').eq(15).attr('id') ).trigger('change');
          $('#advance').val( trr.find('td').eq(16).text() );
          // $('#rent').val( trr.find('td').eq(17).text() );
          $('#balance').val( trr.find('td').eq(18).text() );
          $('#diesel').val( trr.find('td').eq(19).text() );
          // $('#party_charges').val( trr.find('td').eq(19).text() );
          // $('#container_id').val( trr.find('td').eq(20).attr('id') ).trigger('change');
          // $('#lot_of').val( trr.find('td').eq(21).text() );
          // $('#line_id').val( trr.find('td').eq(22).attr('id') ).trigger('change');
          // $('#lolo_charges').val( trr.find('td').eq(23).text() );
          // $('#weight_charges').val( trr.find('td').eq(24).text() );
          $('#color').val( trr.find('td').eq(26).text() ).trigger('change');
          $('#mr_charges').val( trr.find('td').eq(27).text() );
          $('#remarks').val( trr.find('td').eq(28).text() );
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
             vehicle_number = $('#vehicle_id option:selected').text(),
             advance = $('#advance').val(),
             rent = $('#rent').val(),
             balance = $('#balance').val(),
             diesel = $('#diesel').val(),
             party_charges = $('#party_charges').val(),
             container_id = $('#container_id').val(),
             container_type = $('#container_id option:selected').text(),
             lot_of = $('#lot_of').val(),
             line_id = $('#line_id').val(),
             lolo_charges = $('#lolo_charges').val(),
             weight_charges = $('#weight_charges').val(),
             color = $('#color').val(),
             mr_charges = $('#mr_charges').val(),
             remarks = $('#remarks').val(),
             ce_id =  $('#ce_id').val();

         if( $(this).hasClass('update_form') ) 
         {
            update(ce_id,container_number,vehicle_id,vehicle_number,advance,diesel,balance,color,mr_charges,remarks);
         }
         else if( $(this).hasClass('add_entry_form') )
         {  
            <?php 
              if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL )
              {
                echo 'add_entry('.$_SESSION['cm_id'].',container_number,vehicle_id,advance,diesel,balance,color,mr_charges,remarks)';  
              }
            ?>
         }
         else
         {
              add(datee,agent_id,coa_id,consignee_id,movement,empty_terminal_id,from_yard_id,to_yard_id,bl_cro_number,job_number,container_number,index_number,container_size,vehicle_id,advance,rent,balance,diesel,party_charges,container_id,lot_of,line_id,lolo_charges,weight_charges,color,mr_charges,remarks);
         }

         $('#container_number').focus();
      });

    });
 </script>