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
	
	$json['updated'] 	 = 'false';
	$json['img_license'] = NULL;
	$json['img_license'] = NULL;
	$driver_id     	 	 = $_POST['driver_id'];
	$name            	 = $_POST['name'];
	$cnic            	 = $_POST['cnic'];
	$father_name     	 = $_POST['father_name'];
	$address         	 = $_POST['address'];
	$contact          	 = $_POST['contact'];
	$ereferences     	 = ($_POST['ereferences']!=NULL?$_POST['ereferences']:'NILL');
	$truck_number    	 = $_POST['truck_number'];
	
	$sql = "UPDATE driver SET name='$name', cnic='$cnic' , father_name='$father_name' , address='$address', contact='$contact' , ereferences='$ereferences' , truck_number='$truck_number' ";
	
	if($_FILES['cnic_pic']['size'] != 0 )
	{
		$img_cnic = saveImage('cnic_pic');
		$sql.= " , img_cnic= '$img_cnic' ";
		$json['img_cnic'] = $img_cnic;
	}

	if( $_FILES['license']['size'] != 0 )
	{
		$img_license = saveImage('license');
		$sql.= " , img_license='$img_license' ";
		$json['img_license'] = $img_license;
	}

	
	$sql .= " WHERE driver_id=$driver_id ";


	$q = mysqli_query($mycon,$sql);

	if(mysqli_affected_rows($mycon))
	{
		$json['updated'] = "true";
	}

	echo json_encode($json);
?>