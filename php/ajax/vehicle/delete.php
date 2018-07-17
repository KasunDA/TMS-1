<?php 

	require '../../connection.php';

	$json['deleted'] = 'false';
	$vehicle_id 	 = $_POST['vehicle_id'];

	$q = mysqli_query($mycon,'UPDATE vehicle SET status=0 WHERE vehicle_id='.$vehicle_id);

	if(mysqli_affected_rows($mycon))
		$json['deleted'] = "true";

	echo json_encode($json);

?>