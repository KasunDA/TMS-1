<?php 

	require '../../connection.php';

	$json=NULL;
	$sql='';
	$from_datee = date('Y-m-d', strtotime($_GET['from_datee']));
	$to_datee = date('Y-m-d', strtotime($_GET['to_datee'])); //date('Y-m-d', strtotime(
	

	if( isset($_GET['bank_id']) && $_GET['bank_id'] != NULL )
	{
		$bank_id = $_GET['bank_id'];
		$sql = "SELECT * FROM accounts_entry WHERE status=1 and datee BETWEEN '$from_datee' AND '$to_datee' and bank_id=$bank_id ";
	}
	else
	{
		$sql = "SELECT * FROM accounts_entry WHERE status=1 and datee BETWEEN '$from_datee' AND '$to_datee' ";
	}

	$q = mysqli_query($mycon,$sql);
	
	$n  = 0;
	
	while($r = mysqli_fetch_array($q))
	{
		$json[$n]['ae_id'] = $r['ae_id'];  
		$json[$n]['datee'] = $r['datee'];
		$json[$n]['bank_id'] = $r['bank_id'];
		
		$q1 = mysqli_query($mycon,'SELECT short_form from bank where bank_id='.$r['bank_id']);
		$r1 = mysqli_fetch_array($q1);
		$json[$n]['short_form'] = $r1['short_form'];
			
		if( $r['action'] == 'debit' )
	    {
	        $json[$n]['debit'] = $r['amount'] ;
	        $json[$n]['credit'] = '' ;
	    }
	    else
	    {
	     	$json[$n]['debit'] = '' ;
	        $json[$n]['credit'] = $r['amount'] ;
	    }
		
		$json[$n]['check_number'] = $r['check_number'];
		$json[$n]['previous_balance'] = $r['previous_balance'];
		$json[$n]['current_balance'] = $r['current_balance'];

		$n++;
	}

	echo json_encode($json);

?>