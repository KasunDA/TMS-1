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
                <div class="col-md-6">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-red-sunglo">
                                <i class="icon-settings font-red-sunglo"></i>
                                <span class="caption-subject bold uppercase"><?php $text = isset($_SESSION['disable_btn'])?'View':'Add New'; echo $text; ?> Expenses:</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                           <?php
                                if(!isset($_SESSION['disable_btn']) )
                                {?>
                            <form class="form-horizontal" role="form" id="expense_form" method="post">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="form-group">
                                            <div id="expense_id_div" class="hidden">
                                                  <label class="col-md-4 control-label">ID:</label>
                                                  <div class="col-md-5">
                                                    <input type="text" class="form-control" id="expense_id" name="expense_id" required readonly >
                                                  </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"> 
                                        <div class="form-group">  
                                            <label class="col-md-4 control-label">Date:</label>
                                            <div class="col-md-5">
                                              <input type="date" class="form-control" id="datee" name="datee" value="<?php echo date('Y-m-d'); ?>" required tabindex="1" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Description:</label>
                                            <div class="col-md-5">
                                               <select class="form-control" name="dd_id" id="dd_id" required tabindex="2">
                                                         <option value="">Select Description</option>
                                                         <?php 

                                                          $q = mysqli_query($mycon,'SELECT dd_id,name from daily_description where status=1 and dd_id NOT IN (5,6,7,8) ORDER BY dd_id DESC');

                                                          while( $r = mysqli_fetch_array($q) )
                                                            {?>
                                                              <option value="<?php echo $r['dd_id']; ?>"><?php echo $r['name']; ?></option>
                                                          <?php } //END OF WHILE ?>
                                                          
                                                     </select>
                                                    
                                                
                                            </div>

                                            <div class="col-md-1">

                                              <button class="btn btn-xs green dd_id" para="dd_id"  type="button">
                                              
                                                <i class="fa fa-refresh"></i>
                                              
                                              </button>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Payment Method</label>
                                            <div class="col-md-5">
                                                <div class="mt-radio-list">
                                                    <label class="mt-radio">
                                                        <input type="radio" name="method" id="optionsRadios22" value="cash" checked tabindex="3"> Cash 
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio">
                                                        <input type="radio" name="method" id="optionsRadios23" value="check" tabindex="4"> Check
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="hidden" id="check_number_div">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Check No.</label>
                                            <div class="col-md-5">
                                               <input type="number" name="check_number" min="0" id="check_number" tabindex="5" class="form-control" placeholder="5033554">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Bank Name</label>
                                            <div class="col-md-5">
                                               <select class="form-control" id="bank_id" name="bank_id" tabindex="6">
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
                                               <input type="number" min="0.01" step="0.01" name="amount" id="amount" required tabindex="7" class="form-control" placeholder="58680">
                                            </div>
                                        </div>
                                        <div class="form-group hidden" id="bike_id_div">
                                            <label class="col-md-4 control-label">Bike #:</label>
                                            <div class="col-md-5">
                                                <select class="form-control" id="bike_id" name="bike_id"  tabindex="8" >
                                                    <option value="">Select Bike</option>
                                                      <?php 

                                              $q = mysqli_query($mycon,'SELECT bike_id,bike_number from bike where status=1 ORDER BY bike_id DESC');

                                              while( $r = mysqli_fetch_array($q) )
                                                {?>
                                                  <option value="<?php echo $r['bike_id']; ?>"><?php echo $r['bike_number']; ?></option>
                                              <?php } //END OF WHILE ?>
                                                  </select>
                                            </div>

                                            <div class="col-md-1">

                                              <button class="btn btn-xs green bike_id" para="bike_id"  type="button">
                                              
                                                <i class="fa fa-refresh"></i>
                                              
                                              </button>

                                            </div>
                                        </div>
                                        
                                        <div class="form-group hidden" id="vb_select_div">
                                          <label class="col-md-4 control-label">Vehicle OR Borrower:</label>
                                          <div class="col-md-5">
                                                <select class="form-control" id="vb_select" name="vb_select"  tabindex="8" >
                                                    <option value="1">Vehicle</option>
                                                    <option value="2">Borrower</option>
                                                  </select>
                                            </div>
                                        </div>

                                        <div class="form-group hidden" id="borrower_div">
                                            <label class="col-md-4 control-label">Borrower:</label>
                                            <div class="col-md-5">
                                                <select class="form-control" id="borrower_id" name="borrower_id"  tabindex="9" >
                                                    <option value="">Select Borrower</option>
                                                      <?php 

                                              $q = mysqli_query($mycon,'SELECT borrower_id,name from borrower where status=1 ORDER BY borrower_id DESC');

                                              while( $r = mysqli_fetch_array($q) )
                                                {?>
                                                  <option value="<?php echo $r['borrower_id']; ?>"><?php echo $r['name']; ?></option>
                                              <?php } //END OF WHILE ?>
                                                  </select>
                                            </div>

                                            <div class="col-md-1">

                                              <button class="btn btn-xs green borrower_id" para="borrower_id"  type="button">
                                              
                                                <i class="fa fa-refresh"></i>
                                              
                                              </button>

                                            </div>
                                        </div>
  
                                        <div class="form-group hidden" id="vn_div">
                                            <label class="col-md-4 control-label">Vehicle #:</label>
                                            <div class="col-md-5">
                                                <select class="form-control" id="vehicle_id" name="vehicle_id"  tabindex="9" >
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
                                        </div>
                                    
                                    
                                        <div class="form-group hidden" id="name_div">
                                            <label class="col-md-4 control-label">Name:</label>
                                            <div class="col-md-5">
                                                <select class="form-control" id="name" name="name"  tabindex="10">
                                                </select>
                                            </div>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Description:</label>
                                            <div class="col-md-5">
                                               <textarea class="form-control" name="description" id="description" rows="4" tabindex="11"  placeholder="Text Here"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-5 col-md-push-4">
                                                <div class="">
                                                    <button type="submit" class="btn blue" id="btn_submit" tabindex="12">Submit</button> 
                                                    <button type="reset" class="btn default" id="btn_reset" tabindex="13">Cancel</button>

                                                    <button type="submit" class="btn blue hidden" id="update_form_btn" tabindex="12">Update</button>
                                                    <button type="button" class="btn default hidden"  id="add_new" tabindex="13">Add New</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php }//END OF IF?> 
                        </div>
                        <!-- Form ends -->
                        <!-- end table -->
                        
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-red-sunglo">
                                <i class="icon-settings font-red-sunglo"></i>
                                <span class="caption-subject bold uppercase"><?php $text = isset($_SESSION['disable_btn'])?'View':'Add New'; echo $text; ?> Income:</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                           <?php
                                if(!isset($_SESSION['disable_btn']) )
                                {?>
                            <form class="form-horizontal" id="income_form" role="form" method="post">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="form-group">
                                            <div id="income_id_div" class="hidden">
                                                  <label class="col-md-4 control-label">ID:</label>
                                                  <div class="col-md-5">
                                                    <input type="text" class="form-control" id="income_id" name="income_id" required readonly >
                                                  </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"> 
                                        <div class="form-group">

                                            <label class="col-md-4 control-label">Date:</label>
                                            <div class="col-md-5">
                                              <input type="date" class="form-control" id="idatee" name="idatee" value="<?php echo date('Y-m-d'); ?>" required tabindex="" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Description:</label>
                                            <div class="col-md-5">
                                                <select class="form-control" name="idd_id" id="idd_id" required tabindex="">
                                                         <option value="">Select Description</option>
                                                         <?php 

                                                          $q = mysqli_query($mycon,'SELECT dd_id,name from daily_description where status=1 and dd_id NOT IN (5,6,7,8) ORDER BY dd_id DESC');

                                                          while( $r = mysqli_fetch_array($q) )
                                                            {?>
                                                              <option value="<?php echo $r['dd_id']; ?>"><?php echo $r['name']; ?></option>
                                                          <?php } //END OF WHILE ?>
                                                          
                                                     </select>

                                            </div>

                                            <div class="col-md-1">

                                              <button class="btn btn-xs green idd_id" para="idd_id"  type="button">
                                              
                                                <i class="fa fa-refresh"></i>
                                              
                                              </button>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Payment Method</label>
                                            <div class="col-md-5">
                                                <div class="mt-radio-list">
                                                    <label class="mt-radio">
                                                        <input type="radio" name="imethod" id="optionsRadios22" value="cash" checked tabindex=""> Cash 
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio">
                                                        <input type="radio" name="imethod" id="optionsRadios23" value="check" tabindex=""> Check
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="hidden" id="icheck_number_div">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Check No.</label>
                                            <div class="col-md-5">
                                               <input type="number" name="icheck_number" min="0" id="icheck_number" tabindex="" class="form-control" placeholder="5033554">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Bank Name</label>
                                            <div class="col-md-5">
                                               <select class="form-control" id="ibank_id" name="ibank_id" tabindex="">
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

                                              <button class="btn btn-xs green ibank_id" para="ibank_id"  type="button">
                                              
                                                <i class="fa fa-refresh"></i>
                                              
                                              </button>

                                            </div>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Amount</label>
                                            <div class="col-md-5">
                                               <input type="number" min="0.01" step="0.01" name="iamount" id="iamount" required tabindex="" class="form-control" placeholder="58680">
                                            </div>
                                        </div>
                                        <div class="form-group" style="display: none;" id="cmp_id_div">
                                            <label class="col-md-4 control-label">Company</label>
                                            <div class="col-md-5">
                                               <select class="form-control" id="cmp_id" name="cmp_id" tabindex="">
                                                    <option value="">Select Company</option>
                                                    <?php 

                                                      $q = mysqli_query($mycon,'SELECT * from company where status=1 ORDER BY cmp_id DESC');

                                                      while( $r = mysqli_fetch_array($q) )
                                                        {?>
                                                        <option value="<?php echo $r['cmp_id']; ?>"><?php echo $r['name']; ?></option>
                                                  <?php } //END OF WHILE ?>
                                                    
                                                </select>
                                            </div>

                                            <div class="col-md-1">

                                              <button class="btn btn-xs green cmp_id" para="cmp_id"  type="button">
                                              
                                                <i class="fa fa-refresh"></i>
                                              
                                              </button>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Description:</label>
                                            <div class="col-md-5">   
                                               <textarea class="form-control" name="idescription" id="idescription" rows="4" tabindex=""  placeholder="Text Here"></textarea>
                                            
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-5 col-md-push-4">
                                                <div class="">
                                                    <button type="submit" class="btn blue" id="ibtn_submit" tabindex="">Submit</button> 
                                                    <button type="reset" class="btn default" id="ibtn_reset" tabindex="">Cancel</button>

                                                    <button type="submit" class="btn blue hidden" id="iupdate_form_btn" tabindex="">Update</button>
                                                    <button type="button" class="btn default hidden" id="iadd_new" tabindex="">Add New</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php }//END OF IF?> 
                        </div>
                        <!-- Form ends -->
                        <!-- end table -->
                        
                    </div> 
                </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-red-sunglo">
                                <i class="icon-settings font-red-sunglo"></i>
                                <span class="caption-subject bold uppercase"><?php $text = isset($_SESSION['disable_btn'])?'View':'Update Entries'; echo $text; ?> Current Date:</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                           <?php
                                if(!isset($_SESSION['disable_btn']) )
                                {?>
                            <form class="form-horizontal" id="exin_form" role="form" method="post">
                                <div class="form-body">
                                    <div class="row">
                                      <?php
                                        $q = mysqli_query($mycon,"SELECT * from exin");
                                        $r = mysqli_fetch_array($q);
                                      ?>
                                        <div class="form-group">
                                            <div id="exin_id_div" class="hidden">
                                                  <label class="col-md-4 control-label">ID:</label>
                                                  <div class="col-md-5">
                                                    <input type="text" class="form-control" id="exin_id" name="exin_id" required readonly value="<?php echo $r['exin_id']; ?>" >
                                                  </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"> 
                                        <div class="form-group">

                                            <label class="col-md-4 control-label">Date:</label>
                                            <div class="col-md-5">
                                              <input type="date" class="form-control" id="exin_datee" name="exin_datee" value="<?php echo $r['datee']; ?>" required tabindex="" />
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-md-5 col-md-push-4">
                                                <div class="">
                                                    <button type="submit" class="btn blue" id="" tabindex="">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php }//END OF IF?> 
                        </div>
                        <!-- Form ends -->
                        <!-- end table -->
                        
                    </div> 
                </div>
            </div>
            <div class="row">
                 <div class="col-md-6">
                     <!-- BEGIN EXAMPLE TABLE PORTLET-->
                     <div class="portlet light bordered">
                         <div class="portlet-title">
                             <div class="caption font-green">
                                 <i class="icon-settings font-green"></i>
                                 <span class="caption-subject bold uppercase">Detailed Report</span>
                             </div>
                             <!-- <div class="tools">
                                 <a href="" class="expand"> </a>
                             </div> -->
                             <img src="ajax/loading.gif" id="loading" style="margin-left: 22%; display: none;" height="40" width="40" >
                         </div>
                         <div class="portlet-body table-both-scroll" > <!-- style="display: none;" -->
                             <table class="table table-striped table-bordered table-hover table-checkable order-column" id="mytable">
                                 <thead>
                                     <tr>
                                         <th></th>
                                         <th> # </th>
                                         <th> Date </th>
                                         <th> Daily Description  </th>
                                         <th> Method </th>
                                         <th> Check # </th>
                                         <th> Bank Name </th>
                                         <th> Amount </th>
                                         <th> Vehicle # </th>
                                         <th> Name </th>
                                         <th> Bike # </th>
                                         <th> Borrower Name </th>
                                         <th> Description </th>    
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <!-- <tr class="odd gradeX">
                                         <td> 15 </td>
                                         <td> 02/3/2018 </td>
                                         <td> DPWM-1 </td>
                                         <td> QICT </td>
                                         <td> EMPTY </td>
                                         <td> PCT-PQ </td>
                                         <td> MRKU4990688 </td>
                                         <td> 40 </td>
                                         <td> N/A </td>
                                         <td> JT8685 </td>
                                     </tr> -->
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-6">
                     <!-- BEGIN EXAMPLE TABLE PORTLET-->
                     <div class="portlet light bordered">
                         <div class="portlet-title">
                             <div class="caption font-green">
                                 <i class="icon-settings font-green"></i>
                                 <span class="caption-subject bold uppercase">Detailed Report</span>
                             </div>
                             <!-- <div class="tools">
                                 <a href="" class="expand"> </a>
                             </div> -->

                             <img src="ajax/loading.gif" id="iloading" style="margin-left: 22%; display: none;" height="40" width="40" >

                         </div>
                         <div class="portlet-body table-both-scroll" >  <!-- style="display: none;" -->
                             <table class="table table-striped table-bordered table-hover table-checkable order-column" id="imytable">
                                 <thead>
                                     <tr>
                                         <th></th>
                                         <th> # </th>
                                         <th> Date </th>
                                         <th> Daily Description  </th>
                                         <th> Method </th>
                                         <th> Check # </th>
                                         <th> Bank Name </th>
                                         <th> Amount </th>
                                         <th> Company Name </th>
                                         <th> Description </th>    
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
                <div class="col-md-6 col-md-push-6">
                    <!-- BEGIN BORDERED TABLE PORTLET-->
                    <div class="portlet light portlet-fit bordered ">
                        
                        <div class="portlet-body ">
                            <div class="table-scrollable  table-scrollable-borderless">
                                <table class="table table-hover table-light">
                                    <thead>
                                        <tr class="uppercase">
                                            <td> # </td>
                                            <td> Last Balance</td>
                                            <th id="previous_balance"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="uppercase">
                                            <td> 1 </td>
                                            <td> Today Income </td>
                                            <td id="total_income"></td>
                                        </tr>
                                        <tr>
                                            <td> 2 </td>
                                            <td> Today Expenses </td>
                                            <td id="total_expense"></td>
                                        </tr>
                                        <tr>
                                            <td> 3 </td>
                                            <td> Balance </td>
                                            <td id="balance"></td>
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

