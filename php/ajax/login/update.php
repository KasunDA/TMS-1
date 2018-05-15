<?php 

	require '../../connection.php';
	
	$login_id = $_POST['login_id'];
	$name = $_POST['name'];
	$username = $_POST['username'];
	$role = $_POST['role'];
	$pass = $_POST['pass'];

	if(isset($login_id) && isset($name) && isset($username) && isset($role) && isset($pass) )
	{

		if($role == NULL)
		{
			$role = 'admin';
		}
		
		$q = mysqli_query($mycon,"UPDATE login SET name='$name', username='$username' , role = '$role' , pass=MD5('$pass') WHERE login_id=$login_id ");

		if(mysqli_affected_rows($mycon))
		{
			echo "true";
		}
	}
?>