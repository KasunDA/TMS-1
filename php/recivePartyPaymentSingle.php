<?php 
include 'header.php';
include 'nav.php';
require 'connection.php';
date_default_timezone_set("Asia/Karachi");

if( !isset( $_GET['cm_id']) ||  $_GET['cm_id'] == NULL  )
{
    echo '<script>location.assign("recivePartyPayment.php");</script>';
}

$cm_id = $_GET['cm_id'];
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
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-green">
                            <i class="icon-settings font-green"></i>
                            <?php
                                $coa_id_q = mysqli_query($mycon,"SELECT coa_id FROM container_movement WHERE cm_id=$cm_id");
                                $r_coa_id = mysqli_fetch_array($coa_id_q);
                                
                                $party_name_q = mysqli_query($mycon,"SELECT full_form FROM chart_of_account WHERE coa_id=".$r_coa_id['coa_id']);
                                $r_party_name = mysqli_fetch_array($party_name_q);
                            ?>
                            <span class="caption-subject bold uppercase">Party : <?php echo $r_party_name['full_form'] ?></span>
                        </div>
                        <div class="tools">
                            <a href="" class="collapse"> </a>
                            <a href="" class="remove"> </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover order-column" id="mytable">
                            <thead>
                                <tr>
                                    <th> Status </th>
                                    <th> Date </th>
                                    <th> Agent Name </th>
                                    <th> Chart of Account </th>
                                    <th> Consignee </th>
                                    <th> Movement </th>
                                    <th> Empty Terminal </th>
                                    <th> From  </th>
                                    <th> To </th>
                                    <th> Size </th>
                                    <th> Lot Of </th>
                                    <th> Line </th>
                                    <th> BL_CRO_Number </th>
                                    <th> Job # </th>
                                    <th> Index # </th>
                                    <th> Container Type </th>
                                    <th> Lolo Charges </th>
                                    <th> Weight Charges </th>
                                    <th> Party Charges </th>
                                    <th> Total Party Bill </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr>
                                    <td><span class="label label-sm label-danger"> Unpaid </span></td>
                                    <td>12-3-2018</td>
                                    <td>Tayyab</td>
                                    <td>QICT</td>
                                    <td>Agha Steel</td>
                                    <td>QICT</td>
                                    <td>MSC</td>
                                    <td>MSCUU7786</td>
                                    <td>22</td>
                                    <td>8000</td>
                                    <td>176000</td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable table-scrollable-borderless">
                            <table class="table table-hover table-light" id="entry_table">
                                <thead>
                                    <tr class="uppercase">
                                        <th> # </th>
                                        <!-- <th> Name </th> -->
                                        <th> Container Type </th>
                                        <th> Container # </th>
                                        <th> Vehicle # </th>
                                        <th> CONT. Size </th>
                                        <th> Index No. </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-9">
                                <div class="">
                                    <button type="submit" class="btn blue">Print</button> 
                                    <button type="button" class="btn default">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row"  >  
            <?php
            if(!isset($_SESSION['disable_btn']) )
            {?>
            <div class="col-md-6 col-md-push-6" id="party_received_div"> <!--   style="display: none;" -->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase">Payment Received:</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form class="form-horizontal" role="form" id="voucher_form" method="post">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="form-group">
                                          <label class="col-md-4 control-label">Voucher #:</label>
                                          <div class="col-md-5">
                                            <input type="text" class="form-control" id="voucher_number" name="voucher_number" required readonly >
                                          </div>
                                        </div>
                                    </div>
                                    <div class="row"> 
                                        <div class="form-group">  
                                            <label class="col-md-4 control-label">Date:</label>
                                            <div class="col-md-5">
                                              <input type="date" class="form-control" id="datee" name="datee"  value="<?php echo date('Y-m-d'); ?>" required tabindex="1" />
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Payment Method</label>
                                            <div class="col-md-5">
                                                <div class="mt-radio-list">
                                                    <label class="mt-radio">
                                                        <input type="radio" name="method" id="optionsRadios22" value="cash" checked tabindex="2"> Cash 
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio">
                                                        <input type="radio" name="method" id="optionsRadios23" value="check" tabindex="3"> Check
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="hidden" id="check_number_div">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Check No.</label>
                                            <div class="col-md-5">
                                               <input type="number" name="check_number" min="0" id="check_number" tabindex="4" class="form-control" placeholder="5033554">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Bank Name</label>
                                            <div class="col-md-5">
                                               <select class="form-control" id="bank_id" name="bank_id" tabindex="5">
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
                                               <input type="number" min="1"  name="amount" id="amount" required tabindex="6" class="form-control" placeholder="58680">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-5 col-md-push-4">
                                                <div class="">
                                                    <button type="submit" class="btn blue" id="btn_submit" tabindex="7">Submit</button> 
                                                    <button type="reset" class="btn default" id="btn_reset" tabindex="8">Cancel</button>
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
            <?php }//END OF IF?> 

            <div class="col-md-12" id="voucher_div">
                <!-- BEGIN BORDERED TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered ">
                    
                    <div class="portlet-body">
                        <div class="table-scrollable table-scrollable-borderless">
                            <table class="table table-hover table-light" id="voucher_table">
                                <thead>
                                    <tr class="uppercase">
                                        <th> Voucher # </th>
                                        <th> Date </th>
                                        <th> Method </th>
                                        <th> Check # </th>
                                        <th> Bank Name </th>
                                        <th> Amount </th>
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
                            '<td id="'+value['coa_id']+'">'+value['bank_name']+'</td>'+
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
      width: 'resolve',
      theme: "classic"
   });
   $('.select2-selection').addClass('select');

    function myDataTable()
    {
        var e=$("#mytable");
        e.dataTable({language:{aria:{sortAscending:": activate to sort column ascending",sortDescending:": activate to sort column descending"},emptyTable:"No data available in table",info:"Showing _START_ to _END_ of _TOTAL_ records",infoEmpty:"No records found",infoFiltered:"(filtered1 from _MAX_ total records)",lengthMenu:"Show _MENU_",search:"Search:",zeroRecords:"No matching records found",paginate:{previous:"Prev",next:"Next",last:"Last",first:"First"}},bStateSave:!0,columnDefs:[{targets:0,orderable:!1,searchable:!1}],lengthMenu:[[5,15,20,-1],[5,15,20,"All"]],pageLength:5,pagingType:"bootstrap_full_number",columnDefs:[{orderable:!1,targets:[0]},{searchable:!1,targets:[0]}],order:[[1,"asc"]]});
    }

    function iloadData(cm_id)
    {
        $.ajax({
            url:'ajax/container_movement/detailed_fetch.php?cm_id='+cm_id,
            dataType:"JSON",
            success:function(data){
                var n = 1,
                    status=null;

                $('#mytable').DataTable().destroy();
                $('#mytable tbody').html("");
                
                $.each(data,function(index,value){


                    if( value['paid_status'] == 1 )
                    {                        
                        status = '<span class="label label-sm label-success"> paid </span>';
                        $('#party_received_div').hide();

                        $('#voucher_div').show();
                        loadVoucher(<?php echo $cm_id; ?>);

                    }
                    else
                    {
                        status = '<span class="label label-sm label-danger"> Unpaid </span>';
                        $('#party_received_div').show();
                        $('#voucher_div').hide();
                    }

                    $('#mytable tbody').append('<tr class="odd gradeX">'+
                
                            '<td>'+status+'</td>'+
                            '<td>'+value['datee']+'</td>'+
                            '<td id="'+value['agent_id']+'">'+value['agent_name']+'</td>'+
                            '<td id="'+value['coa_id']+'">'+value['coa']+'</td>'+
                            '<td id="'+value['consignee_id']+'">'+value['consignee']+'</td>'+
                            '<td>'+value['movement']+'</td>'+
                            '<td id="'+value['empty_terminal_id']+'">'+value['empty_terminal']+'</td>'+
                            '<td id="'+value['from_yard_id']+'">'+value['from_yard']+'</td>'+
                            '<td id="'+value['to_yard_id']+'">'+value['to_yard']+'</td>'+
                            '<td>'+value['container_size']+'</td>'+
                            '<td>'+value['lot_of']+'</td>'+
                            '<td id="'+value['line_id']+'">'+value['line']+'</td>'+

                            '<td>'+value['bl_cro_number']+'</td>'+
                            '<td>'+value['job_number']+'</td>'+
                            '<td>'+value['index_number']+'</td>'+
                            '<td id="'+value['container_id']+'">'+value['container_type']+'</td>'+
                            '<td>'+value['lolo_charges']+'</td>'+
                            '<td>'+value['weight_charges']+'</td>'+
                            '<td>'+value['party_charges']+'</td>'+
                            '<td id="total_party_charges">'+value['total_party_charges']+'</td>'+

                            '</tr>');

                    n++; 
                })

                myDataTable();
                $('#amount').attr('max',$('#total_party_charges').html());

            },
            error:function(){ alert("Failed Fetch Ajax Call.") }
        });
    }

    iloadData(<?php echo $cm_id; ?>);


    function loadData(cm_id)
    {
        $.ajax({
            url:'ajax/container_entry/detailed_fetch.php?cm_id='+cm_id,
            dataType:"JSON",
            success:function(data){
                var n = 1;

                $('#entry_table tbody').html("");
                
                $.each(data,function(index,value){

                    $('#entry_table tbody').append('<tr class="odd gradeX">'+

                            '<td>'+n+'</td>'+
                            // '<td>'+value['driver_name']+'</td>'+
                            '<td>'+value['container_type']+'</td>'+
                            '<td>'+value['container_number']+'</td>'+
                            '<td id="'+value['vehicle_id']+'">'+value['vehicle_number']+'</td>'+
                            '<td>'+value['container_size']+'</td>'+
                            '<td>'+value['index_number']+'</td>'+

                            '</tr>');

                    n++; 
                });

                // myDataTable();

            },
            error:function(){ alert("Failed Fetch Ajax Call.") }
        });
    }

    loadData(<?php echo $cm_id; ?>);


    function add(cm_id,datee,method,check_number,bank_id,amount)
    {
        $.ajax({
            url:'ajax/voucher/add.php?cm_id='+cm_id+'&datee='+datee+'&method='+method+'&check_number='+check_number+'&bank_id='+bank_id+'&amount='+amount,
            type:"POST",
            success:function(data){
                if(data)
                {
                    $('#btn_reset').trigger('click');
                    
                    iloadData(<?php echo $cm_id; ?>);
                }
            },
            error:function(){ alert("Error in Add Ajax Call.") }
        });
    }


    function loadVoucher(cm_id)
    {
        $.ajax({
            url:'ajax/voucher/fetch.php?cm_id='+cm_id,
            dataType:"JSON",
            success:function(data){

                $('#voucher_table tbody').html("");
                
                $.each(data,function(index,value){

                    $('#voucher_table tbody').append('<tr class="odd gradeX">'+

                            '<td>'+value['voucher_number']+'</td>'+
                            '<td>'+value['datee']+'</td>'+
                            '<td>'+value['method']+'</td>'+
                            '<td>'+value['check_number']+'</td>'+
                            '<td>'+value['bank_name']+'</td>'+
                            '<td>'+value['amount']+'</td>'+

                            '</tr>');

                });

            },
            error:function(){ alert("Failed Fetch Ajax Call.") }
        });
    }

    
    //Add & Update expense 
    $('#voucher_form').submit(function(e){
       e.preventDefault();

       var datee = $('#datee').val() ,
           method = $('input[name="method"]:checked').val() ,
           check_number = $('#check_number').val() ,
           bank_id = $('#bank_id').val() ,
           amount = $('#amount').val();

        add(<?php echo $cm_id;?>,datee,method,check_number,bank_id,amount);

        //loadPreviousBalance(from_datee,to_datee);

    });


 });
</script>