<script src="../assets/global/scripts/select2.full.min.js"></script>
<script type="text/javascript">
 
$(document).ready(function(){

  $('#btn_reset').click(function(e){
    $('#dd_id').val("").trigger('change');
    bchide(); //allhide(); bikehide();
  });

  $('#ibtn_reset').click(function(e){
    $('#idd_id').val("").trigger('change');
    ibchide(); //allhide(); bikehide();
  });

    function getPreviousBalance()
    {
       $.ajax({
            url:'ajax/get_previous_balance.php',
            dataType:"JSON",
            success:function(data){
              
              $('#previous_balance').html(data['previous_balance']);
              $('#total_income').html(data['total_income']);
              $('#total_expense').html(data['total_expense']);
              $('#balance').html(data['balance']);
            },
            error:function(){ alertMessage("Failed Get Previous Balance Fetch Ajax Call.",'error') }
        });
    }

    function bikeshow()
    {
        $('#bike_id_div').removeClass('hidden');
        $('#bike_id').attr('required', 'required');
    }

    function bikehide()
    {
        $('#bike_id_div').addClass('hidden');  
        $('#bike_id').removeAttr('required'); 
        $('#bike_id').val('').trigger('change'); 
    }

    function vehicleshow()
    {
        $('#vn_div').removeClass('hidden');
        $('#vehicle_id').attr('required', 'required');
    }

    function vehiclehide()
    {
        $('#vn_div').addClass('hidden');   
        $('#vehicle_id').removeAttr('required');
        $('#vehicle_id').val('').trigger('change');
    }

    function borrowershow()
    {
        $('#borrower_div').removeClass('hidden');
        $('#borrower_id').attr('required', 'required');
    }

    function borrowerhide()
    {
        $('#borrower_div').addClass('hidden');   
        $('#borrower_id').removeAttr('required');
        $('#borrower_id').val('').trigger('change');
    }

    function vbshow()
    {
      $('#vb_select_div').removeClass('hidden');
    }

    function vbhide()
    {
      $('#vb_select_div').addClass('hidden');   
    }

    function nameshow()
    {
      $('#name_div').removeClass('hidden');   
      $('#name').attr('required', 'required');
    }

    function namehide()
    {
      $('#name_div').addClass('hidden');   
      $('#name').removeAttr('required');
      $('#name').val('').trigger('change');
    }

    function allshow()
    {
      $('#name_div,#vn_div').removeClass('hidden'); 
      $('#vehicle_id,#name').attr('required', 'required');  
    }

    function allhide()
    {
        $('#name_div,#vn_div').addClass('hidden');      
        $('#vehicle_id,#name').removeAttr('required'); 
        $('#vehicle_id,#name').val('').trigger('change'); 
    }

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

    $('#dd_id').change(function(){

        var dd_id = $(this).val();

        if( dd_id == 1 )
        {
            vbhide(); borrowerhide();
            allhide();
            bikehide();
        }
        else if( dd_id == 2 )
        {
            allshow();
            vbshow();
            bikehide();
        }
        else if( dd_id == 3 )
        {
            bikeshow();
            allhide();
            vbhide(); borrowerhide();
        }
        else if( dd_id == 4 )
        {
            vbhide(); borrowerhide();
            vehicleshow();
            namehide();
            bikehide();
        }
        else
        {
            vbhide(); borrowerhide();
            allhide();
            bikehide();
        }
    });

    $('#vb_select').change(function(){
      if($(this).val() == 1)
      {
        allshow();
        borrowerhide();
      }
      else
      {
        allhide();
        borrowershow();
      }
    });

    function cmpshow()
    {
      $('#cmp_id_div').show();
      $('#cmp_id').attr('required','required'); 
    }

    function cmphide()
    {
      $('#cmp_id_div').hide();
      $('#cmp_id').val('').trigger('change');
      $('#cmp_id').removeAttr('required');
    }

     $('#idd_id').change(function(){
        var idd_id = $(this).val();

        if( idd_id == 2 )
        {
          cmpshow();
        }
        else
        {
          cmphide();
        }
     });

    $('#vehicle_id').change(function(){

        var vehicle_id = $(this).val();

        $.ajax({
            url:'ajax/expenses/getname.php?vehicle_id='+vehicle_id,
            dataType:'JSON',
            success:function(data){
                
                $('#name').html('');
                if( data['owner_name'] != '' && data['driver_name'] != '' )
                {
                  $('#name').html('<option value=""> Select Name </option>'+
                      '<option value="'+data['owner_name']+'"> '+data['owner_name']+' </option>'+
                      '<option value="'+data['driver_name']+'"> '+data['driver_name']+' </option>');  

                  if( $('#expense_form').hasClass('update_form') )
                    $('#name').val( $('.selectedd').find('td').eq(9).text() ).trigger('change');
                }
                else
                  $('#name').html('<option value=""> Select Name </option>');
                
            },
            error:function(){ alertMessage(' Failed Ajax Call Get Names.','error'); },
        })
         
    });

    function myDataTable()
    {
        var e=$("#mytable");
        e.dataTable({language:{aria:{sortAscending:": activate to sort column ascending",sortDescending:": activate to sort column descending"},emptyTable:"No data available in table",info:"Showing _START_ to _END_ of _TOTAL_ records",infoEmpty:"No records found",infoFiltered:"(filtered1 from _MAX_ total records)",lengthMenu:"Show _MENU_",search:"Search:",zeroRecords:"No matching records found",paginate:{previous:"Prev",next:"Next",last:"Last",first:"First"}},bStateSave:!0,columnDefs:[{targets:0,orderable:!1,searchable:!1}],lengthMenu:[[5,15,20,-1],[5,15,20,"All"]],pageLength:5,pagingType:"bootstrap_full_number",columnDefs:[{orderable:!1,targets:[0]},{searchable:!1,targets:[0]}],order:[[1,"asc"]]});
    }

    function imyDataTable()
    {
        var e=$("#imytable");
        e.dataTable({language:{aria:{sortAscending:": activate to sort column ascending",sortDescending:": activate to sort column descending"},emptyTable:"No data available in table",info:"Showing _START_ to _END_ of _TOTAL_ records",infoEmpty:"No records found",infoFiltered:"(filtered1 from _MAX_ total records)",lengthMenu:"Show _MENU_",search:"Search:",zeroRecords:"No matching records found",paginate:{previous:"Prev",next:"Next",last:"Last",first:"First"}},bStateSave:!0,columnDefs:[{targets:0,orderable:!1,searchable:!1}],lengthMenu:[[5,15,20,-1],[5,15,20,"All"]],pageLength:5,pagingType:"bootstrap_full_number",columnDefs:[{orderable:!1,targets:[0]},{searchable:!1,targets:[0]}],order:[[1,"asc"]]});
    }

    //Select2
   $('#dd_id,#idd_id,#bank_id,#ibank_id,#vehicle_id,#name,#bike_id,#cmp_id,#borrower_id').select2({
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


              if( param =='dd_id' )
              {
                $('#'+param).html('<option value="">Select Description</option>');
                
                $.each(data,function(index,value){
                  $('#'+param).append('<option value="'+value['dd_id']+'">'+value['name']+'</option> ');
                });
              }
              else if( param =='idd_id' )
              {
                $('#'+param).html('<option value="">Select Description</option>');
                
                $.each(data,function(index,value){
                  $('#'+param).append('<option value="'+value['dd_id']+'">'+value['name']+'</option> ');
                });
              }
              else if( param =='bank_id' )
              {
                $('#'+param).html('<option value="">Select Bank</option>');
                
                $.each(data,function(index,value){
                  $('#'+param).append('<option value="'+value['bank_id']+'">'+value['short_form']+'</option> ');
                });
              }
              else if( param =='ibank_id' )
              {
                $('#'+param).html('<option value="">Select Bank</option>');
                
                $.each(data,function(index,value){
                  $('#'+param).append('<option value="'+value['bank_id']+'">'+value['short_form']+'</option> ');
                });
              }
              else if( param =='bike_id' )
              {
                $('#'+param).html('<option value="">Select Bike</option>');
                
                $.each(data,function(index,value){
                  $('#'+param).append('<option value="'+value['bike_id']+'">'+value['bike_number']+'</option> ');
                });
              }
              else if( param =='vehicle_id' )
              {
                $('#name').val('').trigger('change');
                $('#'+param).html('<option value="">Select Vehicle</option>');
                
                $.each(data,function(index,value){
                  $('#'+param).append('<option value="'+value['vehicle_id']+'">'+value['vehicle_number']+'</option> ');
                });
              }
              else if( param =='borrower_id' )
              {
                $('#'+param).html('<option value="">Select Borrower</option>');
                
                $.each(data,function(index,value){
                  $('#'+param).append('<option value="'+value['borrower_id']+'">'+value['name']+'</option> ');
                });
              }
              else
              {
                $('#'+param).html('<option value="">Select Company</option>');
                
                $.each(data,function(index,value){
                  $('#'+param).append('<option value="'+value['cmp_id']+'">'+value['name']+'</option> ');
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

      $(document).on('click','.dd_id,.idd_id,.bank_id,.ibank_id,.vehicle_id,.bike_id,.cmp_id,.borrower_id', function()
      {
        updateField(''+$(this).attr('para')+'');
      });

   $('input[name="method"],input[name="imethod"]').change(function(){
        
      if( $(this).val() == 'check' )
        bcshow();
      else
        bchide();
   });

   function ibcshow()
   {
      $('#icheck_number').attr('required','required');
      $('#ibank_id').attr('required','required');
      $('#icheck_number_div').removeClass('hidden');
   }
   function ibchide()
   {
      $('#icheck_number,#ibank_id').removeAttr('required');
      $('#icheck_number,#ibank_id').val('').trigger('change');
      $('#icheck_number_div').addClass('hidden'); 
   }

   $('input[name="imethod"]').change(function(){

      if( $(this).val() == 'check' )
        ibcshow();
      else
        ibchide();  
   });

    function loadData()
    {
        $('#loading').show();

        $.ajax({
            url:'ajax/expenses/fetch.php',
            dataType:"JSON",
            success:function(data){
                var n = 1;
                var i = 0,
                    code = '';  

                $('#mytable').DataTable().destroy();
                $('#mytable tbody').html("");
                
                var table = $.each(data,function(index,value){

                  if( value['dd_id'] != '5' && value['dd_id'] != '6' && value['dd_id'] != '7' && value['dd_id'] != '8' )
                  {
                    code = '<td>'+ 
                              '<ul class="addremove">'+
                                  '<li> <button class="btn btn-xs green update_btn" id="'+value['expense_id']+'" type="button">  '+
                                  '<i class="fa fa-plus-square"></i>'+
                                  '</button> </li>'+

                                  '<!-- Trigger the modal with a button -->'+                                        
                                      '<li>  <button type="button" class="btn btn-xs red" data-toggle="modal" data-target="#myModal'+value['expense_id']+'" >'+
                                      '<i class="fa fa-minus-square"></i>'+
                                      '</button> </li>'+

                                      '<!-- Modal -->'+
                                      '<div id="myModal'+value['expense_id']+'" class="modal fade" role="dialog">'+
                                        '<div class="modal-dialog">'+

                                          '<!-- Modal content-->'+
                                          '<div class="modal-content">'+
                                            '<div class="modal-header">'+
                                              '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                                              '<h4 class="modal-title">Delete</h4>'+
                                            '</div>'+
                                            '<div class="modal-body">'+
                                              '<p>Are you sure you want to delete <strong>'+n+'</strong>?</p>'+
                                            '</div>'+
                                            '<div class="modal-footer">'+
                                              '<button type="button" class="btn btn-default btn-success pull-left" data-dismiss="modal">Close</button>'+
                                              '<button type="button" class="btn btn-default red delete_btn" data-dismiss="modal" id="'+value['expense_id']+'">Delete</button>'+
                                            '</div>'+
                                          '</div>'+

                                        '</div>'+
                                      '</div>'+

                              '</ul>'+
                          '</td>';        
                  }
                  else
                    code = '<td></td>';

                    $('#mytable tbody').append('<tr index="'+i+'" class="odd gradeX">'+

                          <?php
                            if(!isset($_SESSION['disable_btn']) )
                            {?> code+ <?php }//END OF If
                            else{?>
                                '<td></td>'+
                          <?php }//END OF ELSE ?>

                            '<td>'+n+'</td>'+
                            '<td>'+value['datee']+'</td>'+
                            '<td id="'+value['dd_id']+'">'+value['dd_name']+'</td>'+
                            '<td>'+value['method']+'</td>'+
                            '<td>'+value['check_number']+'</td>'+
                            '<td id="'+value['bank_id']+'">'+value['bank_name']+'</td>'+
                            '<td>'+value['amount']+'</td>'+
                            '<td id="'+value['vehicle_id']+'">'+value['vehicle_number']+'</td>'+
                            '<td>'+value['name']+'</td>'+
                            '<td id="'+value['bike_id']+'">'+value['bike_number']+'</td>'+
                            '<td id="'+value['borrower_id']+'">'+value['borrower_name']+'</td>'+
                            '<td>'+value['description']+'</td>'+
                            '</tr>');

                    n++; i++;
                });

                $.when(table).done(function(){
                  $('#loading').hide();
                });

                myDataTable();
                getPreviousBalance();
            },
            error:function(){ alertMessage("Failed Fetch Ajax Call.",'error'); $('#loading').hide(); }
        });
    }

    loadData();

    function iloadData()
    {
        $('#iloading').show();

        $.ajax({
            url:'ajax/income/fetch.php',
            dataType:"JSON",
            success:function(data){
                var n = 1;
                var i = 0,
                    code = '';

                $('#imytable').DataTable().destroy();
                $('#imytable tbody').html("");
                
                var table = $.each(data,function(index,value){

                  if( value['dd_id'] != '5' && value['dd_id'] != '6' && value['dd_id'] != '7' && value['dd_id'] != '8' )
                  {
                    code = '<td>'+ 
                              '<ul class="addremove">'+
                                  '<li> <button class="btn btn-xs green iupdate_btn" id="'+value['income_id']+'" type="button">  '+
                                  '<i class="fa fa-plus-square"></i>'+
                                  '</button> </li>'+

                                  '<!-- Trigger the modal with a button -->'+                                        
                                      '<li>  <button type="button" class="btn btn-xs red" data-toggle="modal" data-target="#myModal'+value['income_id']+'" >'+
                                      '<i class="fa fa-minus-square"></i>'+
                                      '</button> </li>'+

                                      '<!-- Modal -->'+
                                      '<div id="myModal'+value['income_id']+'" class="modal fade" role="dialog">'+
                                        '<div class="modal-dialog">'+

                                          '<!-- Modal content-->'+
                                          '<div class="modal-content">'+
                                            '<div class="modal-header">'+
                                              '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                                              '<h4 class="modal-title">Delete</h4>'+
                                            '</div>'+
                                            '<div class="modal-body">'+
                                              '<p>Are you sure you want to delete <strong>'+n+'</strong>?</p>'+
                                            '</div>'+
                                            '<div class="modal-footer">'+
                                              '<button type="button" class="btn btn-default btn-success pull-left" data-dismiss="modal">Close</button>'+
                                              '<button type="button" class="btn btn-default red idelete_btn" data-dismiss="modal" id="'+value['income_id']+'">Delete</button>'+
                                            '</div>'+
                                          '</div>'+

                                        '</div>'+
                                      '</div>'+

                              '</ul>'+
                          '</td>';        
                  }
                  else
                    code = '<td></td>';

                    $('#imytable tbody').append('<tr index="'+i+'" class="odd gradeX">'+

                            <?php
                              if(!isset($_SESSION['disable_btn']) )
                              {?> code+ <?php }//END OF If
                              else{?>
                                  '<td></td>'+
                            <?php }//END OF ELSE ?>

                            '<td>'+n+'</td>'+
                            '<td>'+value['datee']+'</td>'+
                            '<td id="'+value['dd_id']+'">'+value['dd_name']+'</td>'+
                            '<td>'+value['method']+'</td>'+
                            '<td>'+value['check_number']+'</td>'+
                            '<td id="'+value['bank_id']+'">'+value['bank_name']+'</td>'+
                            '<td>'+value['amount']+'</td>'+
                            '<td id="'+value['cmp_id']+'">'+value['cmp_name']+'</td>'+
                            '<td>'+value['description']+'</td>'+
                            '</tr>');

                    n++; i++;
                });

                $.when(table).done(function(){
                  $('#iloading').hide();
                });

                imyDataTable();
                getPreviousBalance();
            },
            error:function(){ alertMessage("Failed iFetch Ajax Call.",'error'); $('#iloading').hide(); }
        });
    }

    iloadData();

    function add(datee,dd_id,method,check_number,bank_id,amount,vehicle_id,name,bike_id,borrower_id,description)
    {
        $.ajax({
            url:'ajax/expenses/add.php',
            data:{datee:datee,dd_id:dd_id,method:method,check_number:check_number,bank_id:bank_id,amount:amount,vehicle_id:vehicle_id,name:name,bike_id:bike_id,borrower_id:borrower_id,description:description},
            type:"GET",
            dataType:'JSON',
            success:function(data){
                if(data['inserted']=='true')
                {
                    $('#btn_reset').trigger('click');                    
                    alertMessage('Added Successfully.','success');
                    loadData();
                    // iloadData();
                }
                else
                  alertMessage('Not Added.','error');                  
            },
            error:function(){ alertMessage("Error in Add Ajax Call.",'error') }
        });
    }

    function iadd(idatee,idd_id,imethod,icheck_number,ibank_id,iamount,cmp_id,idescription)
    {
        $.ajax({
            url:'ajax/income/add.php',
            data:{datee:idatee,dd_id:idd_id,method:imethod,check_number:icheck_number,bank_id:ibank_id,amount:iamount,cmp_id:cmp_id,description:idescription},
            type:"GET",
            dataType:'JSON',
            success:function(data){
                if(data['inserted']=='true')
                {
                  $('#ibtn_reset').trigger('click');
                  alertMessage('Added Successfully.','success');
                  iloadData();
                  // loadData();
                }
                else
                  alertMessage('Not Added.','error');   
            },
            error:function(){ alertMessage("Error in iAdd Ajax Call.",'error') }
        });
    }

    function update(expense_id,datee,dd_id,dd_name,method,check_number,bank_id,bank_name,amount,vehicle_id,vehicle_number,name,bike_id,bike_number,borrower_id,borrower_name,description)
    {
        $.ajax({
            url:'ajax/expenses/update.php',
            data:{expense_id:expense_id,datee:datee,dd_id:dd_id,method:method,check_number:check_number,bank_id:bank_id,amount:amount,vehicle_id:vehicle_id,name:name,bike_id:bike_id,borrower_id:borrower_id,description:description},
            type:"GET",
            dataType:'JSON',
            success:function(data){
                if(data['updated']=='true')
                {
                   var i = $('.selectedd').attr('index');
                    var temp = $('#mytable').DataTable().row(i).data();
                    
                    addNewClick();

                    temp[2]  = datee;
                    temp[3]  = dd_name;
                    temp[4]  = method;
                    temp[5]  = check_number;
                    temp[6]  = bank_name;
                    temp[7]  = amount;
                    temp[8]  = vehicle_number;
                    temp[9]  = name;
                    temp[10] = bike_number;
                    temp[11] = borrower_name;
                    temp[12] = description;

                    $('#mytable').DataTable().row(i).data(temp).draw();

                    alertMessage('Expense Updated Successfully.','success');
                }
                else
                  alertMessage('Not Updated.','error');   
            },
            error:function(){ alertMessage("Error in Update Ajax Call.",'error') }
        });
    }

    function iupdate(income_id,idatee,idd_id,idd_name,imethod,icheck_number,ibank_id,ibank_name,iamount,cmp_id,cmp_name,idescription)
    {
        $.ajax({
            url:'ajax/income/update.php',
            data:{income_id:income_id,datee:idatee,dd_id:idd_id,method:imethod,check_number:icheck_number,bank_id:ibank_id,amount:iamount,cmp_id:cmp_id,description:idescription},
            type:"GET",
            dataType:'JSON',
            success:function(data){
                if(data['updated']=='true')
                {
                   var i = $('.iselectedd').attr('index');
                    var temp = $('#imytable').DataTable().row(i).data();
                    
                    iaddNewClick();

                    temp[2] = idatee;
                    temp[3] = idd_name;
                    temp[4] = imethod;
                    temp[5] = icheck_number;
                    temp[6] = ibank_name;
                    temp[7] = iamount;
                    temp[8] = cmp_name;
                    temp[9] = idescription;

                    $('#imytable').DataTable().row(i).data(temp).draw();

                    alertMessage('Income Updated Successfully.','success');
                }
                else
                  alertMessage('Not Updated!','error');   
            },
            error:function(){ alertMessage("Error in iUpdate Ajax Call.",'error') }
        });
    }

    function deletetr(trr,expense_id)
    {
        $.ajax({
            url:'ajax/expenses/delete.php',
            data:{expense_id:expense_id},
            type:'POST',
            dataType:'JSON',
            success:function(data){
              if(data['deleted']=='true')
              {
                trr.fadeOut(100,function(){
                   trr.remove(); 
                });
              }
              else
                alertMessage('Not Deleted!','error');   
            },
            error:function(){ alertMessage("Error in Delete ajax Call.",'error') }
        });
    }

    function ideletetr(trr,income_id)
    {
        $.ajax({
            url:'ajax/income/delete.php',
            data:{income_id:income_id},
            type:'POST',
            dataType:'JSON',
            success:function(data){
              if(data['deleted']=='true')
              {
                trr.fadeOut(100,function(){
                   trr.remove(); 
                });
              }
              else
                alertMessage('Not Deleted!','error');   
            },
            error:function(){ alertMessage("Error in iDelete ajax Call.",'error') }
        });
    }

    function updateClick()
    {
      $('#expense_form').addClass('update_form');
      $('#expense_id_div,#update_form_btn,#add_new').removeClass('hidden');
      $('#btn_submit,#btn_reset').addClass('hidden');
      $('#datee').focus();
    }

    function iupdateClick()
    {
      $('#income_form').addClass('update_form');
      $('#income_id_div,#iupdate_form_btn,#iadd_new').removeClass('hidden');
      $('#ibtn_submit,#ibtn_reset').addClass('hidden');
      $('#idatee').focus();
    }

    function addNewClick()
    {
      $('#expense_form').removeClass('update_form');
      $('#expense_id_div,#update_form_btn,#add_new').addClass('hidden');
      $('#btn_submit,#btn_reset').removeClass('hidden');
      $('#btn_reset').trigger('click');
    }

    function iaddNewClick()
    {
      $('#income_form').removeClass('update_form');
      $('#income_id_div,#iupdate_form_btn,#iadd_new').addClass('hidden');
      $('#ibtn_submit,#ibtn_reset').removeClass('hidden');
      $('#ibtn_reset').trigger('click');
    }

    //DELETE  expense
    $(document).on('click','.delete_btn',function(){

        var expense_id = $(this).attr('id'),
            trr = $(this).closest('tr');

        deletetr(trr,expense_id);
    });

    //DELETE  income
    $(document).on('click','.idelete_btn',function(){

        var income_id = $(this).attr('id'),
            trr = $(this).closest('tr');

        ideletetr(trr,income_id);
    });

    //ADD NEW expense 
    $(document).on('click','#add_new',function(){
        addNewClick();
    });

    //ADD NEW INCOME 
    $(document).on('click','#iadd_new',function(){
        iaddNewClick();
    });

    //UPDATE expense 
    $(document).on('click','.update_btn',function(){

        updateClick();

        var expense_id = $(this).attr('id'),
            trr = $(this).closest('tr');

        $('#mytable tr').each(function(){
            if( $(this).hasClass('selectedd') )
              $(this).removeClass('selectedd'); 
        });

        trr.addClass('selectedd');   

        $('#expense_id').val( expense_id );
        $('#datee').val( trr.find('td').eq(2).text() );
        $('#dd_id').val( trr.find('td').eq(3).attr('id') ).trigger('change');
        $('#expense_form input[value="'+trr.find('td').eq(4).text()+'"]').prop('checked', true).trigger('change');
        $('#check_number').val( trr.find('td').eq(5).text() );
        $('#bank_id').val( trr.find('td').eq(6).attr('id') ).trigger('change');
        $('#amount').val( trr.find('td').eq(7).text() );

        var vehicle_id = trr.find('td').eq(8).attr('id');
        if( vehicle_id != '' && vehicle_id != 'null' )
        {
          $('#vb_select').val('1').trigger('change');
          $('#vehicle_id').val( trr.find('td').eq(8).attr('id') ).trigger('change');
        }
        $('#name').val( trr.find('td').eq(9).text() ).trigger('change');
        $('#bike_id').val( trr.find('td').eq(10).attr('id') ).trigger('change');
        
        var borrower_id = trr.find('td').eq(11).attr('id');
        if( borrower_id != '' && borrower_id != 'null' )
        {
          $('#vb_select').val('2').trigger('change');
          $('#borrower_id').val( trr.find('td').eq(11).attr('id') ).trigger('change');
        }
        $('#description').val( trr.find('td').eq(12).text() );
    });

    //UPDATE INCOME
    $(document).on('click','.iupdate_btn',function(){

        iupdateClick();

        var income_id = $(this).attr('id'),
            trr = $(this).closest('tr');

        $('#imytable tr').each(function(){
            if( $(this).hasClass('iselectedd') )
            {
                $(this).removeClass('iselectedd'); 
            }
        });

        trr.addClass('iselectedd');   

        $('#income_id').val( income_id );
        $('#idatee').val( trr.find('td').eq(2).text() );
        $('#idd_id').val( trr.find('td').eq(3).attr('id') ).trigger('change');
        $('#income_form input[value="'+trr.find('td').eq(4).text()+'"]').prop('checked', true).trigger('change');
        $('#icheck_number').val( trr.find('td').eq(5).text() );
        $('#ibank_id').val( trr.find('td').eq(6).attr('id') ).trigger('change');
        $('#iamount').val( trr.find('td').eq(7).text() );
        $('#cmp_id').val( trr.find('td').eq(8).attr('id') ).trigger('change');
        $('#idescription').val( trr.find('td').eq(9).text() );
    });

    //Add & Update expense 
    $('#expense_form').submit(function(e){
       e.preventDefault();
       
       var datee = $('#datee').val() ,
           dd_id = $('#dd_id').val() ,
           dd_name = $('#dd_id option:selected').text() ,
           method = $('input[name="method"]:checked').val() ,
           check_number = $('#check_number').val() ,
           bank_id = $('#bank_id').val() ,
           bank_name = $('#bank_id option:selected').text() ,
           amount = $('#amount').val() ,
           vehicle_id = $('#vehicle_id').val() ,
           vehicle_number = $('#vehicle_id option:selected').text() ,
           name = $('#name').val() ,
           bike_id = $('#bike_id').val() ,
           bike_number = $('#bike_id option:selected').text() ,
           borrower_id = $('#borrower_id').val() ,
           borrower_name = $('#borrower_id option:selected').text() ,
           description = $('#description').val() ,
           expense_id =  $('#expense_id').val();

           if( check_number == '' )
              check_number = null;

           if( bank_id == '' )
           {
              bank_name = null;
              bank_id = null;
           }

           if( vehicle_id == '' )
              vehicle_id = null;
          
           if( name == '' )
              name = null;

           if( borrower_id == '' )
              borrower_id = null;

           if( bike_id == '' )
           {
              bike_id = null;
              bike_number = null;
           }

       if( $(this).hasClass('update_form') ) 
       {
            update(expense_id,datee,dd_id,dd_name,method,check_number,bank_id,bank_name,amount,vehicle_id,vehicle_number,name,bike_id,bike_number,borrower_id,borrower_name,description);
       }
       else
       {
            add(datee,dd_id,method,check_number,bank_id,amount,vehicle_id,name,bike_id,borrower_id,description);
       }

       $('#datee').focus();
    });

    //Add & Update income 
    $('#income_form').submit(function(e){
       e.preventDefault();
       
       var idatee = $('#idatee').val() ,
           idd_id = $('#idd_id').val() ,
           idd_name = $('#idd_id option:selected').text() ,
           imethod = $('input[name="imethod"]:checked').val() ,
           icheck_number = $('#icheck_number').val() ,
           ibank_id = $('#ibank_id').val() ,
           ibank_name = $('#ibank_id option:selected').text() ,
           iamount = $('#iamount').val() ,
           cmp_id = $('#cmp_id').val();
           cmp_name = $('#cmp_id option:selected').text() ,
           idescription = $('#idescription').val() ,
           income_id =  $('#income_id').val();

           if( icheck_number == '' && ibank_id == '' )
           {
              icheck_number = null;
              ibank_name = null;
           }

       if( $(this).hasClass('update_form') ) 
       {
            iupdate(income_id,idatee,idd_id,idd_name,imethod,icheck_number,ibank_id,ibank_name,iamount,cmp_id,cmp_name,idescription);
       }
       else
       {
            iadd(idatee,idd_id,imethod,icheck_number,ibank_id,iamount,cmp_id,idescription);
       }

       $('#idatee').focus();
    });

    function updateExinDate(exin_id,datee)
    {
      $.ajax({
        url:'ajax/exin/update.php',
        data:{exin_id:exin_id,datee:datee},
        type:'POST',
        dataType:'JSON',
        success:function(data){
          if(data['updated']=='true')
          {
            alertMessage('Entries Date Updated Successfully.','success');
            loadData(); iloadData();
          }
          else
            alertMessage('Entries Date Not Updated!','error');
        },
        error:function(){alertMessage('Error in Entries Date Call.','error');}
      });
    }

    $('#exin_form').submit(function(e) {
      e.preventDefault();
      var datee   = $('#exin_datee').val(),
          exin_id = $('#exin_id').val();
      updateExinDate(exin_id,datee);
    });
 });
</script>
