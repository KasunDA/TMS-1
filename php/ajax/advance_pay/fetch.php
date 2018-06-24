<?php 

require '../../connection.php';
$json = NULL;
$n = 0;
$sql = '';

$q = mysqli_query($mycon,'SELECT expense_id,datee,name,borrower_id,description,SUM(amount) as total_amount , vehicle_id FROM expenses where dd_id=2 and paid_status=0 AND cmp_id IS NULL AND cm_id IS NULL AND bike_id IS NULL  AND status=1 GROUP BY name,borrower_id');

while ( $r = mysqli_fetch_array($q) ) 
{
	if( $r['vehicle_id'] != NULL &&  $r['name'] != NULL )
	{
		$json[$n]['borrower_id'] = "";

		$json[$n]['vehicle_id'] = $r['vehicle_id'];
		
		
		$vq1  = mysqli_query($mycon,'SELECT vehicle_number FROM vehicle WHERE vehicle_id='.$r['vehicle_id']);
		$rq1 = mysqli_fetch_array($vq1);
		$json[$n]['vehicle_number'] = $rq1['vehicle_number'];	


		$sql = "SELECT SUM(amount) as received_amount from income where vehicle_id=".$r['vehicle_id']." and name='".$r['name']."' ";
		
	}
	else if ( $r['borrower_id'] != NULL  &&  $r['name'] != NULL )
	{
		$json[$n]['vehicle_id'] = "";
		$json[$n]['vehicle_number'] = "";

		$json[$n]['borrower_id'] = $r['borrower_id'];
		
		// $bq1  = mysqli_query($mycon,'SELECT name FROM borrower WHERE borrower_id='.$r['borrower_id']);
		// $rq1 = mysqli_fetch_array($bq1);
		

		$sql = "SELECT SUM(amount) as received_amount from income where borrower_id=".$r['borrower_id'];
	}
	
	$json[$n]['name'] = $r['name'];

	$q1 = mysqli_query($mycon,$sql);
	$r1 = mysqli_fetch_array($q1);

	$json[$n]['amount'] = $r['total_amount'] - $r1['received_amount'];

	$n++;
}

echo json_encode($json);
?>