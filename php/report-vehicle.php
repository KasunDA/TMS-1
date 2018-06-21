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
                            <span class="caption-subject bold uppercase">Vehicle Detailed Report</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form class="form-horizontal" role="form" method="post" id="form">
                            <div class="form-body">
                                <div class="row"> 
                                    <div class="form-group">
                                        <label class="control-label col-md-2">From Date:</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control date-picker"  id="from_datee" name="from_datee" required tabindex="1" <?php echo 'value="'.date('m/d/Y').'"'; ?> placeholder="mm/dd/yyyy">
                                        </div>

                                        <label class="control-label col-md-2">To Date:</label>
                                        <div class="col-md-3"> 
                                            <input type="text" class="form-control date-picker" id="to_datee" name="to_datee" required tabindex="2" <?php echo 'value="'.date('m/d/Y').'"'; ?> placeholder="mm/dd/yyyy"> 
                                        </div>
                                        
                                    </div>
                                   
                                </div>
                                
                                <div class="row"> 
                                      <div class="form-group">
                                            <label class="col-md-2 control-label">From Destination:</label>
                                            <div class="col-md-3">
                                                <select class="form-control" id="from_yard_id" name="from_yard_id" tabindex="3" >
                                                    <option value="">All</option>
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
                                            
                                            <label class="col-md-1 control-label">To Destination:</label>
                                            <div class="col-md-3">
                                              <select class="form-control" id="to_yard_id" name="to_yard_id" tabindex="4"  >
                                                  <option value="">All</option>
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

                                        </div> 
                                </div>
                                
                                <div class="row"> 
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">On Account Of:</label>
                                        <div class="col-md-3">
                                            <select class="form-control" id="coa_id" name="coa_id"  tabindex="5" >
                                                <option value="">All</option>
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
                                        
                                        <label class="col-md-1 control-label">Consignee:</label>
                                        <div class="col-md-3">
                                            <select class="form-control" id="consignee_id" name="consignee_id"  tabindex="6">
                                                <option value="">All</option>
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
                                    </div> 
                                </div>
                                
                                <div class="row"> 
                                  <div class="form-group">
                                        <label class="col-md-2 control-label"> Movement:</label>
                                        <div class="col-md-3">
                                            <select class="form-control" id="movement" name="movement" tabindex="7" >
                                                <option value="">All</option>
                                                <option value="empty">Empty</option>
                                                <option value="import">Import</option>
                                                <option value="export">Export</option> 
                                                <option value="open_cargo">Open Cargo</option> 
                                            </select>
                                        </div>
                                        
                                        <label class="col-md-2 control-label"> Empty Terminal:</label>
                                          <div class="col-md-3">
                                              <select class="form-control" id="empty_terminal_id" name="empty_terminal_id" tabindex="8" >
                                                  <option value="">All</option>
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
                                    </div> 
                                </div>
                                
                                <div class="row"> 
                                    <div class="form-group">
                                        
                                        <label class="col-md-2 control-label">Container No:</label>
                                        <div class="col-md-3">
                                          <input type="text" class="form-control" placeholder="APZU4846408" id="container_number" name="container_number" tabindex="9">
                                        </div>

                                        <label class="col-md-2 control-label">B/L OR CRO No:</label>
                                        <div class="col-md-3">
                                          <input type="text" class="form-control" placeholder="0898664" id="bl_cro_number" name="bl_cro_number"  tabindex="10">
                                        </div>
                                    
                                    </div>  
                                </div>

                                <div class="row"> 
                                    <div class="form-group">
                                        
                                        <label class="col-md-2 control-label">Container Size:</label>
                                        <div class="col-md-3">
                                            <select class="form-control" id="container_size" name="container_size" tabindex="11">
                                              <option value="">All</option>
                                              <option value="20">20</option>
                                              <option value="40">40</option>
                                              <option value="45">45</option>
                                            </select>
                                        </div>

                                        <label class="col-md-2 control-label">Container Type:</label>
                                        <div class="col-md-3">
                                            <select class="form-control" id="container_id" name="container_id" tabindex="12" >
                                              <option value="">All</option>
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
                                    </div>  
                                </div>

                                <div class="row"> 
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Select Vehicle:</label>
                                        <div class="col-md-3">
                                            <select class="form-control" name="vehicle_id" id="vehicle_id" tabindex="13">
                                                <option value="">All</option>
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

                                        <label class="col-md-1 control-label">Owner Name:</label>
                                        <div class="col-md-3">
                                            <select class="form-control" id="owner_name" name="owner_name" tabindex="14">
                                                <option value="">All</option>
                                                <?php 

                                                    $q = mysqli_query($mycon,'SELECT owner_name from vehicle where status=1 GROUP BY owner_name');

                                                    while( $r = mysqli_fetch_array($q) )
                                                    {?>
                                                        <option value="<?php echo $r['owner_name']; ?>"><?php echo $r['owner_name']; ?></option>
                                                    <?php } //END OF WHILE ?>         
                                            </select>
                                        </div>   

                                        <div class="col-md-1">

                                          <button class="btn btn-xs green owner_name" para="owner_name"  type="button">
                                          
                                            <i class="fa fa-refresh"></i>
                                          
                                          </button>

                                        </div>                                     
                                    
                                    </div>  
                                </div>

                                <div class="row"> 
                                    <div class="form-group">
                                        
                                        <label class="col-md-2 control-label">Shipping Line:</label>
                                            <div class="col-md-3">
                                                <select class="form-control" id="line_id" name="line_id"  tabindex="15" >
                                                    <option value="">All</option>
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
                                    </div>  
                                </div>
                                
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-9 col-md-push-2">
                                            <div class="">
                                                <button type="submit" class="btn blue" id="btn_submit" tabindex="16">Check</button>
                                                <!-- <button type="button" class="btn default">Cancel</button> -->
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
        <!-- END PAGE BASE CONTENT -->
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
                            <!-- <a href="" class="expand"> </a> -->

                            <!-- <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="group-checkable" data-set="#mytable .checkboxes" />
                                        <span></span>
                                    </label> -->
                        </div>
                    </div>
                    <div class="portlet-body table-both-scroll" >  <!-- style="display: none;" -->
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="mytable">
                          <thead>
                              <tr>
                                  <th>
                                    
                                  </th>
                                  <th> Index </th>
                                  <th> ID </th>
                                  <th> Date </th>
                                  <th> Chart Of Account  </th>
                                  <th> Empty </th>
                                  <th> From  </th>
                                  <th> To </th>
                                  <th> Movement </th>
                                  <th> Container # </th>
                                  <th> Size </th>
                                  <th> Type </th>
                                  <th> Line </th>
                                  <th> B/L OR CRO NO. </th>
                                  <th> Vehicle # </th>
                                  <th> Driver </th>
                                  <th> Owner </th>
                                  <th> Rent </th>
                                  <th> Advance </th>
                                  <th> Diesel </th>
                                  <th> Repair Charges </th>
                                  <th> Balance </th>
                                  <th> Remarks </th>
                              </tr>
                          </thead>
                          <tbody>
                          </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <!-- BEGIN BORDERED TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered ">
                    
                    <div class="portlet-body ">
                        <div class="table-scrollable  table-scrollable-borderless" id="mytable2_div">
                            <table class="table table-hover table-light" id="mytable2">
                                <thead>
                                    <tr class="uppercase">
                                        <td> # </td>
                                        <td> Total Trips </td>
                                        <td id="total_trips"></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> 1 </td>
                                        <td> Advance Taken (Driver) or (All) </td>
                                        <td id="advance_taken"></td>
                                    </tr>
                                    <tr>
                                        <td> 2 </td>
                                        <td> Advance Taken Owner</td>
                                        <td id="advance_taken_owner"></td>
                                    </tr>
                                    <tr>
                                        <td> 3 </td>
                                        <td> Balance (Total of all trips) </td>
                                        <td id="balance_trips"></td>
                                    </tr>
                                    <tr>
                                        <td> 4 </td>
                                        <td> Diesel </td>
                                        <td id="total_diesel"></td>
                                    </tr>
                                    <tr>
                                        <td> 5 </td>
                                        <td> Repair & Maintenance </td>
                                        <td id="total_rm"></td>
                                    </tr>
                                    <tr>
                                        <td> 6 </td>
                                        <td> Driver Salary</td>
                                        <td id="driver_salary"></td>
                                    </tr>
                                    <tr>
                                        <td> 7 </td>
                                        <td> Paid </td>
                                        <td id="paid_salary"></td>
                                    </tr>
                                    <tr>
                                        <td> 8 </td>
                                        <td> Total Balance </td>
                                        <td id="total_balance"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END BORDERED TABLE PORTLET-->
            </div>
            <?php
            if(!isset($_SESSION['disable_btn']) )
            {?>
            <div class="col-md-6" id="voucher_div" style="display: none;">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase">Debit:</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form class="form-horizontal" role="form" id="voucher_form" method="post">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="form-group">
                                          <label class="col-md-4 control-label">Voucher #:</label>
                                          <div class="col-md-5">
                                            <input type="text" class="form-control" id="voucher_number" name="voucher_number" required readonly >
                                          </div>
                                        </div>
                                    </div>
                                    <div class="row"> 
                                        <div class="form-group">  
                                            <label class="col-md-4 control-label">Date:</label>
                                            <div class="col-md-5">
                                              <input type="date" class="form-control" id="datee" name="datee"  value="<?php echo date('Y-m-d'); ?>" required tabindex="1" />
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Payment Method</label>
                                            <div class="col-md-5">
                                                <div class="mt-radio-list">
                                                    <label class="mt-radio">
                                                        <input type="radio" name="method" id="optionsRadios22" value="cash" checked tabindex="2"> Cash 
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio">
                                                        <input type="radio" name="method" id="optionsRadios23" value="check" tabindex="3"> Check
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="hidden" id="check_number_div">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Check No.</label>
                                            <div class="col-md-5">
                                               <input type="number" name="check_number" min="0" id="check_number" tabindex="4" class="form-control" placeholder="5033554">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Bank Name</label>
                                            <div class="col-md-5">
                                               <select class="form-control" id="bank_id" name="bank_id" tabindex="5">
                                                    <option value="">Select Bank</option>
                                                    <?php 

                                                      $q = mysqli_query($mycon,'SELECT bank_id,short_form from bank where status=1 ORDER BY bank_id DESC');

                                                      while( $r = mysqli_fetch_array($q) )
                                                        {?>
                                                        <option value="<?php echo $r['bank_id']; ?>"><?php echo $r['short_form']; ?></option>
                                                  <?php } //END OF WHILE ?>
                                                    
                                                </select>
                                            </div>

                                            <div class="col-md-1">

                                                <button class="btn btn-xs green bank_id" para="bank_id"  type="button">
                                                
                                                  <i class="fa fa-refresh"></i>
                                                
                                                </button>

                                            </div>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Amount</label>
                                            <div class="col-md-5">
                                               <input type="number" min="1"  name="amount" id="amount" required tabindex="6" class="form-control" placeholder="58680">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-5 col-md-push-4">
                                                <div class="">
                                                    <button type="submit" class="btn blue" id="btn_submit" tabindex="7">Submit</button> 
                                                    <button type="reset" class="btn default" id="btn_reset" tabindex="8">Cancel</button>
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
            <?php }//END OF IF?>
        </div>
        <div class="row hidden">
          <table class="table table-striped table-bordered table-hover table-checkable order-column"  id="mytable1" >

            <thead>
                <tr>
                    <th> Index </th>
                    <th> Chart Of Account  </th>
                    <th> Empty  </th>
                    <th> From  </th>
                    <th> To </th>
                    <th> Movement </th>
                    <th> Line </th>
                    <th> Lolo </th>
                    <th> 20 </th>
                    <th> 40 </th>
                    <th> 45 </th>
                    <th> Total </th>
                </tr>
            </thead>
            <tbody>
            </tbody>

        
          </table>
        </div>
    <!-- END CONTENT BODY -->
        </div>
