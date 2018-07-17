<?php 

require '../../connection.php';
$json = NULL;
$sql  = "";

$name =  $_GET['name'];

if( $_GET['vehicle_id'] != NULL && $_GET['vehicle_id'] != 0   )
{
	$vehicle_id =  $_GET['vehicle_id'];
	$sql = "SELECT * FROM expenses where dd_id=2  AND status=1 AND vehicle_id=".$vehicle_id." and name='".$name."'";
}
else
{
	$borrower_id =  $_GET['borrower_id'];
	$sql = "SELECT * FROM expenses where dd_id=2 AND status=1 AND borrower_id=".$borrower_id;	
}

$q = mysqli_query($mycon,$sql);
$n = 0;

while ( $r = mysqli_fetch_array($q) ) 
{
	$json[$n]['expense_id']  = $r['expense_id'];
	$json[$n]['datee'] 	 	 = $r['datee'];
	$json[$n]['description'] = $r['description'];
	$json[$n]['amount'] 	 = $r['amount'];

	$n++;
}

echo json_encode($json);
?>