<?php 

require '../../connection.php';
$json = NULL;

$q = mysqli_query($mycon,'SELECT SUM(a.amount) as total_amount , a.cmp_id, b.name FROM income a , company b where a.dd_id=2 and a.cmp_id = b.cmp_id GROUP BY(b.name)');
$n = 0;

while ( $r = mysqli_fetch_array($q)) 
{
	$json[$n]['cmp_id'] = $r['cmp_id'];
	$json[$n]['cmp_name'] = $r['name'];

	$q1 = mysqli_query($mycon,"SELECT SUM(amount) as paind_amount from expenses where cmp_id=".$r['cmp_id']);
	
	$r1 = mysqli_fetch_array($q1);

	$json[$n]['amount'] = $r['total_amount'] - $r1['paind_amount'];

	$n++;
}

echo json_encode($json);
?>