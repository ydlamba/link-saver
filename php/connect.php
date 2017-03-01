<?php

	$host = 'host';
	$username = 'username';
	$password = 'password';
	$dbname = 'dbname';

	$conn = new mysqli($host,$username,$password,$dbname);
	if($conn->connect_error){
		die("There is some problem. Contact yashdev18@gmail.com ".$conn->connect_error);
	}

?>

