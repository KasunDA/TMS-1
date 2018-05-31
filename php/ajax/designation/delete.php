<?php 

	require '../../connection.php';

	$dg_id = $_GET['dg_id'];

	$q = mysqli_query($mycon,'UPDATE designation SET status=0 WHERE dg_id='.$dg_id);

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>