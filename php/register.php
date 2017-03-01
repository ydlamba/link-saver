<?php 
	
	include 'connect.php';

	function test_input($data){
		$data = stripslashes($data);
		$data = trim($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$name = test_input($_POST['name']);
		$email = test_input($_POST['email']);
		$uname = test_input($_POST['uname']);
		$pass = test_input($_POST['pass']);
		
		$sql = "INSERT INTO users (Name,Email,Username,Password) VALUES (?,?,?,?)";
		
		$q = $conn->prepare($sql);
		$q->bind_param("ssss",$name,$email,$uname,$pass);
		$q->execute();
		
		echo " User Successfully created";

		$q->close();
	}



?>