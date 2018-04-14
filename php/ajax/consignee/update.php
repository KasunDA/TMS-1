<?php 

	require '../../connection.php';
	
	$consignee_id = $_GET['consignee_id'];
	$short_form = $_GET['short_form'];
	$full_form = $_GET['full_form'];

	$q = mysqli_query($mycon,"UPDATE consignee SET short_form='$short_form', full_form = '$full_form' WHERE consignee_id=$consignee_id ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>