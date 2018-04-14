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
                                <span class="caption-subject bold uppercase"> Add New Vechile</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
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
                                                  <input type="text" class="form-control" id="owner_name" name="owner_name" required tabindex="1" placeholder="here">
                                                </div>
                                    
                                                  <label class="col-md-2 control-label">Vechile Number #</label>
                                                <div class="col-md-3">
                                                  <input type="text" class="form-control" id="vehicle_number" name="vehicle_number" required tabindex="2" placeholder="here">
                                                </div>
                                         </div>  
                                     </div>   
                                     <div class="row"> 
                                         <div class="form-group">
                                                   <label class="col-md-2 control-label">EngineNumber #</label>
                                                 <div class="col-md-3">
                                                   <input type="text" class="form-control"  id="engine_number" name="engine_number" required tabindex="3" placeholder="here">
                                                 </div>
                                     
                                                   <label class="col-md-2 control-label">Chassis Number #</label>
                                                 <div class="col-md-3">
                                                   <input type="text" class="form-control" id="chassis_number" name="chassis_number" required tabindex="4" placeholder="here">
                                                 </div>
                                          </div>  
                                      </div> 


                                        
                                     
                                    <div class="form-actions ">
                                        <button type="submit" class="btn blue" id="btn_submit" tabindex="5">Submit</button> 
                                        <button type="reset" class="btn default" id="btn_reset" tabindex="6">Cancel</button>

                                        <button type="submit" class="btn blue hidden" id="update_form_btn" tabindex="5">Update</button> 
                                        <button type="button" class="btn default hidden"  id="add_new" tabindex="6">Add New</button>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                        <!-- Form ends -->
                        <hr>
                             <div class="row">
                         <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    
                                    <div class="portlet-body">
                                    <!-- table table-striped table-bordered table-hover table-checkable order-column -->
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                            <thead>
                                                <tr>
                                                   
                                                    <th> Action </th> 
                                                    <th>#</th>
                                                    <th> Owner Name </th>
                                                    <th> Vechile Number # </th>
                                                    <th> EngineNumber # </th>
                                                    <th> Chassis Number # </th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                             <?php 

                                                require 'connection.php';


                                                $q = mysqli_query($mycon,'SELECT * FROM vehicle WHERE status=1 ORDER BY vehicle_id DESC ');
                                                $n  = 1;
                                                while($r = mysqli_fetch_array($q))
                                                {?>
                                                    <tr class="odd gradeX">

                                                    <td> 
                                                      <ul class="addremove">
                                                        <li> <button class="btn btn-xs green update_btn" id="<?php echo $r['vehicle_id']; ?>"  type="button">  
                                                        <i class="fa fa-plus-square"></i>
                                                        </button> </li>
                                                        <li>  <button class="btn btn-xs red delete_btn" id="<?php echo $r['vehicle_id']; ?>" type="button">  
                                                        <i class="fa fa-minus-square"></i>
                                                        </button> </li>
                                                      </ul>
                                                    </td>
                                                    <td><?php echo $n ?></td>
                                                    <td><?php echo $r['owner_name']; ?> </td>
                                                    <td><?php echo $r['vehicle_number']; ?> </td>
                                                    <td><?php echo $r['engine_number']; ?> </td>
                                                    <td><?php echo $r['chassis_number']; ?> </td>

                                                </tr>

                                                <?php 
                                                    $n++;
                                                }// END OF WHILE


                                             ?>                                             

                                              
                                                 
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

        function loadData()
        {
            // $.ajax({
            //     url:'',
            //     dataType:"JSON",
            //     success:function(data){},
            //     error:function(){}
            // });

            $.ajax({
                url:'ajax/vehicle/fetch.php',
                dataType:"JSON",
                success:function(data){

                    var n = 1;
                    $('tbody').html("");
                    
                    $.each(data,function(index,value){

                        $('tbody').append('<tr class="odd gradeX">'+

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

                                '<td>'+n+'</td>'+
                                '<td>'+value['owner_name']+'</td>'+
                                '<td>'+value['vehicle_number']+'</td>'+
                                '<td>'+value['engine_number']+'</td>'+
                                '<td>'+value['chassis_number']+'</td>'+

                                '</tr>');

                        n++;
                    })
                },
                error:function(){ alert("Failed Fetch Ajax Call.") }
            });
        }

        //loadData();

        function add(owner_name,vehicle_number,engine_number,chassis_number)
        {
            $.ajax({
                url:'ajax/vehicle/add.php?owner_name='+owner_name+'&vehicle_number='+vehicle_number+'&engine_number='+engine_number+'&chassis_number='+chassis_number,
                type:"POST",
                success:function(data){
                    if(data)
                    {
                        $('#owner_name').val("");
                        $('#engine_number').val("");
                        $('#vehicle_number').val("");
                        $('#chassis_number').val("");
                        
                        loadData();
                    }
                },
                error:function(){ alert("Error in Add Ajax Call.") }
            });
        }

        function update(vehicle_id,owner_name,vehicle_number,engine_number,chassis_number)
        {
            $.ajax({
                url:'ajax/vehicle/update.php?vehicle_id='+vehicle_id+'&owner_name='+owner_name+'&vehicle_number='+vehicle_number+'&engine_number='+engine_number+'&chassis_number='+chassis_number,
                type:"POST",
                success:function(data){
                    if(data)
                    {
                        var trr = $('.selectedd');

                        addNewClick();

                        trr.find('td').eq(2).text(owner_name);
                        trr.find('td').eq(3).text(vehicle_number);
                        trr.find('td').eq(4).text(engine_number);
                        trr.find('td').eq(5).text(chassis_number);
                        
                    }
                },
                error:function(){ alert("Error in Update Ajax Call.") }
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
                error:function(){ alert("Error in Delete ajax Call.") }
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

        }

        function addNewClick()
        {

            $('form').removeClass('update_form');

            $('#owner_name').val('');
            $('#vehicle_number').val('');
            $('#engine_number').val('');
            $('#chassis_number').val('');


            $('#vehicle_id_div').addClass('hidden');
            $('#update_form_btn').addClass('hidden');
            $('#add_new').addClass('hidden');

            $('#btn_submit').removeClass('hidden');
            $('#btn_reset').removeClass('hidden');

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

        });

        //Add & Update
        $('form').submit(function(e){
           e.preventDefault();
           
           var owner_name = $('#owner_name').val() ,
               engine_number = $('#engine_number').val(),
               vehicle_number = $('#vehicle_number').val(),
               chassis_number = $('#chassis_number').val(),
               vehicle_id =  $('#vehicle_id').val();

           if( $(this).hasClass('update_form') ) 
           {
                update(vehicle_id,owner_name,vehicle_number,engine_number,chassis_number);
           }
           else
           {
                add(owner_name,vehicle_number,engine_number,chassis_number);
           }
        });



     });
 </script>