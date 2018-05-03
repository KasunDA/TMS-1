<?php 
include 'header.php';
include 'nav.php';
require 'connection.php';

if( !isset( $_GET['vehicle_id']) ||  $_GET['vehicle_id'] == NULL || !isset( $_GET['name']) ||  $_GET['name'] == NULL )
{
    echo '<script>location.assign("dailyAdvanceRecover.php");</script>';
}

$vehicle_id = $_GET['vehicle_id'];
$name = $_GET['name'];
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
                                <span class="caption-subject bold uppercase">Advance Payment</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form class="form-horizontal" role="form">
                                <div class="form-body">
                                    <div class="row"> 
                                        <div class="form-group">  
                                            <label class="col-md-2 control-label">Date:</label>
                                            <div class="col-md-3">
                                              <input type="date" class="form-control" id="datee" readonly name="datee" value="<?php echo date('Y-m-d'); ?>" required  />
                                            </div>
                                        
                                            <label class="col-md-2 control-label">Description:</label>
                                            <div class="col-md-3">
                                               <select class="form-control" name="dd_id" id="dd_id" readonly >
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
                                                        <input type="radio" name="method" id="optionsRadios22" value="cash" checked tabindex="1"> Cash 
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
                                            <label class="col-md-2 control-label">Vehicle #:</label>
                                            <div class="col-md-3">
                                                <select class="form-control" id="vehicle_id" disabled name="vehicle_id" tabindex="-1" >
                                                    <option value="">Select Vehicle</option>
                                                      <?php 

                                                  $q = mysqli_query($mycon,'SELECT vehicle_id,vehicle_number from vehicle where status=1 ORDER BY vehicle_id DESC');

                                                  while( $r = mysqli_fetch_array($q) )
                                                    {?>
                                                      <option value="<?php echo $r['vehicle_id']; ?>"><?php echo $r['vehicle_number']; ?></option>
                                              <?php } //END OF WHILE ?>
                                                  </select>
                                            </div>

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
                                                    <!-- <button type="reset" class="btn default" id="btn_reset" tabindex="8">Cancel</button> -->

                                                   <!--  <button type="submit" class="btn blue hidden" id="update_form_btn" tabindex="11">Update</button>
                                                    <button type="button" class="btn default hidden"  id="add_new" tabindex="12">Add New</button> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                
                            </form>
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
                         </div>
                         <div class="portlet-body table-both-scroll" > <!-- style="display: none;" -->
                             <table class="table table-striped table-bordered table-hover table-checkable order-column" id="mytable">
                                 <thead>
                                     <tr>
                                         <th> # </th>
                                         <th> Date </th>
                                         <th> Name </th>
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
                         </div>
                         <div class="portlet-body table-both-scroll" >  <!-- style="display: none;" -->
                             <table class="table table-striped table-bordered table-hover table-checkable order-column" id="imytable">
                                 <thead>
                                     <tr>
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

        //Select2
       $('#bank_id').select2({
          width: 'resolve'
       });

       $('#vehicle_id').val(<?php echo $vehicle_id; ?>).trigger('change');
       //$('#vehicle_id').attr('disabled');

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
            var e=$("#mytable");
            e.dataTable({language:{aria:{sortAscending:": activate to sort column ascending",sortDescending:": activate to sort column descending"},emptyTable:"No data available in table",info:"Showing _START_ to _END_ of _TOTAL_ records",infoEmpty:"No records found",infoFiltered:"(filtered1 from _MAX_ total records)",lengthMenu:"Show _MENU_",search:"Search:",zeroRecords:"No matching records found",paginate:{previous:"Prev",next:"Next",last:"Last",first:"First"}},bStateSave:!0,columnDefs:[{targets:0,orderable:!1,searchable:!1}],lengthMenu:[[5,15,20,-1],[5,15,20,"All"]],pageLength:5,pagingType:"bootstrap_full_number",columnDefs:[{orderable:!1,targets:[0]},{searchable:!1,targets:[0]}],order:[[1,"asc"]]});
        }

        function imyDataTable()
        {
            var e=$("#imytable");
            e.dataTable({language:{aria:{sortAscending:": activate to sort column ascending",sortDescending:": activate to sort column descending"},emptyTable:"No data available in table",info:"Showing _START_ to _END_ of _TOTAL_ records",infoEmpty:"No records found",infoFiltered:"(filtered1 from _MAX_ total records)",lengthMenu:"Show _MENU_",search:"Search:",zeroRecords:"No matching records found",paginate:{previous:"Prev",next:"Next",last:"Last",first:"First"}},bStateSave:!0,columnDefs:[{targets:0,orderable:!1,searchable:!1}],lengthMenu:[[5,15,20,-1],[5,15,20,"All"]],pageLength:5,pagingType:"bootstrap_full_number",columnDefs:[{orderable:!1,targets:[0]},{searchable:!1,targets:[0]}],order:[[1,"asc"]]});
        }

        function loadData(vehicle_id,name)
        {
            $.ajax({
                url:'ajax/advance_pay/fetch_details.php?vehicle_id='+<?php echo $vehicle_id; ?>+'&name='+<?php echo '"'.$name.'"';?>,
                dataType:"JSON",
                success:function(data){
                    var n = 1;
                    var i = 0;

                    $('#mytable').DataTable().destroy();
                    $('tbody').html("");
                    
                    $.each(data,function(index,value){

                        $('#mytable tbody').append('<tr index="'+i+'" class="odd gradeX">'+

                                                  

                                '<td>'+n+'</td>'+
                                '<td>'+value['datee']+'</td>'+
                                '<td>'+value['name']+'</td>'+
                                '<td>'+value['description']+'</td>'+
                                '<td name="total">'+value['amount']+'</td>'+
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
                url:'ajax/advance_pay/ifetch.php?vehicle_id='+<?php echo $vehicle_id; ?>+'&name='+<?php echo '"'.$name.'"';?>,
                dataType:"JSON",
                success:function(data){
                    var n = 1;
                    var i = 0;

                    $('#imytable').DataTable().destroy();
                    $('#imytable tbody').html("");
                    
                    $.each(data,function(index,value){

                        $('#imytable tbody').append('<tr index="'+i+'" class="odd gradeX">'+

                                '<td>'+n+'</td>'+
                                '<td>'+value['datee']+'</td>'+
                                '<td>'+value['method']+'</td>'+
                                '<td>'+value['check_number']+'</td>'+
                                '<td id="'+value['bank_id']+'">'+value['bank_name']+'</td>'+
                                '<td name="paid_amount">'+value['amount']+'</td>'+
                                '<td>'+value['description']+'</td>'+
                                '</tr>');

                        n++; i++;
                    })

                    imyDataTable();
                    calculateSumPA();
                },
                error:function(){ alert("Failed iFetch Ajax Call.") }
            });
        }

        iloadData();

        function add(datee,method,check_number,bank_id,amount,vehicle_id,name,description)
        {
            $.ajax({
                url:'ajax/advance_pay/add.php?datee='+datee+'&method='+method+'&check_number='+check_number+'&bank_id='+bank_id+'&amount='+amount+'&vehicle_id='+vehicle_id+'&name='+encodeURIComponent(name)+'&description='+encodeURIComponent(description),
                type:"POST",
                success:function(data){
                    if(data)
                    {
                        // $('input[name="method"]').reset();
                        $('#bank_id').val("").trigger('change');
                        $('#amount,#check_number,#description').val("");
                        
                        loadData();
                        iloadData();
                    }
                },
                error:function(){ alert("Error in Add Ajax Call.") }
            });
        }

        //Add & Update
        $('form').submit(function(e){
           e.preventDefault();
           
           var datee = $('#datee').val() ,
               method = $('input[name="method"]:checked').val() ,
               check_number = $('#check_number').val() ,
               bank_id = $('#bank_id').val() ,
               //bank_name = $('#bank_id option:selected').text() ,
               amount = $('#amount').val() ,
               vehicle_id = $('#vehicle_id').val() ,
               //vehicle_number = $('#vehicle_id option:selected').text() ,
               name = $('#name').val() ,
               description = $('#description').val();
               //expense_id =  $('#expense_id').val();

            add(datee,method,check_number,bank_id,amount,vehicle_id,name,description);
           
        });



     });
 </script>