<?php 

	require '../../connection.php';

	$ce_id = $_GET['ce_id'];

	$q = mysqli_query($mycon,'UPDATE container_entry SET status=0 WHERE ce_id='.$ce_id);

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>