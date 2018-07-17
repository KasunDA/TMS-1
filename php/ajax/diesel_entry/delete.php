<?php 

	require '../../connection.php';

	$json['deleted'] = 'false';
	$de_id 			 = $_POST['de_id'];

	$q = mysqli_query($mycon,'UPDATE diesel_entry SET status=0 WHERE de_id='.$de_id);

	if(mysqli_affected_rows($mycon))
		$json['deleted'] = "true";

	echo json_encode($json);

?>