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
                                <span class="caption-subject bold uppercase"> <?php $text = isset($_SESSION['disable_btn'])?'View':'Update'; echo $text; ?> Container Movement</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                          <?php
                                if(!isset($_SESSION['disable_btn']) )
                                {?>
                            <form class="form-horizontal <?php if( isset( $_SESSION['cm_id'] ) && $_SESSION['cm_id'] != NULL ) echo 'add_entry_form' ?>" role="form" method="post">
                                <div class="form-body">
                                   
                                    <div class="row"> 
                                        <div class="form-group">
                                                <div id="cm_id_div" class="hidden">
                                                  <label class="col-md-2 control-label">Transaction ID:</label>
                                                  <div class="col-md-3">
                                                    <input type="text" class="form-control" id="cm_id" name="cm_id" required readonly >
                                                  </div>
                                                </div>
                                    
                                                <label class="col-md-2 control-label">Transaction Date:</label>
                                                <div class="col-md-3">
                                                  <input type="date" class="form-control" id="datee" name="datee" value="<?php echo date('Y-m-d'); ?>" required tabindex="1" />
                                                </div>
                                         </div>  
                                     </div>
                                     <div class="row"> 
                                           <div class="form-group">
                                                 <label class="col-md-2 control-label"> Clearing Agent:</label>
                                                 <div class="col-md-3">
                                                     <select class="form-control" name="agent_id" id="agent_id" required tabindex="2" >
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
                                                    <select class="form-control" id="coa_id" name="coa_id" required tabindex="3" >
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
                                                    <select class="form-control" id="movement" name="movement" tabindex="5" >
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
                                                      <select class="form-control" id="empty_terminal_id" name="empty_terminal_id" required tabindex="6" >
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
                                                        <select class="form-control" id="from_yard_id" name="from_yard_id" required tabindex="7" >
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
                                                          <select class="form-control" id="to_yard_id" name="to_yard_id" required tabindex="8"  >
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
                                                <div class="col-md-3 small-lab2">
                                                  <label class=" control-label">Container Size:</label>
                                                  <select class="form-control" id="container_size" name="container_size" tabindex="9">
                                                      <option value="20">20</option>
                                                      <option value="40">40</option>
                                                      <option value="45">45</option>
                                                  </select>
                                                </div>
                
                                                <label class="col-md-2 control-label">Party Rent:</label>
                                                <div class="col-md-2">
                                                  <input type="number" min="0" class="form-control" placeholder="Party Chagers" id="party_charges" name="party_charges" required tabindex="10"/>
                                                </div>
                                 
                                                  <label class="col-md-1 control-label">Lot Of :</label>
                                                  <div class="col-md-2">
                                                    <input type="number" min="0"  class="form-control" placeholder="Lot Of" id="lot_of" name="lot_of" required tabindex="11"/>
                                                  </div>
                                                  </div>  
                                              </div>
                                              <div class="row"> 
                                                        
                                                    </div>

                                                <div class="row"> 
                                                      <div class="form-group">
                                                            <label class="col-md-2 control-label">Shipping Line:</label>
                                                            <div class="col-md-3">
                                                                <select class="form-control" id="line_id" name="line_id" required tabindex="12" >
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
                                                          <label class="col-md-2 control-label">B/L OR CRO No:</label>
                                                        <div class="col-md-3">
                                                          <input type="text" class="form-control" placeholder="0898664" id="bl_cro_number" name="bl_cro_number" required tabindex="13">
                                                        </div>
                                            
                                                          <label class="col-md-1 control-label">Job No:</label>
                                                        <div class="col-md-4">
                                                          <input type="text" class="form-control" placeholder="123456" id="job_number" name="job_number" required tabindex="14">
                                                        </div>
                                                 </div>  
                                            </div>
                                      
                                             <div class="row"> 
                                                 <div class="form-group">
                                                          
                                                         <label class="col-md-1 control-label">Index No</label> 
                                                         <div class="col-md-2"> 
                                                           <input type="text" class="form-control" placeholder="123456" id="index_number" name="index_number" required tabindex="15">
                                                         </div>
             
                                                          <label class="col-md-1 control-label">Rent:</label>
                                                            <div class="col-md-2">
                                                              <input type="number" min="0" class="form-control" placeholder="Rent" id="rent" name="rent"  tabindex="16">
                                                            </div>

                                                            <label class="col-md-2 control-label">Lolo Charges:</label>
                                                            <div class="col-md-2">
                                                              <input type="number" min="0" step="0.01" class="form-control" placeholder="lolo Charges" id="lolo_charges" name="lolo_charges" required tabindex="17">
                                                            </div>
     
                                                  </div>  
                                              </div> 

                                              <div class="row"> 
                                                    <div class="form-group">
                                                          <label class="col-md-2 control-label">Container Type:</label>
                                                          <div class="col-md-3">
                                                              <select class="form-control" id="container_id" name="container_id" required tabindex="18" >
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
  
                                                          <label class="col-md-2 control-label">Weight Charges</label>
                                                                   
                                                          <div class="col-md-2">
                                                            <input type="number" min="0" step="0.01" class="form-control" placeholder="Weight Charges" id="weight_charges" name="weight_charges" required tabindex="19">
                                                          </div>

                                                      </div> 
                                                </div> 
                              
                                    <div class="form-actions ">
                                        <!-- <button type="submit" class="btn blue" id="btn_submit" tabindex="13">Submit (F2)</button>  -->
                                        

                                        <button type="submit" class="btn blue" id="update_form_btn" disabled tabindex="20">Update</button>
                                        <!-- <button type="reset" class="btn default" id="btn_reset" tabindex="14">Cancel</button> -->
                                        <!-- <button type="button" class="btn default hidden"  id="add_new" tabindex="14">Add New</button> -->
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
                            <div class="portlet light bordered">
                                
                                <div class="portlet-body">
                  
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="mytable">
                                        <thead>
                                            <tr>
                                               
                                                <th> Action </th> 
                                              
                                                <th> # </th>
                                                <th> Container Movement Id </th>
                                                <th> Date </th>
                                                <th> Agent Name </th>
                                                <th> Chart of Account </th>
                                                <th> Consignee </th>
                                                <th> Movement </th>
                                                <th> Empty Terminal </th>
                                                <th> From  </th>
                                                <th> To </th>
                                                <th> Size </th>
                                                <th> Party Charges </th>
                                                <th> Lot Of </th>
                                                <th> Line </th>
                                                <th> BL_CRO_Number </th>
                                                <th> Job # </th>
                                                <th> Index # </th>
                                                <th> Rent </th>
                                                <th> Container Type </th>
                                                <th> Lolo Charges </th>
                                                <th> Weight Charges </th>

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

      //scrolling to datatable
      $("html, body").animate({ scrollTop: $('#mytable').offset().top }, "slow");

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

      function toYardIdSelect()
      {
        $('#to_yard_id').select2({
            width: 'resolve',
            theme: "classic"
          });
      }
      
      // $('#from_yard_id').on('change',function(){

      //   $('#to_yard_id').find('option').each(function(){
      //       $(this).removeAttr('disabled');
      //   });
      //   toYardIdSelect();

      //   var option = $('#to_yard_id').find("option[value='" + $(this).val() + "']");

      //   if (option.length) 
      //   {
      //     option.attr('disabled',true);
      //     toYardIdSelect();
      //   }
        

      // });

      
      $('#agent_id,#coa_id,#consignee_id,#empty_terminal_id,#movement,#vehicle_id,#line_id,#container_size,#from_yard_id,#to_yard_id,#container_id').select2({
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
          error:function(){  alertMessage('Error in Updating Field Ajax Call.','error') }
        });
      }

      $(document).on('click','.agent_id,.coa_id,.consignee_id,.line_id,.empty_terminal_id,.from_yard_id,.to_yard_id,.container_id', function()
      {
        updateField(''+$(this).attr('para')+'');
      });

      
      function load_full_form(v,param)
      {
        $.ajax({
          url:'ajax/container_movement/full_form.php?'+v+'='+param,
          dataType:'JSON',
          success:function(data){
            $('#'+v+'_full_form').val(data['val']);
          },
          error:function(){  alertMessage('Error Ajax Call.','error') }
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

      function loadData()
      {
        $.ajax({
            url:'ajax/container_movement/fetch.php',
            dataType:"JSON",
            success:function(data){

                var n = 1;
                var i = 0;

                $('#mytable').DataTable().destroy();
                $('tbody').html("");
                
                $.each(data,function(index,value){

                    $('tbody').append('<tr index="'+i+'" class="odd gradeX">'+

                          <?php
                                if(!isset($_SESSION['disable_btn']) )
                                {?>
                            '<td>'+ 
                                '<ul class="addremove">'+
                                    '<li> <button class="btn btn-xs green update_btn" id="'+value['cm_id']+'" type="button">  '+
                                    '<i class="fa fa-plus-square"></i>'+
                                    '</button> </li>'+

                                    '<li>  <button class="btn btn-xs blue cupdate_btn" id="'+value['cm_id']+'" type="button">  '+
                                    '<i class="fa fa-info"></i>'+
                                    '</button> </li>'+

                                    '<li>  <button class="btn btn-xs red delete_btn" id="'+value['cm_id']+'" type="button">  '+
                                    '<i class="fa fa-minus-square"></i>'+
                                    '</button> </li>'+
                                '</ul>'+
                            '</td>'+        
                            <?php }//END OF If
                                else{?>
                                    '<td></td>'+
                                <?php }//END OF ELSE ?>               

                            '<td style="color:#000;">'+n+'</td>'+
                            '<td>'+value['cm_id']+'</td>'+
                            '<td>'+value['datee']+'</td>'+
                            '<td id="'+value['agent_id']+'">'+value['agent_name']+'</td>'+
                            '<td id="'+value['coa_id']+'">'+value['coa']+'</td>'+
                            '<td id="'+value['consignee_id']+'">'+value['consignee']+'</td>'+
                            '<td>'+value['movement']+'</td>'+
                            '<td id="'+value['empty_terminal_id']+'">'+value['empty_terminal']+'</td>'+
                            '<td id="'+value['from_yard_id']+'">'+value['from_yard']+'</td>'+
                            '<td id="'+value['to_yard_id']+'">'+value['to_yard']+'</td>'+
                            '<td>'+value['container_size']+'</td>'+
                            '<td>'+value['party_charges']+'</td>'+
                            '<td>'+value['lot_of']+'</td>'+
                            '<td id="'+value['line_id']+'">'+value['line']+'</td>'+

                            '<td>'+value['bl_cro_number']+'</td>'+
                            '<td>'+value['job_number']+'</td>'+
                            '<td>'+value['index_number']+'</td>'+
                            '<td>'+value['rent']+'</td>'+
                            '<td id="'+value['container_id']+'">'+value['container_type']+'</td>'+
                            '<td>'+value['lolo_charges']+'</td>'+
                            '<td>'+value['weight_charges']+'</td>'+

                            '</tr>');

                    n++; i++;
                })

                myDataTable();
            },
            error:function(){ alertMessage("Failed Fetch Ajax Call.",'error') }
        });
      }

      loadData();

      function update(cm_id,datee,agent_id,agent_name,coa_id,coa,consignee_id,consignee,movement,empty_terminal_id,empty_terminal,from_yard_id,from_yard,to_yard_id,to_yard,container_size,party_charges,lot_of,line_id,line,bl_cro_number,job_number,index_number,rent,container_id,container_type,lolo_charges,weight_charges)
      {
          $.ajax({
              url:'ajax/container_movement/update.php?cm_id='+cm_id+'&datee='+encodeURIComponent(datee)+'&agent_id='+agent_id+'&coa_id='+coa_id+'&consignee_id='+consignee_id+'&movement='+movement+'&empty_terminal_id='+empty_terminal_id+'&from_yard_id='+from_yard_id+'&to_yard_id='+to_yard_id+'&container_size='+container_size+'&party_charges='+party_charges+'&lot_of='+lot_of+'&line_id='+line_id+'&bl_cro_number='+bl_cro_number+'&job_number='+job_number+'&index_number='+index_number+'&rent='+rent+'&container_id='+container_id+'&lolo_charges='+lolo_charges+'&weight_charges='+weight_charges,
              type:"POST",
              success:function(data){
                  if(data)
                  {
                      var i = $('.selectedd').attr('index');
                      var temp = $('#mytable').DataTable().row(i).data();
                      
                      addNewClick();

                      temp[3]  = datee;
                      temp[4]  = agent_name;
                      temp[5]  = coa;
                      temp[6]  = consignee;
                      temp[7]  = movement;
                      temp[8]  = empty_terminal;
                      temp[9]  = from_yard;
                      temp[10] = to_yard;
                      temp[11] = container_size;
                      temp[12] = party_charges;
                      temp[13] = lot_of;
                      temp[14] = line;

                      temp[15] = bl_cro_number;
                      temp[16] = job_number
                      temp[17] = index_number
                      temp[18] = rent
                      temp[19] = container_type
                      temp[20] = lolo_charges
                      temp[21] = weight_charges

                      $('#mytable').DataTable().row(i).data(temp).draw();

                      alertMessage('Updated Successfully.','success');

                      $('.selectedd').css('');

                      // location.assign('container-entry.php');
                  }
              },
              error:function(){ alertMessage("Error in Update Ajax Call.",'error') }
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
              error:function(){ alertMessage("Error in Delete ajax Call.",'error') }
          });
      }

      function updateClick()
      {

          $('form').addClass('update_form');

          $('#cm_id_div').removeClass('hidden');
          $('#update_form_btn').removeAttr('disabled');

          $('#datee').focus();
      }

      function addNewClick()
      {

          $('form').removeClass('update_form');

          $('form select').val("").trigger('change');
          $('#movement').val('empty').trigger('change');
          $('#container_size').val('20').trigger('change');
          $('#party_charges,#lot_of,#bl_cro_number,#job_number,#index_number,#rent,#lolo_charges,#weight_charges').val('');

          $('#cm_id_div').addClass('hidden');
          $('#update_form_btn').attr('disabled','disabled');
      }

      //DELETE 
      $(document).on('click','.delete_btn',function(){

          var cm_id = $(this).attr('id'),
              trr = $(this).closest('tr');

          deletetr(trr,cm_id);
      });

      //C Update 
      $(document).on('click','.cupdate_btn',function(){

          var cm_id = $(this).attr('id');

          $.ajax({
            url:'ajax/container_movement/cupdate.php?cm_id='+cm_id,
            success:function(data){ location.assign("container-entry.php"); },
            error:function(){ alertMessage("Can't edit Entries right now.",'error') },
          })
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
          $('#datee').val(trr.find('td').eq(3).text());
          $('#agent_id').val( trr.find('td').eq(4).attr('id') ).trigger('change');
          $('#coa_id').val( trr.find('td').eq(5).attr('id') ).trigger('change');
          $('#consignee_id').val( trr.find('td').eq(6).attr('id') ).trigger('change');
          $('#movement').val( trr.find('td').eq(7).text() ).trigger('change');
          $('#empty_terminal_id').val( trr.find('td').eq(8).attr('id') ).trigger('change');
          $('#from_yard_id').val( trr.find('td').eq(9).attr('id') ).trigger('change');
          $('#to_yard_id').val( trr.find('td').eq(10).attr('id') ).trigger('change');
          $('#container_size').val( trr.find('td').eq(11).text() ).trigger('change');
          $('#party_charges').val( trr.find('td').eq(12).text() );
          $('#lot_of').val( trr.find('td').eq(13).text() );
          $('#line_id').val( trr.find('td').eq(14).attr('id') ).trigger('change');

          $('#bl_cro_number').val( trr.find('td').eq(15).text() );
          $('#job_number').val( trr.find('td').eq(16).text() );
          $('#index_number').val( trr.find('td').eq(17).text() );
          $('#rent').val( trr.find('td').eq(18).text() );
          $('#container_id').val( trr.find('td').eq(19).attr('id') ).trigger('change');
          $('#lolo_charges').val( trr.find('td').eq(20).text() );
          $('#weight_charges').val( trr.find('td').eq(21).text() );
      });

      //Update
      $('form').submit(function(e){
         e.preventDefault();
         
         var datee = $('#datee').val() ,
             agent_id = $('#agent_id').val(),
             agent_name = $('#agent_id option:selected').text(),
             coa_id = $('#coa_id').val(),
             coa = $('#coa_id option:selected').text(),
             consignee_id = $('#consignee_id').val(),
             consignee = $('#consignee_id option:selected').text(),
             movement = $('#movement').val(),
             empty_terminal_id = $('#empty_terminal_id').val(),
             empty_terminal = $('#empty_terminal_id option:selected').text(),
             from_yard_id = $('#from_yard_id').val(),
             from_yard = $('#from_yard_id option:selected').text(),
             to_yard_id = $('#to_yard_id').val(),
             to_yard = $('#to_yard_id option:selected').text(),
             container_size = $('#container_size').val(),
             party_charges = $('#party_charges').val(),
             lot_of = $('#lot_of').val(),
             line_id = $('#line_id').val(),
             line = $('#line_id option:selected').text(),

             bl_cro_number = $('#bl_cro_number').val(),
             job_number = $('#job_number').val(),
             index_number = $('#index_number').val(),
             rent = $('#rent').val(),
             container_id = $('#container_id').val(),
             container_type = $('#container_id option:selected').text(),
             lolo_charges = $('#lolo_charges').val(),
             weight_charges = $('#weight_charges').val(),
             
             cm_id =  $('#cm_id').val();

         if( $(this).hasClass('update_form') ) 
         {
            update(cm_id,datee,agent_id,agent_name,coa_id,coa,consignee_id,consignee,movement,empty_terminal_id,empty_terminal,from_yard_id,from_yard,to_yard_id,to_yard,container_size,party_charges,lot_of,line_id,line,bl_cro_number,job_number,index_number,rent,container_id,container_type,lolo_charges,weight_charges);
         }
         // else
         // {

         // }
      });

    });
 </script>