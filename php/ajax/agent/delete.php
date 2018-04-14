<?php 

	require '../../connection.php';

	$agent_id = $_GET['agent_id'];

	$q = mysqli_query($mycon,'UPDATE agent SET status=0 WHERE agent_id='.$agent_id);

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>