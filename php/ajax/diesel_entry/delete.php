<?php 

	require '../../connection.php';

	$de_id = $_GET['de_id'];

	$q = mysqli_query($mycon,'UPDATE diesel_entry SET status=0 WHERE de_id='.$de_id);

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>