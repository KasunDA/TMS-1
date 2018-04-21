<?php 

	require '../../connection.php';
	
	$ce_id = $_GET['ce_id'];
	$bl_cro_number = $_GET['bl_cro_number'];
	$job_number = $_GET['job_number'];
	$container_number = $_GET['container_number'];
	$index_number = $_GET['index_number'];
	$vehicle_id = $_GET['vehicle_id'];
	$advance = $_GET['advance'];
	$rent = $_GET['rent'];
	$balance = $_GET['balance'];
	$container_id = $_GET['container_id'];
	$lolo_charges = $_GET['lolo_charges'];
	$weight_charges = $_GET['weight_charges'];
	$color = $_GET['color'];
	$mr_charges = $_GET['mr_charges'];
	$remarks = $_GET['remarks'];


	$q = mysqli_query($mycon,"UPDATE container_entry SET bl_cro_number='$bl_cro_number',job_number='$job_number',container_number='$container_number' , index_number='$index_number' , vehicle_id=$vehicle_id , advance=$advance , rent=$rent , balance=$balance , container_id=$container_id , lolo_charges=$lolo_charges , weight_charges=$weight_charges , color='$color' , mr_charges=$mr_charges , remarks='$remarks'  WHERE ce_id=$ce_id ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>