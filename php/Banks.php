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
                                <span class="caption-subject bold uppercase"><?php $text = isset($_SESSION['disable_btn'])?'View':'Add New'; echo $text; ?> Bank</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <?php
                                if(!isset($_SESSION['disable_btn']) )
                                {?>
                            <form class="form-horizontal" role="form" method="post">
                                <div class="form-body">
                                    <div class="row hidden" id="bank_id_div"> 
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">ID:</label>
                                            <div class="col-md-3">
                                              <input type="number" name="bank_id" id="bank_id" readonly class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"> 
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Bank Short Form:</label>
                                            <div class="col-md-3">
                                               <input type="text" class="form-control" id="short_form" name="short_form" required tabindex="1" placeholder="HBL" autofocus >
                                            </div>
                                            <label class="col-md-2 control-label">Bank Full Form:</label>
                                            <div class="col-md-4">
                                               <input type="text" class="form-control" id="full_form" name="full_form" required tabindex="2" placeholder="Habib Bank Limited">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Title of account:</label>
                                            <div class="col-md-3">
                                               <input type="text" class="form-control" id="account_title" name="account_title" required tabindex="3" placeholder="Butt Brothers">
                                            </div>
                                            <label class="col-md-2 control-label">Account #:</label>
                                            <div class="col-md-4">
                                               <input type="text" class="form-control" id="account_number" name="account_number" required  maxlength="25" tabindex="4" placeholder="1080-0081-00381-01-9">
                                            </div> <!-- pattern="[\d]{4}-[\d]{4}-[\d]{5}-[\d]{2}-[\d]{1}" -->
                                        </div>
                                        <div class="form-group">
                                            <div id="balance_div"> 
                                              <label class="col-md-2 control-label">Opening Balance:</label>
                                                <div class="col-md-3">
                                                <input type="number" class="form-control" min="0" step="0.01" id="balance" name="balance" required tabindex="5" placeholder="0.00">
                                              </div>
                                            </div>

                                            <label class="col-md-2 control-label">Address:</label>
                                            <div class="col-md-4">
                                               <textarea type="text" class="form-control" id="address" name="address" required tabindex="6" placeholder="here"></textarea> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-5 col-md-push-2">
                                                <div class="">
                                                    <button type="submit" class="btn blue" id="btn_submit" tabindex="7">Submit</button> 
                                                    <button type="reset" class="btn default" id="btn_reset" tabindex="8">Cancel</button>

                                                    <button type="submit" class="btn blue hidden" id="update_form_btn" tabindex="7">Update</button> 
                                                    <button type="button" class="btn default hidden"  id="add_new" tabindex="8">Add New</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php }//END OF IF?>
                        </div>
                        <!-- Form ends -->
                        <!-- end table -->
                        
                    </div> 
                </div>
            </div>
            <div class="row">
                 <div class="col-md-12">
                     <!-- BEGIN EXAMPLE TABLE PORTLET-->
                     <div class="portlet light bordered">
                         <div class="portlet-title">
                             <div class="caption font-green">
                                 <i class="icon-settings font-green"></i>
                                 <span class="caption-subject bold uppercase">All Banks</span>
                             </div>
                             <div class="tools">
                                 <a href="" class="collapse"> </a>
                             </div>
                             <img src="ajax/loading.gif" id="loading" style="margin-left: 45%; display: block;" height="40" width="40" >
                         </div>
                         <div class="portlet-body table-both-scroll">
                             <table class="table table-striped table-bordered table-hover table-checkable order-column" id="mytable">
                                 <thead>
                                     <tr>
                                         <th> Action </th>  
                                         <th> # </th>
                                         <th> Short Form </th>
                                         <th> Full Form </th>
                                         <th> Name </th>
                                         <th> Account # </th>
                                         <th> Opening Balance  </th>
                                         <th> Address </th> 
                                     </tr>
                                 </thead>
                                 <tbody>
                                 </tbody>
                             </table>
                         </div>
                     </div>
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
                url:'ajax/bank/fetch.php',
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
                                        '<li> <button class="btn btn-xs green update_btn" id="'+value['bank_id']+'" type="button">  '+
                                        '<i class="fa fa-plus-square"></i>'+
                                        '</button> </li>'+

                                        '<!-- Trigger the modal with a button -->'+                                        
                                        '<li>  <button type="button" class="btn btn-xs red" data-toggle="modal" data-target="#myModal'+value['bank_id']+'" >'+
                                        '<i class="fa fa-minus-square"></i>'+
                                        '</button> </li>'+

                                        '<!-- Modal -->'+
                                        '<div id="myModal'+value['bank_id']+'" class="modal fade" role="dialog">'+
                                          '<div class="modal-dialog">'+

                                            '<!-- Modal content-->'+
                                            '<div class="modal-content">'+
                                              '<div class="modal-header">'+
                                                '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                                                '<h4 class="modal-title">Delete</h4>'+
                                              '</div>'+
                                              '<div class="modal-body">'+
                                                '<p>Are you sure you want to delete <strong>'+value['full_form']+'</strong> ?</p>'+
                                              '</div>'+
                                              '<div class="modal-footer">'+
                                                '<button type="button" class="btn btn-default btn-success pull-left" data-dismiss="modal">Close</button>'+
                                                '<button type="button" class="btn btn-default red delete_btn" data-dismiss="modal" id="'+value['bank_id']+'">Delete</button>'+
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
                                '<td>'+value['short_form']+'</td>'+
                                '<td>'+value['full_form']+'</td>'+
                                '<td>'+value['account_title']+'</td>'+
                                '<td>'+value['account_number']+'</td>'+
                                '<td>'+value['balance']+'</td>'+
                                '<td>'+value['address']+'</td>'+

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

        function add(short_form,full_form,account_title,account_number,balance,address)
        {
            $.ajax({
                url:'ajax/bank/add.php?short_form='+encodeURIComponent(short_form)+'&full_form='+encodeURIComponent(full_form)+'&account_title='+encodeURIComponent(account_title)+'&account_number='+encodeURIComponent(account_number)+'&balance='+balance+'&address='+encodeURIComponent(address),
                type:"POST",
                success:function(data){
                    if(data)
                    {
                        $('#short_form').val("");
                        $('#full_form').val("");
                        $('#account_title').val("");
                        $('#account_number').val("");
                        $('#balance').val("");
                        $('#address').val("");
                        alertMessage('Added Successfully.','success');
                        loadData();
                    }
                },
                error:function(){ alertMessage("Error in Add Ajax Call.",'error') }
            });
        }

        function update(bank_id,short_form,full_form,account_title,account_number,address)
        {
            $.ajax({
                url:'ajax/bank/update.php?bank_id='+bank_id+'&short_form='+encodeURIComponent(short_form)+'&full_form='+encodeURIComponent(full_form)+'&account_title='+encodeURIComponent(account_title)+'&account_number='+encodeURIComponent(account_number)+'&address='+encodeURIComponent(address),
                type:"POST",
                success:function(data){
                    if(data)
                    {
                       var i = $('.selectedd').attr('index');
                        var temp = $('#mytable').DataTable().row(i).data();
                        
                        addNewClick();

                        temp[2] = short_form;
                        temp[3] = full_form;
                        temp[4] = account_title;
                        temp[5] = account_number;
                        temp[7] = address;

                        $('#mytable').DataTable().row(i).data(temp).draw();

                        alertMessage('Updated Successfully.','success');
                    }
                },
                error:function(){ alertMessage("Error in Update Ajax Call.",'error') }
            });
        }

        function deletetr(trr,bank_id)
        {
            $.ajax({
                url:'ajax/bank/delete.php',
                data:{bank_id:bank_id},
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

            $('#bank_id_div').removeClass('hidden');
            $('#update_form_btn').removeClass('hidden');
            $('#add_new').removeClass('hidden');

            $('#balance').removeAttr('required');
            $('#balance_div').addClass('hidden');
            $('#btn_submit').addClass('hidden');
            $('#btn_reset').addClass('hidden');

            $('#short_form').focus();

        }

        function addNewClick()
        {

            $('form').removeClass('update_form');

            $('#short_form').val('');
            $('#full_form').val('');
            $('#account_title').val('');
            $('#account_number').val('');
            $('#address').val('');

            $('#balance').attr('required','required');
            $('#balance_div').removeClass('hidden');

            $('#bank_id_div').addClass('hidden');
            $('#update_form_btn').addClass('hidden');
            $('#add_new').addClass('hidden');

            $('#btn_submit').removeClass('hidden');
            $('#btn_reset').removeClass('hidden');

            $('#short_form').focus();
        }

        //DELETE 
        $(document).on('click','.delete_btn',function(){

            var bank_id = $(this).attr('id'),
                trr = $(this).closest('tr');

            deletetr(trr,bank_id);
        });

        //ADD NEW 
        $(document).on('click','#add_new',function(){
            addNewClick();
        });

        //UPDATE 
        $(document).on('click','.update_btn',function(){

            updateClick();

            var bank_id = $(this).attr('id'),
                trr = $(this).closest('tr');

            $('tr').each(function(){
                if( $(this).hasClass('selectedd') )
                {
                    $(this).removeClass('selectedd'); 
                }
            });

            trr.addClass('selectedd');   

            $('#bank_id').val( bank_id );
            $('#short_form').val( trr.find('td').eq(2).text() );
            $('#full_form').val( trr.find('td').eq(3).text() );    
            $('#account_title').val( trr.find('td').eq(4).text() );
            $('#account_number').val( trr.find('td').eq(5).text() );
            $('#address').val( trr.find('td').eq(7).text() );

        });

        //Add & Update
        $('form').submit(function(e){
           e.preventDefault();
           
           var short_form = $('#short_form').val() ,
               full_form = $('#full_form').val(),
               account_title = $('#account_title').val(),
               account_number = $('#account_number').val(),
               balance = $('#balance').val(),
               address = $('#address').val(),
               bank_id =  $('#bank_id').val();

           if( $(this).hasClass('update_form') ) 
           {
                update(bank_id,short_form,full_form,account_title,account_number,address);
           }
           else
           {
                add(short_form,full_form,account_title,account_number,balance,address);
           }

           $('#short_form').focus();
        });



     });
 </script>