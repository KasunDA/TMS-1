<?php 

	require '../../connection.php';
	
	$employee_id     = $_POST['employee_id'];
	$name            = $_POST['name'];
	$cnic            = $_POST['cnic'];
	$cnic_valid      = $_POST['cnic_valid'];
	$father_name     = $_POST['father_name'];
	$dob             = $_POST['dob'];
	$email           = $_POST['email'];
	$address         = $_POST['address'];
	$e_contact_name1 = $_POST['e_contact_name1'];
	$relation1       = $_POST['relation1']
	$e_contact1      = $_POST['e_contact1'];
	

	$e_contact_name2 = ($_POST['e_contact_name2']!=NULL?$_POST['e_contact_name2']:'NULL');
	$relation2       = ($_POST['relation2']!=NULL?$_POST['relation2']:'NULL');
	$e_contact2      = ($_POST['e_contact2']!=NULL?$_POST['e_contact2']:'NULL');
	
	$qualification   = $_POST['qualification'];
	$institute_name  = $_POST['institute_name'];
	$subject         = $_POST['subject'];
	$contact         = $_POST['contact'];
	$joining_date    = $_POST['joining_date'];
	$dg_id           = $_POST['dg_id'];
	$ereferences     = $_POST['ereferences'];
	$img_signature   = $_POST['img_signature'];
	$img_picture     = $_POST['img_picture'];

	$q = mysqli_query($mycon,"UPDATE employee SET name='$name', cnic='$cnic' , cnic_valid='$cnic_valid' , father_name='$father_name' , dob='$dob' , email='$email' , address='$address' , e_contact_name1='$e_contact_name1' , relation1='$relation1' , e_contact1='$e_contact1' , e_contact_name2='$e_contact_name2' , relation2='$relation2' , e_contact2= '$e_contact2' , qualification='$qualification' , institute_name='$institute_name' , subject='$subject' , contact='$contact' , joining_date='$joining_date' , dg_id=$dg_id , ereferences='$ereferences' , img_signature= '$img_signature' , img_picture='$img_picture'  WHERE employee_id=$employee_id ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>