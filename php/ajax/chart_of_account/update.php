<?php 

	require '../../connection.php';
	
	$coa_id = $_GET['coa_id'];
	$party_name = $_GET['party_name'];
	$address = $_GET['address'];
	$contact = $_GET['contact'];

	$q = mysqli_query($mycon,"UPDATE chart_of_account SET party_name='$party_name' ,address='$address', contact='$contact' WHERE coa_id=$coa_id ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>