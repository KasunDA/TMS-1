<?php 

	require '../../connection.php';
	
	$de_id = $_GET['de_id'];
	$datee = $_GET['datee'];
	$vehicle_id = $_GET['vehicle_id'];
	$from_yard_id = $_GET['from_yard_id'];
	$to_yard_id = $_GET['to_yard_id'];
	$litre_rate = $_GET['litre_rate'];
	$extra_litres = $_GET['extra_litres'];
	$total = $_GET['total'];
	$description = $_GET['description'];

	$q = mysqli_query($mycon,"UPDATE diesel_entry SET datee='$datee', vehicle_id=$vehicle_id, from_yard_id=$from_yard_id , to_yard_id= $to_yard_id, litre_rate = $litre_rate , extra_litres = $extra_litres , total = $total , description = '$description' WHERE de_id=$de_id ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>