<?php 

	require '../../connection.php';

	function updateStatus($mycon,$ce_id,$voucher_number)
	{
		$q = mysqli_query($mycon,'UPDATE container_entry SET paid_status=1 , voucher_number='.$voucher_number.' WHERE ce_id='.$ce_id);
		if ( mysqli_affected_rows($mycon) )
			return true;
	}

	function updateStatusRM($mycon,$ge_id)
	{
		$q = mysqli_query($mycon,'UPDATE garage_entry SET paid_status=1 WHERE ge_id='.$ge_id);
		if ( mysqli_affected_rows($mycon) )
			return true;
	}

	function addIncome($mycon,$amount,$vehicle_id,$name)
	{
		$datee 		 = $_POST['datee'];
		$dd_id 		 = 2;
		$method 	 = $_POST['method'];
		$description = $_POST['description'];

		if( isset($_POST['bank_id']) && isset($_POST['check_number']) && $_POST['bank_id'] != NULL && $_POST['check_number'] != NULL  )
		{
			$check_number = $_POST['check_number'];
			$bank_id = $_POST['bank_id'];	
		}
		else
		{
			$check_number = NULL;
			$bank_id = 'null';
		}

		$sql = "INSERT INTO income(datee, dd_id, method, check_number, bank_id, amount, vehicle_id,name, description) VALUES ( '$datee' , $dd_id, '$method', '".$check_number."' , ".$bank_id.", $amount, $vehicle_id, '$name','".$description."' ) ";

		$q = mysqli_query($mycon,$sql);
		if(mysqli_affected_rows($mycon))
			return 'true';
	}

	function advanceRecover($mycon,$from_datee,$to_datee,$vehicle_id)
	{
		if($vehicle_id == NULL)
			return false;

		$q = mysqli_query($mycon,"SELECT owner_name,driver_name,vehicle_id FROM vehicle WHERE vehicle_id IN ".$vehicle_id);

		while( $r_vehicle = mysqli_fetch_array($q) ) 
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
				addIncome($mycon,$t_driver,$cvehicle_id,$driver_name);
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
				addIncome($mycon,$t_owner,$cvehicle_id,$owner_name);
			}
		}
	}

	$json['inserted'] = 'false';
	$sql  = '';
	$isql = '';
	$vehicle_number  = str_replace( str_split("[]"),"",$_POST['vehicle_number']);
	$datee 		 	 = $_POST['datee'];
	$method 	 	 = $_POST['method'];
	$amount 		 = $_POST['amount'];
	$description 	 = $_POST['description'];
	$ce_ids 	 	 = json_decode($_POST['ce_ids']);
	$ge_ids 	 	 = json_decode($_POST['ge_ids']);
	$vids  		 	 = json_decode($_POST['vids']);
	$from_date 		 = $_POST['from_date'];
	$to_date 		 = $_POST['to_date'];
	
	if( $_POST['bank_id'] != NULL && $_POST['check_number'] != NULL  )
	{
		$check_number = $_POST['check_number'];
		$bank_id  	  = $_POST['bank_id'];	

		$sql = "INSERT INTO voucher(datee, method, check_number, bank_id, amount, vehicle_number) VALUES ( '$datee' , '$method', '".$check_number."' , ".$bank_id.", $amount, '$vehicle_number' ) ";

		$isql = "INSERT INTO expenses(datee, dd_id, method, check_number, bank_id, amount, description) VALUES ( '$datee' , 7, '$method', '".$check_number."' , ".$bank_id.", $amount ,'$description' ) ";
	}
	else
	{
		$sql  = "INSERT INTO voucher(datee, method, amount, vehicle_number) VALUES ( '$datee' , '$method', $amount, '$vehicle_number' ) ";

		$isql = "INSERT INTO expenses(datee, dd_id, method, amount, description) VALUES ( '$datee' , 7, '$method', $amount ,'$description' ) ";
	}

	$q = mysqli_query($mycon,$sql);
	if(mysqli_affected_rows($mycon))
	{
		$vnq  = mysqli_query($mycon,'SELECT voucher_number from voucher ORDER BY voucher_number DESC LIMIT 1');
		if ( $rvnq = mysqli_fetch_array($vnq) )
			$voucher_number = $rvnq['voucher_number'];
		
		if($method == 'check')
		{
			//Account Code
			$action = 'debit';
			$current_balance=0;
			$previous_balance=0;

			$aq = mysqli_query($mycon,'SELECT current_balance from accounts_entry where bank_id='.$bank_id.' ORDER BY ae_id DESC limit 1');

			if ( $raq = mysqli_fetch_array($aq) )
			{
				$previous_balance = $raq['current_balance'];
			}
			else
			{
				$bq = mysqli_query($mycon,'SELECT balance from bank where bank_id='.$bank_id);
				$rbq = mysqli_fetch_array($bq);
				$previous_balance = $rbq['balance'];	
			}

    	 	$current_balance = $previous_balance - $amount;  
    	 	$date = date('m/d/Y',strtotime($datee)); //05/08/2018 
			$q = mysqli_query($mycon,"INSERT INTO accounts_entry(datee,bank_id,action,method,amount,check_number,previous_balance,current_balance) VALUES('$date',$bank_id,'$action','$method',$amount,'$check_number',$previous_balance,$current_balance) ");

			//Income Code 
			$sql = "INSERT INTO income(datee, dd_id, method, check_number, bank_id, amount, description) VALUES ( '$datee' , 7, '$method', '$check_number', $bank_id, $amount ,'$description' ) ";

			$income_q = mysqli_query($mycon,$sql);
		}

		
		if(mysqli_affected_rows($mycon))
		{
			//Updating Statuses of container Entries with Voucher Id
			$l = count($ce_ids);
			for ($i=0; $i < $l ; $i++) { 
					updateStatus($mycon,$ce_ids[$i],$voucher_number);
				}

			//Updating Paid Statuses of repair & Maintanence
			$l = count($ge_ids);
			for ($i=0; $i < $l ; $i++) { 
					updateStatusRM($mycon,$ge_ids[$i]);
				}

			//Recover Advance From Drivers And Owners Of Vehicles
			advanceRecover($mycon,$from_date,$to_date,$vids);

			$json['inserted'] = 'true';
		}
	}

	echo json_encode($json);
?>