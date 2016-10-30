<?php
session_start();
include "User.php";
$user = new User();
if ($_SESSION['id']) $uid = $_SESSION['id'];
if (isset($_POST['submit1']))
{
	$login = $user->login($_POST['s1'],$_POST['s2']);
	header("location:room.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Gallery</title>
	<link rel="stylesheet" href="style\gallery.css">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<script src="script\jquery-1.11.3.js"></script>
	<script src="script\jquery-ui.js"></script>
	<script src="script\main.js"></script>
	<script src="script\jQuery.scrollSpeed.js"></script>
</head>
<body background="ptrn1.jpg">
<div id="main" align="center">
<!--****************************************************************************-->	
<div id="menu">
	<div id="pages">
		<a href="index.php">Home</a>|
		<a href="gallery.php">Gallery</a>|
		<a href="reg.php">Reg</a>|
		<a href="photo.php">Photo</a>
	</div>
<!--	+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<?php if (!$_SESSION['id']) { ?>
		<form id = "sign_menu" method = "post" >
			<input type = "text" name = "s1" placeholder = "Login" >
			<input type = "password" name = "s2" placeholder = "Password" >
			<input type = "submit" name = "submit1" value = "Sign In" >
		</form >
	<?php } else { ?>
		<form id = "sign_menu" method = "post" >
			<?php if ($_SESSION['id'] != 1) { ?>
				<a href="room.php"><?php echo $user->getLogin($uid)?></a>
			<?php } else {?>
				<a href="admin.php"><?php echo $user->getLogin($uid)?></a>
			<?php } ?>
		</form >
	<?php } ?>
<!--	+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
</div>
<!--****************************************************************************-->
<div id="content" align="center">
<h3>Gallery</h3>
	<div id="ph">
		<img src="img\1.jpg" alt="">
		<img src="img\2.jpg" alt="">
		<img src="img\3.jpg" alt="">
		<img src="img\4.jpg" alt="">
		<img src="img\5.jpg" alt="">
		<img src="img\6.jpg" alt="">
		<img src="img\7.jpg" alt="">
		<img src="img\8.jpg" alt="">
		<img src="img\9.jpg" alt="">
	</div>
</div>
<!--****************************************************************************-->
</div>
<div id="footer">
	<a href="mnms.php">M&M's</a>

</div>


	
</body>
</html>