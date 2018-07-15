<?php 

session_start();

if($_SESSION['role'] != 'admin')
{
    echo '<script> location.assign("../index.php"); </script>';
}

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
                                <span class="caption-subject bold uppercase"> Add User</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form class="form-horizontal" role="form" method="post">
                                <div class="form-body">
                                    <div class="row"> 
                                        <div class="form-group">
                                                <div id="login_id_div" class="hidden">
                                                    <label class="col-md-2 control-label">ID:</label>
                                                    <div class="col-md-3">
                                                      <input type="number" readonly class="form-control" id="login_id" name="login_id">
                                                    </div>
                                                </div>
                                    
                                         </div>  

                                     </div>   
                                    
                                    <div class="row">
                                        <div class="form-group">

                                            <label class="col-md-2 control-label">Name:</label>
                                            <div class="col-md-3">
                                              <input type="text" class="form-control" id="name" name="name" tabindex="1" placeholder="Full Name" required maxlength="60" autofocus >
                                            </div>

                                            <label class="col-md-2 control-label">Username:</label>
                                            <div class="col-md-3">
                                              <input type="text" class="form-control" id="username" name="username" tabindex="2" placeholder="@username" required maxlength="60">
                                            </div>

                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group">


                                            <label class="col-md-2 control-label">Password:</label>
                                            <div class="col-md-3">
                                              <input type="password" class="form-control" id="pass" name="pass" tabindex="3" placeholder="*****" required pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.cpass.pattern = this.value;">
                                            </div>
                                            
                                            <label class="col-md-2 control-label">Confirm Password:</label>
                                            <div class="col-md-3">
                                              <input type="password" class="form-control" id="cpass" name="cpass" tabindex="4" placeholder="*****" required pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row" id="role_div">
                                        <div class="form-group">

                                            <label class="col-md-2 control-label">Role:</label>
                                            <div class="col-md-3">
                                              <select id="role" class="form-control" name="role" tabindex="5" required>
                                                  <option value="">Select Role</option>
                                                  <option value="only view">Only View</option>
                                                  <option value="reporting">Reporting</option>
                                              </select>
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
                        </div>
                        <!-- Form ends -->
                        <hr>
                             <div class="row">
                         <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">

                                    <img src="ajax/loading.gif" id="loading" style="margin-left: 45%; display: none;" height="40" width="40" >
                                    
                                    <div class="portlet-body">
                                 
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="mytable">
                                            <thead>
                                                <tr>
                                                    <th> Actions  </th> 
                                                    <th> #        </th>
                                                    <th> Name     </th>
                                                    <th> Username </th>
                                                    <th> Role     </th>
                                                    <th> Password </th>
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
<script src="../assets/global/scripts/jquery.md5.js"></script>
<script type="text/javascript">
     
     $(document).ready(function(){

        function roleHide()
        {
            $('#role_div').hide();
            $('#role').removeAttr('required');
        }

        function roleShow()
        {
            $('#role_div').show();
            $('#role').attr('required');   
        }


        function myDataTable()
        {
            var e=$("#mytable");
            e.dataTable({language:{aria:{sortAscending:": activate to sort column ascending",sortDescending:": activate to sort column descending"},emptyTable:"No data available in table",info:"Showing _START_ to _END_ of _TOTAL_ records",infoEmpty:"No records found",infoFiltered:"(filtered1 from _MAX_ total records)",lengthMenu:"Show _MENU_",search:"Search:",zeroRecords:"No matching records found",paginate:{previous:"Prev",next:"Next",last:"Last",first:"First"}},bStateSave:!0,columnDefs:[{targets:0,orderable:!1,searchable:!1}],lengthMenu:[[5,15,20,-1],[5,15,20,"All"]],pageLength:5,pagingType:"bootstrap_full_number",columnDefs:[{orderable:!1,targets:[0]},{searchable:!1,targets:[0]}],order:[[1,"asc"]]});
        }

        function loadData()
        {
            $('#loading').show();

            $.ajax({
                url:'ajax/login/fetch.php',
                dataType:"JSON",
                success:function(data){
                    var n = 1,
                        i = 0,
                        code = '';

                    $('#mytable').DataTable().destroy();
                    $('tbody').html("");
                    
                    var table = $.each(data,function(index,value){

                        if( value['role'] == 'admin' )
                        {
                            code = '<td>'+ 
                                    '<ul class="addremove">'+
                                        '<li> <button class="btn btn-xs green update_btn" id="'+value['login_id']+'" type="button">  '+
                                        '<i class="fa fa-plus-square"></i>'+
                                        '</button> </li>'+
                                    '</ul>'+
                                '</td>';
                        }
                        else
                        {
                            code = '<td>'+ 
                                    '<ul class="addremove">'+
                                        '<li> <button class="btn btn-xs green update_btn" id="'+value['login_id']+'" type="button">  '+
                                        '<i class="fa fa-plus-square"></i>'+
                                        '</button> </li>'+

                                        '<!-- Trigger the modal with a button -->'+                                        
                                        '<li>  <button type="button" class="btn btn-xs red" data-toggle="modal" data-target="#myModal'+value['login_id']+'" >'+
                                        '<i class="fa fa-minus-square"></i>'+
                                        '</button> </li>'+

                                        '<!-- Modal -->'+
                                        '<div id="myModal'+value['login_id']+'" class="modal fade" role="dialog">'+
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
                                                '<button type="button" class="btn btn-default red delete_btn" data-dismiss="modal" id="'+value['login_id']+'">Delete</button>'+
                                              '</div>'+
                                            '</div>'+

                                          '</div>'+
                                        '</div>'+

                                    '</ul>'+
                                '</td>';
                        }

                        $('tbody').append('<tr index="'+i+'" class="odd gradeX">'+
                            <?php
                                if(!isset($_SESSION['disable_btn']) )
                                {?> code+ <?php }//END OF If
                                else{?>
                                    '<td></td>'+
                                <?php }//END OF ELSE ?>              

                                '<td>'+n+'</td>'+
                                '<td>'+value['name']+'</td>'+
                                '<td>'+value['username']+'</td>'+
                                '<td>'+value['role']+'</td>'+
                                '<td>'+value['pass']+'</td>'+
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

        function add(name,username,role,pass)
        {
            // var inputs = [name,username,role,pass];
            // var serializedData = inputs.serialize();
// ?name='+encodeURIComponent(name)+'&username='+encodeURIComponent(username)+'&role='+role+'&pass='+encodeURIComponent(pass)
            $.ajax({
                url:'ajax/login/add.php',
                type:"POST",
                data:{login_id:login_id,name:name,username:username,role:role,pass:pass},
                success:function(data){
                    if(data)
                    {
                        $('#btn_reset').trigger('click');
                        alertMessage('Added Successfully.','success');

                        loadData();
                    }
                },
                error:function(){ alertMessage("Error in Add Ajax Call.",'error') }
            });
        }

        function update(login_id,name,username,role,pass)
        {
            $.ajax({
                url:'ajax/login/update.php',
                type:"POST",
                data:{login_id:login_id,name:name,username:username,role:role,pass:pass},
                success:function(data){
                    if(data)
                    {
                       var i = $('.selectedd').attr('index');
                        var temp = $('#mytable').DataTable().row(i).data();
                        
                        addNewClick();

                        temp[2] = name;
                        temp[3] = username;
                        temp[4] = role;
                        temp[5] = jQuery.md5(pass);

                        $('#mytable').DataTable().row(i).data(temp).draw();

                        alertMessage('Updated Successfully.','success');
                    }
                },
                error:function(){ alertMessage("Error in Update Ajax Call.",'error') }
            });
        }

        function deletetr(trr,login_id)
        {
            $.ajax({
                url:'ajax/login/delete.php?login_id='+login_id,
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

            $('#login_id_div').removeClass('hidden');
            $('#update_form_btn').removeClass('hidden');
            $('#add_new').removeClass('hidden');

            $('#btn_submit').addClass('hidden');
            $('#btn_reset').addClass('hidden');

            $('#name').focus();

        }

        function addNewClick()
        {

            $('form').removeClass('update_form');

            $('#btn_reset').trigger('click');

            $('#login_id_div').addClass('hidden');
            $('#update_form_btn').addClass('hidden');
            $('#add_new').addClass('hidden');

            $('#btn_submit').removeClass('hidden');
            $('#btn_reset').removeClass('hidden');

            $('#name').focus();

        }

        //DELETE 
        $(document).on('click','.delete_btn',function(){

            var login_id = $(this).attr('id'),
                trr = $(this).closest('tr');

            deletetr(trr,login_id);
        });

        //ADD NEW 
        $(document).on('click','#add_new',function(){
            addNewClick();
            roleShow();
        });

        //UPDATE 
        $(document).on('click','.update_btn',function(){

            updateClick();

            var login_id = $(this).attr('id'),
                trr = $(this).closest('tr');

            $('tr').each(function(){
                if( $(this).hasClass('selectedd') )
                {
                    $(this).removeClass('selectedd'); 
                }
            });

            trr.addClass('selectedd');   

            $('#login_id').val( login_id );
            $('#name').val( trr.find('td').eq(2).text() );
            $('#username').val( trr.find('td').eq(3).text() );
            
            if(trr.find('td').eq(4).text() == 'admin')
            {
                roleHide();
            }
            else
            {
                $('#role').val( trr.find('td').eq(4).text() ).trigger('change');
            }

        });

        //Add & Update
        $('form').submit(function(e){
           e.preventDefault();
           
           var name = $('#name').val()
               username = $('#username').val() ,
               role = $('#role').val(),
               pass = $('#pass').val(),
               login_id =  $('#login_id').val();

           if( $(this).hasClass('update_form') ) 
           {
                update(login_id,name,username,role,pass);
           }
           else
           {
                add(name,username,role,pass)
           }

           $('#name').focus();
        });



     });
 </script>