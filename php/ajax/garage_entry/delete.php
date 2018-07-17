<?php 

	require '../../connection.php';

	$json['deleted'] = 'false';
	$ge_id 			 = $_POST['ge_id'];

	$q = mysqli_query($mycon,'UPDATE garage_entry SET status=0 WHERE ge_id='.$ge_id);

	if(mysqli_affected_rows($mycon))
		$json['deleted'] = "true";

	echo json_encode($json);
?>