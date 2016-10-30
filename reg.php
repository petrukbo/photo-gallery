<?php
session_start();
if ($_SESSION['id']) header("location:room.php");
include "User.php";
$user = new User();

if (isset($_POST['registr']))
{
	$reg = $user->registration($_POST['s2'],$_POST['s4'],$_POST['s3'],$_POST['s1'],$_POST['s5']);
	if ($reg)
	{
		$login = $user->login($_POST['s2'],$_POST['s4']);
		header("location:room.php");
	}
}
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
</div>
<!--****************************************************************************-->
<div id="reg_content" align="center">
	<form method="post" id="reg">
	<table>
		<tr>
			<td>Name</td>
			<td><input type="text" name="s1" placeholder="Name" required></td>
		</tr>
		<tr>
			<td>Login</td>
			<td><input type="text" name="s2" placeholder="Login" required></td>
		</tr>
		<tr>
			<td>E-mail</td>
			<td><input type="text" name="s3" placeholder="E-mail" required></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="s4" placeholder="Password" required></td>
		</tr>
		<tr>
			<td>Country</td>
			<td><input type="text" name="s5" placeholder="Country" required></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="registr" value="Registration"></td>
		</tr>
	</table>
	</form>

</div>
<!--****************************************************************************-->


</div>
<div id="footer" align="center">
	<a href="mnms.php">M&M's</a>
</div>
	
</body>
</html>