<?php 
	
	include '../SimpleImage.php';

	function store_uploaded_image($html_element_name, $new_img_width, $new_img_height) {

	    $target_dir = "../../uploads/";
		$filename = basename($_FILES[ $html_element_name ]["name"]);
		$target_file = $target_dir . $filename;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		
		$temp = explode(".", $filename);
		$newfilename = substr(md5(uniqid(rand(), true)), 0, 8) . ".$imageFileType";
		// $newfilename = round(microtime(true)) . '.' . end($temp);
		$target_file = $target_dir . $newfilename;

	    // $target_file = $target_dir . basename($_FILES[$html_element_name]["name"]);

	    $image = new SimpleImage();
	    $image->load($_FILES[$html_element_name]['tmp_name']);
	    $image->resize($new_img_width, $new_img_height);
	    $image->save($target_file);
	    // return $target_file; //return name of saved file in case you want to store it in you database or show confirmation message to user
	    return "uploads/".$newfilename;

	}

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
		$img_cnic = store_uploaded_image('cnic_pic', 640, 480);
		$sql.= " , img_cnic= '$img_cnic' ";
		$json['img_cnic'] = $img_cnic;
	}

	if( $_FILES['license']['size'] != 0 )
	{
		$img_license = store_uploaded_image('license', 640, 480);
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