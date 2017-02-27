<!DOCTYPE html>
<html>
	<head>
		<title>Save link, Save data</title>
		<link rel="stylesheet" type="text/css" href="style/main.css">
		<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
		<link rel="shortcut icon" type="image/png" href="favicon.png">
	</head>
	<body>
		<div class="lmain">
		 	<?php 
				
				include 'php/connect.php';

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
					
					echo "<span class='success'>User Successfully created<span>";

					$q->close();
				}

			?>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<table>
					<tr>	
						<td><input type="text" name="name" id="name" placeholder="Name"></td>
					</tr>
					<tr>
						<td><input type="email" name="email" id="email" placeholder="Email"></td>
					</tr>
					<tr>
						<td><input type="text" name="uname" id="uname" placeholder="Username"></td>
					</tr>
					<tr>
						<td><input type="password" name="pass" id="pass" placeholder="Password"></td>
					</tr>
					<tr>
						<td><input type="submit" value="Register" class="btn"></td>
					</tr>
				</table>
			</form>
		</div>
		<hr>
		<div class="rmain">
			<form action="php/login.php" method="post" id="login">
				<table>
					<tr>
						<td><input type="text" name="log_uname" id="log_uname" placeholder="Username"></td>
					</tr>
					<tr>
						<td><input type="password" name="log_pass" id="log_pass" placeholder="Password"></td>
					</tr>
					<tr>
						<td><input type="submit" value="Login" class="btn"></td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>