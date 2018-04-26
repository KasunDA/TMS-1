<?php 
include 'header.php';
include 'nav.php';

require 'connection.php';
date_default_timezone_set("Asia/Karachi");

// $_SESSION['cm_id'] = 1;
// $_SESSION['lot_of'] = 6;
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
                            <form class="form-horizontal <?php if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL ) echo 'add_entry_form' ?>" role="form" method="post">
                                <div class="form-body">
                                   
                                    <div class="row"> 
                                        <div class="form-group">
                                                <div id="ce_id_div" class="hidden">
                                                  <label class="col-md-2 control-label">Transaction ID:</label>
                                                  <div class="col-md-3">
                                                    <input type="text" class="form-control" placeholder="E-1035" id="ce_id" name="ce_id" required readonly >
                                                  </div>
                                                </div>
                                    
                                                <label class="col-md-2 control-label">Transaction Date:</label>
                                                <div class="col-md-3">
                                                  <input type="date" class="form-control" id="datee" name="datee" value="<?php echo date('Y-m-d'); ?>" required tabindex="1" <?php if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL ) echo 'readonly' ?> />
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
                                                <div class="col-md-5">
                                                  <input type="text" class="form-control" placeholder="Full Form" id="coa_id_full_form" readonly>
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
                                                <div class="col-md-5">
                                                  <input type="text" class="form-control" placeholder="Full Form" id="consignee_id_full_form" readonly>
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
                                                  <div class="col-md-5">
                                                    <input type="text" class="form-control" placeholder="Full Form" id="empty_terminal_id_full_form" readonly>
                                                  </div>
                                              </div> 
                                        </div>
                                        <div class="row"> 
                                              <div class="form-group">
                                                    <label class="col-md-2 control-label">From Yard:</label>
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="from_yard_id" name="from_yard_id" required tabindex="7" <?php if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL ) echo 'disabled' ?> >
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
                                                          <select class="form-control" id="to_yard_id" name="to_yard_id" required tabindex="8" <?php if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL ) echo 'disabled' ?> >
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

                                                            <label class="col-md-1 control-label">Lolo Charges:</label>
                                                            <div class="col-md-2">
                                                              <input type="number" min="0" step="0.01" class="form-control" placeholder="lolo Charges" id="lolo_charges" name="lolo_charges" required tabindex="18">
                                                            </div>
                                                              
                                                              
                                                        </div> 

                                                  </div>
                                                  <div class="row"> 
                                                        <div class="form-group">
                                                              
                                                              <label class="col-md-2 control-label">Party Rent:</label>
                                                               
                                                              <div class="col-md-3">
                                                                <input type="number" min="0" class="form-control" placeholder="Party Chagers" id="party_charges" name="party_charges" required tabindex="19"  <?php if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL ) echo 'readonly' ?> />
                                                              </div>
                                                              <label class="col-md-1 control-label">Balance:</label>
                                                              <div class="col-md-2">
                                                                <input type="number" class="form-control" placeholder="Balance" id="balance" name="balance" readonly tabindex="20">
                                                              </div>
                                                             
                                                          </div> 


                                                    </div>

                                              
                                              <div class="row"> 
                                                    <div class="form-group">
                                                          <label class="col-md-2 control-label">Container Type:</label>
                                                          <div class="col-md-3">
                                                              <select class="form-control" id="container_id" name="container_id" required tabindex="21">
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
                                                            <input type="number" min="0"  class="form-control" placeholder="Lot Of" id="lot_of" name="lot_of" required tabindex="22" <?php if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL ) echo 'readonly' ?> />
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
                                                            <div class="col-md-5">
                                                              <input type="text" class="form-control" placeholder="Full Form" id="line_id_full_form" readonly>
                                                            </div>
                                                        </div> 
                                                  </div>
                                            
                                                     
                                                      <div class="row"> 
                                                          <div class="form-group">
                                                                  
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
                                      <?php 
                                        if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL )
                                        {
                                          echo '<a href="ajax/container_movement/destroy_cmid.php" class="btn default"  id="add_new_movement" tabindex="30">Add New Movement</a>';
                                        } ?>

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

      $('#advance,#rent,#lolo_charges').on('keyup change',function(){
          var a = $('#rent').val()/1 + $('#lolo_charges').val()/1; 
          $('#balance').val( a - $('#advance').val() );
        });


      <?php 
        
        //Select2

        // if( !isset( $_SESSION['cm_id'] ) || $_SESSION['cm_id'] == NULL )
        // {
          echo " $('#agent_id,#coa_id,#consignee_id,#empty_terminal_id,#movement,#vehicle_id,#container_id,#line_id,#color,#container_size,#from_yard_id,#to_yard_id').select2({
            width: 'resolve'
          });";  
        // }
      ?>
      

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
            e.dataTable({language:{aria:{sortAscending:": activate to sort column ascending",sortDescending:": activate to sort column descending"},emptyTable:"No data available in table",info:"Showing _START_ to _END_ of _TOTAL_ records",infoEmpty:"No records found",infoFiltered:"(filtered1 from _MAX_ total records)",lengthMenu:"Show _MENU_",search:"Search:",zeroRecords:"No matching records found",paginate:{previous:"Prev",next:"Next",last:"Last",first:"First"}},bStateSave:!0,columnDefs:[{targets:0,orderable:!1,searchable:!1}],lengthMenu:[[5,15,20,-1],[5,15,20,"All"]],pageLength:5,pagingType:"bootstrap_full_number",columnDefs:[{orderable:!1,targets:[0]},{searchable:!1,targets:[0]}],order:[[1,"asc"]]});
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

                  else{
                    c = '#26c281'; // green color
                  }

                    $('tbody').append('<tr index="'+i+'" class="odd gradeX" style="background-color:'+c+';">'+

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
          echo 'loadData("'.$_SESSION['cm_id'].'")';  
        }

      ?>

      function add_entry(cm_id,bl_cro_number,job_number,container_number,index_number,vehicle_id,advance,rent,balance,container_id,lolo_charges,weight_charges,color,mr_charges,remarks)
      {
          $.ajax({
              url:'ajax/container_entry/add.php?cm_id='+cm_id+'&bl_cro_number='+bl_cro_number+'&job_number='+job_number+'&container_number='+container_number+'&index_number='+index_number+'&vehicle_id='+vehicle_id+'&advance='+advance+'&rent='+rent+'&balance='+balance+'&container_id='+container_id+'&lolo_charges='+lolo_charges+'&weight_charges='+weight_charges+'&color='+color+'&mr_charges='+mr_charges+'&remarks='+remarks,
              type:"POST",
              dataType:'JSON',
              success:function(data){
                  if(data['inserted'] == 'true')
                  {
                      $('#bl_cro_number,#job_number,#container_number,#index_number,#advance,#rent,#balance,#lolo_charges,#weight_charges,#color,#mr_charges,#remarks').val("");
                      $('#vehicle_id,#container_id').val("").trigger('change');
                      
                      <?php 

                        if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL )
                        {
                          echo 'loadData("'.$_SESSION['cm_id'].'")';  
                        }
                      ?>
                  }
                  else
                  {
                    alert(data['lot_of_limit']);
                  }
              },
              error:function(){ alert("Error in Add Ajax Call.") }
          });
      }

      function add(datee,agent_id,coa_id,consignee_id,movement,empty_terminal_id,from_yard_id,to_yard_id,bl_cro_number,job_number,container_number,index_number,container_size,vehicle_id,advance,rent,balance,party_charges,container_id,lot_of,line_id,lolo_charges,weight_charges,color,mr_charges,remarks)
      {
          $.ajax({
              url:'ajax/container_movement/add.php?datee='+datee+'&agent_id='+agent_id+'&coa_id='+coa_id+'&consignee_id='+consignee_id+'&movement='+movement+'&empty_terminal_id='+empty_terminal_id+'&from_yard_id='+from_yard_id+'&to_yard_id='+to_yard_id+'&container_size='+container_size+'&party_charges='+party_charges+'&lot_of='+lot_of+'&line_id='+line_id,
              type:"POST",
              dataType:'JSON',
              success:function(data){
                  if(data['inserted'])
                  {
                      // $('#datee,#agent_id,#coa_id,#consignee_id,#movement,#empty_terminal_id,#from_yard_id,#to_yard_id,#container_size,#party_charges,#lot_of,#line_id').attr('readonly', 'readonly');
                      
                      add_entry(data['cm_id'],bl_cro_number,job_number,container_number,index_number,vehicle_id,advance,rent,balance,container_id,lolo_charges,weight_charges,color,mr_charges,remarks);

                      location.assign('container-entry.php');
                  }
              },
              error:function(){ alert("Error in Add Ajax Call.") }
          });
      }

      function update(ce_id,bl_cro_number,job_number,container_number,index_number,vehicle_id,vehicle_number,advance,rent,balance,container_id,container_type,lolo_charges,weight_charges,color,mr_charges,remarks)
      {
          $.ajax({
              url:'ajax/container_entry/update.php?ce_id='+ce_id+'&bl_cro_number='+bl_cro_number+'&job_number='+job_number+'&container_number='+container_number+'&index_number='+index_number+'&vehicle_id='+vehicle_id+'&advance='+advance+'&rent='+rent+'&balance='+balance+'&container_id='+container_id+'&lolo_charges='+lolo_charges+'&weight_charges='+weight_charges+'&color='+color+'&mr_charges='+mr_charges+'&remarks='+remarks,
              type:"POST",
              success:function(data){
                  if(data)
                  {
                      var i = $('.selectedd').attr('index');
                      var temp = $('#mytable').DataTable().row(i).data();
                      
                      addNewClick();

                      temp[10] = bl_cro_number;
                      temp[11] = job_number;
                      temp[12] = container_number;
                      temp[13] = index_number;
                      temp[15] = vehicle_number;
                      temp[16] = advance;
                      temp[17] = rent;
                      temp[18] = balance;
                      temp[20] = container_type;
                      temp[23] = lolo_charges;
                      temp[24] = weight_charges;
                      temp[25] = color;
                      temp[26] = mr_charges;
                      temp[27] = remarks;

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

                    else
                    {
                      $('.selectedd').css('background-color','#26c281'); // green color
                    }

                  }
              },
              error:function(){ alert("Error in Update Ajax Call.") }
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

      }

      function addNewClick()
      {

          $('form').removeClass('update_form');

          $('form select').val("").trigger('change');
          $('#movement').val('empty').trigger('change');
          $('#container_size').val('20').trigger('change');
          $('#color').val('red').trigger('change');
          $('#btn_reset').trigger('click');

          $('#ce_id_div').addClass('hidden');
          $('#update_form_btn').addClass('hidden');
          $('#add_new').addClass('hidden');

          $('#btn_submit').removeClass('hidden');
          $('#btn_reset').removeClass('hidden');

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
          $('#bl_cro_number').val( trr.find('td').eq(10).text() );
          $('#job_number').val( trr.find('td').eq(11).text() );
          $('#container_number').val( trr.find('td').eq(12).text() );
          $('#index_number').val( trr.find('td').eq(13).text() );
          // $('#container_size').val( trr.find('td').eq(14).text() ).trigger('change');
          $('#vehicle_id').val( trr.find('td').eq(15).attr('id') ).trigger('change');
          $('#advance').val( trr.find('td').eq(16).text() );
          $('#rent').val( trr.find('td').eq(17).text() );
          $('#balance').val( trr.find('td').eq(18).text() );
          // $('#party_charges').val( trr.find('td').eq(19).text() );
          $('#container_id').val( trr.find('td').eq(20).attr('id') ).trigger('change');
          // $('#lot_of').val( trr.find('td').eq(21).text() );
          // $('#line_id').val( trr.find('td').eq(22).attr('id') ).trigger('change');
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
             vehicle_number = $('#vehicle_id option:selected').text(),
             advance = $('#advance').val(),
             rent = $('#rent').val(),
             balance = $('#balance').val(),
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
            update(ce_id,bl_cro_number,job_number,container_number,index_number,vehicle_id,vehicle_number,advance,rent,balance,container_id,container_type,lolo_charges,weight_charges,color,mr_charges,remarks);
         }
         else if( $(this).hasClass('add_entry_form') )
         {  
            <?php 
              if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL )
              {
                echo 'add_entry('.$_SESSION['cm_id'].',bl_cro_number,job_number,container_number,index_number,vehicle_id,advance,rent,balance,container_id,lolo_charges,weight_charges,color,mr_charges,remarks)';  
              }
            ?>
         }
         else
         {
              add(datee,agent_id,coa_id,consignee_id,movement,empty_terminal_id,from_yard_id,to_yard_id,bl_cro_number,job_number,container_number,index_number,container_size,vehicle_id,advance,rent,balance,party_charges,container_id,lot_of,line_id,lolo_charges,weight_charges,color,mr_charges,remarks);
         }
      });

    });
 </script>