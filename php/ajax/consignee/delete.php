<?php 

	require '../../connection.php';

	$json['deleted'] = 'false';
	$consignee_id = $_POST['consignee_id'];

	$q = mysqli_query($mycon,'UPDATE consignee SET status=0 WHERE consignee_id='.$consignee_id);

	if(mysqli_affected_rows($mycon))
		$json['deleted'] = "true";

	echo json_encode($json);

?>