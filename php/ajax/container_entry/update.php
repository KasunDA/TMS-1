<?php 

	require '../../connection.php';

	function updateData($mycon,$datee)
	{
		//Fetching Previous Balance
		$previous_balance_q = mysqli_query($mycon,"SELECT current_balance from exin WHERE datee='$datee' ORDER BY exin_id DESC limit 1");
		$r_previous_balance = mysqli_fetch_array($previous_balance_q);
		$previous_balance   = $r_previous_balance['current_balance'];


		$usql = "";
		$q   = mysqli_query($mycon,"SELECT * from exin WHERE datee>'$datee' ");
		
		while ( $rq = mysqli_fetch_array($q) )
		{
			if($rq['expense_id'] != NULL)
			{
				$q1   = mysqli_query($mycon,"SELECT * FROM expenses WHERE expense_id=".$rq['expense_id']);
				$rq1  = mysqli_fetch_array($q1);
				$amount = $rq1['amount'];

				$total = $previous_balance - $amount;
				$usql = "UPDATE exin SET previous_balance=$previous_balance , current_balance=$total WHERE expense_id=".$rq['expense_id'];
			}
			else
			{
				$q1   = mysqli_query($mycon,"SELECT * FROM income WHERE income_id=".$rq['income_id']);
				$rq1  = mysqli_fetch_array($q1);
				$amount = $rq1['amount'];

				$total = $previous_balance + $amount;
				$usql = "UPDATE exin SET previous_balance=$previous_balance , current_balance=$total WHERE income_id=".$rq['income_id'];	
			}

			$uq = mysqli_query($mycon,$usql);

			$previous_balance = $total;
		}
 	}

	function fetchingDataAdvance($mycon,$cm_id,$a_expense_id,$d_expense_id)
	{
		// Fetching data of movement
		$dq    = mysqli_query($mycon,'SELECT datee,lot_of,container_size,coa_id,to_yard_id,index_number FROM container_movement WHERE cm_id='.$cm_id);
		$rdq   = mysqli_fetch_array($dq); 
		$datee = $rdq['datee'];
		$lot   = $rdq['lot_of'].'x'.$rdq['container_size'];
		$index_number = $rdq['index_number'];

		// Fetching chart of account
		$cq  = mysqli_query($mycon,'SELECT full_form FROM chart_of_account WHERE coa_id='.$rdq['coa_id']);
		$rcq = mysqli_fetch_array($cq);
		$chart_of_account = $rcq['full_form'];

		// Fetching to destination
		$tdq  = mysqli_query($mycon,'SELECT full_form FROM yard WHERE yard_id='.$rdq['to_yard_id']);
		$rtdq = mysqli_fetch_array($tdq);
		$to_yard = $rtdq['full_form'];

		$description = $lot.'\n To Destination :'.$to_yard.' \n Party Name:'.$chart_of_account.' \n Index Number: '.$index_number;


		// Fetching Total Advance
		$tadq  = mysqli_query($mycon,'SELECT SUM(advance) as total_advance FROM container_entry where status=1 AND cm_id='.$cm_id);
		$rtadq = mysqli_fetch_array($tadq);
		$total_advance = $rtadq['total_advance'];

		//Expense SQL CODE 
		$advance_esql = "UPDATE expenses SET amount=$total_advance , description='$description' WHERE expense_id=".$a_expense_id;		
		// echo $advance_esql;

		$eq = mysqli_query($mycon,$advance_esql);
		
		// $previous_balance_q = mysqli_query($mycon,"SELECT current_balance from exin WHERE datee<='$datee' AND expense_id!=$a_expense_id AND expense_id!=$d_expense_id ORDER BY exin_id DESC limit 1");
		// $r_previous_balance = mysqli_fetch_array($previous_balance_q);

		// $previous_balance = $r_previous_balance['current_balance'];
		// $current_balance  = $previous_balance - $total_advance;

		// $q1 = mysqli_query($mycon,"UPDATE exin SET previous_balance=$previous_balance , current_balance=$current_balance WHERE expense_id=".$a_expense_id);
		
	}

	function fetchingDataDiesel($mycon,$cm_id,$expense_id)
	{
		// Fetching data of movement
		$dq    = mysqli_query($mycon,'SELECT datee,lot_of,container_size,coa_id,to_yard_id,index_number FROM container_movement WHERE cm_id='.$cm_id);
		$rdq   = mysqli_fetch_array($dq); 
		$datee = $rdq['datee'];
		$lot   = $rdq['lot_of'].'x'.$rdq['container_size'];
		$index_number = $rdq['index_number'];

		// Fetching chart of account
		$cq  = mysqli_query($mycon,'SELECT full_form FROM chart_of_account WHERE coa_id='.$rdq['coa_id']);
		$rcq = mysqli_fetch_array($cq);
		$chart_of_account = $rcq['full_form'];

		// Fetching to destination
		$tdq  = mysqli_query($mycon,'SELECT full_form FROM yard WHERE yard_id='.$rdq['to_yard_id']);
		$rtdq = mysqli_fetch_array($tdq);
		$to_yard = $rtdq['full_form'];

		$description = $lot.'\n To Destination :'.$to_yard.' \n Party Name:'.$chart_of_account.' \n Index Number: '.$index_number;


		// Fetching Total Diesel
		$tadq  = mysqli_query($mycon,'SELECT SUM(diesel) as total_diesel FROM container_entry where status=1 AND cm_id='.$cm_id);
		$rtadq = mysqli_fetch_array($tadq);
		$total_diesel  = $rtadq['total_diesel'];

		//Expense SQL CODE 		
		$diesel_esql  = "UPDATE expenses SET amount=$total_diesel ,  description='$description' WHERE expense_id=".$expense_id;		
		// echo $diesel_esql;

		$eq = mysqli_query($mycon,$diesel_esql);

		// $previous_balance_q = mysqli_query($mycon,"SELECT current_balance from exin WHERE datee<='$datee' AND expense_id!=$expense_id ORDER BY exin_id DESC limit 1");
		// $r_previous_balance = mysqli_fetch_array($previous_balance_q);

		// $previous_balance = $r_previous_balance['current_balance'];
		// $current_balance  = $previous_balance - $total_diesel;

		// $q1 = mysqli_query($mycon,"UPDATE exin SET previous_balance=$previous_balance , current_balance=$current_balance WHERE expense_id=".$expense_id);

		// updateData($mycon,$datee);
	}

	
	$ce_id 			  = $_GET['ce_id'];
	$container_number = $_GET['container_number'];
	$vehicle_id       = $_GET['vehicle_id'];
	$advance          = $_GET['advance'];
	$diesel 		  = $_GET['diesel'];
	$rent 			  = $_GET['rent'];
	$balance 		  = $_GET['balance'];
	$color 			  = $_GET['color'];
	$mr_charges 	  = $_GET['mr_charges'];
	$remarks 		  = $_GET['remarks'];

	$q = mysqli_query($mycon,"UPDATE container_entry SET container_number='$container_number' , vehicle_id=$vehicle_id , advance=$advance , diesel=$diesel , rent=$rent , balance=$balance , color='$color' , mr_charges=$mr_charges , remarks='$remarks'  WHERE ce_id=$ce_id ");

	if(mysqli_affected_rows($mycon))
	{
		// Fetching cm_id of movement
		$cmq   = mysqli_query($mycon,"SELECT cm_id FROM container_entry WHERE ce_id=".$ce_id);
		$rcmq  = mysqli_fetch_array($cmq);
		$cm_id = $rcmq['cm_id']; 

		$expense_advance = NULL;
		$expense_diesel  = NULL;

		$q1 = mysqli_query($mycon,"SELECT * FROM expenses WHERE dd_id=5  AND cm_id=".$cm_id);

		if( $r1 = mysqli_fetch_array($q1) )
		{
			$expense_advance = $r1['expense_id'];
		}


		$q2 = mysqli_query($mycon,"SELECT * FROM expenses WHERE  dd_id=8 AND cm_id=".$cm_id);

		if( $r2 = mysqli_fetch_array($q2) )
		{
			$expense_diesel  = $r2['expense_id'];
		}

		if( $expense_advance != NULL &&  $expense_diesel != NULL )
		{
			fetchingDataAdvance($mycon,$cm_id,$expense_advance,$expense_diesel);
			fetchingDataDiesel($mycon,$cm_id,$expense_diesel);
		}

		echo "true";
	}

?>