<?php 

	require '../../connection.php';
	
	$agent_id = $_GET['agent_id'];
	$name = $_GET['name'];
	$address = $_GET['address'];
	$contact = $_GET['contact'];

	$q = mysqli_query($mycon,"UPDATE agent SET name='$name' ,address='$address', contact='$contact' WHERE agent_id=$agent_id ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>