<?php 
session_start();
	/* $_SESSION['$first_name'] = $_SESSION['$first_name'];

	$_SESSION['$last_name'] = $_SESSION['$last_name'];

	$_SESSION['$email'] = $_SESSION['$email'];

	$_SESSION['$password'] = $_SESSION['$password'];

	$_SESSION['$username'] = $_SESSION['$username'];

	$_SESSION['$date'] = $_SESSION['$date'];

	$_SESSION['$pro_img'] = $_SESSION['$pro_img']; */	
if(isset($_POST['submit_button'])) {
	$email = strip_tags($_POST['email']);

	$password = strip_tags($_POST['pass_1']);

	$password = md5($password);
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="512x512" href="icons/icon.png">
    <link rel="icon" href="icons/icon.png">
    <link rel="stylesheet" type="text/css" href="navlog.css">
    <link rel="stylesheet" type="text/css" href="log.css">
    <script src="reg.js" type="text/javascript"></script>	
    <title>Tasteful Cooking</title>
</head>
<body id="body1">
<div id="bg"></div>
<nav id="navbar">
	<div id="topbg">
		<span id="logospan"><img onclick="location.reload()" id="logo" src="icons/tc.png"></span>
		<center>
			<h1 id="titlelogo">Login</h1>
		</center>
	</div>
</nav>
<form id="form" action="#registeraction" method="POST" autocomplete="off">
	<div id="formdiv">
		<center>
			<label>Email</label>
			<br>
			<input class="searchinput" type="text" name="email" value="<?php
			if(isset($_POST['submit_button'])) {
				echo $email;
			}
			?>">
			<br>
			<label>Password</label>
			<br>
			<input class="searchinput" name="pass_1" type="password" value="<?php
			if(isset($_POST['submit_button'])) {
				echo $password;
			} else {
				echo '';
			}
			?>">
			<br>
			<input class="reg" type="submit" name="submit_button" value="Register">
			<br>
			<span style="position: relative; top: 11px; font-size: 17px;"><b>Don't have an account? <a href="register.php">Create One.</a></b></span>
<?php
$db = mysqli_connect("localhost", "root", "", "tc");

$error = "<br><span style='position: relative; top: 10px; font-family: sans-serif; color: red; font-size: 15px;'><b>Incorrect email and/or password</b></span><style>#form{height: 212px;}</style>";

if(isset($_POST['submit_button'])) {
	$check = mysqli_query($db, "SELECT email FROM `users` WHERE email='$email' AND password ='$password'");

	$checkrows = mysqli_num_rows($check);
	if ($email != null && $password != null) {	
		if ($checkrows == 1) {
			$dbrow = mysqli_fetch_array($check);
			$email = $dbrow['email'];
			$_SESSION['$email'] = $email;
			header('Location: index.php');
			exit();
		} else {
			echo($error);
		}
	} else {
		echo $error;
	}
}
?>
		</center>
	</div>
</form>
<img id="sp" src="images/sp3.png">
<img id="egg" src="images/egg.png">
</body>
</html>