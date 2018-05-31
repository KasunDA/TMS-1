<?php 

	require '../../connection.php';

	$designation = $_GET['designation'];
	
	$q = mysqli_query($mycon,"INSERT INTO designation(designation) VALUES('$designation') ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>