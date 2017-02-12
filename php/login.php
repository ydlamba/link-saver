<?php

	include 'connect.php';

	function test_input($data){
		$data = stripslashes($data);
		$data = trim($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$log_uname = test_input($_POST['log_uname']);
		$log_pass = test_input($_POST['log_pass']);

		//echo $log_uname.$log_pass;
		
		$sql = "SELECT ID FROM users WHERE Username = '$log_uname' AND Password = '$log_pass'";
		//echo $sql;
		
		$result = $conn->query($sql);

		if($result->num_rows == 1){
			$rows=$result->fetch_assoc();
			//echo $rows["ID"];
			session_start();
			$_SESSION['curr_user']=$log_uname;
			header('location:welcome.php');
		}else{
			echo "Invalid Username or Password";
		}
		
	}

?>