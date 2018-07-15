<?php

	require '../../connection.php';

	$json=NULL;
	$sql='';
	$advancesql = ''; 
	$dieselsql = '';
	$rmsql = '';
	$dssql = '';
	$pssql = '';

	$json[0]['total_remaining_advance'] = 0;
	$json[0]['total_remaining_advance_owner'] = 0;
	$json[0]['total_de_amount'] = 0;
	$json[0]['total_rm_amount'] = 0;
	$json[0]['total_driver_salary'] = 0;
	$json[0]['total_paid_salary'] = 0;

	$from_datee =  date('Y-m-d', strtotime($_GET['from_datee']));
	$to_datee   =  date('Y-m-d', strtotime($_GET['to_datee']));

	$from_date =  $_GET['from_datee'] ; //date('Y-m-d', strtotime(
	$to_date   =  $_GET['to_datee'];

	$voucher_numbers = str_replace( str_split("[]"),"",$_GET['voucher_numbers']);

	if( isset($_GET['vehicle_id']) && $_GET['vehicle_id'] != NULL && $_GET['vehicle_id'] != 'null' )
		$vehicle_id = str_replace( str_split("[]"),"",$_GET['vehicle_id']);
	
	else
		$vehicle_id = str_replace( str_split("[]"),"",$_GET['vids']);

	$vehicle_query = mysqli_query($mycon,"SELECT owner_name,driver_name,vehicle_id FROM vehicle WHERE vehicle_id IN (".$vehicle_id.") ");
	while ( $r_vehicle = mysqli_fetch_array($vehicle_query) ) 
	{	
		//Advance CODE For Vehicle Driver
		$cvehicle_id = $r_vehicle['vehicle_id'];
		$driver_name = $r_vehicle['driver_name'].' (Driver)';
		$t_driver	 = 0;
		$advanceqd = mysqli_query($mycon,"SELECT SUM(amount) as total_advance FROM expenses where dd_id=2 and paid_status=0 and status=1 and datee BETWEEN '$from_datee' AND '$to_datee' and vehicle_id=$cvehicle_id AND name='$driver_name' ");

		if( $r = mysqli_fetch_array($advanceqd) )
		{
			$q1 = mysqli_query($mycon,"SELECT SUM(amount) as received_amount from income where vehicle_id=$cvehicle_id and name='$driver_name' AND datee BETWEEN '$from_datee' AND '$to_datee'");
			$r1 = mysqli_fetch_array($q1);
			$t_driver = $r['total_advance'] - $r1['received_amount'];
			$json[0]['total_remaining_advance'] += $t_driver;
		}
		
		//Advance CODE For Vehicle Owner
		$owner_name  = $r_vehicle['owner_name'].' (Owner)';
		$t_owner	 = 0;
		$advanceqo = mysqli_query($mycon,"SELECT SUM(amount) as total_advance FROM expenses where dd_id=2 and paid_status=0 and status=1 and datee BETWEEN '$from_datee' AND '$to_datee' and vehicle_id=$cvehicle_id and name='$owner_name' ");

		if( $r = mysqli_fetch_array($advanceqo) )
		{
			$q1 = mysqli_query($mycon,"SELECT SUM(amount) as received_amount from income where vehicle_id=$cvehicle_id and name='$owner_name' AND datee BETWEEN '$from_datee' AND '$to_datee'");
			$r1 = mysqli_fetch_array($q1);
			$t_owner = $r['total_advance'] - $r1['received_amount'];
			$json[0]['total_remaining_advance_owner'] += $t_owner;
		}

		//Driver Salary Code
		$dssql = "SELECT SUM(amount) as total_driver_salary FROM expenses where dd_id=4 and status=1 and datee BETWEEN '$from_datee' AND '$to_datee' and vehicle_id=$cvehicle_id and name='$driver_name'";
		$dsq = mysqli_query($mycon,$dssql);
		
		if( $r = mysqli_fetch_array($dsq) )
			$json[0]['total_driver_salary'] += $r['total_driver_salary'];
	}

	//Diesel CODE
	$dieselsql = "SELECT SUM(total) as total_de_amount from diesel_entry where  status=1 and datee BETWEEN '$from_datee' AND '$to_datee' AND vehicle_id IN (".$vehicle_id.") ";
	$dieselq = mysqli_query($mycon,$dieselsql);
	if( $r = mysqli_fetch_array($dieselq) )
		$json[0]['total_de_amount'] = $r['total_de_amount'];
	
	//Repair & Maintainance CODE
	$rmsql = "SELECT SUM(amount) as total_rm_amount FROM garage_entry  where status=1 and datee BETWEEN '$from_datee' AND '$to_datee' and vehicle_id IN (".$vehicle_id.") ";
	$rmq = mysqli_query($mycon,$rmsql);
	if( $r = mysqli_fetch_array($rmq) )
		$json[0]['total_rm_amount'] = $r['total_rm_amount'];

	//Paid Voucher CODE
	$pssql = "SELECT SUM(amount) as total_paid_salary FROM voucher where status=1 and datee BETWEEN '$from_datee' AND '$to_datee' and voucher_number IN (".$voucher_numbers.") ";
	$psq = mysqli_query($mycon,$pssql);
	if( $r = mysqli_fetch_array($psq) )
		$json[0]['total_paid_salary'] = $r['total_paid_salary'];

	echo json_encode($json);
?>