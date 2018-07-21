<?php 

	require '../../connection.php';
	
	$cm_id = $_GET['cm_id'];
	$q = mysqli_query($mycon,"SELECT * FROM container_movement WHERE cm_id=$cm_id ");

	if( $r = mysqli_fetch_array($q) )
	{
		echo "true";
		
		session_start();
		$_SESSION['cm_id'] 			   = $r['cm_id'];
		$_SESSION['lot_of'] 		   = $r['lot_of'];
		$_SESSION['datee'] 			   = $r['datee'];
		$_SESSION['agent_id'] 		   = $r['agent_id'];
		$_SESSION['coa_id'] 		   = $r['coa_id'];
		$_SESSION['consignee_id'] 	   = $r['consignee_id'];
		$_SESSION['movement'] 		   = $r['movement'];
		$_SESSION['empty_terminal_id'] = $r['empty_terminal_id'];
		$_SESSION['from_yard_id'] 	   = $r['from_yard_id'];
		$_SESSION['to_yard_id'] 	   = $r['to_yard_id'];
		$_SESSION['container_size']    = $r['container_size'];
		$_SESSION['party_charges'] 	   = $r['party_charges'];
		$_SESSION['line_id']           = $r['line_id'];
		$_SESSION['bl_cro_number']     = $r['bl_cro_number'];
		$_SESSION['job_number']        = $r['job_number'];
		$_SESSION['index_number']      = $r['index_number'];
		$_SESSION['container_id']      = $r['container_id'];
		$_SESSION['lolo_charges']      = $r['lolo_charges'];
		$_SESSION['weight_charges']    = $r['weight_charges'];
		$_SESSION['advance_charges']   = $r['advance_charges'];
	}

?>