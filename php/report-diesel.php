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
                                <span class="caption-subject bold uppercase">Diesel Report</span>
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
                                 <a href="" class="collapse"> </a>
                             </div>
                         </div>
                         <div class="portlet-body table-both-scroll">
                             <table class="table table-striped table-bordered table-hover table-checkable order-column" id="mytable">
                                 <thead>
                                     <tr>
                                         <th></th>
                                         <th> # </th>
                                         <th> Date </th>
                                         <th> Vehicle # </th>
                                         <th> From </th>
                                         <th> To </th>
                                         <th> 1 Liter Rate </th>
                                         <th> Liters </th>  
                                         <th> Extra Liters </th>   
                                         <th> Total Price </th>   
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
                                    
                                    <tbody>
                                        <tr class="uppercase">
                                            <td> 1 </td>
                                            <td> Total Liters </td>
                                            <td id="total_litres"></td>
                                        </tr>
                                        <tr>
                                            <td> 2 </td>
                                            <td> Extra Liters </td>
                                            <td id="extra_litres"></td>
                                        </tr>
                                        <tr>
                                            <td> 3 </td>
                                            <td> Total Price </td>
                                            <td id="total_price"></td>
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
<!-- END CONTAINER -->
<?php 
include 'footer.php';
 ?>

<script src="../assets/global/scripts/select2.full.min.js"></script>
<script type="text/javascript">
 
 $(document).ready(function(){

    //Select2
   $('#vehicle_id').select2({
      width: 'resolve',
      theme: "classic"
   });
   $('.select2-selection').addClass('select');

    function myDataTable()
    {
        var e=$("#mytable");
        e.dataTable({language:{aria:{sortAscending:": activate to sort column ascending",sortDescending:": activate to sort column descending"},emptyTable:"No data available in table",info:"Showing _START_ to _END_ of _TOTAL_ records",infoEmpty:"No records found",infoFiltered:"(filtered1 from _MAX_ total records)",lengthMenu:"Show _MENU_",search:"Search:",zeroRecords:"No matching records found",paginate:{previous:"Prev",next:"Next",last:"Last",first:"First"}},bStateSave:!0,columnDefs:[{targets:0,orderable:!1,searchable:!1}],lengthMenu:[[5,15,20,-1],[5,15,20,"All"]],pageLength:5,pagingType:"bootstrap_full_number",columnDefs:[{orderable:!1,targets:[0]},{searchable:!1,targets:[0]}],order:[[1,"asc"]]});
    }

    myDataTable();

    var total_litres =  0,
        extra_litres =  0,
        total_price  =  0;

    function loadData(from_datee,to_datee,vehicle_id)
    {
        $.ajax({
            url:'ajax/diesel_entry/detailed_fetch.php?from_datee='+from_datee+'&to_datee='+to_datee+'&vehicle_id='+vehicle_id,
            dataType:"JSON",
            //async:false,
            success:function(data){
                var n = 1;
                    total_litres =  0;
                    extra_litres =  0;
                    total_price  =  0;

                $('#mytable').DataTable().destroy();
                $('#mytable tbody').html("");
                
                $.each(data,function(index,value){

                    total_litres +=  value['litres']/1,
                    extra_litres +=  value['extra_litres']/1,
                    total_price  +=  value['total']/1;

                    $('#mytable tbody').append('<tr class="odd gradeX">'+

                            '<td></td>'+                       

                            '<td>'+n+'</td>'+
                            '<td>'+value['datee']+'</td>'+
                            '<td id="'+value['vehicle_id']+'">'+value['vehicle_number']+'</td>'+
                            '<td id="'+value['from_yard_id']+'">'+value['from_yard']+'</td>'+
                            '<td id="'+value['to_yard_id']+'">'+value['to_yard']+'</td>'+
                            '<td name="litre_rate">'+value['litre_rate']+'</td>'+
                            '<td name="litres">'+value['litres']+'</td>'+
                            '<td name="extra_litres">'+value['extra_litres']+'</td>'+
                            '<td name="total_price">'+value['total']+'</td>'+
                            '<td>'+value['description']+'</td>'+
                            '</tr>');

                    n++; 
                })

                myDataTable();
                $('#total_litres').text(total_litres);
                $('#extra_litres').text(extra_litres);
                $('#total_price').text(total_price);

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