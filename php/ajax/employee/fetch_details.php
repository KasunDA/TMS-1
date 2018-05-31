<?php 

	require '../../connection.php';

	$json=NULL;
	$employee_id = $_GET['employee_id'];

	$q = mysqli_query($mycon,'SELECT * FROM employee WHERE status=1 and employee_id='.$employee_id);

	if($r = mysqli_fetch_array($q))
	{
		$json['employee_id'] = $r['employee_id'];  
		$json['name'] = $r['name'];
		$json['cnic'] = $r['cnic'];
		$json['cnic_valid'] = $r['cnic_valid'];
		$json['father_name'] = $r['father_name'];
		$json['dob'] = $r['dob'];
		$json['email'] = $r['email'];
		$json['address'] = $r['address'];

		$json['e_contact_name1'] = $r['e_contact_name1'];
		$json['relation1'] = $r['relation1'];
		$json['e_contact1'] = $r['e_contact1'];

		$json['e_contact_name2'] = $r['e_contact_name2'];
		$json['relation2'] = $r['relation2'];
		$json['e_contact2'] = $r['e_contact2'];

		$json['qualification'] = $r['qualification'];
		$json['institute_name'] = $r['institute_name'];
		$json['subject'] = $r['subject'];
		$json['contact'] = $r['contact'];
		$json['joining_date'] = $r['joining_date'];


		$q1 = mysqli_query($mycon,'SELECT * FROM designation WHERE dg_id='.$r['dg_id']);
		$r1 = mysqli_fetch_array($q1);

		$json['designation'] = $r1['designation'];
		$json['dg_id'] = $r['dg_id'];

		$json['ereferences'] = $r['ereferences'];
		$json['img_signature'] = $r['img_signature'];
		$json['img_picture'] = $r['img_picture'];
	}

	else
	{

		$json['employee_id'] 	 = "NULL";  
		$json['name']        	 = "NULL";
		$json['cnic']        	 = "NULL";
		$json['cnic_valid']  	 = "NULL";
		$json['father_name'] 	 = "NULL";
		$json['dob'] 		 	 = "NULL";
		$json['email'] 		 	 = "NULL";
		$json['address'] 	 	 = "NULL";
		$json['e_contact_name1'] = "NULL";
		$json['relation1'] 		 = "NULL";
		$json['e_contact1'] 	 = "NULL";
		$json['e_contact_name2'] = "NULL";
		$json['relation2'] 		 = "NULL";
		$json['e_contact2'] 	 = "NULL";
		$json['qualification']   = "NULL";
		$json['institute_name']  = "NULL";
		$json['subject'] 		 = "NULL";
		$json['contact'] 		 = "NULL";
		$json['joining_date']    = "NULL";
		$json['designation'] 	 = "NULL";
		$json['dg_id'] 			 = "NULL";
		$json['ereferences'] 	 = "NULL";
		$json['img_signature']   = "NULL";
		$json['img_picture'] 	 = "NULL";
	}

	echo json_encode($json);

?>