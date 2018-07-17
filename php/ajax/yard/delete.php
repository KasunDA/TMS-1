<?php 

	require '../../connection.php';

	$json['deleted'] = 'false';
	$yard_id = $_POST['yard_id'];

	$q = mysqli_query($mycon,'UPDATE yard SET status=0 WHERE yard_id='.$yard_id);

	if(mysqli_affected_rows($mycon))
		$json['deleted'] = "true";

	echo json_encode($json);

?>