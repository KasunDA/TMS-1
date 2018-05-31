<?php 

	require '../../connection.php';

	$name            = $_POST['name'];
	$cnic            = $_POST['cnic'];
	$cnic_valid      = $_POST['cnic_valid'];
	$father_name     = $_POST['father_name'];
	$dob             = $_POST['dob'];
	$email           = $_POST['email'];
	$address         = $_POST['address'];
	$e_contact_name1 = $_POST['e_contact_name1'];
	$relation1       = $_POST['relation1'];
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
	$ereferences     = ($_POST['ereferences']!=NULL?$_POST['ereferences']:'NULL');
	$img_signature   = $_POST['signature'];
	$img_picture     = $_POST['picture'];


	
	$q = mysqli_query($mycon,"INSERT INTO employee( name, cnic, cnic_valid, father_name, dob, email, address, e_contact_name1, relation1, e_contact1, e_contact_name2, relation2, e_contact2, qualification, institute_name, subject, contact, joining_date, dg_id, ereferences , img_signature , img_picture ) VALUES ( '$name', '$cnic', '$cnic_valid', '$father_name', '$dob', '$email', '$address', '$e_contact_name1', '$relation1', '$e_contact1', '$e_contact_name2', '$relation2', '$e_contact2', '$qualification', '$institute_name', '$subject', '$contact', '$joining_date', $dg_id, '$ereferences' , '$img_signature' , '$img_picture' ) ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>