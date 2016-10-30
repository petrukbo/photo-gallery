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
	<title>M&M's</title>
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
<div id="mnms_content" align="center">
	
	
	<h1>M&M's</h1>
	<table>
		<tr>
			<td><img src="img\morda1.jpg"></td>
			<td><img src="img\morda2.jpg"></td>
			<td><img src="img\morda3.jpg"></td>
		</tr>
		<tr>
			<td>TeamLead</td>
			<td>Designer</td>
			<td>Tester</td>
		</tr>
	</table>
	

</div>
<!--****************************************************************************-->


</div>
<div id="footer" align="center">
	<a href="mnms.php">M&M's</a>
</div>
	
</body>
</html>