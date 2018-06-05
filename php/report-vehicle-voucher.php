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
                            <span class="caption-subject bold uppercase">Voucher Vehicle Detailed Report</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form class="form-horizontal" role="form" method="post" id="form">
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
                            <span class="caption-subject bold uppercase">Voucher Detailed Report</span>
                        </div>
                        <div class="tools">
                            <a href="" class="expand"> </a>
                        </div>
                    </div>
                    <div class="portlet-body table-both-scroll" >  <!-- style="display: none;" -->
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="mytable">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th> # </th>
                                                <th> Voucher # </th>
                                                <th> Date </th>
                                                <th> Method </th>
                                                <th> Check # </th>
                                                <th> Bank Name  </th>
                                                <th> Vehicle # </th>
                                                <th> Amount </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                    </div>
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
   $('#vehicle_id').select2({
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
              $('#'+param).append('<option value="'+value['vehicle_id']+'">'+value['vehicle_number']+'</option> ');
            });

          $('#'+param).select2({
            width: 'resolve',
            theme: "classic"
          });

          },
          error:function(){  alert('Error in Updating Field Ajax Call.') }
        });
    }    

    $(document).on('click','.vehicle_id', function()
    {
    updateField(''+$(this).attr('para')+'');
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
            url:'ajax/voucher/fetch_voucher.php?from_datee='+from_datee+'&to_datee='+to_datee+'&vehicle_id='+vehicle_id,
            dataType:"JSON",
            success:function(data){
                var n = 1;

                $('#mytable').DataTable().destroy();
                $('#mytable tbody').html("");
                
                $.each(data,function(index,value){

                    $('#mytable tbody').append('<tr class="odd gradeX">'+

                            '<td></td>'+     
                            '<td>'+n+'</td>'+
                            '<td>'+value['voucher_number']+'</td>'+
                            '<td>'+value['datee']+'</td>'+
                            '<td>'+value['method']+'</td>'+
                            '<td>'+value['check_number']+'</td>'+
                            '<td>'+value['bank_name']+'</td>'+
                            '<td>'+value['vehicle_number']+'</td>'+
                            '<td>'+value['amount']+'</td>'+
                            '</tr>');

                    n++;
                })

                myDataTable();

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

    function getRecords(from_datee,to_datee,vehicle_id)
    {
        $.ajax({
            url:'ajax/vehicle/vehicle_records.php?from_datee='+from_datee+'&to_datee='+to_datee+'&vehicle_id='+vehicle_id,
            dataType:"JSON",
            success: function(data){
                
                $.each(data,function(index,value){
                    $('#advance_taken').html(value['total_remaining_advance']);
                    $('#advance_taken_owner').html(value['total_remaining_advance_owner']);
                    $('#total_diesel').html(value['total_de_amount']);
                    $('#total_rm').html(value['total_rm_amount']);
                    $('#driver_salary').html(value['total_driver_salary']);
                    $('#paid_salary').html(value['total_paid_salary']);
                });
            },
            error: function(){ alert("Failed Fetch Records.") }, 
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
            error:function(){ alert("Error in Add Ajax Call.") }
        });
    }
    
    //Add & Update expense 
    $('#form').submit(function(e){
       e.preventDefault();
       
       var from_datee = $('#from_datee').val() ,
           to_datee = $('#to_datee').val() ,
           vehicle_id = $('#vehicle_id').val();


        loadData(from_datee,to_datee,vehicle_id);

    });

    //Add & Update expense 
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

 });
</script> 