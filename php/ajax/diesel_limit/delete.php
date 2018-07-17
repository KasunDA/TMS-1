<?php 

	require '../../connection.php';

	$json['deleted'] = 'false';
	$dl_id 			 = $_POST['dl_id'];

	$q = mysqli_query($mycon,'UPDATE diesel_limit SET status=0 WHERE dl_id='.$dl_id);

	if(mysqli_affected_rows($mycon))
		$json['deleted'] = "true";

	echo json_encode($json);

?>