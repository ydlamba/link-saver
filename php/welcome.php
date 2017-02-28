

<?php
	session_start();
	echo "<p class='welcome'>Welcome ".$_SESSION['curr_user']."</p><br>";

	include 'connect.php';

	$link = $_POST['link'];
	$desc = $_POST['desc'];
	//echo $link . $desc;
	$sql1 = "CREATE TABLE IF NOT EXISTS ".$_SESSION['curr_user']." (ID int NOT NULL AUTO_INCREMENT PRIMARY KEY,Link Text NOT NULL,Description Text);";
	//echo $sql1;
	$q1 = $conn->query($sql1);
	
	$sql2 = "INSERT INTO ".$_SESSION['curr_user']." (Link,Description) VALUES(?,?);";
	//echo $sql2;
	
	$q2 = $conn->prepare($sql2);
	$q2->bind_param("ss",$link,$desc);
	$q2->execute();

	echo "<div class='fdata'><table><tr><th>Link</th><th>Description</th></tr>";
	$sql3 = "SELECT * FROM ".$_SESSION['curr_user']." ;";
	//echo $sql3;
	
	$q3 = $conn->query($sql3);
	if($q3->num_rows > 0 ){
		while($row = $q3->fetch_assoc()){
			//echo "<td>".$row['Link']."</td><td>".$row['Description']."</td>"
			echo "<tr><td>".$row['Link']."</td><td> ".$row['Description']."</td></tr>";
		}	
	}
	echo "</table></div>";

?>


<!DOCTYPE html>
	<html>
	<head>
		<title>Save link, Save world</title>
		<link rel="stylesheet" type="text/css" href="../style/welcome.css">
		<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
		<link rel="shortcut icon" type="image/png" href="favicon.png">
	</head>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<table>
				<tr>
					<td><input type="text" name="link" placeholder="Link"></td>
				</tr>
				<tr>
					<td><textarea rows="3" cols="17" name="desc" placeholder="Description"></textarea></td>
				</tr>
				<tr>
					<td><input type="submit" value="Add" class="add"></td>
				</tr>
			</table>
		</form>		
		<button class="logout"><a href="logout.php">Logout</a></button>	
	</body>
</html>
