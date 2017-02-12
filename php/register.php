<?php 
	
	include 'connect.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$uname = $_POST['uname'];
		$pass = $_POST['pass'];
		
		$sql = "INSERT INTO users (Name,Email,Username,Password) VALUES (?,?,?,?)";
		
		$q = $conn->prepare($sql);
		$q->execute(array($name,$email,$uname,$pass));
	}

echo $name.$email.$uname.$pass;






?>