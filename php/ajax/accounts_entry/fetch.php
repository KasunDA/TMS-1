<?php 

	require '../../connection.php';
	date_default_timezone_set("Asia/Karachi");

	$json=NULL;
	$date = date('m/d/Y');

	$q = mysqli_query($mycon,"SELECT * FROM accounts_entry WHERE status=1 and datee='$date' "); //ORDER BY ae_id DESC
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
		$json[$n]['description'] = $r['description'];

		$n++;
	}

	echo json_encode($json);

?>