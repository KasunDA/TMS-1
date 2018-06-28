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
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="index.php">Home</a>
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
                                <span class="caption-subject bold uppercase"> <?php $text = isset($_SESSION['disable_btn'])?'View':'Add New'; echo $text; ?> Bike</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <?php
                                if(!isset($_SESSION['disable_btn']) )
                                {?>
                            <form class="form-horizontal" role="form" method="post">
                                <div class="form-body">
                                    <div class="row"> 
                                        <div class="form-group">
                                                <div id="bike_id_div" class="hidden">
                                                    <label class="col-md-2 control-label">ID:</label>
                                                    <div class="col-md-3">
                                                      <input type="number" readonly class="form-control" id="bike_id" name="bike_id">
                                                    </div>
                                                </div>
                                                <label class="col-md-2 control-label">bike #:</label>
                                                <div class="col-md-3">
                                                  <input type="text" class="form-control" id="bike_number" name="bike_number" tabindex="1" placeholder="bike Number" required autofocus>
                                                </div>
                                    
                                         </div>  
                                     </div>   


                                        
                                     
                                    <div class="form-actions ">
                                        <button type="submit" class="btn blue" id="btn_submit" tabindex="2">Submit</button> 
                                        <button type="reset" class="btn default" id="btn_reset" tabindex="3">Cancel</button>

                                        <button type="submit" class="btn blue hidden" id="update_form_btn" tabindex="2">Update</button> 
                                        <button type="button" class="btn default hidden"  id="add_new" tabindex="3">Add New</button>
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

                                    <img src="ajax/loading.gif" id="loading" style="margin-left: 42%; display: none;" height="40" width="40" >
                                    
                                    <div class="portlet-body">
                                 
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="mytable">
                                            <thead>
                                                <tr>
                                                    <th> Actions </th> 
                                                    <th>#</th>
                                                    <th> bike # </th>
                                                   
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
<!-- END bike -->
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
                url:'ajax/bike/fetch.php',
                dataType:"JSON",
                success:function(data){
                    var n = 1;
                    var i = 0;

                    $('#mytable').DataTable().destroy();
                    $('tbody').html("");
                    
                    var table = $.each(data,function(index,value){

                        $('tbody').append('<tr index="'+i+'" class="odd gradeX">'+
                            <?php
                                if(!isset($_SESSION['disable_btn']) )
                                {?>

                                '<td>'+ 
                                    '<ul class="addremove">'+
                                        '<li> <button class="btn btn-xs green update_btn" id="'+value['bike_id']+'" type="button">  '+
                                        '<i class="fa fa-plus-square"></i>'+
                                        '</button> </li>'+
                                        '<li>  <button class="btn btn-xs red delete_btn" id="'+value['bike_id']+'" type="button">  '+
                                        '<i class="fa fa-minus-square"></i>'+
                                        '</button> </li>'+
                                    '</ul>'+
                                '</td>'+           
                                <?php }//END OF If
                                else{?>
                                    '<td></td>'+
                                <?php }//END OF ELSE ?>              

                                '<td>'+n+'</td>'+
                                '<td>'+value['bike_number']+'</td>'+
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

        loadData();

        function add(bike_number)
        {
            $.ajax({
                url:'ajax/bike/add.php?bike_number='+encodeURIComponent(bike_number),
                type:"POST",
                success:function(data){
                    if(data)
                    {
                        $('#bike_number').val("");
                        alertMessage('Added Successfully.','success');
                        loadData();
                    }
                },
                error:function(){ alertMessage("Error in Add Ajax Call.",'error') }
            });
        }

        function update(bike_id,bike_number)
        {
            $.ajax({
                url:'ajax/bike/update.php?bike_id='+bike_id+'&bike_number='+encodeURIComponent(bike_number),
                type:"POST",
                success:function(data){
                    if(data)
                    {
                       var i = $('.selectedd').attr('index');
                        var temp = $('#mytable').DataTable().row(i).data();
                        
                        addNewClick();

                        temp[2] = bike_number;

                        $('#mytable').DataTable().row(i).data(temp).draw();

                        alertMessage('Updated Successfully.','success');
                    }
                },
                error:function(){ alertMessage("Error in Update Ajax Call.",'error') }
            });
        }

        function deletetr(trr,bike_id)
        {
            $.ajax({
                url:'ajax/bike/delete.php?bike_id='+bike_id,
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

            $('#bike_id_div').removeClass('hidden');
            $('#update_form_btn').removeClass('hidden');
            $('#add_new').removeClass('hidden');

            $('#btn_submit').addClass('hidden');
            $('#btn_reset').addClass('hidden');

            $('#bike_number').focus();

        }

        function addNewClick()
        {

            $('form').removeClass('update_form');

            $('#bike_number').val('');

            $('#bike_id_div').addClass('hidden');
            $('#update_form_btn').addClass('hidden');
            $('#add_new').addClass('hidden');

            $('#btn_submit').removeClass('hidden');
            $('#btn_reset').removeClass('hidden');

            $('#bike_number').focus();

        }

        //DELETE 
        $(document).on('click','.delete_btn',function(){

            var bike_id = $(this).attr('id'),
                trr = $(this).closest('tr');

            deletetr(trr,bike_id);
        });

        //ADD NEW 
        $(document).on('click','#add_new',function(){
            addNewClick();
        });

        //UPDATE 
        $(document).on('click','.update_btn',function(){

            updateClick();

            var bike_id = $(this).attr('id'),
                trr = $(this).closest('tr');

            $('tr').each(function(){
                if( $(this).hasClass('selectedd') )
                {
                    $(this).removeClass('selectedd'); 
                }
            });

            trr.addClass('selectedd');   

            $('#bike_id').val( bike_id );
            $('#bike_number').val( trr.find('td').eq(2).text() );

        });

        //Add & Update
        $('form').submit(function(e){
           e.preventDefault();
           
           var bike_number = $('#bike_number').val() ,
               bike_id =  $('#bike_id').val();

           if( $(this).hasClass('update_form') ) 
           {
                update(bike_id,bike_number);
           }
           else
           {
                add(bike_number);
           }

           $('#bike_number').focus();
        });



     });
 </script>