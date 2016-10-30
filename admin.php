<?php
session_start();
include "User.php";
$user = new User();
if ($_SESSION['id']) $uid = $_SESSION['id']; else header("location:reg.php");
if ($_SESSION['id'] != 1) header("location:room.php");
if (isset($_POST['submit1']))
{
	$login = $user->login($_POST['s1'],$_POST['s2']);
	header("location:room.php");
}

if (isset($_POST['exit']))
{
	session_destroy();
	header("location:index.php");
}

$users_count = $user->count_users();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Main</title>
	<link rel="stylesheet" href="style\main.css">
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
<div id="admin_content" align="center">
	<div class="avatar">
		<img src="img\morda3.jpg">
	</div>
	<div class="inf_about">
		<table border="4" cellspacing="50">
			<tr>
				<td>Name</td>
				<td><?php echo $user->getName($uid) ?></td>
			</tr>
			<tr>
				<td>Login</td>
				<td><?php echo $user->getLogin($uid) ?></td>
			</tr>
			<tr>
				<td>E-mail</td>
				<td><?php echo $user->getEmail($uid) ?></td>
			</tr>
			<tr>
				<td>Country</td>
				<td><?php echo $user->getCountry($uid) ?></td>
			</tr>
		</table>
		<form method="post">
			<input type="submit" name="exit" value="Exit">
		</form>
	</div>
	<br>
	<div class="photos">
		<table>
			<?php for ($i = 2; $i <=$users_count; $i++) {?>
				<tr>
					<td align="center"><?php echo $user->getLogin($i)?></td>
					<td align="center"><?php echo $user->getName($i)?></td>
					<td align="center"><?php echo $user->getEmail($i)?></td>
					<td align="center"><?php echo $user->getCountry($i)?></td>
				</tr>
			<?php } ?>
		</table>
	</div>

</div>
<!--****************************************************************************-->


</div>
<div id="footer" align="center">
	<a href="mnms.php">M&M's</a>
</div>
	
</body>
</html>