<?php 

require '../../connection.php';
$json = NULL;
$cmp_id =  $_GET['cmp_id'];


$q = mysqli_query($mycon,"SELECT a.*,b.name FROM  income a , company b where a.dd_id=2 and a.cmp_id = b.cmp_id and a.cmp_id=".$cmp_id);
$n = 0;

while ( $r = mysqli_fetch_array($q)) 
{
	$json[$n]['income_id'] = $r['income_id'];
	$json[$n]['datee'] = $r['datee'];
	$json[$n]['cmp_name'] = $r['name'];
	$json[$n]['description'] = $r['description'];
	$json[$n]['amount'] = $r['amount'];

	$n++;
}

echo json_encode($json);
?>