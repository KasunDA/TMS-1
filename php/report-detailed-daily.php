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
                            <span class="caption-subject bold uppercase">Daily Detailed Expense</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form class="form-horizontal" role="form" method="post">
                            <div class="form-body">
                                <div class="row"> 
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Date Range</label>
                                        <div class="col-md-3">
                                            <div class="input-group input-large date-picker input-daterange">
                                                <input type="text" class="form-control"  id="from_datee" name="from_datee" required tabindex="1" <?php echo 'value="'.date('m/d/Y').'"'; ?> placeholder="mm/dd/yyyy">
                                                <span class="input-group-addon"> to </span>
                                                <input type="text" class="form-control" id="to_datee" name="to_datee" required tabindex="2" <?php echo 'value="'.date('m/d/Y').'"'; ?> placeholder="mm/dd/yyyy"> </div>
                                            <!-- /input-group -->
                                        </div>
                                        <label class="col-md-2 control-label">Select Daily Description:</label>
                                        <div class="col-md-3">
                                             <select class="form-control" name="dd_id" id="dd_id" tabindex="3">
                                                         <option value="">All</option>
                                                         <?php 

                                                          $q = mysqli_query($mycon,'SELECT dd_id,name from daily_description where status=1 and dd_id!=6 and dd_id!=7 ORDER BY dd_id DESC');

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
                                        
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-9 col-md-push-2">
                                            <div class="">
                                                <button type="submit" class="btn blue" id="btn_submit" tabindex="4">Check</button>
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
            <div class="col-md-6">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-green">
                            <i class="icon-settings font-green"></i>
                            <span class="caption-subject bold uppercase">Detailed Expense</span>
                        </div>
                        <!-- <div class="tools">
                            <a href="" class="expand"> </a>
                            <a href="" class="remove"> </a>
                        </div> -->
                    </div>
                    <div class="portlet-body table-both-scroll" > <!-- style="display: none;" -->
                        <table class="table table-striped table-bordered table-hover order-column" id="mytable">
                            <thead>
                                     <tr>
                                         <th>  </th>
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
                                         <th> Description </th>    
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
                        <div class="caption font-red">
                            <i class="icon-settings font-red"></i>
                            <span class="caption-subject bold uppercase">Detailed Income</span>
                        </div>
                        <!-- <div class="tools">
                            <a href="" class="expand"> </a>
                            <a href="" class="remove"> </a>
                        </div> -->
                    </div>
                    <div class="portlet-body table-both-scroll" > <!-- style="display: none;" -->
                        <table class="table table-striped table-bordered table-hover order-column" id="imytable">
                           <thead>
                                 <tr>
                                     <th>  </th>
                                     <th> # </th>
                                     <th> Date </th>
                                     <th> Daily Description  </th>
                                     <th> Method </th>
                                     <th> Check # </th>
                                     <th> Bank Name </th>
                                     <th> Amount </th>
                                     <th> Company Name </th>
                                     <th> Vehicle # </th>
                                     <th> Name </th>
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
                                        <th> # </th>
                                        <th> Previous Balance </th>
                                        <th id="previous_balance"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> 2 </td>
                                        <td> Total Income </td>
                                        <td id="total_income"></td>
                                    </tr>
                                    <tr>
                                        <td> 3 </td>
                                        <td> Total Expense </td>
                                        <td id="total_expense"></td>
                                    </tr>
                                    <tr>
                                        <td> 4 </td>
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
<script type="text/javascript">
 
 $(document).ready(function(){

    function getPreviousBalance(from_datee,to_datee)
    {
       $.ajax({
            url:'ajax/detailed_get_previous_balance.php?from_datee='+from_datee+'&to_datee='+to_datee,
            dataType:"JSON",
            success:function(data){
                
                $.each(data,function(index,value){

                    $('#previous_balance').html(value['previous_balance']);
                    $('#total_income').html(value['total_income']);
                    $('#total_expense').html(value['total_expense']);
                    $('#balance').html(value['balance']);

                })
            },
            error:function(){ alertMessage("Failed Get Previous Balance Fetch Ajax Call.",'error') }
        });
    }

    //Select2
   $('#dd_id').select2({
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


            $('#'+param).html('<option value="">All</option>');
            
            $.each(data,function(index,value){
              $('#'+param).append('<option value="'+value['dd_id']+'">'+value['name']+'</option> ');
            });

          $('#'+param).select2({
            width: 'resolve',
            theme: "classic"
          });

          },
          error:function(){  alertMessage('Error in Updating Field Ajax Call.','error') }
        });
    }    

    $(document).on('click','.dd_id', function()
    {
    updateField(''+$(this).attr('para')+'');
    });

    function myDataTable()
    {
        var e=$("#mytable");
        e.dataTable({language:{aria:{sortAscending:": activate to sort column ascending",sortDescending:": activate to sort column descending"},emptyTable:"No data available in table",info:"Showing _START_ to _END_ of _TOTAL_ records",infoEmpty:"No records found",infoFiltered:"(filtered1 from _MAX_ total records)",lengthMenu:"Show _MENU_",search:"Search:",zeroRecords:"No matching records found",paginate:{previous:"Prev",next:"Next",last:"Last",first:"First"}},bStateSave:!0,columnDefs:[{targets:0,orderable:!1,searchable:!1}],lengthMenu:[[5,15,20,-1],[5,15,20,"All"]],pageLength:5,pagingType:"bootstrap_full_number",columnDefs:[{orderable:!1,targets:[0]},{searchable:!1,targets:[0]}],order:[[1,"asc"]]});
    }

    myDataTable();

    function imyDataTable()
    {
        var e=$("#imytable");
        e.dataTable({language:{aria:{sortAscending:": activate to sort column ascending",sortDescending:": activate to sort column descending"},emptyTable:"No data available in table",info:"Showing _START_ to _END_ of _TOTAL_ records",infoEmpty:"No records found",infoFiltered:"(filtered1 from _MAX_ total records)",lengthMenu:"Show _MENU_",search:"Search:",zeroRecords:"No matching records found",paginate:{previous:"Prev",next:"Next",last:"Last",first:"First"}},bStateSave:!0,columnDefs:[{targets:0,orderable:!1,searchable:!1}],lengthMenu:[[5,15,20,-1],[5,15,20,"All"]],pageLength:5,pagingType:"bootstrap_full_number",columnDefs:[{orderable:!1,targets:[0]},{searchable:!1,targets:[0]}],order:[[1,"asc"]]});
    }

    imyDataTable();

    function loadData(from_datee,to_datee,dd_id)
    {
        $.ajax({
            url:'ajax/expenses/detailed_fetch.php?from_datee='+from_datee+'&to_datee='+to_datee+'&dd_id='+dd_id,
            dataType:"JSON",
            success:function(data){
                var n = 1;

                $('#mytable').DataTable().destroy();
                $('#mytable tbody').html("");
                
                $.each(data,function(index,value){

                    $('#mytable tbody').append('<tr class="odd gradeX">'+

                            '<td></td>'+                       

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
                            '<td>'+value['description']+'</td>'+
                            '</tr>');

                    n++; 
                })

                myDataTable();
            },
            error:function(){ alertMessage("Failed Fetch Ajax Call.",'error') }
        });
    }

    function iloadData(from_datee,to_datee,dd_id)
    {
        $.ajax({
            url:'ajax/income/detailed_fetch.php?from_datee='+from_datee+'&to_datee='+to_datee+'&dd_id='+dd_id,
            dataType:"JSON",
            success:function(data){
                var n = 1;

                $('#imytable').DataTable().destroy();
                $('#imytable tbody').html("");
                
                $.each(data,function(index,value){

                    $('#imytable tbody').append('<tr class="odd gradeX">'+

                            '<td></td>'+                       

                            '<td>'+n+'</td>'+
                            '<td>'+value['datee']+'</td>'+
                            '<td id="'+value['dd_id']+'">'+value['dd_name']+'</td>'+
                            '<td>'+value['method']+'</td>'+
                            '<td>'+value['check_number']+'</td>'+
                            '<td id="'+value['bank_id']+'">'+value['bank_name']+'</td>'+
                            '<td>'+value['amount']+'</td>'+
                            '<td id="'+value['cmp_id']+'">'+value['cmp_name']+'</td>'+
                            '<td id="'+value['vehicle_id']+'">'+value['vehicle_number']+'</td>'+
                            '<td>'+value['name']+'</td>'+
                            '<td>'+value['description']+'</td>'+
                            '</tr>');

                    n++;
                })

                imyDataTable();
            },
            error:function(){ alertMessage("Failed iFetch Ajax Call.",'error') }
        });
    }
    
    //Add & Update expense 
    $('form').submit(function(e){
       e.preventDefault();
       
       var from_datee = $('#from_datee').val() ,
           to_datee = $('#to_datee').val() ,
           dd_id = $('#dd_id').val();

        loadData(from_datee,to_datee,dd_id);
        iloadData(from_datee,to_datee,dd_id); 
        getPreviousBalance(from_datee,to_datee)  

    });

 });
</script>