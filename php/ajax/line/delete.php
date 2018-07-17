<?php 

	require '../../connection.php';

	$json['deleted'] = 'false';
	$line_id 		 = $_POST['line_id'];

	$q = mysqli_query($mycon,'UPDATE line SET status=0 WHERE line_id='.$line_id);

	if(mysqli_affected_rows($mycon))
		$json['deleted'] = "true";

	echo json_encode($json);

?>