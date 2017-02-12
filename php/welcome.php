<?php
	session_start();
	echo "hi user ".$_SESSION['curr_user'];

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

	$sql3 = "SELECT * FROM ".$_SESSION['curr_user']." ;";
	//echo $sql3;
	
	$q3 = $conn->query($sql3);
	if($q3->num_rows > 0 ){
		while($row = $q3->fetch_assoc()){
			echo "<p>".$row['Link']."</p><p>".$row['Description']."</p>";
		}	
	}

?>
<!DOCTYPE html>
	<html>
	<head>
		<title>Save link, Save world</title>
	</head>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<table>
				<tr>
					<td>Link:</td>
					<td><input type="text" name="link"></td>
				</tr>
				<tr>
					<td>Description:</td>
					<td><textarea rows="3" cols="17" name="desc"></textarea></td>
				</tr>
				<tr>
					<td><input type="submit" value="Save"></td>
				</tr>
			</table>
		</form>			
	</body>
</html>