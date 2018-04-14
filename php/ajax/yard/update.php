<?php 

	require '../../connection.php';
	
	$yard_id = $_GET['yard_id'];
	$short_form = $_GET['short_form'];
	$full_form = $_GET['full_form'];
	$contact = $_GET['contact'];
	$location = $_GET['location'];


	$q = mysqli_query($mycon,"UPDATE yard SET short_form='$short_form', full_form = '$full_form', contact='$contact' , location = '$location' WHERE yard_id=$yard_id ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>