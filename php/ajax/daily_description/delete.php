<?php 

	require '../../connection.php';

	$json['deleted'] = 'false';
	$dd_id 			 = $_POST['dd_id'];

	$q = mysqli_query($mycon,'UPDATE daily_description SET status=0 WHERE dd_id='.$dd_id);

	if(mysqli_affected_rows($mycon))
		$json['deleted'] = 'true';
	
	echo json_encode($json);
?>