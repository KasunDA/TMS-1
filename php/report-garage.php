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
                                <span class="caption-subject bold uppercase">Garage Report</span>
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

                                        <div class="col-md-1">

                                          <button class="btn btn-xs green vehicle_id" para="vehicle_id"  type="button">
                                          
                                            <i class="fa fa-refresh"></i>
                                          
                                          </button>

                                        </div>
                                    </div>
                                    <div class="row">
                                      <div class="form-group">

                                        <label class="col-md-2 control-label">Owner Name:</label>
                                        <div class="col-md-3">
                                            <select class="form-control" id="owner_name" name="owner_name" tabindex="4">
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
                                    
                                    <div class="form-group">
                                        
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-9 col-md-push-2">
                                            <div class="">
                                                <button type="submit" class="btn blue" id="btn_submit" tabindex="5">Check</button>
                                                <!-- <button type="button" class="btn default">Cancel</button> -->
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
                              <div class="col-md-3">
                                  <!-- BEGIN WIDGET THUMB -->
                                  <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                      <h4 class="widget-thumb-heading">Total Expenses</h4>
                                      <div class="widget-thumb-wrap">
                                          <i class="widget-thumb-icon bg-red icon-bar-chart"></i>
                                          <div class="widget-thumb-body">
                                              <span class="widget-thumb-subtitle">PKR</span>
                                              <span class="widget-thumb-body-stat" data-counter="counterup" style="font-size: 15px;" id="total_amount" data-value="0">0</span>
                                          </div>
                                      </div>
                                  </div>
                                  <!-- END WIDGET THUMB -->
                              </div>
                         <div class="col-md-9">

                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    
                                    <div class="portlet-body">
                                 
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="mytable">
                                            <thead>
                                                <tr>
                                                    <th>  </th>
                                                    <th> # </th>
                                                    <th> Date </th>
                                                    <th> Description </th>
                                                    <th> vehicle # </th>
                                                    <th> Owner Name </th>
                                                    <th> Amount </th>
                                                   
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

    //Select2
   $('#vehicle_id,#owner_name').select2({
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

            if( param =='owner_name' )
            {
              $('#'+param).html('<option value="">All</option>');
              
              $.each(data,function(index,value){
                $('#'+param).append('<option value="'+value['owner_name']+'">'+value['owner_name']+'</option> ');
              });
            }
            else
            {  
              $('#'+param).html('<option value="">All</option>');
              
              $.each(data,function(index,value){
                $('#'+param).append('<option value="'+value['vehicle_id']+'">'+value['vehicle_number']+'</option> ');
              });
            }

          $('#'+param).select2({
            width: 'resolve',
            theme: "classic"
          });

          },
          error:function(){  alertMessage('Error in Updating Field Ajax Call.','error') }
        });
    }    

    $(document).on('click','.vehicle_id,.owner_name', function()
    {
    updateField(''+$(this).attr('para')+'');
    });

    function myDataTable()
    {
        var e=$("#mytable");
        e.dataTable({language:{aria:{sortAscending:": activate to sort column ascending",sortDescending:": activate to sort column descending"},emptyTable:"No data available in table",info:"Showing _START_ to _END_ of _TOTAL_ records",infoEmpty:"No records found",infoFiltered:"(filtered1 from _MAX_ total records)",lengthMenu:"Show _MENU_",search:"Search:",zeroRecords:"No matching records found",paginate:{previous:"Prev",next:"Next",last:"Last",first:"First"}},bStateSave:!0,columnDefs:[{targets:0,orderable:!1,searchable:!1}],lengthMenu:[[5,15,20,-1],[5,15,20,"All"]],pageLength:5,pagingType:"bootstrap_full_number",columnDefs:[{orderable:!1,targets:[0]},{searchable:!1,targets:[0]}],order:[[1,"asc"]]});
    }

    myDataTable();

    var total_amount = 0;

    function loadData(from_datee,to_datee,vehicle_id,owner_name)
    {
        $.ajax({
            url:'ajax/garage_entry/detailed_fetch.php',
            data:{from_datee:from_datee,to_datee:to_datee,vehicle_id:vehicle_id,owner_name:owner_name},
            type:"GET",
            dataType:"JSON",
            success:function(data){
                var n = 1;
                    total_amount = 0;

                $('#mytable').DataTable().destroy();
                $('#mytable tbody').html("");
                
                $.each(data,function(index,value){

                  total_amount += value['amount']/1;

                    $('#mytable tbody').append('<tr class="odd gradeX">'+

                            '<td></td>'+                       

                            '<td>'+n+'</td>'+
                            '<td>'+value['datee']+'</td>'+
                            '<td>'+value['description']+'</td>'+
                            '<td id="'+value['vehicle_id']+'">'+value['vehicle_number']+'</td>'+
                            '<td>'+value['owner_name']+'</td>'+
                            '<td name="total_amount">'+value['amount']+'</td>'+
                            '</tr>');

                    n++; 
                })

                myDataTable();
                $('#total_amount').html(total_amount); 
            },
            error:function(){ alertMessage("Failed Fetch Ajax Call.",'error') }
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
           to_datee   = $('#to_datee').val() ,
           vehicle_id = $('#vehicle_id').val(),
           owner_name = $('#owner_name').val();

        loadData(from_datee,to_datee,vehicle_id,owner_name);

    });

 });
</script>