<!-- END CONTENT -->
    </div>
</div>
<!-- END CONTAINER -->
<?php 
include 'footer.php';
 ?>

<script src="../assets/global/scripts/select2.full.min.js"></script>
<script src="../assets/global/scripts/buttons.html5.js"></script>
<script src="../assets/global/scripts/jspdf.debug.js"></script>
<script src="../assets/global/scripts/jspdf.plugin.autotable.js"></script>
<script type="text/javascript">
 
 $(document).ready(function(){

    // $('#mytable').on( 'focusout', 'tbody td:not(:first-child)', function (e) {
        
    //     var i = $(this).closest('tr').attr('index');
    //     var temp = $('#mytable').DataTable().row(i).data();
        
    //     // temp[2] = name;

    //     $('#mytable').DataTable().row(i).data(temp).draw();

    //     // editor.inline( this );
    // } );


    // Making TD editable exept td with action button
    $('#mytable').on('dblclick', 'td:not(:has(button))', function(){
      // The cell that has been clicked will be editable
      $(this).attr('contenteditable', 'true');
      var el = $(this);
      // We put the cursor at the beginning 
      var range = document.createRange();
      var sel = window.getSelection();
      if(el[0].childNodes.length > 0)
      {
        range.setStart(el[0].childNodes[0],0);
        range.collapse(true);
        sel.removeAllRanges();
        sel.addRange(range);
      }
      // The cell have now the focus
      el.focus();

      $(this).blur(endEdition);
    });

    function endEdition()
    {
      var myTable = $('#mytable').DataTable(); 
      // We get the cell 
      var el = $(this);
      
      // We tell to datatable to refresh the cache with the DOM, like that the filter will find the new data added in the table.
      // BUT IF WE EDIT A ROW ADDED DYNAMICALLY, THIS INSTRUCTION IS A PROBLEM
      myTable.cell( el ).invalidate().draw(); 
      
      // When the user finished to edit a cell and click out of the cell, the cell can't be editable, unless the user double click on this cell another time
      el.attr('contenteditable', 'false');

      el.off('blur', endEdition); // To prevent another bind to this function
    }

    //checkboxes code
    $(document).on('change','tbody tr .checkboxes',function(){
      
      $(this).toggleClass("faded");
      $(this).parents("tr").toggleClass("active");
      $(this).parents("tr").toggleClass("selectedd");

      var i         = $(this).parents('tr').attr('index'),
      tableData     = $('#mytable').DataTable().row(i).data(),
      total_diesel  = tableData[19],
      total_rm      = tableData[20], 
      balance_trips = tableData[21];

      if( !$(this).parents('tr').hasClass('selectedd') )
      {                  
        $('#total_trips').html( $('#total_trips').html()/1 -1 );
        $('#total_diesel').html( $('#total_diesel').html()/1 - total_diesel);
        $('#total_rm').html( $('#total_rm').html()/1 - total_rm);
        $('#balance_trips').html( $('#balance_trips').html()/1 - balance_trips);
      }
      else
      {
        $('#total_trips').html( $('#total_trips').html()/1 + 1 );
        $('#total_diesel').html( parseFloat($('#total_diesel').html()) + parseFloat(total_diesel) ) ;
        $('#total_rm').html( parseFloat( $('#total_rm').html() ) + parseFloat(total_rm) );
        $('#balance_trips').html( parseFloat( $('#balance_trips').html() ) + parseFloat(balance_trips) ); 
      }

      calculations();

    });

      //RESET BUTTON CODE
    $(document).on('click','#btn_reset',function(){
        bchide();
        getId();
    });

    function bcshow()
    {
        $('#check_number,#bank_id').attr('required','required');
        $('#check_number_div').removeClass('hidden');
    }

    function bchide()
    {
        $('#check_number,#bank_id').removeAttr('required');
        $('#check_number').val('');
        $('#bank_id').val('').trigger('change');
        $('#check_number_div').addClass('hidden'); 
    }


    $('input[name="method"]').change(function(){

        if( $(this).val() == 'check' )
        {
            bcshow();
        }
        else
        {
            bchide();
        }      

   });


    function getId()
    {
        $.ajax({
          url :'ajax/voucher/fetchid_voucher.php',
          dataType:'JSON',
          success: function(data)
          {
              $('#voucher_number').val(data['voucher_number']);
          }
          // error: function(){ alert('Error in get id Ajax.') }

        })
    }

    getId();

    //Select2
   $('#from_yard_id,#to_yard_id,#coa_id,#consignee_id,#movement,#empty_terminal_id,#container_size,#container_id,#line_id,#vehicle_id,#owner_name,#bank_id').select2({
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


              if( param =='coa_id' )
              {
                $('#'+param).html('<option value="">All</option>');
                
                $.each(data,function(index,value){
                  $('#'+param).append('<option value="'+value['coa_id']+'">'+value['short_form']+'</option> ');
                });
              }
              else if( param =='consignee_id' )
              {
                $('#'+param).html('<option value="">All</option>');
                
                $.each(data,function(index,value){
                  $('#'+param).append('<option value="'+value['consignee_id']+'">'+value['short_form']+'</option> ');
                });
              }
              else if( param =='empty_terminal_id' )
              {
                $('#'+param).html('<option value="">All</option>');
                
                $.each(data,function(index,value){
                  $('#'+param).append('<option value="'+value['yard_id']+'">'+value['short_form']+'</option> ');
                });
              }
              else if( param =='from_yard_id' )
              {
                $('#'+param).html('<option value="">All</option>');
                
                $.each(data,function(index,value){
                  $('#'+param).append('<option value="'+value['yard_id']+'">'+value['short_form']+'</option> ');
                });
              }
              else if( param =='to_yard_id' )
              {
                $('#'+param).html('<option value="">All</option>');
                
                $.each(data,function(index,value){
                  $('#'+param).append('<option value="'+value['yard_id']+'">'+value['short_form']+'</option> ');
                });
              }
              else if( param =='line_id' )
              {
                $('#'+param).html('<option value="">All</option>');
                
                $.each(data,function(index,value){
                  $('#'+param).append('<option value="'+value['line_id']+'">'+value['short_form']+'</option> ');
                });
              }
              else if( param =='vehicle_id' )
              {
                $('#'+param).html('<option value="">All</option>');
                
                $.each(data,function(index,value){
                  $('#'+param).append('<option value="'+value['vehicle_id']+'">'+value['vehicle_number']+'</option> ');
                });
              }
              else if( param =='owner_name' )
              {
                $('#'+param).html('<option value="">All</option>');
                
                $.each(data,function(index,value){
                  $('#'+param).append('<option value="'+value['owner_name']+'">'+value['owner_name']+'</option> ');
                });
              }
              else if ( param == 'bank_id' )
              {
                $('#'+param).html('<option value="">Select Bank</option>');
                
                $.each(data,function(index,value){
                  $('#'+param).append('<option value="'+value['bank_id']+'">'+value['short_form']+'</option> ');
                });
              }
              else
              {
                $('#'+param).html('<option value="">All</option>');
                
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

      $(document).on('click','.coa_id,.consignee_id,.line_id,.empty_terminal_id,.from_yard_id,.to_yard_id,.vehicle_id,.container_id,.owner_name,.bank_id', function()
      {
        updateField(''+$(this).attr('para')+'');
      });


  function getWidthOfText(txt) {
    return txt.length ;
  }

    function myDataTable()
    {
    
        // var TableDatatablesButtons=function(){var e=function(){var e=$("#mytable");
        //   e.dataTable({language:{aria:{sortAscending:": activate to sort column ascending",sortDescending:": activate to sort column descending"},emptyTable:"No data available in table",info:"Showing _START_ to _END_ of _TOTAL_ entries",infoEmpty:"No entries found",infoFiltered:"(filtered1 from _MAX_ total entries)",lengthMenu:"_MENU_ entries",search:"Search:",zeroRecords:"No matching records found"},buttons:[{extend:"print",title: 'Vehicle Report',orientation: 'landscape',pageSize: 'LEGAL',exportOptions:{columns: ':visible' , rows: '.selectedd'},className:"btn dark btn-outline"},{extend:"",text :"Summary",className:"btn blue btn-outline summary_btn"},{extend:"excelHtml5",title: 'Vehicle Report',className:"btn yellow btn-outline ",exportOptions:{columns: ':visible' ,  rows: '.selectedd' }},{extend:"colvis",title: 'Vehicle Report',className:"btn green btn-outline",text:"Columns"}],responsive:!0,order:[[0,"asc"]],lengthMenu:[[5,10,15,20,-1],[5,10,15,20,"All"]],pageLength:10,dom:"<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>"})},t=function(){var e=$("#sample_2");e.dataTable({language:{aria:{sortAscending:": activate to sort column ascending",sortDescending:": activate to sort column descending"},emptyTable:"No data available in table",info:"Showing _START_ to _END_ of _TOTAL_ entries",infoEmpty:"No entries found",infoFiltered:"(filtered1 from _MAX_ total entries)",lengthMenu:"_MENU_ entries",search:"Search:",zeroRecords:"No matching records found"},buttons:[{extend:"print",className:"btn default"},{extend:"copy",className:"btn default"},{extend:"pdf",className:"btn default"},{extend:"excel",className:"btn default"},{extend:"csv",className:"btn default"},{text:"Reload",className:"btn default",action:function(e,t,a,n){alert("Custom Button")}}],order:[[0,"asc"]],lengthMenu:[[5,10,15,20,-1],[5,10,15,20,"All"]],pageLength:10,dom:"<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>"})},a=function(){var e=$("#sample_3"),t=e.dataTable({language:{aria:{sortAscending:": activate to sort column ascending",sortDescending:": activate to sort column descending"},emptyTable:"No data available in table",info:"Showing _START_ to _END_ of _TOTAL_ entries",infoEmpty:"No entries found",infoFiltered:"(filtered1 from _MAX_ total entries)",lengthMenu:"_MENU_ entries",search:"Search:",zeroRecords:"No matching records found"},buttons:[{extend:"print",className:"btn dark btn-outline"},{extend:"copy",className:"btn red btn-outline"},{extend:"pdf",className:"btn green btn-outline"},{extend:"excel",className:"btn yellow btn-outline "},{extend:"csv",className:"btn purple btn-outline "},{extend:"colvis",className:"btn dark btn-outline",text:"Columns"}],responsive:!0,order:[[0,"asc"]],lengthMenu:[[5,10,15,20,-1],[5,10,15,20,"All"]],pageLength:10});$("#sample_3_tools > li > a.tool-action").on("click",function(){var e=$(this).attr("data-action");t.DataTable().button(e).trigger()})},n=function(){$(".date-picker").datepicker({rtl:App.isRTL(),autoclose:!0});var e=new Datatable;e.init({src:$("#datatable_ajax"),onSuccess:function(e,t){},onError:function(e){},onDataLoad:function(e){},loadingMessage:"Loading...",dataTable:{bStateSave:!0,lengthMenu:[[10,20,50,100,150,-1],[10,20,50,100,150,"All"]],pageLength:10,ajax:{url:"../demo/table_ajax.php"},order:[[1,"asc"]],buttons:[{extend:"print",className:"btn default"},{extend:"copy",className:"btn default"},{extend:"pdf",className:"btn default"},{extend:"excel",className:"btn default"},{extend:"csv",className:"btn default"},{text:"Reload",className:"btn default",action:function(e,t,a,n){t.ajax.reload(),alert("Datatable reloaded!")}}]}}),e.getTableWrapper().on("click",".table-group-action-submit",function(t){t.preventDefault();var a=$(".table-group-action-input",e.getTableWrapper());""!=a.val()&&e.getSelectedRowsCount()>0?(e.setAjaxParam("customActionType","group_action"),e.setAjaxParam("customActionName",a.val()),e.setAjaxParam("id",e.getSelectedRows()),e.getDataTable().ajax.reload(),e.clearAjaxParams()):""==a.val()?App.alert({type:"danger",icon:"warning",message:"Please select an action",container:e.getTableWrapper(),place:"prepend"}):0===e.getSelectedRowsCount()&&App.alert({type:"danger",icon:"warning",message:"No record selected",container:e.getTableWrapper(),place:"prepend"})}),$("#datatable_ajax_tools > li > a.tool-action").on("click",function(){var t=$(this).attr("data-action");e.getDataTable().button(t).trigger()})};return{init:function(){jQuery().dataTable&&(e(),t(),a(),n())}}}();jQuery(document).ready(function(){TableDatatablesButtons.init()});



        var TableDatatablesButtons=function() 
        {
          var e=function() 
          {
              var e=$("#mytable");
              e.dataTable({
                  language: {
                      aria: {
                          sortAscending: ": activate to sort column ascending", sortDescending: ": activate to sort column descending"
                      }
                      , emptyTable:"No data available in table", info:"Showing _START_ to _END_ of _TOTAL_ entries", infoEmpty:"No entries found", infoFiltered:"(filtered1 from _MAX_ total entries)", lengthMenu:"_MENU_ entries", search:"Search:", zeroRecords:"No matching records found"
                  }
                  , buttons:[ {
                      extend:"print", title: 'Vehicle Report', orientation: 'landscape', pageSize: 'LEGAL', exportOptions: {
                          columns: ':visible', rows: '.selectedd'
                      },className:"btn dark btn-outline",
                      customize: function ( win ) {

                          $(win.document.body)
                              .css( 'font-size', '10pt' )
                              .append('<br/><br/>')
                              .append( $('#mytable2_div').html() );
                              // .append( $('#voucher_div').html() );

                              if( $("#voucher_div").css('display') != 'none' )
                              {
                                $(win.document.body)
                                .append('<br/><br/>')
                                .append('<table class="table table-hover table-light">'+
                                  '<thead>'+
                                    '<tr class="uppercase">'+
                                        '<td> # </td>'+
                                        '<td> Voucher # </td>'+
                                        '<td>'+$('#voucher_number').val()+'</td>'+
                                    '</tr>'+
                                  '</thead>'+
                                  '<tbody>'+
                                      '<tr>'+
                                          '<td> 1 </td>'+
                                          '<td> Date </td>'+
                                          '<td>'+$('#datee').val()+'</td>'+
                                      '</tr>'+
                                      '<tr>'+
                                          '<td> 2 </td>'+
                                          '<td> Payment Method </td>'+
                                          '<td>'+$('input[name="method"]:checked').val()+'</td>'+
                                      '</tr>'+
                                      '<tr>'+
                                          '<td> 3 </td>'+
                                          '<td> Check # </td>'+
                                          '<td>'+$('#check_number').val()+'</td>'+
                                      '</tr>'+
                                      '<tr>'+
                                          '<td> 4 </td>'+
                                          '<td> Bank Name </td>'+
                                          '<td>'+$('#bank_id option:selected').text()+'</td>'+
                                      '</tr>'+
                                      '<tr>'+
                                          '<td> 5 </td>'+
                                          '<td> Amount </td>'+
                                          '<td>'+$('#amount').val()+'</td>'+
                                      '</tr>'+
                                  '</tbody>'+
                                '</table>');
                              }
                      }
                    }
                  , {
                      extend: "", text: "Summary", className: "btn blue btn-outline summary_btn"
                  }
                  , {
                      extend:"excelHtml5", title: 'Vehicle Report', className:"btn yellow btn-outline ", 

                      customize: function (xlsx) {
                        
                        console.log(xlsx);
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        var downrows = 2;
                        var clRow = $('row', sheet);
                        //update Row
                        clRow.each(function () {
                            var attr = $(this).attr('r');
                            var ind = parseInt(attr);
                            ind = ind + downrows;
                            $(this).attr("r",ind);
                        });
                 
                        // Update  row > c
                        $('row c ', sheet).each(function () {
                            var attr = $(this).attr('r');
                            var pre = attr.substring(0, 1);
                            var ind = parseInt(attr.substring(1, attr.length));
                            ind = ind + downrows;
                            $(this).attr("r", pre + ind);
                        });
                 
                        function Addrow(index,data) {
                            msg='<row r="'+index+'">'
                            for(i=0;i<data.length;i++){
                                var key=data[i].k;
                                var value=data[i].v;
                                msg += '<c t="inlineStr" r="' + key + index + '" s="42">';
                                msg += '<is>';
                                msg +=  '<t>'+value+'</t>';
                                msg+=  '</is>';
                                msg+='</c>';
                            }
                            msg += '</row>';
                            return msg;
                        }
                 
                        //insert
                        var r1 = Addrow(1, [{ k: 'A', v: 'TOTAL TRIPS' }, { k: 'B', v: "Advance Taken Driver or All" }, { k: 'C', v: "Advance Taken Owner " }, { k: 'D', v: "Balance Total of all trips" } , { k: 'E', v: "Diesel" } , { k: 'F', v: "Repair and Maintenance" } , { k: 'G', v: "Driver Salary" } , { k: 'H', v: 'Paid' } , { k: 'I', v: "Total Balance" } ]);
                        var r2 = Addrow(2, [{ k: 'A', v: $('#total_trips').html() }, { k: 'B', v: $('#advance_taken').html() }, { k: 'C', v: $('#advance_taken_owner').html() }, { k: 'D', v: $('#balance_trips').html() }, { k: 'E', v: $('#total_diesel').html() }, { k: 'F', v: $('#total_rm').html() }, { k: 'G', v: $('#driver_salary').html() }, { k: 'H', v: $('#paid_salary').html() }, { k: 'I', v: $('#total_balance').html() } ]);
                        var r3 = Addrow(3, [{ k: 'A', v: '' }, { k: 'B', v: '' }, { k: 'C', v: '' },{ k: 'D', v: '' },{ k: 'E', v: '' },{ k: 'F', v: '' },{ k: 'G', v: '' },{ k: 'H', v: '' },{ k: 'I', v: '' }]);
                        //var r4 = Addrow(4, [{ k: 'A', v: '' }, { k: 'B', v: '' }, { k: 'C', v: '' },{ k: 'D', v: '' },{ k: 'E', v: '' },{ k: 'F', v: '' },{ k: 'G', v: '' },{ k: 'H', v: '' },{ k: 'I', v: '' } ]);
                        
                        sheet.childNodes[0].childNodes[1].innerHTML = r1 + r2 + r3 + sheet.childNodes[0].childNodes[1].innerHTML;
                      
                      },

                      exportOptions: {
                          columns: ':visible', rows: '.selectedd'
                      }

                  }
                  , {
                      extend: "colvis", title: 'Vehicle Report', className: "btn green btn-outline", text: "Columns"
                  }
                  ],order:[[0, "asc"]], lengthMenu:[[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]], pageLength:10, dom:"<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
              })
          }
          //responsive:!0,
   
          return{init:function(){jQuery().dataTable&&(e())}}}();jQuery(document).ready(function(){TableDatatablesButtons.init()});

    }

    myDataTable();

    function loadData(from_datee,to_datee,from_yard_id,to_yard_id,coa_id,consignee_id,movement,empty_terminal_id,container_number,bl_cro_number,container_size,container_id,vehicle_id,owner_name,line_id)
    {
        $.ajax({
            url:'ajax/vehicle/detailed_fetch.php?from_datee='+from_datee+'&to_datee='+to_datee+'&from_yard_id='+from_yard_id+'&to_yard_id='+to_yard_id+'&coa_id='+coa_id+'&consignee_id='+consignee_id+'&movement='+movement+'&empty_terminal_id='+empty_terminal_id+'&container_number='+container_number+'&bl_cro_number='+bl_cro_number+'&container_size='+container_size+'&container_id='+container_id+'&vehicle_id='+vehicle_id+'&owner_name='+owner_name+'&line_id='+line_id,
            dataType:"JSON",
            success:function(data)
            {
                var n = 1,
                    i = 0,
                    total_trips = 0,
                    balance_trips = 0,
                    total_diesel = 0;

                $('#mytable').DataTable().destroy();
                $('#mytable tbody').html("");
                
                $.each(data,function(index,value){

                    balance_trips +=  value['balance']/1;
                    total_diesel  +=  value['diesel']/1;

                    $('#mytable tbody').append('<tr class="odd gradeX selectedd" index="'+i+'">'+
                            
                            '<td>'+
                              '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">'+
                                  '<input type="checkbox" class="checkboxes" value="1" />'+
                                  '<span></span>'+
                              '</label>'+
                            '</td>'+

                            '<td>'+n+'</td>'+
                            '<td>'+value['transaction_id']+'</td>'+
                            '<td>'+value['datee']+'</td>'+
                            '<td id="'+value['coa_id']+'">'+value['coa']+'</td>'+
                            '<td id="'+value['empty_terminal_id']+'">'+value['empty_terminal']+'</td>'+
                            '<td id="'+value['from_yard_id']+'">'+value['from_yard']+'</td>'+
                            '<td id="'+value['to_yard_id']+'">'+value['to_yard']+'</td>'+
                            '<td>'+value['movement']+'</td>'+
                            '<td>'+value['container_number']+'</td>'+
                            '<td>'+value['container_size']+'</td>'+
                            '<td>'+value['container_type']+'</td>'+
                            '<td id="'+value['line_id']+'">'+value['line']+'</td>'+
                            '<td>'+value['bl_cro_number']+'</td>'+
                            '<td id="'+value['vehicle_id']+'">'+value['vehicle_number']+'</td>'+
                            '<td>'+value['driver_name']+'</td>'+
                            '<td id="owner_name">'+value['owner_name']+'</td>'+
                            '<td>'+value['rent']+'</td>'+
                            '<td>'+value['advance']+'</td>'+
                            '<td>'+value['diesel']+'</td>'+
                            '<td>'+value['mr_charges']+'</td>'+
                            '<td name="balance_trips">'+value['balance']+'</td>'+
                            '<td contenteditable="true">'+value['remarks']+'</td>'+
                            '</tr>');

                    n++; total_trips++; i++;
                });
	
                myDataTable();
                // $('#total_amount').html(getTotal('total_amount'));

                $('#total_trips').html(total_trips);
                $('#balance_trips').html(balance_trips);
                $('#total_diesel').html(total_diesel);

                getRecords(from_datee,to_datee,vehicle_id);

                //Voucher Form
                if( data !=null && vehicle_id!=0 )
                {
                    if( $('#owner_name').html() == 'butt brothers' )
                    {
                        $('#voucher_div').hide();
                    }
                    else
                    {
                        $('#voucher_div').show();
                    }
                }
                else
                {
                    $('#voucher_div').hide();
                } 
            },
            error:function(){ alertMessage("Failed Fetch Ajax Call.",'error') }
        });
    }

    function getSelectedRecords()
    {
      var tableData     = $('#mytable').Datatable().rows().data(),
          total_trips   = 0,
          balance_trips = 0,
          total_diesel  = 0,
          total_rm      = 0,
          index         = 0; 
                
      for(index ; index <= tableData.length ; index++ )
      {
          // total_trips   += tableData[17];
          total_diesel  += tableData[18];
          balance_trips += tableData[19]; //continue
      }

      $('#total_trips').html(tableData.length);
      $('#balance_trips').html(balance_trips);
      $('#total_diesel').html(total_diesel);
      $('#total_rm').html(total_rm);

      calculations();        
    }

    function calculations(){
      // alert( "advance taken owner="+$('#advance_taken_owner').html()+ " advance taken"+ $('#advance_taken').html() + " total diesel = " + $('#total_diesel').html() + " total repair maintenance =  " + $('#total_rm').html() );

      $('#total_balance').html( $('#balance_trips').html()/1 - ( $('#advance_taken_owner').html()/1 + $('#advance_taken').html()/1 + $('#total_diesel').html()/1 + $('#total_rm').html()/1 ) );
    }
 
    function loadSummary(from_datee,to_datee,empty_terminal_id,from_yard_id,to_yard_id,coa_id,movement,line_id)
    {
        
        var ids = [],
            tableData = $('#mytable').DataTable().rows().data();
            
        
        for(var index = 0 ; index < tableData.length ; index++ )
        {
          var table     = $('#mytable').DataTable(),
              row       = table.row(index),
              rowData   = row.data(),  
              $tr       = $(row.node()),
              $checkbox = $tr.find('td:first-child input[type="checkbox"]');
          
          if($checkbox.is(':checked'))
          {
            // $checkbox.prop('checked', false);
            ids.push( rowData[2] );
          }

          // if( cb.hasClass('faded') )
          // {
          //   ids.push( rowData[2] );
          // }

        }

        // alert("ids are "+ids);


        $.ajax({
            url:'ajax/container_movement/summary.php?from_datee='+from_datee+'&to_datee='+to_datee+'&empty_terminal_id='+empty_terminal_id+'&from_yard_id='+from_yard_id+'&to_yard_id='+to_yard_id+'&coa_id='+coa_id+'&movement='+movement+'&line_id='+line_id,
            dataType:"JSON",
            data:{ids:ids},
            success:function(data){
                var n = 1,
                    lolo_total = 0,
                    m20_total  = 0,
                    m40_total  = 0,
                    m45_total  = 0,
                    vr_total   = 0;

    
                $('#mytable1 tbody').html("");
                
                var t = $.each(data,function(index,value){

                  if( value['20']==0 && value['40']==0 && value['45']==0)
                  {
                    return;
                  }
                    lolo_total += value['lolo_charges']/1;
                    m20_total  += value['20'];
                    m40_total  += value['40'];
                    m45_total  += value['45'];
                    vr_total   += value['hr_total']; 

                    $('#mytable1 tbody').append('<tr class="odd gradeX">'+                      

                            '<td style="color:#000;">'+n+'</td>'+
                            '<td id="'+value['coa_id']+'">'+value['coa']+'</td>'+
                            '<td id="'+value['empty_terminal_id']+'">'+value['empty_terminal']+'</td>'+
                            '<td id="'+value['from_yard_id']+'">'+value['from_yard']+'</td>'+
                            '<td id="'+value['to_yard_id']+'">'+value['to_yard']+'</td>'+
                            '<td>'+value['movement']+'</td>'+
                            '<td id="'+value['line_id']+'">'+value['line']+'</td>'+
                            '<td>'+value['lolo_charges']+'</td>'+
                            '<td>'+value['20']+'</td>'+
                            '<td>'+value['40']+'</td>'+
                            '<td>'+value['45']+'</td>'+
                            '<td>'+value['hr_total']+'</td>'+
                            
                            '</tr>');

                    n++; 
                }); //END OF EACH


                $.when(t).done(function(){

                    $('#mytable1 tbody').append('<tr class="odd gradeX">'+                      

                            '<td></td>'+
                            '<td></td>'+
                            '<td></td>'+
                            '<td></td>'+
                            '<td></td>'+
                            '<td></td>'+
                            '<td>Total</td>'+
                            '<td>'+lolo_total+'</td>'+
                            '<td>'+m20_total+'</td>'+
                            '<td>'+m40_total+'</td>'+
                            '<td>'+m45_total+'</td>'+
                            '<td>'+vr_total+'</td>'+
                            
                            '</tr>');
                });

                 printPDF();

                
            },
            error:function(){ alertMessage("Failed Fetch Summary Ajax Call.",'error') }
        });
    }

    function getTotal(name)
    {
        var sum = 0,
            value = null;

        $('td[name="'+name+'"]').each(function(){
            value = $(this).text()/1;

            if( !isNaN(value) && value != null )
            {
                sum +=value; 
            }
        });

        return sum;
    }

    function getRecords(from_datee,to_datee,vehicle_id)
    {
        $.ajax({
            url:'ajax/vehicle/vehicle_records.php?from_datee='+from_datee+'&to_datee='+to_datee+'&vehicle_id='+vehicle_id,
            dataType:"JSON",
            success: function(data){
                
                $.each(data,function(index,value){
                    $('#advance_taken').html(value['total_remaining_advance']);
                    $('#advance_taken_owner').html(value['total_remaining_advance_owner']);
                    // $('#total_diesel').html(value['total_de_amount']);
                    $('#total_rm').html(value['total_rm_amount']);
                    $('#driver_salary').html(value['total_driver_salary']);
                    $('#paid_salary').html(value['total_paid_salary']);

                    calculations();
                });
            },
            error: function(){ alertMessage("Failed Fetch Records.",'error') }, 
        });
    }

    function add(vehicle_id,datee,method,check_number,bank_id,amount)
    {
        $.ajax({
            url:'ajax/vehicle/voucher_add.php?vehicle_id='+vehicle_id+'&datee='+datee+'&method='+method+'&check_number='+check_number+'&bank_id='+bank_id+'&amount='+amount,
            type:"POST",
            success:function(data){
                if(data)
                {
                    $('#btn_reset').trigger('click');
                    
                    $('#form').trigger('submit');
                }
            },
            error:function(){ alertMessage("Error in Add Ajax Call.",'error') }
        });
    }

    var from_date          = null,
        to_date            = null,
        empty_terminal_idd = null,
        from_yard_idd      = null,
        to_yard_idd        = null,
        coa_idd            = null,
        movementt          = null,
        line_idd           = null;
    
    //Add & Update expense 
    $('#form').submit(function(e){
       e.preventDefault();
       
        var from_datee = $('#from_datee').val() ,
            to_datee = $('#to_datee').val() ,
            from_yard_id = $('#from_yard_id').val(),
            to_yard_id = $('#to_yard_id').val(),
            coa_id = $('#coa_id').val(),
            consignee_id = $('#consignee_id').val(),
            movement = $('#movement').val(),
            empty_terminal_id = $('#empty_terminal_id').val(),
            container_number = $('#container_number').val(),
            bl_cro_number = $('#bl_cro_number').val(),
            container_size = $('#container_size').val(),
            container_id = $('#container_id').val(),
            vehicle_id = $('#vehicle_id').val(),
            owner_name = $('#owner_name').val(),
            line_id = $('#line_id').val();


        loadData(from_datee,to_datee,from_yard_id,to_yard_id,coa_id,consignee_id,movement,empty_terminal_id,container_number,bl_cro_number,container_size,container_id,vehicle_id,owner_name,line_id);

        from_date          = from_datee;
        to_date            = to_datee;
        empty_terminal_idd = empty_terminal_id;
        from_yard_idd      = from_yard_id;
        to_yard_idd        = to_yard_id;
        coa_idd            = coa_id;
        movementt          = movement;
        line_idd           = line_id;
        // loadSummary(from_datee,to_datee,from_yard_id,to_yard_id,coa_id,movement);

    });

    //Add voucher
    $('#voucher_form').submit(function(e){
       e.preventDefault();
       
       var datee = $('#datee').val() ,
           method = $('input[name="method"]:checked').val() ,
           check_number = $('#check_number').val() ,
           bank_id = $('#bank_id').val() ,
           amount = $('#amount').val(),
           vehicle_id = $('#vehicle_id').val();

        add(vehicle_id,datee,method,check_number,bank_id,amount);   

    });

    function printPDF() {
      // var doc = new jsPDF('p', 'pt');
      var doc = new jsPDF('l', 'mm', [297, 220]);
      // var doc = new jsPDF('p', '');
      doc.setFontSize(12);
      doc.setFontStyle('bold');
      var elem = document.getElementById("mytable1");
      var res = doc.autoTableHtmlToJson(elem);

      var elem1 = document.getElementById("mytable2");
      var res1 = doc.autoTableHtmlToJson(elem1);

      var text = 'Transaction Container Movement From Date '+from_date+' To Date '+to_date,
      // xOffset = (doc.internal.pageSize.width/2 ) - (doc.getStringUnitWidth(text) * doc.internal.getFontSize() / 2)
      xOffset = (doc.internal.pageSize.width/2 ) - (doc.getStringUnitWidth(text) * 2.3); 
      doc.text(text, xOffset, 20); 
      
      doc.autoTable(res.columns, res.data,{startY: 50 , theme: 'grid'});
      doc.autoTable(res1.columns, res1.data,{startY: 50 , theme: 'grid' , startY: doc.autoTableEndPosY() + 50});
      doc.save("Vehicle Summary.pdf");
    }

    $(document).on('click','.summary_btn',function() {

      // loadSummary(from_date,to_date,from_yard_idd,to_yard_idd,coa_idd,movementt);
      loadSummary(from_date,to_date,empty_terminal_idd,from_yard_idd,to_yard_idd,coa_idd,movementt,line_idd);
      // printPDF();
    });

 });
</script> 