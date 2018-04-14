<?php 

	require '../../connection.php';
	// from_yard,to_yard,limit_litre
	$from_yard = $_GET['from_yard'];
	$to_yard = $_GET['to_yard'];
	$limit_litre = $_GET['limit_litre'];
	
	$q = mysqli_query($mycon,"INSERT INTO diesel_limit(from_yard,to_yard,limit_litre) VALUES('$from_yard','$to_yard','$limit_litre') ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>