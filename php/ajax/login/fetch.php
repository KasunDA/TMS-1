<?php 

	require '../../connection.php';

	$json=NULL;

	$q = mysqli_query($mycon,'SELECT * FROM login WHERE status=1 ORDER BY login_id DESC ');
	$n  = 0;
	while($r = mysqli_fetch_array($q))
	{
		$json[$n]['login_id'] = $r['login_id']; 
		$json[$n]['name'] = $r['name'];  
		$json[$n]['username'] = $r['username'];
		$json[$n]['role'] = $r['role'];
		$json[$n]['pass'] = $r['pass'];

		$n++;
	}

	echo json_encode($json);

?>