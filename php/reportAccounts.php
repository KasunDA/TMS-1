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
                                <span class="caption-subject bold uppercase">Accounts</span>
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
                                        <label class="col-md-2 control-label">Select Bank:</label>
                                        <div class="col-md-3">
                                             <select class="form-control" name="bank_id" id="bank_id" tabindex="3">
                                                         <option value="">All</option>
                                                         <?php 

                                                          $q = mysqli_query($mycon,'SELECT bank_id,short_form from bank where status=1 ORDER BY bank_id DESC');

                                                          while( $r = mysqli_fetch_array($q) )
                                                            {?>
                                                              <option value="<?php echo $r['bank_id']; ?>"><?php echo $r['short_form']; ?></option>
                                                          <?php } //END OF WHILE ?>
                                                          
                                                     </select>
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
                                 <a href="" class="collapse "> </a>
                             </div>
                         </div>
                         <div class="portlet-body table-both-scroll">
                             <table class="table table-striped table-bordered table-hover table-checkable order-column" id="mytable">
                                 <thead>
                                     <tr>
                                         <th>  </th>
                                         <th> # </th>
                                         <th> Date </th>
                                         <th> Bank </th>
                                         <th> Debit </th>
                                         <th> Credit </th>
                                         <th> Check # </th>
                                         <th> Previous Balance </th>
                                         <th> Current Balance </th>   
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
                <div class="col-md-12">
                    <!-- BEGIN BORDERED TABLE PORTLET-->
                    <div class="portlet light portlet-fit bordered ">
                        
                        <div class="portlet-body ">
                            <div class="table-scrollable  table-scrollable-borderless">
                                <table class="table table-hover table-light" id="table_balance">
                                    <thead>
                                        <tr class="uppercase">
                                            <td> # </td>
                                            <td> Bank Name </td>
                                            <td> Previous Balance </td>
                                            <td> Total Debit</td>
                                            <td> Total Credit</td>
                                            <td> Balance </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END BORDERED TABLE PORTLET-->
                </div>
                <!--  col-md-push-6 
                 <div class="col-md-6">
                     BEGIN BORDERED TABLE PORTLET
                    <div class="portlet light portlet-fit bordered ">
                        
                        <div class="portlet-body ">
                            <div class="table-scrollable  table-scrollable-borderless">
                                <table class="table table-hover table-light">
                                    <thead>
                                        <tr class="uppercase">
                                            <td> # </td>
                                            <td> Previous Balance</td>
                                            <td id="today_previous_balance"></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="uppercase">
                                            <td> 1 </td>
                                            <td> Today Debit </td>
                                            <td id="today_debit"></td>
                                        </tr>
                                        <tr>
                                            <td> 2 </td>
                                            <td> Today Credit </td>
                                            <td id="today_credit"></td>
                                        </tr>
                                        <tr>
                                            <td> 3 </td>
                                            <td> Current Balance </td>
                                            <td id="today_balance"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     END BORDERED TABLE PORTLET
                </div> -->
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


    function loadPreviousBalance(from_datee,to_datee)
    {
        $.ajax({
            url:'ajax/accounts_entry/detailed_fetch_details.php?from_datee='+from_datee+'&to_datee='+to_datee,
            dataType:"JSON",
            success:function(data){
                var n = 1;
                
                $('#table_balance tbody').html("");
                
                $.each(data,function(index,value){
                      
                    $('#table_balance tbody').append('<tr class="odd gradeX">'+

                            '<td>'+n+'</td>'+
                            '<td id="'+value['bank_id']+'">'+value['bank_name']+'</td>'+
                            '<td>'+value['previous_balance']+'</td>'+
                            '<td>'+value['total_debit']+'</td>'+
                            '<td>'+value['total_credit']+'</td>'+
                            '<td>'+value['balance']+'</td>'+
                            '</tr>');
                    n++;
                });
            },
            error:function(){ alert("Failed Previous Balance Fetch Ajax Call.") }
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

    //Select2
   $('#bank_id').select2({
      width: 'resolve'
   });

    function myDataTable()
    {
        var e=$("#mytable");
        e.dataTable({language:{aria:{sortAscending:": activate to sort column ascending",sortDescending:": activate to sort column descending"},emptyTable:"No data available in table",info:"Showing _START_ to _END_ of _TOTAL_ records",infoEmpty:"No records found",infoFiltered:"(filtered1 from _MAX_ total records)",lengthMenu:"Show _MENU_",search:"Search:",zeroRecords:"No matching records found",paginate:{previous:"Prev",next:"Next",last:"Last",first:"First"}},bStateSave:!0,columnDefs:[{targets:0,orderable:!1,searchable:!1}],lengthMenu:[[5,15,20,-1],[5,15,20,"All"]],pageLength:5,pagingType:"bootstrap_full_number",columnDefs:[{orderable:!1,targets:[0]},{searchable:!1,targets:[0]}],order:[[1,"asc"]]});
    }

    myDataTable();

    function loadData(from_datee,to_datee,bank_id)
    {
        $.ajax({
            url:'ajax/accounts_entry/detailed_fetch.php?from_datee='+from_datee+'&to_datee='+to_datee+'&bank_id='+bank_id,
            dataType:"JSON",
            success:function(data){
                var n = 1,
                    old_bank_id = [],
                    nameAttr = '';

                $('#mytable').DataTable().destroy();
                $('#mytable tbody').html("");
                
                $.each(data,function(index,value){

                    if( !old_bank_id.includes(value['bank_id']) )
                    {
                        old_bank_id.push(value['bank_id']);
                        nameAttr = 'name="today_previous_balance"';
                    }
                    else
                    {
                        nameAttr = '';
                    }

                    $('#mytable tbody').append('<tr class="odd gradeX">'+

                            '<td></td>'+                       

                            '<td>'+n+'</td>'+
                            '<td>'+value['datee']+'</td>'+
                            '<td id="'+value['bank_id']+'">'+value['short_form']+'</td>'+
                            '<td name="today_debit">'+value['debit']+'</td>'+
                            '<td name="today_credit">'+value['credit']+'</td>'+
                            '<td>'+value['check_number']+'</td>'+
                            '<td '+nameAttr+'>'+value['previous_balance']+'</td>'+
                            '<td>'+value['current_balance']+'</td>'+
                            '</tr>');

                    n++; 
                })

                myDataTable();

                // var today_previous_balance = getTotal('today_previous_balance');
                //         today_debit = getTotal('today_debit'),
                //         today_credit = getTotal('today_credit'),
                //         today_balance = today_previous_balance + today_credit;

                //     $('#today_previous_balance').html(today_previous_balance);
                //     $('#today_debit').html(today_debit);
                //     $('#today_credit').html(today_credit);
                //     $('#today_balance').html(today_balance-today_debit);
            },
            error:function(){ alert("Failed Fetch Ajax Call.") }
        });
    }

    
    //Add & Update expense 
    $('form').submit(function(e){
       e.preventDefault();
       
       var from_datee = $('#from_datee').val() ,
           to_datee = $('#to_datee').val() ,
           bank_id = $('#bank_id').val();

        loadData(from_datee,to_datee,bank_id);

        loadPreviousBalance(from_datee,to_datee);

    });

 });
</script>