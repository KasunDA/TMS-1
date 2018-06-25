<?php 

	require '../../connection.php';

	function updateDescription($mycon,$cm_id)
	{
		// Fetching data of movement
		$dq    = mysqli_query($mycon,'SELECT datee,lot_of,container_size,coa_id,to_yard_id,index_number FROM container_movement WHERE cm_id='.$cm_id);
		$rdq   = mysqli_fetch_array($dq); 
		$datee = $rdq['datee'];
		$lot   = $rdq['lot_of'].'x'.$rdq['container_size'];
		$index_number = $rdq['index_number'];

		// Fetching chart of account
		$cq  = mysqli_query($mycon,'SELECT full_form FROM chart_of_account WHERE coa_id='.$rdq['coa_id']);
		$rcq = mysqli_fetch_array($cq);
		$chart_of_account = $rcq['full_form'];

		// Fetching to destination
		$tdq  = mysqli_query($mycon,'SELECT full_form FROM yard WHERE yard_id='.$rdq['to_yard_id']);
		$rtdq = mysqli_fetch_array($tdq);
		$to_yard = $rtdq['full_form'];

		$description = $lot.'\n To Destination :'.$to_yard.' \n Party Name:'.$chart_of_account.' \n Index Number: '.$index_number;

		//Expense SQL CODE 		
		$sql  = "UPDATE expenses SET description='$description' WHERE cm_id".$cm_id;
	
		$eq = mysqli_query($mycon,$sql);
	}
	
	$cm_id = $_GET['cm_id'];
	$datee = $_GET['datee'];
	$agent_id = $_GET['agent_id'];
	$coa_id = $_GET['coa_id'];
	$consignee_id = $_GET['consignee_id'];
	$movement = $_GET['movement'];
	$empty_terminal_id = $_GET['empty_terminal_id'];
	$from_yard_id = $_GET['from_yard_id'];
	$to_yard_id = $_GET['to_yard_id'];
	$container_size = $_GET['container_size'];
	$party_charges = $_GET['party_charges'];
	$lot_of= $_GET['lot_of'];
	$line_id = $_GET['line_id'];

	$bl_cro_number = $_GET['bl_cro_number'];
	$job_number = $_GET['job_number'];
	$index_number = $_GET['index_number'];
	
	$container_id = $_GET['container_id'];
	$lolo_charges = $_GET['lolo_charges'];
	$weight_charges = $_GET['weight_charges'];

	$q = mysqli_query($mycon,"UPDATE container_movement SET datee='$datee', agent_id= $agent_id , coa_id= $coa_id, consignee_id=$consignee_id , movement='$movement', empty_terminal_id=$empty_terminal_id , from_yard_id=$from_yard_id , to_yard_id=$to_yard_id , container_size=$container_size , party_charges=$party_charges , lot_of=$lot_of , line_id=$line_id , bl_cro_number='$bl_cro_number',job_number='$job_number', index_number='$index_number' , container_id=$container_id , lolo_charges=$lolo_charges , weight_charges=$weight_charges WHERE cm_id=$cm_id ");

	if(mysqli_affected_rows($mycon))
	{
		echo "true";

		session_start();

		$_SESSION['cm_id'] = $cm_id;
		$_SESSION['lot_of'] = $lot_of;
		$_SESSION['datee'] = $datee;
		$_SESSION['agent_id'] = $agent_id;
		$_SESSION['coa_id'] = $coa_id;
		$_SESSION['consignee_id'] = $consignee_id;
		$_SESSION['movement'] = $movement;
		$_SESSION['empty_terminal_id'] = $empty_terminal_id;
		$_SESSION['from_yard_id'] = $from_yard_id;
		$_SESSION['to_yard_id'] = $to_yard_id;
		$_SESSION['container_size'] = $container_size;
		$_SESSION['party_charges'] = $party_charges;
		$_SESSION['line_id'] = $line_id;

		$_SESSION['bl_cro_number'] = $bl_cro_number;
		$_SESSION['job_number'] = $job_number;
		$_SESSION['index_number'] = $index_number;
		
		$_SESSION['container_id'] = $container_id;
		$_SESSION['lolo_charges'] = $lolo_charges;
		$_SESSION['weight_charges'] = $weight_charges;


		$q1 = mysqli_query($mycon,"SELECT * FROM expenses WHERE (dd_id=5 OR dd_id=8)  AND cm_id=".$cm_id);

		if( $r1 = mysqli_fetch_array($q1) )
		{
			updateDescription($mycon,$cm_id);
		}

	}

?>