<?php 

	require '../../connection.php';

	$datee = $_GET['datee'];
	$vehicle_id = $_GET['vehicle_id'];
	$from_yard_id = $_GET['from_yard_id'];
	$to_yard_id = $_GET['to_yard_id'];
	$litre_rate = $_GET['litre_rate'];
	$extra_litres = $_GET['extra_litres'];
	$total = $_GET['total'];
	$description = $_GET['description'];
	
	$q = mysqli_query($mycon,"INSERT INTO diesel_entry(datee,vehicle_id,from_yard_id,to_yard_id,litre_rate,extra_litres,total,description) VALUES('$datee',$vehicle_id,$from_yard_id,$to_yard_id,$litre_rate,$extra_litres,$total,'$description') ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>