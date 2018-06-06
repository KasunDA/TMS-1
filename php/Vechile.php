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
                                <span class="caption-subject bold uppercase"> <?php $text = isset($_SESSION['disable_btn'])?'View':'Add New'; echo $text; ?> Vehicle</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <?php
                                if(!isset($_SESSION['disable_btn']) )
                                {?>
                            <form class="form-horizontal" role="form">
                                <div class="form-body">
                                    <div class="row hidden" id="vehicle_id_div"> 
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">ID:</label>
                                            <div class="col-md-3">
                                              <input type="number" name="vehicle_id" id="vehicle_id" readonly class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"> 
                                        <div class="form-group">
                                                <label class="col-md-2 control-label">Owner Name:</label>
                                                <div class="col-md-3">
                                                  <input type="text" class="form-control" id="owner_name" name="owner_name" required tabindex="1" placeholder="here" autofocus>
                                                </div>
                                    
                                                  <label class="col-md-2 control-label">Vehicle Number </label>
                                                <div class="col-md-3">
                                                  <input type="text" class="form-control" id="vehicle_number" name="vehicle_number" required tabindex="2" placeholder="here">
                                                </div>
                                         </div>  
                                     </div>   
                                     <div class="row"> 
                                         <div class="form-group">
                                                   <label class="col-md-2 control-label">Engine Number </label>
                                                 <div class="col-md-3">
                                                   <input type="text" class="form-control"  id="engine_number" name="engine_number"  tabindex="3" placeholder="here">
                                                 </div>
                                     
                                                   <label class="col-md-2 control-label">Chassis Number </label>
                                                 <div class="col-md-3">
                                                   <input type="text" class="form-control" id="chassis_number" name="chassis_number"  tabindex="4" placeholder="here">
                                                 </div>
                                          </div>  
                                      </div>

                                      <div class="row"> 
                                         <div class="form-group">
                                                <label class="col-md-2 control-label">Driver Name:</label>
                                                <div class="col-md-3">
                                                  <input type="text" class="form-control" id="driver_name" name="driver_name" required tabindex="5" placeholder="here">
                                                </div>
                                          </div>  
                                      </div> 
                                        
                                     
                                    <div class="form-actions ">
                                        <button type="submit" class="btn blue" id="btn_submit" tabindex="6">Submit</button> 
                                        <button type="reset" class="btn default" id="btn_reset" tabindex="7">Cancel</button>

                                        <button type="submit" class="btn blue hidden" id="update_form_btn" tabindex="6">Update</button> 
                                        <button type="button" class="btn default hidden"  id="add_new" tabindex="7">Add New</button>
                                    </div>
                                </div>
                                
                            </form>
                            <?php }//END OF IF?> 
                        </div>
                        <!-- Form ends -->
                        <hr>
                             <div class="row">
                         <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    
                                    <div class="portlet-body">
                                    <!-- table table-striped table-bordered table-hover table-checkable order-column -->
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="mytable">
                                            <thead>
                                                <tr>
                                                   
                                                    <th> Action </th> 
                                                    <th>#</th>
                                                    <th> Owner Name </th>
                                                    <th> Vechile Number # </th>
                                                    <th> EngineNumber # </th>
                                                    <th> Chassis Number # </th>
                                                    <th> Driver Name </th>
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
<!-- END vehicle -->
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
            $.ajax({
                url:'ajax/vehicle/fetch.php',
                dataType:"JSON",
                success:function(data){

                    var n = 1;
                    var i = 0;

                    $('#mytable').DataTable().destroy();
                    $('tbody').html("");
                    
                    $.each(data,function(index,value){

                        $('tbody').append('<tr index="'+i+'" class="odd gradeX">'+

                            <?php
                                if(!isset($_SESSION['disable_btn']) )
                                {?>
                                '<td>'+ 
                                    '<ul class="addremove">'+
                                        '<li> <button class="btn btn-xs green update_btn" id="'+value['vehicle_id']+'" type="button">  '+
                                        '<i class="fa fa-plus-square"></i>'+
                                        '</button> </li>'+
                                        '<li>  <button class="btn btn-xs red delete_btn" id="'+value['vehicle_id']+'" type="button">  '+
                                        '<i class="fa fa-minus-square"></i>'+
                                        '</button> </li>'+
                                    '</ul>'+
                                '</td>'+     
                                <?php }//END OF If
                                else{?>
                                    '<td></td>'+
                                <?php }//END OF ELSE ?>                   

                                '<td>'+n+'</td>'+
                                '<td>'+value['owner_name']+'</td>'+
                                '<td>'+value['vehicle_number']+'</td>'+
                                '<td>'+value['engine_number']+'</td>'+
                                '<td>'+value['chassis_number']+'</td>'+
                                '<td>'+value['driver_name']+'</td>'+

                                '</tr>');

                        n++; i++;
                    })

                    myDataTable();
                },
                error:function(){ alertMessage("Failed Fetch Ajax Call.",'error') }
            });
        }

        loadData();

        function add(owner_name,vehicle_number,engine_number,chassis_number,driver_name)
        {
            $.ajax({
                url:'ajax/vehicle/add.php?owner_name='+encodeURIComponent(owner_name)+'&vehicle_number='+encodeURIComponent(vehicle_number)+'&engine_number='+encodeURIComponent(engine_number)+'&chassis_number='+encodeURIComponent(chassis_number)+'&driver_name='+encodeURIComponent(driver_name),
                type:"POST",
                success:function(data){
                    if(data)
                    {
                        $('#owner_name,#engine_number,#vehicle_number,#chassis_number,#driver_name').val("");
                        
                        alertMessage('Added Successfully.','success');

                        loadData();
                    }
                },
                error:function(){ alertMessage("Error in Add Ajax Call.",'error') }
            });
        }

        function update(vehicle_id,owner_name,vehicle_number,engine_number,chassis_number,driver_name)
        {
            $.ajax({
                url:'ajax/vehicle/update.php?vehicle_id='+vehicle_id+'&owner_name='+encodeURIComponent(owner_name)+'&vehicle_number='+encodeURIComponent(vehicle_number)+'&engine_number='+encodeURIComponent(engine_number)+'&chassis_number='+encodeURIComponent(chassis_number)+'&driver_name='+encodeURIComponent(driver_name),
                type:"POST",
                success:function(data){
                    if(data)
                    {
                        var i = $('.selectedd').attr('index');
                        var temp = $('#mytable').DataTable().row(i).data();
                        
                        addNewClick();

                        temp[2] = owner_name;
                        temp[3] = vehicle_number;
                        temp[4] = engine_number;
                        temp[5] = chassis_number;
                        temp[6] = driver_name;


                        $('#mytable').DataTable().row(i).data(temp).draw();

                        alertMessage('Updated Successfully.','success');
                        
                    }
                },
                error:function(){ alertMessage("Error in Update Ajax Call.",'error') }
            });
        }

        function deletetr(trr,vehicle_id)
        {
            $.ajax({
                url:'ajax/vehicle/delete.php?vehicle_id='+vehicle_id,
                type:"POST",
                success:function(data){
                    trr.fadeOut(100,function(){
                       trr.remove(); 
                    });
                },
                error:function(){ alertMessage("Error in Delete ajax Call.",'error') }
            });
        }

        function updateClick()
        {

            $('form').addClass('update_form');

            $('#vehicle_id_div').removeClass('hidden');
            $('#update_form_btn').removeClass('hidden');
            $('#add_new').removeClass('hidden');

            $('#btn_submit').addClass('hidden');
            $('#btn_reset').addClass('hidden');

            $('#owner_name').focus();

        }

        function addNewClick()
        {

            $('form').removeClass('update_form');

            $('#owner_name,#engine_number,#vehicle_number,#chassis_number,#driver_name').val("");

            $('#vehicle_id_div').addClass('hidden');
            $('#update_form_btn').addClass('hidden');
            $('#add_new').addClass('hidden');

            $('#btn_submit').removeClass('hidden');
            $('#btn_reset').removeClass('hidden');

            $('#owner_name').focus();

        }

        //DELETE 
        $(document).on('click','.delete_btn',function(){

            var vehicle_id = $(this).attr('id'),
                trr = $(this).closest('tr');

            deletetr(trr,vehicle_id);
        });

        //ADD NEW 
        $(document).on('click','#add_new',function(){
            addNewClick();
        });

        //UPDATE 
        $(document).on('click','.update_btn',function(){

            updateClick();

            var vehicle_id = $(this).attr('id'),
                trr = $(this).closest('tr');

            $('tr').each(function(){
                if( $(this).hasClass('selectedd') )
                {
                    $(this).removeClass('selectedd'); 
                }
            });

            trr.addClass('selectedd');   

            $('#vehicle_id').val( vehicle_id );
            $('#owner_name').val( trr.find('td').eq(2).text() );
            $('#vehicle_number').val( trr.find('td').eq(3).text() );    
            $('#engine_number').val( trr.find('td').eq(4).text() );
            $('#chassis_number').val( trr.find('td').eq(5).text() );
            $('#driver_name').val( trr.find('td').eq(6).text() );

        });

        //Add & Update
        $('form').submit(function(e){
           e.preventDefault();
           
           var owner_name = $('#owner_name').val() ,
               engine_number = $('#engine_number').val(),
               vehicle_number = $('#vehicle_number').val(),
               chassis_number = $('#chassis_number').val(),
               driver_name = $('#driver_name').val(),
               vehicle_id =  $('#vehicle_id').val();

           if( $(this).hasClass('update_form') ) 
           {
                update(vehicle_id,owner_name,vehicle_number,engine_number,chassis_number,driver_name);
           }
           else
           {
                add(owner_name,vehicle_number,engine_number,chassis_number,driver_name);
           }

           $('#owner_name').focus();
        });



     });
 </script>