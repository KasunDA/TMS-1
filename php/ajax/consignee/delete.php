<?php 

	require '../../connection.php';

	$consignee_id = $_GET['consignee_id'];

	$q = mysqli_query($mycon,'UPDATE consignee SET status=0 WHERE consignee_id='.$consignee_id);

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>