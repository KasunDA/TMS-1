<?php 

	require '../../connection.php';

	$json['deleted'] = 'false';
	$driver_id 		 = $_POST['driver_id'];

	$q = mysqli_query($mycon,'UPDATE driver SET status=0 WHERE driver_id='.$driver_id);

	if(mysqli_affected_rows($mycon))
		$json['deleted'] = "true";

	echo json_encode($json);

?>