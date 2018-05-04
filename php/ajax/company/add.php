<?php 

	require '../../connection.php';

	$name = $_GET['name'];
	
	$q = mysqli_query($mycon,"INSERT INTO company(name) VALUES('$name') ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>