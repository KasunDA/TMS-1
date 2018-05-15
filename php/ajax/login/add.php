<?php 

	require '../../connection.php';

	$name = $_POST['name'];
	$username = $_POST['username'];
	$role = $_POST['role'];
	$pass = $_POST['pass'];

	if(isset($name) && isset($username) && isset($role) && isset($pass) )
	{

		$q = mysqli_query($mycon,"INSERT INTO login(name,username, pass, role) VALUES('$name','$username',MD5('$pass'),'$role') ");

		if(mysqli_affected_rows($mycon))
		{
			echo "true";
		}
	
	}

	

?>