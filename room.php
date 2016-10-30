<?php
session_start();
include "User.php";
$user = new User();
if ($_SESSION['id']) $uid = $_SESSION['id']; else header("location:reg.php");
if ($_SESSION['id'] == 1) header("location:admin.php");
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

if (isset($_POST['addFile']))
{
    $path = $user->add_photo($_POST['image'],$_SESSION['id']);
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
        <form method="post" enctype="multipart/form-data">
            <div id="inf_table">
                <table>
                    <tr>
                        <td>Name</td>
                        <td><input type="text" name="name" placeholder="Name" value=<?php echo $user->getName($uid)?>></td>
                    </tr>
                    <tr>
                        <td>Login</td>
                        <td><input type="text" name="login" placeholder="Login" value=<?php echo $user->getLogin($uid)?>></td>
                    </tr>
                    <tr>
                        <td>E-mail</td>
                        <td><input type="text" name="email" placeholder="E-mail" value=<?php echo $user->getEmail($uid)?>></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password" placeholder="Password" value=<?php echo $user->getPassword($uid)?>></td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td><input type="text" name="country" placeholder="Country" value=<?php echo $user->getCountry($uid)?>></td>
                    </tr>
                    <tr>
                        <td><input id="editbut" type="submit" name="edit" value="Edit"></td>
                        <td><input type="file" name="image"></td>
                        <td><input type="submit" name="addFile" value="Add File"></td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
    <div id="img_content">
        <h3>Photos</h3>
        <?php
        $pictures = $user->get_picture($uid);
        foreach($pictures as $pic)
        {
        ?>
            <div><img src=<?php print $pic->path ?> alt=""></div>
        <?php } ?>
    </div>

    <!--****************************************************************************-->
</div>
<div id="footer">
    <form id="formdel" method="post"><input type="submit" name="delete" value="Delete page"></form>
    <a href="mnms.php">M&M's</a>
    <form id="formex" method="post"><input type="submit" name="exit" value="Exit"></form>
</div>

</body>
</html>
