<?php

	$host = 'localhost';
	$username = 'guest';
	$password = 'guest@123';
	$dbname = 'lsdata';

	$conn = new mysqli($host,$username,$password,$dbname);
	if($conn->connect_error){
		die("There is some problem ".$conn->connect_error);
	}else{
		echo "Connection Successful";
	}

?>

