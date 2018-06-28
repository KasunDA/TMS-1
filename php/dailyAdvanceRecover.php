<?php 
include 'header.php';
include 'nav.php';
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
                                <span class="caption-subject bold uppercase">Advance Recovery</span>
                            </div>
                        </div>
                             <div class="row">
                         <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">

                                    <img src="ajax/loading.gif" id="loading" style="margin-left: 42%; display: none;" height="40" width="40" >
                                    
                                    <div class="portlet-body">
                                 
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="mytable">
                                            <thead>
                                                <tr>
                                                   
                                                    <th> Action </th> 
                                                    <th> # </th> 
                                                    <th> name </th>
                                                    <th> Vehicle # </th>
                                                    <th> Remaining Amount </th>
                                                   
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

 <script type="text/javascript">
     
     $(document).ready(function(){

        function myDataTable()
        {
            var e=$("#mytable");
            e.dataTable({language:{aria:{sortAscending:": activate to sort column ascending",sortDescending:": activate to sort column descending"},emptyTable:"No data available in table",info:"Showing _START_ to _END_ of _TOTAL_ records",infoEmpty:"No records found",infoFiltered:"(filtered1 from _MAX_ total records)",lengthMenu:"Show _MENU_",search:"Search:",zeroRecords:"No matching records found",paginate:{previous:"Prev",next:"Next",last:"Last",first:"First"}},bStateSave:!0,columnDefs:[{targets:0,orderable:!1,searchable:!1}],lengthMenu:[[5,15,20,-1],[5,15,20,"All"]],pageLength:5,pagingType:"bootstrap_full_number",columnDefs:[{orderable:!1,targets:[0]},{searchable:!1,targets:[0]}],order:[[1,"asc"]]});
        }

        function loadData()
        {
            $('#loading').show();

            $.ajax({
                url:'ajax/advance_pay/fetch.php',
                dataType:"JSON",
                success:function(data){
                    var n = 1;

                    $('#mytable').DataTable().destroy();
                    $('tbody').html("");
                    
                    var table = $.each(data,function(index,value){

                        $('tbody').append('<tr class="odd gradeX">'+

                                '<td>'+ 
                                    '<ul class="addremove">'+
                                        '<li> <button class="btn btn-xs green update_btn" vehicle_id="'+value['vehicle_id']+'" borrower_id="'+value['borrower_id']+'" type="button">'+
                                        '<i class="fa fa-plus-square"></i>'+
                                        '</button> </li>'+
                                    '</ul>'+
                                '</td>'+                       

                                '<td>'+n+'</td>'+
                                '<td>'+value['name']+'</td>'+
                                '<td>'+value['vehicle_number']+'</td>'+
                                '<td>'+value['amount']+'</td>'+
                                '</tr>');
                        n++;
                    });

                    $.when(table).done(function(){
                      $('#loading').hide();
                    });

                    myDataTable();
                },
                error:function(){ alertMessage('Failed Fetch Ajax Call.','error'); $('#loading').hide(); }
            });
        }

        loadData();

        $(document).on('click','.update_btn',function(){

            var vehicle_id  = $(this).attr('vehicle_id'),
                borrower_id = $(this).attr('borrower_id'),
                trr = $(this).closest('tr'),
                name = trr.find('td').eq(2).text();

            location.assign('dailyAdvancePay.php?vehicle_id='+vehicle_id+'&borrower_id='+borrower_id+'&name='+encodeURIComponent(name));

        });

     });
 </script>