<?php 

	require '../../connection.php';
	
	$ce_id = $_GET['ce_id'];
	$container_number = $_GET['container_number'];
	$vehicle_id = $_GET['vehicle_id'];
	$advance = $_GET['advance'];
	$balance = $_GET['balance'];
	$color = $_GET['color'];
	$mr_charges = $_GET['mr_charges'];
	$remarks = $_GET['remarks'];

	$q = mysqli_query($mycon,"UPDATE container_entry SET container_number='$container_number' , vehicle_id=$vehicle_id , advance=$advance ,  balance=$balance , color='$color' , mr_charges=$mr_charges , remarks='$remarks'  WHERE ce_id=$ce_id ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>