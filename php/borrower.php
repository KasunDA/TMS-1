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
                                <span class="caption-subject bold uppercase"><?php $text = isset($_SESSION['disable_btn'])?'View':'Add New'; echo $text; ?> Borrower</span>
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
                                            <div class="hidden" id="borrower_id_div"> 
                                                <label class="col-md-2 control-label">ID:</label>
                                                <div class="col-md-3">
                                                  <input type="number" name="borrower_id" id="borrower_id" readonly class="form-control">
                                                </div>
                                            </div>

                                                <label class="col-md-2 control-label"> Name:</label>
                                                <div class="col-md-3">
                                                  <input type="text" class="form-control" id="name" name="name" required tabindex="1" placeholder="Borrower Name" autofocus />
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
                                                   
                                                    <th> Action </th> 
                                                    <th> # </th>
                                                    <th> Name </th>
                                                   
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
                url:'ajax/borrower/fetch.php',
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
                                        '<li> <button class="btn btn-xs green update_btn" id="'+value['borrower_id']+'" type="button">  '+
                                        '<i class="fa fa-plus-square"></i>'+
                                        '</button> </li>'+

                                        '<!-- Trigger the modal with a button -->'+                                        
                                        '<li>  <button type="button" class="btn btn-xs red" data-toggle="modal" data-target="#myModal'+value['borrower_id']+'" >'+
                                        '<i class="fa fa-minus-square"></i>'+
                                        '</button> </li>'+

                                        '<!-- Modal -->'+
                                        '<div id="myModal'+value['borrower_id']+'" class="modal fade" role="dialog">'+
                                          '<div class="modal-dialog">'+

                                            '<!-- Modal content-->'+
                                            '<div class="modal-content">'+
                                              '<div class="modal-header">'+
                                                '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                                                '<h4 class="modal-title">Delete</h4>'+
                                              '</div>'+
                                              '<div class="modal-body">'+
                                                '<p>Are you sure you want to delete <strong>'+value['name']+'</strong> ?</p>'+
                                              '</div>'+
                                              '<div class="modal-footer">'+
                                                '<button type="button" class="btn btn-default btn-success pull-left" data-dismiss="modal">Close</button>'+
                                                '<button type="button" class="btn btn-default red delete_btn" data-dismiss="modal" id="'+value['borrower_id']+'">Delete</button>'+
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
                                '<td>'+value['name']+'</td>'+

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

        function add(name)
        {
            $.ajax({
                url:'ajax/borrower/add.php?name='+encodeURIComponent(name),
                type:"POST",
                success:function(data){
                    if(data)
                    {
                        $('#name').val("");
                        alertMessage('Added Successfully.','success');
                        loadData();
                    }
                },
                error:function(){ alertMessage("Error in Add Ajax Call.",'error') }
            });
        }

        function update(borrower_id,name)
        {
            $.ajax({
                url:'ajax/borrower/update.php?borrower_id='+borrower_id+'&name='+encodeURIComponent(name),
                type:"POST",
                success:function(data){
                    if(data)
                    {
                        var i = $('.selectedd').attr('index');
                        var temp = $('#mytable').DataTable().row(i).data();
                        
                        addNewClick();

                        temp[2] = name;

                        $('#mytable').DataTable().row(i).data(temp).draw();

                        alertMessage('Updated Successfully.','success');
                        
                    }
                },
                error:function(){ alertMessage("Error in Update Ajax Call.",'error') }
            });
        }

        function deletetr(trr,borrower_id)
        {
            $.ajax({
                url:'ajax/borrower/delete.php',
                data:{borrower_id:borrower_id},
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

            $('#borrower_id_div').removeClass('hidden');
            $('#update_form_btn').removeClass('hidden');
            $('#add_new').removeClass('hidden');

            $('#btn_submit').addClass('hidden');
            $('#btn_reset').addClass('hidden');

            $('#name').focus();

        }

        function addNewClick()
        {

            $('form').removeClass('update_form');

            $('#name').val('');

            $('#borrower_id_div').addClass('hidden');
            $('#update_form_btn').addClass('hidden');
            $('#add_new').addClass('hidden');

            $('#btn_submit').removeClass('hidden');
            $('#btn_reset').removeClass('hidden');

            $('#name').focus();

        }

        //DELETE 
        $(document).on('click','.delete_btn',function(){

            var borrower_id = $(this).attr('id'),
                trr = $(this).closest('tr');

            deletetr(trr,borrower_id);
        });

        //ADD NEW 
        $(document).on('click','#add_new',function(){
            addNewClick();
        });

        //UPDATE 
        $(document).on('click','.update_btn',function(){

            updateClick();

            var borrower_id = $(this).attr('id'),
                trr = $(this).closest('tr');

            $('tr').each(function(){
                if( $(this).hasClass('selectedd') )
                {
                    $(this).removeClass('selectedd'); 
                }
            });

            trr.addClass('selectedd');   

            $('#borrower_id').val( borrower_id );
            $('#name').val( trr.find('td').eq(2).text() );

        });

        //Add & Update
        $('form').submit(function(e){
           e.preventDefault();
           
           var name = $('#name').val(),
               borrower_id =  $('#borrower_id').val();

           if( $(this).hasClass('update_form') ) 
           {
                update(borrower_id,name);
           }
           else
           {
                add(name);
           }

           $('#name').focus();
        });



     });
 </script>