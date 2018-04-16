<?php 

	require '../../connection.php';
	
	$coa_id = $_GET['coa_id'];
	$short_form = $_GET['short_form'];
	$full_form = $_GET['full_form'];
	$address = $_GET['address'];
	$contact = $_GET['contact'];

	$q = mysqli_query($mycon,"UPDATE chart_of_account SET short_form='$short_form', full_form='$full_form' ,address='$address', contact='$contact' WHERE coa_id=$coa_id ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>