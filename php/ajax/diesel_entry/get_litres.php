<?php 

	require '../../connection.php';

	$json['limit_litre']="0";

	$from_yard = $_GET['from_yard'];
	$to_yard = $_GET['to_yard'];

	$q = mysqli_query($mycon,"SELECT limit_litre from diesel_limit where status=1 and from_yard=$from_yard and to_yard =$to_yard");
	while($r = mysqli_fetch_array($q))
	{	
		$json['limit_litre'] = $r['limit_litre'];
	}

	echo json_encode($json);

?>