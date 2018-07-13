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

	$from_datee =  date('Y-m-d', strtotime($_POST['from_datee'])) ;
	$to_datee = date('Y-m-d', strtotime($_POST['to_datee']));

	$from_date =  $_POST['from_datee'] ; //date('Y-m-d', strtotime(
	$to_date = $_POST['to_datee'];

	if( isset($_POST['vehicle_id']) && $_POST['vehicle_id'] != NULL )
	{
		$vehicle_id = $_POST['vehicle_id'];
		
		$vehicle_query = mysqli_query($mycon,"SELECT owner_name,driver_name FROM vehicle WHERE vehicle_id=$vehicle_id");
		$r_vehicle = mysqli_fetch_array($vehicle_query);

		$driver_name = $r_vehicle['driver_name'].' (Driver)';
		$owner_name = $r_vehicle['owner_name'].' (Owner)';

		//Advance CODE For Vehicle Driver
		$advanceqd = mysqli_query($mycon,"SELECT SUM(amount) as total_advance FROM expenses where dd_id=2 and paid_status=0 and status=1 and datee BETWEEN '$from_datee' AND '$to_datee' and vehicle_id=$vehicle_id and name='$driver_name' ");

		if( $r = mysqli_fetch_array($advanceqd) )
		{

			$q1 = mysqli_query($mycon,"SELECT SUM(amount) as received_amount from income where vehicle_id=$vehicle_id and name='$driver_name' AND datee BETWEEN '$from_datee' AND '$to_datee'");
	
			$r1 = mysqli_fetch_array($q1);

			$json[0]['total_remaining_advance'] = $r['total_advance'] - $r1['received_amount'];
		}


		//Advance CODE For Vehicle Owner
		$advanceqo = mysqli_query($mycon,"SELECT SUM(amount) as total_advance FROM expenses where dd_id=2 and paid_status=0 and status=1 and datee BETWEEN '$from_datee' AND '$to_datee' and vehicle_id=$vehicle_id and name='$owner_name' ");

		if( $r = mysqli_fetch_array($advanceqo) )
		{

			$q1 = mysqli_query($mycon,"SELECT SUM(amount) as received_amount from income where vehicle_id=$vehicle_id and name='$owner_name' AND datee BETWEEN '$from_datee' AND '$to_datee'");
	
			$r1 = mysqli_fetch_array($q1);

			$json[0]['total_remaining_advance_owner'] = $r['total_advance'] - $r1['received_amount'];
		}

		//Diesel sql query
		$dieselsql = "SELECT SUM(total) as total_de_amount from diesel_entry where  status=1 and datee BETWEEN '$from_datee' AND '$to_datee' AND vehicle_id=$vehicle_id";

		//Repair & Maintainance sql query
		$rmsql = "SELECT SUM(amount) as total_rm_amount FROM garage_entry  where status=1 and datee BETWEEN '$from_datee' AND '$to_datee' and vehicle_id=$vehicle_id";

		//Driver Salary sql query
		$dssql = "SELECT SUM(amount) as total_driver_salary FROM expenses where dd_id=4 and status=1 and datee BETWEEN '$from_datee' AND '$to_datee' and vehicle_id=$vehicle_id and name='$driver_name'";

		//Paid Salary
		$pssql = "SELECT SUM(amount) as total_paid_salary FROM voucher where status=1 and datee BETWEEN '$from_datee' AND '$to_datee' and vehicle_id=$vehicle_id";

	}
	else
	{
		//Advance CODE
		$advanceq = mysqli_query($mycon,"SELECT SUM(amount) as total_advance FROM expenses  where dd_id=2 and paid_status=0 and status=1 and datee BETWEEN '$from_datee' AND '$to_datee'  ");

		if( $r = mysqli_fetch_array($advanceq) )
		{

			$q1 = mysqli_query($mycon,"SELECT SUM(amount) as received_amount from income where vehicle_id!=0 and name!='' AND datee BETWEEN '$from_datee' AND '$to_datee'");
	
			$r1 = mysqli_fetch_array($q1);

			$json[0]['total_remaining_advance'] = $r['total_advance'] - $r1['received_amount'];
		}

		
		//Diesel sql query
		$dieselsql = "SELECT SUM(total) as total_de_amount from diesel_entry where  status=1 and  datee BETWEEN '$from_datee' AND '$to_datee' ";

		$vids = str_replace( str_split("[]"),"",$_POST['vids']);

		//Repair & Maintainance sql query
		$rmsql = "SELECT SUM(amount) as total_rm_amount FROM garage_entry  where status=1 and datee BETWEEN '$from_datee' AND '$to_datee' AND vehicle_id IN (".$vids.") ";
		
		// echo $rmsql;
		
		//Driver Salary sql query
		$dssql = "SELECT SUM(amount) as total_driver_salary FROM expenses where dd_id=4 and status=1 and datee BETWEEN '$from_datee' AND '$to_datee' ";	

		//Paid Salary
		$pssql = "SELECT SUM(amount) as total_paid_salary FROM voucher where status=1 and datee BETWEEN '$from_datee' AND '$to_datee' and vehicle_id!=0";	
	}

	//Diesel Query CODE
	$dieselq = mysqli_query($mycon,$dieselsql);

	if( $r = mysqli_fetch_array($dieselq) )
	{
		$json[0]['total_de_amount'] = $r['total_de_amount'];
	}

	//Repair & Maintainance Query CODE
	$rmq = mysqli_query($mycon,$rmsql);

	if( $r = mysqli_fetch_array($rmq) )
	{
		$json[0]['total_rm_amount'] = $r['total_rm_amount'];
	}

	//Driver Salary Query CODE
	$dsq = mysqli_query($mycon,$dssql);

	if( $r = mysqli_fetch_array($dsq) )
	{
		$json[0]['total_driver_salary'] = $r['total_driver_salary'];
	}


	//Paid Salary Query CODE
	$psq = mysqli_query($mycon,$pssql);

	if( $r = mysqli_fetch_array($psq) )
	{
		$json[0]['total_paid_salary'] = $r['total_paid_salary'];
	}

	echo json_encode($json);

?>