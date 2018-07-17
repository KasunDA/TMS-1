<?php 
include 'header.php';
include 'nav.php';
require 'connection.php';
date_default_timezone_set("Asia/Karachi");

if( !isset( $_GET['vehicle_id']) || !isset( $_GET['borrower_id']) || !isset( $_GET['name']) ||  $_GET['name'] == NULL )
{
    echo '<script>location.assign("dailyAdvanceRecover.php");</script>';
}

$name        = $_GET['name'];
$vehicle_id  = $_GET['vehicle_id'];
$borrower_id = $_GET['borrower_id'];
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
                                <span class="caption-subject bold uppercase"><?php $text = isset($_SESSION['disable_btn'])?'View':'Recover'; echo $text; ?> Advance Payment</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                             <?php
                                if(!isset($_SESSION['disable_btn']) )
                                {?>
                            <form class="form-horizontal" role="form">
                                <div class="row">
                                    <div class="form-group">
                                        <div id="income_id_div" class="hidden">
                                              <label class="col-md-2 control-label">ID:</label>
                                              <div class="col-md-3">
                                                <input type="text" class="form-control" id="income_id" name="income_id" readonly >
                                              </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body">
                                    <div class="row"> 
                                        <div class="form-group">  
                                            <label class="col-md-2 control-label">Date:</label>
                                            <div class="col-md-3">
                                              <input type="date" class="form-control" id="datee" name="datee" value="<?php echo date('Y-m-d'); ?>" required  />
                                            </div>
                                        
                                            <label class="col-md-2 control-label">Description:</label>
                                            <div class="col-md-3">
                                               <select class="form-control" name="dd_id" id="dd_id" readonly disabled >
                                                         <option value="2">Advance</option>
                                                </select>                                                
                                            </div>
                                        </div>
                                        </div>
                                    </div>    

                                    <div class="row"> 
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Payment Method</label>
                                            <div class="col-md-2">
                                                <div class="mt-radio-list">
                                                    <label class="mt-radio">
                                                        <input type="radio" name="method" id="optionsRadios22" value="cash" checked tabindex="1" autofocus> Cash 
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio">
                                                        <input type="radio" name="method" id="optionsRadios23" value="check" tabindex="2"> Check
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>

                                    <div class="row hidden" id="check_number_div">
                                        <div class="form-group">
                                            
                                            <label class="col-md-2 control-label">Check No.</label>
                                            <div class="col-md-3">
                                                <input type="number" name="check_number" min="0" id="check_number" tabindex="3"  class="form-control" placeholder="5033554">
                                            </div>
                                            
                                    
                                            <label class="col-md-2 control-label">Bank Name</label>
                                            <div class="col-md-3">
                                                <select class="form-control" id="bank_id" name="bank_id" tabindex="4">
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
                                     <div class="row">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Amount</label>
                                            <div class="col-md-3">
                                               <input type="number" min="0.01" step="0.01" name="amount" id="amount" required tabindex="5" class="form-control" placeholder="58680">
                                            </div>

                                            <label class="col-md-2 control-label">Total Return Amount</label>
                                            <div class="col-md-3">
                                               <input type="number" name="total_amount" id="total_amount" tabindex="-1" readonly class="form-control" style="background-color: #f36a5a;color: #fff;">
                                            </div>
                                        </div>
                                     </div>   
                                    <div class="row">
                                        <div class="form-group">    
                                            <?php 

                                                if( $vehicle_id != NULL )
                                                {
                                            ?>
                                            <label class="col-md-2 control-label">Vehicle #:</label>
                                            <div class="col-md-3">
                                                <select class="form-control" id="vehicle_id" disabled name="vehicle_id" tabindex="-1" >
                                                    <option value="">Select Vehicle</option>
                                                      <?php 

                                                  $q = mysqli_query($mycon,'SELECT vehicle_id,vehicle_number from vehicle where status=1 ORDER BY vehicle_id DESC');

                                                  while( $r = mysqli_fetch_array($q) )
                                                    {
                                                     echo '<option value="'.$r['vehicle_id'].'">'.$r['vehicle_number'].'</option>';
                                                    } ?>
                                                  </select>
                                            </div>

                                            <?php 
                                            }//END OF IF ?>


                                            <label class="col-md-2 control-label">Name</label>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" id="name" readonly value="<?php echo $name; ?>" name="name"  tabindex="-1">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="form-group">
                                            
                                            <label class="col-md-2 control-label">Description:</label>
                                            <div class="col-md-8">
                                               <textarea class="form-control" name="description" id="description" rows="4" tabindex="6"  placeholder="Text Here"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                        
                                    <div class="row">    
                                        <div class="form-actions">
                                            <div class="col-md-5 col-md-push-4">
                                                <div class="">
                                                    <button type="submit" class="btn blue" id="btn_submit" tabindex="7">Submit</button> 
                                                    <button type="reset" class="btn default" id="btn_reset" tabindex="8">Cancel</button>

                                                    <button type="submit" class="btn blue hidden" id="update_form_btn" tabindex="7">Update</button>
                                                    <button type="button" class="btn default hidden" id="add_new" tabindex="8">Add New</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                
                            </form>
                            <?php }//END OF IF?> 
                        </div>
                        <!-- Form ends -->
                        <hr>
            <div class="row">
                 <div class="col-md-6">
                     <!-- BEGIN EXAMPLE TABLE PORTLET-->
                     <div class="portlet light bordered">
                         <div class="portlet-title">
                             <div class="caption font-green">
                                 <i class="icon-settings font-green"></i>
                                 <span class="caption-subject bold uppercase">Advance </span>
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
                                         <th> # </th>
                                         <th> Date </th>
                                         <th> Description </th>    
                                         <th> Amount </th>
                                         
                                     </tr>
                                 </thead>
                                 <tbody>
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
                                 <span class="caption-subject bold uppercase">Received Advance</span>
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
                                         <th> Method </th>
                                         <th> Check # </th>
                                         <th> Bank Name </th>
                                         <th> Amount </th>
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
            // e.preventDefault();
            bchide();
            
            <?php 
                if($vehicle_id != NULL ) 
                    echo 'getFields('.$vehicle_id.',0,"'.$name.'");';
                     
                else
                    echo 'getFields(0,'.$borrower_id.',"'.$name.'");';
            ?>
        });

        //Select2
       $('#bank_id').select2({
          width: 'resolve',
          theme: "classic"
       });
       $('.select2-selection').addClass('select');
       
       //$('#vehicle_id').attr('disabled');

        function updateField(param)
        {
            $.ajax({
              url:'ajax/container_movement/update_field.php?id='+param,
              dataType:'JSON',
              success:function(data){

                    $('#'+param+'_full_form').val('');
                    $('#'+param).html('<option value="">Select Bank</option>');
                    
                    $.each(data,function(index,value){
                      $('#'+param).append('<option value="'+value['bank_id']+'">'+value['short_form']+'</option> ');
                    });

                      $('#'+param).select2({
                        width: 'resolve',
                        theme: "classic"
                      });

              },
              error:function(){  alertMessage('Error in Updating Field Ajax Call.','error') }
            });
        }

        $(document).on('click','.bank_id', function()
        {
            updateField(''+$(this).attr('para')+'');
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
                bcshow();

            else
                bchide();
        });

        function calculateSumTR()
        {
            var sum = 0;

            // iterate through each td based on class and add the values
            $("td[name='total']").each(function() {

                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    sum += parseFloat(value);
                }

            });

            return sum;
        }

        function calculateSumPA()
        {
            var sum = 0,
                total = 0;

            // iterate through each td based on class and add the values
            $("td[name='paid_amount']").each(function() {

                var value = $(this).text();
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    sum += parseFloat(value);
                }

            });

            total = calculateSumTR()-sum;

            $('#total_amount').val(total);
            $('#amount').attr('max', total);

            return sum;
        }

        function myDataTable()
        {
            //columnDefs:[{targets:0,orderable:!1,searchable:!1}] 
            //columnDefs:[{orderable:!1,targets:[0]},{searchable:!1,targets:[0]}]
            var e=$("#mytable");
            e.dataTable({language:{aria:{sortAscending:": activate to sort column ascending",sortDescending:": activate to sort column descending"},emptyTable:"No data available in table",info:"Showing _START_ to _END_ of _TOTAL_ records",infoEmpty:"No records found",infoFiltered:"(filtered1 from _MAX_ total records)",lengthMenu:"Show _MENU_",search:"Search:",zeroRecords:"No matching records found",paginate:{previous:"Prev",next:"Next",last:"Last",first:"First"}},bStateSave:!0,lengthMenu:[[5,15,20,-1],[5,15,20,"All"]],pageLength:5,pagingType:"bootstrap_full_number",order:[[0,"asc"]]});
        }

        function imyDataTable()
        {
            var e=$("#imytable");
            e.dataTable({language:{aria:{sortAscending:": activate to sort column ascending",sortDescending:": activate to sort column descending"},emptyTable:"No data available in table",info:"Showing _START_ to _END_ of _TOTAL_ records",infoEmpty:"No records found",infoFiltered:"(filtered1 from _MAX_ total records)",lengthMenu:"Show _MENU_",search:"Search:",zeroRecords:"No matching records found",paginate:{previous:"Prev",next:"Next",last:"Last",first:"First"}},bStateSave:!0,columnDefs:[{targets:0,orderable:!1,searchable:!1}],lengthMenu:[[5,15,20,-1],[5,15,20,"All"]],pageLength:5,pagingType:"bootstrap_full_number",columnDefs:[{orderable:!1,targets:[0]},{searchable:!1,targets:[0]}],order:[[1,"asc"]]});
        }

        function getFields(vehicle_id,borrower_id,name)
        {
            $.ajax({
              url:'ajax/advance_pay/get_fields.php',
              data:{vehicle_id:vehicle_id,borrower_id:borrower_id,name:name},
              type:'GET',
              dataType:'JSON',
              success:function(data){
                    $('#total_amount').val(data['amount']);
                    $('#amount').attr('max', data['amount']);
                    <?php 
                        if($vehicle_id != NULL ) 
                            echo  "$('#vehicle_id').val(".$vehicle_id.").trigger('change');";
                    ?>
              },
              error:function(){  alertMessage('Error in Updating Field Ajax Call.','error') }
            });
        }

         <?php 
            if($vehicle_id != NULL ) 
            {
                echo  "$('#vehicle_id').val(".$vehicle_id.").trigger('change');";
                echo  'loadData('.$vehicle_id.',0,"'.$name.'");';
                echo 'iloadData('.$vehicle_id.',0,"'.$name.'");';
                echo 'getFields('.$vehicle_id.',0,"'.$name.'");';
            }    
            else
            {
                echo  'loadData(0,'.$borrower_id.',"'.$name.'");';
                echo 'iloadData(0,'.$borrower_id.',"'.$name.'");';
                echo 'getFields(0,'.$borrower_id.',"'.$name.'");';
            }
        ?>

        var total_advance = 0,
            total_advance_pay = 0;

        function loadData(vehicle_id,borrower_id,name)
        {
            $('#loading').show();

            $.ajax({
                url:'ajax/advance_pay/fetch_details.php?vehicle_id='+vehicle_id+'&borrower_id='+borrower_id+'&name='+name,
                dataType:"JSON",
                success:function(data){
                    var n = 1;
                    total_advance = 0;

                    $('#mytable').DataTable().destroy();
                    $('tbody').html("");
                    
                    var table = $.each(data,function(index,value){

                        total_advance+= value['amount']/1;

                        $('#mytable tbody').append('<tr class="odd gradeX">'+

                                // '<td>'+ 
                                //   '<ul class="addremove">'+

                                //       '<!-- Trigger the modal with a button -->'+                                        
                                //           '<li>  <button type="button" class="btn btn-xs red" data-toggle="modal" data-target="#myModal'+value['expense_id']+'" >'+
                                //           '<i class="fa fa-minus-square"></i>'+
                                //           '</button> </li>'+

                                //           '<!-- Modal -->'+
                                //           '<div id="myModal'+value['expense_id']+'" class="modal fade" role="dialog">'+
                                //             '<div class="modal-dialog">'+

                                //               '<!-- Modal content-->'+
                                //               '<div class="modal-content">'+
                                //                 '<div class="modal-header">'+
                                //                   '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                                //                   '<h4 class="modal-title">Delete</h4>'+
                                //                 '</div>'+
                                //                 '<div class="modal-body">'+
                                //                   '<p>Are you sure you want to delete row <strong>'+n+'</strong>?</p>'+
                                //                 '</div>'+
                                //                 '<div class="modal-footer">'+
                                //                   '<button type="button" class="btn btn-default btn-success pull-left" data-dismiss="modal">Close</button>'+
                                //                   '<button type="button" class="btn btn-default red delete_btn" data-dismiss="modal" id="'+value['expense_id']+'">Delete</button>'+
                                //                 '</div>'+
                                //               '</div>'+

                                //             '</div>'+
                                //           '</div>'+

                                //   '</ul>'+
                                // '</td>'+

                                '<td>'+n+'</td>'+
                                '<td>'+value['datee']+'</td>'+
                                '<td>'+value['description']+'</td>'+
                                '<td name="total">'+value['amount']+'</td>'+
                                '</tr>');

                        n++;
                    });

                    $.when(table).done(function(){
                      $('#loading').hide();
                    });

                    myDataTable();
                },
                error:function(){ alertMessage("Failed Fetch Ajax Call.",'error'); $('#loading').hide(); }
            });
        }

        //<?php// echo $vehicle_id; ?> <?php //echo '"'.$name.'"';?>

        function iloadData(vehicle_id,borrower_id,name)
        {
            $('#iloading').show();

            $.ajax({
                url:'ajax/advance_pay/ifetch.php?vehicle_id='+vehicle_id+'&borrower_id='+borrower_id+'&name='+name,
                dataType:"JSON",
                success:function(data){
                    var n = 1,
                        i = 0;
                    total_advance_pay = 0;

                    $('#imytable').DataTable().destroy();
                    $('#imytable tbody').html("");
                    
                    var table = $.each(data,function(index,value){

                        total_advance_pay += value['amount']/1;

                        $('#imytable tbody').append('<tr index="'+i+'" class="odd gradeX">'+
                                
                                '<td>'+ 
                                  '<ul class="addremove">'+
                                      '<li> <button class="btn btn-xs green update_btn" id="'+value['income_id']+'" type="button">  '+
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
                                                  '<p>Are you sure you want to delete row <strong>'+n+'</strong>?</p>'+
                                                '</div>'+
                                                '<div class="modal-footer">'+
                                                  '<button type="button" class="btn btn-default btn-success pull-left" data-dismiss="modal">Close</button>'+
                                                  '<button type="button" class="btn btn-default red delete_btn" data-dismiss="modal" id="'+value['income_id']+'">Delete</button>'+
                                                '</div>'+
                                              '</div>'+

                                            '</div>'+
                                          '</div>'+

                                  '</ul>'+
                                '</td>'+

                                '<td>'+n+'</td>'+
                                '<td>'+value['datee']+'</td>'+
                                '<td>'+value['method']+'</td>'+
                                '<td>'+value['check_number']+'</td>'+
                                '<td id="'+value['bank_id']+'">'+value['bank_name']+'</td>'+
                                '<td name="paid_amount">'+value['amount']+'</td>'+
                                '<td>'+value['description']+'</td>'+
                                '</tr>');
                        n++; i++;
                    });

                    $.when(table).done(function(){
                        $('#iloading').hide();                        
                    });

                    imyDataTable();

                    if( vehicle_id != '' ) 
                    {
                        getFields(vehicle_id,0,name);
                    }    
                    else
                    {
                        getFields(0,borrower_id,name);
                    }
                },
                error:function(){ alertMessage("Failed iFetch Ajax Call.",'error');  $('#iloading').hide(); }
            });
        }
        
        function add(datee,method,check_number,bank_id,amount,vehicle_id,borrower_id,name,description)
        {
            $.ajax({
                url:'ajax/advance_pay/add.php',
                data:{datee:datee,method:method,check_number:check_number,bank_id:bank_id,amount:amount,vehicle_id:vehicle_id,borrower_id:borrower_id,name:name,description:description},
                type:"GET",
                dataType:'JSON',
                success:function(data){
                    if(data['inserted']=='true')
                    {
                        // $('input[name="method"]').reset();
                        $('#bank_id').val("").trigger('change');
                        $('#amount,#check_number,#description').val("");
                        
                        alertMessage('Added Successfully.','success');
                        // loadData();

                        <?php 
                            if($vehicle_id != NULL ) 
                            {
                                echo 'iloadData('.$vehicle_id.',0,"'.$name.'");';
                            }    
                            else
                            {
                                echo 'iloadData(0,'.$borrower_id.',"'.$name.'");';
                            }
                        ?>

                    }
                    else
                        alertMessage("Not Added!",'error')
                },
                error:function(){ alertMessage("Error in Add Ajax Call.",'error') }
            });
        }

        function update(income_id,datee,method,check_number,bank_id,bank_name,amount,vehicle_id,borrower_id,name,description)
        {
            $.ajax({
                url:'ajax/advance_pay/update.php',
                data:{income_id:income_id,datee:datee,method:method,check_number:check_number,bank_id:bank_id,amount:amount,vehicle_id:vehicle_id,borrower_id:borrower_id,name:name,description:description},
                type:"GET",
                dataType:'JSON',
                success:function(data){
                    if(data['updated']=='true')
                    {
                       var i = $('.selectedd').attr('index');
                        var temp = $('#imytable').DataTable().row(i).data();
                        
                        addNewClick();

                        temp[2] = datee;
                        temp[3] = method;
                        temp[4] = check_number;
                        temp[5] = bank_name;
                        temp[6] = amount;
                        temp[7] = description;

                        $('#imytable').DataTable().row(i).data(temp).draw();

                        alertMessage('Updated Successfully.','success');
                    }
                    else
                      alertMessage('Not Updated!','error');   
                },
                error:function(){ alertMessage("Error in Update Ajax Call.",'error') }
            });
        }

        function deletetr(trr,income_id)
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
                    <?php 
                        if($vehicle_id != NULL ) 
                            echo 'getFields('.$vehicle_id.',0,"'.$name.'");';
                             
                        else
                            echo 'getFields(0,'.$borrower_id.',"'.$name.'");';
                    ?>
                  }
                  else
                    alertMessage('Not Deleted!','error');   
                },
                error:function(){ alertMessage("Error in iDelete ajax Call.",'error') }
            });
        }

        function updateClick()
        {
            $('form').addClass('update_form');
            $('#income_id_div,#update_form_btn,#add_new').removeClass('hidden');
            $('#btn_submit,#btn_reset').addClass('hidden');
            $('#datee').focus();
        }

        //UPDATE 
        $(document).on('click','.update_btn',function(){

            updateClick();

            var income_id = $(this).attr('id'),
                trr = $(this).closest('tr');

            $('#imytable tr').each(function(){
                if( $(this).hasClass('selectedd') )
                    $(this).removeClass('selectedd'); 
            });

            trr.addClass('selectedd');   

            $('#income_id').val( income_id );
            $('#datee').val( trr.find('td').eq(2).text() );
            $('form input[value="'+trr.find('td').eq(3).text()+'"]').prop('checked', true).trigger('change');
            $('#check_number').val( trr.find('td').eq(4).text() );
            $('#bank_id').val( trr.find('td').eq(5).attr('id') ).trigger('change');
            $('#amount').val( trr.find('td').eq(6).text() );
            $('#description').val( trr.find('td').eq(7).text() );
        });

        function addNewClick()
        {
            $('form').removeClass('update_form');
            $('#income_id_div,#update_form_btn,#add_new').addClass('hidden');
            $('#btn_submit,#btn_reset').removeClass('hidden');
            $('#btn_reset').trigger('click');
        }

        //ADD NEW  
        $(document).on('click','#add_new',function(){
            addNewClick();
        });

        //DELETE
        $(document).on('click','.delete_btn',function(){
            var income_id = $(this).attr('id'),
                trr = $(this).closest('tr');

            deletetr(trr,income_id);
        });

        //Add & Update
        $('form').submit(function(e){
           e.preventDefault();
           
           var datee = $('#datee').val() ,
               method = $('input[name="method"]:checked').val() ,
               check_number = $('#check_number').val() ,
               bank_id = $('#bank_id').val() ,
               bank_name = $('#bank_id option:selected').text() ,
               amount = $('#amount').val() ,
               vehicle_id = $('#vehicle_id').val() ,
               name = $('#name').val() ,
               description = $('#description').val();
               income_id =  $('#income_id').val();

           if( check_number == '' )
              check_number = null;

           if( bank_id == '' )
           {
              bank_name = null;
              bank_id = null;
           }

           if( $(this).hasClass('update_form') ) 
                update(income_id,datee,method,check_number,bank_id,bank_name,amount,vehicle_id,<?php echo '"'.$borrower_id.'"';?>,name,description);

           else
                add(datee,method,check_number,bank_id,amount,vehicle_id,<?php echo '"'.$borrower_id.'"';?>,name,description);

           $('#datee').focus();
        });
     });
 </script>