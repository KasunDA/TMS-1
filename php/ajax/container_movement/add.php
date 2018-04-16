<?php 

	require '../../connection.php';

	$datee = $_GET['datee'];
	$agent_id = $_GET['agent_id'];
	$coa_id = $_GET['coa_id'];
	$consignee_id = $_GET['consignee_id'];
	$movement = $_GET['movement'];
	$empty_terminal_id = $_GET['empty_terminal_id'];
	$from_yard_id = $_GET['from_yard_id'];
	$to_yard_id = $_GET['to_yard_id'];
	$bl_cro_number = $_GET['bl_cro_number'];
	$job_number = $_GET['job_number'];
	$container_number = $_GET['container_number'];
	$index_number = $_GET['index_number'];
	$container_size = $_GET['container_size'];
	$vehicle_id = $_GET['vehicle_id'];
	$advance = $_GET['advance'];
	$diesel = $_GET['diesel'];
	$rent = $_GET['rent'];
	$balance = $_GET['balance'];
	$party_charges = $_GET['party_charges'];
	$container_id = $_GET['container_id'];
	$lot_of= $_GET['lot_of'];
	$line_id = $_GET['line_id'];
	$lolo_charges = $_GET['lolo_charges'];
	$weight_charges = $_GET['weight_charges'];
	$color = $_GET['color'];
	$mr_charges = $_GET['mr_charges'];
	$remarks = $_GET['remarks'];


	$q = mysqli_query($mycon,"INSERT INTO container_movement(datee,agent_id,coa_id,consignee_id,movement,empty_terminal_id,from_yard_id,to_yard_id,bl_cro_number,job_number,container_number,index_number,container_size,vehicle_id,advance,diesel,rent,balance,party_charges,container_id,lot_of,line_id,lolo_charges,weight_charges,color,mr_charges,remarks) VALUES( '$datee',$agent_id,$coa_id,$consignee_id,'$movement',$empty_terminal_id,$from_yard_id,$to_yard_id,'$bl_cro_number','$job_number','$container_number','$index_number',$container_size,$vehicle_id,$advance,$diesel,$rent,$balance,$party_charges,$container_id,$lot_of,$line_id,$lolo_charges,$weight_charges,'$color',$mr_charges,'$remarks' ) ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";
	}

?>