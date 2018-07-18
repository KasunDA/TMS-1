<?php 
include 'header.php';
include 'nav.php';

require 'connection.php';
date_default_timezone_set("Asia/Karachi");
$cm_id = $_GET['cm_id'];
 ?>

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEAD-->
            <div class="page-head">
                
            <!-- END PAGE HEAD-->
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">Dashboard</span>
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE BASE CONTENT -->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-red-sunglo">
                                <i class="icon-settings font-red-sunglo"></i>
                                <span class="caption-subject bold uppercase"> <?php $text = isset($_SESSION['disable_btn'])?'View':'Update'; echo $text; ?> Rent Container Movement</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form class="form-horizontal role="form" method="post">
                                <div class="form-body">
                                    <div class="row"> 
                                        <div class="form-group">
                                          <div id="cm_id_div">
                                            <label class="col-md-2 control-label">Container Movement ID:</label>
                                            <div class="col-md-2">
                                              <input type="text" class="form-control" id="cm_id" name="cm_id" required readonly value="<?php echo $cm_id; ?>" >
                                            </div>
                                          </div>

                                          <label class="col-md-1 control-label">Rent:</label>
                                          <div class="col-md-2">
                                            <input type="number" min="0" class="form-control" placeholder="Rent" id="rent" name="rent" tabindex="1" required >
                                          </div>

                                          <!-- <div class="form-actions "> -->
                                            <button type="submit" class="btn blue" id="update_form_btn" tabindex="2" style="margin-top: -5px;">Update</button>
                                          <!-- </div>           -->
                                        </div>
  
                                     </div>
         
                                    
                                </div>
                                
                            </form>
                        </div>
                        <!-- Form ends -->
                         <hr> 

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
                            <span class="caption-subject bold uppercase">Vehicles</span>
                        </div>
                        <div class="tools">
                            <!-- <a href="" class="expand"> </a> -->

                            <!-- <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="group-checkable" data-set="#mytable .checkboxes" />
                                        <span></span>
                                    </label> -->
                        </div>
                          <img src="ajax/loading.gif" id="loading" style="margin-left: 30%; display: none;" height="40" width="40" >
                    </div>
                    <div class="portlet-body table-both-scroll"  >  <!-- style="display: none;" -->
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="mytable">
                          <thead>
                              <tr>
                                  <th></th>
                                  <th> Index </th>
                                  <th> ID </th>
                                  <th> Vehicle # </th>
                                  <th> Advance </th>
                                  <th> Rent </th>
                                  <th> Balance </th>
                                  <th> Diesel </th>
                                  <th> Lolo Charges </th>
                                  <th> Weight Charges </th>
                              </tr>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                              <tr>
                                  <th></th>
                                  <th> Index </th>
                                  <th> ID </th>
                                  <th> Vehicle # </th>
                                  <th> Advance </th>
                                  <th> Rent </th>
                                  <th> Balance </th>
                                  <th> Diesel </th>
                                  <th> Lolo Charges </th>
                                  <th> Weight Charges </th>
                              </tr>
                          </tfoot>
                      </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<?php include 'footer.php'; ?>
<script type="text/javascript">
  $(document).ready(function(){

    function removeA(arr) 
    {
      var what, a = arguments, L = a.length, ax;
      while (L > 1 && arr.length) {
          what = a[--L];
          while ((ax= arr.indexOf(what)) !== -1) {
              arr.splice(ax, 1);
          }
      }
      return arr;
    }

    var ids = new Array();

    function myDataTable()
    {
        var TableDatatablesButtons=function() 
        {
          var e=function() 
          {
              var e=$("#mytable");
              e.dataTable({
                  language: {
                      aria: {
                          sortAscending: ": activate to sort column ascending", sortDescending: ": activate to sort column descending"
                      }
                      , emptyTable:"No data available in table", info:"Showing _START_ to _END_ of _TOTAL_ entries", infoEmpty:"No entries found", infoFiltered:"(filtered1 from _MAX_ total entries)", lengthMenu:"_MENU_ entries", search:"Search:", zeroRecords:"No matching records found",paginate:{previous:"Prev",next:"Next",last:"Last",first:"First"}
                  }
                  , buttons:[],order:[[0, "asc"]], lengthMenu:[[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]], pageLength:10,pagingType:"bootstrap_full_number", dom:"<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
              })
          }
          //responsive:!0,
   
          return{init:function(){jQuery().dataTable&&(e())}}}();jQuery(document).ready(function(){TableDatatablesButtons.init()});
    }
    myDataTable();

    function loadData(cm_id)
    {
        $('#loading').show();
        $.ajax({
            url:'ajax/container_movement/rfetch.php',
            data:{cm_id:cm_id},
            type:'GET',
            dataType:'JSON',
            success:function(data)
            {
                var n = 1,
                    i = 0;

                $('#mytable').DataTable().clear().draw();
                $('#mytable').DataTable().destroy();
                $('#mytable tbody').html("");                
                var table = $.each(data,function(index,value){
                    
                    $('#mytable tbody').append('<tr class="odd gradeX selectedd" index="'+i+'">'+
                            
                            '<td>'+
                              '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">'+
                                  '<input type="checkbox" class="checkboxes" value="1" />'+
                                  '<span></span>'+
                              '</label>'+
                            '</td>'+

                            '<td>'+n+'</td>'+
                            '<td>'+value['ce_id']+'</td>'+
                            '<td id="'+value['vehicle_id']+'">'+value['vehicle_number']+'</td>'+
                            '<td>'+value['advance']+'</td>'+
                            '<td>'+value['rent']+'</td>'+
                            '<td>'+value['balance']+'</td>'+
                            '<td>'+value['diesel']+'</td>'+
                            '<td>'+value['lolo_charges']+'</td>'+
                            '<td>'+value['weight_charges']+'</td>'+
                            '</tr>');
                    n++; i++;
                });
   
                $.when(table).done(function(){
                  $('#loading').hide();
                });

                myDataTable();
            },
            error:function(){ alertMessage("Failed Fetch Ajax Call.",'error'); $('#loading').hide(); }
        });
    }
    loadData(<?php echo $cm_id; ?>);

    //checkboxes code
    $(document).on('change','tbody tr .checkboxes',function(){
      
      $(this).toggleClass("faded");
      $(this).parents("tr").toggleClass("active");
      $(this).parents("tr").toggleClass("selectedd");

      var i     = $(this).parents('tr').attr('index'),
      tableData = $('#mytable').DataTable().row(i).data();

      if( !$(this).parents('tr').hasClass('selectedd') )
        ids.push(tableData[2]);
      else
        removeA(ids,tableData[2]);
    });

    function update(cm_id,rent,ce_ids)
    {
      $.ajax({
          url:'ajax/container_movement/rupdate.php',
          data:{cm_id:cm_id,rent:rent,ce_ids:JSON.stringify(ce_ids)},
          type:"GET",
          dataType:'JSON',
          success:function(data){
            if(data['updated']=='true')
            {
              $('#rent').val('');
              alertMessage('Updated Successfully.','success');
              loadData(<?php echo $cm_id; ?>);
            }
            else
              alertMessage('Not Updated!','error');
          },
          error:function(){ alertMessage("Error in Update Ajax Call.",'error') }
      });
    }

    //Update 
    $('form').submit(function(e){
       e.preventDefault();
       
       var rent  = $('#rent').val(),
           cm_id =  $('#cm_id').val();

        update(cm_id,rent,ids);
    });
  });
</script>