<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "tc");

if(isset($_POST['submit_button'])) {
$first_name = strip_tags($_POST['first_name']);
	$first_name = ucfirst(strtolower($first_name));
	//last name
	$last_name = strip_tags($_POST['last_name']);
	$last_name = ucfirst(strtolower($last_name));
	//email
	$email = strip_tags($_POST['email']);
	//password
	$password = strip_tags($_POST['pass_1']);

	$username = $first_name . " " . $last_name;
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="512x512" href="icons/icon.png">
    <link rel="icon" href="icons/icon.png">
    <link rel="stylesheet" type="text/css" href="navreg.css">
    <link rel="stylesheet" type="text/css" href="reg.css">
    <script src="reg.js" type="text/javascript"></script>	
    <title>Tasteful Cooking</title>
</head>
<body id="body1">
<div id="bg"></div>
<nav id="navbar">
	<div id="topbg">
		<span id="logospan"><img onclick="location.reload()" id="logo" src="icons/tc.png"></span>
		<center>
			<h1 id="titlelogo">Register</h1>
		</center>
	</div>
</nav>
<form id="form" action="#registeraction" method="POST" autocomplete="off">
	<div id="formdiv">
		<center>
			<label>First Name</label>
			<br>
			<input class="searchinput" type="text" name="first_name" value="<?php
			if(isset($_POST['submit_button'])) {
				echo $first_name;
			} else {
				echo '';
			}
			?>">
			<br>
			<label>Last name</label>
			<br>
			<input class="searchinput" type="text" name="last_name" value="<?php
			if(isset($_POST['submit_button'])) {
				echo $last_name;
			} else {
				echo '';
			}
			?>">
			<br>
			<label>Email</label>
			<br>
			<input class="searchinput" type="text" name="email" value="<?php
			if(isset($_POST['submit_button'])) {
				echo $email;
			} else {
				echo '';
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
			<b style="position: relative; top: 5px;" id="back">Return To <a href="login.php">Login</a></b>
			<br>
<?php 
$passError = "<b style='position: relative; color: red; top: 5px;'> Passwords do not match!</b><style>#form{height:285px;}</style>";

$emailError1 = "<b style='position: relative; color: red; top: 5px;'> Invalid email format!</b><style>#form{height:285px;}</style>";

$emailError2 = "<b style='position: relative; color: red; top: 5px;'> Email already in use!</b><style>#form{height:285px;}</style>";

if(isset($_POST['submit_button'])) {

	//first name
	$first_name = strip_tags($_POST['first_name']);
	$first_name = ucfirst(strtolower($first_name));
	//last name
	$last_name = strip_tags($_POST['last_name']);
	$last_name = ucfirst(strtolower($last_name));
	//email
	$email = strip_tags($_POST['email']);
	//password
	$password = strip_tags($_POST['pass_1']);

	$password = md5($password);

	$username = $first_name . " " . $last_name;

	$uname = $first_name . " " . $last_name;

	$date = date("m-d-Y");

	$prorand = rand(1,3);

	if ($prorand = 1) {
		$pro_img = 'profiles/blue.png';
	} else if ($prorand = 2) {
		$pro_img = 'profiles/yellow.png';
	} else if ($prorand = 3) {
		$pro_img = 'profiles/orange.png';
	}

	$_SESSION['$first_name'] = $first_name;

	$_SESSION['$last_name'] = $last_name;

	$_SESSION['$email'] = $email;

	$_SESSION['$password'] = $password;

	$_SESSION['$username'] = $username;

	$_SESSION['$date'] = $date;

	$_SESSION['$pro_img'] = $pro_img;

	$_SESSION['$username'] = $username;

	$unamecheck = mysqli_query($db, "SELECT username FROM `users` WHERE username='$username'");

	$row = 0;

	while (mysqli_num_rows($unamecheck) != 0) {
		$row++;
		$username = $username . '_' . $row;
		$unamecheck = mysqli_query($db, "SELECT username FROM `users` WHERE username='$username'");
	}
	
	if ($row > 0) {
		$username = $uname . '_' . $row;
	}

	$emailcheck = mysqli_query($db, "SELECT email FROM `users` WHERE email='$email'");

	if ($password == true) {
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$email = filter_var($email, FILTER_VALIDATE_EMAIL);
			if (mysqli_num_rows($emailcheck) == 0) {
				$sql = mysqli_query($db, "INSERT INTO `users` VALUES (' ','$first_name', '$last_name', '$username', '$password', '$email', '$date', '$pro_img', '0', '0', 'no', '0')");
				if ($sql == true) {
					echo "<span>Your accout has succesfully been created. <a href='login.php'>Log in?</a></span><style>#form{height:285px;}</style>";
				}
			} else {
				echo $emailError2;
			}
		} else {
			echo $emailError1;
		}
	} else {
		echo $passError;
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