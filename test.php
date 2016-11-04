<?php
echo 'petruha';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Test</title>
	<link rel="stylesheet" href="style\main.css">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<script src="script\jquery-1.11.3.js"></script>
	<script src="script\jquery-ui.js"></script>
	<script src="script\main.js"></script>
	<script src="script\jQuery.scrollSpeed.js"></script>
</head>
<body background="test.jpg">
<div id="main" align="center">
<div id="menu">
    <div id="pages">
		<a href="index.php">Home</a>|
		<a href="gallery.php">Gallery</a>|
		<a href="reg.php">Reg</a>
	</div>
</div>	
</div>	
<div id="test" >
<?php
function calc($a,$b)
{
$rez=$a+$b;
return $rez;
}
$a=2;
$b=3;
$v=calc($a,$b);
if(5==$v)
	echo'true';
else
    echo 'false';
?>
<br>
<?php
function str($a,$b)
{
$res=$a.$b;
return $res;
}
$a=Pet;
$b=ruha;
$v=str($a,$b);
if('Petruha'==$v)
	echo'true';
else
    echo 'false';
?>
</div>
<div id="footer" align="center">
	<a href="mnms.php">M&M's</a>
</div>
</body>
</html>	