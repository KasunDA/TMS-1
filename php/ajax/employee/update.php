<?php 
	
	function saveImage($fileToUpload)
	{
		$target_dir = "../../uploads/";
		$filename = basename($_FILES[ $fileToUpload ]["name"]);
		$target_file = $target_dir . $filename;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		
		$temp = explode(".", $filename);
		$newfilename = substr(md5(uniqid(rand(), true)), 0, 8) . ".$imageFileType";
		// $newfilename = round(microtime(true)) . '.' . end($temp);
		$target_file = $target_dir . $newfilename;

		if (move_uploaded_file($_FILES[ $fileToUpload ]["tmp_name"], $target_file)) 
		{
	        return "uploads/".$newfilename;
	    } 
	    else 
	    {
	        return 'NULL';
	    }
	}

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
	$relation1       = $_POST['relation1'];
	$e_contact1      = $_POST['e_contact1'];
	

	$e_contact_name2 = ($_POST['e_contact_name2']!=NULL?$_POST['e_contact_name2']:'');
	$relation2       = ($_POST['relation2']!=NULL?$_POST['relation2']:'');
	$e_contact2      = ($_POST['e_contact2']!=NULL?$_POST['e_contact2']:'');
	
	$qualification   = $_POST['qualification'];
	$institute_name  = $_POST['institute_name'];
	$subject         = $_POST['subject'];
	$contact         = $_POST['contact'];
	$joining_date    = $_POST['joining_date'];
	$dg_id           = $_POST['dg_id'];
	$ereferences     = ($_POST['ereferences']!=NULL?$_POST['ereferences']:'NILL');
	
	$sql = "UPDATE employee SET name='$name', cnic='$cnic' , cnic_valid='$cnic_valid' , father_name='$father_name' , dob='$dob' , email='$email' , address='$address' , e_contact_name1='$e_contact_name1' , relation1='$relation1' , e_contact1='$e_contact1' , e_contact_name2='$e_contact_name2' , relation2='$relation2' , e_contact2= '$e_contact2' , qualification='$qualification' , institute_name='$institute_name' , subject='$subject' , contact='$contact' , joining_date='$joining_date' , dg_id=$dg_id , ereferences='$ereferences' ";
	
	if($_FILES['signature']['size'] != 0 )
	{
		$img_signature = saveImage('signature') ;
		$sql.= " , img_signature= '$img_signature' ";
	}

	if( $_FILES['picture']['size'] != 0 )
	{
		$img_picture = saveImage('picture') ;
		$sql.= " , img_picture='$img_picture' ";
	}

	
	$sql .= " WHERE employee_id=$employee_id ";


	$q = mysqli_query($mycon,$sql);

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>