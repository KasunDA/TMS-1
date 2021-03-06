<?php 
include 'header.php';
include 'nav.php';

require 'connection.php';
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
                                <span class="caption-subject bold uppercase"><?php $text = isset($_SESSION['disable_btn'])?'View':'Add New'; echo $text; ?> Diesel Limit:</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <?php
                                if(!isset($_SESSION['disable_btn']) )
                                {?>
                            <form class="form-horizontal" role="form" method="post">
                                <div class="form-body">
                                    <div class="row hidden" id="dl_id_div"> 
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">ID:</label>
                                            <div class="col-md-3">
                                              <input type="number" name="dl_id" id="dl_id" readonly class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"> 
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">From Destination:</label>
                                            <div class="col-md-3">
                                                <select class="form-control select" id="from_yard" name="from_yard" required tabindex="1" style="width: 100%;" autofocus>
                                                    <option value="">Select Destination</option>
                                                    <?php

                                                    $q = mysqli_query($mycon,'SELECT * FROM yard WHERE status=1 ORDER BY yard_id DESC ');
                                                
                                                    while($r = mysqli_fetch_array($q))
                                                    {?>
                                                        <option value="<?php echo $r['yard_id'] ?>"> <?php echo $r['short_form'] ?>
                                                            <span class="caption"> ( <?php echo $r['full_form'] ?> ) </span>
                                                        </option>
                                                    <?php
                                                    }//END OF WHILE

                                                    ?>
                                                </select>
                                            </div>
                                    
                                            <label class="col-md-2 control-label">To Destination:</label>
                                            <div class="col-md-3">
                                                <select class="" id="to_yard" name="to_yard" required tabindex="2" style="width: 100%;">
                                                    <option value="" >Select Destination</option>
                                                    <?php

                                                    $q = mysqli_query($mycon,'SELECT * FROM yard WHERE status=1 ORDER BY yard_id DESC ');
                                                
                                                    while($r = mysqli_fetch_array($q))
                                                    {?>
                                                        <option value="<?php echo $r['yard_id'] ?>"> <?php echo $r['short_form'] ?>
                                                            <span class="caption"> ( <?php echo $r['full_form'] ?> ) </span>
                                                        </option>
                                                    <?php
                                                    }//END OF WHILE

                                                    ?>
                                                </select>
                                            </div>
                                         </div>    
                                         <div class="form-group">
                                            <label class="col-md-2 control-label">Diesel in Liters:</label>
                                            <div class="col-md-3">
                                                <input type="number" class="form-control" placeholder="10" id="limit_litre" name="limit_litre" required tabindex="3" min="0">
                                            </div>
                                          </div>  
                                    <div class="row">
                                        <div class="col-md-5 col-md-push-2">
                                            <div class="form-actions ">
                                        <button type="submit" class="btn blue" id="btn_submit" tabindex="4">Submit</button> 
                                        <button type="reset" class="btn default" id="btn_reset" tabindex="5">Cancel</button>

                                        <button type="submit" class="btn blue hidden" id="update_form_btn" tabindex="4">Update</button> 
                                        <button type="button" class="btn default hidden"  id="add_new" tabindex="5">Add New</button>
                                            </div>
                                        </div>
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

                                    <img src="ajax/loading.gif" id="loading" style="margin-left: 45%; display: block;" height="40" width="40" >
                                    
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="mytable">
                                            <thead>
                                                <tr>
                                                   
                                                    <th> Action </th> 
                                                    <th> # </th>
                                                    <th> From </th>
                                                    <th> To </th>
                                                    <th> Diesel in Liters </th>
                                                   
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

        //Select2 from _yard
        $('#from_yard,#to_yard').select2({
            width: 'resolve',
            theme: "classic"
        });

        $('.select2-selection').addClass('select');


        function myDataTable()
        {
            var e=$("#mytable");
            e.dataTable({language:{aria:{sortAscending:": activate to sort column ascending",sortDescending:": activate to sort column descending"},emptyTable:"No data available in table",info:"Showing _START_ to _END_ of _TOTAL_ records",infoEmpty:"No records found",infoFiltered:"(filtered1 from _MAX_ total records)",lengthMenu:"Show _MENU_",search:"Search:",zeroRecords:"No matching records found",paginate:{previous:"Prev",next:"Next",last:"Last",first:"First"}},bStateSave:!0,columnDefs:[{targets:0,orderable:!1,searchable:!1}],lengthMenu:[[5,15,20,-1],[5,15,20,"All"]],pageLength:5,pagingType:"bootstrap_full_number",columnDefs:[{orderable:!1,targets:[0]},{searchable:!1,targets:[0]}],order:[[1,"asc"]]});
        }

        function loadData()
        {
            $('#loading').show();

            $.ajax({
                url:'ajax/diesel_limit/fetch.php',
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
                                        '<li> <button class="btn btn-xs green update_btn" id="'+value['dl_id']+'" type="button">  '+
                                        '<i class="fa fa-plus-square"></i>'+
                                        '</button> </li>'+

                                        '<!-- Trigger the modal with a button -->'+                                        
                                        '<li>  <button type="button" class="btn btn-xs red" data-toggle="modal" data-target="#myModal'+value['dl_id']+'" >'+
                                        '<i class="fa fa-minus-square"></i>'+
                                        '</button> </li>'+

                                        '<!-- Modal -->'+
                                        '<div id="myModal'+value['dl_id']+'" class="modal fade" role="dialog">'+
                                          '<div class="modal-dialog">'+

                                            '<!-- Modal content-->'+
                                            '<div class="modal-content">'+
                                              '<div class="modal-header">'+
                                                '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                                                '<h4 class="modal-title">Delete</h4>'+
                                              '</div>'+
                                              '<div class="modal-body">'+
                                                '<p>Are you sure you want to delete <strong>'+value['from_yard_full']+'  TO  '+value['to_yard_full']+'</strong> ?</p>'+
                                              '</div>'+
                                              '<div class="modal-footer">'+
                                                '<button type="button" class="btn btn-default btn-success pull-left" data-dismiss="modal">Close</button>'+
                                                '<button type="button" class="btn btn-default red delete_btn" data-dismiss="modal" id="'+value['dl_id']+'">Delete</button>'+
                                              '</div>'+
                                            '</div>'+

                                          '</div>'+
                                        '</div>'+

                                    '</ul>'+
                                '</td>'+            
                                <?php }//END OF If
                                else{?>
                                    '<td></td>'+
                                <?php }//END OF ELSE ?>           

                                '<td>'+n+'</td>'+
                                '<td from_yard_id="'+value['from_yard_id']+'">'+value['from_yard']+' ('+value['from_yard_full']+') </td>'+
                                '<td to_yard_id="'+value['to_yard_id']+'">'+value['to_yard']+' ('+value['to_yard_full']+') </td>'+
                                '<td>'+value['limit_litre']+'</td>'+

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

        function add(from_yard,to_yard,limit_litre)
        {
            $.ajax({
                url:'ajax/diesel_limit/add.php?from_yard='+from_yard+'&to_yard='+to_yard+'&limit_litre='+limit_litre,
                type:"POST",
                success:function(data){
                    if(data)
                    {
                        $('#from_yard').val('').trigger('change');
                        $('#to_yard').val('').trigger('change');
                        $('#limit_litre').val("");
                        alertMessage('Added Successfully.','success');
                        loadData();
                    }
                },
                error:function(){ alertMessage("Error in Add Ajax Call.",'error') }
            });
        }

        function update(dl_id,from_yard,from_yard_text,to_yard,to_yard_text,limit_litre)
        {
            $.ajax({
                url:'ajax/diesel_limit/update.php?dl_id='+dl_id+'&from_yard='+from_yard+'&to_yard='+to_yard+'&limit_litre='+limit_litre,
                type:"POST",
                success:function(data){
                    if(data)
                    {
                        var i = $('.selectedd').attr('index');
                        var temp = $('#mytable').DataTable().row(i).data();
                        
                        addNewClick();

                        temp[2] = from_yard_text;
                        temp[3] = to_yard_text;
                        temp[4] = limit_litre;

                        $('#mytable').DataTable().row(i).data(temp).draw();

                        alertMessage('Updated Successfully.','success');
                        
                    }
                },
                error:function(){ alertMessage("Error in Update Ajax Call.",'error') }
            });
        }

        function deletetr(trr,dl_id)
        {
            $.ajax({
                url:'ajax/diesel_limit/delete.php',
                data:{dl_id:dl_id},
                type:'POST',
                dataType:'JSON',
                success:function(data){
                    if( data['deleted'] == 'true' )
                    {
                        trr.fadeOut(100,function(){
                           trr.remove(); 
                        });
                    }
                    else
                        alertMessage("Not Deleted!",'error');
                },
                error:function(){ alertMessage("Error in Delete ajax Call.",'error') }
            });
        }

        function updateClick()
        {

            $('form').addClass('update_form');

            $('#dl_id_div').removeClass('hidden');
            $('#update_form_btn').removeClass('hidden');
            $('#add_new').removeClass('hidden');

            $('#btn_submit').addClass('hidden');
            $('#btn_reset').addClass('hidden');

            $('#from_yard').focus();

        }

        function addNewClick()
        {

            $('form').removeClass('update_form');

            // fselectize.clear();
            // tselectize.clear();
            $('#from_yard').val('').trigger('change');
            $('#to_yard').val('').trigger('change');
            $('#limit_litre').val('');

            $('#dl_id_div').addClass('hidden');
            $('#update_form_btn').addClass('hidden');
            $('#add_new').addClass('hidden');

            $('#btn_submit').removeClass('hidden');
            $('#btn_reset').removeClass('hidden');

            $('#from_yard').focus();

        }

        //DELETE 
        $(document).on('click','.delete_btn',function(){

            var dl_id = $(this).attr('id'),
                trr = $(this).closest('tr');

            deletetr(trr,dl_id);
        });

        //ADD NEW 
        $(document).on('click','#add_new',function(){
            addNewClick();
        });

        //UPDATE 
        $(document).on('click','.update_btn',function(){

            updateClick();

            var dl_id = $(this).attr('id'),
                trr = $(this).closest('tr');

            $('tr').each(function(){
                if( $(this).hasClass('selectedd') )
                {
                    $(this).removeClass('selectedd'); 
                }
            });

            trr.addClass('selectedd');   

            $('#dl_id').val( dl_id );

            var from_yard_id = trr.find('td').eq(2).attr('from_yard_id'),
                to_yard_id = trr.find('td').eq(3).attr('to_yard_id');

            $('#from_yard').val(from_yard_id).trigger('change');
            $('#to_yard').val(to_yard_id).trigger('change');

            $('#limit_litre').val( trr.find('td').eq(4).text() );    

        });

        //Add & Update
        $('form').submit(function(e){
           e.preventDefault();
           
           var from_yard = $('#from_yard').val() ,
               from_yard_text = $('#from_yard option:selected').text(),
               to_yard = $('#to_yard').val(),
               to_yard_text = $('#to_yard option:selected').text(),
               limit_litre = $('#limit_litre').val(),
               dl_id =  $('#dl_id').val();

              // alert( from_yard_text + '  ' + to_yard_text );

           if( $(this).hasClass('update_form') ) 
           {
                update(dl_id,from_yard,from_yard_text,to_yard,to_yard_text,limit_litre);
           }
           else
           {
                add(from_yard,to_yard,limit_litre);
           }

           $('#from_yard').focus();
        });



     });
 </script>