<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'hyderabadhospital');

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM user WHERE Email ='$email' && Password = '$password'";

	$result = mysqli_query($conn, $sql);
	// if ($result){
	// echo "data fatched successfully";
	// } else {
	// 	echo "data cont fatched!";
	// }

	if (mysqli_num_rows($result) > 0) {
		$SESSION['email'] = $email;
		header('location: ../index.php');
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin-Login</title>
	<link href="style.css" rel="stylesheet">
</head>
<body background="beds.jpeg">

<script>
function validation()
{ 

var email=document.getElementById("email").value;
var password=document.getElementById("password").value;

if(email == "" || password == ""){
	alert("Both feilds are menditary!");

	return false;
}
}

		</script>


		<div class="sign-up-container">
				<form onsubmit="validation()" method="post">

					<div class="signup-heading">Admin Login</div>
				
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Email<span class="required error"></span>
							</div>
							<input class="input-box-330" type="email" id="email" name="email">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Password<span class="required error"></span>
							</div>
							<input class="input-box-330" type="password" id="password" name="password">
						</div>
					</div>
					<div class="row">
						<input type="submit" value="Login" name="submit">
					</div>
					<center>
						<p>Don't have an account then <a href="adminRegistaration.php" id="link"> register </a> </p>
</center>
				</form>
			</div>
		</div>
</body>
</html>