<?php 

	require '../../connection.php';

	$json['deleted'] = 'false';
	$agent_id 		 = $_POST['agent_id'];

	$q = mysqli_query($mycon,'UPDATE agent SET status=0 WHERE agent_id='.$agent_id);

	if(mysqli_affected_rows($mycon))
		$json['deleted'] = "true";

	echo json_encode($json);

?>