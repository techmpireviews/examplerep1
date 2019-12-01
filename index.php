<?php 
session_start();

$db = mysqli_connect("localhost", "root", "", "tc");

$email = $_SESSION['$email'];

$selectUsername = mysqli_query($db, "SELECT username FROM `users` WHERE email='$email'");

$usernameArray = mysqli_fetch_array($selectUsername);

$username = $usernameArray['username'];

$selectImg = mysqli_query($db, "SELECT profileImg FROM `users` WHERE email='$email'");

$profileImgArray = mysqli_fetch_array($selectImg);

$profileImg = $profileImgArray['profileImg'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="512x512" href="icons/icon.png">
    <link rel="icon" href="icons/icon.png">
    <link rel="stylesheet" type="text/css" href="nav.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="script.js" type="text/javascript"></script>	
    <title>Tasteful Cooking</title>
</head>
<body id="body1">
	<div id="topbar">
		<button onclick="navOpen()" id="opennavbarbtn">☰</button>
	</div>
	<nav id="nav1">
		<div id="navtop">
			<button onclick="navClose()" id="navbtn">☰</button>
			<img id="navProfileImage" src="<?php echo $profileImg; ?>">
			<img id="navicon" src="icons/tc.png">
		</div>
		<ul id="navul">
			<li class="navli"><a style="position: relative; top: 8px; right: 5px;" href="index.php"><img class="naviconimg" src="icons/home.png"></a><a style="position: relative; top: -1px;" href="index.php">Home</li>
			<li class="navli"><a style="position: relative; top: 10px; right: 5px;" href="create.php"><img class="naviconimg" src="icons/upload.png"></a><a style="position: relative; top: -1px;" href="create.php">Create Recipe</li>
			<li class="navli"><a style="position: relative; top: 7px; right: 5px;" href="profile.php"><img class="naviconimg" src="icons/profileiconimg.png"></a><a  style="position: relative; top: -2px;"href="profile.php">Profile</li>
			<li class="navli"><a style="position: relative; top: 9px; right: 5px;" href="settings.php"><img class="naviconimg" src="icons/settings.png"></a><a style="position: relative; top: -1px;" href="settings.php">Settings</li>
		</ul>
	</nav>
</body>
</html>