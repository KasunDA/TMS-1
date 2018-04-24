<?php 
include 'header.php';
include 'nav.php';

require 'connection.php';
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
                                <span class="caption-subject bold uppercase">Expenses:</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
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

                                                          $q = mysqli_query($mycon,'SELECT dd_id,name from daily_description where status=1 ORDER BY dd_id DESC');

                                                          while( $r = mysqli_fetch_array($q) )
                                                            {?>
                                                              <option value="<?php echo $r['dd_id']; ?>"><?php echo $r['name']; ?></option>
                                                          <?php } //END OF WHILE ?>
                                                          
                                                     </select>
                                                    
                                                    <!-- <option>Lunch</option>
                                                    <option>Advance</option>
                                                    <option>Diesel</option>
                                                    <option>Bike Expenses</option>
                                                    <option>Driver Salary</option> -->
                                                
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
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Amount</label>
                                            <div class="col-md-5">
                                               <input type="number" min="0.01" step="0.01" name="amount" id="amount" required tabindex="7" class="form-control" placeholder="58680">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Vehicle #:</label>
                                            <div class="col-md-5">
                                                <select class="form-control" id="vehicle_id" name="vehicle_id" required tabindex="8" >
                                                    <option value="">Select Vehicle</option>
                                                      <?php 

                                              $q = mysqli_query($mycon,'SELECT vehicle_id,vehicle_number from vehicle where status=1 ORDER BY vehicle_id DESC');

                                              while( $r = mysqli_fetch_array($q) )
                                                {?>
                                                  <option value="<?php echo $r['vehicle_id']; ?>"><?php echo $r['vehicle_number']; ?></option>
                                              <?php } //END OF WHILE ?>
                                                  </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Name:</label>
                                            <div class="col-md-5">
                                                <select class="form-control" id="name" name="name" required tabindex="9">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Description:</label>
                                            <div class="col-md-5">
                                               <textarea class="form-control" name="description" id="description" rows="4" required tabindex="10"  placeholder="Text Here"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-5 col-md-push-4">
                                                <div class="">
                                                    <button type="submit" class="btn blue" id="btn_submit" tabindex="11">Submit</button> 
                                                    <button type="reset" class="btn default" id="btn_reset" tabindex="12">Cancel</button>

                                                    <button type="submit" class="btn blue hidden" id="update_form_btn" tabindex="11">Update</button>
                                                    <button type="button" class="btn default hidden"  id="add_new" tabindex="12">Add New</button>
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
                <div class="col-md-6">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-red-sunglo">
                                <i class="icon-settings font-red-sunglo"></i>
                                <span class="caption-subject bold uppercase">Income:</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
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

                                                          $q = mysqli_query($mycon,'SELECT dd_id,name from daily_description where status=1 ORDER BY dd_id DESC');

                                                          while( $r = mysqli_fetch_array($q) )
                                                            {?>
                                                              <option value="<?php echo $r['dd_id']; ?>"><?php echo $r['name']; ?></option>
                                                          <?php } //END OF WHILE ?>
                                                          
                                                     </select>
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
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Amount</label>
                                            <div class="col-md-5">
                                               <input type="number" min="0.01" step="0.01" name="iamount" id="iamount" required tabindex="" class="form-control" placeholder="58680">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Description:</label>
                                            <div class="col-md-5">   
                                               <textarea class="form-control" name="idescription" id="idescription" rows="4" required tabindex=""  placeholder="Text Here"></textarea>
                                            
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
                         </div>
                         <div class="portlet-body table-both-scroll" > <!-- style="display: none;" -->
                             <table class="table table-striped table-bordered table-hover table-checkable order-column" id="mytable">
                                 <thead>
                                     <tr>
                                         <th> Actions </th>
                                         <th> # </th>
                                         <th> Date </th>
                                         <th> Daily Description  </th>
                                         <th> Method </th>
                                         <th> Check # </th>
                                         <th> Bank Name </th>
                                         <th> Amount </th>
                                         <th> Vehicle # </th>
                                         <th> Name </th>
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
                         </div>
                         <div class="portlet-body table-both-scroll" >  <!-- style="display: none;" -->
                             <table class="table table-striped table-bordered table-hover table-checkable order-column" id="imytable">
                                 <thead>
                                     <tr>
                                         <th> Actions </th>
                                         <th> # </th>
                                         <th> Date </th>
                                         <th> Daily Description  </th>
                                         <th> Method </th>
                                         <th> Check # </th>
                                         <th> Bank Name </th>
                                         <th> Amount </th>
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
                                            <td> 900000 </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="uppercase">
                                            <td> 1 </td>
                                            <td> Today Income </td>
                                            <td> 9000 </td>
                                        </tr>
                                        <tr>
                                            <td> 2 </td>
                                            <td> Today Expenses </td>
                                            <td> 80000 </td>
                                        </tr>
                                        <tr>
                                            <td> 3 </td>
                                            <td> Balance </td>
                                            <td> 810000 </td>
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
                }
                else
                {
                    $('#name').html('<option value=""> Select Name </option>');
                }
                
            },
            error:function(){ alert(' Failed Ajax Call Get Names.'); },
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
   $('#dd_id,#idd_id,#bank_id,#ibank_id,#vehicle_id,#name').select2({
      width: 'resolve'
   });

   $('input[name="method"],input[name="imethod"]').change(function(){

        if($(this).attr('name') == 'method')
        {
            if( $(this).val() == 'check' )
            {
                $('#check_number').attr('required','required');
                $('#bank_id').attr('required','required');
                $('#check_number_div').removeClass('hidden');
            }
            else
            {
                $('#check_number').removeAttr('required');
                $('#bank_id').removeAttr('required');
                $('#check_number_div').addClass('hidden');   
            }
        }
        else
        {
            if( $(this).val() == 'check' )
            {
                $('#icheck_number').attr('required','required');
                $('#ibank_id').attr('required','required');
                $('#icheck_number_div').removeClass('hidden');
            }
            else
            {
                $('#icheck_number').removeAttr('required');
                $('#ibank_id').removeAttr('required');
                $('#icheck_number_div').addClass('hidden');   
            }
        }
        

   });

    function loadData()
    {
        $.ajax({
            url:'ajax/expenses/fetch.php',
            dataType:"JSON",
            success:function(data){
                var n = 1;
                var i = 0;

                $('#mytable').DataTable().destroy();
                $('#mytable tbody').html("");
                
                $.each(data,function(index,value){

                    $('#mytable tbody').append('<tr index="'+i+'" class="odd gradeX">'+

                            '<td>'+ 
                                '<ul class="addremove">'+
                                    '<li> <button class="btn btn-xs green update_btn" id="'+value['expense_id']+'" type="button">  '+
                                    '<i class="fa fa-plus-square"></i>'+
                                    '</button> </li>'+
                                    '<li>  <button class="btn btn-xs red delete_btn" id="'+value['expense_id']+'" type="button">  '+
                                    '<i class="fa fa-minus-square"></i>'+
                                    '</button> </li>'+
                                '</ul>'+
                            '</td>'+                       

                            '<td>'+n+'</td>'+
                            '<td>'+value['datee']+'</td>'+
                            '<td id="'+value['dd_id']+'">'+value['dd_name']+'</td>'+
                            '<td>'+value['method']+'</td>'+
                            '<td>'+value['check_number']+'</td>'+
                            '<td id="'+value['bank_id']+'">'+value['bank_name']+'</td>'+
                            '<td>'+value['amount']+'</td>'+
                            '<td id="'+value['vehicle_id']+'">'+value['vehicle_number']+'</td>'+
                            '<td>'+value['name']+'</td>'+
                            '<td>'+value['description']+'</td>'+
                            '</tr>');

                    n++; i++;
                })

                myDataTable();
            },
            error:function(){ alert("Failed Fetch Ajax Call.") }
        });
    }

    loadData();

   function iloadData()
    {
        $.ajax({
            url:'ajax/income/fetch.php',
            dataType:"JSON",
            success:function(data){
                var n = 1;
                var i = 0;

                $('#imytable').DataTable().destroy();
                $('#imytable tbody').html("");
                
                $.each(data,function(index,value){

                    $('#imytable tbody').append('<tr index="'+i+'" class="odd gradeX">'+

                            '<td>'+ 
                                '<ul class="addremove">'+
                                    '<li> <button class="btn btn-xs green iupdate_btn" id="'+value['income_id']+'" type="button">  '+
                                    '<i class="fa fa-plus-square"></i>'+
                                    '</button> </li>'+
                                    '<li>  <button class="btn btn-xs red idelete_btn" id="'+value['income_id']+'" type="button">  '+
                                    '<i class="fa fa-minus-square"></i>'+
                                    '</button> </li>'+
                                '</ul>'+
                            '</td>'+                       

                            '<td>'+n+'</td>'+
                            '<td>'+value['datee']+'</td>'+
                            '<td id="'+value['dd_id']+'">'+value['dd_name']+'</td>'+
                            '<td>'+value['method']+'</td>'+
                            '<td>'+value['check_number']+'</td>'+
                            '<td id="'+value['bank_id']+'">'+value['bank_name']+'</td>'+
                            '<td>'+value['amount']+'</td>'+
                            '<td>'+value['description']+'</td>'+
                            '</tr>');

                    n++; i++;
                })

                imyDataTable();
            },
            error:function(){ alert("Failed iFetch Ajax Call.") }
        });
    }

    iloadData();

    function add(datee,dd_id,method,check_number,bank_id,amount,vehicle_id,name,description)
    {
        $.ajax({
            url:'ajax/expenses/add.php?datee='+datee+'&dd_id='+dd_id+'&method='+method+'&check_number='+check_number+'&bank_id='+bank_id+'&amount='+amount+'&vehicle_id='+vehicle_id+'&name='+name+'&description='+description,
            type:"POST",
            success:function(data){
                if(data)
                {
                    $('#btn_reset').trigger('click');
                    $('#dd_id,#bank_id,#vehicle_id').val("").trigger('change');
                    $('#check_number').removeAttr('required');
                    $('#bank_id').removeAttr('required');
                    $('#check_number_div').addClass('hidden');   
                    
                    loadData();
                }
            },
            error:function(){ alert("Error in Add Ajax Call.") }
        });
    }

    function iadd(idatee,idd_id,imethod,icheck_number,ibank_id,iamount,idescription)
    {
        $.ajax({
            url:'ajax/income/add.php?datee='+idatee+'&dd_id='+idd_id+'&method='+imethod+'&check_number='+icheck_number+'&bank_id='+ibank_id+'&amount='+iamount+'&description='+idescription,
            type:"POST",
            success:function(data){
                if(data)
                {
                    $('#ibtn_reset').trigger('click');
                    $('#idd_id,#ibank_id').val("").trigger('change');
                    $('#icheck_number,#ibank_id').removeAttr('required');
                    $('#icheck_number_div').addClass('hidden');   
                    
                    iloadData();
                }
            },
            error:function(){ alert("Error in iAdd Ajax Call.") }
        });
    }

    function update(expense_id,datee,dd_id,dd_name,method,check_number,bank_id,bank_name,amount,vehicle_id,vehicle_number,name,description)
    {
        $.ajax({
            url:'ajax/expenses/update.php?expense_id='+expense_id+'&datee='+datee+'&dd_id='+dd_id+'&method='+method+'&check_number='+check_number+'&bank_id='+bank_id+'&amount='+amount+'&vehicle_id='+vehicle_id+'&name='+name+'&description='+description,
            type:"POST",
            success:function(data){
                if(data)
                {
                   var i = $('.selectedd').attr('index');
                    var temp = $('#mytable').DataTable().row(i).data();
                    
                    addNewClick();

                    temp[2] = datee;
                    temp[3] = dd_name;
                    temp[4] = method;
                    temp[5] = check_number;
                    temp[6] = bank_name;
                    temp[7] = amount;
                    temp[8] = vehicle_number;
                    temp[9] = name;
                    temp[10] = description;

                    $('#mytable').DataTable().row(i).data(temp).draw();
                }
            },
            error:function(){ alert("Error in Update Ajax Call.") }
        });
    }

    function iupdate(income_id,idatee,idd_id,idd_name,imethod,icheck_number,ibank_id,ibank_name,iamount,idescription)
    {
        $.ajax({
            url:'ajax/income/update.php?income_id='+income_id+'&datee='+idatee+'&dd_id='+idd_id+'&method='+imethod+'&check_number='+icheck_number+'&bank_id='+ibank_id+'&amount='+iamount+'&description='+idescription,
            type:"POST",
            success:function(data){
                if(data)
                {
                   var i = $('.selectedd').attr('index');
                    var temp = $('#imytable').DataTable().row(i).data();
                    
                    iaddNewClick();

                    temp[2] = idatee;
                    temp[3] = idd_name;
                    temp[4] = imethod;
                    temp[5] = icheck_number;
                    temp[6] = ibank_name;
                    temp[7] = iamount;
                    temp[8] = idescription;

                    $('#imytable').DataTable().row(i).data(temp).draw();
                }
            },
            error:function(){ alert("Error in iUpdate Ajax Call.") }
        });
    }

    function deletetr(trr,expense_id)
    {
        $.ajax({
            url:'ajax/expenses/delete.php?expense_id='+expense_id,
            type:"POST",
            success:function(data){
                trr.fadeOut(100,function(){
                   trr.remove(); 
                });
            },
            error:function(){ alert("Error in Delete ajax Call.") }
        });
    }

    function ideletetr(trr,income_id)
    {
        $.ajax({
            url:'ajax/income/delete.php?income_id='+income_id,
            type:"POST",
            success:function(data){
                trr.fadeOut(100,function(){
                   trr.remove(); 
                });
            },
            error:function(){ alert("Error in iDelete ajax Call.") }
        });
    }

    function updateClick()
    {

        $('#expense_form').addClass('update_form');

        $('#expense_id_div').removeClass('hidden');
        $('#update_form_btn').removeClass('hidden');
        $('#add_new').removeClass('hidden');

        $('#btn_submit').addClass('hidden');
        $('#btn_reset').addClass('hidden');

    }

    function iupdateClick()
    {

        $('#income_form').addClass('update_form');

        $('#income_id_div').removeClass('hidden');
        $('#iupdate_form_btn').removeClass('hidden');
        $('#iadd_new').removeClass('hidden');

        $('#ibtn_submit').addClass('hidden');
        $('#ibtn_reset').addClass('hidden');

    }

    function addNewClick()
    {

        $('#expense_form').removeClass('update_form');

        $('#btn_reset').trigger('click');
        $('#dd_id,#bank_id,#vehicle_id').val("").trigger('change');
        $('#check_number').removeAttr('required');
        $('#bank_id').removeAttr('required');
        $('#check_number_div').addClass('hidden');   


        $('#expense_id_div').addClass('hidden');
        $('#update_form_btn').addClass('hidden');
        $('#add_new').addClass('hidden');

        $('#btn_submit').removeClass('hidden');
        $('#btn_reset').removeClass('hidden');

    }

    function iaddNewClick()
    {

        $('#income_form').removeClass('update_form');

        $('#ibtn_reset').trigger('click');
        $('#idd_id,#ibank_id').val("").trigger('change');
        $('#icheck_number').removeAttr('required');
        $('#ibank_id').removeAttr('required');
        $('#icheck_number_div').addClass('hidden');   


        $('#income_id_div').addClass('hidden');
        $('#iupdate_form_btn').addClass('hidden');
        $('#iadd_new').addClass('hidden');

        $('#ibtn_submit').removeClass('hidden');
        $('#ibtn_reset').removeClass('hidden');

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

    //ADD NEW expense 
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
            {
                $(this).removeClass('selectedd'); 
            }
        });

        trr.addClass('selectedd');   

        $('#expense_id').val( expense_id );
        $('#datee').val( trr.find('td').eq(2).text() );
        $('#dd_id').val( trr.find('td').eq(3).attr('id') ).trigger('change');
        $('#expense_form input[value="'+trr.find('td').eq(4).text()+'"]').prop('checked', true).trigger('change');
        $('#check_number').val( trr.find('td').eq(5).text() );
        $('#bank_id').val( trr.find('td').eq(6).attr('id') ).trigger('change');
        $('#amount').val( trr.find('td').eq(7).text() );
        $('#vehicle_id').val( trr.find('td').eq(8).attr('id') ).trigger('change');
        $('#name').val( trr.find('td').eq(9).text() ).trigger('change');
        $('#description').val( trr.find('td').eq(10).text() );

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
        $('#idescription').val( trr.find('td').eq(8).text() );

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
           description = $('#description').val() ,

           expense_id =  $('#expense_id').val();

       if( $(this).hasClass('update_form') ) 
       {
            update(expense_id,datee,dd_id,dd_name,method,check_number,bank_id,bank_name,amount,vehicle_id,vehicle_number,name,description);
       }
       else
       {
            add(datee,dd_id,method,check_number,bank_id,amount,vehicle_id,name,description);
       }
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
           idescription = $('#idescription').val() ,
           income_id =  $('#income_id').val();

       if( $(this).hasClass('update_form') ) 
       {
            iupdate(income_id,idatee,idd_id,idd_name,imethod,icheck_number,ibank_id,ibank_name,iamount,idescription);
       }
       else
       {
            iadd(idatee,idd_id,imethod,icheck_number,ibank_id,iamount,idescription);
       }
    });

 });
</script>
