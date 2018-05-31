<?php 

	/*
	function addExpense()
	{
		$datee = $_GET['datee'];
		$dd_id = $_GET['dd_id'];
		$method = $_GET['method'];
		$amount = $_GET['amount'];
		$vehicle_id = $_GET['vehicle_id'];
		$name = $_GET['name'];
		$description = $_GET['description'];
	

		$sql = "INSERT INTO expenses(datee, dd_id, method, amount, vehicle_id,name , description) VALUES ( '$datee' , $dd_id, '$method', $amount, $vehicle_id, '$name' ,'$description' ) ";	
	
		$q = mysqli_query($mycon,$sql);

		if(mysqli_affected_rows($mycon))
		{
			$expense_id_q = mysqli_query($mycon,'SELECT expense_id from expenses ORDER BY expense_id DESC limit 1');
			$r_expense_id = mysqli_fetch_array($expense_id_q);

			$previous_balance_q = mysqli_query($mycon,'SELECT current_balance from exin ORDER BY exin_id DESC limit 1');
			$r_previous_balance = mysqli_fetch_array($previous_balance_q);

			$expense_id = $r_expense_id['expense_id'];
			$previous_balance = $r_previous_balance['current_balance'];
			$current_balance = $previous_balance - $amount;

			$q1 = mysqli_query($mycon,"INSERT INTO exin (expense_id, datee, previous_balance, current_balance) VALUES ($expense_id,'$datee',$previous_balance,$current_balance) ");
			
			if(mysqli_affected_rows($mycon))
			{
				echo "true";
			}
		}
	}
	*/
	
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
		$diesel = $_GET['diesel'];
		$balance = $_GET['balance'];
		$color = $_GET['color'];
		$mr_charges = $_GET['mr_charges'];
		$remarks = $_GET['remarks'];


		$q = mysqli_query($mycon,"INSERT INTO container_entry(cm_id,container_number,vehicle_id,advance,diesel,balance,color,mr_charges,remarks) VALUES( $cm_id,'$container_number',$vehicle_id,$advance,$diesel,$balance,'$color',$mr_charges,'$remarks' ) ");

		if(mysqli_affected_rows($mycon))
		{

			if( $mr_charges != 0 && $mr_charges != NULL )
			{
				$dq = mysqli_query($mycon,'SELECT datee from container_movement where cm_id='.$cm_id);
				$rdq = mysqli_fetch_array($dq);
				$datee =   date('m/d/Y', strtotime($rdq['datee']));

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