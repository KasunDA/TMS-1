<?php 

	require '../../connection.php';

	$json['deleted'] = 'false';
	$dg_id 			 = $_POST['dg_id'];

	$q = mysqli_query($mycon,'UPDATE designation SET status=0 WHERE dg_id='.$dg_id);

	if(mysqli_affected_rows($mycon))
		$json['deleted'] = "true";

	echo json_encode($json);

?>