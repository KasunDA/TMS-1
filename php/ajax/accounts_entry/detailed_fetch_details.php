<?php 

	require '../../connection.php';
	date_default_timezone_set("Asia/Karachi");

	$json=NULL;
	$from_datee = date('Y-m-d', strtotime($_GET['from_datee']));
	$to_datee = date('Y-m-d', strtotime($_GET['to_datee']));
	//$ = date(,strtotime("-1 days"));
	$newdate = strtotime ( "-1 days" , strtotime ( $from_datee ) ) ;
	$ydate = date ( 'Y-m-d' , $newdate );
	$n=0;
	
	//echo '<script>alert("From Date='.$date.' and -1 ='.$ydate.'")</script>';

	$bank_ids_q = mysqli_query($mycon,"SELECT bank_id,balance,short_form FROM bank WHERE status=1");
	while($bank_ids = mysqli_fetch_array($bank_ids_q))
	{	
		$json[$n]['bank_id'] = $bank_ids[0];
		$json[$n]['bank_name'] = $bank_ids[2];
		
		$q = mysqli_query($mycon,"SELECT current_balance from accounts_entry Where datee='$ydate' and bank_id=".$bank_ids[0]." ORDER BY ae_id DESC limit 1");

		if( $r = mysqli_fetch_array($q) )
		{
			$json[$n]['previous_balance'] = $r[0];
		}
		else
		{
			$q1 = mysqli_query($mycon,"SELECT current_balance from accounts_entry Where  datee<'$ydate' AND bank_id=".$bank_ids[0]." ORDER BY ae_id DESC limit 1");

			if( $r1 = mysqli_fetch_array($q1) )
			{
				$json[$n]['previous_balance'] = $r1[0];
			}

			else
			{
				$json[$n]['previous_balance'] = $bank_ids[1];
			}
		}

		$total_debit_q = mysqli_query($mycon,"SELECT SUM(amount) from accounts_entry where action='debit' and datee BETWEEN '$from_datee' AND '$to_datee' and bank_id=".$bank_ids[0]);

		if( $r_total_debit = mysqli_fetch_array($total_debit_q) )
		{
			$json[$n]['total_debit'] = $r_total_debit[0];
		}
		else
		{
			$json[$n]['total_debit'] = '0';
		}

		$total_credit_q = mysqli_query($mycon,"SELECT SUM(amount) from accounts_entry where action='credit' and datee BETWEEN '$from_datee' AND '$to_datee' and bank_id=".$bank_ids[0]);

		if( $r_total_credit = mysqli_fetch_array($total_credit_q) )
		{
			$json[$n]['total_credit'] = $r_total_credit[0];
		}
		else
		{
			$json[$n]['total_credit'] = '0';	
		}		

		$json[$n]['balance'] = ($json[$n]['previous_balance']+$json[$n]['total_credit'])-$json[$n]['total_debit'];	

		$n++;
	}

	echo json_encode($json);

?>