<?php 

	require '../../connection.php';

	$name = $_GET['name'];
	
	$q = mysqli_query($mycon,"INSERT INTO borrower(name) VALUES('$name') ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>