<?php 

	require '../../connection.php';

	$json['deleted'] = 'false';
	$ce_id 			 = $_POST['ce_id'];

	$q = mysqli_query($mycon,'UPDATE container_entry SET status=0 WHERE ce_id='.$ce_id);

	if(mysqli_affected_rows($mycon))
		$json['deleted'] = 'true';

	echo json_encode($json);
?>