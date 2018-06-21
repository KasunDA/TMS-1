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
                            <span class="caption-subject bold uppercase">Party Payment Report</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form class="form-horizontal" role="form" method="post">
                            <div class="form-body">
                                
                                <div class="row"> 
                                    <div class="form-group">
                                        <label class="control-label col-md-2">From Date:</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control date-picker"  id="from_datee" name="from_datee" required tabindex="1" <?php echo 'value="'.date('m/d/Y').'"'; ?> placeholder="mm/dd/yyyy">
                                        </div>

                                        <label class="control-label col-md-2">To Date:</label>
                                        <div class="col-md-3"> 
                                            <input type="text" class="form-control date-picker" id="to_datee" name="to_datee" required tabindex="2" <?php echo 'value="'.date('m/d/Y').'"'; ?> placeholder="mm/dd/yyyy"> 
                                        </div>
                                        
                                    </div>
                                   
                                </div>

                                <div class="row"> 
                                      <div class="form-group">
                                            <label class="col-md-2 control-label">From Destination:</label>
                                            <div class="col-md-3">
                                                <select class="form-control" id="from_yard_id" name="from_yard_id" tabindex="3" >
                                                    <option value="">All</option>
                                                    <?php 

                                                  $q = mysqli_query($mycon,'SELECT yard_id,short_form from yard where status=1 ORDER BY yard_id DESC');

                                                  while( $r = mysqli_fetch_array($q) )
                                                    {?>
                                                      <option value="<?php echo $r['yard_id']; ?>"><?php echo $r['short_form']; ?></option>
                                                  <?php } //END OF WHILE ?>
                                                    
                                                </select>

                                            </div>

                                            <div class="col-md-1">

                                              <button class="btn btn-xs green from_yard_id" para="from_yard_id"  type="button">
                                              
                                                <i class="fa fa-refresh"></i>
                                              
                                              </button>

                                             </div>
                                            
                                            <label class="col-md-1 control-label">To Destination:</label>
                                            <div class="col-md-3">
                                              <select class="form-control" id="to_yard_id" name="to_yard_id" tabindex="4"  >
                                                  <option value="">All</option>
                                                    <?php 

                                              $q = mysqli_query($mycon,'SELECT yard_id,short_form from yard where status=1 ORDER BY yard_id DESC');

                                              while( $r = mysqli_fetch_array($q) )
                                                {?>
                                                  <option value="<?php echo $r['yard_id']; ?>"><?php echo $r['short_form']; ?></option>
                                              <?php } //END OF WHILE ?>
                                                  
                                              </select>
                                            </div>

                                            <div class="col-md-1">

                                              <button class="btn btn-xs green to_yard_id" para="to_yard_id"  type="button">
                                              
                                                <i class="fa fa-refresh"></i>
                                              
                                              </button>

                                             </div>

                                        </div> 
                                </div>
                                
                                <div class="row"> 
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">On Account Of:</label>
                                        <div class="col-md-3">
                                            <select class="form-control" id="coa_id" name="coa_id"  tabindex="5" >
                                                <option value="">All</option>
                                                <?php 

                                                  $q = mysqli_query($mycon,'SELECT coa_id,short_form from chart_of_account where status=1 ORDER BY coa_id DESC');

                                                  while( $r = mysqli_fetch_array($q) )
                                                    {?>
                                                      <option value="<?php echo $r['coa_id']; ?>"><?php echo $r['short_form']; ?></option>
                                                  <?php } //END OF WHILE ?>
                                            </select>
                                        </div>

                                        <div class="col-md-1">

                                            <button class="btn btn-xs green coa_id" para="coa_id"  type="button">
                                          
                                                <i class="fa fa-refresh"></i>
                                          
                                            </button>

                                        </div>
                                        
                                        <label class="col-md-1 control-label">Consignee:</label>
                                        <div class="col-md-3">
                                            <select class="form-control" id="consignee_id" name="consignee_id"  tabindex="6">
                                                <option value="">All</option>
                                                <?php 

                                                  $q = mysqli_query($mycon,'SELECT consignee_id,short_form from consignee where status=1 ORDER BY consignee_id DESC');

                                                  while( $r = mysqli_fetch_array($q) )
                                                    {?>
                                                      <option value="<?php echo $r['consignee_id']; ?>"><?php echo $r['short_form']; ?></option>
                                                  <?php } //END OF WHILE ?>
                                            </select>
                                        </div>

                                        <div class="col-md-1">

                                              <button class="btn btn-xs green consignee_id" para="consignee_id"  type="button">
                                              
                                                <i class="fa fa-refresh"></i>
                                              
                                              </button>

                                             </div>
                                    </div> 
                                </div>
                                
                                <div class="row"> 
                                  <div class="form-group">
                                        <label class="col-md-2 control-label"> Movement:</label>
                                        <div class="col-md-3">
                                            <select class="form-control" id="movement" name="movement" tabindex="7" >
                                                <option value="">All</option>
                                                <option value="empty">Empty</option>
                                                <option value="import">Import</option>
                                                <option value="export">Export</option> 
                                                <option value="open_cargo">Open Cargo</option> 
                                            </select>
                                        </div>
                                        
                                        <label class="col-md-2 control-label"> Empty Terminal:</label>
                                          <div class="col-md-3">
                                              <select class="form-control" id="empty_terminal_id" name="empty_terminal_id" tabindex="8" >
                                                  <option value="">All</option>
                                                  <?php 

                                                  $q = mysqli_query($mycon,'SELECT yard_id,short_form from yard where status=1 ORDER BY yard_id DESC');

                                                  while( $r = mysqli_fetch_array($q) )
                                                    {?>
                                                      <option value="<?php echo $r['yard_id']; ?>"><?php echo $r['short_form']; ?></option>
                                                  <?php } //END OF WHILE ?>
                                              </select>
                                          </div>

                                          <div class="col-md-1">

                                              <button class="btn btn-xs green empty_terminal_id" para="empty_terminal_id"  type="button">
                                              
                                                <i class="fa fa-refresh"></i>
                                              
                                              </button>

                                             </div>
                                    </div> 
                                </div>
                                
                                <div class="row"> 
                                    <div class="form-group">
                                        
                                        <label class="col-md-2 control-label">B/L OR CRO No:</label>
                                        <div class="col-md-3">
                                          <input type="text" class="form-control" placeholder="0898664" id="bl_cro_number" name="bl_cro_number"  tabindex="10">
                                        </div>
                                        

                                        <label class="col-md-2 control-label">Shipping Line:</label>
                                        <div class="col-md-3">
                                            <select class="form-control" id="line_id" name="line_id"  tabindex="15" >
                                                <option value="">All</option>
                                                    <?php 

                                                    $q = mysqli_query($mycon,'SELECT line_id,short_form from line where status=1 ORDER BY line_id ');

                                                    while( $r = mysqli_fetch_array($q) )
                                                        {?>
                                                          <option value="<?php echo $r['line_id']; ?>"><?php echo $r['short_form']; ?></option>
                                                      <?php } //END OF WHILE ?>
                                            </select>
                                        </div>  

                                        <div class="col-md-1">

                                              <button class="btn btn-xs green line_id" para="line_id"  type="button">
                                              
                                                <i class="fa fa-refresh"></i>
                                              
                                              </button>

                                             </div>

                                    
                                    </div>  
                                </div>

                                <div class="row"> 
                                    <div class="form-group">
                                        
                                        <label class="col-md-2 control-label">Container Size:</label>
                                        <div class="col-md-3">
                                            <select class="form-control" id="container_size" name="container_size" tabindex="11">
                                              <option value="">All</option>
                                              <option value="20">20</option>
                                              <option value="40">40</option>
                                              <option value="45">45</option>
                                            </select>
                                        </div>

                                        <label class="col-md-2 control-label">Container Type:</label>
                                        <div class="col-md-3">
                                            <select class="form-control" id="container_id" name="container_id" tabindex="12" >
                                              <option value="">All</option>
                                              <?php 

                                                 $q = mysqli_query($mycon,'SELECT container_id,type from container where status=1 ORDER BY container_id DESC');

                                                while( $r = mysqli_fetch_array($q) )
                                                {?>
                                                <option value="<?php echo $r['container_id']; ?>"><?php echo $r['type']; ?></option>
                                                <?php } //END OF WHILE ?>
                                            </select>
                                        </div>

                                        <div class="col-md-1">

                                              <button class="btn btn-xs green container_id" para="container_id"  type="button">
                                              
                                                <i class="fa fa-refresh"></i>
                                              
                                              </button>

                                             </div>
                                    </div>  
                                </div>


                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-9 col-md-push-2">
                                            <div class="">
                                                <button type="submit" class="btn blue" id="btn_submit" tabindex="16">Check</button>
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
                            <!-- <a href="" class="collapse"> </a>
                            <a href="" class="remove"> </a> -->
                        </div>
                    </div>
                    <div class="portlet-body table-both-scroll">
                        <table class="table table-striped table-bordered table-hover order-column" id="mytable">
                            <thead>
                                <tr>
                                    <th> Action </th>                                    
                                    <th> # </th>
                                    <th> Status </th>
                                    <th> Date </th>
                                    <th> Agent </th>
                                    <th> Chart of Account </th>
                                    <th> Consignee </th>
                                    <th> Movement </th>
                                    <th> Empty  </th>
                                    <th> From  </th>
                                    <th> To </th>
                                    <th> Size </th>
                                    <th> Lot Of </th>
                                    <th> Line </th>
                                    <th> B/L OR CRO NO. </th>
                                    <th> Job # </th>
                                    <th> Index # </th>
                                    <!-- <th> Rent </th> -->
                                    <th> Type </th>
                                    <th> Lolo Charges </th>
                                    <th> Weight Charges </th>
                                    <th> Party Charges </th>
                                    <th> Total Party Bill </th>
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
            <div class="col-md-6 "> <!-- col-md-push-6 -->
                <!-- BEGIN BORDERED TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered ">
                    
                    <div class="portlet-body ">
                        <div class="table-scrollable  table-scrollable-borderless">
                            <table class="table table-hover table-light">
                                <thead>
                                    <tr class="uppercase">
                                        <th> # </th>
                                        <th> Total unpaid Bills </th>
                                        <th id="total_unpaid_bills"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> 1 </td>
                                        <td> Total Unpaid Party Bill </td>
                                        <td id="total_unpaid_party_charges"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END BORDERED TABLE PORTLET-->
            </div>

            <div class="col-md-6 ">
                <!-- BEGIN BORDERED TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered ">
                    
                    <div class="portlet-body ">
                        <div class="table-scrollable  table-scrollable-borderless">
                            <table class="table table-hover table-light">
                                <thead>
                                    <tr class="uppercase">
                                        <th> # </th>
                                        <th> Total Paid Bills </th>
                                        <th id="total_paid_bills"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> 1 </td>
                                        <td> Total Paid Party Bill </td>
                                        <td id="total_paid_party_charges"></td>
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
    //Select2
   $('#from_yard_id,#to_yard_id,#coa_id,#consignee_id,#movement,#empty_terminal_id,#container_size,#container_id,#line_id').select2({
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


              if( param =='coa_id' )
              {
                $('#'+param).html('<option value="">All</option>');
                
                $.each(data,function(index,value){
                  $('#'+param).append('<option value="'+value['coa_id']+'">'+value['short_form']+'</option> ');
                });
              }
              else if( param =='consignee_id' )
              {
                $('#'+param).html('<option value="">All</option>');
                
                $.each(data,function(index,value){
                  $('#'+param).append('<option value="'+value['consignee_id']+'">'+value['short_form']+'</option> ');
                });
              }
              else if( param =='empty_terminal_id' )
              {
                $('#'+param).html('<option value="">All</option>');
                
                $.each(data,function(index,value){
                  $('#'+param).append('<option value="'+value['yard_id']+'">'+value['short_form']+'</option> ');
                });
              }
              else if( param =='from_yard_id' )
              {
                $('#'+param).html('<option value="">All</option>');
                
                $.each(data,function(index,value){
                  $('#'+param).append('<option value="'+value['yard_id']+'">'+value['short_form']+'</option> ');
                });
              }
              else if( param =='to_yard_id' )
              {
                $('#'+param).html('<option value="">All</option>');
                
                $.each(data,function(index,value){
                  $('#'+param).append('<option value="'+value['yard_id']+'">'+value['short_form']+'</option> ');
                });
              }
              else if( param =='line_id' )
              {
                $('#'+param).html('<option value="">All</option>');
                
                $.each(data,function(index,value){
                  $('#'+param).append('<option value="'+value['line_id']+'">'+value['short_form']+'</option> ');
                });
              }
              else
              {
                $('#'+param).html('<option value="">All</option>');
                
                $.each(data,function(index,value){
                  $('#'+param).append('<option value="'+value['container_id']+'">'+value['type']+'</option> ');
                });
              }

              $('#'+param).select2({
                width: 'resolve',
                theme: "classic"
              });

            // $('#'+v+'_full_form').val(data['val']);
          },
          error:function(){  alertMessage('Error in Updating Field Ajax Call.','error'); }
        });
      }

      $(document).on('click','.coa_id,.consignee_id,.line_id,.empty_terminal_id,.from_yard_id,.to_yard_id,.container_id', function()
      {
        updateField(''+$(this).attr('para')+'');
      });

    function myDataTable()
    {
        // var e=$("#mytable");
        // e.dataTable({language:{aria:{sortAscending:": activate to sort column ascending",sortDescending:": activate to sort column descending"},emptyTable:"No data available in table",info:"Showing _START_ to _END_ of _TOTAL_ records",infoEmpty:"No records found",infoFiltered:"(filtered1 from _MAX_ total records)",lengthMenu:"Show _MENU_",search:"Search:",zeroRecords:"No matching records found",paginate:{previous:"Prev",next:"Next",last:"Last",first:"First"}},bStateSave:!0,columnDefs:[{targets:0,orderable:!1,searchable:!1}],lengthMenu:[[5,15,20,-1],[5,15,20,"All"]],pageLength:5,pagingType:"bootstrap_full_number",columnDefs:[{orderable:!1,targets:[0]},{searchable:!1,targets:[0]}],order:[[1,"asc"]]});

        var TableDatatablesButtons=function(){var e=function(){var e=$("#mytable");
        e.dataTable({language:{aria:{sortAscending:": activate to sort column ascending",sortDescending:": activate to sort column descending"},emptyTable:"No data available in table",info:"Showing _START_ to _END_ of _TOTAL_ entries",infoEmpty:"No entries found",infoFiltered:"(filtered1 from _MAX_ total entries)",lengthMenu:"_MENU_ entries",search:"Search:",zeroRecords:"No matching records found"},buttons:[{extend:"print",orientation: 'landscape',pageSize: 'LEGAL',exportOptions:{columns: ':visible'},className:"btn dark btn-outline"},{extend:"excel",className:"btn yellow btn-outline ",exportOptions:{columns: ':visible'}},{extend:"colvis",className:"btn green btn-outline",text:"Columns"}],order:[[0,"asc"]],lengthMenu:[[5,10,15,20,-1],[5,10,15,20,"All"]],pageLength:10,dom:"<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>"})},t=function(){var e=$("#sample_2");e.dataTable({language:{aria:{sortAscending:": activate to sort column ascending",sortDescending:": activate to sort column descending"},emptyTable:"No data available in table",info:"Showing _START_ to _END_ of _TOTAL_ entries",infoEmpty:"No entries found",infoFiltered:"(filtered1 from _MAX_ total entries)",lengthMenu:"_MENU_ entries",search:"Search:",zeroRecords:"No matching records found"},buttons:[{extend:"print",className:"btn default"},{extend:"copy",className:"btn default"},{extend:"pdf",className:"btn default"},{extend:"excel",className:"btn default"},{extend:"csv",className:"btn default"},{text:"Reload",className:"btn default",action:function(e,t,a,n){alert("Custom Button")}}],order:[[0,"asc"]],lengthMenu:[[5,10,15,20,-1],[5,10,15,20,"All"]],pageLength:10,dom:"<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>"})},a=function(){var e=$("#sample_3"),t=e.dataTable({language:{aria:{sortAscending:": activate to sort column ascending",sortDescending:": activate to sort column descending"},emptyTable:"No data available in table",info:"Showing _START_ to _END_ of _TOTAL_ entries",infoEmpty:"No entries found",infoFiltered:"(filtered1 from _MAX_ total entries)",lengthMenu:"_MENU_ entries",search:"Search:",zeroRecords:"No matching records found"},buttons:[{extend:"print",className:"btn dark btn-outline"},{extend:"copy",className:"btn red btn-outline"},{extend:"pdf",className:"btn green btn-outline"},{extend:"excel",className:"btn yellow btn-outline "},{extend:"csv",className:"btn purple btn-outline "},{extend:"colvis",className:"btn dark btn-outline",text:"Columns"}],responsive:!0,order:[[0,"asc"]],lengthMenu:[[5,10,15,20,-1],[5,10,15,20,"All"]],pageLength:10});$("#sample_3_tools > li > a.tool-action").on("click",function(){var e=$(this).attr("data-action");t.DataTable().button(e).trigger()})},n=function(){$(".date-picker").datepicker({rtl:App.isRTL(),autoclose:!0});var e=new Datatable;e.init({src:$("#datatable_ajax"),onSuccess:function(e,t){},onError:function(e){},onDataLoad:function(e){},loadingMessage:"Loading...",dataTable:{bStateSave:!0,lengthMenu:[[10,20,50,100,150,-1],[10,20,50,100,150,"All"]],pageLength:10,ajax:{url:"../demo/table_ajax.php"},order:[[1,"asc"]],buttons:[{extend:"print",className:"btn default"},{extend:"copy",className:"btn default"},{extend:"pdf",className:"btn default"},{extend:"excel",className:"btn default"},{extend:"csv",className:"btn default"},{text:"Reload",className:"btn default",action:function(e,t,a,n){t.ajax.reload(),alert("Datatable reloaded!")}}]}}),e.getTableWrapper().on("click",".table-group-action-submit",function(t){t.preventDefault();var a=$(".table-group-action-input",e.getTableWrapper());""!=a.val()&&e.getSelectedRowsCount()>0?(e.setAjaxParam("customActionType","group_action"),e.setAjaxParam("customActionName",a.val()),e.setAjaxParam("id",e.getSelectedRows()),e.getDataTable().ajax.reload(),e.clearAjaxParams()):""==a.val()?App.alert({type:"danger",icon:"warning",message:"Please select an action",container:e.getTableWrapper(),place:"prepend"}):0===e.getSelectedRowsCount()&&App.alert({type:"danger",icon:"warning",message:"No record selected",container:e.getTableWrapper(),place:"prepend"})}),$("#datatable_ajax_tools > li > a.tool-action").on("click",function(){var t=$(this).attr("data-action");e.getDataTable().button(t).trigger()})};return{init:function(){jQuery().dataTable&&(e(),t(),a(),n())}}}();jQuery(document).ready(function(){TableDatatablesButtons.init()});
    }

    myDataTable();

    function loadData(from_datee,to_datee,from_yard_id,to_yard_id,coa_id,consignee_id,movement,empty_terminal_id,bl_cro_number,container_size,container_id,line_id)
    {
        $.ajax({
            url:'ajax/container_movement/received_fetch.php?from_datee='+from_datee+'&to_datee='+to_datee+'&from_yard_id='+from_yard_id+'&to_yard_id='+to_yard_id+'&coa_id='+coa_id+'&consignee_id='+consignee_id+'&movement='+movement+'&empty_terminal_id='+empty_terminal_id+'&bl_cro_number='+bl_cro_number+'&container_size='+container_size+'&container_id='+container_id+'&line_id='+line_id,
            dataType:"JSON",
            success:function(data){
                var n = 1,
                    uq = 0,
                    usum = 0,
                    pq = 0,
                    psum = 0,
                    status=null;

                $('#mytable').DataTable().destroy();
                $('#mytable tbody').html("");
                
                $.each(data,function(index,value){


                    if( value['paid_status'] == 1 )
                    {
                        status = '<span class="label label-sm label-success"> paid </span>';
                        pq++;
                        psum+=value['total_party_charges'];
                    }
                    else
                    {
                        status = '<span class="label label-sm label-danger"> Unpaid </span>';
                        uq++;
                        usum+=value['total_party_charges'];
                    }

                    $('#mytable tbody').append('<tr class="odd gradeX">'+

                             '<td>'+ 
                                '<ul class="addremove">'+
                                    '<li> <button class="btn btn-xs green update_btn" id="'+value['cm_id']+'" type="button">  '+
                                    '<i class="fa fa-plus-square"></i>'+
                                    '</button> </li>'+
                                '</ul>'+
                            '</td>'+                       

                            '<td style="color:#000;">'+n+'</td>'+
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
                            // '<td>'+value['rent']+'</td>'+
                            '<td id="'+value['container_id']+'">'+value['container_type']+'</td>'+
                            '<td>'+value['lolo_charges']+'</td>'+
                            '<td>'+value['weight_charges']+'</td>'+
                            '<td>'+value['party_charges']+'</td>'+
                            '<td name="total_party_charges">'+value['total_party_charges']+'</td>'+

                            '</tr>');

                    n++; 
                })

                myDataTable();

                $('#total_unpaid_bills').html(uq);
                $('#total_unpaid_party_charges').html(usum);

                $('#total_paid_bills').html(pq);
                $('#total_paid_party_charges').html(psum);

            },
            error:function(){ alertMessage("Failed Fetch Ajax Call.",'error') }
        });
    }
    
    //Add & Update expense 
    $('form').submit(function(e){
       e.preventDefault();
       
        var from_datee = $('#from_datee').val() ,
            to_datee = $('#to_datee').val() ,
            from_yard_id = $('#from_yard_id').val(),
            to_yard_id = $('#to_yard_id').val(),
            coa_id = $('#coa_id').val(),
            consignee_id = $('#consignee_id').val(),
            movement = $('#movement').val(),
            empty_terminal_id = $('#empty_terminal_id').val(),
            bl_cro_number = $('#bl_cro_number').val(),
            container_size = $('#container_size').val(),
            container_id = $('#container_id').val(),
            line_id = $('#line_id').val();


        loadData(from_datee,to_datee,from_yard_id,to_yard_id,coa_id,consignee_id,movement,empty_terminal_id,bl_cro_number,container_size,container_id,line_id);

        $('html, body').animate({
          scrollTop: 400
          // scrollTop: $("#mytable_div").offset().top
        }, 1000);

    });

    $(document).on('click','.update_btn',function(){

            var id = $(this).attr('id');

            location.assign('recivePartyPaymentSingle.php?cm_id='+id);

        });

 });
</script>