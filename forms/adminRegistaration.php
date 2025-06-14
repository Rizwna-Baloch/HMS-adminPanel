<?php

$conn = new mysqli('localhost', 'root', '', 'hyderabadhospital');

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "INSERT INTO user (Name, Email, Password) values ('$name', '$email', '$password')";
	$result = mysqli_query($conn, $sql);
}

// if($result){
// 	echo "data submitted succesfully";
// }
// else{
// 	echo("data not sumitted!");
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin-Registration</title>
	<link href="style.css" rel="stylesheet">
</head>
<body background="beds.jpeg">

<script>
function validation()
{
var name=document.getElementById("name").value;
var email=document.getElementById("email").value;
var password=document.getElementById("password").value;

if(name == ""|| email == "" || password == ""){
	alert("All fields are menditary!");
return false;

}

else {
	
	return true;
		exit;
    } 

}

		</script>


		
<div class="sign-up-container">
				<form onsubmit="validation()" method="post">

					<div class="signup-heading">Registration</div>
				
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Name<span class="required error"></span>
							</div>
							<input class="input-box-330" type="text"
								id="name" name="name">
						</div>
					</div>
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
						<input type="submit" value="Register" name="submit">
					</div>
					<center>
						<p>Already have an account then <a href="login.php" id="link"> Login </a> </p>
</center>
				</form>
			</div>
		</div>
</body>
</html>