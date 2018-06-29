<?php 

	require '../connection.php';
	date_default_timezone_set("Asia/Karachi");

	$json=NULL;
	$from_datee = date('Y-m-d', strtotime($_GET['from_datee']));
	$to_datee = date('Y-m-d', strtotime($_GET['to_datee']));
	// $date = date('Y-m-d');
	//$date = '05/07/2018';
	$newdate = strtotime ( "-1 days" , strtotime ( $from_datee ) ) ;
	$ydate = date ( 'Y-m-d' , $newdate );	
	$n=0;
	
	//echo '<script>alert("-1 ='.$ydate.'")</script>';

	$exin_q = mysqli_query($mycon,"SELECT exin_id,datee,current_balance FROM exin WHERE datee<='$ydate' ORDER BY exin_id DESC , datee limit 1");

	if($r_exin = mysqli_fetch_array($exin_q))
	{					
		$json[$n]['previous_balance'] = $r_exin['current_balance'];
	}
	else
	{
		$q1 = mysqli_query($mycon,"SELECT exin_id,datee,current_balance FROM exin ORDER BY exin_id ASC limit 1");
		$r1 = mysqli_fetch_array($q1);
		
		$json[$n]['previous_balance'] = $r1['current_balance'];
	}


	// TOTAL INCOME WORK
	$total_income_q = mysqli_query($mycon,"SELECT SUM(amount) as total_income from income where datee BETWEEN '$from_datee' AND '$to_datee' ");

	if( $r_total_income = mysqli_fetch_array($total_income_q) )
	{
		$json[$n]['total_income'] = $r_total_income[0];
	}
	else
	{
		$json[$n]['total_income'] = '0';
	}

	// TOTAL EXPENSE WORK
	$total_expense_q = mysqli_query($mycon,"SELECT SUM(amount) as total_expense from expenses where datee BETWEEN '$from_datee' AND '$to_datee' ");

	if( $r_total_expense = mysqli_fetch_array($total_expense_q) )
	{
		$json[$n]['total_expense'] = $r_total_expense[0];
	}
	else
	{
		$json[$n]['total_expense'] = '0';	
	}		

	$json[$n]['balance'] = ($json[$n]['previous_balance']+$json[$n]['total_income'])-$json[$n]['total_expense'];	


	echo json_encode($json);

?>