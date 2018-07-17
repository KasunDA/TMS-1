<?php 

	require '../../connection.php';

	$json['deleted']  = 'false';
	$income_id 		  = $_POST['income_id'];

	$q = mysqli_query($mycon,'UPDATE income SET status=0 WHERE income_id='.$income_id);

	if(mysqli_affected_rows($mycon))
		$json['deleted'] = "true";
	
	echo json_encode($json);
?>