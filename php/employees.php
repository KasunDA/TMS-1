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
                                <span class="caption-subject bold uppercase"> Add Employee</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" id="myform">
                                <div class="form-body">
                                    <div class="row"> 
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Employee ID:</label>
                                            <div class="col-md-3">
                                              <input type="number" readonly class="form-control" id="employee_id" tabindex="-1" name="employee_id">
                                            </div>

                                            <label class="col-md-2 control-label">Name:</label>
                                            <div class="col-md-3">
                                              <input type="text" class="form-control" id="name" name="name" tabindex="1" placeholder="Full Name" required maxlength="60">
                                            </div>
                                            
                                         </div>  

                                     </div>   
                                    
                                    <div class="row">
                                        <div class="form-group">
                                            
                                            <label class="col-md-2 control-label">CNIC:</label>
                                            <div class="col-md-3">
                                              <input type="text" class="form-control" id="cnic" name="cnic" tabindex="2" pattern="[\d*]{5}-[\d*]{7}-[\d*]{1}" placeholder="XXXXX-XXXXXXX-X" required maxlength="15">
                                            </div>

											<label class="col-md-2 control-label">CNIC Valid:</label>
                                            <div class="col-md-3">
                                              <input type="text" class="form-control date-picker" id="cnic_valid" name="cnic_valid" tabindex="3" placeholder="mm/dd/yyyy" required >
                                            </div>

                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group">

                                        	<label class="col-md-2 control-label">Father Name:</label>
                                            <div class="col-md-3">
                                              <input type="text" class="form-control" id="father_name" name="father_name" tabindex="4" placeholder="" required maxlength="50">
                                            </div>

                                            <label class="col-md-2 control-label">Date Of Birth:</label>
                                            <div class="col-md-3">
                                              <input type="text" class="form-control date-picker" id="dob" name="dob" tabindex="5" placeholder="mm/dd/yyyy" required >
                                            </div>

                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group">
                                            
                                            <label class="col-md-2 control-label">Email:</label>
                                            <div class="col-md-3">
                                              <input type="email" class="form-control" id="email" name="email" tabindex="6" placeholder="" required maxlength="50">
                                            </div>

                                            <label class="col-md-2 control-label">Address:</label>
                                            <div class="col-md-3">
                                              <textarea class="form-control" id="address" rows="3" style="resize: none;" name="address" tabindex="7" required></textarea>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group">
                                            
                                            <label class="col-md-2 control-label">Emergency Contact Name :</label>
                                            <div class="col-md-2">
                                              <input type="text" class="form-control" id="e_contact_name1" name="e_contact_name1" tabindex="8" placeholder="" required maxlength="30">
                                            </div>

                                            <label class="col-md-1 control-label">Relation:</label>
                                            <div class="col-md-2">
                                              <input type="text" class="form-control" id="relation1" name="relation1" tabindex="9" placeholder="Father" required maxlength="20">
                                            </div>

                                            <label class="col-md-1 control-label">Contact:</label>
                                            <div class="col-md-2">
                                              <input type="text" class="form-control" id="e_contact1" name="e_contact1" tabindex="10" placeholder="03XXXXXXXXX" required maxlength="11" pattern="\d*">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            
                                            <label class="col-md-2 control-label">Emergency Contact Name :</label>
                                            <div class="col-md-2">
                                              <input type="text" class="form-control" id="e_contact_name2" name="e_contact_name2" tabindex="11" placeholder=""  maxlength="30">
                                            </div>

                                            <label class="col-md-1 control-label">Relation:</label>
                                            <div class="col-md-2">
                                              <input type="text" class="form-control" id="relation2" name="relation2" tabindex="12" placeholder="Brother"  maxlength="20">
                                            </div>

                                            <label class="col-md-1 control-label">Contact:</label>
                                            <div class="col-md-2">
                                              <input type="text" class="form-control" id="e_contact2" name="e_contact2" tabindex="13" placeholder="03XXXXXXXXX"  maxlength="11" pattern="\d*">
                                            </div>

                                        </div>
                                    </div>

									<div class="row">
                                        <div class="form-group">
                                            
                                            <label class="col-md-2 control-label">Qualification:</label>
                                            <div class="col-md-2">
                                              <input type="text" class="form-control" id="qualification" name="qualification" tabindex="14" placeholder=""  maxlength="30">
                                            </div>

                                            <label class="col-md-1 control-label">Institute:</label>
                                            <div class="col-md-2">
                                              <input type="text" class="form-control" id="institute_name" name="institute_name" tabindex="15" placeholder=""  maxlength="30">
                                            </div>

                                            <label class="col-md-1 control-label">Subject:</label>
                                            <div class="col-md-2">
                                              <input type="text" class="form-control" id="subject" name="subject" tabindex="16" placeholder=""  maxlength="16" >
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            
                                            <label class="col-md-2 control-label">Contact:</label>
                                            <div class="col-md-2">
                                            	<input type="text" class="form-control" id="contact" name="contact" tabindex="17" placeholder="03XXXXXXXXX" required maxlength="11" pattern="\d*">
                                            </div>

                                            <label class="col-md-1 control-label">Joining:</label>
                                            <div class="col-md-2">
                                            	<input type="text" class="form-control date-picker" id="joining_date" name="joining_date" tabindex="18" placeholder="mm/dd/yyyy" required >
                                            </div>

                                            <label class="col-md-1 control-label">Designation:</label>
                                            <div class="col-md-2">
                                              <select class="form-control" id="dg_id" name="dg_id" tabindex="19" required>
                                              		<option value="">Select Designation</option>
                                              		<?php
                                              			$q = mysqli_query($mycon,"SELECT * FROM designation WHERE status=1");
                                              			while( $r = mysqli_fetch_array($q) )
                                              			{
                                              				echo '<option  value="'.$r['dg_id'].'">'.$r['designation'].'</option>';
                                              			}
                                              		?>

                                              </select>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            
                                            <label class="col-md-3 control-label">References:</label>
                                            <div class="col-md-6">
                                              <textarea class="form-control" id="ereferences" rows="3" style="resize: none;" name="ereferences" tabindex="19" ></textarea>
                                            </div>

                                        </div>
                                    </div>
									
									<br />

                                    <div class="row">
                                        <div class="form-group">
                                            
                                            <label class="col-md-1	 control-label">Signature:</label>
                                            <div class="col-md-2">
                                              <input type="file" class="form-control-file" id="signature" name="signature" tabindex="20" required aria-describedby="filehelp_signature" accept=".jpg, .png, .jpeg" />
    											<small id="filehelp_signature" class="form-text text-muted text-danger"></small>
  
                                            </div>

		                                    <label class="col-md-1 control-label col-md-push-5 ">Picture:</label>
                                            <div class="col-md-2 col-md-push-5">
                                              <input type="file" class="form-control-file" id="picture" name="picture" tabindex="21" required aria-describedby="filehelp_picture" accept=".jpg, .png, .jpeg" />
    											<small id="filehelp_picture" class="form-text text-muted text-danger"></small>
  
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            
                                            <label class="col-md-1 control-label">Preview:</label>
                                            <div class="col-md-2">
                                              <img height="150" width="200" id="img_signature">
                                            </div>

		                                    <label class="col-md-1 control-label col-md-push-5 ">Preview:</label>
                                            <div class="col-md-2 col-md-push-5">
                                             <img height="150" width="200" id="img_picture">
                                            </div>

                                        </div>
                                    </div>                                        
                                     
                                    <div class="form-actions ">
                                        <button type="submit" class="btn blue" id="btn_submit" tabindex="22">Submit</button> 
                                        <button type="reset" class="btn default" id="btn_reset" tabindex="23">Cancel</button>

                                        <button type="submit" class="btn blue hidden" id="update_form_btn" tabindex="22">Update</button> 
                                        <button type="button" class="btn default hidden"  id="add_new" tabindex="23">Add New</button>
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
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="mytable">
                                            <thead>
                                                <tr>
                                                    <th> Actions  </th> 
                                                    <th> #        </th>
                                                    <th> ID     </th>
                                                    <th> Name     </th>
                                                    <th> CNIC </th>
                                                    <th> Father Name </th>
                                                    <th> DOB </th>
                                                    <th> Email </th>
                                                    <th> Contact </th>
                                                    <th> Address </th>
                                                    <th> Designation </th>

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
<script src="../assets/global/scripts/select2.full.min.js"></script>
<script type="text/javascript">
     
    $(document).ready(function(){

     	function getId()
	    {
	        $.ajax({
	          url :'ajax/employee/fetchid_employee.php',
	          dataType:'JSON',
	          success: function(data)
	          {
	              $('#employee_id').val(data['employee_id']);
	          }
	          // error: function(){ alert('Error in get id Ajax.') }

	        })
	    }

	    getId();

     	$('#btn_reset').click(function(){
     		$('#img_picture,#img_signature').removeAttr('src');
     		$('#dg_id').val('').trigger('change');
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
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#img_'+name)
                            .attr('src', e.target.result);

                        $('#filehelp_'+name).html('');    
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }    
        }

		$("#signature,#picture").change(function () {
			setImage( this,$(this).attr('id') );
	    });

		//Select2
	    $('#dg_id').select2({
	    	width: 'resolve',
	    	theme: "classic"
	   	});

        function myDataTable()
        {
            var e=$("#mytable");
            e.dataTable({language:{aria:{sortAscending:": activate to sort column ascending",sortDescending:": activate to sort column descending"},emptyTable:"No data available in table",info:"Showing _START_ to _END_ of _TOTAL_ records",infoEmpty:"No records found",infoFiltered:"(filtered1 from _MAX_ total records)",lengthMenu:"Show _MENU_",search:"Search:",zeroRecords:"No matching records found",paginate:{previous:"Prev",next:"Next",last:"Last",first:"First"}},bStateSave:!0,columnDefs:[{targets:0,orderable:!1,searchable:!1}],lengthMenu:[[5,15,20,-1],[5,15,20,"All"]],pageLength:5,pagingType:"bootstrap_full_number",columnDefs:[{orderable:!1,targets:[0]},{searchable:!1,targets:[0]}],order:[[1,"asc"]]});
        }

        function loadData()
        {
            $.ajax({
                url:'ajax/employee/fetch.php',
                dataType:"JSON",
                success:function(data){
                    var n = 1,
                        i = 0;

                    $('#mytable').DataTable().destroy();
                    $('#mytable tbody').html("");
                    
                    $.each(data,function(index,value){

                        $('tbody').append('<tr index="'+i+'" class="odd gradeX">'+

                        	'<td>'+ 
                                '<ul class="addremove">'+
                                    '<li> <button class="btn btn-xs green update_btn" id="'+value['employee_id']+'" type="button">  '+
                                    '<i class="fa fa-plus-square"></i>'+
                                    '</button> </li>'+
                                    
                                    '<li>  <button class="btn btn-xs blue detail_btn" id="'+value['employee_id']+'" type="button">  '+
                                    '<i class="fa fa-info"></i>'+
                                    '</button> </li>'+
                                    
                                    '<li>  <button class="btn btn-xs red delete_btn" id="'+value['employee_id']+'" type="button">  '+
                                    '<i class="fa fa-minus-square"></i>'+
                                    '</button> </li>'+
                                '</ul>'+
                            '</td>'+

                            '<td>'+n+'</td>'+
                            '<td>'+value['employee_id']+'</td>'+
                            '<td>'+value['name']+'</td>'+
                            '<td>'+value['cnic']+'</td>'+
                            '<td>'+value['father_name']+'</td>'+
                            '<td>'+value['dob']+'</td>'+
                            '<td>'+value['email']+'</td>'+
                            '<td>'+value['contact']+'</td>'+
                            '<td>'+value['address']+'</td>'+
                            '<td id="'+value['dg_id']+'">'+value['designation']+'</td>'+
                            '</tr>');

                        n++; i++;
                    })

                    myDataTable();
                    getId();
                },
                error:function(){ alert("Failed Fetch Ajax Call.") }
            });
        }

        loadData();

        function add()
        {
        	// var fdata = $('#myform').serialize(); FormData
        	var fdata = new FormData( $('#myform')[0] ); 
        	alert(fdata[0]);
            $.ajax({
                url:'ajax/employee/add.php',
                type:"POST",
                data:fdata,
                contentType: false,
				processData: false,
                success:function(data){
                    if(data)
                    {
                        // $('#btn_reset').trigger('click');
                        
                        loadData();
                    }
                },
                error:function(){ alert("Error in Add Ajax Call.") }
            });
        }

        function update()
        {
        	var fdata = $('#myform').serialize();

            $.ajax({
                url:'ajax/employee/update.php',
                type:"POST",
                data:{fdata},
                success:function(data){
                    if(data)
                    {
                        var i = $('.selectedd').attr('index');
                        var temp = $('#mytable').DataTable().row(i).data();
                        
                        // temp[3] = name;
                        // temp[4] = cnic;
                        // temp[5] = ;
                        // temp[5] = ;

                        $('#mytable').DataTable().row(i).data(temp).draw();
                     
                        addNewClick();
                    }
                },
                error:function(){ alert("Error in Update Ajax Call.") }
            });
        }

        function deletetr(trr,employee_id)
        {
            $.ajax({
                url:'ajax/employee/delete.php?employee_id='+employee_id,
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

            // $('#employee_id_div').removeClass('hidden');
            $('#update_form_btn').removeClass('hidden');
            $('#add_new').removeClass('hidden');

            $('#btn_submit').addClass('hidden');
            $('#btn_reset').addClass('hidden');

        }

        function addNewClick()
        {

            $('form').removeClass('update_form');

            $('#btn_reset').trigger('click');

            // $('#employee_id_div').addClass('hidden');
            $('#update_form_btn').addClass('hidden');
            $('#add_new').addClass('hidden');

            $('#btn_submit').removeClass('hidden');
            $('#btn_reset').removeClass('hidden');

        }

        //DELETE 
        $(document).on('click','.delete_btn',function(){

            var employee_id = $(this).attr('id'),
                trr = $(this).closest('tr');

            deletetr(trr,employee_id);
        });

        //ADD NEW 
        $(document).on('click','#add_new',function(){
            addNewClick();
        });

        //UPDATE 
        $(document).on('click','.update_btn',function(){

            updateClick();

            var employee_id = $(this).attr('id'),
                trr = $(this).closest('tr');

            $('tr').each(function(){
                if( $(this).hasClass('selectedd') )
                {
                    $(this).removeClass('selectedd'); 
                }
            });

            trr.addClass('selectedd');   

            $('#employee_id').val( employee_id );
            $('#name').val( trr.find('td').eq(2).text() );
            $('#').val( trr.find('td').eq().text() );
            //continue
        });

        //Add & Update
        $('form').submit(function(e){
           e.preventDefault();
           
           var name = $('#name').val()
               // username = $('#username').val() ,
               // role = $('#role').val(),
               // pass = $('#pass').val(),
               employee_id =  $('#employee_id').val();

           if( $(this).hasClass('update_form') ) 
           {
                // update(employee_id,name,username,role,pass);
           }
           else
           {
                add()
           }
        });

    });
 </script>