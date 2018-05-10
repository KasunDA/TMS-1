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
                                        <label class="col-md-2 control-label">Select Vehicle:</label>
                                        <div class="col-md-3">
                                             <select class="form-control" name="vehicle_id" id="vehicle_id" tabindex="3">
                                                         <option value="">All</option>
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
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-green">
                            <i class="icon-settings font-green"></i>
                            <span class="caption-subject bold uppercase">Detailed Report</span>
                        </div>
                        <div class="tools">
                            <a href="" class="expand"> </a>
                        </div>
                    </div>
                    <div class="portlet-body table-both-scroll" >  <!-- style="display: none;" -->
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="mytable">
                                        <thead>
                                            <tr>
                                               <th> Transaction ID: </th>
                                                <th> Date </th>
                                                <th> From  </th>
                                                <th> To </th>
                                                <th> Movement </th>
                                                <th> Empty Terminal </th>
                                                <th> Container No </th>
                                                <th> Size </th>
                                                <th> Line </th>
                                                <th> Vehcle No </th>
                                                <th> Advance </th>
                                                <th> Account  </th>
                                                <th> Name </th>
                                                <th> Remarks: No </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         
                                            <tr class="odd gradeX">
                                                <td> 1602365 </td>
                                                <td> 02/3/2018 </td>
                                                <td> DPWM-1 </td>
                                                <td> QICT </td>
                                                <td> EMPTY </td>
                                                <td> PCT-PQ </td>
                                                <td> MRKU4990688 </td>
                                                <td> 40 </td>
                                                <td> N/A </td>
                                                <td> JT8685 </td>
                                                <td> 500 </td>
                                                <td> QICT </td>
                                                <td> POS.PQ </td>
                                                <td> N/A </td>

                                            </tr>
                                                     
                                                       
                                          
                                             
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
                        <div class="table-scrollable  table-scrollable-borderless">
                            <table class="table table-hover table-light">
                                <thead>
                                    <tr class="uppercase">
                                        <td> # </td>
                                        <td> Total Trips </td>
                                        <td> 90 </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="uppercase">
                                        <td> 1 </td>
                                        <td> Advance Taken </td>
                                        <td> 9000 </td>
                                    </tr>
                                    <tr>
                                        <td> 2 </td>
                                        <td> Balance (Total of all trips) </td>
                                        <td> 80000 </td>
                                    </tr>
                                    <tr>
                                        <td> 3 </td>
                                        <td> Diesle </td>
                                        <td> 6000 </td>
                                    </tr>
                                    <tr>
                                        <td> 4 </td>
                                        <td> Repair & Maintenance </td>
                                        <td> 20000</td>
                                    </tr>
                                    <tr>
                                        <td> 5 </td>
                                        <td> Driver Salary</td>
                                        <td> 20000</td>
                                    </tr>
                                    <tr>
                                        <td> 6 </td>
                                        <td> Paid </td>
                                        <td> 0</td>
                                    </tr>
                                    <tr>
                                        <td> 7 </td>
                                        <td> Total Balance </td>
                                        <td> 40000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END BORDERED TABLE PORTLET-->
            </div>
            <div class="col-md-6">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase">Debit:</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form class="form-horizontal" role="form">
                            <div class="form-body">
                                <div class="row"> 
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">voucher #:</label>
                                        <div class="col-md-5">
                                           <input type="text" class="form-control" placeholder="58680">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Payment Method</label>
                                        <div class="col-md-5">
                                            <div class="mt-radio-list">
                                                <label class="mt-radio">
                                                    <input type="radio" name="optionsRadios" id="optionsRadios22" value="option1" checked> Check
                                                    <span></span>
                                                </label>
                                                <label class="mt-radio">
                                                    <input type="radio" name="optionsRadios" id="optionsRadios23" value="option2" checked> Cash
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Check #</label>
                                        <div class="col-md-5">
                                           <input type="text" class="form-control" placeholder="58680">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Bank Name</label>
                                        <div class="col-md-5">
                                           <input type="text" class="form-control" placeholder="HBL">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Amount</label>
                                        <div class="col-md-5">
                                           <input type="text" class="form-control" placeholder="58680">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-5 col-md-push-4">
                                            <div class="">
                                                <button type="submit" class="btn blue">Submit</button> 
                                                <button type="button" class="btn default">Cancel</button>
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

    //Select2
   $('#vehicle_id').select2({
      width: 'resolve'
   });

    function myDataTable()
    {
        var e=$("#mytable");
        e.dataTable({language:{aria:{sortAscending:": activate to sort column ascending",sortDescending:": activate to sort column descending"},emptyTable:"No data available in table",info:"Showing _START_ to _END_ of _TOTAL_ records",infoEmpty:"No records found",infoFiltered:"(filtered1 from _MAX_ total records)",lengthMenu:"Show _MENU_",search:"Search:",zeroRecords:"No matching records found",paginate:{previous:"Prev",next:"Next",last:"Last",first:"First"}},bStateSave:!0,columnDefs:[{targets:0,orderable:!1,searchable:!1}],lengthMenu:[[5,15,20,-1],[5,15,20,"All"]],pageLength:5,pagingType:"bootstrap_full_number",columnDefs:[{orderable:!1,targets:[0]},{searchable:!1,targets:[0]}],order:[[1,"asc"]]});
    }

    myDataTable();

    function loadData(from_datee,to_datee,vehicle_id)
    {
        $.ajax({
            url:'ajax/garage_entry/detailed_fetch.php?from_datee='+from_datee+'&to_datee='+to_datee+'&vehicle_id='+vehicle_id,
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
                            '<td>'+value['description']+'</td>'+
                            '<td id="'+value['vehicle_id']+'">'+value['vehicle_number']+'</td>'+
                            '<td name="total_amount">'+value['amount']+'</td>'+
                            '</tr>');

                    n++; 
                })

                myDataTable();
                $('#total_amount').html(getTotal('total_amount')); 
            },
            error:function(){ alert("Failed Fetch Ajax Call.") }
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
    
    //Add & Update expense 
    $('form').submit(function(e){
       e.preventDefault();
       
       var from_datee = $('#from_datee').val() ,
           to_datee = $('#to_datee').val() ,
           vehicle_id = $('#vehicle_id').val();

        loadData(from_datee,to_datee,vehicle_id);

    });

 });
</script> 