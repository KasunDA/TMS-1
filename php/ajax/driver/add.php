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

	$name            = $_POST['name'];
	$cnic            = $_POST['cnic'];
	$father_name     = $_POST['father_name'];
	$dob             = $_POST['dob'];
	$address         = $_POST['address'];
	$contact         = $_POST['contact'];
	$ereferences     = ($_POST['ereferences']!=NULL?$_POST['ereferences']:'NILL');
	$truck_number    = $_POST['truck_number'];
	$img_cnic    	 = saveImage('cnic_pic');
	$img_license     = saveImage('license');


	
	
	$q = mysqli_query($mycon,"INSERT INTO driver ( name, cnic, father_name, address, contact, ereferences, truck_number, img_cnic, img_license ) VALUES ( '$name', '$cnic', '$father_name', '$address', '$contact', '$ereferences' , '$truck_number' , '$img_cnic' , '$img_license' ) ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>