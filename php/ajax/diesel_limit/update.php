<?php 

	require '../../connection.php';
	
	$dl_id = $_GET['dl_id'];
	$from_yard = $_GET['from_yard'];
	$to_yard = $_GET['to_yard'];
	$limit_litre = $_GET['limit_litre'];

	$q = mysqli_query($mycon,"UPDATE diesel_limit SET from_yard='$from_yard' , to_yard= '$to_yard', limit_litre = '$limit_litre' WHERE dl_id=$dl_id ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>