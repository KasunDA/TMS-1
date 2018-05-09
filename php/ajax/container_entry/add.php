<?php 
	
	session_start();
	require '../../connection.php';

	$json;

	$lot_of_limit = $_SESSION['lot_of'];

	$count = mysqli_query($mycon,' SELECT COUNT(ce_id) as lot_of from container_entry where cm_id='.$_SESSION['cm_id']);

	$rc = mysqli_fetch_array($count);

	if( $rc['lot_of'] < $lot_of_limit )
	{

		$cm_id = $_GET['cm_id'];
		$container_number = $_GET['container_number'];
		$vehicle_id = $_GET['vehicle_id'];
		$advance = $_GET['advance'];
		$balance = $_GET['balance'];
		$color = $_GET['color'];
		$mr_charges = $_GET['mr_charges'];
		$remarks = $_GET['remarks'];


		$q = mysqli_query($mycon,"INSERT INTO container_entry(cm_id,container_number,vehicle_id,advance,balance,color,mr_charges,remarks) VALUES( $cm_id,'$container_number',$vehicle_id,$advance,$balance,'$color',$mr_charges,'$remarks' ) ");

		if(mysqli_affected_rows($mycon))
		{

			if( $mr_charges != 0 && $mr_charges != NULL )
			{
				$dq = mysqli_query($mycon,'SELECT datee from container_movement where cm_id='.$cm_id);
				$rdq = mysqli_fetch_array($dq);
				$datee = $rdq['datee'];

				$qg = mysqli_query($mycon,"INSERT INTO garage_entry(datee,vehicle_id,amount,description) VALUES ( '$datee',$vehicle_id,$mr_charges,'NILL') ");				
			}

			$json['inserted'] = "true";
		}
	}
	else
	{
		$json['inserted'] = "false";
		$json['lot_of_limit'] = "Your Lot of limit has been reached. Please click on Add New Movement Button.";
	}

	echo json_encode($json);
?>