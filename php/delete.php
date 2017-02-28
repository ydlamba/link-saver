<?php 
 	include 'connect.php';

 	session_start();
 	$sql="DELETE FROM ".$_SESSION['curr_user']." WHERE ID=".$_POST['todelete'];
 	echo $sql;
 	$conn->query($sql); 

?>