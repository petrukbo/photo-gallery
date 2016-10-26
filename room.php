<?php
session_start();
include "User.php";
$user = new User();
if ($_SESSION['id']) $uid = $_SESSION['id']; else header("location:reg.php");
if (isset($_POST['submit1'])) $login = $user->login($_POST['s1'],$_POST['s2']);
$l;$p;$e;$n;$c;

if (isset($_POST['edit']))
{
    if ($_POST['login']=="") $l=$user->getLogin($uid); else $l=$_POST['login'];
    if ($_POST['password']=="") $p=$user->getPassword($uid); else $p=$_POST['password'];
    if ($_POST['email']=="") $e=$user->getEmail($uid); else $e=$_POST['email'];
    if ($_POST['name']=="") $n=$user->getName($uid); else $n=$_POST['name'];
    if ($_POST['country']=="") $c=$user->getCountry($uid); else $c=$_POST['country'];
    $user->update_data($l,$p,$e,$n,$c,$uid);
}

if (isset($_POST['delete']))
{
    $user->delete_data($uid);
    session_destroy();
    header("location:index.php");
}

if (isset($_POST['exit']))
{
    session_destroy();
    header("location:index.php");
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
                <a href="room.php"><?php echo $user->getLogin($uid)?></a>
            </form >
        <?php } ?>
    <!--	+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    </div>
    <!--****************************************************************************-->
    <div id="content" align="center">
        <form method="post">
            <table>
                <tr>
                    <td>Name:</td>
                    <td><?php echo $user->getName($uid)?></td>
                </tr>
                <tr>
                    <td>Login:</td>
                    <td><?php echo $user->getLogin($uid)?></td>
                </tr>
                <tr>
                    <td>E-mail:</td>
                    <td><?php echo $user->getEmail($uid)?></td>
                </tr>
                <tr>
                    <td>Country:</td>
                    <td><?php echo $user->getCountry($uid)?></td>
                </tr>
            </table>

            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" placeholder="Name"></td>
                </tr>
                <tr>
                    <td>Login</td>
                    <td><input type="text" name="login" placeholder="Login"></td>
                </tr>
                <tr>
                    <td>E-mail</td>
                    <td><input type="text" name="email" placeholder="E-mail"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="Password"></td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td><input type="text" name="country" placeholder="Country"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="delete" value="Delete"></td>
                    <td><input type="submit" name="edit" value="Edit"></td>
                    <td><input type="submit" name="exit" value="Exit"></td>
                </tr>
            </table>
        </form>
<!--        <div id="ph">-->
<!--            <img src="img\1.jpg" alt="">-->
<!--            <img src="img\2.jpg" alt="">-->
<!--            <img src="img\3.jpg" alt="">-->
<!--            <img src="img\4.jpg" alt="">-->
<!--            <img src="img\5.jpg" alt="">-->
<!--            <img src="img\6.jpg" alt="">-->
<!--            <img src="img\7.jpg" alt="">-->
<!--            <img src="img\8.jpg" alt="">-->
<!--            <img src="img\9.jpg" alt="">-->
<!--        </div>-->

    </div>
    <!--****************************************************************************-->
</div>
<div id="footer">
    <a href="mnms.php">M&M's</a>
</div>

</body>
</html>