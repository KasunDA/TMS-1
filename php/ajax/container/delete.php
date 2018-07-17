<?php 

	require '../../connection.php';

	$json['deleted'] = 'false';
	$container_id = $_POST['container_id'];

	$q = mysqli_query($mycon,'UPDATE container SET status=0 WHERE container_id='.$container_id);

	if(mysqli_affected_rows($mycon))
		$json['deleted'] = "true";

	echo json_encode($json);

?>