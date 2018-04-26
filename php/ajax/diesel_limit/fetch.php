<?php 

	require '../../connection.php';

	$json=NULL;

	$q = mysqli_query($mycon,'SELECT * FROM diesel_limit WHERE status=1 ORDER BY dl_id DESC ');
	$n  = 0;
	while($r = mysqli_fetch_array($q))
	{
		$json[$n]['dl_id'] = $r['dl_id'];  

		$fq = mysqli_query($mycon,'SELECT short_form,full_form from yard where yard_id ='.$r['from_yard']);

		if($fq)
		{
			$rfq = mysqli_fetch_array($fq);
			$json[$n]['from_yard_id'] = $r['from_yard'];
			$json[$n]['from_yard'] = $rfq['short_form'];
			$json[$n]['from_yard_full'] = $rfq['full_form'];		
		}


		$tq = mysqli_query($mycon,'SELECT short_form,full_form from yard where yard_id ='.$r['to_yard']);

		if($tq)
		{
			$rtq = mysqli_fetch_array($tq);
			$json[$n]['to_yard_id'] = $r['to_yard'];
			$json[$n]['to_yard'] = $rtq['short_form'];
			$json[$n]['to_yard_full'] = $rtq['full_form'];		
		}
		

		$json[$n]['limit_litre'] = $r['limit_litre'];

		$n++;
	}

	echo json_encode($json);

?>