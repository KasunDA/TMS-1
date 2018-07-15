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
                                <span class="caption-subject bold uppercase"> <?php $text = isset($_SESSION['disable_btn'])?'View':'Add New'; echo $text; ?> Driver</span>
                            </div>
                        </div>
                        <div class="portlet-body form">

                            <?php
                                if(!isset($_SESSION['disable_btn']) )
                                {?>
                            <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" id="myform">
                                <div class="form-body">
                                    <div class="row"> 
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Driver ID:</label>
                                            <div class="col-md-3">
                                              <input type="number" readonly class="form-control" id="driver_id" tabindex="-1" name="driver_id">
                                            </div>

                                            <label class="col-md-2 control-label">Name:</label>
                                            <div class="col-md-3">
                                              <input type="text" class="form-control" id="name" name="name" tabindex="1" placeholder="Full Name" required maxlength="60" autofocus>
                                            </div>
                                            
                                         </div>  

                                     </div>   
                                    
                                    <div class="row">
                                        <div class="form-group">
                                            
                                        	<label class="col-md-2 control-label">Father Name:</label>
                                            <div class="col-md-3">
                                              <input type="text" class="form-control" id="father_name" name="father_name" tabindex="2" placeholder="" required maxlength="50">
                                            </div>

                                            <label class="col-md-2 control-label">CNIC:</label>
                                            <div class="col-md-3">
                                              <input type="text" class="form-control" id="cnic" name="cnic" tabindex="3" pattern="[\d*]{5}-[\d*]{7}-[\d*]{1}" placeholder="XXXXX-XXXXXXX-X" required maxlength="15">
                                            </div>

                                            
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            
                                            <label class="col-md-2 control-label">Contact:</label>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" id="contact" name="contact" tabindex="4" placeholder="03XXXXXXXXX" required maxlength="11" pattern="\d*">
                                            </div>

                                            <label class="col-md-2 control-label">Address:</label>
                                            <div class="col-md-3">
                                              <textarea class="form-control" id="address" rows="3" style="resize: none;" name="address" tabindex="5" required></textarea>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            
                                            <label class="col-md-2 control-label">Truck #:</label>
                                            <div class="col-md-3">
                                            	<input type="text" class="form-control" id="truck_number" name="truck_number" tabindex="6" placeholder="" required >
                                            </div>

                                            <label class="col-md-2 control-label">References:</label>
                                            <div class="col-md-3">
                                              <textarea class="form-control" id="ereferences" rows="3" style="resize: none;" name="ereferences" tabindex="7" ></textarea>
                                            </div>

                                        </div>
                                    </div>
									
									<br />

                                    <div class="row">
                                        <div class="form-group">
                                            
                                            <label class="col-md-1	 control-label">CNIC Copy:</label>
                                            <div class="col-md-2">
                                              <input type="file" class="form-control-file" id="cnic_pic" name="cnic_pic" tabindex="8" required aria-describedby="filehelp_cnic_pic" accept=".jpg, .png, .jpeg" />
    											<small id="filehelp_cnic_pic" class="form-text text-muted text-danger"></small>
  
                                            </div>

		                                    <label class="col-md-1 control-label col-md-push-5 ">License:</label>
                                            <div class="col-md-2 col-md-push-5">
                                              <input type="file" class="form-control-file" id="license" name="license" tabindex="9" required aria-describedby="filehelp_license" accept=".jpg, .png, .jpeg" />
    											<small id="filehelp_license" class="form-text text-muted text-danger"></small>
  
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            
                                            <label class="col-md-1 control-label">Preview:</label>
                                            <div class="col-md-2">
                                              <img height="150" width="200" id="img_cnic_pic">
                                            </div>

		                                    <label class="col-md-1 control-label col-md-push-5 ">Preview:</label>
                                            <div class="col-md-2 col-md-push-5">
                                             <img height="150" width="200" id="img_license">
                                            </div>

                                        </div>
                                    </div>                                        
                                     
                                    <div class="form-actions ">
                                        <button type="submit" class="btn blue" id="btn_submit" tabindex="10">Submit</button> 
                                        <button type="reset" class="btn default" id="btn_reset" tabindex="11">Cancel</button>

                                        <button type="submit" class="btn blue hidden" id="update_form_btn" tabindex="10">Update</button> 
                                        <button type="button" class="btn default hidden"  id="add_new" tabindex="11">Add New</button>
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

                                    <img src="ajax/loading.gif" id="loading" style="margin-left: 45%; display: none;" height="40" width="40" >
                                    
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="mytable">
                                            <thead>
                                                <tr>
                                                    <th> Actions  </th> 
                                                    <th> #        </th>
                                                    <th> ID     </th>
                                                    <th> Name     </th>
                                                    <th> CNIC </th>
                                                    <th> Father Name </th>
                                                    <th> Contact </th>
                                                    <th> Address </th>
                                                    <th> Reference </th>
                                                    <th> Truck # </th>
                                                    <th> CNIC </th>
                                                    <th> License </th>

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

     	function getId()
	    {
	        $.ajax({
	          url :'ajax/driver/fetchid_driver.php',
	          dataType:'JSON',
	          success: function(data)
	          {
	              $('#driver_id').val(data['driver_id']);
	          }
	          // error: function(){ alert('Error in get id Ajax.') }

	        })
	    }

	    getId();

     	$('#btn_reset').click(function(){
     		$('#img_cnic_pic,#img_license').removeAttr('src');
            $('#filehelp_cnic_pic,#filehelp_license').html('');
     		getId();
     	});

     	function setImage(input,name) {

            var fileInput = document.getElementById(name);
            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
            
            if(!allowedExtensions.exec(filePath))
            {
                $('#filehelp_'+name).html('Please upload file having extensions .jpeg/.jpg/.png only.');
                fileInput.value = '';
                return false;
            }
            else
            {
                if (window.File && window.FileReader && window.FileList && window.Blob)
                {
                    if (input.files && input.files[0]) 
                    {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('#img_'+name)
                                .attr('src', e.target.result);

                            $('#filehelp_'+name).html('');    
                        };

                        reader.readAsDataURL(input.files[0]);
                    }
                }
                
                else
                {
                    $('#filehelp_'+name).html("Please upgrade your browser, because your current browser lacks some new features we need!");   
                }
            }    
        }

		$("#cnic_pic,#license").change(function () {
			setImage( this,$(this).attr('id') );
	    });


        function myDataTable()
        {
            var e=$("#mytable");
            e.dataTable({language:{aria:{sortAscending:": activate to sort column ascending",sortDescending:": activate to sort column descending"},emptyTable:"No data available in table",info:"Showing _START_ to _END_ of _TOTAL_ records",infoEmpty:"No records found",infoFiltered:"(filtered1 from _MAX_ total records)",lengthMenu:"Show _MENU_",search:"Search:",zeroRecords:"No matching records found",paginate:{previous:"Prev",next:"Next",last:"Last",first:"First"}},bStateSave:!0,columnDefs:[{targets:0,orderable:!1,searchable:!1}],lengthMenu:[[5,15,20,-1],[5,15,20,"All"]],pageLength:5,pagingType:"bootstrap_full_number",columnDefs:[{orderable:!1,targets:[0]},{searchable:!1,targets:[0]}],order:[[1,"asc"]]});
        }

        function loadData()
        {
            $('#loading').show();

            $.ajax({
                url:'ajax/driver/fetch.php',
                dataType:"JSON",
                success:function(data){
                    var n = 1,
                        i = 0;

                    $('#mytable').DataTable().destroy();
                    $('#mytable tbody').html("");
                    
                    var table = $.each(data,function(index,value){

                        $('tbody').append('<tr index="'+i+'" class="odd gradeX">'+

                            <?php
                            if(!isset($_SESSION['disable_btn']) )
                            {?>

                        	'<td>'+ 
                                '<ul class="addremove">'+
                                    '<li> <button class="btn btn-xs green update_btn" id="'+value['driver_id']+'" type="button">  '+
                                    '<i class="fa fa-plus-square"></i>'+
                                    '</button> </li>'+
                                    
                                    '<!-- Trigger the modal with a button -->'+                                        
                                        '<li>  <button type="button" class="btn btn-xs red" data-toggle="modal" data-target="#myModal'+value['driver_id']+'" >'+
                                        '<i class="fa fa-minus-square"></i>'+
                                        '</button> </li>'+

                                        '<!-- Modal -->'+
                                        '<div id="myModal'+value['driver_id']+'" class="modal fade" role="dialog">'+
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
                                                '<button type="button" class="btn btn-default red delete_btn" data-dismiss="modal" id="'+value['driver_id']+'">Delete</button>'+
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
                            '<td>'+value['driver_id']+'</td>'+
                            '<td>'+value['name']+'</td>'+
                            '<td>'+value['cnic']+'</td>'+
                            '<td>'+value['father_name']+'</td>'+
                            '<td>'+value['contact']+'</td>'+
                            '<td>'+value['address']+'</td>'+
                            '<td>'+value['ereferences']+'</td>'+
                            '<td>'+value['truck_number']+'</td>'+
                            '<td> <img src="'+value['img_cnic']+'" height="100" width="100" /></td>'+
                            '<td> <img src="'+value['img_license']+'" height="100" width="100" /></td>'+
                            '</tr>');

                        n++; i++;
                    });

                    $.when(table).done(function(){
                      $('#loading').hide();
                    });

                    myDataTable();
                    getId();
                },
                error:function(){ alertMessage("Failed Fetch Ajax Call.",'error'); $('#loading').hide(); }
            });
        }

        loadData();

        function add()
        {
        	// var fdata = $('#myform').serialize(); FormData
        	var fdata = new FormData( $('#myform')[0] ); 

            $.ajax({
                url:'ajax/driver/add.php',
                type:"POST",
                data:fdata,
                contentType: false,
				processData: false,
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

        function update(name,cnic,father_name,contact,address,ereferences,truck_number)
        {
        	var fdata = new FormData( $('#myform')[0] ); 

            $.ajax({
                url:'ajax/driver/update.php',
                type:"POST",
                dataType:'JSON',
                data:fdata,
                contentType: false,
                processData: false,
                success:function(data){
                    if(data['updated'])
                    {
                        var i = $('.selectedd').attr('index');
                        var temp = $('#mytable').DataTable().row(i).data();
                        
                        temp[3]  = name;
                        temp[4]  = cnic;
                        temp[5]  = father_name;
                        temp[6]  = contact;
                        temp[7]  = address;
                        temp[8]  = ereferences;
                        temp[9]  = truck_number;

                        
                        if(data['img_cnic'])
                        {
                            temp[10]  = ' <img src="'+data['img_cnic']+'" height="100" width="100" /> ';
                        }
                        
                        if(data['img_license'])
                        {
                            temp[11]  = ' <img src="'+data['img_license']+'" height="100" width="100" /> ';
                        }

                        $('#mytable').DataTable().row(i).data(temp).draw();

                        alertMessage('Updated Successfully.','success');

                        addNewClick();
                    }
                },
                error:function(){ alertMessage("Error in Update Ajax Call.",'error') }
            });
        }

        function deletetr(trr,driver_id)
        {
            $.ajax({
                url:'ajax/driver/delete.php?driver_id='+driver_id,
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

            // $('#driver_id_div').removeClass('hidden');
            $('#update_form_btn').removeClass('hidden');
            $('#add_new').removeClass('hidden');

            $('#btn_submit').addClass('hidden');
            $('#btn_reset').addClass('hidden');

            $('#cnic_pic').removeAttr('required');
            $('#license').removeAttr('required');

            $('#name').focus();

        }

        function addNewClick()
        {

            $('form').removeClass('update_form');

            $('#btn_reset').trigger('click');

            // $('#driver_id_div').addClass('hidden');
            $('#update_form_btn').addClass('hidden');
            $('#add_new').addClass('hidden');

            $('#btn_submit').removeClass('hidden');
            $('#btn_reset').removeClass('hidden');

            $('#cnic_pic').attr('required','required');
            $('#license').attr('required','required');

            $('#name').focus();

        }

        //DELETE 
        $(document).on('click','.delete_btn',function(){

            var driver_id = $(this).attr('id'),
                trr = $(this).closest('tr');

            deletetr(trr,driver_id);
        });

        //ADD NEW 
        $(document).on('click','#add_new',function(){
            addNewClick();
        });

        function loadDetails(driver_id)
        {
            $.ajax({
                url:'ajax/driver/fetch_details.php?driver_id='+driver_id,
                dataType:"JSON",
                success:function(data){

                        $('#driver_id').val(data['driver_id']);
                        $('#name').val(data['name']);
                        $('#cnic').val(data['cnic']);
                        $('#father_name').val(data['father_name']);
                        $('#contact').val(data['contact']);
                        $('#address').val(data['address']);
                        $('#ereferences').val(data['ereferences']);
                        $('#truck_number').val(data['truck_number']);
                        $('#img_cnic_pic').attr('src',data['img_cnic']);
                        $('#img_license').attr('src',data['img_license']);

                },
                error:function(){ alertMessage("Failed Fetch Details Ajax Call.",'error') }
            });
        }

        //UPDATE 
        $(document).on('click','.update_btn',function(){

            updateClick();

            var driver_id = $(this).attr('id'),
                trr = $(this).closest('tr');

            $('tr').each(function(){
                if( $(this).hasClass('selectedd') )
                {
                    $(this).removeClass('selectedd'); 
                }
            });

            trr.addClass('selectedd');   

            loadDetails(driver_id);
            
        });

        //Add & Update
        $('form').submit(function(e){
           e.preventDefault();
           
           var name = $('#name').val()
               cnic = $('#cnic').val() ,
               father_name = $('#father_name').val(),
               contact = $('#contact').val(),
               address = $('#address').val(),
               ereferences = $('#ereferences').val(),
               truck_number = $('#truck_number').val(),
               driver_id =  $('#driver_id').val();

           if( $(this).hasClass('update_form') ) 
           {
                update(name,cnic,father_name,contact,address,ereferences,truck_number);
           }
           else
           {
                add();
           }

           $('#name').focus();
        });

    });
 </script>