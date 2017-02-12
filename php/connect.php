<?php

$host = "localhost";
$dbname = "lsdata";
$username = "guest";
$password = "guest@123";

try{
	$conn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
}catch(PDOExpcetion $e){
	die("There might some problem".$e->getMessage());
}

?>

