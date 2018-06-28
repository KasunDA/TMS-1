<?php

	require '../connection.php';

	function updateData($mycon,$datee)
	{
		echo '\n Updating all data and date is '.$datee;

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

 	updateData($mycon,'2018-05-13');