<?php 

	require '../connection.php';
	date_default_timezone_set("Asia/Karachi");

	$from_datee = date('Y-m-d', strtotime($_GET['from_datee']));
	$to_datee = date('Y-m-d', strtotime($_GET['to_datee']));
	$newdate = strtotime ( "-1 days" , strtotime ( $from_datee ) ) ;
	$ydate = date ( 'Y-m-d' , $newdate );
	$json['ytotal_expense'] = 0;
	$json['ytotal_income']  = 0;
	$json['total_income'] 	= 0;
	$json['total_expense']  = 0;	

	//total income 
	$sql = "SELECT expense_id,datee,SUM(amount) as ytotal_expense FROM expenses WHERE datee<='$ydate' ";
	$q = mysqli_query($mycon,$sql);
	if($r = mysqli_fetch_array($q))
		$json['ytotal_expense'] = $r['ytotal_expense'];

	$sql = "SELECT income_id,datee,SUM(amount) as ytotal_income  FROM income WHERE datee<='$ydate' ";
	$q = mysqli_query($mycon,$sql);
	if($r = mysqli_fetch_array($q))
		$json['ytotal_income'] = $r['ytotal_income'];

	$json['previous_balance'] = $json['ytotal_income'] - $json['ytotal_expense'];
	

	// TOTAL INCOME WORK
	$total_income_q = mysqli_query($mycon,"SELECT SUM(amount) as total_income from income where datee BETWEEN '$from_datee' AND '$to_datee' ");
	if( $r_total_income = mysqli_fetch_array($total_income_q) )
		$json['total_income'] = $r_total_income[0];

	// TOTAL EXPENSE WORK
	$total_expense_q = mysqli_query($mycon,"SELECT SUM(amount) as total_expense from expenses where datee BETWEEN '$from_datee' AND '$to_datee' ");
	if( $r_total_expense = mysqli_fetch_array($total_expense_q) )
		$json['total_expense'] = $r_total_expense[0];
		
	$json['balance'] = ($json['previous_balance']+$json['total_income'])-$json['total_expense'];	

	echo json_encode($json);

?>