<?php 

	require '../../connection.php';

	$short_form = $_GET['short_form'];
	$full_form = $_GET['full_form'];
	$contact = $_GET['contact'];
	$location = $_GET['location'];

	
	$q = mysqli_query($mycon,"INSERT INTO yard(short_form,full_form,contact,location) VALUES('$short_form','$full_form','$contact','$location') ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>