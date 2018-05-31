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
                                <span class="caption-subject bold uppercase"> Employee Details</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form class="form-horizontal" role="form" method="post" readonly enctype="multipart/form-data" id="myform">
                                <div class="form-body">
                                    <div class="row"> 
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Employee ID:</label>
                                            <div class="col-md-3">
                                              <input type="number" readonly class="form-control" id="employee_id" readonly tabindex="-1" name="employee_id">
                                            </div>

                                            <label class="col-md-2 control-label">Name:</label>
                                            <div class="col-md-3">
                                              <input type="text" class="form-control" id="name" name="name" readonly tabindex="1" placeholder="Full Name" required maxlength="60">
                                            </div>
                                            
                                         </div>  

                                     </div>   
                                    
                                    <div class="row">
                                        <div class="form-group">
                                            
                                            <label class="col-md-2 control-label">CNIC:</label>
                                            <div class="col-md-3">
                                              <input type="text" class="form-control" id="cnic" name="cnic" readonly tabindex="2" pattern="[\d*]{5}-[\d*]{7}-[\d*]{1}" placeholder="XXXXX-XXXXXXX-X" required maxlength="15">
                                            </div>

											<label class="col-md-2 control-label">CNIC Valid:</label>
                                            <div class="col-md-3">
                                              <input type="text" class="form-control " id="cnic_valid" name="cnic_valid" readonly tabindex="3" placeholder="mm/dd/yyyy" required >
                                            </div>

                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group">

                                        	<label class="col-md-2 control-label">Father Name:</label>
                                            <div class="col-md-3">
                                              <input type="text" class="form-control" id="father_name" name="father_name" readonly tabindex="4" placeholder="" required maxlength="50">
                                            </div>

                                            <label class="col-md-2 control-label">Date Of Birth:</label>
                                            <div class="col-md-3">
                                              <input type="text" class="form-control" id="dob" name="dob" readonly tabindex="5" placeholder="mm/dd/yyyy" required >
                                            </div>

                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group">
                                            
                                            <label class="col-md-2 control-label">Email:</label>
                                            <div class="col-md-3">
                                              <input type="email" class="form-control" id="email" name="email" readonly tabindex="6" placeholder="" required maxlength="50">
                                            </div>

                                            <label class="col-md-2 control-label">Address:</label>
                                            <div class="col-md-3">
                                              <textarea class="form-control" id="address" rows="3" style="resize: none;" name="address" readonly tabindex="7" required></textarea>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group">
                                            
                                            <label class="col-md-2 control-label">Emergency Contact Name :</label>
                                            <div class="col-md-2">
                                              <input type="text" class="form-control" id="e_contact_name1" name="e_contact_name1" readonly tabindex="8" placeholder="" required maxlength="30">
                                            </div>

                                            <label class="col-md-1 control-label">Relation:</label>
                                            <div class="col-md-2">
                                              <input type="text" class="form-control" id="relation1" name="relation1" readonly tabindex="9" placeholder="Father" required maxlength="20">
                                            </div>

                                            <label class="col-md-1 control-label">Contact:</label>
                                            <div class="col-md-2">
                                              <input type="text" class="form-control" id="e_contact1" name="e_contact1" readonly tabindex="10" placeholder="03XXXXXXXXX" required maxlength="11" pattern="\d*">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            
                                            <label class="col-md-2 control-label">Emergency Contact Name :</label>
                                            <div class="col-md-2">
                                              <input type="text" class="form-control" id="e_contact_name2" name="e_contact_name2" readonly tabindex="11" placeholder=""  maxlength="30">
                                            </div>

                                            <label class="col-md-1 control-label">Relation:</label>
                                            <div class="col-md-2">
                                              <input type="text" class="form-control" id="relation2" name="relation2" readonly tabindex="12" placeholder="Brother"  maxlength="20">
                                            </div>

                                            <label class="col-md-1 control-label">Contact:</label>
                                            <div class="col-md-2">
                                              <input type="text" class="form-control" id="e_contact2" name="e_contact2" readonly tabindex="13" placeholder="03XXXXXXXXX"  maxlength="11" pattern="\d*">
                                            </div>

                                        </div>
                                    </div>

									<div class="row">
                                        <div class="form-group">
                                            
                                            <label class="col-md-2 control-label">Qualification:</label>
                                            <div class="col-md-2">
                                              <input type="text" class="form-control" id="qualification" name="qualification" readonly tabindex="14" placeholder=""  maxlength="30">
                                            </div>

                                            <label class="col-md-1 control-label">Institute:</label>
                                            <div class="col-md-2">
                                              <input type="text" class="form-control" id="institute_name" name="institute_name" readonly tabindex="15" placeholder=""  maxlength="30">
                                            </div>

                                            <label class="col-md-1 control-label">Subject:</label>
                                            <div class="col-md-2">
                                              <input type="text" class="form-control" id="subject" name="subject" readonly tabindex="16" placeholder=""  maxlength="16" >
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            
                                            <label class="col-md-2 control-label">Contact:</label>
                                            <div class="col-md-2">
                                            	<input type="text" class="form-control" id="contact" name="contact" readonly tabindex="17" placeholder="03XXXXXXXXX" required maxlength="11" pattern="\d*">
                                            </div>

                                            <label class="col-md-1 control-label">Joining:</label>
                                            <div class="col-md-2">
                                            	<input type="text" class="form-control " id="joining_date" name="joining_date" readonly tabindex="18" placeholder="mm/dd/yyyy" required >
                                            </div>

                                            <label class="col-md-1 control-label">Designation:</label>
                                            <div class="col-md-2">
                                              <select class="form-control" id="dg_id" name="dg_id" disabled tabindex="19" required>
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
                                              <textarea class="form-control" id="ereferences" rows="3" style="resize: none;" name="ereferences" readonly tabindex="19" ></textarea>
                                            </div>

                                        </div>
                                    </div>
									
									<br />

                                    <div class="row">
                                        <div class="form-group">
                                            
                                            <label class="col-md-1 control-label">Signature:</label>
                                            <div class="col-md-2">
                                              <img height="150" width="200" id="img_signature">
                                            </div>

		                                    <label class="col-md-1 control-label col-md-push-5 ">Picture:</label>
                                            <div class="col-md-2 col-md-push-5">
                                             <img height="150" width="200" id="img_picture">
                                            </div>

                                        </div>
                                    </div>                                        
                                     
                                </div>
                                
                            </form>
                        </div>
                        <!-- Form ends -->
                        
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

		//Select2
	    $('#dg_id').select2({
	    	width: 'resolve',
	    	theme: "classic"
	   	});

        function loadData()
        {
            $.ajax({
                url:'ajax/employee/fetch_details.php?employee_id=<?php echo $_GET['employee_id']; ?>',
                dataType:"JSON",
                success:function(data){

                        $('#employee_id').val(data['employee_id']);
                        $('#name').val(data['name']);
                        $('#cnic').val(data['cnic']);
                        $('#cnic_valid').val(data['cnic_valid']);
                        $('#father_name').val(data['father_name']);
                        $('#dob').val(data['dob']);
                        $('#email').val(data['email']);
                        $('#address').val(data['address']);

                        $('#e_contact_name1').val(data['e_contact_name1']);
                        $('#relation1').val(data['relation1']);
                        $('#e_contact1').val(data['e_contact1']);

                        $('#e_contact_name2').val(data['e_contact_name2']);
                        $('#relation2').val(data['relation2']);
                        $('#e_contact2').val(data['e_contact2']);

                        $('#qualification').val(data['qualification']);
                        $('#institute_name').val(data['institute_name']);
                        $('#subject').val(data['subject']);

                        $('#contact').val(data['contact']);
                        $('#joining_date').val(data['joining_date']);
                        $('#dg_id').val(data['dg_id']).trigger('change');

                        $('#ereferences').val(data['ereferences']);
                        $('#img_signature').attr('src',data['img_signature']);
                        $('#img_picture').attr('src',data['img_picture']);

                },
                error:function(){ alert("Failed Fetch Ajax Call.") }
            });
        }

        loadData();

    });
 </script>