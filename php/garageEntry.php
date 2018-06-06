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
                                <span class="caption-subject bold uppercase"><?php $text = isset($_SESSION['disable_btn'])?'View':'Add New'; echo $text; ?> Garage Entry</span>
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
                                            <div id="ge_id_div" class="hidden">
                                              <label class="col-md-2 control-label">ID:</label>
                                              <div class="col-md-3">
                                                <input type="text" class="form-control" id="ge_id" name="ge_id" required readonly >
                                              </div>
                                            </div>
                                    
                                        </div>
                                        
                                    </div>
                                    <div class="row"> 
                                        
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Date:</label>
                                            <div class="col-md-3">
                                              <input type="date-picker" class="form-control form-control-inline input-medium date-picker"  size="16" id="datee" name="datee" value="<?php echo date('m/d/Y'); ?>"  required tabindex="1">
                                            </div>
                                    
                                            <label class="col-md-2 control-label">Description:</label>
                                            <div class="col-md-3">
                                              <textarea  id="description" name="description" class="form-control" placeholder="Details" tabindex="2"></textarea> </div>
                                            </div>
                                         </div>    
                                     <div class="row"> 
                                         <div class="form-group">
                                            <label class="col-md-2 control-label">vehicle #:</label>
                                            <div class="col-md-3">
                                                <select class="form-control" id="vehicle_id" name="vehicle_id" required tabindex="3">
                                                    <option value="">Select Vehicle</option>
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


                                            <label class="col-md-1 control-label">Amount</label>
                                             <div class="col-md-3">
                                               <input type="number" step="0.01" min="0" class="form-control" id="amount" name="amount" required tabindex="4" placeholder="58680">
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
                            <?php }//END OF IF?>
                        </div>
                        <!-- Form ends -->
                        <hr>
                             <div class="row">
                         <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    
                                    <div class="portlet-body">
                                 
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="mytable">
                                            <thead>
                                                <tr>
                                                   
                                                    <th> Action </th> 
                                                    <th> # </th>
                                                    <th> Date: </th>
                                                    <th> Description: </th>
                                                    <th> vehicle #: </th>
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

                $('#'+param+'_full_form').val('');
                $('#'+param).html('<option value="">Select Vehicle</option>');
                
                $.each(data,function(index,value){
                  $('#'+param).append('<option value="'+value['vehicle_id']+'">'+value['vehicle_number']+'</option> ');
                });


                  $('#'+param).select2({
                    width: 'resolve',
                    theme: "classic"
                  });

          },
          error:function(){  alertMessage('Error in Updating Field Ajax Call.','error') }
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

        function loadData()
        {
            $.ajax({
                url:'ajax/garage_entry/fetch.php',
                dataType:"JSON",
                success:function(data){
                    var n = 1;
                    var i = 0;

                    $('#mytable').DataTable().destroy();
                    $('tbody').html("");
                    
                    $.each(data,function(index,value){

                        $('tbody').append('<tr  index="'+i+'" class="odd gradeX">'+

                            <?php
                                if(!isset($_SESSION['disable_btn']) )
                                {?>
                                '<td>'+ 
                                    '<ul class="addremove">'+
                                        '<li> <button class="btn btn-xs green update_btn" id="'+value['ge_id']+'" type="button">  '+
                                        '<i class="fa fa-plus-square"></i>'+
                                        '</button> </li>'+
                                        '<li>  <button class="btn btn-xs red delete_btn" id="'+value['ge_id']+'" type="button">  '+
                                        '<i class="fa fa-minus-square"></i>'+
                                        '</button> </li>'+
                                    '</ul>'+
                                '</td>'+    
                                <?php }//END OF If
                                else{?>
                                    '<td></td>'+
                                <?php }//END OF ELSE ?>                   

                                '<td>'+n+'</td>'+
                                '<td>'+value['datee']+'</td>'+
                                '<td>'+value['description']+'</td>'+
                                '<td id="'+value['vehicle_id']+'">'+value['vehicle_number']+'</td>'+
                                '<td>'+value['amount']+'</td>'+
                                '</tr>');

                        n++; i++;
                    }) 
                    myDataTable();
                },
                error:function(){ alertMessage("Failed Fetch Ajax Call.",'error') }
            });
        }

        loadData();

        function add(datee,description,vehicle_id,amount)
        {
            $.ajax({
                url:'ajax/garage_entry/add.php?datee='+encodeURIComponent(datee)+'&description='+encodeURIComponent(description)+'&vehicle_id='+vehicle_id+'&amount='+amount,
                type:"POST",
                success:function(data){
                    if(data)
                    {
                        $('#vehicle_id').val("").trigger('change');
                        $('#btn_reset').trigger('click');
                        alertMessage('Added Successfully.','success');
                        loadData();
                    }
                },
                error:function(){ alertMessage("Error in Add Ajax Call.",'error') }
            });
        }

        function update(ge_id,datee,description,vehicle_id,amount,vehicle_number)
        {
            $.ajax({
                url:'ajax/garage_entry/update.php?ge_id='+ge_id+'&datee='+encodeURIComponent(datee)+'&description='+encodeURIComponent(description)+'&vehicle_id='+vehicle_id+'&amount='+amount,
                type:"POST",
                success:function(data){
                    if(data)
                    {
                        var i = $('.selectedd').attr('index');
                        var temp = $('#mytable').DataTable().row(i).data();
                        
                        addNewClick();

                        temp[2] = datee;
                        temp[3] = description;
                        temp[4] = vehicle_number;
                        temp[5] = amount;

                        $('#mytable').DataTable().row(i).data(temp).draw();

                        alertMessage('Updated Successfully.','success');

                    }
                },
                error:function(){ alertMessage("Error in Update Ajax Call.",'error') }
            });
        }

        function deletetr(trr,ge_id)
        {
            $.ajax({
                url:'ajax/garage_entry/delete.php?ge_id='+ge_id,
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

            $('#ge_id_div').removeClass('hidden');
            $('#update_form_btn').removeClass('hidden');
            $('#add_new').removeClass('hidden');

            $('#btn_submit').addClass('hidden');
            $('#btn_reset').addClass('hidden');

            $('#datee').focus();

        }

        function addNewClick()
        {

            $('form').removeClass('update_form');

            $('#vehicle_id').val('').trigger('change');
            $('#btn_reset').trigger('click');

            $('#ge_id_div').addClass('hidden');
            $('#update_form_btn').addClass('hidden');
            $('#add_new').addClass('hidden');

            $('#btn_submit').removeClass('hidden');
            $('#btn_reset').removeClass('hidden');

            $('#datee').focus();

        }

        //DELETE 
        $(document).on('click','.delete_btn',function(){

            var ge_id = $(this).attr('id'),
                trr = $(this).closest('tr');

            deletetr(trr,ge_id);
        });

        //ADD NEW 
        $(document).on('click','#add_new',function(){
            addNewClick();
        });

        //UPDATE 
        $(document).on('click','.update_btn',function(){

            updateClick();

            var ge_id = $(this).attr('id'),
                trr = $(this).closest('tr');

            $('tr').each(function(){
                if( $(this).hasClass('selectedd') )
                {
                    $(this).removeClass('selectedd'); 
                }
            });

            trr.addClass('selectedd');   

            $('#ge_id').val( ge_id );
            $('#datee').val( trr.find('td').eq(2).text() );
            $('#description').val( trr.find('td').eq(3).text() );
            $('#vehicle_id').val( trr.find('td').eq(4).attr('id') ).trigger('change');
            $('#amount').val( trr.find('td').eq(5).text() );

        });

        //Add & Update
        $('form').submit(function(e){
           e.preventDefault();
           
           var datee = $('#datee').val() ,
               description = $('#description').val() ,
               vehicle_id = $('#vehicle_id').val() ,
               vehicle_number = $('#vehicle_id option:selected').text() ,
               amount = $('#amount').val() ,
               ge_id =  $('#ge_id').val();

           if( $(this).hasClass('update_form') ) 
           {
                update(ge_id,datee,description,vehicle_id,amount,vehicle_number);
           }
           else
           {
                add(datee,description,vehicle_id,amount);
           }

           $('#datee').focus();
        });



     });
 </script>