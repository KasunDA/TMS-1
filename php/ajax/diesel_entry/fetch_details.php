<?php 

	require '../../connection.php';
	date_default_timezone_set("Asia/Karachi");

	$json=NULL;
	$date = date('Y-m-d');

	$q = mysqli_query($mycon,"Select litre_rate,SUM(litres) as total_litres,SUM(extra_litres) as total_extra_litres , SUM(total) as total_price  from diesel_entry where status =1 and datee='".$date."' ORDER By de_id DESC limit 1");
	$n  = 0;
	while($r = mysqli_fetch_array($q))
	{	
		$json[$n]['litre_rate'] = $r['litre_rate'];
		$json[$n]['total_litres'] = $r['total_litres'];
		$json[$n]['total_extra_litres'] = $r['total_extra_litres'];
		$json[$n]['total_price'] = $r['total_price'];

		$n++;
	}

	echo json_encode($json);

?>