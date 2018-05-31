<?php 

	require '../../connection.php';

	$json=NULL;

	$q = mysqli_query($mycon,'SELECT * FROM employee WHERE status=1 ORDER BY employee_id DESC ');
	$n  = 0;
	while($r = mysqli_fetch_array($q))
	{
		$json[$n]['employee_id'] = $r['employee_id'];  
		$json[$n]['name'] = $r['name'];
		$json[$n]['cnic'] = $r['cnic'];
		$json[$n]['father_name'] = $r['father_name'];
		$json[$n]['dob'] = $r['dob'];
		$json[$n]['email'] = $r['email'];
		$json[$n]['contact'] = $r['contact'];
		$json[$n]['address'] = $r['address'];

		$q1 = mysqli_query($mycon,'SELECT * FROM designation WHERE dg_id='.$r['dg_id']);
		$r1 = mysqli_fetch_array($q1);

		$json[$n]['designation'] = $r1['designation'];
		$json[$n]['dg_id'] = $r['dg_id'];

		$n++;
	}

	echo json_encode($json);

?>