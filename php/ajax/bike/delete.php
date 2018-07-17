<?php 

	require '../../connection.php';

	$json['deleted'] = 'false';
	$bike_id = $_POST['bike_id'];

	$q = mysqli_query($mycon,'UPDATE bike SET status=0 WHERE bike_id='.$bike_id);

	if(mysqli_affected_rows($mycon))
		$json['deleted'] = "true";

	echo json_encode($json);

?>