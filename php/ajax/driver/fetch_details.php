<?php 

	require '../../connection.php';

	$json=NULL;
	$driver_id = $_GET['driver_id'];

	$q = mysqli_query($mycon,'SELECT * FROM driver WHERE status=1 and driver_id='.$driver_id);

	if($r = mysqli_fetch_array($q))
	{
		$json['driver_id'] = $r['driver_id'];  
		$json['name'] = $r['name'];
		$json['cnic'] = $r['cnic'];
		$json['father_name'] = $r['father_name'];
		$json['address'] = $r['address'];
		$json['contact'] = $r['contact'];
		$json['ereferences'] = $r['ereferences'];
		$json['truck_number'] = $r['truck_number'];

		$json['img_cnic'] = $r['img_cnic'];
		$json['img_license'] = $r['img_license'];
	}

	else
	{

		$json['driver_id'] 	     = "NULL";  
		$json['name']        	 = "NULL";
		$json['cnic']        	 = "NULL";
		$json['father_name'] 	 = "NULL";
		$json['address'] 	 	 = "NULL";
		$json['contact'] 		 = "NULL";
		$json['ereferences'] 	 = "NULL";
		$json['truck_number'] 	 = "NULL";
		$json['img_cnic']   	 = "NULL";
		$json['img_license'] 	 = "NULL";
	}

	echo json_encode($json);

?>